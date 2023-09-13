<div class="field">
	<input  type="text" 
			id="<?= isset($snippet) ? $snippet : '' ?>name" 
			name="<?= isset($snippet) ? $snippet : '' ?>name" 
			value="<?= esc($formdata['name'] ?? '', 'attr') ?>" 
			required 
			autocomplete="family-name"
			placeholder="<?= t('name') ?> *" 
			oninvalid="this.setCustomValidity('Bitte geben Sie Ihren Namen ein')" 
			oninput="this.setCustomValidity('')"
			<?= isset($alert['name']) ? 'aria-invalid="true"' : '' ?>
			<?= isset($alert['modalname']) ? 'aria-invalid="true"' : '' ?>
			>
	<label for="<?= isset($snippet) ? $snippet : '' ?>name">
	<?= t('name') ?> <span>*</span>
	</label>
	<?= isset($alert['name']) ? '<p class="alert error" role="alert">' . esc($alert['name']) . '</p>' : '' ?>
	<?= isset($alert['modalname']) ? '<p class="alert error" role="alert">' . esc($alert['modalname']) . '</p>' : '' ?>
</div>