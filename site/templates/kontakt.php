<!DOCTYPE html>
<html lang="de" data-lt-installed="true">

	<!-- HEAD -->
	<?php snippet('head') ?>

	<!-- BODY -->
	<body>
	
		<a id="skip-content" href="#main">Zum Inhaltsbereich wechseln.</a>

		<!-- HEADER -->
		<?php snippet('header') ?>

		<!-- MAIN -->
		<main id="main">
			<div class="hero-maps">
				<a title="Google Maps" href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2369.530778871378!2d9.977661315982894!3d53.56614316592574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47b18f1e40cce5c9%3A0xf2c14118710e3b2b!2sRentzelstra%C3%9Fe%2016%2C%2020146%20Hamburg!5e0!3m2!1sde!2sde!4v1582196128336!5m2!1sde!2sde"></a>
			</div>

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
						'schokolade'  => get('schokolade'),
						'firma'  => get('firma'),
						'vorname'  => get('vorname'),
						'name'  => get('name'),
						'email' => get('email'),
						'tel' => get('tel'),
						'text'  => get('text'),
						'datenschutz'  => get('datenschutz'),
						'interesse'  => get('interesse'),
						'aufmerksam'  => get('aufmerksam'),
						'captcha'  => get('captcha'),
					];

					$rules = [
						'firma'  => ['required', 'minLength' => 3],
						'name'  => ['required', 'minLength' => 3],
						'email' => ['required', 'email'],
						'tel' => ['required' ],
						'text'  => ['required', 'minLength' => 3, 'maxLength' => 3000],
						'datenschutz'  => ['required'],
						'captcha'  => ['required', 'in' => [['3']] ],
					];

					$messages = [
						'firma'  => 'Bitte geben Sie eine Firma an',
						'name'  => 'Bitte geben Sie Ihren Namen an',
						'email' => 'Bitte geben Sie eine gültige E-Mail Adresse ein',
						'tel' => 'Bitte geben Sie eine gültige Telefonnummer ein',
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
									'template' => 'kontakt',
									'from'     => 'mail@schokoladenseite.net',
									'replyTo'  => $formdata['email'],
									'to'       => 'mail@schokoladenseite.net',
									'subject'  => 'Allgemeine Kontaktanfrage',
									'data'     => [
										'text'   => esc($formdata['text']),
										'sender' => esc($formdata['name']),
										'vorname' => esc($formdata['vorname']),
										'tel' => esc($formdata['tel']),
										'datenschutz' => esc($formdata['datenschutz']),
										'firma' => esc($formdata['firma']),
										'email' => esc($formdata['email']),
										'schokolade' => esc($formdata['schokolade']),
										'aufmerksam' => esc($formdata['aufmerksam']),
										'interesse' => $formdata['interesse'],
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


				<div class="kontaktform row neu" id="kontaktform">
					<h1>Kontakt</h1>
					<p><strong>Ja, ich möchte SCHOKOLADENSEITE.net kennenlernen.</strong></p>
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
							<?php snippet('/form/schokolade', array('formdata' => $formdata, 'alert' => $alert)) ?>
							<?php snippet('/form/interesse', array('formdata' => $formdata, 'alert' => $alert)) ?>
							<?php snippet('/form/firma', array('required' => true, 'formdata' => $formdata, 'alert' => $alert)) ?>
							<div class="flex">
								<?php snippet('/form/vorname', array('required' => false, 'formdata' => $formdata, 'alert' => $alert)) ?>
								<?php snippet('/form/name', array('formdata' => $formdata, 'alert' => $alert)) ?>
							</div>
							<div class="flex">
								<?php snippet('/form/email', array('formdata' => $formdata, 'alert' => $alert)) ?>
								<?php snippet('/form/tel', array('required' => true, 'formdata' => $formdata, 'alert' => $alert)) ?>
							</div>
							<?php snippet('/form/text', array('formdata' => $formdata, 'alert' => $alert)) ?>
							<?php snippet('/form/aufmerksam', array('formdata' => $formdata, 'alert' => $alert)) ?>
							<?php snippet('/form/datenschutz', array('formdata' => $formdata, 'alert' => $alert)) ?>
							
							
							<?php snippet('/form/spam', array('formdata' => $formdata, 'alert' => $alert)) ?>
							
							<!--
							<div class="spam-indicator">
								<div class="progress"></div>
								<p>Das Formular kann erst nach 10 Sekunden abgeschickt werden.</p>
							</div>
							-->
							
							<input type="submit" name="submit" value="Absenden" class="btn -primary" id="submit" data-category="Kontaktseite" data-url="/<?= $page->slug() ?>">
						</form>
					<?php endif ?>
				</div>

				<div class="bg-lightgrey">
					<div class="row flex" id="hero">
						<div class="column-3">
							<img src="<?= $kirby->url() ?>/assets/img/super-hero.svg" alt="SCHOKO-Monster im Superheldenkostüm"/>
						</div>
						<div class="column-9">
							<h2>Rufen Sie uns an: <a href="tel:+494023686130">+49 40 23 68 61 30</h2>
							<p>Wir helfen Ihnen gerne.</p>
							<a href="tel:+494023686130" class="btn -primary">Jetzt anrufen <i class="fas fa-mobile-alt"></i></a>
						</div>
					</div>
				</div>

		</main>

		<!-- FOOTER -->
		<?php snippet('footer') ?>

		<!-- BACK-TO-TOP -->
		<?php snippet('back-to-top') ?>

		<!-- JS -->
		<?php snippet('js') ?>
		
	</body>

</html>
