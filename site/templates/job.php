<!DOCTYPE html>
<html lang="de" data-lt-installed="true">

	<!-- HEAD -->
	<?php snippet('head') ?>

	<!-- BODY -->
	<body class="blog">

		<!-- HEADER -->
		<?php snippet('header') ?>

		<!-- MAIN -->
		<main id="main">
		
			<?php 

				if ($page->articleimage()->toFile()): 
					$image = $page->articleimage()->toFile();
				else:
					$image = '';
				endif;

				if ($image != ''): 

					$alt          = $image->alt();
					$smartphone   = $image->srcset([
						'1x' => ['width' => 420,'height' => 266,'crop' => 'center'],
						'2x' => ['width' => 840,'height' => 532,'crop' => 'center']
					]);
					$smartphoneW   = $image->srcset([
						'1x' => ['width' => 420,'height' => 266,'crop' => 'center','format' => 'webp'],
						'2x' => ['width' => 840,'height' => 532,'crop' => 'center','format' => 'webp']
					]);
					$tabletsmall  = $image->srcset([
						'1x' => ['width' => 768,'height' => 243,'crop' => 'center'],
						'2x' => ['width' => 1536,'height' => 486,'crop' => 'center']
					]);
					$tabletsmallW  = $image->srcset([
						'1x' => ['width' => 768,'height' => 243,'crop' => 'center','format' => 'webp'],
						'2x' => ['width' => 1536,'height' => 486,'crop' => 'center','format' => 'webp']
					]);
					$tabletbig    = $image->srcset([
						'1x' => ['width' => 880,'height' => 278,'crop' => 'center'],
						'2x' => ['width' => 1760,'height' => 556,'crop' => 'center']
					]);
					$tabletbigW    = $image->srcset([
						'1x' => ['width' => 880,'height' => 278,'crop' => 'center','format' => 'webp'],
						'2x' => ['width' => 1760,'height' => 556,'crop' => 'center','format' => 'webp']
					]);
					$desktopsmall    = $image->srcset([
						'1x' => ['width' => 1280,'height' => 404,'crop' => 'center'],
						'2x' => ['width' => 2560,'height' => 808,'crop' => 'center']
					]);
					$desktopsmallW    = $image->srcset([
						'1x' => ['width' => 1280,'height' => 404,'crop' => 'center','format' => 'webp'],
						'2x' => ['width' => 2560,'height' => 808,'crop' => 'center','format' => 'webp']
					]);
					$desktopmedium    = $image->srcset([
						'1x' => ['width' => 1440,'height' => 454,'crop' => 'center'],
						'2x' => ['width' => 2880,'height' => 908,'crop' => 'center']
					]);
					$desktopmediumW    = $image->srcset([
						'1x' => ['width' => 1440,'height' => 454,'crop' => 'center','format' => 'webp'],
						'2x' => ['width' => 2880,'height' => 908,'crop' => 'center','format' => 'webp']
					]);
					$desktopbig    = $image->srcset([
						'1x' => ['width' => 1920,'height' => 606,'crop' => 'center'],
						'2x' => ['width' => 3840,'height' => 1212,'crop' => 'center']
					]);
					$desktopbigW    = $image->srcset([
						'1x' => ['width' => 1920,'height' => 606,'crop' => 'center','format' => 'webp'],
						'2x' => ['width' => 3840,'height' => 1212,'crop' => 'center','format' => 'webp']
					]);
					$norm = $image->crop(1920,606);	
					
				endif;
			?>
			
			<div class="blogheader">
				<?php if ($image != ''): ?>
					<picture class="rs_skip">
						<source srcset="<?= $smartphoneW ?>" 	type="image/webp" 				media="(max-width: 420px)">
						<source srcset="<?= $smartphone ?>" 	type="<?= $image->mime() ?>"	media="(max-width: 420px)">
						<source srcset="<?= $tabletsmallW ?>" 	type="image/webp"				media="(min-width: 421px) AND (max-width: 768px)">
						<source srcset="<?= $tabletsmall ?>" 	type="<?= $image->mime() ?>"	media="(min-width: 421px) AND (max-width: 768px)">
						<source srcset="<?= $tabletbigW ?>" 	type="image/webp"				media="(min-width: 769px) AND (max-width: 1024px)">
						<source srcset="<?= $tabletbig ?>" 		type="<?= $image->mime() ?>"	media="(min-width: 769px) AND (max-width: 1024px)">
						<source srcset="<?= $desktopsmallW ?>" 	type="image/webp"				media="(min-width: 1025px) AND (max-width: 1280px)">
						<source srcset="<?= $desktopsmall ?>" 	type="<?= $image->mime() ?>"	media="(min-width: 1025px) AND (max-width: 1280px)">
						<source srcset="<?= $desktopmediumW ?>" type="image/webp"				media="(min-width: 1281px) AND (max-width: 1440px)">
						<source srcset="<?= $desktopmedium ?>" 	type="<?= $image->mime() ?>"	media="(min-width: 1281px) AND (max-width: 1440px)">
						<source srcset="<?= $desktopbigW ?>" 	type="image/webp"				media="(min-width: 1441px)">
						<source srcset="<?= $desktopbig ?>" 	type="<?= $image->mime() ?>"	media="(min-width: 1441px)">
						<img src="<?= $norm->url() ?>" alt="<?= $alt ?>" class="" width="1920" height="606"/>
					</picture>
				<?php endif ?>
		
				<div class="row">
					<h1><span class="start"><?php if($page->articleheader()->isNotEmpty()): ?><?= $page->articleheader()->kti() ?><?php else: ?><?= $page->title()->kti() ?><?php endif ?></span></h1>
					<div class="keyfacts">
						<div>
							<?= $page->ort() ?>
						</div> 
						<div>
							<?= $page->modell() ?>
						</div> 
					</div>
				</div>
			</div>
			
			<div class="row">

			<p class="date">

					<?php $lang = $kirby->language() == 'de' ? "de_DE" : "en_GB" ?>

                    <?php
						$dateFormat = new IntlDateFormatter($lang,
							IntlDateFormatter::FULL,
							IntlDateFormatter::FULL,
							'Europe/Berlin',
							IntlDateFormatter::GREGORIAN,
							'dd. MMMM yyyy');
                    ?>

                    <?php if($page->datetoday()->toBool() === true): ?>
                        <?= $dateFormat->format(mktime(0, 0, 0, date('m'), date('d'), date('Y'))) ?>
                    <?php else: ?>
                        <?= $page->date()->toDate($dateFormat) ?>
                    <?php endif ?>
				</p>

				
				<?php if($page->intro()->isNotEmpty()): ?>
					<p class="intro"><?= $page->intro()->kti() ?></p>
				<?php endif ?>

				<?php if($page->image_ai_text()->isNotEmpty()): ?>
					<dl class="image_ai_text">
						<dt><?= t('ai-promt') ?></dt>
						<dd><?= $page->image_ai_text()->kti() ?></dd>
					</dl>

				<?php endif ?>
			</div>
			
			<?php if($page->mp3()->isNotEmpty()): ?>
				<div class="row">
					<audio preload="metadata" src="<?= $page->mp3()->toFile()->url() ?>"></audio>
					<div class="controls">
						<div id="play" aria-label="Play/Pause" role="button" tabindex="0"></div>
						<div id="stop" aria-label="Stop" role="button" tabindex="0"></div>
						<div class="time">
							<div id="progress" aria-label="Fortschritt" role="button" tabindex="0">
								<span id="timebar"></span>
							</div>
							<div id="time">
								<span id="current">00:00</span> / <span id="duration">00:00</span>
							</div>
						</div>
						<div class="volume">
							<div id="volume" aria-label="Lautstärke" role="button" tabindex="0">
								<span id="volumebar" style="width: 70%;"></span>
							</div>
						</div>
					</div>
				</div>
			<?php endif ?>
			
			<?php snippet('layouts', ['field' => $page->layout()])  ?>
			
			<div class="row social-icons rs_skip">
				<div>
					<h2><?= t('share') ?></h2>
					<ul>
						<li>
							<a class="sharing-item facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?= $page->url() ?>&amp;quote=<?= rawurlencode($page->title()) ?>" title="<?= t('share-facebook') ?>" aria-label="<?= t('share-facebook') ?>" onclick="window.open(this.href, &quot;facebook&quot;, &quot;toolbar=0,width=900,height=500&quot;); return false;"><i class="fab fa-facebook" aria-hidden="true"></i></a>
						</li>
						<li>
							<a class="sharing-item twitter" href="https://twitter.com/intent/tweet?text=<?= rawurlencode($page->title()) ?>&amp;url=<?= $page->url() ?>" title="<?= t('share-twitter') ?>" aria-label="<?= t('share-twitter') ?>" onclick="window.open(this.href, &quot;twitter&quot;, &quot;toolbar=0,width=650,height=360&quot;); return false;"><i class="fab fa-twitter" aria-hidden="true"></i></a>
						</li>
						<li>
							<a class="sharing-item linkedin" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?= $page->url() ?>" title="<?= t('share-linkedin') ?>" aria-label="<?= t('share-linkedin') ?>" onclick="window.open(this.href, &quot;linkedin&quot;, &quot;toolbar=no,width=550,height=550&quot;); return false;"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>
						</li>
						<li>
							<a class="sharing-item xing" href="https://www.xing.com/spi/shares/new?url=<?= $page->url() ?>" title="<?= t('share-xing') ?>" aria-label="<?= t('share-xing') ?>" onclick="window.open(this.href, &quot;xing&quot;, &quot;toolbar=no,width=900,height=500&quot;); return false;"><i class="fab fa-xing" aria-hidden="true"></i></a>
						</li>
					</ul>
				</div>
			</div>

			<?php if($page->benefits()->isNotEmpty()): ?>
				<div class="row fullwidth">
					<h2><?= t('we-offer') ?></h2>
					<div class="flex benefits">
						<?php foreach($page->benefits()->split('|,') as $benefit):?>
							<?php $benefit = str_replace('|', '', $benefit) ?>
							<div class="column-3">
								<?php foreach($kirby->page('jobs')->benefits()->toStructure() as $item):?>
									<?php if($item->text()->kti() == $benefit): ?>
										<img src="<?= $item->icon()->toFile()->url() ?>" />
									<?php endif ?>
								<?php endforeach ?>
								<p><?= $benefit ?></p>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			<?php endif ?>

			<?php if($page->zuschuss()->isNotEmpty()): ?>
				<div class="row fullwidth">
					<h2><?= t('subsidies') ?></h2>
					<div class="flex benefits">
						<?php foreach($page->zuschuss()->split('|,') as $zuschuss): ?>
							<?php $zuschuss = str_replace('|', '', $zuschuss) ?>
							<div class="column-3">
								<?php foreach($kirby->page('jobs')->zuschuss()->toStructure() as $item): ?>
									<?php if($item->text()->kti() == $zuschuss): ?>
										<img src="<?= $item->icon()->toFile()->url() ?>" />
									<?php endif ?>
								<?php endforeach ?>
								<p><?= $zuschuss ?></p>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			<?php endif ?>

			<div class="row fullwidth">
				<?php snippet('bewerbung') ?>
			</div>

			
			<?php if($page->select()->isNotEmpty()): ?>
				<div class="row fullwidth">
					<h2><?= t('more-jobs') ?></h2>
					<p><?= $page->title() ?> <?= t('more-jobs-text') ?></p>
					<?php foreach ($page->select()->toPages() as $item): ?>
						<?php snippet('bloglistentry', array('item' => $item)) ?>
					<?php endforeach ?>
				</div>
			<?php endif ?>



			
			<div class="row back">
				<p><a href="<?= $kirby->url() ?>/jobs"><i class="fas fa-arrow-left"></i><?= t('back-to-job-overview') ?></a></p>
			</div>
			
			
		</main>
		
		<!-- FOOTER -->
		<?php snippet('footer') ?>
		
		<!-- BACK-TO-TOP -->
		<?php snippet('back-to-top') ?>
		
		<!-- JS -->
		<?php snippet('js') ?>
		<script type="text/javascript">
			$('document').ready(function(){
				setTimeout( function() {
					var position = $('.date').offset(),
						overlaytop = position.top + $('.date').height();

					$('.social-icons').css('top', overlaytop);
				}, 300); 
			});
		</script>

	</body>
	
</html>