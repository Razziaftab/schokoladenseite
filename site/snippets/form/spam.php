<div class="field">
	<input  type="text" 
			id="<?= isset($snippet) ? $snippet : '' ?>captcha" 
			name="<?= isset($snippet) ? $snippet : '' ?>captcha" 
			value="<?= esc($formdata['captcha'] ?? '', 'attr') ?>" 
			required 
			placeholder="Captcha *" 
			>
	<label for="<?= isset($snippet) ? $snippet : '' ?>captcha">
	<?= t('spam') ?> <span>*</span>
	</label>
	<?= isset($alert['captcha']) ? '<p class="alert error" role="alert">' . esc($alert['captcha']) . '</p>' : '' ?>
	<?= isset($alert['modalcaptcha']) ? '<p class="alert error" role="alert">' . esc($alert['modalcaptcha']) . '</p>' : '' ?>
</div>
