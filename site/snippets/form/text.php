<div class="field">
	<textarea   id="<?= isset($snippet) ? $snippet : '' ?>text" 
				name="<?= isset($snippet) ? $snippet : '' ?>text" 
				required 
				placeholder="<?= t('text') ?> *"
				oninvalid="this.setCustomValidity('Bitte geben Sie eine Nachricht ein')" 
				oninput="this.setCustomValidity('')"
				<?= isset($alert['text']) ? 'aria-invalid="true"' : '' ?>
				<?= isset($alert['modaltext']) ? 'aria-invalid="true"' : '' ?>
	><?= esc($formdata['text'] ?? '') ?></textarea>
	<?= isset($alert['text']) ? '<p class="alert error" role="alert">' . esc($alert['text']) . '</p>' : '' ?>
	<?= isset($alert['modaltext']) ? '<p class="alert error" role="alert">' . esc($alert['modaltext']) . '</p>' : '' ?>
	<label for="<?= isset($snippet) ? $snippet : '' ?>text">
	<?= t('text') ?> <span>*</span>
	</label>
</div>