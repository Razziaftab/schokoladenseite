<div class="flex">
	<div class="field">
		<input  type="text" 
				id="captcha" 
				name="captcha" 
				value="<?= esc($formdata['captcha'] ?? '', 'attr') ?>" 
				required 
				placeholder="Captcha *" 
				>
		<label for="captcha">
			Captcha <span>*</span>
		</label>
		<?= isset($alert['captcha']) ? '<span class="alert error">' . esc($alert['captcha']) . '</span>' : '' ?>
	</div>
	<div class="field captcha">
		<img src="<?= $kirby->url() ?>/assets/img/captcha/captcha1.png" />
		<p class="relaod" tabindex="0" aria-label="Neues Bild anzeigen">Neues Bild anzeigen</p>
	</div>
</div>