<!DOCTYPE html>
<html lang="de" data-lt-installed="true">

	<!-- HEAD -->
	<?php snippet('head') ?>

	<!-- BODY -->
	<body class="p-<?= $page->parent() ?> p-<?= $page->slug() ?> y-<?= date('Y') ?> m-<?= date('m') ?> h-<?= date('H') ?>">
	
		<a id="skip-content" href="#main">Zum Inhaltsbereich wechseln.</a>

		<!-- HEADER -->
		<?php snippet('header') ?>

		<!-- MAIN -->
		<main id="main">
			<div class="gender page-header" aria-labelledby="gender-switch" id="gender-switch">
					
				<div class="row flex">
					<div class="column-8">
						<div class="col-inner">
							<img src="<?= $kirby->url() ?>/assets/img/schoki-gender-logo-ohne-registered.svg" alt="Gender Selector" class="logo_gender_selector">
						</div>
					</div>
					<div class="column-4">
						<div class="col-inner">
							<div class="logo_gender_selector_ani">
								<div class="hier-testen">
									<span><i class="fa fa-arrow-right"></i> Hier ausprobieren</span>
								</div>

								<svg version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									width="430px" height="405px" viewBox="0 0 430 405" style="enable-background:new 0 0 430 405;">
									<g role="button" tabindex="0" aria-label="Genderform Doppelpunkt ausprobieren" id="doppelpunkt" class="selector active" data-nr="1">
										<path fill="#333333" class="dark" d="M123.6,82.9H91.1c-4,0-7.3,3.2-7.3,7.3v32.5c0,4,3.2,7.3,7.3,7.3h32.5c4,0,7.3-3.2,7.3-7.3V90.2
											C130.8,86.1,127.6,82.9,123.6,82.9z"/>
										<circle fill="#FFFFFF" cx="107.2" cy="115.6" r="5.4"/>
										<circle fill="#FFFFFF" cx="107.4" cy="97.4" r="5.4"/>
									</g>
									<g role="button" tabindex="0" aria-label="Genderform Unterstrich ausprobieren" id="unterstrich" class="selector" data-nr="2">
										<path fill="#333333" class="dark" d="M178.2,82.9h-32.5c-4,0-7.3,3.2-7.3,7.3v32.5c0,4,3.2,7.3,7.3,7.3h32.5c4,0,7.3-3.2,7.3-7.3V90.2
											C185.3,86.1,182.2,82.9,178.2,82.9z"/>
										<path fill="#FFFFFF" d="M172.6,121h-19.8c-2,0-3.6-1.6-3.6-3.6s1.6-3.6,3.6-3.6h19.8c2,0,3.6,1.6,3.6,3.6
											C176.4,119.4,174.6,121,172.6,121z"/>
									</g>
									<g role="button" tabindex="0" aria-label="Genderform Stern ausprobieren" id="stern" class="selector" data-nr="3">
										<path fill="#333333" class="dark" d="M232.2,82.9h-32.5c-4,0-7.3,3.2-7.3,7.3v32.5c0,4,3.2,7.3,7.3,7.3h32.5c4,0,7.3-3.2,7.3-7.3V90.2
											C239.5,86.1,236.3,82.9,232.2,82.9z"/>
										<path fill="#FFFFFF" d="M232.8,104.3c-0.2,0.4-0.6,0.8-1,1.2c-3.8,1.4-7.5,2.4-11.5,3c0.8,0.8,1.6,1.6,2.8,2.8s1.6,1.8,1.8,1.8
											c0.4,0.6,1,1.2,1.8,2.2c0.6,0.6,1,1.2,1.6,2c0.2,0.6,0.4,1.2,0.4,1.8c0,0.8-0.4,1.6-1,2.2s-1.6,1-2.6,1s-2.2-0.8-3.4-2.4
											c-2-2.8-3.6-5.6-5-8.5c-2,3.8-3.4,6.2-4.2,7.3c-0.6,1-1.2,2-2,2.8c-0.6,0.6-1.4,1-2.2,1c-1,0-1.8-0.4-2.6-1c-0.6-0.6-1-1.4-1-2.2
											c0-0.6,0.2-1.2,0.4-1.6c2.4-3.2,5-6.2,7.7-8.7c-2.2-0.4-4.4-0.8-6.2-1.2c-2-0.4-3.8-1.2-5.8-2c-0.4-0.2-0.8-0.6-1-1.2
											c-0.2-0.4-0.4-1-0.4-1.6c0-1,0.4-1.8,1-2.4s1.4-1,2.4-1c0.8,0,1.6,0.2,2.4,0.6c1,0.4,2.2,1,3.8,1.8s3.2,1.6,5.2,2.6
											c-0.4-1.8-0.6-3.6-0.8-5.8S213,95,213,94.2c0-1,0.4-1.8,1-2.6s1.6-1.2,2.4-1c1,0,1.8,0.4,2.4,1c0.6,0.8,1,1.8,1,2.8
											c0,0.4,0,1-0.2,2s-0.2,2.2-0.4,3.6s-0.4,3-0.6,4.8c1.8-0.8,3.4-1.6,5-2.4s2.8-1.4,3.8-1.8c0.8-0.4,1.4-0.6,2.2-0.6
											c1,0,1.8,0.4,2.4,1c0.6,0.6,1,1.4,1,2.4C233.2,103.3,233,103.9,232.8,104.3z"/>
									</g>
									<g role="button" tabindex="0" aria-label="Genderform weiblich ausprobieren" id="weiblich" class="selector" data-nr="4">
										<path fill="#333333" class="dark" d="M285.1,82.9h-32.5c-4,0-7.3,3.2-7.3,7.3v32.5c0,4.2,3.4,7.3,7.3,7.3h32.5c4.2,0,7.3-3.4,7.3-7.3V90.2
											C292.5,86.1,289.1,82.9,285.1,82.9z"/>
										<path fill="#FFFFFF" d="M280.2,100.2c0-6.2-5-10.9-10.9-10.9c-6.2,0-10.9,5-10.9,10.9c0,5.2,3.6,9.7,8.7,10.7v2.4h-2.2
											c-1.2,0-2.2,1-2.2,2.2s1,2.2,2.2,2.2h2.2v2.2c0,1.2,1,2.2,2.2,2.2s2.2-1,2.2-2.2v-2.2h2.2c1.2,0,2.2-1,2.2-2.2s-1-2.2-2.2-2.2h-2.2
											v-2.4C276.6,109.9,280.2,105.3,280.2,100.2z M269.3,106.7c-3.6,0-6.5-3-6.5-6.5s3-6.5,6.5-6.5s6.5,3,6.5,6.5
											S272.8,106.7,269.3,106.7z"/>
									</g>
									<g role="button" tabindex="0" aria-label="Genderform männlich ausprobieren" id="mann" class="selector" data-nr="5">
										<path fill="#333333" class="dark" d="M338.9,82.9h-32.5c-4,0-7.3,3.2-7.3,7.3v32.5c0,4,3.2,7.3,7.3,7.3h32.5c4,0,7.3-3.2,7.3-7.3V90.2
											C346.1,86.1,342.9,82.9,338.9,82.9z"/>
										<path fill="#FFFFFF" d="M338.1,93c0-0.2-0.2-0.2-0.2-0.4s-0.2-0.2-0.2-0.4c-0.2-0.2-0.2-0.2-0.4-0.2s-0.2-0.2-0.4-0.2s-0.2,0-0.4-0.2
											h-0.6l-11.1,1c-1.2,0-2.2,1.2-2,2.4c0,1.2,1,2.2,2.2,2h0.2l5-0.4l-5.4,5.6c-5.4-3.6-12.5-2.2-15.9,3.2c-3.6,5.4-2.2,12.5,3.2,15.9
											c5.4,3.6,12.5,2.2,15.9-3.2c2.6-3.8,2.6-8.9,0-12.7l5.4-5.6l-0.4,5c-0.2,1.2,0.8,2.4,2,2.4h0.2c1.2,0,2.2-0.8,2.2-2l1-11.1v-0.2
											l0,0c0-0.2,0-0.4,0-0.4C338.3,93.2,338.3,93,338.1,93z M318.3,118.6c-3.8,0-6.9-3.2-6.9-6.9s3.2-6.9,6.9-6.9s6.9,3.2,6.9,6.9
											C325.4,115.4,322.2,118.6,318.3,118.6z"/>
									</g>
									<g id="doppelpunkt-text" class="text active">
										<path d="M75.9,210.8v-25.3h4v25.3H75.9z"/>
										<path d="M102.5,210.8h-4V199c0-1.5-0.3-2.6-0.9-3.3s-1.5-1.1-2.8-1.1c-1.7,0-2.9,0.5-3.7,1.5c-0.8,1-1.2,2.7-1.2,5.1v9.5h-4v-26.9
											h4v6.8c0,1.1-0.1,2.3-0.2,3.5H90c0.5-0.9,1.3-1.6,2.3-2.1s2.1-0.8,3.4-0.8c4.5,0,6.8,2.3,6.8,7L102.5,210.8L102.5,210.8z"/>
										<path d="M117.6,191.3c0.8,0,1.5,0.1,2,0.2l-0.4,3.8c-0.6-0.1-1.2-0.2-1.8-0.2c-1.6,0-2.9,0.5-3.9,1.6s-1.5,2.4-1.5,4.1v10h-4v-19.1
											h3.1l0.5,3.4h0.2c0.6-1.1,1.4-2,2.4-2.7S116.4,191.3,117.6,191.3z"/>
										<path d="M131.2,211.2c-2.9,0-5.2-0.9-6.8-2.6c-1.6-1.7-2.5-4.1-2.5-7.2c0-3.1,0.8-5.6,2.3-7.4c1.5-1.8,3.6-2.7,6.3-2.7
											c2.5,0,4.4,0.8,5.9,2.3c1.4,1.5,2.2,3.6,2.2,6.3v2.2H126c0.1,1.9,0.5,3.3,1.5,4.3c0.9,1,2.2,1.5,3.9,1.5c1.1,0,2.1-0.1,3.1-0.3
											s2-0.6,3.1-1.1v3.3c-1,0.5-2,0.8-2.9,1C133.6,211.1,132.5,211.2,131.2,211.2z M130.5,194.4c-1.3,0-2.3,0.4-3,1.2
											c-0.8,0.8-1.2,2-1.4,3.6h8.5c0-1.6-0.4-2.8-1.1-3.6C132.7,194.8,131.7,194.4,130.5,194.4z"/>
										<path fill="#dd0004" d="M152.3,210.8v-25.3h5.2v20.9h10v4.4L152.3,210.8L152.3,210.8z"/>
										<path fill="#dd0004" d="M180,211.2c-3,0-5.4-0.9-7.1-2.6c-1.7-1.7-2.6-4.2-2.6-7.3c0-3.2,0.8-5.7,2.4-7.5c1.6-1.8,3.8-2.7,6.6-2.7
											c2.7,0,4.8,0.8,6.2,2.3s2.2,3.7,2.2,6.5v2.6h-12.2c0.1,1.5,0.5,2.7,1.3,3.5s2,1.3,3.4,1.3c1.1,0,2.2-0.1,3.2-0.4
											c1-0.2,2.1-0.6,3.2-1.2v4.1c-0.9,0.5-1.9,0.8-2.9,1C182.8,211.1,181.5,211.2,180,211.2z M179.3,194.9c-1.1,0-2,0.4-2.6,1.1
											c-0.6,0.7-1,1.7-1.1,3h7.2c0-1.3-0.4-2.3-1-3C181.3,195.2,180.4,194.9,179.3,194.9z"/>
										<path fill="#dd0004" d="M205.2,205.1c0,2-0.7,3.5-2,4.5s-3.4,1.6-6.1,1.6c-1.4,0-2.6-0.1-3.5-0.3c-1-0.2-1.9-0.5-2.7-0.8v-4.4
											c1,0.5,2,0.8,3.2,1.2c1.2,0.3,2.3,0.5,3.2,0.5c1.9,0,2.8-0.6,2.8-1.7c0-0.4-0.1-0.8-0.4-1c-0.2-0.3-0.7-0.6-1.3-0.9
											c-0.6-0.3-1.4-0.7-2.4-1.2c-1.5-0.6-2.5-1.2-3.2-1.7s-1.2-1.1-1.5-1.8s-0.5-1.5-0.5-2.5c0-1.7,0.7-3,2-4c1.3-0.9,3.2-1.4,5.5-1.4
											s4.5,0.5,6.7,1.5l-1.6,3.8c-0.9-0.4-1.8-0.8-2.7-1c-0.8-0.3-1.7-0.4-2.5-0.4c-1.5,0-2.3,0.4-2.3,1.3c0,0.5,0.2,0.9,0.7,1.2
											s1.6,0.9,3.2,1.5c1.5,0.6,2.6,1.2,3.3,1.7s1.2,1.1,1.5,1.8S205.2,204.1,205.2,205.1z"/>
										<path fill="#dd0004" d="M217.8,211.2c-3,0-5.4-0.9-7.1-2.6c-1.7-1.7-2.6-4.2-2.6-7.3c0-3.2,0.8-5.7,2.4-7.5c1.6-1.8,3.8-2.7,6.6-2.7
											c2.7,0,4.8,0.8,6.2,2.3s2.2,3.7,2.2,6.5v2.6h-12.2c0.1,1.5,0.5,2.7,1.3,3.5s2,1.3,3.4,1.3c1.1,0,2.2-0.1,3.2-0.4
											c1-0.2,2.1-0.6,3.2-1.2v4.1c-0.9,0.5-1.9,0.8-2.9,1C220.5,211.1,219.2,211.2,217.8,211.2z M217,194.9c-1.1,0-2,0.4-2.6,1.1
											c-0.6,0.7-1,1.7-1.1,3h7.2c0-1.3-0.4-2.3-1-3C219,195.2,218.1,194.9,217,194.9z"/>
										<path fill="#dd0004" d="M240.3,191.1c0.7,0,1.3,0.1,1.7,0.2l-0.4,5c-0.4-0.1-0.9-0.2-1.5-0.2c-1.6,0-2.9,0.4-3.9,1.3
											c-0.9,0.9-1.4,2.1-1.4,3.6v9.8h-5.2v-19.3h3.9l0.8,3.3h0.3c0.6-1.1,1.4-2,2.4-2.6S239.1,191.1,240.3,191.1z"/>
										<path fill="#dd0004" d="M244.7,194.1c0-1,0.3-1.7,0.8-2.2s1.2-0.7,2.2-0.7c0.9,0,1.7,0.3,2.2,0.8s0.8,1.2,0.8,2.2
											c0,0.9-0.3,1.7-0.8,2.2s-1.2,0.8-2.2,0.8c-0.9,0-1.7-0.3-2.2-0.8C245,195.7,244.7,195,244.7,194.1z M244.7,208.4
											c0-1,0.3-1.7,0.8-2.2s1.2-0.7,2.2-0.7c0.9,0,1.7,0.3,2.2,0.8s0.8,1.2,0.8,2.2c0,0.9-0.3,1.6-0.8,2.2c-0.5,0.5-1.2,0.8-2.2,0.8
											c-0.9,0-1.7-0.3-2.2-0.8C245,210,244.7,209.3,244.7,208.4z"/>
										<path fill="#dd0004" d="M255.1,186.5c0-1.7,0.9-2.6,2.8-2.6s2.8,0.9,2.8,2.6c0,0.8-0.2,1.5-0.7,1.9s-1.2,0.7-2.1,0.7
											C256,189.1,255.1,188.2,255.1,186.5z M260.5,210.8h-5.2v-19.3h5.2V210.8z"/>
										<path fill="#dd0004" d="M283.4,210.8h-5.2v-11.3c0-1.4-0.2-2.4-0.7-3.1s-1.3-1-2.3-1c-1.4,0-2.5,0.5-3.1,1.5s-1,2.6-1,4.9v9.1h-5.2
											v-19.3h3.9l0.7,2.5h0.3c0.6-0.9,1.4-1.6,2.4-2.1s2.2-0.7,3.4-0.7c2.2,0,3.9,0.6,5,1.8s1.7,3,1.7,5.3v12.4H283.4z"/>
										<path fill="#dd0004" d="M306.2,210.8H301v-11.3c0-1.4-0.2-2.4-0.7-3.1s-1.3-1-2.3-1c-1.4,0-2.5,0.5-3.1,1.5s-1,2.6-1,4.9v9.1h-5.2
											v-19.3h3.9l0.7,2.5h0.3c0.6-0.9,1.4-1.6,2.4-2.1s2.2-0.7,3.4-0.7c2.2,0,3.9,0.6,5,1.8s1.7,3,1.7,5.3v12.4H306.2z"/>
										<path fill="#dd0004" d="M320.1,211.2c-3,0-5.4-0.9-7.1-2.6c-1.7-1.7-2.6-4.2-2.6-7.3c0-3.2,0.8-5.7,2.4-7.5s3.8-2.7,6.6-2.7
											c2.7,0,4.8,0.8,6.2,2.3s2.2,3.7,2.2,6.5v2.6h-12.2c0.1,1.5,0.5,2.7,1.3,3.5s2,1.3,3.4,1.3c1.1,0,2.2-0.1,3.2-0.4
											c1-0.2,2.1-0.6,3.2-1.2v4.1c-0.9,0.5-1.9,0.8-2.9,1C322.8,211.1,321.6,211.2,320.1,211.2z M319.3,194.9c-1.1,0-2,0.4-2.6,1.1
											c-0.6,0.7-1,1.7-1.1,3h7.2c0-1.3-0.4-2.3-1-3C321.3,195.2,320.4,194.9,319.3,194.9z"/>
										<path fill="#dd0004" d="M349.5,210.8h-5.2v-11.3c0-1.4-0.2-2.4-0.7-3.1s-1.3-1-2.3-1c-1.4,0-2.5,0.5-3.1,1.5s-1,2.6-1,4.9v9.1H332
											v-19.3h3.9l0.7,2.5h0.3c0.6-0.9,1.4-1.6,2.4-2.1s2.2-0.7,3.4-0.7c2.2,0,3.9,0.6,5,1.8s1.7,3,1.7,5.3v12.4H349.5z"/>
									</g>
									<g id="unterstrich-text" class="text">
										<path d="M73.7,210.8v-25.3h4v25.3H73.7z"/>
										<path d="M100.4,210.8h-4V199c0-1.5-0.3-2.6-0.9-3.3s-1.5-1.1-2.8-1.1c-1.7,0-2.9,0.5-3.7,1.5c-0.8,1-1.2,2.7-1.2,5.1v9.5h-4v-26.9
											h4v6.8c0,1.1-0.1,2.3-0.2,3.5h0.3c0.5-0.9,1.3-1.6,2.3-2.1s2.1-0.8,3.4-0.8c4.5,0,6.8,2.3,6.8,7L100.4,210.8L100.4,210.8z"/>
										<path d="M115.4,191.3c0.8,0,1.5,0.1,2,0.2l-0.4,3.8c-0.6-0.1-1.2-0.2-1.8-0.2c-1.6,0-2.9,0.5-3.9,1.6s-1.5,2.4-1.5,4.1v10h-4v-19.1
											h3.1l0.5,3.4h0.2c0.6-1.1,1.4-2,2.4-2.7S114.2,191.3,115.4,191.3z"/>
										<path d="M129,211.2c-2.9,0-5.2-0.9-6.8-2.6c-1.6-1.7-2.5-4.1-2.5-7.2c0-3.1,0.8-5.6,2.3-7.4c1.5-1.8,3.6-2.7,6.3-2.7
											c2.5,0,4.4,0.8,5.9,2.3c1.4,1.5,2.2,3.6,2.2,6.3v2.2h-12.5c0.1,1.9,0.5,3.3,1.5,4.3c0.9,1,2.2,1.5,3.9,1.5c1.1,0,2.1-0.1,3.1-0.3
											s2-0.6,3.1-1.1v3.3c-1,0.5-2,0.8-2.9,1C131.4,211.1,130.3,211.2,129,211.2z M128.3,194.4c-1.3,0-2.3,0.4-3,1.2
											c-0.8,0.8-1.2,2-1.4,3.6h8.5c0-1.6-0.4-2.8-1.1-3.6C130.6,194.8,129.6,194.4,128.3,194.4z"/>
										<path fill="#dd0004" d="M150.1,210.8v-25.3h5.2v20.9h10v4.4L150.1,210.8L150.1,210.8z"/>
										<path fill="#dd0004" d="M177.8,211.2c-3,0-5.4-0.9-7.1-2.6c-1.7-1.7-2.6-4.2-2.6-7.3c0-3.2,0.8-5.7,2.4-7.5c1.6-1.8,3.8-2.7,6.6-2.7
											c2.7,0,4.8,0.8,6.2,2.3s2.2,3.7,2.2,6.5v2.6h-12.2c0.1,1.5,0.5,2.7,1.3,3.5s2,1.3,3.4,1.3c1.1,0,2.2-0.1,3.2-0.4
											c1-0.2,2.1-0.6,3.2-1.2v4.1c-0.9,0.5-1.9,0.8-2.9,1C180.6,211.1,179.3,211.2,177.8,211.2z M177.1,194.9c-1.1,0-2,0.4-2.6,1.1
											c-0.6,0.7-1,1.7-1.1,3h7.2c0-1.3-0.4-2.3-1-3C179.1,195.2,178.2,194.9,177.1,194.9z"/>
										<path fill="#dd0004" d="M203,205.1c0,2-0.7,3.5-2,4.5s-3.4,1.6-6.1,1.6c-1.4,0-2.6-0.1-3.5-0.3c-1-0.2-1.9-0.5-2.7-0.8v-4.4
											c1,0.5,2,0.8,3.2,1.2c1.2,0.3,2.3,0.5,3.2,0.5c1.9,0,2.8-0.6,2.8-1.7c0-0.4-0.1-0.8-0.4-1c-0.2-0.3-0.7-0.6-1.3-0.9
											c-0.6-0.3-1.4-0.7-2.4-1.2c-1.5-0.6-2.5-1.2-3.2-1.7s-1.2-1.1-1.5-1.8s-0.5-1.5-0.5-2.5c0-1.7,0.7-3,2-4c1.3-0.9,3.2-1.4,5.5-1.4
											s4.5,0.5,6.7,1.5l-1.6,3.8c-0.9-0.4-1.8-0.8-2.7-1c-0.8-0.3-1.7-0.4-2.5-0.4c-1.5,0-2.3,0.4-2.3,1.3c0,0.5,0.2,0.9,0.7,1.2
											s1.6,0.9,3.2,1.5c1.5,0.6,2.6,1.2,3.3,1.7s1.2,1.1,1.5,1.8S203,204.1,203,205.1z"/>
										<path fill="#dd0004" d="M215.6,211.2c-3,0-5.4-0.9-7.1-2.6c-1.7-1.7-2.6-4.2-2.6-7.3c0-3.2,0.8-5.7,2.4-7.5c1.6-1.8,3.8-2.7,6.6-2.7
											c2.7,0,4.8,0.8,6.2,2.3s2.2,3.7,2.2,6.5v2.6h-12.2c0.1,1.5,0.5,2.7,1.3,3.5s2,1.3,3.4,1.3c1.1,0,2.2-0.1,3.2-0.4
											c1-0.2,2.1-0.6,3.2-1.2v4.1c-0.9,0.5-1.9,0.8-2.9,1C218.3,211.1,217.1,211.2,215.6,211.2z M214.8,194.9c-1.1,0-2,0.4-2.6,1.1
											c-0.6,0.7-1,1.7-1.1,3h7.2c0-1.3-0.4-2.3-1-3C216.8,195.2,215.9,194.9,214.8,194.9z"/>
										<path fill="#dd0004" d="M238.1,191.1c0.7,0,1.3,0.1,1.7,0.2l-0.4,5c-0.4-0.1-0.9-0.2-1.5-0.2c-1.6,0-2.9,0.4-3.9,1.3
											c-0.9,0.9-1.4,2.1-1.4,3.6v9.8h-5.2v-19.3h3.9l0.8,3.3h0.3c0.6-1.1,1.4-2,2.4-2.6S236.9,191.1,238.1,191.1z"/>
										<path fill="#dd0004" d="M254.9,216.4h-14.4V214h14.4V216.4z"/>
										<path fill="#dd0004" d="M257.3,186.5c0-1.7,0.9-2.6,2.8-2.6s2.8,0.9,2.8,2.6c0,0.8-0.2,1.5-0.7,1.9s-1.2,0.7-2.1,0.7
											C258.2,189.1,257.3,188.2,257.3,186.5z M262.7,210.8h-5.2v-19.3h5.2V210.8z"/>
										<path fill="#dd0004" d="M285.6,210.8h-5.2v-11.3c0-1.4-0.2-2.4-0.7-3.1s-1.3-1-2.3-1c-1.4,0-2.5,0.5-3.1,1.5s-1,2.6-1,4.9v9.1h-5.2
											v-19.3h3.9l0.7,2.5h0.3c0.6-0.9,1.4-1.6,2.4-2.1s2.2-0.7,3.4-0.7c2.2,0,3.9,0.6,5,1.8s1.7,3,1.7,5.3v12.4H285.6z"/>
										<path fill="#dd0004" d="M308.4,210.8h-5.2v-11.3c0-1.4-0.2-2.4-0.7-3.1s-1.3-1-2.3-1c-1.4,0-2.5,0.5-3.1,1.5s-1,2.6-1,4.9v9.1h-5.2
											v-19.3h3.9l0.7,2.5h0.3c0.6-0.9,1.4-1.6,2.4-2.1s2.2-0.7,3.4-0.7c2.2,0,3.9,0.6,5,1.8s1.7,3,1.7,5.3v12.4H308.4z"/>
										<path fill="#dd0004" d="M322.3,211.2c-3,0-5.4-0.9-7.1-2.6c-1.7-1.7-2.6-4.2-2.6-7.3c0-3.2,0.8-5.7,2.4-7.5s3.8-2.7,6.6-2.7
											c2.7,0,4.8,0.8,6.2,2.3s2.2,3.7,2.2,6.5v2.6h-12.2c0.1,1.5,0.5,2.7,1.3,3.5s2,1.3,3.4,1.3c1.1,0,2.2-0.1,3.2-0.4
											c1-0.2,2.1-0.6,3.2-1.2v4.1c-0.9,0.5-1.9,0.8-2.9,1C325,211.1,323.7,211.2,322.3,211.2z M321.5,194.9c-1.1,0-2,0.4-2.6,1.1
											c-0.6,0.7-1,1.7-1.1,3h7.2c0-1.3-0.4-2.3-1-3C323.5,195.2,322.6,194.9,321.5,194.9z"/>
										<path fill="#dd0004" d="M351.7,210.8h-5.2v-11.3c0-1.4-0.2-2.4-0.7-3.1s-1.3-1-2.3-1c-1.4,0-2.5,0.5-3.1,1.5s-1,2.6-1,4.9v9.1h-5.2
											v-19.3h3.9l0.7,2.5h0.3c0.6-0.9,1.4-1.6,2.4-2.1s2.2-0.7,3.4-0.7c2.2,0,3.9,0.6,5,1.8s1.7,3,1.7,5.3v12.4H351.7z"/>
									</g>
									<g id="stern-text" class="text">
										<path d="M71.4,210.8v-25.3h4v25.3H71.4z"/>
										<path d="M98,210.8h-4V199c0-1.5-0.3-2.6-0.9-3.3s-1.5-1.1-2.8-1.1c-1.7,0-2.9,0.5-3.7,1.5c-0.8,1-1.2,2.7-1.2,5.1v9.5h-4v-26.9h4
											v6.8c0,1.1-0.1,2.3-0.2,3.5h0.3c0.5-0.9,1.3-1.6,2.3-2.1s2.1-0.8,3.4-0.8c4.5,0,6.8,2.3,6.8,7L98,210.8L98,210.8z"/>
										<path d="M113.1,191.3c0.8,0,1.5,0.1,2,0.2l-0.4,3.8c-0.6-0.1-1.2-0.2-1.8-0.2c-1.6,0-2.9,0.5-3.9,1.6s-1.5,2.4-1.5,4.1v10h-4v-19.1
											h3.1l0.5,3.4h0.2c0.6-1.1,1.4-2,2.4-2.7S111.9,191.3,113.1,191.3z"/>
										<path d="M126.7,211.2c-2.9,0-5.2-0.9-6.8-2.6c-1.6-1.7-2.5-4.1-2.5-7.2c0-3.1,0.8-5.6,2.3-7.4c1.5-1.8,3.6-2.7,6.3-2.7
											c2.5,0,4.4,0.8,5.9,2.3c1.4,1.5,2.2,3.6,2.2,6.3v2.2h-12.5c0.1,1.9,0.5,3.3,1.5,4.3c0.9,1,2.2,1.5,3.9,1.5c1.1,0,2.1-0.1,3.1-0.3
											s2-0.6,3.1-1.1v3.3c-1,0.5-2,0.8-2.9,1C129.1,211.1,128,211.2,126.7,211.2z M126,194.4c-1.3,0-2.3,0.4-3,1.2
											c-0.8,0.8-1.2,2-1.4,3.6h8.5c0-1.6-0.4-2.8-1.1-3.6C128.2,194.8,127.2,194.4,126,194.4z"/>
										<path fill="#dd0004" d="M147.8,210.8v-25.3h5.2v20.9h10v4.4L147.8,210.8L147.8,210.8z"/>
										<path fill="#dd0004" d="M175.5,211.2c-3,0-5.4-0.9-7.1-2.6c-1.7-1.7-2.6-4.2-2.6-7.3c0-3.2,0.8-5.7,2.4-7.5c1.6-1.8,3.8-2.7,6.6-2.7
											c2.7,0,4.8,0.8,6.2,2.3s2.2,3.7,2.2,6.5v2.6H171c0.1,1.5,0.5,2.7,1.3,3.5s2,1.3,3.4,1.3c1.1,0,2.2-0.1,3.2-0.4
											c1-0.2,2.1-0.6,3.2-1.2v4.1c-0.9,0.5-1.9,0.8-2.9,1C178.3,211.1,177,211.2,175.5,211.2z M174.8,194.9c-1.1,0-2,0.4-2.6,1.1
											c-0.6,0.7-1,1.7-1.1,3h7.2c0-1.3-0.4-2.3-1-3C176.8,195.2,175.9,194.9,174.8,194.9z"/>
										<path fill="#dd0004" d="M200.7,205.1c0,2-0.7,3.5-2,4.5s-3.4,1.6-6.1,1.6c-1.4,0-2.6-0.1-3.5-0.3c-1-0.2-1.9-0.5-2.7-0.8v-4.4
											c1,0.5,2,0.8,3.2,1.2c1.2,0.3,2.3,0.5,3.2,0.5c1.9,0,2.8-0.6,2.8-1.7c0-0.4-0.1-0.8-0.4-1c-0.2-0.3-0.7-0.6-1.3-0.9
											c-0.6-0.3-1.4-0.7-2.4-1.2c-1.5-0.6-2.5-1.2-3.2-1.7s-1.2-1.1-1.5-1.8s-0.5-1.5-0.5-2.5c0-1.7,0.7-3,2-4c1.3-0.9,3.2-1.4,5.5-1.4
											s4.5,0.5,6.7,1.5l-1.6,3.8c-0.9-0.4-1.8-0.8-2.7-1c-0.8-0.3-1.7-0.4-2.5-0.4c-1.5,0-2.3,0.4-2.3,1.3c0,0.5,0.2,0.9,0.7,1.2
											s1.6,0.9,3.2,1.5c1.5,0.6,2.6,1.2,3.3,1.7s1.2,1.1,1.5,1.8S200.7,204.1,200.7,205.1z"/>
										<path fill="#dd0004" d="M213.3,211.2c-3,0-5.4-0.9-7.1-2.6c-1.7-1.7-2.6-4.2-2.6-7.3c0-3.2,0.8-5.7,2.4-7.5c1.6-1.8,3.8-2.7,6.6-2.7
											c2.7,0,4.8,0.8,6.2,2.3s2.2,3.7,2.2,6.5v2.6h-12.2c0.1,1.5,0.5,2.7,1.3,3.5s2,1.3,3.4,1.3c1.1,0,2.2-0.1,3.2-0.4
											c1-0.2,2.1-0.6,3.2-1.2v4.1c-0.9,0.5-1.9,0.8-2.9,1C216,211.1,214.7,211.2,213.3,211.2z M212.5,194.9c-1.1,0-2,0.4-2.6,1.1
											c-0.6,0.7-1,1.7-1.1,3h7.2c0-1.3-0.4-2.3-1-3C214.5,195.2,213.6,194.9,212.5,194.9z"/>
										<path fill="#dd0004" d="M235.7,191.1c0.7,0,1.3,0.1,1.7,0.2l-0.4,5c-0.4-0.1-0.9-0.2-1.5-0.2c-1.6,0-2.9,0.4-3.9,1.3
											c-0.9,0.9-1.4,2.1-1.4,3.6v9.8H225v-19.3h3.9l0.8,3.3h0.3c0.6-1.1,1.4-2,2.4-2.6S234.6,191.1,235.7,191.1z"/>
										<path fill="#dd0004" d="M249.9,183.9l-0.7,6.4l6.3-1.8l0.6,4.4l-5.8,0.4l3.8,5.1l-3.8,2.1l-2.6-5.4l-2.3,5.4l-4-2.1l3.7-5.1l-5.7-0.5
											l0.7-4.3l6.2,1.8l-0.7-6.4L249.9,183.9L249.9,183.9z"/>
										<path fill="#dd0004" d="M259.6,186.5c0-1.7,0.9-2.6,2.8-2.6s2.8,0.9,2.8,2.6c0,0.8-0.2,1.5-0.7,1.9s-1.2,0.7-2.1,0.7
											C260.5,189.1,259.6,188.2,259.6,186.5z M265,210.8h-5.2v-19.3h5.2V210.8z"/>
										<path fill="#dd0004" d="M287.9,210.8h-5.2v-11.3c0-1.4-0.2-2.4-0.7-3.1s-1.3-1-2.3-1c-1.4,0-2.5,0.5-3.1,1.5s-1,2.6-1,4.9v9.1h-5.2
											v-19.3h3.9l0.7,2.5h0.3c0.6-0.9,1.4-1.6,2.4-2.1s2.2-0.7,3.4-0.7c2.2,0,3.9,0.6,5,1.8s1.7,3,1.7,5.3v12.4H287.9z"/>
										<path fill="#dd0004" d="M310.7,210.8h-5.2v-11.3c0-1.4-0.2-2.4-0.7-3.1s-1.3-1-2.3-1c-1.4,0-2.5,0.5-3.1,1.5s-1,2.6-1,4.9v9.1h-5.2
											v-19.3h3.9l0.7,2.5h0.3c0.6-0.9,1.4-1.6,2.4-2.1s2.2-0.7,3.4-0.7c2.2,0,3.9,0.6,5,1.8s1.7,3,1.7,5.3v12.4H310.7z"/>
										<path fill="#dd0004" d="M324.6,211.2c-3,0-5.4-0.9-7.1-2.6c-1.7-1.7-2.6-4.2-2.6-7.3c0-3.2,0.8-5.7,2.4-7.5s3.8-2.7,6.6-2.7
											c2.7,0,4.8,0.8,6.2,2.3s2.2,3.7,2.2,6.5v2.6h-12.2c0.1,1.5,0.5,2.7,1.3,3.5s2,1.3,3.4,1.3c1.1,0,2.2-0.1,3.2-0.4
											c1-0.2,2.1-0.6,3.2-1.2v4.1c-0.9,0.5-1.9,0.8-2.9,1C327.3,211.1,326.1,211.2,324.6,211.2z M323.8,194.9c-1.1,0-2,0.4-2.6,1.1
											c-0.6,0.7-1,1.7-1.1,3h7.2c0-1.3-0.4-2.3-1-3C325.8,195.2,324.9,194.9,323.8,194.9z"/>
										<path fill="#dd0004" d="M354,210.8h-5.2v-11.3c0-1.4-0.2-2.4-0.7-3.1s-1.3-1-2.3-1c-1.4,0-2.5,0.5-3.1,1.5s-1,2.6-1,4.9v9.1h-5.2
											v-19.3h3.9l0.7,2.5h0.3c0.6-0.9,1.4-1.6,2.4-2.1s2.2-0.7,3.4-0.7c2.2,0,3.9,0.6,5,1.8s1.7,3,1.7,5.3v12.4H354z"/>
									</g>
									<g id="weiblich-text" class="text">
										<path d="M80.8,210.8v-25.3h4v25.3H80.8z"/>
										<path d="M107.5,210.8h-4V199c0-1.5-0.3-2.6-0.9-3.3s-1.5-1.1-2.8-1.1c-1.7,0-2.9,0.5-3.7,1.5c-0.8,1-1.2,2.7-1.2,5.1v9.5h-4v-26.9
											h4v6.8c0,1.1-0.1,2.3-0.2,3.5H95c0.5-0.9,1.3-1.6,2.3-2.1s2.1-0.8,3.4-0.8c4.5,0,6.8,2.3,6.8,7
											C107.5,198.2,107.5,210.8,107.5,210.8z"/>
										<path d="M122.5,191.3c0.8,0,1.5,0.1,2,0.2l-0.4,3.8c-0.6-0.1-1.2-0.2-1.8-0.2c-1.6,0-2.9,0.5-3.9,1.6s-1.5,2.4-1.5,4.1v10h-4v-19.1
											h3.1l0.5,3.4h0.2c0.6-1.1,1.4-2,2.4-2.7S121.4,191.3,122.5,191.3z"/>
										<path d="M136.2,211.2c-2.9,0-5.2-0.9-6.8-2.6c-1.6-1.7-2.5-4.1-2.5-7.2c0-3.1,0.8-5.6,2.3-7.4c1.5-1.8,3.6-2.7,6.3-2.7
											c2.5,0,4.4,0.8,5.9,2.3c1.4,1.5,2.2,3.6,2.2,6.3v2.2H131c0.1,1.9,0.5,3.3,1.5,4.3c0.9,1,2.2,1.5,3.9,1.5c1.1,0,2.1-0.1,3.1-0.3
											s2-0.6,3.1-1.1v3.3c-1,0.5-2,0.8-2.9,1C138.6,211.1,137.4,211.2,136.2,211.2z M135.4,194.4c-1.3,0-2.3,0.4-3,1.2
											c-0.8,0.8-1.2,2-1.4,3.6h8.5c0-1.6-0.4-2.8-1.1-3.6C137.7,194.8,136.7,194.4,135.4,194.4z"/>
										<path fill="#dd0004" d="M157.2,210.8v-25.3h5.2v20.9h10v4.4L157.2,210.8L157.2,210.8z"/>
										<path fill="#dd0004" d="M185,211.2c-3,0-5.4-0.9-7.1-2.6c-1.7-1.7-2.6-4.2-2.6-7.3c0-3.2,0.8-5.7,2.4-7.5c1.6-1.8,3.8-2.7,6.6-2.7
											c2.7,0,4.8,0.8,6.2,2.3s2.2,3.7,2.2,6.5v2.6h-12.2c0.1,1.5,0.5,2.7,1.3,3.5s2,1.3,3.4,1.3c1.1,0,2.2-0.1,3.2-0.4
											c1-0.2,2.1-0.6,3.2-1.2v4.1c-0.9,0.5-1.9,0.8-2.9,1C187.7,211.1,186.5,211.2,185,211.2z M184.2,194.9c-1.1,0-2,0.4-2.6,1.1
											c-0.6,0.7-1,1.7-1.1,3h7.2c0-1.3-0.4-2.3-1-3C186.2,195.2,185.3,194.9,184.2,194.9z"/>
										<path fill="#dd0004" d="M210.1,205.1c0,2-0.7,3.5-2,4.5s-3.4,1.6-6.1,1.6c-1.4,0-2.6-0.1-3.5-0.3c-1-0.2-1.9-0.5-2.7-0.8v-4.4
											c1,0.5,2,0.8,3.2,1.2c1.2,0.3,2.3,0.5,3.2,0.5c1.9,0,2.8-0.6,2.8-1.7c0-0.4-0.1-0.8-0.4-1c-0.2-0.3-0.7-0.6-1.3-0.9
											c-0.6-0.3-1.4-0.7-2.4-1.2c-1.5-0.6-2.5-1.2-3.2-1.7s-1.2-1.1-1.5-1.8s-0.5-1.5-0.5-2.5c0-1.7,0.7-3,2-4c1.3-0.9,3.2-1.4,5.5-1.4
											s4.5,0.5,6.7,1.5l-1.6,3.8c-0.9-0.4-1.8-0.8-2.7-1c-0.8-0.3-1.7-0.4-2.5-0.4c-1.5,0-2.3,0.4-2.3,1.3c0,0.5,0.2,0.9,0.7,1.2
											s1.6,0.9,3.2,1.5c1.5,0.6,2.6,1.2,3.3,1.7s1.2,1.1,1.5,1.8S210.1,204.1,210.1,205.1z"/>
										<path fill="#dd0004" d="M222.7,211.2c-3,0-5.4-0.9-7.1-2.6c-1.7-1.7-2.6-4.2-2.6-7.3c0-3.2,0.8-5.7,2.4-7.5c1.6-1.8,3.8-2.7,6.6-2.7
											c2.7,0,4.8,0.8,6.2,2.3s2.2,3.7,2.2,6.5v2.6h-12.2c0.1,1.5,0.5,2.7,1.3,3.5s2,1.3,3.4,1.3c1.1,0,2.2-0.1,3.2-0.4
											c1-0.2,2.1-0.6,3.2-1.2v4.1c-0.9,0.5-1.9,0.8-2.9,1C225.4,211.1,224.2,211.2,222.7,211.2z M222,194.9c-1.1,0-2,0.4-2.6,1.1
											c-0.6,0.7-1,1.7-1.1,3h7.2c0-1.3-0.4-2.3-1-3C223.9,195.2,223.1,194.9,222,194.9z"/>
										<path fill="#dd0004" d="M245.2,191.1c0.7,0,1.3,0.1,1.7,0.2l-0.4,5c-0.4-0.1-0.9-0.2-1.5-0.2c-1.6,0-2.9,0.4-3.9,1.3
											c-0.9,0.9-1.4,2.1-1.4,3.6v9.8h-5.2v-19.3h3.9l0.8,3.3h0.3c0.6-1.1,1.4-2,2.4-2.6S244,191.1,245.2,191.1z"/>
										<path fill="#dd0004" d="M250.2,186.5c0-1.7,0.9-2.6,2.8-2.6s2.8,0.9,2.8,2.6c0,0.8-0.2,1.5-0.7,1.9s-1.2,0.7-2.1,0.7
											C251.1,189.1,250.2,188.2,250.2,186.5z M255.5,210.8h-5.2v-19.3h5.2V210.8z"/>
										<path fill="#dd0004" d="M278.4,210.8h-5.2v-11.3c0-1.4-0.2-2.4-0.7-3.1s-1.3-1-2.3-1c-1.4,0-2.5,0.5-3.1,1.5s-1,2.6-1,4.9v9.1H261
											v-19.3h3.9l0.7,2.5h0.3c0.6-0.9,1.4-1.6,2.4-2.1s2.2-0.7,3.4-0.7c2.2,0,3.9,0.6,5,1.8s1.7,3,1.7,5.3V210.8z"/>
										<path fill="#dd0004" d="M301.2,210.8H296v-11.3c0-1.4-0.2-2.4-0.7-3.1s-1.3-1-2.3-1c-1.4,0-2.5,0.5-3.1,1.5s-1,2.6-1,4.9v9.1h-5.2
											v-19.3h3.9l0.7,2.5h0.3c0.6-0.9,1.4-1.6,2.4-2.1s2.2-0.7,3.4-0.7c2.2,0,3.9,0.6,5,1.8s1.7,3,1.7,5.3v12.4H301.2z"/>
										<path fill="#dd0004" d="M315.1,211.2c-3,0-5.4-0.9-7.1-2.6c-1.7-1.7-2.6-4.2-2.6-7.3c0-3.2,0.8-5.7,2.4-7.5s3.8-2.7,6.6-2.7
											c2.7,0,4.8,0.8,6.2,2.3s2.2,3.7,2.2,6.5v2.6h-12.2c0.1,1.5,0.5,2.7,1.3,3.5s2,1.3,3.4,1.3c1.1,0,2.2-0.1,3.2-0.4
											c1-0.2,2.1-0.6,3.2-1.2v4.1c-0.9,0.5-1.9,0.8-2.9,1C317.9,211.1,316.6,211.2,315.1,211.2z M314.4,194.9c-1.1,0-2,0.4-2.6,1.1
											c-0.6,0.7-1,1.7-1.1,3h7.2c0-1.3-0.4-2.3-1-3C316.4,195.2,315.5,194.9,314.4,194.9z"/>
										<path fill="#dd0004" d="M344.5,210.8h-5.2v-11.3c0-1.4-0.2-2.4-0.7-3.1s-1.3-1-2.3-1c-1.4,0-2.5,0.5-3.1,1.5s-1,2.6-1,4.9v9.1H327
											v-19.3h3.9l0.7,2.5h0.3c0.6-0.9,1.4-1.6,2.4-2.1s2.2-0.7,3.4-0.7c2.2,0,3.9,0.6,5,1.8s1.7,3,1.7,5.3v12.4H344.5z"/>
									</g>
									<g id="mann-text" class="text">
										<path d="M130.6,210.8v-25.3h4v25.3H130.6z"/>
										<path d="M157.2,210.8h-4V199c0-1.5-0.3-2.6-0.9-3.3c-0.6-0.7-1.5-1.1-2.8-1.1c-1.7,0-2.9,0.5-3.7,1.5s-1.2,2.7-1.2,5.1v9.5h-4
											v-26.9h4v6.8c0,1.1-0.1,2.3-0.2,3.5h0.3c0.5-0.9,1.3-1.6,2.3-2.1s2.1-0.8,3.4-0.8c4.5,0,6.8,2.3,6.8,7L157.2,210.8L157.2,210.8z"/>
										<path d="M172.3,191.3c0.8,0,1.5,0.1,2,0.2l-0.4,3.8c-0.6-0.1-1.2-0.2-1.8-0.2c-1.6,0-2.9,0.5-3.9,1.6s-1.5,2.4-1.5,4.1v10h-4v-19.1
											h3.1l0.5,3.4h0.2c0.6-1.1,1.4-2,2.4-2.7S171.1,191.3,172.3,191.3z"/>
										<path d="M185.9,211.2c-2.9,0-5.2-0.9-6.8-2.6c-1.6-1.7-2.5-4.1-2.5-7.2c0-3.1,0.8-5.6,2.3-7.4c1.5-1.8,3.6-2.7,6.3-2.7
											c2.5,0,4.4,0.8,5.9,2.3c1.4,1.5,2.2,3.6,2.2,6.3v2.2h-12.5c0.1,1.9,0.5,3.3,1.5,4.3c0.9,1,2.2,1.5,3.9,1.5c1.1,0,2.1-0.1,3.1-0.3
											s2-0.6,3.1-1.1v3.3c-1,0.5-2,0.8-2.9,1C188.3,211.1,187.2,211.2,185.9,211.2z M185.2,194.4c-1.3,0-2.3,0.4-3,1.2
											c-0.8,0.8-1.2,2-1.4,3.6h8.5c0-1.6-0.4-2.8-1.1-3.6C187.4,194.8,186.4,194.4,185.2,194.4z"/>
										<path fill="#dd0004" d="M206.9,210.8v-25.3h5.2v20.9h10v4.4L206.9,210.8L206.9,210.8z"/>
										<path fill="#dd0004" d="M234.7,211.2c-3,0-5.4-0.9-7.1-2.6c-1.7-1.7-2.6-4.2-2.6-7.3c0-3.2,0.8-5.7,2.4-7.5c1.6-1.8,3.8-2.7,6.6-2.7
											c2.7,0,4.8,0.8,6.2,2.3s2.2,3.7,2.2,6.5v2.6h-12.2c0.1,1.5,0.5,2.7,1.3,3.5s2,1.3,3.4,1.3c1.1,0,2.2-0.1,3.2-0.4
											c1-0.2,2.1-0.6,3.2-1.2v4.1c-0.9,0.5-1.9,0.8-2.9,1C237.4,211.1,236.2,211.2,234.7,211.2z M234,194.9c-1.1,0-2,0.4-2.6,1.1
											c-0.6,0.7-1,1.7-1.1,3h7.2c0-1.3-0.4-2.3-1-3C235.9,195.2,235.1,194.9,234,194.9z"/>
										<path fill="#dd0004" d="M259.8,205.1c0,2-0.7,3.5-2,4.5s-3.4,1.6-6.1,1.6c-1.4,0-2.6-0.1-3.5-0.3c-1-0.2-1.9-0.5-2.7-0.8v-4.4
											c1,0.5,2,0.8,3.2,1.2c1.2,0.3,2.3,0.5,3.2,0.5c1.9,0,2.8-0.6,2.8-1.7c0-0.4-0.1-0.8-0.4-1c-0.2-0.3-0.7-0.6-1.3-0.9
											c-0.6-0.3-1.4-0.7-2.4-1.2c-1.5-0.6-2.5-1.2-3.2-1.7s-1.2-1.1-1.5-1.8s-0.5-1.5-0.5-2.5c0-1.7,0.7-3,2-4c1.3-0.9,3.2-1.4,5.5-1.4
											s4.5,0.5,6.7,1.5l-1.6,3.8c-0.9-0.4-1.8-0.8-2.7-1c-0.8-0.3-1.7-0.4-2.5-0.4c-1.5,0-2.3,0.4-2.3,1.3c0,0.5,0.2,0.9,0.7,1.2
											s1.6,0.9,3.2,1.5c1.5,0.6,2.6,1.2,3.3,1.7c0.7,0.5,1.2,1.1,1.5,1.8S259.8,204.1,259.8,205.1z"/>
										<path fill="#dd0004" d="M272.4,211.2c-3,0-5.4-0.9-7.1-2.6c-1.7-1.7-2.6-4.2-2.6-7.3c0-3.2,0.8-5.7,2.4-7.5s3.8-2.7,6.6-2.7
											c2.7,0,4.8,0.8,6.2,2.3s2.2,3.7,2.2,6.5v2.6H268c0.1,1.5,0.5,2.7,1.3,3.5s2,1.3,3.4,1.3c1.1,0,2.2-0.1,3.2-0.4
											c1-0.2,2.1-0.6,3.2-1.2v4.1c-0.9,0.5-1.9,0.8-2.9,1C275.2,211.1,273.9,211.2,272.4,211.2z M271.7,194.9c-1.1,0-2,0.4-2.6,1.1
											c-0.6,0.7-1,1.7-1.1,3h7.2c0-1.3-0.4-2.3-1-3C273.7,195.2,272.8,194.9,271.7,194.9z"/>
										<path fill="#dd0004" d="M294.9,191.1c0.7,0,1.3,0.1,1.7,0.2l-0.4,5c-0.4-0.1-0.9-0.2-1.5-0.2c-1.6,0-2.9,0.4-3.9,1.3
											c-0.9,0.9-1.4,2.1-1.4,3.6v9.8h-5.2v-19.3h3.9l0.8,3.3h0.3c0.6-1.1,1.4-2,2.4-2.6S293.8,191.1,294.9,191.1z"/>
									</g>
									<g>
										<path d="M97.1,252.9h-4v-11.8c0-1.5-0.3-2.6-0.9-3.3c-0.6-0.7-1.5-1.1-2.8-1.1c-1.7,0-2.9,0.5-3.7,1.5c-0.8,1-1.2,2.7-1.2,5.1v9.5
											h-4v-26.9h4v6.8c0,1.1-0.1,2.3-0.2,3.5h0.3c0.5-0.9,1.3-1.6,2.3-2.1s2.1-0.8,3.4-0.8c4.5,0,6.8,2.3,6.8,7L97.1,252.9L97.1,252.9z"
											/>
										<path d="M114.3,252.9l-0.8-2.7h-0.1c-0.9,1.2-1.8,2-2.7,2.4c-0.9,0.4-2.1,0.6-3.5,0.6c-1.8,0-3.3-0.5-4.3-1.5s-1.5-2.5-1.5-4.3
											c0-2,0.7-3.5,2.2-4.5s3.6-1.6,6.6-1.6l3.2-0.1v-1c0-1.2-0.3-2.1-0.8-2.7c-0.6-0.6-1.4-0.9-2.6-0.9c-1,0-1.9,0.1-2.8,0.4
											s-1.7,0.6-2.5,1l-1.3-2.9c1-0.5,2.1-1,3.3-1.2c1.2-0.3,2.3-0.4,3.4-0.4c2.4,0,4.2,0.5,5.4,1.6s1.8,2.7,1.8,5V253L114.3,252.9
											L114.3,252.9z M108.4,250.1c1.4,0,2.6-0.4,3.5-1.2c0.9-0.8,1.3-2,1.3-3.5v-1.7l-2.4,0.1c-1.9,0.1-3.2,0.4-4.1,1s-1.3,1.4-1.3,2.6
											c0,0.9,0.2,1.5,0.7,2C106.7,249.9,107.4,250.1,108.4,250.1z"/>
										<path d="M132.3,233.4c2.3,0,4.2,0.9,5.5,2.6s2,4.2,2,7.3c0,3.1-0.7,5.6-2,7.3c-1.3,1.7-3.2,2.6-5.5,2.6c-2.4,0-4.2-0.9-5.5-2.6
											h-0.3l-0.7,2.3h-3V226h4v6.4c0,0.5,0,1.2-0.1,2.1c0,0.9-0.1,1.5-0.1,1.8h0.2C128,234.4,129.8,233.4,132.3,233.4z M131.3,236.7
											c-1.6,0-2.8,0.5-3.5,1.4c-0.7,1-1.1,2.6-1.1,4.8v0.3c0,2.3,0.4,4,1.1,5.1s1.9,1.6,3.5,1.6c1.4,0,2.5-0.6,3.2-1.7s1.1-2.8,1.1-4.9
											C135.6,238.9,134.2,236.7,131.3,236.7z"/>
										<path d="M152.5,253.2c-2.9,0-5.2-0.9-6.8-2.6s-2.5-4.1-2.5-7.2s0.8-5.6,2.3-7.4s3.6-2.7,6.3-2.7c2.5,0,4.4,0.8,5.9,2.3
											c1.4,1.5,2.2,3.6,2.2,6.3v2.2h-12.5c0.1,1.9,0.5,3.3,1.5,4.3c0.9,1,2.2,1.5,3.9,1.5c1.1,0,2.1-0.1,3.1-0.3c1-0.2,2-0.6,3.1-1.1v3.3
											c-1,0.5-2,0.8-2.9,1C154.9,253.1,153.8,253.2,152.5,253.2z M151.8,236.5c-1.3,0-2.3,0.4-3,1.2c-0.8,0.8-1.2,2-1.4,3.6h8.5
											c0-1.6-0.4-2.8-1.1-3.6C154.1,236.9,153.1,236.5,151.8,236.5z"/>
										<path d="M180.8,252.9h-4v-11.8c0-1.5-0.3-2.6-0.9-3.3c-0.6-0.7-1.5-1.1-2.8-1.1c-1.7,0-2.9,0.5-3.7,1.5s-1.2,2.7-1.2,5.1v9.5h-4
											v-19.1h3.1l0.6,2.5h0.2c0.6-0.9,1.4-1.6,2.4-2.1s2.2-0.7,3.5-0.7c4.5,0,6.7,2.3,6.7,7L180.8,252.9L180.8,252.9z"/>
										<path d="M201.7,253.2c-2.3,0-4.2-0.9-5.5-2.6s-2-4.2-2-7.3c0-3.1,0.7-5.6,2-7.3c1.3-1.7,3.2-2.6,5.5-2.6c2.5,0,4.3,0.9,5.6,2.8h0.2
											c-0.2-1.4-0.3-2.5-0.3-3.3v-7h4v26.9h-3.1l-0.7-2.5h-0.2C206,252.3,204.1,253.2,201.7,253.2z M202.7,250c1.6,0,2.8-0.5,3.6-1.4
											s1.1-2.5,1.2-4.6v-0.6c0-2.4-0.4-4.1-1.2-5.1s-2-1.5-3.6-1.5c-1.4,0-2.5,0.6-3.2,1.7c-0.8,1.2-1.1,2.8-1.1,5c0,2.1,0.4,3.7,1.1,4.9
											S201.3,250,202.7,250z"/>
										<path d="M216.7,228.7c0-0.7,0.2-1.3,0.6-1.7c0.4-0.4,0.9-0.6,1.7-0.6c0.7,0,1.2,0.2,1.6,0.6c0.4,0.4,0.6,1,0.6,1.7
											s-0.2,1.2-0.6,1.6s-0.9,0.6-1.6,0.6c-0.7,0-1.3-0.2-1.7-0.6S216.7,229.4,216.7,228.7z M221,252.9h-4v-19.1h4V252.9z"/>
										<path d="M234.8,253.2c-2.9,0-5.2-0.9-6.8-2.6s-2.5-4.1-2.5-7.2s0.8-5.6,2.3-7.4s3.6-2.7,6.3-2.7c2.5,0,4.4,0.8,5.9,2.3
											c1.4,1.5,2.2,3.6,2.2,6.3v2.2h-12.5c0.1,1.9,0.5,3.3,1.5,4.3c0.9,1,2.2,1.5,3.9,1.5c1.1,0,2.1-0.1,3.1-0.3c1-0.2,2-0.6,3.1-1.1v3.3
											c-1,0.5-2,0.8-2.9,1C237.2,253.1,236.1,253.2,234.8,253.2z M234.1,236.5c-1.3,0-2.3,0.4-3,1.2c-0.8,0.8-1.2,2-1.4,3.6h8.5
											c0-1.6-0.4-2.8-1.1-3.6S235.4,236.5,234.1,236.5z"/>
										<path d="M278.9,252.9h-4.4l-4.2-15.1c-0.2-0.7-0.4-1.6-0.7-2.8c-0.3-1.2-0.4-2.1-0.5-2.6c-0.1,0.7-0.3,1.7-0.6,2.9
											s-0.5,2.1-0.6,2.6l-4.1,15h-4.4l-3.2-12.7l-3.2-12.6h4.1l3.5,14.7c0.6,2.4,0.9,4.5,1.2,6.3c0.1-1,0.3-2.1,0.6-3.3
											c0.2-1.2,0.5-2.2,0.7-2.9l4-14.8h4l4.1,14.8c0.4,1.4,0.8,3.4,1.3,6.2c0.2-1.6,0.6-3.8,1.2-6.3l3.5-14.7h4.1L278.9,252.9z"/>
										<path d="M300.2,252.9l-0.8-2.7h-0.1c-0.9,1.2-1.8,2-2.7,2.4c-0.9,0.4-2.1,0.6-3.5,0.6c-1.8,0-3.3-0.5-4.3-1.5s-1.5-2.5-1.5-4.3
											c0-2,0.7-3.5,2.2-4.5s3.6-1.6,6.6-1.6l3.2-0.1v-1c0-1.2-0.3-2.1-0.8-2.7c-0.6-0.6-1.4-0.9-2.6-0.9c-1,0-1.9,0.1-2.8,0.4
											s-1.7,0.6-2.5,1l-1.3-2.9c1-0.5,2.1-1,3.3-1.2c1.2-0.3,2.3-0.4,3.4-0.4c2.4,0,4.2,0.5,5.4,1.6s1.8,2.7,1.8,5V253L300.2,252.9
											L300.2,252.9z M294.2,250.1c1.4,0,2.6-0.4,3.5-1.2c0.9-0.8,1.3-2,1.3-3.5v-1.7l-2.4,0.1c-1.9,0.1-3.2,0.4-4.1,1s-1.3,1.4-1.3,2.6
											c0,0.9,0.2,1.5,0.7,2C292.5,249.9,293.2,250.1,294.2,250.1z"/>
										<path d="M325,252.9h-4v-11.8c0-1.5-0.3-2.6-0.9-3.3c-0.6-0.7-1.5-1.1-2.8-1.1c-1.7,0-2.9,0.5-3.7,1.5c-0.8,1-1.2,2.7-1.2,5.1v9.5
											h-4v-26.9h4v6.8c0,1.1-0.1,2.3-0.2,3.5h0.3c0.5-0.9,1.3-1.6,2.3-2.1s2.1-0.8,3.4-0.8c4.5,0,6.8,2.3,6.8,7L325,252.9L325,252.9z"/>
										<path d="M334.6,252.9h-4V226h4V252.9z"/>
										<path d="M339.7,250.7c0-0.9,0.2-1.5,0.7-1.9s1.1-0.7,1.9-0.7s1.4,0.2,1.8,0.7s0.6,1.1,0.6,1.9s-0.2,1.5-0.7,1.9
											c-0.4,0.5-1,0.7-1.8,0.7s-1.4-0.2-1.9-0.7C339.9,252.2,339.7,251.6,339.7,250.7z M343.7,245.2h-2.9l-0.9-17.6h4.7L343.7,245.2z"/>
									</g>
								</svg>

								<img src="<?= $kirby->url() ?>/assets/img/header-device-mobile.svg" title="Mobile Endgeräte" alt="Smartphone- und Tabletbildschirm zeigen Bilder der akf-servicelease Website" class="header-img">
							</div>
						</div>
					</div>
				</div>
			</div>
		
		
			<?php snippet('layouts', ['field' => $page->layout()])  ?>
		</main>
		
		<!-- FOOTER -->
		<?php snippet('footer') ?>
		
		<!-- ASIDE -->
		<?php snippet('aside') ?>
		
		<!-- BACK-TO-TOP -->
		<?php snippet('back-to-top') ?>
		
		<!-- JS -->
		<?php snippet('js') ?>

	</body>
	
</html>