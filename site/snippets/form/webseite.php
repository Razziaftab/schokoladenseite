<div class="field">
	<input  type="text" 
			id="webseite" 
			name="webseite" 
			value="<?= esc($formdata['webseite'] ?? '', 'attr') ?>" 
			<?= $required == true ? 'required' : '' ?>
			placeholder="Webseite"  
			autocomplete="organization"  
			oninvalid="this.setCustomValidity('Bitte geben Sie eine Webseite ein')" 
			oninput="this.setCustomValidity('')"
			<?= isset($alert['webseite']) ? 'aria-invalid="true"' : '' ?>
			>
	<label for="webseite">
        Webseite <?= $required == true ? '<span>*</span>' : '' ?>
	</label>
	<?= isset($alert['webseite']) ? '<p class="alert error" role="alert">' . esc($alert['webseite']) . '</p>' : '' ?>
</div>