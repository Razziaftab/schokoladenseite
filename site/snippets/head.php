<head>

	<?php if($page->Template() == 'article'): ?>
		<?php
		$dateFormat = new IntlDateFormatter('de_DE',
			IntlDateFormatter::FULL,
			IntlDateFormatter::FULL,
			'Europe/Berlin',
			IntlDateFormatter::GREGORIAN,
			'dd. MMMM yyyy');
		?>
		<?php if($page->datetoday()->toBool() === true): ?>
			<?php $date = $dateFormat->format(mktime(0, 0, 0, date('m'), date('d'), date('Y'))) ?>
		<?php else: ?>
			<?php $date = $page->date()->toDate($dateFormat) ?>
		<?php endif ?>
		<?php if($page->seodescription()->isNotEmpty()): ?>
			<?php $description = $date . ' - ' . $page->seodescription() ?>
		<?php else: ?>
			<?php $description = $date . ' - ' . $page->description() ?>
		<?php endif ?>
		<?php foreach($page->articleimage()->toFiles() as $articleimage): ?>
			<?php if($articleimage->extension() != 'webp'): ?>
				<?php $image = $articleimage ?>
			<?php endif ?>
		<?php endforeach ?>
		<?php $canonical = $page->url() ?>
	<?php elseif($page->Template() == 'door'): ?>
		<?php $description = $page->seoDescription() ?>
		<?php $image = $page->image() ?>
		<?php $canonical = $page->url() ?>
	<?php elseif($page->Template() == 'adventskalender'): ?>
		<?php $description = $page->seoDescription() ?>
		<?php $image = $page->seoImage()->toFile() ?>
		<?php $canonical = $kirby->url() . '/' . $page->slug() ?>

	<?php else: ?>
		<?php $description = $page->seoDescription() ?>
		<?php if($page->seoImage()->isNotEmpty()): ?>
			<?php $image = $page->seoImage()->toFile() ?>
		<?php else: ?>
			<?php $image = $kirby->page('home')->seoImage()->toFile() ?>
		<?php endif ?>
		
		<?php if($page->id() == 'home'): ?>
			<?php $canonical = 'https://schokoladenseite.net/' ?>
		<?php elseif($page->Template() == 'job'): ?>
			<?php $canonical = $page->url() ?>
		<?php else: ?>
			<?php $canonical = $kirby->url() . '/' . $page->slug() ?>
		<?php endif ?>
		
	<?php endif ?>


	<!-- META -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="<?= $description ?>">
	<?php if($page->Template() == 'door'): ?>
		<meta name="robots" content="NOINDEX,NOFOLLOW">
	<?php else: ?>
		<meta name="robots" content="INDEX,FOLLOW">
	<?php endif ?> 

	<!-- TITLE -->
	<title><?php if($page->seoTitle()->isNotEmpty()): ?><?= $page->seoTitle() ?><?php else: ?><?= $page->title() ?><?php endif ?> | <?= $site->title() ?></title>

	<!-- OG -->
	<meta property="og:title" content="<?php if($page->seoTitle()->isNotEmpty()): ?><?= $page->seoTitle() ?><?php else: ?><?= $page->title() ?><?php endif ?> | <?= $site->title() ?>">
	<meta name="og:description" content="<?= $description ?>">

	<meta property="og:type" content="website">
	<meta property="og:url" content="<?= $canonical ?>">
	<meta property="og:locale" content="de_DE">
	<meta property="og:site_name" content="<?= $site->title() ?>">

	<meta name="twitter:card" content="summary">
	<meta name="twitter:title" content="<?php if($page->seoTitle()->isNotEmpty()): ?><?= $page->seoTitle() ?><?php else: ?><?= $page->title() ?><?php endif ?> | <?= $site->title() ?>">
	<meta name="twitter:description" content="<?= $description ?>">
	
	<meta property="og:image" content="<?= $image->url() ?>">
	<meta property="og:image:url" content="<?= $image->url() ?>">
	<meta property="og:image:width" content="<?= $image->width() ?>">
	<meta property="og:image:height" content="<?= $image->height() ?>">
	<meta name="twitter:image" content="<?= $image->url() ?>">
	<link rel="image_src" href="<?= $image->url() ?>">
	
	<!-- Blog -->
	<?php if($page->Template() == 'article'): ?>
		<meta property="article:published_time" content="<?= $page->date()->toDate('%Y-%m-%d') ?>T<?= $page->date()->toDate('%T') ?>+00:00">
		<meta property="article:modified_time" content="<?= $page->date()->toDate('%Y-%m-%d') ?>T<?= $page->date()->toDate('%T') ?>+00:00">
	<?php endif ?>

	<!-- CANONICAL -->
	<link rel="canonical" href="<?= $canonical ?>" />
		
	<!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#dd0004">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="theme-color" content="#ffffff">

	<!-- SCHEMA.ORG -->
	<script type="application/ld+json">
    {
		"@context": "https://schema.org",
		"@type": "Organization",
		"name": "SCHOKOLADENSEITE.net",
		"url": "https://schokoladenseite.net/",
		"sameAs": [
			"https://www.facebook.com/schokoladenseite.net",
			"https://www.xing.com/companies/schokoladenseite.netvisuellekommunikationgmbh"
		]
    }
    </script>
	
	<script src="https://cdn-eu.readspeaker.com/script/39/webReader/webReader.js?pids=wr" type="text/javascript" id="rs_req_Init"></script>
	
	<!-- CSS -->
	<?php snippet('scss') ?>
	
</head>