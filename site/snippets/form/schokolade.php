<div class="field">
	<select id="schokolade" name="schokolade">
		<option value="Keine Auswahl getroffen">Lieblingsschokolade auswählen!</option>
		<option value="Egal, ich mag alles!" <?= isset($formdata['schokolade']) ? ($formdata['schokolade'] == 'Egal, ich mag alles!' ? 'selected' : '') : '' ?>>Egal, ich mag alles!</option>
		<option value="Zartbitterschokolade" <?= isset($formdata['schokolade']) ? ($formdata['schokolade'] == 'Zartbitterschokolade' ? 'selected' : '') : '' ?>>Zartbitterschokolade</option>
		<option value="Vollmilchschokolade" <?= isset($formdata['schokolade']) ? ($formdata['schokolade'] == 'Vollmilchschokolade' ? 'selected' : '') : '' ?>>Vollmilchschokolade</option>
		<option value="Erdbeer" <?= isset($formdata['schokolade']) ? ($formdata['schokolade'] == 'Erdbeer' ? 'selected' : '') : '' ?>>Erdbeer</option>
		<option value="Himbeer" <?= isset($formdata['schokolade']) ? ($formdata['schokolade'] == 'Himbeer' ? 'selected' : '') : '' ?>>Himbeer</option>
		<option value="Kaffee" <?= isset($formdata['schokolade']) ? ($formdata['schokolade'] == 'Kaffee' ? 'selected' : '') : '' ?>>Kaffee</option>
		<option value="Karamell" <?= isset($formdata['schokolade']) ? ($formdata['schokolade'] == 'Karamell' ? 'selected' : '') : '' ?>>Karamell</option>
		<option value="Nuss" <?= isset($formdata['schokolade']) ? ($formdata['schokolade'] == 'Nuss' ? 'selected' : '') : '' ?>>Nuss</option>
		<option value="Orange" <?= isset($formdata['schokolade']) ? ($formdata['schokolade'] == 'Orange' ? 'selected' : '') : '' ?>>Orange</option>
		<option value="Pur (ohne alles)" <?= isset($formdata['schokolade']) ? ($formdata['schokolade'] == 'Pur (ohne alles)' ? 'selected' : '') : '' ?>>Pur (ohne alles)</option>
		<option value="Pfefferminze" <?= isset($formdata['schokolade']) ? ($formdata['schokolade'] == 'Pfefferminze' ? 'selected' : '') : '' ?>>Pfefferminze</option>
		<option value="Weiße Schokolade" <?= isset($formdata['schokolade']) ? ($formdata['schokolade'] == 'Weiße Schokolade' ? 'selected' : '') : '' ?>>Weiße Schokolade</option>
	</select>
	<label for="schokolade">Lieblingsschokolade</label>
</div>
