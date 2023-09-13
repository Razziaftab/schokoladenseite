<?php if (!$block->isHidden()): ?>
	<?php if($block->image()->toFiles()->isNotEmpty()): ?>
		<?php if ($block->link()->isNotEmpty()): ?>
			<a href="<?= $block->link()->url() ?>">
		<?php endif ?>
		<?php if($block->image()->toFiles()->count() == 2): ?>
			<picture>
				<?php foreach($block->image()->toFiles() as $image): ?>
					<?php if($image->extension() == 'webp'): ?>
						<source srcset="<?= $image->url() ?>" type="image/webp">
					<?php endif ?>
					<?php if($image->extension() == 'jpg'): ?>
						<source srcset="<?= $image->url() ?>" type="image/jpeg">
						<img src="<?= $image->url() ?>" alt="<?= $image->content()->alt() ?>" title="<?= $image->content()->title() ?>" class="<?php foreach ($block->customClass()->split(',') as $class):?><?= $class ?> <?php endforeach ?>" width="<?= $image->width() ?>" height="<?= $image->height() ?>">
					<?php endif ?>
					<?php if($image->extension() == 'png'): ?>
						<source srcset="<?= $image->url() ?>" type="image/png">
						<img src="<?= $image->url() ?>" alt="<?= $image->content()->alt() ?>" title="<?= $image->content()->title() ?>" class="<?php foreach ($block->customClass()->split(',') as $class):?><?= $class ?> <?php endforeach ?>" width="<?= $image->width() ?>" height="<?= $image->height() ?>">
					<?php endif ?>
				<?php endforeach ?>
			</picture>
		<?php else: ?>
			<img src="<?= $block->image()->toFile()->url() ?>" alt="<?= $block->image()->toFile()->content()->alt() ?>" title="<?= $block->image()->toFile()->content()->title() ?>" class="<?php foreach ($block->customClass()->split(',') as $class):?><?= $class ?> <?php endforeach ?>" width="<?= $block->image()->toFile()->width() ?>" height="<?= $block->image()->toFile()->height() ?>">
		<?php endif ?>
		<?php if ($block->link()->isNotEmpty()): ?>
			</a>
		<?php endif ?>
		<?php if ($block->content()->caption()->isNotEmpty()): ?>
			<figcaption>
				<?= $block->content()->caption() ?>
			</figcaption>
		<?php endif ?>
	<?php endif ?>
<?php endif ?>