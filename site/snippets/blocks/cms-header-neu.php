<div class="cms-header-neu">
	<div class="row">
		<?php if($block->image()->isNotEmpty()): ?>
			<div class="image">
				<img src="<?= $block->image()->toFile()->url() ?>" alt="<?= $block->image()->toFile()->alt() ?>" />
			</div>
		<?php endif ?>

		<div class="text">
			<h1 <?php if( $block->elemntId()->isNotEmpty()): ?> id="<?= $block->elemntId() ?>" <?php endif ?>>
				<span class="pre"><?= $block->preh1() ?></span>
				<?= $block->h1()->kt()->inline() ?>
			</h1>
			<?php if( $block->text()->isNotEmpty()): ?>
				<?= $block->text()->kt() ?>
			<?php endif ?>
		</div>
	</div>
</div>