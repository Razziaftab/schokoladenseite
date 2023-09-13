<!DOCTYPE html>
<html lang="de" data-lt-installed="true">

	<!-- HEAD -->
	<?php snippet('head') ?>

	<!-- BODY -->
	<body class="projekt-seite">
	
		<a id="skip-content" href="#main">Zum Inhaltsbereich wechseln.</a>

		<!-- HEADER -->
		<?php snippet('header') ?>

		<!-- MAIN -->
		<main id="main">
			<?php snippet('layouts', ['field' => $page->layout()])  ?>
	
			
		</main>
		
		<!-- FOOTER -->
		<?php snippet('footer') ?>
		
		<!-- ASIDE -->
		<?php snippet('aside') ?>
		
		<!-- BACK-TO-TOP -->
		<?php snippet('back-to-top') ?>
		
		<!-- JS -->
		<?php snippet('js') ?>
		<script src="<?= $site->url() ?>/assets/js/projekte.js"></script>

	</body>
	
</html>