<dialog title="zu den Kontaktdaten" tabindex="0" aria-haspopup="dialog" aria-label="zu den Kontaktdaten">
	<span>Kontakt</span>
	<svg xmlns="http://www.w3.org/2000/svg" width="19" height="17.538" viewBox="0 0 19 17.538">
		<path id="Pfad_4" data-name="Pfad 4" d="M9.5,1C4.173,1,0,4.39,0,8.719c0,4.354,4.262,7.9,9.5,7.9a11.448,11.448,0,0,0,2.441-.271l5.344,2.193-.345-4.9A7.024,7.024,0,0,0,19,8.719C19,4.39,14.827,1,9.5,1Z" fill="#fff"/>
	</svg>
</dialog>

<?php
$alert = null;
$success = false;
$formdata = [];
$token = get('csrf');

if($kirby->request()->is('POST') && get('submit')) {

	// check the honeypot
	if(empty(get('website')) === false) {
		go($page->url());
		exit;
	}

	$formdata = [
		'name'  => get('modalname'),
		'email' => get('modalemail'),
		'tel' => get('modaltel'),
		'text'  => get('modaltext'),
		'datenschutz'  => get('modaldatenschutz'),
		'captcha'  => get('modalcaptcha'),
	];

	$rules = [
		'name'  => ['required', 'minLength' => 3],
		'email' => ['required', 'email'],
		'text'  => ['required', 'minLength' => 3, 'maxLength' => 3000],
		'datenschutz'  => ['required'],
		'captcha'  => ['required', 'in' => [['3']] ],
	];

	$messages = [
		'name'  => 'Bitte geben Sie Ihren Namen an',
		'email' => 'Bitte geben Sie eine gültige E-Mail Adresse ein',
		'text'  => 'Bitte geben Sie eine Nachricht ein',
		'datenschutz'  => 'Bitte akzeptieren Sie den Datenschutzhinweis',
		'captcha'  => 'Bitte beantworten Sie die Frage korrekt'
	];

	// some of the data is invalid
	if($invalid = invalid($formdata, $rules, $messages)) {
		$alert = $invalid;

	// the data is fine, let's send the email
	} else {

		if(csrf($token) == true) {
			
			try {
				$kirby->email([
					'template' => 'email',
					'from'     => 'mail@schokoladenseite.net',
					'replyTo'  => $formdata['email'],
					'to'       => 'mail@schokoladenseite.net',
					'subject'  => 'Kontaktanfrage LP // ' . $page->title()->kti(),
					'data'     => [
						'text'   => esc($formdata['text']),
						'sender' => esc($formdata['name']),
						'tel' => esc($formdata['tel']),
						'datenschutz' => esc($formdata['datenschutz']),
						'email' => esc($formdata['email'])
					]
				]);

			} catch (Exception $error) {
				if(option('debug')):
					$alert['error'] = 'Das Formular konnte nicht gesendet werden: <strong>' . $error->getMessage() . '</strong>';
				else:
					$alert['error'] = 'Das Formular konnte nicht gesendet werden!';
				endif;
			}
		}
		else {
			$alert['error'] = 'Das Formular konnte nicht gesendet werden: <strong>' . $error->getMessage() . '</strong>';	
		}

		// no exception occurred, let's send a success message
		if (empty($alert) === true) {
			$success = true;
		}
	}
}

?>

<div class="contactmodalbackground"></div>
<div class="contactmodal">
	<svg class="closemodal" tabindex="0" role="button" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"><path fill="#000000" d="M18.3 5.71c-.39-.39-1.02-.39-1.41 0L12 10.59 7.11 5.7c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41L10.59 12 5.7 16.89c-.39.39-.39 1.02 0 1.41.39.39 1.02.39 1.41 0L12 13.41l4.89 4.89c.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41L13.41 12l4.89-4.89c.38-.38.38-1.02 0-1.4z"/></svg>
	<div class="flex">
		<div class="column-3">
			<i class="fas fa-comments fa-6x gradient-icon"></i>
		</div>
		<div class="column-9">
			<p>Wie können wir Ihnen helfen?</p>
			<p>Sprechen Sie uns an - wir finden gemeinsam eine Lösung.</p>
		</div>
	</div>
	<div class="flex">
		<div class="column-3">
			<img src="<?= $kirby->url() ?>/assets/img/andrea_christan-2022.jpg" alt="Andrea Christan - SCHOKOLADENSEITE.net" title="Andrea Christan">
			<p>
				<strong>Ansprechpartnerin</strong>
			</p>
			<p class="append-mail-aside">
				Andrea Christan<br>
				<a href="tel:+494023686130">Tel.: +49 40 23 68 61 30</a><br>
			</p>
		</div>
		<div class="column-9">
			<?php if($success): ?>
				<?php header("Location: " . $kirby->url() . "/danke"); exit; ?>
			<?php else: ?>
				<?php if (isset($alert['error'])): ?>
					<div><?= $alert['error'] ?></div>
				<?php endif ?>
				<form method="post" action="<?= $page->url() ?>#modalform" id="modalform" novalidate>
					<input type="hidden" name="csrf" value="<?= csrf() ?>">
					<div class="honeypot" aria-hidden="true">
						<label for="modalform-website">Website <span title="required">*</span></label>
						<input type="url" id="modalform-website" name="website" tabindex="-1">
					</div>
					<div class="field">
						<small>Alle mit einem * markierten Felder sind Pflichtfelder.</small>
					</div>
					<?php snippet('/form/name', array('formdata' => $formdata, 'alert' => $alert, 'snippet' => 'modal')) ?>
					<?php snippet('/form/email', array('formdata' => $formdata, 'alert' => $alert, 'snippet' => 'modal')) ?>
					<?php snippet('/form/tel', array('required' => false, 'formdata' => $formdata, 'alert' => $alert, 'snippet' => 'modal')) ?>
					<?php snippet('/form/text', array('formdata' => $formdata, 'alert' => $alert, 'snippet' => 'modal')) ?>
					<?php snippet('/form/datenschutz', array('formdata' => $formdata, 'alert' => $alert, 'snippet' => 'modal')) ?>
					<?php snippet('/form/spam', array('formdata' => $formdata, 'alert' => $alert, 'snippet' => 'modal')) ?>
					<input type="submit" id="submit" name="submit" value="Absenden" class="btn -primary" data-category="Seitenkontakt" data-url="/<?= $page->slug() ?>">
				</form>
			<?php endif ?>
		</div>
	</div>
</div>