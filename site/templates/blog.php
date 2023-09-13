<!DOCTYPE html>
<html lang="de" data-lt-installed="true">

	<!-- HEAD -->
	<?php snippet('head') ?>

	<!-- BODY -->
	<body class="page-blog">
	
		<a id="skip-content" href="#main">Zum Inhaltsbereich wechseln.</a>

		<!-- HEADER -->
		<?php snippet('header') ?>

		<!-- MAIN -->
		<main id="main">
			<div class="row">
				<h1><?= $page->text() ?></h1>
			</div>
			<div class="row">
				<div class="column-12">
					<h2 class="h4">Filter</h2>
					<ul class="filters filter-button-group filters-blog">
						<li class="filter btn -small -primary <?= ($filterBy == 'All' || !$filterBy) ? 'active' : '' ?> " aria-current="true" data-filter="*" tabindex="0">
                            <a href="<?= url('blog', ['params' => ['categories' => 'All']]) ?>">Alle anzeigen</a>
                        </li>
						<li class="filter btn -small -primary <?= ($filterBy == 'Agentur') ? 'active' : '' ?>" data-filter=".Agentur" tabindex="0">
                            <a href="<?= url('blog', ['params' => ['categories' => 'Agentur']]) ?>">Agentur</a>
                        </li>
						<li class="filter btn -small -primary <?= ($filterBy == 'DSGVO') ? 'active' : '' ?>" data-filter=".DSGVO" tabindex="0">
                            <a href="<?= url('blog', ['params' => ['categories' => 'DSGVO']]) ?>">DSGVO</a>
                        </li>
						<li class="filter btn -small -primary <?= ($filterBy == 'Marketing') ? 'active' : '' ?>" data-filter=".Marketing" tabindex="0">
                            <a href="<?= url('blog', ['params' => ['categories' => 'Marketing']]) ?>">Marketing</a>
                        </li>
						<li class="filter btn -small -primary <?= ($filterBy == 'Technik') ? 'active' : '' ?>" data-filter=".Technik" tabindex="0">
                            <a href="<?= url('blog', ['params' => ['categories' => 'Technik']]) ?>">Technik</a>
                        </li>
						<li class="filter btn -small -primary <?= ($filterBy == 'Webdesign') ? 'active' : '' ?>" data-filter=".Webdesign" tabindex="0">
                            <a href="<?= url('blog', ['params' => ['categories' => 'Webdesign']]) ?>">Webdesign</a>
                        </li>
						<li class="filter btn -small -primary <?= ($filterBy == 'Barrierefreiheit') ? 'active' : '' ?>" data-filter=".Barrierefreiheit" tabindex="0">
                            <a href="<?= url('blog', ['params' => ['categories' => 'Barrierefreiheit']]) ?>">Barrierefreiheit</a>
                        </li>
					</ul>
				</div>
			</div>

			<div class="row abstand-oben-weg">				
				<form>
					<div class="search field">
						<input type="search" aria-label="Search" name="q" value="<?= html($query) ?>"  placeholder="Suche nach interessanten Artikeln...">
						<label for="q">Suche nach interessanten Artikeln...</label>
						<input type="submit" value="Search" class="searchBtn btn -primary filter">
					</div>
				</form>
			</div>

			<div class="blog row abstand-oben-weg">	
				<?php foreach ($listeditems as $item): ?>
					<?php if((array)$results && $query !== "" && $query !== null): ?>
						<?php foreach ($results as $result): ?>
							<?php if($result == $item): ?>
								<?php snippet('blogentry', array('item' => $item)) ?>
							<?php endif ?>
						<?php endforeach ?>
                    <?php else: ?>
						<?php snippet('blogentry', array('item' => $item)) ?>
					<?php endif ?>
				<?php endforeach ?>

				<?php if($results == '' && $query !== "" && $query !== null): ?>
					<p>Leider konnte mit dem Suchwort nichts gefunden werden.</p>
				<?php endif ?>
			</div>

            <!-- pagination -->
            <div class="row">
				<nav class="pagination articles-pagination">
					<?php
					if ($pagination->pages() > 1) {
						for ($i=1; $i<=$pagination->pages(); $i++) { ?>
							<a href="<?= $pagination->pageUrl($i) ?>" class="btn -primary -small filter <?= ($pagination->page() == $i) ? 'active' : '' ?>"><?= $i ?></a>
						<?php }
					} ?>
				</nav>
			</div>
		
		</main>
		
		<!-- FOOTER -->
		<?php snippet('footer') ?>
		
		<!-- ASIDE -->
		<?php snippet('aside') ?>
		
		<!-- BACK-TO-TOP -->
		<?php snippet('back-to-top') ?>
		
		<!-- JS -->
		<?php snippet('js') ?>
		<script src="<?= $kirby->url() ?>/assets/js/isotope.pkgd.min.js"></script>
		<script src="<?= $kirby->url() ?>/assets/js/imagesloaded.pkgd.min.js"></script>
	</body>
	
</html>