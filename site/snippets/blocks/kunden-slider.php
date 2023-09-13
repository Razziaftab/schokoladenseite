<div class="slider">
	<div class="slider-head">
		<i class="fas fa-chevron-left" tabindex="0" alt="Vorheriger Slide" role="button" aria-label="Vorheriger Slide"></i>
		<h2 class="center" id="kunden"><?= $block->text()->kti() ?></h2>
		<i class="fas fa-chevron-right" tabindex="0" alt="Nächster Slide" role="button" aria-label="Nächster Slide"></i>
	</div>
	<div class="wrapper">
		<?php $images = $block->image()->toFiles() ?>
		<ul class="slider-container" data-active="0" data-length="<?= $images->count() ?>">
			<?php foreach($images as $image): ?>
				<?php if($image->content()->link()->isNotEmpty()): ?>
					<li class="slide">
						<a href="/<?= $image->content()->link() ?>">
							<img src="<?= $image->url() ?>" title="<?= $image->content()->title() ?>" alt="<?= $image->content()->alt() ?>" width="<?= $image->width() ?>" height="<?= $image->height() ?>">
						</a>
					</li>
				<?php else: ?>
					<li class="slide">
						<img src="<?= $image->url() ?>" title="<?= $image->content()->title() ?>" alt="<?= $image->content()->alt() ?>" width="<?= $image->width() ?>" height="<?= $image->height() ?>">
					</li>
				<?php endif ?>
			<?php endforeach ?>
		</ul>
	</div>
	<div aria-label="Pause Slider" id="play-pause-slider" role="button" tabindex="0"></div>
</div>
