<?php if (!$block->isHidden()): ?>
	<<?= $level = $block->level()->or('h2') ?> class="manual-heading"><?= $block->text()->kti() ?></<?= $level ?>>
<?php endif ?>