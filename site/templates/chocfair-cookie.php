<!DOCTYPE html>
<html lang="de" data-lt-installed="true">

	<!-- HEAD -->
	<?php snippet('head') ?>

	<!-- BODY -->
	<body>
	
		<a id="skip-content" href="#main">Zum Inhaltsbereich wechseln.</a>

		<!-- HEADER -->
		<?php snippet('header') ?>

		<!-- MAIN -->
		<main id="main">
			<div class="chocfair-cookie page-header" aria-labelledby="chocfair-cookie" id="chocfair-cookie">

				<div class="row flex">
					<div class="column-8">
						<div class="col-inner">
							<img src="<?= $kirby->url() ?>/assets/img/schoki-cookie-logo.svg" alt="chocfair cookie Logo" class="logo_gender_selector">
						</div>
					</div>
					<div class="column-4">
						<div class="col-inner">
							<div class="logo_gender_selector_ani">
								<img src="<?= $kirby->url() ?>/assets/img/header-chocfair-cookie-device.svg" title="chocfair cookie auf Handy" alt="" class="header-img">
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
