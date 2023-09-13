<div class="field boxes">
	<span>Interesse:</span>
	<span>
		<input type="checkbox" id="web" name="interesse[]" value="Web"<?= isset($formdata['interesse']) ? (in_array('Web', $formdata['interesse']) ? 'checked' : '') : '' ?>>
		<label for="web" class="checkbox">Web</label>
	</span>
	<span>
		<input type="checkbox" id="go-gigital" name="interesse[]" value="Go-Digital-Förderung"<?= isset($formdata['interesse']) ? (in_array('Go-Digital-Förderung', $formdata['interesse']) ? 'checked' : '') : '' ?>>
		<label for="go-gigital" class="checkbox">Go-Digital-Förderung</label>
	</span>
	<span>
		<input type="checkbox" id="technik" name="interesse[]" value="Technische Betreuung"<?= isset($formdata['interesse']) ? (in_array('Technische Betreuung', $formdata['interesse']) ? 'checked' : '') : '' ?>>
		<label for="technik" class="checkbox">Technische Betreuung</label>
	</span>
	<span>
		<input type="checkbox" id="sonstiges" name="interesse[]" value="Sonstiges"<?= isset($formdata['interesse']) ? (in_array('Sonstiges', $formdata['interesse']) ? 'checked' : '') : '' ?>>
		<label for="sonstiges" class="checkbox">Sonstiges</label>
	</span>
</div>