<<?= $level = $block->level()->or('h2') ?>
	<?php if($block->customClass()->isNotEmpty()): ?> class="<?php foreach ($block->customClass()->split(',') as $class):?><?= $class ?> <?php endforeach ?>"<?php endif ?>
	<?php if($block->customId()->isNotEmpty()): ?> id="<?= $block->customId()?>"<?php endif ?>>
	<?php if($block->preh1()->isNotEmpty()): ?><span class="pre"><?= $block->preh1()?></span><?php endif ?>
	
	<?php if($block->customClass()->isNotEmpty()): ?>
		<?php foreach($block->customClass()->split() as $class): ?> 
			<?php if($class == 'underline'): ?> 
				<span><?= $block->text()->kti() ?></span>
			<?php else: ?>
				<?= $block->text()->kti() ?>
			<?php endif ?>
		<?php endforeach ?>
	<?php else: ?>
		<?= $block->text()->kti() ?>
	<?php endif ?>
	
</<?= $level ?>>





