panel.plugin("schoko/own-blocks", {
	blocks: {
		headerbild: {
			template: `
				<div class="flex" @click="open">
					<div>
						<span v-if="content.preh1">{{ content.preh1 }}</span>
						<p class="h1" v-if="content.h1">{{ content.h1 }}</p>
						<p v-if="content.text">{{ content.text }}</p>
						<div class="primary" v-for="item in content.referenzen">
							<span v-if="item.linktext">{{ item.linktext }}</span>
							<span v-else="item.links">{{ item.links }}</span>
						</div>
					</div>
					<img v-if="content.image[0]" :src="content.image[0].url">
				</div>
			`
		},
		blogimage: {
			template: `
				<div @click="open">
					<div><img v-if="content.image[0]" :src="content.image[0].url" style="width:100%"></div>
					<p v-if="content.caption">{{ content.caption }}</p>
				</div>
			`
		},
		video: {
			template: `
				<div class="flex" @click="open">
					<div>
						<span v-if="content.preh1">{{ content.preh1 }}</span>
						<p class="h1" v-if="content.h1">{{ content.h1 }}</p>
						<p v-if="content.text">{{ content.text }}</p>
						<div class="primary" v-for="item in content.verlinkung">
							<span v-if="item.linktext">{{ item.linktext }}</span>
							<span v-else="item.links">{{ item.links }}</span>
						</div>
					</div>
					<img v-if="content.image[0]" :src="content.image[0].url">
				</div>
			`
		},
		accordion: {
			template: `
				<p @click="open">{{ content.header }}</p>
			`
		},
		text: {
			computed: {
				text() {
					return this.content.text;
				}
			},
			template: `
				  <div @click="open">
					{{ content.text }}
				  </div>
			`
		},
		heading: {
			computed: {
				text() {
					return this.content.text;
				}
			},
			template: `
				  <div @click="open">
					{{ content.text }}
				  </div>
			`
		},
		button: {
			template: `
				<div @click="open">
					<div class="primary" v-for="item in content.links">
						<span v-if="item.linktext">{{ item.linktext }}</span>
						<span v-else="item.links">{{ item.links }}</span>
					</div>
				</div>
			`
		}
	},
	icons: {
        'lang' : '<path stroke="null" id="svg_2" d="m8.26801,10.00277l-1.55524,-1.53687l0.01837,-0.01837c1.0654,-1.18786 1.82466,-2.55329 2.27164,-3.99832l1.79404,0l0,-1.2246l-4.2861,0l0,-1.2246l-1.2246,0l0,1.2246l-4.2861,0l0,1.21848l6.8394,0c-0.41024,1.18174 -1.05928,2.30225 -1.94099,3.28193c-0.56944,-0.63067 -1.04091,-1.32257 -1.41441,-2.05121l-1.2246,0c0.44698,0.99805 1.05928,1.94099 1.82466,2.79209l-3.11661,3.07375l0.86947,0.86947l3.0615,-3.0615l1.90426,1.90426l0.46535,-1.24909zm3.44725,-3.10436l-1.2246,0l-2.75535,7.34761l1.2246,0l0.68578,-1.8369l2.90843,0l0.6919,1.8369l1.2246,0l-2.75535,-7.34761zm-1.60423,4.2861l0.99193,-2.65126l0.99193,2.65126l-1.98385,0z"/>',
		'hidden': '<svg version="1.1" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="m7.7386 15.412q-1.6209 0.069717-3.0327-0.48802-1.4118-0.55774-2.4575-1.5599-1.0458-1.0022-1.6471-2.3791-0.60131-1.3769-0.60131-2.9804 0-1.5512 0.56645-2.9107t1.5686-2.3617q1.0022-1.0022 2.3529-1.5773 1.3508-0.57516 2.9194-0.57516 1.5512 0 2.9107 0.57516 1.3595 0.57516 2.3617 1.5773 1.0022 1.0022 1.5773 2.3617 0.57516 1.3595 0.57516 2.9107 0 0.15686-0.01743 0.32244-0.01743 0.16558-0.03486 0.30501-0.38344-0.27887-0.78431-0.51416-0.40087-0.23529-0.85403-0.37473-0.08715-2.4052-1.7429-3.9564-1.6558-1.5512-4.061-1.5512-1.0109 0-1.8998 0.30501-0.88889 0.30501-1.5512 0.86275l4.549 4.549q-0.38344 0.15686-0.7146 0.36601t-0.64488 0.47059l-4.2876-4.2876q-0.55773 0.7146-0.85403 1.6122-0.2963 0.8976-0.2963 1.8911 0 1.9346 1.098 3.39 1.098 1.4553 2.8932 1.9434 0.38344 0.66231 0.91503 1.1852t1.1939 0.88889zm3.1547-1.4815q1.098 0 2.0915-0.54902 0.99346-0.54902 1.6383-1.5425-0.64488-0.99346-1.6383-1.5425-0.99346-0.54902-2.0915-0.54902t-2.0915 0.54902q-0.99346 0.54902-1.6383 1.5425 0.64488 0.99346 1.6383 1.5425t2.0915 0.54902zm0 1.2375q-1.6906 0-3.0763-0.90632-1.3856-0.90632-2.0305-2.4227 0.64488-1.5163 2.0305-2.4227 1.3856-0.90632 3.0763-0.90632t3.0763 0.90632q1.3856 0.90632 2.0305 2.4227-0.64488 1.5163-2.0305 2.4227t-3.0763 0.90632zm0-2.1786q-0.48802 0-0.81917-0.33116-0.33116-0.33115-0.33116-0.81917 0-0.48802 0.33116-0.81917t0.81917-0.33116q0.48802 0 0.81917 0.33116 0.33116 0.33116 0.33116 0.81917 0 0.48802-0.33116 0.81917-0.33115 0.33116-0.81917 0.33116z" stroke-width=".34858"/></svg>',
		
		'schoko' : '<g transform="matrix(.0022877 0 0 -.0022892 -.013726 16.011)"><path d="m790 6989c-177-9-298-53-445-164-148-112-259-274-316-465l-23-75v-2770c0-2225 3-2782 13-2830 62-289 272-530 551-634 121-45 67-43 1489-45l1104-1 4 30c3 24 35 174 47 220s73 178 119 259c163 287 450 502 788 592 92 24 125 27 285 30 99 1 201-2 225-8 24-5 55-12 69-14 42-8 181-56 248-85 34-16 62-25 63-21 0 4 2 32 4 62 18 287 76 476 210 680 59 90 78 113 172 207 92 92 193 166 298 220 80 41 226 98 270 107 17 3 50 10 75 15s63 12 85 16c51 8 248 8 300 0 44-7 138-23 170-29 76-15 306-117 378-168l27-20-4 2044c-3 1124-7 2077-10 2119-8 125-79 297-166 403-120 147-268 249-450 308l-65 21-2695 1c-1482 1-2751-2-2820-5zm749-784c120-25 233-85 326-174l45-43 63 58c146 136 403 208 588 164 246-58 442-272 476-520 26-185-30-380-164-577-108-160-364-431-638-678-54-50-108-99-120-110-11-11-62-58-113-104l-93-84-32 29c-17 15-39 35-47 44-14 13-126 115-244 220-166 148-458 440-536 535-205 251-294 473-276 686 8 96 29 167 71 246 39 71 52 88 122 155 107 103 211 151 361 167 82 8 119 6 211-14z"/></g></svg>'
    }
});

markdownEditor.button('lang', {
    extends: 'default',
    data: function() {
        return {
            label: 'Sprach-Kennzeichnung',
            icon: 'lang',
            type: 'lang'
        }
    },
    methods: {
        action() {
            this.insert('<span lang="en">' + this.selection + '</span>') 
        }
    }
});

markdownEditor.button('hidden', {
    extends: 'default',
    data: function() {
        return {
            label: 'aria-hidden',
            icon: 'hidden',
            type: 'hidden'
        }
    },
    methods: {
        action() {
            this.insert('<span aria-hidden="true">' + this.selection + '</span>') 
        }
    }
});