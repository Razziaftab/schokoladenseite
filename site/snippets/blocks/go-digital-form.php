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
		'mitarbeiteranzahl'  => get('mitarbeiteranzahl'),
		'firmenumsatz'  => get('firmenumsatz'),
		'firma'  => get('firma'),
		'webseite'  => get('webseite'),
		'vorname'  => get('vorname'),
		'name'  => get('name'),
		'email' => get('email'),
		'tel' => get('tel'),
		'text'  => get('text'),
		'datenschutz'  => get('datenschutz'),
		'captcha'  => get('captcha'),
	];

	$rules = [
		'mitarbeiteranzahl'  => ['required', 'minLength' => 3],
		'firmenumsatz'  => ['required', 'minLength' => 3],
		'firma'  => ['required', 'minLength' => 3],
		'name'  => ['required', 'minLength' => 3],
		'email' => ['required', 'email'],
		'tel' => ['required'],
		'text'  => ['required', 'minLength' => 3, 'maxLength' => 3000],
		'datenschutz'  => ['required'],
		'captcha'  => ['required', 'in' => [['3']] ],
	];

	$messages = [
		'mitarbeiteranzahl'  => 'Bitte geben Sie eine Mitarbeiteranzahl an',
		'firmenumsatz'  => 'Bitte geben Sie einen Firmenumsatz an',
		'firma'  => 'Bitte geben Sie eine Firma an',
		'name'  => 'Bitte geben Sie Ihren Namen an',
		'email' => 'Bitte geben Sie eine gültige E-Mail Adresse ein',
		'tel' => 'Bitte geben Sie eine Telefonnummer ein',
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
					'subject'  => 'Kontaktanfrage ' . $page->title()->kti(),
					'data'     => [
						'text'   => esc($formdata['text']),
						'sender' => esc($formdata['name']),
						'vorname' => esc($formdata['vorname']),
						'tel' => esc($formdata['tel']),
						'datenschutz' => esc($formdata['datenschutz']),
						'firma' => esc($formdata['firma']),
						'webseite' => esc($formdata['webseite']),
						'email' => esc($formdata['email']),
						'mitarbeiteranzahl' => esc($formdata['mitarbeiteranzahl']),
						'firmenumsatz' => esc($formdata['firmenumsatz'])
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

<div class="kontaktform" id="kontaktform">
	<h2><?php if($block->header()->isNotEmpty()): ?><?= $block->header() ?><?php else: ?>Wie können wir Ihnen helfen?<?php endif ?></h2>
	<p><?php if($block->text()->isNotEmpty()): ?><?= $block->text() ?><?php else: ?>Sprechen Sie uns an - wir finden gemeinsam eine Lösung.<?php endif ?></p>

	<?php if($success): ?>
		<?php header("Location: " . $kirby->url() . "/danke"); exit; ?>
	<?php else: ?>
        <?php if (isset($alert['error'])): ?>
            <div><?= $alert['error'] ?></div>
        <?php endif ?>
        <form method="post" action="<?= $page->url() ?>#form" id="form" novalidate>
			<input type="hidden" name="csrf" value="<?= csrf() ?>">
            <div class="honeypot" aria-hidden="true">
                <label for="website">Website <span title="required">*</span></label>
                <input type="url" id="website" name="website" tabindex="-1">
            </div>
			<div class="field">
				<small>Alle mit einem * markierten Felder sind Pflichtfelder.</small>
			</div>
			<div class="flex">
				<?php snippet('/form/mitarbeiteranzahl', array('formdata' => $formdata, 'alert' => $alert)) ?>
				<?php snippet('/form/firmenumsatz', array('formdata' => $formdata, 'alert' => $alert)) ?>
			</div>
			<div class="flex">
            	<?php snippet('/form/firma', array('required' => true, 'formdata' => $formdata, 'alert' => $alert)) ?>
            	<?php snippet('/form/webseite', array('required' => false, 'formdata' => $formdata, 'alert' => $alert)) ?>
			</div>
			<div class="flex">
				<?php snippet('/form/vorname', array('required' => false, 'formdata' => $formdata, 'alert' => $alert)) ?>
				<?php snippet('/form/name', array('formdata' => $formdata, 'alert' => $alert)) ?>
			</div>
			<div class="flex">
				<?php snippet('/form/email', array('required' => true, 'formdata' => $formdata, 'alert' => $alert)) ?>
				<?php snippet('/form/tel', array('required' => true, 'formdata' => $formdata, 'alert' => $alert)) ?>
            </div>
            <?php snippet('/form/text', array('formdata' => $formdata, 'alert' => $alert)) ?>
            <?php snippet('/form/datenschutz', array('formdata' => $formdata, 'alert' => $alert)) ?>
			
			<?php snippet('/form/spam', array('formdata' => $formdata, 'alert' => $alert)) ?>
			
            <input type="submit" name="submit" value="Absenden" class="btn -primary" data-category="Go-Digital-Kontakt" data-url="/<?= $page->slug() ?>">
        </form>
	<?php endif ?>


</div>
