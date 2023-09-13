<div class="team">
	<?php foreach($block->links()->toStructure() as $member): ?>
		<div>
			<?php if($member->image()->toFiles()->isNotEmpty()): ?>
				<?php if($member->image()->toFiles()->count() == 2): ?>
					<picture>
						<?php foreach($member->image()->toFiles() as $image): ?>
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
					<img src="<?= $member->image()->toFile()->url() ?>" alt="<?= $member->image()->toFile()->content()->alt() ?>" title="<?= $member->image()->toFile()->content()->title() ?>">
				<?php endif ?>
			<?php endif ?>
			<p>
				<strong><?= $member->name() ?></strong><br>
				<?= $member->title() ?>
			</p>
		</div>
	<?php endforeach ?>
</div>
