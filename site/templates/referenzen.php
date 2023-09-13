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
		
			<div class="flex row" id="referenzh1">
				<div class="column-12">
					<h1><?= $page->h1() ?></h1>
					<p>Alle Online-Projekte der <a href="https://schokoladenseite.net/">SCHOKOLADENSEITE.net</a> chronologisch angeordnet.</p>
				</div>
			</div>
			
			<div class="flex row abstand-oben-weg">
				<div class="column-12">
					<h2 class="h4">Filter</h2>
					<ul class="filters filter-button-group">
						<li class="filter btn -small -primary active" aria-current="true" data-filter="*" tabindex="0">Alle anzeigen</li>
						<li class="filter btn -small -primary" data-filter=".cms" tabindex="0">CMS</li>
						<li class="filter btn -small -primary" data-filter=".webdesign" tabindex="0">Webdesign</li>
						<li class="filter btn -small -primary" data-filter=".shop"  tabindex="0">Online-Shop</li>
						<li class="filter btn -small -primary" data-filter=".newsletter" tabindex="0">Newsletter</li>
						<li class="filter btn -small -primary" data-filter=".barrierefreiheit" tabindex="0">Barrierefreiheit</li>
						<!--<li class="filter btn -small -primary" data-filter=".landingpage">Landingpages</li>
						<li class="filter btn -small -primary" data-filter=".cd">Corporate Design</li>-->
					</ul>
				</div>
			</div>
			
			<div class="row row-refs">
				<?php foreach($page->referenzen()->toStructure() as $key => $referenz): ?>
					<?php if( $referenz->ausblenden()->toBool() === false ): ?>
					
						<div class=" all<?php foreach($referenz->zuordnung()->split(',') as $item): ?> <?= $item ?><?php endforeach ?>"> 
							<div class="work-caption">
							
								<?php
									$image = $referenz->imagealt()->toFiles()->first();
				
									$smartphone = $image->srcset([
										'1x' => [
											'width' => 375,
											'height' => 227,
											'crop' => 'center'
										],
										'2x' => [
											'width' => 750,
											'height' => 454,
											'crop' => 'center'
										]
									]);
									$tabletsmall  = $image->srcset([
										'1x' => [
											'width' => 338,
											'height' => 207,
											'crop' => 'center'
										],
										'2x' => [
											'width' => 676,
											'height' => 414,
											'crop' => 'center'
										]
									]);
									$tabletbig    = $image->srcset([
										'1x' => [
											'width' => 466,
											'height' => 278,
											'crop' => 'center'
										],
										'2x' => [
											'width' => 932,
											'height' => 556,
											'crop' => 'center'
										]
									]);
									$desktopsmall = $image->srcset([
										'1x' => [
											'width' => 494,
											'height' => 276,
											'crop' => 'center'
										],
										'2x' => [
											'width' => 988,
											'height' => 552,
											'crop' => 'center'
										]
									]);
									$norm = $image->crop(494,276);	
								?>
								
								<picture>
									<source srcset="<?= $smartphone ?>" media="(max-width: 420px)">
									<source srcset="<?= $tabletsmall ?>" media="(min-width: 421px) AND (max-width: 768px)">
									<source srcset="<?= $tabletbig ?>" media="(min-width: 769px) AND (max-width: 1024px)">
									<source srcset="<?= $desktopsmall ?>" media="(min-width: 1025px)">
									<img src="<?= $norm->url() ?>" <?php if ($image->alt()->isNotEmpty()): ?>alt="<?= $image->alt() ?>"<?php endif ?>/>
								</picture>
									
								<div>
									<h2 class="h3"><?= $referenz->headline() ?></h2>
									<?= $referenz->text()->kt() ?>
									<?php if($referenz->cms()->isNotEmpty()): ?>
										<?php foreach ($referenz->cms()->toPages() as $cms): ?>
											<p><strong>System:</strong> <a href="<?= $cms->url() ?>"><?= $cms->title() ?></a></p>
										<?php endforeach ?>
									<?php endif ?>

									<?php if( $referenz->website()->isNotEmpty()): ?>
										<?php $ansehen = 'Firmenwebsite ansehen' ?>
										<?php $ansehenTitle = 'Externer Link zur Firmenwebsite' ?>
										
										<?php foreach($referenz->zuordnung()->split(',') as $item): ?>
											<?php if($item == 'shop'): ?>
												<p class="work-category">
													<?php $ansehenTitle = 'Zum Online-Shop' ?>
													<?php $ansehen = 'Online-Shop ansehen' ?>
												</p>
											<?php endif ?>
										<?php endforeach ?>

										<p class="btn-wrapper"><a href="<?= $referenz->website() ?>" class="btn -primary" rel="noopener" target="_blank" title="<?= $ansehenTitle ?> <?= $referenz->headline() ?> (Öffnet im neuen Tab)">
											<?= $ansehen ?>
										</a></p>
									<?php endif ?>
								</div>
							</div>
						
							<?php /* ?>
							<div class="overlay-caption">
								<div>
									<?= $referenz->imagealt()->toFiles()->last() ?>
								</div>
								<div>
									<h2><?= $referenz->headline() ?></h2>
									<?= $referenz->text()->kt() ?>
									<?php if($referenz->website()->isNotEmpty()): ?>
										<?php $ansehen = 'Firmenwebsite ansehen' ?>
										<?php $ansehenTitle = 'Externer Link zur Firmenwebsite' ?>
										<?php foreach($referenz->zuordnung()->split(',') as $item): ?>
											<?php if($item == 'shop'): ?>
												<?php $ansehenTitle = 'Zum Online-Shop' ?>
												<?php $ansehen = 'Online-Shop ansehen' ?>
											<?php endif ?>
										<?php endforeach ?>
										<a href="<?= $referenz->website() ?>" class="btn -primary" rel="noopener" target="_blank" title="<?= $ansehenTitle ?> <?= $referenz->headline() ?> (Öffnet im neuen Tab)">
											<?= $ansehen ?>
										</a>
									<?php endif ?>
								</div>
								<div class="close" tabindex="0"></div>
							</div>
							<?php */ ?>
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
		<script src="<?= $kirby->url() ?>/assets/js/imagesloaded.pkgd.min.js"></script>
		<script src="<?= $kirby->url() ?>/assets/js/jquery.matchHeight.js"></script> <!-- https://github.com/liabru/jquery-match-height -->

		<script type="text/javascript">
		
			var itemSelector = '.all'; 

			$(document).ready(function(){
				// init Isotope Referenzen
				var $grid = $('.row-refs').isotope({
					itemSelector: itemSelector,
					layoutMode: 'fitRows',
					percentPosition: true,
					resizable: false,
					fitRows: {
						gutter: 30,
						columnWidth: '.all',
						equalheight: true
					}
				});
				
				// updates grid after all images are loaded.
				$grid.imagesLoaded( function() {
					$grid.isotope('layout');
				});
			
				var itemsPerPage = 9;
				var currentNumberPages = 1;
				var currentPage = 1;
				var currentFilter = '*';
				var filterAtribute = 'data-filter';
				var pageAtribute = 'data-page';
				var pagerClass = 'isotope-pager';

				function getHashFilter() {
					var hash = location.hash;
					var matches = location.hash.match( /filter=([^&]+)/i );			
					var hashFilter = matches && matches[1];
					
					return hashFilter && decodeURIComponent( hashFilter );
				}
			
			function changeFilter(selector) {
				$grid.isotope({
					filter: selector
				});
			}

			function goToPage(n) {
				currentPage = n;
				
				$('.isotope-pager a').removeClass('active');
				$('.isotope-pager a').attr('aria-current','false');
				$('.isotope-pager a:nth-child(' + currentPage + ')').attr('aria-current','true');
				$('.isotope-pager a:nth-child(' + currentPage + ')').addClass('active');

				var selector = itemSelector;
					selector += ( currentFilter != '*' ) ? currentFilter : '';
					selector += '['+pageAtribute+'="'+currentPage+'"]';
					
				changeFilter(selector);
				
				var matchesFilter = location.hash.match( /filter=([^&]+)/i );			
				
				if ( n != 1 ) {
					if ( matchesFilter ) {
						window.location.hash = matchesFilter[0] + '&page=' + n;
					} else {
						window.location.hash = 'page=' + n;
					}
				} else {
					if ( matchesFilter ) {
						window.location.hash = matchesFilter[0];
					} else {
						history.pushState("", document.title, window.location.pathname);
					}
				}
				
				
			}

			function setPagination() {

				var SettingsPagesOnItems = function(){

					var itemsLength = $grid.children(itemSelector).length;
					
					var pages = Math.ceil(itemsLength / itemsPerPage);
					var item = 1;
					var page = 1;
					var selector = itemSelector;
						selector += ( currentFilter != '*' ) ? currentFilter : '';
					
					$(selector).each(function(){
						 
						if( item > itemsPerPage ) {
							page++;
							item = 1;
						}
						$(this).attr(pageAtribute, page);
						item++;
					});

					currentNumberPages = page;
				}();

				var CreatePagers = function() {

					var $isotopePager = ( $('.'+pagerClass).length == 0 ) ? $('<div class="'+pagerClass+'"></div>') : $('.'+pagerClass);

					$isotopePager.html('');
					
					for( var i = 0; i < currentNumberPages; i++ ) {
						var $pager = $('<a href="javascript:void(0);" class="pager" '+pageAtribute+'="'+(i+1)+'"></a>');
							$pager.html(i+1);
							
							$pager.click(function(){
								var page = $(this).eq(0).attr(pageAtribute);
								
								$('html,body').animate({
									scrollTop: $('.row-refs').offset().top - 140 + 'px'
								}, 800);
													
								
								goToPage(page);
							});

						$pager.appendTo($isotopePager);
					}

					$grid.after($isotopePager);

				}();
			}

						
				$('.filters li').click(function(){
					var filter = $(this).attr(filterAtribute);
					currentFilter = filter;
					location.hash = 'filter=' + encodeURIComponent( filter );

					$(this).addClass('active');
					$(this).siblings().removeClass('active');
					$(this).siblings().attr('aria-current','false');
					$(this).attr('aria-current','true');

					setPagination();
					goToPage(1);
				});
				
				$('.filters li').on({
					'keydown': function() {
						var keycode = (event.keyCode ? event.keyCode : event.which);
						if(keycode == '13'){
							var filter = $(this).attr(filterAtribute);
							currentFilter = filter;
							location.hash = 'filter=' + encodeURIComponent( filter );

							$(this).addClass('active');
							$(this).siblings().removeClass('active');
							$(this).siblings().attr('aria-current','false');
							$(this).attr('aria-current','true');
								
							setPagination();
							goToPage(1);
						}
					},
				});

				function locationHash(){
					var hashFilter = getHashFilter();
					var matchesFilter = location.hash.match( /page=([^&]+)/i );	

					if ( hashFilter ) {
						currentFilter = hashFilter;
						
						$('.filters').find('.active').removeClass('active');
						$('.filters').find('[data-filter="' + hashFilter + '"]').addClass('active');

						setPagination();
					}

					if ( matchesFilter ) {
						currentPage = matchesFilter[1];
						goToPage(matchesFilter[1]);
					} else {
						goToPage(1);
					}
					
					if( !hashFilter && !matchesFilter ){
						location.reload();
					}
				}

				if(window.location.hash) {
					locationHash();
				}

				setPagination();
				goToPage(currentPage);
				
				$(function() {
					$('.all').matchHeight();
				});
			});
			
			<?php /* ?>
			$('.all .work-caption img').on({
				'click': function(){
					$('footer').after('<div class="overlay"><div class="close"></div></div>');
					$('.overlay').css('opacity','1');
					$(this).parent('.work-caption').next('.overlay-caption').addClass('active');
				
					$('.overlay-caption .close').click(function(){
						$(this).parent('.overlay-caption').removeClass('active');
						$('.overlay').remove();
					});
					
					$('.overlay .close').click(function(){
						$('.overlay-caption').removeClass('active');
						$('.overlay').remove();
					});
				},
				'keydown': function(){
					var keycode = (event.keyCode ? event.keyCode : event.which);
					if(keycode == '13'){
						$('footer').after('<div class="overlay"><div class="close"></div></div>');
						$('.overlay').css('opacity','1');
						$(this).parent('.work-caption').next('.overlay-caption').addClass('active');
					
						$('.overlay-caption .close').on('keydown', function(){
							var keycode = (event.keyCode ? event.keyCode : event.which);
							if(keycode == '13'){
								$(this).parent('.overlay-caption').removeClass('active');
								$('.overlay').remove();
							}
						});
						
						$('.overlay .close').keydown(function(){
							var keycode = (event.keyCode ? event.keyCode : event.which);
							if(keycode == '13'){
								$('.overlay-caption').removeClass('active');
								$('.overlay').remove();
							}
						});
					}
				}
			});
			<?php */ ?>
			

		</script>
	</body>
	
</html>