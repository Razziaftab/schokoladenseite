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
		<main id="main" class="manual">
			<div class="index">
				<strong>Inhaltsverzeichnis:</strong>
				<ul>
					<?php foreach ($page->layout()->toLayouts() as $layout):?>
						<?php foreach ($layout->columns() as $column): ?>
							<?php foreach ($column->blocks() as $block): ?>
								<?php if (!$block->isHidden()): ?>
									<?php if ($block->type() == "heading-manual"): ?>
										<li>
											<a href="#<?= $block->customId() ?>" class="manual-<?= $block->level() ?>"><?= $block->text() ?></a>
										</li>
									<?php endif ?>
								<?php endif ?>
							<?php endforeach ?>
						<?php endforeach ?>
					<?php endforeach ?>
				</ul>
			</div>

			
			<?php foreach ($page->layout()->toLayouts() as $layout):?>
			
				<?php 
					foreach ($layout->columns() as $column){
						foreach ($column->blocks() as $block){
							if (!$block->isHidden()){
								if ($block->type() == "heading-manual"){
									$id = $block->customId();
								}
							}
						}
					}
				?>
			
			
				<div class="row flex" id="<?= isset($id) ? $id : "" ?>">
					<?php foreach ($layout->columns() as $column): ?>
						<div class="column-<?= $column->span() ?>">
							<?= $column->blocks() ?>
						</div>
					<?php endforeach ?>
				</div>
			<?php endforeach ?>
		</main>
		
		<!-- FOOTER -->
		<?php snippet('footer') ?>
		
		<!-- ASIDE -->
		<?php snippet('aside') ?>
		
		<!-- BACK-TO-TOP -->
		<?php snippet('back-to-top') ?>
		
		<!-- JS -->
		<?php snippet('js') ?>
		
		<script>
		
			$(document).ready(function(){
				
				$('.row').each(function(){
					if($(this).attr('id') == $(this).next('div').attr('id')){
						$id = $(this).attr('id');
						$('.row#' + $id).wrapAll( "<div id='" + $id + "' />");
						$('.row#' + $id).removeAttr('id');
					}
				});

				$(document).scroll(function(){
					$('.index a').each(function(){

						var container = $(this).attr('href');
						var containerOffset = $(container).offset().top;
						var containerHeight = $(container).outerHeight();
						var containerBottom = containerOffset + containerHeight;
						var scrollPosition = $(document).scrollTop();
				
						if(scrollPosition < containerBottom - 80 && scrollPosition >= containerOffset - 80){
							$(this).addClass('active');
						} else{
							$(this).removeClass('active');
						}
				
					});
				});
			});
		
		</script>

	</body>
	
</html>