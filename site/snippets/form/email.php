<div class="field">
	<input  type="email" 
			id="<?= isset($snippet) ? $snippet : '' ?>email" 
			name="<?= isset($snippet) ? $snippet : '' ?>email" 
			value="<?= esc($formdata['email'] ?? '', 'attr') ?>" 
			required 
			autocomplete="email"
			placeholder="<?= t('email') ?> *" 
			<?= isset($alert['email']) ? 'aria-invalid="true"' : '' ?>
			<?= isset($alert['modalemail']) ? 'aria-invalid="true"' : '' ?>
			>
	<label for="<?= isset($snippet) ? $snippet : '' ?>email">
	<?= t('email') ?> <span>*</span>
	</label>
	<?= isset($alert['email']) ? '<p class="alert error" role="alert">' . esc($alert['email']) . '</p>' : '' ?>
	<?= isset($alert['modalemail']) ? '<p class="alert error" role="alert">' . esc($alert['modalemail']) . '</p>' : '' ?>
</div>