<div class="field">
	<input  type="text" 
			id="ort" 
			name="ort" 
			autocomplete="address-level2" 
			value="<?= esc($formdata['ort'] ?? '', 'attr') ?>" 
			placeholder="<?= t('location') ?>"
			>
	<label for="ort"><?= t('location') ?></label>
</div>