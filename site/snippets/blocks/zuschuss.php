<?php if($block->zuschussShow()->isNotEmpty()): ?>
    <h2>Mögliche Bezuschussungen</h2>
    <div class="flex benefits">
        <?php foreach($block->zuschussShow()->split('|,') as $zuschuss): ?>
            <?php $zuschuss = str_replace('|', '', $zuschuss) ?>
            <div class="column-3">
                <?php foreach($kirby->page('jobs')->zuschuss()->toStructure() as $item): ?>
                    <?php if($item->text()->kti() == $zuschuss): ?>
                        <img src="<?= $item->icon()->toFile()->url() ?>" />
                    <?php endif ?>
                <?php endforeach ?>
                <p><?= $zuschuss ?></p>
            </div>
        <?php endforeach ?>
    </div>
<?php endif ?>