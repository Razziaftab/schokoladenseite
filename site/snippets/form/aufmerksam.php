<div class="field">
	<select id="aufmerksam" name="aufmerksam">
		<option value="Keine Auswahl getroffen">Bitte auswählen</option>
		<option value="Google / Suchmaschine" <?= isset($formdata['aufmerksam']) ? ($formdata['aufmerksam'] == 'Google / Suchmaschine' ? 'selected' : '') : '' ?>>Google / Suchmaschine</option>
		<option value="Empfehlung" <?= isset($formdata['aufmerksam']) ? ($formdata['aufmerksam'] == 'Empfehlung' ? 'selected' : '') : '' ?>>Empfehlung</option>
		<option value="Online-Kataloge" <?= isset($formdata['aufmerksam']) ? ($formdata['aufmerksam'] == 'Online-Kataloge' ? 'selected' : '') : '' ?>>Online-Kataloge</option>
		<option value="Referenz-Website" <?= isset($formdata['aufmerksam']) ? ($formdata['aufmerksam'] == 'Referenz-Website' ? 'selected' : '') : '' ?>>Referenz-Website</option>
		<option value="Sonstiges" <?= isset($formdata['aufmerksam']) ? ($formdata['aufmerksam'] == 'Sonstiges' ? 'selected' : '') : '' ?>>Sonstiges</option>
	</select>
	<label for="aufmerksam">Wie sind Sie auf uns aufmerksam geworden?</label>
</div>