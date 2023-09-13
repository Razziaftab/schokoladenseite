
<?php
	$nactive = ''; $nuactive = ''; $nsactive = ''; $xactive = ''; $yactive = ''; $xyactive = '';

	if(isset($_COOKIE['gender'])) {
		if($_COOKIE['gender'] == 'nu') {
			$nuactive = 'active';
		} else if($_COOKIE['gender'] == 'ns') {
			$nsactive = 'active';
		} else if($_COOKIE['gender'] == 'x') {
			$xactive = 'active';
		} else if($_COOKIE['gender'] == 'y') {
			$yactive = 'active';
		} else if($_COOKIE['gender'] == 'xy') {
			$xyactive = 'active';
		} else {
			$nactive = 'active';
		}
	} else {
		$nactive = 'active';
	}
?>

<header>
	<div class=" topheader">
		<div class="container">
			<div class="th-gs">
				<p class="gs-doit">Gender-Form wählen:
					<span class="th-gs-switches">
						<span data-gender="n" tabindex="0" class="gender-switch <?= $nactive ?> tooltip" data-tooltip="Gendergerecht Doppelpunkt" aria-label="Gendergerecht Doppelpunkt" role="button">
							<svg class="gs_icon" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22">
								<path id="Pfad_110" data-name="Pfad 110" d="M4,0H18a4,4,0,0,1,4,4V18a4,4,0,0,1-4,4H4a4,4,0,0,1-4-4V4A4,4,0,0,1,4,0Z" fill="#d51317" class="fill"/>
								<path id="Vereinigungsmenge_3" data-name="Vereinigungsmenge 3" d="M-5840,41.035a1.983,1.983,0,0,1,2-1.964,1.982,1.982,0,0,1,2,1.964A1.982,1.982,0,0,1-5838,43,1.983,1.983,0,0,1-5840,41.035Zm0-8.071A1.983,1.983,0,0,1-5838,31a1.982,1.982,0,0,1,2,1.964,1.982,1.982,0,0,1-2,1.965A1.983,1.983,0,0,1-5840,32.964Z" transform="translate(5849 -26)" fill="#fff"/>
							</svg>
						</span>
						<span data-gender="nu" tabindex="0" class="gender-switch <?= $nuactive ?> tooltip" data-tooltip="Gendergerecht Unterstrich"  aria-label="Gendergerecht Unterstrich" role="button">
							<svg class="gs_icon" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22">
								<g id="Gruppe_135" data-name="Gruppe 135" transform="translate(-1137 -14.065)">
									<path id="Pfad_109" data-name="Pfad 109" d="M4,0H18a4,4,0,0,1,4,4V18a4,4,0,0,1-4,4H4a4,4,0,0,1-4-4V4A4,4,0,0,1,4,0Z" transform="translate(1137 14.065)" fill="#d51317" class="fill"/>
									<line id="Linie_13" data-name="Linie 13" x2="9" transform="translate(1143.5 30)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2"/>
								</g>
							</svg>
						</span>
						<span data-gender="ns" tabindex="0" class="gender-switch <?= $nsactive ?> tooltip" data-tooltip="Gendergerecht Stern" aria-label="Gendergerecht Stern" role="button">
							<svg class="gs_icon" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22">
								<g id="Gruppe_134" data-name="Gruppe 134" transform="translate(-1112 -14.065)">
									<path id="Pfad_107" data-name="Pfad 107" d="M4,0H18a4,4,0,0,1,4,4V18a4,4,0,0,1-4,4H4a4,4,0,0,1-4-4V4A4,4,0,0,1,4,0Z" transform="translate(1112 14.065)" fill="#d51317" class="fill"/>
									<path id="Pfad_108" data-name="Pfad 108" d="M1088.514,19.642q.979-.452,1.868-.9t1.416-.663a2.436,2.436,0,0,1,.844-.211,1.3,1.3,0,0,1,.912.354,1.151,1.151,0,0,1,.384.881,1.242,1.242,0,0,1-.188.625.935.935,0,0,1-.4.414,19.332,19.332,0,0,1-4.279,1.115q.421.392,1.04,1.04t.648.693q.226.316.633.783a5.788,5.788,0,0,1,.565.731,1.226,1.226,0,0,1,.158.64,1.156,1.156,0,0,1-.362.844,1.264,1.264,0,0,1-.934.362q-.573,0-1.288-.889a18.758,18.758,0,0,1-1.845-3.194q-1.145,2.079-1.537,2.742a4.568,4.568,0,0,1-.754,1,1.178,1.178,0,0,1-.828.339,1.231,1.231,0,0,1-.927-.384,1.17,1.17,0,0,1-.369-.821,1.06,1.06,0,0,1,.151-.618,22.745,22.745,0,0,1,2.893-3.269q-1.265-.2-2.26-.437a14.05,14.05,0,0,1-2.109-.708.94.94,0,0,1-.354-.415,1.275,1.275,0,0,1-.173-.6,1.149,1.149,0,0,1,.384-.881,1.263,1.263,0,0,1,.881-.354,2.534,2.534,0,0,1,.9.218q.543.219,1.379.633t1.906.927q-.2-.949-.324-2.177t-.128-1.68a1.393,1.393,0,0,1,.354-.957,1.163,1.163,0,0,1,.912-.4,1.147,1.147,0,0,1,.9.4,1.544,1.544,0,0,1,.354,1.062q0,.181-.052.716t-.151,1.3Q1088.634,18.663,1088.514,19.642Z" transform="translate(35.534 4.296)" fill="#fff"/>
								</g>
							</svg>
						</span>
						<span data-gender="x" tabindex="0" class="gender-switch <?= $xactive ?> tooltip" data-tooltip="In weiblicher Form" aria-label="In weiblicher Form" role="button">
							<svg class="gs_icon" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22">
								<g transform="translate(-1110.576 -13.065)">
									<rect id="Rechteck_20" data-name="Rechteck 20" width="22" height="22" rx="4" transform="translate(1110.576 13.065)" fill="#d51317" class="fill"/>
									<path id="Pfad_34" data-name="Pfad 34" d="M902.714,116.378a4.989,4.989,0,1,0-5.988,4.886v1.1h-1a1,1,0,0,0,0,2h1v1a1,1,0,1,0,2,0v-1h1a1,1,0,1,0,0-2h-.989v-1.1A5,5,0,0,0,902.714,116.378Zm-7.982,0a2.993,2.993,0,1,1,2.993,2.993A3,3,0,0,1,894.732,116.378Z" transform="translate(223.839 -95.027)" fill="#fff"/>
								</g>
							</svg>

						</span>
						<span data-gender="y" tabindex="0" class="gender-switch <?= $yactive ?> tooltip" data-tooltip="In männlicher Form" aria-label="In männlicher Form" role="button">
							<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22">
								<g transform="translate(-1135.576 -13.065)">
									<rect width="22" height="22" rx="4" transform="translate(1135.576 13.065)" fill="#d51317" class="fill"/>
									<path d="M172.639,98.112c0-.03.012-.058.01-.089a.983.983,0,0,0-.031-.1,1,1,0,0,0-.059-.2.984.984,0,0,0-.094-.171,1,1,0,0,0-.119-.147.977.977,0,0,0-.152-.124.99.99,0,0,0-.174-.1,1.018,1.018,0,0,0-.184-.055.975.975,0,0,0-.117-.035c-.033,0-.062.01-.094.011s-.061-.013-.093-.011l-5.074.461a1.028,1.028,0,0,0,.092,2.053c.031,0,.062,0,.094,0l2.248-.2-2.407,2.5a5.231,5.231,0,1,0,1.454,1.454l2.406-2.495-.2,2.245a1.029,1.029,0,0,0,.931,1.118c.032,0,.063,0,.094,0a1.029,1.029,0,0,0,1.023-.935l.462-5.075A.97.97,0,0,0,172.639,98.112ZM163.595,109.4a3.163,3.163,0,1,1,3.163-3.163A3.167,3.167,0,0,1,163.595,109.4Z" transform="translate(980.897 -80.127)" fill="#fff"/>
								</g>
							</svg>

						</span>
						<span data-gender="xy" tabindex="0" class="gender-switch <?= $xyactive ?> tooltip" data-tooltip="Barrierefrei in Paarform" aria-label="Barrierefrei in Paarform" role="button">
							<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26">
								<path d="M4,0H22a4,4,0,0,1,4,4V22a4,4,0,0,1-4,4H4a4,4,0,0,1-4-4V4A4,4,0,0,1,4,0Z" fill="#d51317" class="fill"/>
								<g transform="translate(0 -2)">
									<path id="Pfad_113" data-name="Pfad 113" d="M695.154,403.16h-10a2,2,0,0,1,0-4h10a2,2,0,0,1,0,4Z" transform="translate(-677.154 -382.16)" fill="#fff"/>
									<path id="Pfad_114" data-name="Pfad 114" d="M695.154,403.16h-10a2,2,0,0,1,0-4h10a2,2,0,0,1,0,4Z" transform="translate(-677.154 -390.16)" fill="#fff"/>
								</g>
							</svg>
						</span>
						<a href="/gender-selector" title="Sie wollen mehr über den Gender Selector erfahren?" class="gender_selector_whatis tooltip" aria-label="Sie wollen mehr über den Gender Selector erfahren?" data-tooltip="Sie wollen mehr über den Gender Selector erfahren?">
							<svg xmlns='http://www.w3.org/2000/svg' width='22' height='22' viewBox='0 0 22 22'>
								<g id='Gruppe_38' data-name='Gruppe 38' transform='translate(-1213 -15)'>
									<rect id='Rechteck_21' data-name='Rechteck 21' width='22' height='22' rx='4' transform='translate(1213 15)' fill='#222'/>
									<path id='Pfad_41' data-name='Pfad 41' d='M.879-11.522a2.628,2.628,0,0,1,.443-1.4A3.414,3.414,0,0,1,2.616-14.1,4.071,4.071,0,0,1,4.6-14.561a4.237,4.237,0,0,1,1.861.389,3.017,3.017,0,0,1,1.247,1.058,2.594,2.594,0,0,1,.44,1.454A2.248,2.248,0,0,1,7.9-10.577a3.315,3.315,0,0,1-.6.8q-.345.338-1.239,1.138a5.045,5.045,0,0,0-.4.4,1.609,1.609,0,0,0-.222.313,1.534,1.534,0,0,0-.113.283q-.04.142-.12.5a.809.809,0,0,1-.865.756.884.884,0,0,1-.636-.247.971.971,0,0,1-.258-.734A2.7,2.7,0,0,1,3.641-8.43a2.685,2.685,0,0,1,.5-.785,11.508,11.508,0,0,1,.843-.8q.465-.407.672-.614a2.085,2.085,0,0,0,.349-.462,1.116,1.116,0,0,0,.142-.552,1.284,1.284,0,0,0-.432-.981,1.579,1.579,0,0,0-1.116-.4,1.544,1.544,0,0,0-1.178.4,3.216,3.216,0,0,0-.64,1.188q-.247.821-.938.821a.922.922,0,0,1-.687-.287A.878.878,0,0,1,.879-11.522ZM4.426-3.556a1.144,1.144,0,0,1-.774-.287,1.007,1.007,0,0,1-.331-.8,1.035,1.035,0,0,1,.32-.77,1.08,1.08,0,0,1,.785-.313,1.047,1.047,0,0,1,.77.313,1.047,1.047,0,0,1,.313.77,1.015,1.015,0,0,1-.327.8A1.1,1.1,0,0,1,4.426-3.556Z' transform='translate(1219.249 34.89)' fill='#fff'/>
								</g>
							</svg>
						</a>
					</span>
				</p>
			</div>
			
			<div class="th-center">
				<div class="theme-toogle tooltip" tabindex="0" aria-label="Anzeigemodus wechseln" data-tooltip="Anzeigemodus wechseln" role="button">
					<span></span>
				</div>
			</div>
		
			<div class="th-left append-mail">
				<a href="tel:+494023686130" title="Agentur anrufen"><i class="fas fa-phone-square"></i><span class="hidden-th"> 040 23 68 61 30</span></a>
			</div>
			
			<div class="th-right">
				<div class="th-social">
					<a href="https://www.facebook.com/schokoladenseite.net" target="_blank" title="SCHOKOLADENSEITE.net Facebook Profil (Öffnet im neuen Tab)" class="header-icon facebook" rel="noopener"></a>
					<a href="https://www.xing.com/companies/schokoladenseite.netvisuellekommunikationgmbh" target="_blank" title="SCHOKOLADENSEITE.net Xing Profil (Öffnet im neuen Tab)" class="header-icon xing" rel="noopener"></i></a>
					<a href="https://de.linkedin.com/company/schokoladenseite-net-visuelle-kommunikation-gmbh" target="_blank" title="SCHOKOLADENSEITE.net LinkedIn Profil (Öffnet im neuen Tab)" class="header-icon linkedin" rel="noopener"></i></a>
					<a href="https://www.kununu.com/de/schokoladenseitenet-visuelle-kommunikation?utm_source=widget&utm_campaign=widget_selfservice_scoreandreview" target="_blank" title="SCHOKOLADENSEITE.net Kununu Profil (Öffnet im neuen Tab)" class="header-icon kununu" rel="noopener"></a>
				</div>
			</div>

			<?php if($page->template() == 'xxx'): ?>
				<div class="language-switch">
					<?php foreach($kirby->languages() as $language): ?>
						<?php if($language == $kirby->language()): ?>
							<span><?= $language->code() ?></span>
						<?php else: ?>
							<span><a href="<?= $page->url($language->code()) ?>"><?= $language->code() ?></a></span>
						<?php endif ?>
					<?php endforeach ?>
				</div>
			<?php endif ?>
		</div>
	</div>

  	<div class="container">
		<a href="<?= $kirby->url() ?>/" class="logo" title="SCHOKOLADENSEITE.net">
			<img src="<?= $kirby->url() ?>/assets/img/logo-light.svg" class="light" alt="Logo SCHOKOLADENSEITE.net - zur Startseite">
			<img src="<?= $kirby->url() ?>/assets/img/logo-dark.svg" class="dark" alt="Logo SCHOKOLADENSEITE.net - zur Startseite">
		</a>

		<div class="toggle-nav" title="Seitennavigation öffnen" aria-haspopup="menu" role="button" tabindex="0" aria-label="Seitennavigation öffnen" aria-expanded="false">
			<span></span>
			<span></span>
			<span></span>
		</div>


		<nav class="nav">
		
			<ul>		
				<?php foreach ($site->mainnav()->toStructure() as $item): ?>
					<?php $mainMenuItem = $item->mainMenu()->toPage() ?>
					<?php $subMenuItem = $item->subMenu()->toPages() ?>
				
					<?php if ($item->subMenu()->isNotEmpty() || $item->hasSubmenu()->toBool() === true): ?> 
						<li class="drop<?php e($mainMenuItem->isOpen(), ' active') ?>">
							<div class="dd-container">
								<a class="main" href="<?= $mainMenuItem->url() ?>" tabindex="0" aria-haspopup="true" aria-expanded="false" title="<?= $mainMenuItem->title()->html() ?>" <?php e($mainMenuItem->isOpen(), ' aria-current="page"') ?>><?= $mainMenuItem->title()->html() ?></a>
								<span class="drop-icon" aria-haspopup="menu" role="button" tabindex="0" aria-label="Untermenü öffnen" aria-expanded="false"><i class="fas fa-angle-down"></i></span>
							</div>
												
							<?php if ($item->hasSubmenu()->toBool() === true): ?> 								
								<ul class="mega-menu-top" aria-hidden="true">
									<?php foreach ($site->subnav()->toStructure() as $child): ?>
										<?php $subMenuItem = $child->mainMenu()->toPage() ?>
										<?php $subsubMenuItem = $child->subMenu()->toPages() ?>
									
										<li <?php e($subMenuItem->isOpen(), 'class="active"') ?>>
											<span class="dropdown-item hl">
												<b>
													<a class="<?php e($subMenuItem->isOpen(), ' active') ?>"  <?php e($mainMenuItem->isOpen(), ' aria-current="page"') ?>href="<?= $subMenuItem->url() ?>" tabindex="0" title="<?= $subMenuItem->title()->html() ?>">
														<?= $subMenuItem->title()->html() ?><i class="fas fa-chevron-circle-right menu-icon"></i>
													</a>
												</b>
											</span>
											<ul class="mega-menu">
												<?php foreach ($subsubMenuItem as $grandchild): ?>
													<li>
														<a class="dropdown-item<?php e($grandchild->isOpen(), ' active') ?>" <?php e($grandchild->isOpen(), ' aria-current="page"') ?> href="<?= $grandchild->url() ?>" tabindex="0" title="<?= $grandchild->title()->html() ?>">
															<?= $grandchild->title()->html() ?>
														</a>
													</li>
												<?php endforeach ?>
											</ul>
										</li>
									<?php endforeach ?>
								</ul>
							<?php else: ?>							
								<ul aria-hidden="true">
								   <?php foreach ($subMenuItem as $child): ?>
										<li>										
											<a class="dropdown-item<?php e($child->isOpen(), ' active') ?>" <?php e($child->isOpen(), ' aria-current="page"') ?> href="<?= $child->url() ?>" tabindex="0" title="<?= $child->title()->html() ?>">
												<?= $child->title()->html() ?>
											</a>
										</li>
									<?php endforeach ?>
								</ul>
							<?php endif ?>
						</li>
					<?php else: ?>
						<li <?php e($mainMenuItem->isOpen(), 'class="active"') ?>>
							<a class="main" href="<?= $mainMenuItem->url() ?>" <?php e($mainMenuItem->isOpen(), ' aria-current="page"') ?> tabindex="0" title="<?= $mainMenuItem->title()->html() ?>"><?= $mainMenuItem->title()->html() ?></a>
						</li>
					<?php endif ?>
					
					</li>	
				<?php endforeach ?>
			</ul>
		</nav>
		
	</div>
</header>


