<div class="row">
	<h2 class="center" id="kunden"><?= $block->text()->kti() ?></h2>
	<ul class="logos" data-show="12">
		<?php foreach($pages->find('internet-agentur-hamburg')->kunde()->toStructure() as $key=>$kunde): ?>
			<?php if($key < 12): ?>
				<li>
					<img src="<?= $kunde->logo()->toFile()->url() ?>" title="<?= $kunde->name() ?>" alt="<?= $kunde->name() ?> Logo">
				</li>
			<?php else: ?>
				<li class="hidden" aria-hidden="true">
					<img src="<?= $kunde->logo()->toFile()->url() ?>" title="<?= $kunde->name() ?>" alt="<?= $kunde->name() ?> Logo">
				</li>
			<?php endif ?>
		<?php endforeach ?>
	</ul>
	<p><span class="btn -primary show-more-logos" role="button" aria-label="Zeige weitere zwölf Logos an" tabindex="0">Mehr anzeigen</span></p>
</div>