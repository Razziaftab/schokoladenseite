<?php 

	if ($block->image()->toFile()): 
		$image = $block->image()->toFile();
	else:
		$image = '';
	endif;

	if ($image != ''): 

		$alt          = $image->alt();
		$smartphone   = $image->srcset([
			'1x' => [
				'width' => 420,
				'height' => 266,
				'crop' => 'center'
			],
			'2x' => [
				'width' => 840,
				'height' => 532,
				'crop' => 'center'
			]
		]);
		$tabletsmall  = $image->srcset([
			'1x' => [
				'width' => 768,
				'height' => 243,
				'crop' => 'center'
			],
			'2x' => [
				'width' => 1536,
				'height' => 486,
				'crop' => 'center'
			]
		]);
		$tabletbig    = $image->srcset([
			'1x' => [
				'width' => 880,
				'height' => 278,
				'crop' => 'center'
			],
			'2x' => [
				'width' => 1760,
				'height' => 556,
				'crop' => 'center'
			]
		]);
		$desktopsmall    = $image->srcset([
			'1x' => [
				'width' => 1280,
				'height' => 404,
				'crop' => 'center'
			],
			'2x' => [
				'width' => 2560,
				'height' => 808,
				'crop' => 'center'
			]
		]);
		$desktopmedium    = $image->srcset([
			'1x' => [
				'width' => 1440,
				'height' => 454,
				'crop' => 'center'
			],
			'2x' => [
				'width' => 2880,
				'height' => 909,
				'crop' => 'center'
			]
		]);
		$desktopbig    = $image->srcset([
			'1x' => [
				'width' => 1920,
				'height' => 606,
				'crop' => 'center'
			],
			'2x' => [
				'width' => 3840,
				'height' => 1213,
				'crop' => 'center'
			]
		]);
		
	endif;
?>


<div class="hero hero-video" <?php if( $block->ariaLabelledby()->isNotEmpty()): ?> aria-labelledby="<?= $block->ariaLabelledby() ?>" <?php endif ?>>
	<div class="hero-video-wrapper" <?php if( $block->customId()->isNotEmpty()): ?> id="<?= $block->customId() ?>" <?php endif ?> >
		<picture>
			<source srcset="<?= $smartphone ?>" media="(max-width: 420px)">
			<source srcset="<?= $tabletsmall ?>" media="(min-width: 421px) AND (max-width: 768px)">
			<source srcset="<?= $tabletbig ?>" media="(min-width: 769px) AND (max-width: 1024px)">
			<source srcset="<?= $desktopsmall ?>" media="(min-width: 1025px) AND (max-width: 1280px)">
			<source srcset="<?= $desktopmedium ?>" media="(min-width: 1281px) AND (max-width: 1440px)">
			<source srcset="<?= $desktopbig ?>" media="(min-width: 1445px)">
			<img src="<?= $image->url() ?>" alt="<?= $alt ?>" class="video-cover" width="<?= $image->width() ?>" height="<?= $image->height() ?>"/>
		</picture>
		<video id="video-background" autoplay muted="" playsinline="" loop="" data-keepplaying="">
			<?php foreach($block->video()->toFiles() as $video): ?>
				<source src="<?= $video->url() ?>" type="video/<?= $video->extension() ?>">
			<?php endforeach ?>
		</video>
		<div class="video-overlay"></div>
	
		<div class="container">
			<div class="hero-video-content">
				<h1 class="hero-hl"><div class="pre-hl"><?= $block->preh1() ?></div><?= $block->h1() ?></h1>
				<ul class="highlight">
					<?php foreach ($block->verlinkung()->toStructure() as $item): ?>
						<li class="nobr">
							<a class="btn -gradient" href="<?= $item->links()->toPage()->slug() ?><?php if($item->anker()->isNotEmpty()): ?>#<?= $item->anker() ?><?php endif ?>"> 
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

		</div><!-- /.container -->
	</div>

	<div id="play-pause-video" aria-label="Pause Video" tabindex="0" role="button"></div>

</div>