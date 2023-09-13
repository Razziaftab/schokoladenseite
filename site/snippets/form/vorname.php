<div class="field">
	<input  type="text" 
			id="vorname" 
			name="vorname" 
			autocomplete="given-name"
			<?= $required == true ? 'required' : '' ?>
			value="<?= esc($formdata['vorname'] ?? '', 'attr') ?>" 
			placeholder="<?= t('prename') ?>"
			oninvalid="this.setCustomValidity('Bitte gebe Deinen Vornamen ein')" 
			oninput="this.setCustomValidity('')"
			<?= isset($alert['vorname']) ? 'aria-invalid="true"' : '' ?>
			>
	<label for="vorname">
	<?= t('prename') ?> <?= $required == true ? '<span>*</span>' : '' ?>
	</label>
	<?= isset($alert['vorname']) ? '<p class="alert error" role="alert">' . esc($alert['vorname']) . '</p>' : '' ?>
</div>