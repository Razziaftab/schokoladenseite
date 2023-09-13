<div class="field">
	<select id="mitarbeiteranzahl" name="mitarbeiteranzahl" value="<?= esc($formdata['mitarbeiteranzahl'] ?? '', 'attr') ?>" required oninvalid="this.setCustomValidity('Bitte geben Sie Ihre Mitarbeiteranzahl ein')" oninput="this.setCustomValidity('')"	<?= isset($alert['mitarbeiteranzahl']) ? 'aria-invalid="true"' : '' ?>>
		<option value="">Mitarbeiteranzahl *</option>
		<option value="weniger als 100 Mitarbeiter"<?= isset($formdata['mitarbeiteranzahl']) ? ($formdata['mitarbeiteranzahl'] == 'weniger als 100 Mitarbeiter' ? 'selected' : '') : '' ?>>weniger als 100 Mitarbeiter</option>
		<option value="100 oder mehr Mitarbeiter"<?= isset($formdata['mitarbeiteranzahl']) ? ($formdata['mitarbeiteranzahl'] == '100 oder mehr Mitarbeiter' ? 'selected' : '') : '' ?>>100 oder mehr Mitarbeiter</option>
	</select>
	<label for="mitarbeiteranzahl">
		Mitarbeiteranzahl <span>*</span>
	</label>
	<?= isset($alert['mitarbeiteranzahl']) ? '<p class="alert error" role="alert">' . esc($alert['mitarbeiteranzahl']) . '</p>' : '' ?>
</div>