
<!--

<script src="<?= $kirby->url() ?>/assets/js/compressed.js"></script>

-->

<script src="<?= $kirby->url() ?>/assets/js/jquery.min.js"></script>
<script src="<?= $kirby->url() ?>/assets/js/mobile.js"></script>
<script src="<?= $kirby->url() ?>/assets/js/main.js"></script>
<script src="<?= $kirby->url() ?>/assets/js/cookiebar.js"></script>


<?php if($page->id() == 'coworking-space'): ?>
	<script src="<?= $kirby->url() ?>/assets/js/simple-lightbox.jquery.js"></script>

	<script type="text/javascript">
		var lightbox = $('.gallery a').simpleLightbox({ /* options */ });
	</script>
<?php endif ?>
