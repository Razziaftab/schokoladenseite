<div class="container -pt-0">
	<div class="row flex" <?php if( $block->elemntId()->isNotEmpty()): ?> id="<?= $block->elemntId() ?>" <?php endif ?>>
		<div class="column-8">
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
						<a class="btn -gradient <?php if($item->links()->isEmpty() && $item->anker()->isNotEmpty()): ?>-to-bottom<?php endif ?>" 
						href="<?php if($item->links()->isNotEmpty()): ?><?= $item->links()->toPage()->slug() ?><?php endif ?>
								<?php if($item->anker()->isNotEmpty()): ?>#<?= $item->anker() ?><?php endif ?>"
						<?php if($item->linktitle()->isNotEmpty()): ?>title="<?= $item->linktitle() ?>"<?php endif ?>> 
							
							<?php if($item->linktext()->isNotEmpty()): ?>
								<?= $item->linktext() ?>
							<?php else: ?>
								<?= $item->links()->toPage()->title() ?>
							<?php endif ?>
						</a>
					</li> 
				<?php endforeach ?>
			</ul>
		</div>
		<div class="column-4">
			<?php if($block->image()->isNotEmpty()): ?>
				<?php if($block->image()->toFiles()->count() == 2): ?>
					<picture>
						<?php foreach($block->image()->toFiles() as $image): ?>
							<?php if($image->extension() == 'webp'): ?>
								<source srcset="<?= $image->url() ?>" type="image/webp">
							<?php endif ?>
							<?php if($image->extension() == 'jpg'): ?>
								<source srcset="<?= $image->url() ?>" type="image/jpeg">
								<img src="<?= $image->url() ?>" alt="<?= $image->content()->alt() ?>" title="<?= $image->content()->title() ?>">
							<?php endif ?>
							<?php if($image->extension() == 'png'): ?>
								<source srcset="<?= $image->url() ?>" type="image/png">
								<img src="<?= $image->url() ?>" alt="<?= $image->content()->alt() ?>" title="<?= $image->content()->title() ?>">
							<?php endif ?>
						<?php endforeach ?>
					</picture>
				<?php else: ?>
					<div>
						<?php foreach($block->image()->toFiles() as $image): ?>
							<img src="<?= $image->url() ?>" alt="<?= $image->content()->alt() ?>" title="<?= $image->content()->title() ?>">
						<?php endforeach ?>	
					</div>
				<?php endif ?>
			<?php endif ?>
		</div>
	</div>
</div>