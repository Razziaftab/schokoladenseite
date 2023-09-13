<div class="field">
	<input  type="text" 
			id="name" 
			name="name" 
			value="<?= esc($formdata['name'] ?? '', 'attr') ?>" 
			required 
			autocomplete="family-name"
			placeholder="DSGVO Ansprechpartner *" 
			oninvalid="this.setCustomValidity('Bitte geben Sie Ihren DSGVO Ansprechpartner ein')" 
			oninput="this.setCustomValidity('')"
			<?= isset($alert['name']) ? 'aria-invalid="true"' : '' ?>
			>
	<label for="name">
		DSGVO Ansprechpartner <span>*</span>
	</label>
	<?= isset($alert['name']) ? '<p class="alert error" role="alert">' . esc($alert['name']) . '</p>' : '' ?>
</div>