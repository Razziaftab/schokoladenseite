<ul class="logos">
	<?php if($block->image()->toFiles()->isNotEmpty()): ?>
		<?php foreach($block->image()->toFiles() as $image): ?>
			<li>
				<img src="<?= $image->url() ?>" alt="<?= $image->content()->alt() ?>" title="<?= $image->content()->title() ?>"<?php if($block->customClass()->isNotEmpty()): ?> class="<?php foreach ($block->customClass()->split(',') as $class):?><?= $class ?> <?php endforeach ?>"<?php endif ?>>
			</li>
		<?php endforeach ?>
	<?php endif ?>
</ul>
