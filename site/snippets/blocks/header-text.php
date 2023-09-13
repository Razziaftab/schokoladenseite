<div <?php if( $block->elemntId()->isNotEmpty()): ?> id="<?= $block->elemntId() ?>" <?php endif ?>>
	<<?= $level = $block->level() ?> class="hero-hl">
		<div class="pre-hl">
			<?= $block->preh1() ?>
		</div>
		<?= $block->h1()->kt()->inline() ?>
	</<?= $level ?>>
	<?php if( $block->text()->isNotEmpty()): ?>
		<div class="hero-text">
			<?= $block->text()->kt() ?>
		</div>
	<?php endif ?>
	<ul class="highlight">
		<?php foreach ($block->referenzen()->toStructure() as $item): ?>
			<li class="nobr">
				<a class="btn -gradient" href="<?php if($item->links()->isNotEmpty()): ?><?= $item->links()->toPage()->slug() ?><?php endif ?><?php if($item->anker()->isNotEmpty()): ?>#<?= $item->anker() ?><?php endif ?>"> 
					<?php if($item->linktext()->isNotEmpty()): ?>
						<?= $item->linktext() ?>
					<?php else: ?>
						<?= $item->links()->toPage()->title() ?>
					<?php endif ?>
				</a>
			</li> 
		<?php endforeach ?>
	</ul>
	<?php if( $block->button()->isNotEmpty()): ?>
		<?= $block->button()->kti() ?>
	<?php endif ?>	
</div><!-- /.hero-->
