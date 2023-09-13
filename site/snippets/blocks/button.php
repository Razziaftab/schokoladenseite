<?php foreach ($block->links()->toStructure() as $link): ?>
	<p>
		<?php if($link->extern()->isNotEmpty()): ?>
			<a 	href="<?= $link->extern() ?>" 
				target="_blank" 
				rel="noopener" 
				tabindex="0"
				class="btn <?= $block->aussehen() ?>" 
				<?php if( $link->title()->isNotEmpty()): ?> title="<?= $link->title() ?>"<?php endif ?> >
				<?= $link->linktext()->inline() ?>
			</a>
		<?php else: ?>
			<a 	href="<?php if($link->links()->isNotEmpty()): ?><?= $link->links()->toPage()->url() ?><?php endif ?><?php if($link->anker()->isNotEmpty()): ?>#<?= $link->anker() ?><?php endif ?>"
				tabindex="0"
				class="btn <?= $block->aussehen() ?>" 
				<?php if( $link->title()->isNotEmpty()): ?> title="<?= $link->title() ?>"<?php endif ?>>
				<?= $link->linktext()->inline() ?>
			</a>
		<?php endif ?>
	</p>
<?php endforeach ?>