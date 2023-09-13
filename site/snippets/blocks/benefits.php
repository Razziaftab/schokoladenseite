<?php if($block->benefitspage()->isNotEmpty()): ?>
    <h2>Wir bieten dir</h2>
    <div class="flex benefits">
        <?php foreach($block->benefitspage()->split('|,') as $benefit):?>
            <?php $benefit = str_replace('|', '', $benefit) ?>
            <div class="column-3">
                <?php foreach($kirby->page('jobs')->benefits()->toStructure() as $item):?>
                    <?php if($item->text()->kti() == $benefit): ?>
                        <img src="<?= $item->icon()->toFile()->url() ?>" />
                    <?php endif ?>
                <?php endforeach ?>
                <p><?= $benefit ?></p>
            </div>
        <?php endforeach ?>
    </div>
<?php endif ?>

