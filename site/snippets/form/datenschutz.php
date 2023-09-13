<div class="field">
	<label class="checkbox">
		<input 
			type="checkbox" 
			name="<?= isset($snippet) ? $snippet : '' ?>datenschutz" 
			required="" 
			value="Datenschutz" 
			<?= isset($formdata['datenschutz']) ? ($formdata['datenschutz'] == 'Datenschutz' ? 'checked' : '') : '' ?> 
			oninvalid="this.setCustomValidity('Bitte akzeptieren Sie den Datenschutzhinweis')" 
			oninput="this.setCustomValidity('')" 
			<?= isset($alert['datenschutz']) ? 'aria-invalid="true"' : '' ?> <?= isset($alert['modaldatenschutz']) ? 'aria-invalid="true"' : '' ?>/>
		<p class="small">
			<span><?= t('privacy1') ?><a href="<?= $kirby->url() ?>/<?= t('privacy2') ?>" class="link-underline" target="_blank"><?= t('privacy3') ?></a> 
			<?= t('privacy4') ?> <a class="link-underline" title="<?= t('privacy5') ?>widerruf@schokoladenseite.net" href="mailto:widerruf@schokoladenseite.net">widerruf@schokoladenseite.net</a> 
			<?= t('privacy6') ?></span>
		</p>
	</label>
	<?= isset($alert['datenschutz']) ? '<p class="alert error" role="alert">' . esc($alert['datenschutz']) . '</p>' : '' ?>
	<?= isset($alert['modaldatenschutz']) ? '<p class="alert error" role="alert">' . esc($alert['modaldatenschutz']) . '</p>' : '' ?>
</div>