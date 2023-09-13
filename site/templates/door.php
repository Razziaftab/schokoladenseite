<!DOCTYPE html>
<html lang="de" data-lt-installed="true">

	<!-- HEAD -->
	<?php snippet('head') ?>

	<!-- BODY -->
	<body>

		<?php
			//todo Tag abfragen
			$today = date('j');

			if(date('n')<9 && date('Y')<=2021) {
				$today = 0;
			}

			if(date('Y')>2021) {
				$today = 0;
			}

			/*if ($page->door()->toInt() > $today) {
				go('nicht-erlaubt');
			}*/
		?>
	
		<a id="skip-content" href="#main">Zum Inhaltsbereich wechseln.</a>

		<!-- HEADER -->
		<?php snippet('header') ?>

		<!-- MAIN -->
		<main id="main">
			<div class="door">
				<div>
					<div class="text">
						<strong><?= $page->door() ?>.</strong>
						<span>Türchen im SCHOKO-Adventskalender</span>
						<h1><?= $page->title() ?></h1>
					</div>
					<div class="story-nav">
					
						<?php
							$headerimage = $page->image();
		
							$smartphone = $headerimage->srcset([
								'1x' => [
									'width' => 420,
									'height' => 315,
									'crop' => 'center'
								],
								'2x' => [
									'width' => 840,
									'height' => 630,
									'crop' => 'center'
								]
							]);
							$tabletsmall  = $headerimage->srcset([
								'1x' => [
									'width' => 768,
									'height' => 576,
									'crop' => 'center'
								],
								'2x' => [
									'width' => 1536,
									'height' => 1152,
									'crop' => 'center'
								]
							]);
							$tabletbig    = $headerimage->srcset([
								'1x' => [
									'width' => 512,
									'height' => 384,
									'crop' => 'center'
								],
								'2x' => [
									'width' => 1024,
									'height' => 768,
									'crop' => 'center'
								]
							]);
							$desktopsmall = $headerimage->srcset([
								'1x' => [
									'width' => 631,
									'height' => 473,
									'crop' => 'center'
								],
								'2x' => [
									'width' => 1262,
									'height' => 946,
									'crop' => 'center'
								]
							]);
							$desktopmedium = $headerimage->srcset([
								'1x' => [
									'width' => 711,
									'height' => 533,
									'crop' => 'center'
								],
								'2x' => [
									'width' => 1422,
									'height' => 1066,
									'crop' => 'center'
								]
							]);
							$desktopbig = $headerimage->srcset([
								'1x' => [
									'width' => 951,
									'height' => 713,
									'crop' => 'center'
								],
								'2x' => [
									'width' => 1920,
									'height' => 1426,
									'crop' => 'center'
								]
							]);
							$desktop2k = $headerimage->srcset([
								'1x' => [
									'width' => 1280,
									'height' => 960,
									'crop' => 'center'
								],
								'2x' => [
									'width' => 2560,
									'height' => 1920,
									'crop' => 'center'
								]
							]);
							$desktop4k = $headerimage->srcset([
								'1x' => [
									'width' => 1920,
									'height' => 1440,
									'crop' => 'center'
								],
								'2x' => [
									'width' => 3840,
									'height' => 2880,
									'crop' => 'center'
								]
							]);
							$norm = $headerimage->crop(1920,1440);	
						?>
						
						<picture>
							<source srcset="<?= $smartphone ?>" media="(max-width: 420px)">
							<source srcset="<?= $tabletsmall ?>" media="(min-width: 421px) AND (max-width: 768px)">
							<source srcset="<?= $tabletbig ?>" media="(min-width: 769px) AND (max-width: 1024px)">
							<source srcset="<?= $desktopsmall ?>" media="(min-width: 1025px) AND (max-width: 1280px)">
							<source srcset="<?= $desktopmedium ?>" media="(min-width: 1281px) AND (max-width: 1440px)">
							<source srcset="<?= $desktopbig ?>" media="(min-width: 1441px) AND (max-width: 1920px)">
							<source srcset="<?= $desktop2k ?>" media="(min-width: 1921px) AND (max-width: 2560px)">
							<source srcset="<?= $desktop4k ?>" media="(min-width: 2561px)">
							<img src="<?= $norm->url() ?>" <?php if ($headerimage->alt()->isNotEmpty()): ?>alt="<?= $headerimage->alt() ?>"<?php endif ?>/>
						</picture>
						
						<?php if($page->door()->toInt()-1 <= $today && $page->door()->toInt()-1 > 0): ?>
							<?php $prev = $page->siblings()->filterBy('door', $page->door()->toInt()-1)->first(); ?>
							<a class="btn -primary left" href="<?= $prev?$prev->url():'#' ?>">vorheriges Türchen</a>
						<?php endif; ?>

						<?php if($page->door()->toInt()+1 <= $today && $page->door()->toInt()+1 < 25): ?>
							<?php $next = $page->siblings()->filterBy('door', $page->door()->toInt()+1)->first(); ?>
							<a class="btn -primary " href="<?= $next?$next->url():'#' ?>">nächstes Türchen</a>
						<?php endif; ?>
					</div>
				</div>
				<div>
					<?php snippet('layouts', ['field' => $page->layout()])  ?>
					<div class="social">
						<strong>Diesen Kalendertag teilen</strong>
						<div>
							<a class="sharing-item facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?= $page->url() ?>&amp;quote=<?= urlencode($page->title()) ?>" title="Teile diesen Beitrag auf Facebook" aria-label="Teile diesen Beitrag auf Facebook" onclick="window.open(this.href, &quot;facebook&quot;, &quot;toolbar=0,width=900,height=500&quot;); return false;"><i class="fab fa-facebook"></i></a>
							<a class="sharing-item twitter" href="https://twitter.com/intent/tweet?text=<?= urlencode($page->title()) ?>&amp;url=<?= $page->url() ?>" title="Teile diesen Beitrag auf Twitter" aria-label="Teile diesen Beitrag auf Twitter" onclick="window.open(this.href, &quot;twitter&quot;, &quot;toolbar=0,width=650,height=360&quot;); return false;"><i class="fab fa-twitter"></i></a>
							<a class="sharing-item linkedin" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?= $page->url() ?>" title="Teile diesen Beitrag auf LinkedIn" aria-label="Teile diesen Beitrag auf LinkedIn" onclick="window.open(this.href, &quot;linkedin&quot;, &quot;toolbar=no,width=550,height=550&quot;); return false;"><i class="fab fa-linkedin"></i></a>
							<a class="sharing-item xing" href="https://www.xing.com/spi/shares/new?url=<?= $page->url() ?>" title="Teile diesen Beitrag auf Xing" aria-label="Teile diesen Beitrag auf Xing" onclick="window.open(this.href, &quot;xing&quot;, &quot;toolbar=no,width=900,height=500&quot;); return false;"><i class="fab fa-xing"></i></a>
						</div>
					</div>
					<div class="back">
						<a href="/adventskalender2021" class="btn -primary">Zurück zum Adventskalender</a>
					</div>
				</div>
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
