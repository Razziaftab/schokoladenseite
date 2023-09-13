<?php foreach ($field->toLayouts() as $layout):?>
	<?php $rowmax = false ?>
	<?php $max = false ?>

	<?php if($layout->layoutClass()->isNotEmpty()): ?>
		<?php foreach($layout->layoutClass()->split(',') as $class): ?> 
			<?php if($class == 'rowmax' || $class == 'hero' || $class == 'quote' || $class == 'bg-lightgrey' || $class == 'bg-greytowhite'): ?> 
				<?php $rowmax = true ?>
			<?php endif ?>
		<?php endforeach ?>
	<?php endif ?>
	
	<?php if($layout->columns()->count() > 1): ?>	
		<?php if($rowmax): ?> 
			<div class="<?php foreach ($layout->layoutClass()->split(',') as $class):?><?= $class ?> <?php endforeach ?><?php if($layout->toggle()=="true"): ?> abstand-oben-weg<?php endif ?>" <?php if($layout->layoutId()->isNotEmpty()):?>id="<?=$layout->layoutId()?>" tabindex="-1"<?php endif ?> <?php if($layout->ariaLabelledby()->isNotEmpty()):?>aria-labelledby="<?=$layout->ariaLabelledby()?>"<?php endif ?><?php if( $layout->backgroundImage()->isNotEmpty()): ?> style="background-image:url(<?= $layout->backgroundImage()->toFile()->url() ?>)" <?php endif ?>>
				<div class="flex row">
					<?php foreach ($layout->columns() as $column): ?>	
						<div class="column-<?= $column->span() ?>">
							<?= $column->blocks() ?>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		<?php else: ?>
			<div class="flex row <?php foreach ($layout->layoutClass()->split(',') as $class):?><?= $class ?> <?php endforeach ?><?php if($layout->toggle()=="true"): ?> abstand-oben-weg<?php endif ?>" <?php if($layout->layoutId()->isNotEmpty()):?>id="<?=$layout->layoutId()?>" tabindex="-1"<?php endif ?> <?php if($layout->ariaLabelledby()->isNotEmpty()):?>aria-labelledby="<?=$layout->ariaLabelledby()?>"<?php endif ?><?php if( $layout->backgroundImage()->isNotEmpty()): ?> style="background-image:url(<?= $layout->backgroundImage()->toFile()->url() ?>)" <?php endif ?>>
				<?php foreach ($layout->columns() as $column): ?>	
					<div class="column-<?= $column->span() ?>">
						<?= $column->blocks() ?>
					</div>
				<?php endforeach ?>
			</div>
		<?php endif ?>
	<?php else: ?>	
		
		<?php foreach ($layout->columns() as $column): ?>
			<?php foreach ($column->blocks() as $block): ?>
				<?php if($block->type() == 'video' || $block->type() == 'headerbild' || $block->type() == 'kunden' || $block->type() == 'cms-header' || $block->type() == 'cms-header-neu' || $block->type() == 'cta'): ?>
					<?php $max = true ?>
				<?php endif ?>
			<?php endforeach ?>
		<?php endforeach ?>
	
		<?php if($max): ?> 
			<div class="<?php foreach ($layout->layoutClass()->split(',') as $class):?><?= $class ?> <?php endforeach ?><?php if($layout->toggle()=="true"): ?> abstand-oben-weg<?php endif ?>" <?php if($layout->layoutId()->isNotEmpty()):?>id="<?=$layout->layoutId()?>" tabindex="-1"<?php endif ?> <?php if($layout->ariaLabelledby()->isNotEmpty()):?>aria-labelledby="<?=$layout->ariaLabelledby()?>"<?php endif ?><?php if( $layout->backgroundImage()->isNotEmpty()): ?> style="background-image:url(<?= $layout->backgroundImage()->toFile()->url() ?>)" <?php endif ?>>
				<?php foreach ($layout->columns() as $column): ?>	
					<?= $column->blocks() ?>
				<?php endforeach ?>
			</div>

			<?php if( $block->button()->isNotEmpty()): ?>
				<div class="warumdarum">
					<div class="container -pt-0">
						<?= $block->button()->kti() ?>			
					</div>
				</div>
			<?php endif ?>
		<?php elseif($rowmax): ?> 
			<div class="<?php foreach ($layout->layoutClass()->split(',') as $class):?><?= $class ?> <?php endforeach ?><?php if($layout->toggle()=="true"): ?> abstand-oben-weg<?php endif ?>" <?php if($layout->layoutId()->isNotEmpty()):?>id="<?=$layout->layoutId()?>" tabindex="-1"<?php endif ?> <?php if($layout->ariaLabelledby()->isNotEmpty()):?>aria-labelledby="<?=$layout->ariaLabelledby()?>"<?php endif ?><?php if( $layout->backgroundImage()->isNotEmpty()): ?> style="background-image:url(<?= $layout->backgroundImage()->toFile()->url() ?>)" <?php endif ?>>
				<div class="row">
					<?php foreach ($layout->columns() as $column): ?>	
						<?= $column->blocks() ?>
					<?php endforeach ?>
				</div>
			</div>
		<?php else: ?>
			<div class="row <?php foreach ($layout->layoutClass()->split(',') as $class):?><?= $class ?> <?php endforeach ?><?php if($layout->toggle()=="true"): ?> abstand-oben-weg<?php endif ?>" <?php if($layout->layoutId()->isNotEmpty()):?>id="<?=$layout->layoutId()?>" tabindex="-1"<?php endif ?> <?php if($layout->ariaLabelledby()->isNotEmpty()):?>aria-labelledby="<?=$layout->ariaLabelledby()?>"<?php endif ?><?php if( $layout->backgroundImage()->isNotEmpty()): ?> style="background-image:url(<?= $layout->backgroundImage()->toFile()->url() ?>)" <?php endif ?>>
				<?php foreach ($layout->columns() as $column): ?>	
					<?= $column->blocks() ?>
				<?php endforeach ?>
			</div>
		<?php endif ?>
		
	<?php endif ?>
<?php endforeach ?>
