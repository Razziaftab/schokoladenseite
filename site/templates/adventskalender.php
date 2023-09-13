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
		
			<div class="advent-header">
				<div style="background-image:url(<?= $page->fallback()->toFile()->url() ?>)">
					<video id="video-background" autoplay preload="" muted="" playsinline="" loop="" data-keepplaying="">
						<?php foreach($page->bild()->toFiles() as $video): ?>
							<source src="<?= $video->url() ?>" type="video/<?= $video->extension() ?>">
						<?php endforeach ?>
					</video>
				</div>
				<div>
					<h1><?= $page->header() ?></h1>
					<?= $page->text()->kt() ?>
				</div>
			</div>
		
			<div class="adventskalender">

				<?php
					$today = date('j'); 

					/*
					if(date('n')<12 && date('Y')<=2021) {
                        $today = 0;
					}

					if(date('Y')>2021) {
						$today = 0;
					}
					*/

					$sizes = [
						'col-1' => ['col' => 'day', 'class' => ''],
						'col-2' => ['col' => 'day', 'class' => 'big'],
						'col-3' => ['col' => 'day', 'class' => 'very-big']
					];
				?>

				<?php foreach ( $page->children()->listed() as $door): ?>

					<!--<div class="day <?php // array_key_exists($door->size()->value(), $sizes)?$sizes[$door->size()->value()]['class']:'' ?>" <?php // $door->door()->toInt() <= $today?'onclick="location.href=\''.$door->url().'\';"':'' ?>>-->
					<a tabindex="0" 
						 aria-label="Adventkalendertürchen <?= $door->door(); ?> öffnen" 
						 title="Adventkalendertürchen <?= $door->door(); ?> öffnen" 
						 class="day <?= array_key_exists($door->size()->value(), $sizes)?$sizes[$door->size()->value()]['class']:'' ?>" 
						 href="<?= $door->url() ?>">
						<div class="container-day active">
							<div class="overlay-active">
								<span class="day-nr"><?= $door->door(); ?></span>
							</div>
							<div class="day-img">
							
								<?php
									$headerimage = $door->image();
									
									if($door->size()->value() == 'col-2'){
										$smartphone = $headerimage->srcset([
											'1x' => [
												'width' => 264,
												'height' => 132,
												'crop' => 'center'
											],
											'2x' => [
												'width' => 528,
												'height' => 264,
												'crop' => 'center'
											]
										]);
										$tabletsmall  = $headerimage->srcset([
											'1x' => [
												'width' => 508,
												'height' => 254,
												'crop' => 'center'
											],
											'2x' => [
												'width' => 1016,
												'height' => 508,
												'crop' => 'center'
											]
										]);
										$tabletbig    = $headerimage->srcset([
											'1x' => [
												'width' => 678,
												'height' => 339,
												'crop' => 'center'
											],
											'2x' => [
												'width' => 1356,
												'height' => 678,
												'crop' => 'center'
											]
										]);
										$desktopsmall = $headerimage->srcset([
											'1x' => [
												'width' => 840,
												'height' => 420,
												'crop' => 'center'
											],
											'2x' => [
												'width' => 1680,
												'height' => 840,
												'crop' => 'center'
											]
										]);
										$desktopmedium = $headerimage->srcset([
											'1x' => [
												'width' => 470,
												'height' => 235,
												'crop' => 'center'
											],
											'2x' => [
												'width' => 940,
												'height' => 470,
												'crop' => 'center'
											]
										]);
										$desktopbig = $headerimage->srcset([
											'1x' => [
												'width' => 678,
												'height' => 339,
												'crop' => 'center'
											],
											'2x' => [
												'width' => 1356,
												'height' => 678,
												'crop' => 'center'
											]
										]);
										$desktop2k = $headerimage->srcset([
											'1x' => [
												'width' => 844,
												'height' => 422,
												'crop' => 'center'
											],
											'2x' => [
												'width' => 1688,
												'height' => 844,
												'crop' => 'center'
											]
										]);
										$desktop4k = $headerimage->srcset([
											'1x' => [
												'width' => 1270,
												'height' => 635,
												'crop' => 'center'
											],
											'2x' => [
												'width' => 2540,
												'height' => 1270,
												'crop' => 'center'
											]
										]);
										$norm = $headerimage->crop(678,339);									
									} else {
										$smartphone = $headerimage->srcset([
											'1x' => [
												'width' => 132,
												'height' => 132,
												'crop' => 'center'
											],
											'2x' => [
												'width' => 264,
												'height' => 264,
												'crop' => 'center'
											]
										]);
										$tabletsmall  = $headerimage->srcset([
											'1x' => [
												'width' => 254,
												'height' => 254,
												'crop' => 'center'
											],
											'2x' => [
												'width' => 508,
												'height' => 508,
												'crop' => 'center'
											]
										]);
										$tabletbig    = $headerimage->srcset([
											'1x' => [
												'width' => 339,
												'height' => 339,
												'crop' => 'center'
											],
											'2x' => [
												'width' => 678,
												'height' => 678,
												'crop' => 'center'
											]
										]);
										$desktopsmall = $headerimage->srcset([
											'1x' => [
												'width' => 420,
												'height' => 420,
												'crop' => 'center'
											],
											'2x' => [
												'width' => 840,
												'height' => 840,
												'crop' => 'center'
											]
										]);
										$desktopmedium = $headerimage->srcset([
											'1x' => [
												'width' => 235,
												'height' => 235,
												'crop' => 'center'
											],
											'2x' => [
												'width' => 470,
												'height' => 470,
												'crop' => 'center'
											]
										]);
										$desktopbig = $headerimage->srcset([
											'1x' => [
												'width' => 315,
												'height' => 315,
												'crop' => 'center'
											],
											'2x' => [
												'width' => 630,
												'height' => 630,
												'crop' => 'center'
											]
										]);
										$desktop2k = $headerimage->srcset([
											'1x' => [
												'width' => 422,
												'height' => 422,
												'crop' => 'center'
											],
											'2x' => [
												'width' => 844,
												'height' => 844,
												'crop' => 'center'
											]
										]);
										$desktop4k = $headerimage->srcset([
											'1x' => [
												'width' => 635,
												'height' => 635,
												'crop' => 'center'
											],
											'2x' => [
												'width' => 1270,
												'height' => 1270,
												'crop' => 'center'
											]
										]);
										$norm = $headerimage->crop(678,678);									
									}
								?>
								
								<picture>
									<source srcset="<?= $smartphone ?>" media="(max-width: 420px)">
									<source srcset="<?= $tabletsmall ?>" media="(min-width: 421px) AND (max-width: 768px)">
									<source srcset="<?= $tabletbig ?>" media="(min-width: 769px) AND (max-width: 1024px)">
									<source srcset="<?= $desktopsmall ?>" media="(min-width: 1025px) AND (max-width: 1279px)">
									<source srcset="<?= $desktopmedium ?>" media="(min-width: 1280px) AND (max-width: 1440px)">
									<source srcset="<?= $desktopbig ?>" media="(min-width: 1441px) AND (max-width: 1920px)">
									<source srcset="<?= $desktop2k ?>" media="(min-width: 1921px) AND (max-width: 2560px)">
									<source srcset="<?= $desktop4k ?>" media="(min-width: 2561px)">
									<img src="<?= $norm->url() ?>" <?php if ($headerimage->alt()->isNotEmpty()): ?>alt="<?= $headerimage->alt() ?>"<?php endif ?>/>
								</picture>
							</div>
						</div>
					</a>
					
				<?php endforeach; ?>

			</div>
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