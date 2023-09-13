<div class="field">
	<input  type="tel" 
			id="<?= isset($snippet) ? $snippet : '' ?>tel" 
			name="<?= isset($snippet) ? $snippet : '' ?>tel" 
			value="<?= esc($formdata['tel'] ?? '', 'attr') ?>" 
			autocomplete="tel-area-code" 
			pattern="^[0-9-+\s()]*$" 
			<?= $required == true ? 'required' : '' ?>
			autocomplete="on"
			placeholder="<?= t('phone') ?> *" 
			<?= isset($alert['tel']) ? 'aria-invalid="true"' : '' ?>
			<?= isset($alert['modaltel']) ? 'aria-invalid="true"' : '' ?>
			>
	<label for="<?= isset($snippet) ? $snippet : '' ?>tel">
	<?= t('phone') ?> <?= $required == true ? '<span>*</span>' : '' ?>
	</label>
	<?= isset($alert['tel']) ? '<p class="alert error" role="alert">' . esc($alert['tel']) . '</p>' : '' ?>
	<?= isset($alert['modaltel']) ? '<p class="alert error" role="alert">' . esc($alert['modaltel']) . '</p>' : '' ?>
</div>