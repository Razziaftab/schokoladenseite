<!DOCTYPE html>
<html lang="de" data-lt-installed="true">

	<!-- HEAD -->
	<?php snippet('head') ?>

	<!-- BODY -->
	<body class="projekt-seite">
	
		<a id="skip-content" href="#main">Zum Inhaltsbereich wechseln.</a>

		<!-- HEADER -->
		<?php snippet('header') ?>

		<!-- MAIN -->
		<main id="main">
			<?php snippet('layouts', ['field' => $page->layout()])  ?>
			
			<div id="mobile-roll">
	
				<?php foreach($page->mobileroll()->toStructure() as $item): ?>
					<?php if($item->imageclass() == "tablet"): ?>
						<span class="<?= $item->imageclass() ?>" id="<?= $item->imageid() ?>">
							<picture>
								<source srcset="<?= $item->image()->toFile()->resize(400)->url() ?> 1x, <?= $item->image()->toFile()->resize(800)->url() ?> 2x" >
								<img src="<?= $item->image()->toFile()->resize(400)->url() ?>" alt="<?= $item->image()->toFile()->content()->alt() ?>" />
							</picture>	
						</span>
					<?php elseif($item->imageclass() == "tablet-quer"): ?>
						<span class="<?= $item->imageclass() ?>" id="<?= $item->imageid() ?>">
							<picture>
								<source srcset="<?= $item->image()->toFile()->resize(600)->url() ?> 1x, <?= $item->image()->toFile()->resize(1200)->url() ?> 2x" >
								<img src="<?= $item->image()->toFile()->resize(600)->url() ?>" alt="<?= $item->image()->toFile()->content()->alt() ?>" />
							</picture>	
						</span>
					<?php else: ?>
						<span class="<?= $item->imageclass() ?>" id="<?= $item->imageid() ?>">
							<picture>
								<source srcset="<?= $item->image()->toFile()->resize(255)->url() ?> 1x, <?= $item->image()->toFile()->resize(510)->url() ?> 2x" >
								<img src="<?= $item->image()->toFile()->resize(255)->url() ?>" alt="<?= $item->image()->toFile()->content()->alt() ?>" />
							</picture>
						</span>
					<?php endif ?>
				<?php endforeach ?>
				
				<img src="<?= $site->url() ?>/assets/img/handy.svg" id="mobil" />

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
		<script src="<?= $site->url() ?>/assets/js/projekte.js"></script>

	</body>
	
</html>