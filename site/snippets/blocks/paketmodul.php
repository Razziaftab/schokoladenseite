
<?php $count = 12/(count($block->module()->toStructure())) ?>

<div class="flex paketmodul">
	<?php foreach($block->module()->toStructure() as $modul): ?>
		<div class="column-<?= $count ?>">

			<h3 class="header">
				<span class="title"><?= $modul->title() ?></span>
				<?php if($modul->price()->isNotEmpty()): ?>
					<span class="price"><?= $modul->price() ?> €</span>
				<?php endif ?>
			</h3>
			
			<div class="fields">
				<?php foreach($modul->modulfields()->toStructure() as $field): ?>
				
					<p><?= $field->text() ?></p>
					
				<?php endforeach ?>
			</div>
		
			<div class="footer">
				<p>
					<a href="#kontaktform" class="btn -gradient modulbutton" data-modul="<?= $modul->title() ?>" title="jetzt anfragen">jetzt anfragen</a>
				</p>
			</div>
		</div>
	<?php endforeach ?>
</div>