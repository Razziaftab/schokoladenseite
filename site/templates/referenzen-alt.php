<!DOCTYPE html>
<html lang="de" data-lt-installed="true">

	<!-- HEAD -->
	<?php snippet('head') ?>

	<!-- BODY -->
	<body>
	
		<a id="skip-content" href="#main">Zum Inhaltsbereich wechseln.</a>

		<!-- HEADER -->
		<?php snippet('header') ?>

		<!-- MAIN -->
		<main id="main">
		
			<div class="flex row">
				<div class="column-12">
					<h1><?= $page->h1() ?></h1>
				</div>
			</div>
			
			<div class="flex row">
				<div class="column-12">
					<ul class="filters filter-button-group">
						<li class="filter btn -small -primary active" data-filter="*">Alle anzeigen</li>
						<li class="filter btn -small -primary" data-filter=".cms">CMS</li>
						<li class="filter btn -small -primary" data-filter=".webdesign">Webdesign</li>
						<li class="filter btn -small -primary" data-filter=".shop">Online-Shop</li>
						<li class="filter btn -small -primary" data-filter=".newsletter">Newsletter</li>
						<!--<li class="filter btn -small -primary" data-filter=".landingpage">Landingpages</li>
						<li class="filter btn -small -primary" data-filter=".cd">Corporate Design</li>-->
					</ul>
				</div>
			</div>
			
			<div class="row row-refs slide-out">
				<?php foreach($page->referenzen()->toStructure() as $key => $referenz): ?>
					<?php if( $referenz->ausblenden()->toBool() === false ): ?>
						<div class="slide-element flex all<?php foreach($referenz->zuordnung()->split(',') as $item): ?> <?= $item ?><?php endforeach ?> <?php if($key == 0): ?>active<?php endif ?>"> 
							<div class="work-caption">
								<h2><?= $referenz->headline() ?></h2>
								<?= $referenz->text()->html() ?>
								
								<?php if( $referenz->website()->isNotEmpty()): ?>
									<p class="work-category">
										<a href="<?= $referenz->website() ?>" class="btn -small" rel="noopener" target="_blank">
											<?php $ansehen = 'Firmenwebsite ansehen' ?>
											<?php foreach($referenz->zuordnung()->split(',') as $item): ?>
												<?php if($item == 'shop'): ?>
													<?php $ansehen = 'Online-Shop ansehen' ?>
												<?php endif ?>
											<?php endforeach ?>
											<?= $ansehen ?>
										</a>
									</p>
								<?php endif ?>
								
							</div>
							<div class="middle">
								<div>
									<?php $imagesSmall = $referenz->imagessmall()->toFiles(); ?>
									<?php $imagesBig = $referenz->images()->toFiles(); ?>
									<?php $firstimagesSmall = $referenz->imagessmall()->toFiles()->first() ?>
									<?php $firstimagesBig = $referenz->images()->toFiles()->first() ?>
									
									<?php foreach($imagesSmall as $imagesmall): ?>
										<?php if($imagesmall == $firstimagesSmall): ?>
											<picture>
												<source srcset="<?= $imagesmall->resize(400)->url() ?>" type="image/webp">
										<?php endif ?>
									<?php endforeach ?>
									
									<?php foreach($imagesBig as $imagebig): ?>
										<?php if($imagebig == $firstimagesBig): ?>
												<source srcset="<?= $imagebig->resize(400)->url() ?>" type="image/png">
												<img src="<?= $imagebig->resize(400)->url() ?>" alt="<?php if($imagebig->content()->alt()->isNotEmpty()):?><?= $imagebig->content()->alt() ?><?php else: ?><?= $referenz->headline() ?><?php endif ?>">
											</picture>
										<?php endif ?>
									<?php endforeach ?>
								</div>
							</div>
							<div class="images">
								<?php $newsletter = '' ?>
								<?php foreach($referenz->zuordnung()->split(',') as $item): ?>
									<?php if($item == 'mailchimp'): ?>
										<?php $newsletter = 'mailchimp' ?>
									<?php elseif($item == 'cleverreach'): ?>
										<?php $newsletter = 'cleverreach' ?>
									<?php endif ?>
								<?php endforeach ?>
								
								<?php if( $newsletter != '' ): ?>
									<?php if($newsletter == 'mailchimp'): ?>
										<img style="padding:40px; width: 100%;" src="<?= $kirby->url() ?>/assets/img/mailchimp-logo.svg" alt="MailChip Logo" title="MailChip" />
									<?php elseif($item == 'cleverreach'): ?>
										<img style="padding:40px;" src="<?= $kirby->url() ?>/assets/img/logo_cleverreach.svg" alt="CleverReach Logo" title="CleverReach" />
									<?php endif ?>
								<?php else: ?>
									<?php foreach($imagesSmall as $imagesmall): ?>
										<?php foreach($imagesBig as $imagebig): ?>
											<?php if ($imagesSmall->indexOf($imagesmall) == $imagesBig->indexOf($imagebig)): ?>
												<div>
													<picture>
														<source srcset="<?= $imagesmall->resize(400)->url() ?>" type="image/webp">
														<source srcset="<?= $imagebig->resize(400)->url() ?>" type="image/png">
														<img src="<?= $imagebig->resize(400)->url() ?>" alt="<?php if($imagebig->content()->alt()->isNotEmpty()):?><?= $imagebig->content()->alt() ?><?php else: ?><?= $referenz->headline() ?><?php endif ?>">
													</picture>
												</div>
											<?php endif ?>
										<?php endforeach ?>
									<?php endforeach ?>
								<?php endif ?>
							</div>
						</div>
					<?php endif ?>
				<?php endforeach ?>
			</div>
		</main>
		
		<!-- FOOTER -->
		<?php snippet('footer') ?>
		
		<!-- ASIDE -->
		<?php snippet('aside') ?>
		
		<!-- BACK-TO-TOP -->
		<?php snippet('back-to-top') ?>
		
		<!-- JS -->
		<?php snippet('js') ?>
		<script src="<?= $kirby->url() ?>/assets/js/isotope.pkgd.min.js"></script>
		<script type="text/javascript">
		
			$(document).ready(function(){
				// init Isotope Referenzen
				var $grid = $('.row-refs').isotope({
					itemSelector: '.slide-element',
					layoutMode: 'vertical',
				});
				
				// bind filter button click
				$('.filter-button-group').on( 'click', 'li', function() {
					var filterValue = $( this ).attr('data-filter');
					// use filterFn if matches value
					filterValue = filterValue;
					$grid.isotope({ filter: filterValue });
				});

				// change is-checked class on buttons
				$('.filter-button-group').each( function( i, buttonGroup ) {
					var $buttonGroup = $( buttonGroup );
					$buttonGroup.on( 'click', 'li', function() {
						$buttonGroup.find('.active').removeClass('active');
						$( this ).addClass('active');
					});
				});
			});
		</script>
	</body>
	
</html>