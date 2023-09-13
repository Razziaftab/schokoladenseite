<?php if($block->link()->isNotEmpty()): ?>
	<a href="<?= $block->link()->toPage()->url() ?>" title="Zur Website: <?= $block->link()->toPage()->title() ?>">
<?php endif ?>



<?php if($block->image()->toFiles()->isNotEmpty()): ?>
	<?php if($block->image()->toFiles()->count() == 2): ?>
		<?php if($block->customClass()->isNotEmpty()): ?> 
			<?php foreach ($block->customClass()->split(',') as $class):?>
				<?php if($class	== 'zoom'): ?>
					<?php if($file = $block->image()->first()->toFile()): ?>
						<div class="zoom" data-image="<?= $file->url() ?>" data-width="<?= $file->width() ?>" data-height="<?= $file->height() ?>">
					<?php endif ?>
				<?php endif ?>
			<?php endforeach ?>
		<?php endif ?>
		<picture>
			<?php foreach($block->image()->toFiles() as $image): ?>
				<?php if($image->extension() == 'webp'): ?>
					<source srcset="<?= $image->url() ?>" type="image/webp">
				<?php endif ?>
				<?php if($image->extension() == 'jpg'): ?>
					<source srcset="<?= $image->url() ?>" type="image/jpeg">
					<img src="<?= $image->url() ?>" alt="<?= $image->content()->alt() ?>" title="<?= $image->content()->title() ?>"<?php if($block->customClass()->isNotEmpty()): ?> class="<?php foreach ($block->customClass()->split(',') as $class):?><?= $class ?> <?php endforeach ?>"<?php endif ?>>
				<?php endif ?>
				<?php if($image->extension() == 'png'): ?>
					<source srcset="<?= $image->url() ?>" type="image/png">
					<img src="<?= $image->url() ?>" alt="<?= $image->content()->alt() ?>" title="<?= $image->content()->title() ?>"<?php if($block->customClass()->isNotEmpty()): ?> class="<?php foreach ($block->customClass()->split(',') as $class):?><?= $class ?> <?php endforeach ?>"<?php endif ?>>
				<?php endif ?>
			<?php endforeach ?>
		</picture>
		<?php if($block->customClass()->isNotEmpty()): ?> 
			<?php foreach ($block->customClass()->split(',') as $class):?>
				<?php if($class	== 'zoom'): ?>
					<?php if($file = $block->image()->first()->toFile()): ?>
						</div>
					<?php endif ?>
				<?php endif ?>
			<?php endforeach ?>
		<?php endif ?>
	<?php else: ?>
		<?php if($block->customClass()->isNotEmpty()): ?> 
			<?php foreach ($block->customClass()->split(',') as $class):?>
				<?php if($class	== 'zoom'): ?>
					<div class="zoom" data-image="<?= $block->image()->toFile()->url() ?>" data-width="<?= $block->image()->toFile->width() ?>" data-height="<?= $block->image()->toFile->height() ?>">
				<?php endif ?>
			<?php endforeach ?>
		<?php endif ?>
		<img src="<?= $block->image()->toFile()->url() ?>" alt="<?= $block->image()->toFile()->content()->alt() ?>" title="<?= $block->image()->toFile()->content()->title() ?>"<?php if($block->customClass()->isNotEmpty()): ?> class="<?php foreach ($block->customClass()->split(',') as $class):?><?= $class ?> <?php endforeach ?>"<?php endif ?>>
		<?php if($block->customClass()->isNotEmpty()): ?> 
			<?php foreach ($block->customClass()->split(',') as $class):?>
				<?php if($class	== 'zoom'): ?>
					</div>
				<?php endif ?>
			<?php endforeach ?>
		<?php endif ?>
	<?php endif ?>
<?php endif ?>

<?php if($block->link()->isNotEmpty()): ?>
	</a>
<?php endif ?>

<?php if($block->caption()->isNotEmpty()): ?>
	<div class="caption">
		<?= $block->caption()->kt() ?>
	</div>
<?php endif ?>
