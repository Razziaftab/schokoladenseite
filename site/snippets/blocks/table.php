<div class="tablediv">
    <div class="table">


        <?php foreach($block->column()->toStructure() as $column): ?>
            <div>
                <?php foreach($column->row()->toStructure() as $row): ?>
                    <div>
                        <?= $row->cell() ?>
                    </div>
                <?php endforeach ?>
            </div>
        <?php endforeach ?>

    </div>
</div>