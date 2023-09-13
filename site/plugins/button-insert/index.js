(function() {

  // Ensure, that the global `markdownEditorButtons` variable exists, otherwise
  // declare it. It is just a plain array, that gets read whenever the field is use.
  window.markdownEditorButtons = window.markdownEditorButtons || [];

  // Pass the plugin definition to the buttons array
  window.markdownEditorButtons.push({
      /**
     * The button definition. This button just opens the dialog, when clicked.
     */
    get button() {
			selection = this.editor.getSelection();
      return {
        icon: "gender",
        label: "Gender-Switch",
        command: () => this.editor.emit("dialog", this),
      };
    },
    /**
     * What the button is actually supposed to do, when the dialog’s form gets submitted
     */
    get command() {
      return ({ genderN, genderX, genderY, genderXY }) => {
        this.editor.insert(`(gender: ${genderN} x: ${genderX} y: ${genderY} xy: ${genderXY})`);
      };
    },

    /**
     * Must be a unique identifier. Use the `toolbar` field property in your blueprints,
     * to add this button to a Markdown field’s toolbar.
     */
    get name() {
      return "gender";
    },

    /**
     * Name of the dialog component. Must be registred globally, see below.
     */
    get dialog() {
      return "k-markdown-gender-dialog";
    }
  });

  // Definition of the dialog component. Of course, you could also use single-file
  // components and a dedicated build step for more complex plugins.
  const GenderDialog = {
    template: `
      <k-dialog
        ref="dialog"
        :button="$t('insert')"
        @close="cancel"
        @submit="$refs.form.submit()"
      >
        <k-form
          ref="form"
          :fields="fields"
          v-model="value"
          @submit="submit"
        />
      </k-dialog>
    `,
    props: {
      extension: Object,
    },
    data() {
      return {
        value: this.defaultValue(),
        fields: {
          genderN: {
            label: "Neutral",
            type: "text",
            icon: "gender"
          },
          genderX: {
            label: "Weiblich",
            type: "text",
            icon: "gender"
          },
          genderY: {
            label: "Männlich",
            type: "text",
            icon: "gender"
          },
          genderXY: {
            label: "Paarform",
            type: "text",
            icon: "gender",
          },
        },
      };
    },
    methods: {
      cancel() {
        this.$emit("cancel");
      },
      defaultValue(selection) {
        return {
          genderN: selection,
          genderX: null,
          genderY: null,
          genderXY: 'und',
        }
      },
      /**
       * Each plugin dialog must have an open method, because that’s what the Markdown
       * field will call to open the dialog.
       */
      open() {
        // make sure we're starting with an empty form
        this.resetValue();
        this.$refs.dialog.open();
      },
      resetValue() {
        this.value = this.defaultValue(selection);
      },
      submit() {
        this.$refs.dialog.close();

        // Sanitize value before submit
        this.value.genderN = this.value.genderN ? this.value.genderN.replace(/^@/, '') : "";
        this.value.genderX = this.value.genderX ? this.value.genderX.replace(/^@/, '') : "";
        this.value.genderY = this.value.genderY ? this.value.genderY.replace(/^@/, '') : "";
        this.value.genderXY = this.value.genderXY ? this.value.genderXY.replace(/^@/, '') : "";

        // Pass value to extension command
        this.$emit("submit", this.value);
      },
    }
  };

  window.panel.plugin("my/markdown-dialog", {
    components: {
      "k-markdown-gender-dialog": GenderDialog,
    }
  });
  

  
  





















  // Pass the plugin definition to the buttons array
  window.markdownEditorButtons.push({
      /**
     * The button definition. This button just opens the dialog, when clicked.
     */
    get button() {
			selection = this.editor.getSelection();
      return {
        icon: "lang",
        label: "language",
        command: () => this.editor.emit("dialog", this),
      };
    },
    /**
     * What the button is actually supposed to do, when the dialog’s form gets submitted
     */
    get command() {
      return ({ language }) => {
        this.editor.insert(`${language}`);
      };
    },

    /**
     * Must be a unique identifier. Use the `toolbar` field property in your blueprints,
     * to add this button to a Markdown field’s toolbar.
     */
    get name() {
      return "language";
    },

    /**
     * Name of the dialog component. Must be registred globally, see below.
     */
    get dialog() {
      return "k-markdown-language-dialog";
    }
  });

  

  // Definition of the dialog component. Of course, you could also use single-file
  // components and a dedicated build step for more complex plugins.
  const languageDialog = {
    template: `
      <k-dialog
        ref="dialog"
        :button="$t('insert')"
        @close="cancel"
        @submit="$refs.form.submit()"
      >
        <k-form
          ref="form"
          :fields="fields"
          v-model="value"
          :value="value"
          @input="setValue($event, 'value')"
          @submit="submit"
        />
      </k-dialog>
    `,
    props: {
      field_name: {
        type: String,
        required: true,		
      },
      api_key: {
        type: String,
        required: true,
      },
      api_url: {
        type: String,
        required: true,
      },
      label: String,
      required: Boolean,
      disabled: Boolean,
      inputtype: String,
      size: String,
      value: String,
      selected: String,
      default: {
        type: Object,
        default() {
          return {
            name: "",
          };
        },
      },
    },
    data() {
      const panel = document.querySelector(".k-panel");
      const current_language = panel.dataset.language;
      const base_language = panel.dataset.translation;
      return {
        value: this.defaultValue(),
        fields: {
          language: {
            label: "Text",
            type: "textarea",
            size: "large",
            buttons: false,
          },
        },
      };
    },
    methods: {
      cancel() {
        this.$emit("cancel");
      },
      defaultValue(selection) {
        var translation = this.doTranslation(selection);

        setTimeout(() => {
          console.log(translation);
        }, 2000);
        

        return {
          language: translation,
        }
      },
      open() {
        this.resetValue();
        this.$refs.dialog.open();
      },
      resetValue() {
        this.value = this.defaultValue(selection);
      },
      async doTranslation(value) {
        const panel = document.querySelector(".k-panel");
        const current_language = panel.dataset.language;
        const base_language = panel.dataset.translation; // alternative we can use baselang from props in index.php with this.base_language
  
        const api_url = 'https://api-free.deepl.com/v2/translate';
        const api_key = 'e33e61e0-5ba8-b350-65fa-e414b5ba640d:fx';
       
        const response = await fetch(
          api_url+'?auth_key='+api_key+'&preserve_formatting=1split_sentences=1&text='+encodeURIComponent(value)+'&target_lang='+current_language+'&source_lang='+base_language
        );
        const data = await response.json();

        console.log(data.translations[0].text);
        return data.translations[0].text;
      },
      setValue() {
        //this.error = null;
        //this.$emit("input", this.value);
      },
      submit() {
        this.$refs.dialog.close();

        // Sanitize value before submit
        this.value.language = this.value.language ? this.value.language.replace(/^@/, '') : "";

        // Pass value to extension command
        this.$emit("submit", this.value);
      },
    }
  };

  window.panel.plugin("my/markdown-language", {
    components: {
      "k-markdown-language-dialog": languageDialog,
    }
  });
  

  
  
























  
  // Pass the plugin definition to the buttons array
  window.markdownEditorButtons.push({
    /**
     * The button definition. This is a simple one, buttons can also provide
     * fancy things, like a dropdown menu.
     */
    get button() {
      return {
        icon: "lang",
        label: "<span aria-hidden='true'></span>",
        command: this.command,
      };
    },
    /**
     * What the button is actually supposed to do, when clicked.
     */
    get command() {
      return () => this.editor.insert('<span aria-hidden="true"></span>');
    },

    /**
     * Must be a unique identifier. Use the `toolbar` field property in your blueprints,
     * to add this button to a Markdown field’s toolbar.
     */
    get name() {
      return "lang";
    },

    /**
     * Leave out this method to disable the button, when the cursor is inside of a
     * Kirbytag, fenced code or a Markdown link.
     */
    get isDisabled() {
      return () => false; // It’s always time to smile
    },
  });
})();



