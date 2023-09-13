<div class="gallery">

	<?php foreach ($block->image()->toFiles() as $image): ?>

		<?php

			$alt     = $image->alt();
			$caption = $image->caption();
			$href 	 = $image->thumb(['height' => 880])->url();
			$src 	 = $image->thumb(['width' => 550])->url();		
		?>

		<a href="<?= $href ?>">
			<figure>
				<img src="<?= $src ?>" alt="<?= $alt->esc() ?>" title="<?= $caption ?>" aria-hidden="true">

				<?php if ($caption->isNotEmpty()): ?>
					<figcaption>
						<?= $caption ?>
					</figcaption>
				<?php endif ?>
			</figure>
		</a>
		
	<?php endforeach ?> 

</div>
