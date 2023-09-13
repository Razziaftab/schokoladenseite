<div class="field">
	<input  type="text" 
			id="plz" 
			name="plz" 
			autocomplete="postal-code" 
			value="<?= esc($formdata['plz'] ?? '', 'attr') ?>" 
			placeholder="<?= t('plz') ?>"
			>
	<label for="plz"><?= t('plz') ?></label>
</div>