panel.plugin('schoko/schoko-gender-switch', {
    icons: {
        'gender' : '<path fill="#E50066" d="M5 1.7c0.5 0 1 0.1 1.5 0.4C7 2.3 7.4 2.6 7.7 3c0.8 1 1.2 2.2 1.2 3.7 0 0.8-0.2 1.8-0.5 2.8s-0.7 2-1.2 2.8c-0.8 1.4-1.7 2-2.6 2 -0.4 0-0.7-0.1-1.1-0.4 -0.3-0.2-0.5-0.5-0.5-0.8 0-0.2 0.2-0.6 0.6-1.2 0.2-0.4 0.4-0.8 0.6-1.3 0.2-0.5 0.3-0.8 0.3-1.1 0-0.4-0.2-0.6-0.5-0.8C3.4 8.6 2.9 8.4 2.6 8.1 1.8 7.4 1.3 6.4 1.3 5.3c0-0.9 0.3-1.7 0.9-2.4C3 2.1 3.9 1.7 5 1.7z"/><g opacity="0.28"><path fill="#0025FA" d="M9.7 0c0.6 0 1.3 0.2 1.9 0.5s1.1 0.7 1.6 1.2c1 1.2 1.5 2.8 1.5 4.7 0 1-0.2 2.2-0.6 3.5 -0.4 1.3-0.9 2.5-1.5 3.5 -1 1.7-2.1 2.6-3.2 2.6 -0.5 0-0.9-0.1-1.3-0.5 -0.4-0.3-0.6-0.6-0.6-1 0-0.2 0.2-0.7 0.7-1.5 0.3-0.5 0.6-1 0.8-1.6 0.2-0.6 0.3-1 0.3-1.3 0-0.5-0.2-0.8-0.7-1 -0.9-0.3-1.5-0.6-1.9-1C5.7 7.2 5.1 6 5.1 4.6c0-1.2 0.4-2.2 1.2-3C7.2 0.5 8.4 0 9.7 0z"/></g>'
    }
});
