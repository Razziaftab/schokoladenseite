<ul class="icons <?= $block->aussehen() ?>">
	<?php foreach ($block->links()->toStructure() as $icon): ?>
		<li>
			<?php if($icon->link()->isNotEmpty()): ?>		
				<a 	href="<?= $icon->link()->toPage()->slug() ?><?php if($icon->anker()->isNotEmpty()): ?>#<?= $icon->anker() ?><?php endif ?>" 
					tabindex="0"
					<?php if( $icon->title()->isNotEmpty()): ?> title="<?= $icon->title() ?>"<?php else: ?> title="Zur Website: <?= $icon->link()->toPage()->title() ?>"<?php endif ?> >
					<i class="<?= $icon->icon()->inline() ?>"aria-hidden="true"></i>
					<?php if( $icon->linktext()->isNotEmpty()): ?><?= $icon->linktext() ?><?php else: ?><?= $icon->link()->toPage()->title() ?><?php endif ?>
				</a>
			<?php else: ?>
				<i class="<?= $icon->icon()->inline() ?>" aria-hidden="true"></i>
				<?= $icon->linktext()->inline() ?>
			<?php endif ?>
		</li>
	<?php endforeach ?>
</ul>
