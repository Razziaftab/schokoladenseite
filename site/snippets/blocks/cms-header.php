<div class="cms-header">
	<?php if($block->backgroundimage()->isNotEmpty()): ?>
		<div class="background">
			<picture>
				<?php foreach($block->backgroundimage()->toFiles() as $image): ?>
					<?php
						$alt='';
						$title='';
					
						if ($image->alt()->isNotEmpty()):
							$alt = $image->alt();
						endif;
						
						if ($image->title()->isNotEmpty()):
							$title = $image->title();
						endif;
					
						$smartphone = $image->srcset([
							'1x' => [
								'width' => 420,
								'height' => 251,
								'crop' => 'center'
							],
							'2x' => [
								'width' => 840,
								'height' => 502,
								'crop' => 'center'
							]
						]);
						$tabletsmall = $image->srcset([
							'1x' => [
								'width' => 768,
								'height' => 459,
								'crop' => 'center'
							],
							'2x' => [
								'width' => 1536,
								'height' => 918,
								'crop' => 'center'
							]
						]);
						$tabletbig = $image->srcset([
							'1x' => [
								'width' => 1024,
								'height' => 612,
								'crop' => 'center'
							],
							'2x' => [
								'width' => 2048,
								'height' => 1224,
								'crop' => 'center'
							]
						]);
						$desktopsmall = $image->srcset([
							'1x' => [
								'width' => 1280,
								'height' => 765,
								'crop' => 'center'
							],
							'2x' => [
								'width' => 2560,
								'height' => 1530,
								'crop' => 'center'
							]
						]);
						$desktopmedium = $image->srcset([
							'1x' => [
								'width' => 1440,
								'height' => 861,
								'crop' => 'center'
							],
							'2x' => [
								'width' => 2880,
								'height' => 1722,
								'crop' => 'center'
							]
						]);
						$desktopbig = $image->srcset([
							'1x' => [
								'width' => 1920,
								'height' => 1148,
								'crop' => 'center'
							],
							'2x' => [
								'width' => 3840,
								'height' => 2295,
								'crop' => 'center'
							]
						]);
					?>				
				
					<?php if($image->extension() == 'webp'): ?>						
						<source srcset="<?= $smartphone ?>" type="image/webp" media="(max-width: 420px)">
						<source srcset="<?= $tabletsmall ?>" type="image/webp" media="(min-width: 421px) AND (max-width: 768px)">
						<source srcset="<?= $tabletbig ?>" type="image/webp" media="(min-width: 769px) AND (max-width: 1024px)">
						<source srcset="<?= $desktopsmall ?>" type="image/webp" media="(min-width: 1025px) AND (max-width: 1280px)">
						<source srcset="<?= $desktopmedium ?>" type="image/webp" media="(min-width: 1281px) AND (max-width: 1440px)">
						<source srcset="<?= $desktopbig ?>" type="image/webp" media="(min-width: 1445px)">
					<?php endif ?>
					<?php if($image->extension() == 'jpg'): ?>
						<source srcset="<?= $smartphone ?>" type="image/jpeg" media="(max-width: 420px)">
						<source srcset="<?= $tabletsmall ?>" type="image/jpeg" media="(min-width: 421px) AND (max-width: 768px)">
						<source srcset="<?= $tabletbig ?>" type="image/jpeg" media="(min-width: 769px) AND (max-width: 1024px)">
						<source srcset="<?= $desktopsmall ?>" type="image/jpeg" media="(min-width: 1025px) AND (max-width: 1280px)">
						<source srcset="<?= $desktopmedium ?>" type="image/jpeg" media="(min-width: 1281px) AND (max-width: 1440px)">
						<source srcset="<?= $desktopbig ?>" type="image/jpeg" media="(min-width: 1445px)">
						<img src="<?= $image->url() ?>" <?php if ($title!=''): ?>title="<?= $title ?>"<?php endif ?> <?php if ($alt!=''): ?>alt="<?= $alt ?>"<?php endif ?>/>
					<?php endif ?>
					<?php if($image->extension() == 'png'): ?>
						<source srcset="<?= $smartphone ?>" type="image/png" media="(max-width: 420px)">
						<source srcset="<?= $tabletsmall ?>" type="image/png" media="(min-width: 421px) AND (max-width: 768px)">
						<source srcset="<?= $tabletbig ?>" type="image/png" media="(min-width: 769px) AND (max-width: 1024px)">
						<source srcset="<?= $desktopsmall ?>" type="image/png" media="(min-width: 1025px) AND (max-width: 1280px)">
						<source srcset="<?= $desktopmedium ?>" type="image/png" media="(min-width: 1281px) AND (max-width: 1440px)">
						<source srcset="<?= $desktopbig ?>" type="image/png" media="(min-width: 1445px)">
						<img src="<?= $image->url() ?>" <?php if ($title!=''): ?>title="<?= $title ?>"<?php endif ?> <?php if ($alt!=''): ?>alt="<?= $alt ?>"<?php endif ?>/>
					<?php endif ?>
				<?php endforeach ?>
			</picture>
		</div>
	<?php endif ?>
	<div class="row">
		<div class="text">
			<h1 <?php if( $block->elemntId()->isNotEmpty()): ?> id="<?= $block->elemntId() ?>" <?php endif ?>>
				<span class="pre"><?= $block->preh1() ?></span>
				<?= $block->h1()->kt()->inline() ?>
			</h1>
			<?php if( $block->text()->isNotEmpty()): ?>
				<?= $block->text()->kt() ?>
			<?php endif ?>
		</div>
		<div class="image">
			<?php if($block->image()->isNotEmpty()): ?>
				<?php if($file = $block->image()->first()->toFile()): ?>
					<div class="" data-image="<?= $file->url() ?>" data-width="<?= $file->width() ?>" data-height="<?= $file->height() ?>">
				<?php endif ?>
					<picture>
						<?php foreach($block->image()->toFiles() as $image): ?>
							<?php
								$alt='';
								$title='';
							
								if ($image->alt()->isNotEmpty()):
									$alt = $image->alt();
								endif;
								
								if ($image->title()->isNotEmpty()):
									$title = $image->title();
								endif;
							
								$smartphone = $image->srcset([
									360  => '1x',
									720 => '2x'
								]);
								$tabletsmall = $image->srcset([
									708  => '1x',
									1416 => '2x'
								]);
								$tabletbig = $image->srcset([
									900  => '1x',
									1800 => '2x'
								]);
								$desktopsmall = $image->srcset([
									960  => '1x',
									1920 => '2x'
								]);
							?>				
						
							<?php if($image->extension() == 'webp'): ?>						
								<source srcset="<?= $smartphone ?>" type="image/webp" media="(max-width: 420px)">
								<source srcset="<?= $tabletsmall ?>" type="image/webp" media="(min-width: 421px) AND (max-width: 768px)">
								<source srcset="<?= $tabletbig ?>" type="image/webp" media="(min-width: 769px) AND (max-width: 1024px)">
								<source srcset="<?= $desktopsmall ?>" type="image/webp" media="(min-width: 1025px)">
							<?php endif ?>
							<?php if($image->extension() == 'jpg'): ?>
								<source srcset="<?= $smartphone ?>" type="image/jpeg" media="(max-width: 420px)">
								<source srcset="<?= $tabletsmall ?>" type="image/jpeg" media="(min-width: 421px) AND (max-width: 768px)">
								<source srcset="<?= $tabletbig ?>" type="image/jpeg" media="(min-width: 769px) AND (max-width: 1024px)">
								<source srcset="<?= $desktopsmall ?>" type="image/jpeg" media="(min-width: 1025px)">
								<img src="<?= $image->url() ?>" <?php if ($title!=''): ?>title="<?= $title ?>"<?php endif ?> <?php if ($alt!=''): ?>alt="<?= $alt ?>"<?php endif ?>/>
							<?php endif ?>
							<?php if($image->extension() == 'png'): ?>
								<source srcset="<?= $smartphone ?>" type="image/png" media="(max-width: 420px)">
								<source srcset="<?= $tabletsmall ?>" type="image/png" media="(min-width: 421px) AND (max-width: 768px)">
								<source srcset="<?= $tabletbig ?>" type="image/png" media="(min-width: 769px) AND (max-width: 1024px)">
								<source srcset="<?= $desktopsmall ?>" type="image/png" media="(min-width: 1025px)">
								<img src="<?= $image->url() ?>" <?php if ($title!=''): ?>title="<?= $title ?>"<?php endif ?> <?php if ($alt!=''): ?>alt="<?= $alt ?>"<?php endif ?>/>
							<?php endif ?>
						<?php endforeach ?>
					</picture>
				</div>
			<?php endif ?>
		</div>
	</div>
</div>
