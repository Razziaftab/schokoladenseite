<div class="news">
	<h2 id="online-news">
		<?= $block->text() ?>
	</h2>

	<div class="blog blogstart">

		<?php 
			if($block->list()->toBool() == true){
				$template = 'bloglistentry';
			} else {
				$template = 'blogentry';
			}
		?>
		

		<?php if($block->select()->isNotEmpty()): ?>
			<?php foreach ($block->select()->toPages() as $item): ?>
				<?php snippet($template, array('item' => $item)) ?>
			<?php endforeach ?>
		<?php else: ?>

			<?php 
				$i = 0;
				$items = $page = page('blog')->children()->listed()->filter(function ($child) {
					return $child->date()->toDate() < time();
				});
				$filter = $block->filter();
			?>	
			<?php foreach ($items->sortBy("datetoday", "desc", 'date', 'desc') as $item): ?>
				<?php if($filter != ''): ?>
					<?php foreach ($item->categories()->split(',') as $tag):?>
						<?php if($tag == $filter): ?>
							<?php snippet($template, array('item' => $item)) ?>
						<?php endif ?>
					<?php endforeach ?>
				<?php else: ?>
					<?php if($i < 3): ?>
						<?php snippet($template, array('item' => $item)) ?>
						<?php $i++ ?>
					<?php endif ?>
				<?php endif ?>
			<?php endforeach ?>
		<?php endif ?>
	</div>
</div>