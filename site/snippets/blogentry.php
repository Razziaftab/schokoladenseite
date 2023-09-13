<article class="element-item all <?php foreach ($item->categories()->split(',') as $tag):?><?= $tag ?> <?php endforeach ?>">

	
	<a href="<?= $item->url() ?>" title="Zum Blogbeitrag: <?= $item->title()->kti() ?>">
		
		<?php 
			if($page->id() != 'blog') {
				$h = 'h3';
			}  else {
				$h = 'h2';
			}
		?>
		
		<<?= $h ?> class="title h3">
			<?php if($item->articleheader()->isNotEmpty()): ?>
				<?= $item->articleheader()->kti() ?>
			<?php else: ?>
				<?= $item->title()->kti() ?>
			<?php endif ?>
		</<?= $h ?>>

		<?php if ($item->articleimage()->isNotEmpty()): ?>		
			<?php 
				if ($item->articleimage()->toFile()): 
					$image = $item->articleimage()->toFile();
				else:
					$image = '';
				endif;

				if ($image != ''): 

					$alt          = $image->alt();
					$smartphone   = $image->srcset([
						'1x' => ['width' => 355,'height' => 233,'crop' => 'center'],
						'2x' => ['width' => 710,'height' => 466,'crop' => 'center']
					]);
					$smartphoneW   = $image->srcset([
						'1x' => ['width' => 355,'height' => 233,'format' => 'webp','crop' => 'center'],
						'2x' => ['width' => 710,'height' => 466,'format' => 'webp','crop' => 'center']
					]);
					$tabletsmall  = $image->srcset([
						'1x' => ['width' => 338,'height' => 222,'crop' => 'center'],
						'2x' => ['width' => 676,'height' => 444,'crop' => 'center']
					]);
					$tabletsmallW  = $image->srcset([
						'1x' => ['width' => 338,'height' => 222,'format' => 'webp','crop' => 'center'],
						'2x' => ['width' => 676,'height' => 444,'format' => 'webp','crop' => 'center']
					]);
					$tabletbig    = $image->srcset([
						'1x' => ['width' => 466,'height' => 306,'crop' => 'center'],
						'2x' => ['width' => 932,'height' => 612,'crop' => 'center']
					]);
					$tabletbigW    = $image->srcset([
						'1x' => ['width' => 466,'height' => 306,'format' => 'webp','crop' => 'center'],
						'2x' => ['width' => 932,'height' => 612,'format' => 'webp','crop' => 'center']
					]);
					$desktopsmall    = $image->srcset([
						'1x' => ['width' => 347,'height' => 228,'crop' => 'center'],
						'2x' => ['width' => 694,'height' => 456,'crop' => 'center']
					]);
					$desktopsmallW    = $image->srcset([
						'1x' => ['width' => 347,'height' => 228,'format' => 'webp','crop' => 'center'],
						'2x' => ['width' => 694,'height' => 456,'format' => 'webp','crop' => 'center']
					]);
					$norm = $image->crop(694,456);	
					
				endif;
			?>		
			<figure <?php if($image->extension() == 'svg'): ?>class="svg"<?php endif ?>>
				<div class="gradient-line"></div>			
				<picture>
					<source srcset="<?= $smartphoneW ?>" 	type="image/webp" 				media="(max-width: 420px)">
					<source srcset="<?= $smartphone ?>" 	type="<?= $image->mime() ?>"	media="(max-width: 420px)">
					<source srcset="<?= $tabletsmallW ?>" 	type="image/webp"				media="(min-width: 421px) AND (max-width: 768px)">
					<source srcset="<?= $tabletsmall ?>" 	type="<?= $image->mime() ?>"	media="(min-width: 421px) AND (max-width: 768px)">
					<source srcset="<?= $tabletbigW ?>" 	type="image/webp"				media="(min-width: 769px) AND (max-width: 1024px)">
					<source srcset="<?= $tabletbig ?>" 		type="<?= $image->mime() ?>"	media="(min-width: 769px) AND (max-width: 1024px)">
					<source srcset="<?= $desktopsmallW ?>" 	type="image/webp"				media="(min-width: 1025px)">
					<source srcset="<?= $desktopsmall ?>" 	type="<?= $image->mime() ?>"	media="(min-width: 1025px)">
					<img src="<?= $norm->url() ?>" alt="<?= $alt ?>" class="" width="347" height="228"/>
				</picture>	
			</figure>
		<?php endif ?>

		<p class="date">
            <?php
            $dateFormat = new IntlDateFormatter('de_DE',
                IntlDateFormatter::FULL,
                IntlDateFormatter::FULL,
                'Europe/Berlin',
                IntlDateFormatter::GREGORIAN,
                'dd. MMMM yyyy');
            ?>
            <?php if($item->datetoday()->toBool() === true): ?>
                <?= $dateFormat->format(mktime(0, 0, 0, date('m'), date('d'), date('Y'))) ?>
            <?php else: ?>
                <?= $item->date()->toDate($dateFormat) ?>
            <?php endif ?>
		</p>
		
		<div class="text">
			<div class="description"><?= $item->description()->kt() ?></div>
		</div>
		
		<p>
			<span class="btn -primary">Weiterlesen</span>
		</p>
	</a>
</article>
