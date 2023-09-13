<?php if (!$block->isHidden()): ?>
	<?php if($block->image()->toFiles()->isNotEmpty()): ?>

		<div class="cta">
			<div>
				<?php if($block->image()->toFiles()->count() == 2): ?>
					<picture>
						<?php foreach($block->image()->toFiles() as $image): ?>
							<?php if($image->extension() == 'webp'): ?>
								<source srcset="<?= $image->resize('1000')->url() ?>" type="image/webp">
							<?php endif ?>
							<?php if($image->extension() == 'jpg'): ?>
								<source srcset="<?= $image->resize('1000')->url() ?>" type="image/jpeg">
								<img src="<?= $image->resize('1000')->url() ?>" alt="<?= $image->content()->alt() ?>" title="<?= $image->content()->title() ?>" width="<?= $image->width() ?>" height="<?= $image->height() ?>">
							<?php endif ?>
							<?php if($image->extension() == 'png'): ?>
								<source srcset="<?= $image->resize('1000')->url() ?>" type="image/png">
								<img src="<?= $image->resize('1000')->url() ?>" alt="<?= $image->content()->alt() ?>" title="<?= $image->content()->title() ?>" width="<?= $image->width() ?>" height="<?= $image->height() ?>">
							<?php endif ?>
						<?php endforeach ?>
					</picture>
				<?php else: ?>
					<img src="<?= $block->image()->toFile()->resize('1000')->url() ?>" alt="<?= $block->image()->toFile()->content()->alt() ?>" title="<?= $block->image()->toFile()->content()->title() ?>" width="<?= $block->image()->toFile()->width() ?>" height="<?= $block->image()->toFile()->height() ?>">
				<?php endif ?>
			</div>
			<div>
				<?php if ($block->content()->caption()->isNotEmpty()): ?>
					<?= $block->content()->caption()->kt() ?>
				<?php endif ?>
			</div>
		</div>
		
	<?php endif ?>
<?php endif ?>