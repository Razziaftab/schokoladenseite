<article class="blog-list">
    <a href="<?= $item->url() ?>" title="Zum Blogbeitrag: <?= $item->title()->kti() ?>">
        
        <?php 
            if($page->id() != 'blog') {
                $h = 'h3';
            }  else {
                $h = 'h2';
            }
        ?>
        
        <<?= $h ?> class="title h3">
            <?php if($item->articleheader()->isNotEmpty()): ?>
                <?= $item->articleheader()->kti() ?>
            <?php else: ?>
                <?= $item->title()->kti() ?>
            <?php endif ?>
        </<?= $h ?>>
        
        <div class="text">
            <div class="description"><?= $item->description()->kt() ?></div>
        </div>

    </a>
</article>
