<?= '<?xml version="1.0" encoding="utf-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <?php foreach ($pages as $p): ?>
        <?php if (in_array($p->uri(), $ignore)) continue ?>
        <url>
            <loc>
				<?php if($p->parent() == 'internet-agentur-hamburg' || 
						 $p->parent() == 'leistungen' ||
						 $p->parent() == 'projekte' ||
						 $p->parent() == 'kontakt' ||
						 $p->parent() == 'leistungen/online-marketing-werbung' ||
						 $p->parent() == 'leistungen/technische-betreuung' ||
						 $p->parent() == 'leistungen/webentwicklung'): ?>
					<?= html($kirby . '/' . $p->slug()) ?>
				<?php else: ?>
					<?= html($p->url()) ?>
				<?php endif ?>
			</loc>
            <lastmod><?= $p->modified('c', 'date') ?></lastmod>
            <priority><?= ($p->isHomePage()) ? 1 : number_format(0.5 / $p->depth(), 1) ?></priority>
        </url>
    <?php endforeach ?>
</urlset>

