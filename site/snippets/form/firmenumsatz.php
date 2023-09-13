<div class="field">					
	<select id="firmenumsatz" name="firmenumsatz" value="<?= esc($formdata['firmenumsatz'] ?? '', 'attr') ?>" required oninvalid="this.setCustomValidity('Bitte geben Sie Ihren Firmenumsatz ein')" oninput="this.setCustomValidity('')" <?= isset($alert['firmenumsatz']) ? 'aria-invalid="true"' : '' ?>>
		<option value="">Firmenumsatz *</option>
		<option value="weniger als 20 Mio. €" <?= isset($formdata['firmenumsatz']) ? ($formdata['firmenumsatz'] == 'weniger als 20 Mio. €' ? 'selected' : '') : '' ?>>weniger als 20 Mio. €</option>
		<option value="20 Mio. € oder mehr"<?= isset($formdata['firmenumsatz']) ? ($formdata['firmenumsatz'] == '20 Mio. € oder mehr' ? 'selected' : '') : '' ?>>20 Mio. € oder mehr</option>
	</select>
	<label for="firmenumsatz">
		Firmenumsatz <span>*</span>
	</label>
	<?= isset($alert['firmenumsatz']) ? '<p class="alert error" role="alert">' . esc($alert['firmenumsatz']) . '</p>' : '' ?>
</div>