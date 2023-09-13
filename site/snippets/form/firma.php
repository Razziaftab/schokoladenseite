<div class="field">
	<input  type="text" 
			id="firma" 
			name="firma" 
			value="<?= esc($formdata['firma'] ?? '', 'attr') ?>" 
			<?= $required == true ? 'required' : '' ?>
			placeholder="Firma *"  
			autocomplete="organization"  
			oninvalid="this.setCustomValidity('Bitte geben Sie eine Firma ein')" 
			oninput="this.setCustomValidity('')"
			<?= isset($alert['firma']) ? 'aria-invalid="true"' : '' ?>
			>
	<label for="firma">
		Firma <?= $required == true ? '<span>*</span>' : '' ?>
	</label>
	<?= isset($alert['firma']) ? '<p class="alert error" role="alert">' . esc($alert['firma']) . '</p>' : '' ?>
</div>