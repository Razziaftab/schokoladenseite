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
			<div class="hero-maps">
				<a title="Google Maps" href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2369.530778871378!2d9.977661315982894!3d53.56614316592574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47b18f1e40cce5c9%3A0xf2c14118710e3b2b!2sRentzelstra%C3%9Fe%2016%2C%2020146%20Hamburg!5e0!3m2!1sde!2sde!4v1582196128336!5m2!1sde!2sde"></a>
			</div>

			<?php snippet('layouts', ['field' => $page->layout()])  ?>

			<div class="bg-lightgrey">
				<div class="row flex" id="hero">
					<div class="column-3">
						<img src="<?= $kirby->url() ?>/assets/img/super-hero.svg" alt="SCHOKO-Monster im Superheldenkostüm"/>
					</div>
					<div class="column-9">
						<h2>Rufen Sie uns an: <a href="tel:+494023686130">+49 4023 686130</h2>
						<p>Wir helfen Ihnen gerne.</p>
						<a href="tel:+494023686130" class="btn -primary">Jetzt anrufen <i class="fas fa-mobile-alt"></i></a>
					</div>
				</div>
			</div>

		</main>

		<!-- FOOTER -->
		<?php snippet('footer') ?>

		<!-- BACK-TO-TOP -->
		<?php snippet('back-to-top') ?>

		<!-- JS -->
		<?php snippet('js') ?>

	</body>

</html>
