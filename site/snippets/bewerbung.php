<?php
$alert = null;
$success = false;
$formdata = [];
$attachments = [];
$token = get('csrf');

if($kirby->request()->is('POST') && get('submit')) {
    // check the honeypot
    if(empty(get('website')) === false) {
        go($page->url());
        exit;
    }

    $formdata = [
        'vorname' => get('vorname'),
        'name' => get('name'),
        'strasse' => get('strasse'),
        'plz' => get('plz'),
        'ort' => get('ort'),
        'email' => get('email'),
        'tel' => get('tel'),
        'text'  => get('text'),
        'datenschutz'  => get('datenschutz'),
		'captcha'  => get('captcha'),
    ];

    $rules = [
        'vorname'  => ['required', 'minLength' => 3],
        'name'  => ['required', 'minLength' => 3],
        'email' => ['required', 'email'],
        'tel' => ['required'],
        'text' => ['required'],
        'datenschutz'  => ['required'],
		'captcha'  => ['required', 'in' => [['3']] ],
    ];

    $messages = [
        'vorname' => t('application-form-error-prename'),
        'name'  => t('application-form-error-name'),
        'email' => t('application-form-error-email'),
        'tel' => t('application-form-error-phone'),
        'text' => t('application-form-error-text'),
        'datenschutz'  => t('application-form-error-privacy'),
		'captcha'  => t('application-form-error-spam')
    ];
 
    
    $lebenslaufGet = $kirby->request()->files()->get('lebenslauf');
	$lebenslauf = [];
	
    $uploads = $kirby->request()->files()->get('files');
	
	$lebenslaufalerts[] = '';

	if($lebenslaufGet[0]['size'] == 0){
		$lebenslaufalerts[] = t('application-form-error-file');
	} else {		
		foreach ($lebenslaufGet as $upload) {
			if ($upload['error'] !== 0) {
				$lebenslaufalerts[] = t('application-form-error-upload');
			} elseif ($upload['size'] > 8000000) {
				$lebenslaufalerts[] = $upload['name'] . t('application-form-error-uploadsize');
			} elseif ($upload['type'] !== 'application/pdf' &&
					  $upload['type'] !== 'application/docx' &&
					  $upload['type'] !== 'application/odt' &&
					  $upload['type'] !== 'image/jpg' &&
					  $upload['type'] !== 'image/jpeg' &&
					  $upload['type'] !== 'image/png' &&
					  $upload['type'] !== 'image/gif') {
				$lebenslaufalerts[] = $upload['name'] . t('application-form-error-uploadformat');
			} else {
				$name     = $upload['tmp_name'];
				$tmpName  = pathinfo($name);
				$filename = $tmpName['dirname']. '/'. F::safeName($upload['name']);
				if (rename($upload['tmp_name'], $filename)) {
					$name = $filename;
				}
				$attachments[] = $name;
				$lebenslauf = $kirby->request()->files()->get('lebenslauf');
			}
		}
    }

	if($uploads[0]['size'] != '0'){
		foreach ($uploads as $upload) {
			if ($upload['error'] !== 0) {
				$uploadsalerts[] = t('application-form-error-file');
			} elseif ($upload['size'] > 8000000) {
				$uploadsalerts[] = $upload['name'] . t('application-form-error-uploadsize');
			} elseif ($upload['type'] !== 'application/pdf' &&
						$upload['type'] !== 'application/docx' &&
						$upload['type'] !== 'application/odt' &&
						$upload['type'] !== 'image/jpg' &&
						$upload['type'] !== 'image/jpeg' &&
						$upload['type'] !== 'image/png' &&
						$upload['type'] !== 'image/gif') {
				$uploadsalerts[] = $upload['name'] . t('application-form-error-uploadformat');
			} else {
				$name     = $upload['tmp_name'];
				$tmpName  = pathinfo($name);
				$filename = $tmpName['dirname']. '/'. F::safeName($upload['name']);
				if (rename($upload['tmp_name'], $filename)) {
					$name = $filename;
				}
				$attachments[] = $name;
			}
		}
    }


    // some of the data is invalid
    if($invalid = invalid($formdata, $rules, $messages)) {
        $alert = $invalid;
	}
    elseif(isset($lebenslaufalerts[1])) {
        

    // the data is fine, let's send the email
    } else {
        if(csrf($token) == true) {
            try {
                $kirby->email([
                    'template' => 'bewerbung',
                    'from'     => 'bewerbung@schokoladenseite.net',
                    'replyTo'  => $formdata['email'],
                    'to'       => 'bewerbung@schokoladenseite.net',
                    'subject'  => 'Bewerbung SCHOKOLADENSEITE.net [' . $page->title()->kti() . ']',
                    'data'     => [
                        'text'   => esc($formdata['text']),
                        'sender' => esc($formdata['name']),
                        'vorname' => esc($formdata['vorname']),
                        'strasse' => esc($formdata['strasse']),
                        'plz' => esc($formdata['plz']),
                        'ort' => esc($formdata['ort']),
                        'tel' => esc($formdata['tel']),
                        'datenschutz' => esc($formdata['datenschutz']),
                        'email' => esc($formdata['email']),
                        'subject'  => 'Bewerbung SCHOKOLADENSEITE.net [' . $page->title()->kti() . ']',
                        'attachments' => $attachments
                    ],
                    'attachments' => $attachments
                ]);

                $kirby->email([
                    'template' => 'bewerbungantwort',
                    'from'     => 'bewerbung@schokoladenseite.net',
                    'replyTo'  => 'bewerbung@schokoladenseite.net',
                    'to'       => $formdata['email'],
                    'subject'  => t('application') . ' SCHOKOLADENSEITE.net [' . $page->title()->kti() . ']',
                ]);
            } catch (Exception $error) {
                if(option('debug')):
                    $alert['error'] = 'Das Formular konnte nicht gesendet werden: <strong>' . $error->getMessage() . '</strong>';
                else:
                    $alert['error'] = 'Das Formular konnte nicht gesendet werden!';
                endif;
            }
        } else {
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
	<h2><?= t('application-form') ?></h2>
	<?php if($success): ?>
		<?php header("Location: " . $kirby->url() . "/danke");
		exit; ?>
	<?php else: ?>
		<?php if (isset($alert['error'])): ?>
			<div><?= $alert['error'] ?></div>
		<?php endif ?>

		<form method="post" action="<?= $page->url() ?>#form" id="form" enctype="multipart/form-data" novalidate>
			<input type="hidden" name="csrf" value="<?= csrf() ?>">
			<div class="honeypot" aria-hidden="true">
				<label for="website">Website <span title="required">*</span></label>
				<input type="url" id="website" name="website" tabindex="-1">
			</div>
			<div class="field">
				<small><?= t('star-text') ?></small>
			</div>
    
			<div class="flex">
				<?php snippet('/form/vorname', array('required' => true, 'formdata' => $formdata, 'alert' => $alert)) ?>
				<?php snippet('/form/name', array('formdata' => $formdata, 'alert' => $alert)) ?>
			</div>
    
			<div class="flex adresse">
				<?php snippet('/form/adresse', array('formdata' => $formdata, 'alert' => $alert)) ?>
				<?php snippet('/form/plz', array('formdata' => $formdata, 'alert' => $alert)) ?>
				<?php snippet('/form/ort', array('formdata' => $formdata, 'alert' => $alert)) ?>
			</div>
			
			<div class="flex">
				<?php snippet('/form/email', array('formdata' => $formdata, 'alert' => $alert)) ?>
				<?php snippet('/form/tel', array('required' => true, 'formdata' => $formdata, 'alert' => $alert)) ?>
			</div>
			
			<?php snippet('/form/text', array('required' => true, 'formdata' => $formdata, 'alert' => $alert)) ?>
			
			<div class="fileupload" <?php if (isset($lebenslaufalerts) || isset($uploadsalerts)): ?> id="alert"<?php endif ?>>
				<h3><?= t('file-upload') ?></h3>
				<p><?= t('file-format') ?><strong><?= t('file-format-size') ?></strong></p>
				<div class="flex">
					<div class="field space-between">
						<p><label class="checkbox" for="lebenslauf"><strong><?= t('resume') ?></strong> <span title="required">*</span></label></p>
						<input name="lebenslauf[]" id="lebenslauf" type="file" required>
						
						
						<?php if (isset($lebenslauf)): ?>
							<?php foreach ($lebenslauf as $file): ?>
								<small><?= $file['name'] ?></small>
							<?php endforeach ?>
						<?php endif ?>
						<?php if (isset($lebenslaufalerts)): ?>
							<span class="alert error">
								<?php foreach ($lebenslaufalerts as $lebenslaufalert): ?>
									<?= $lebenslaufalert ?>
								<?php endforeach ?>
							</span>
						<?php endif ?>
						
					
						
					</div>
					<div class="field">
						<p><label class="checkbox" for="files"><strong><?= t('other-documents') ?></strong> <small><?= t('other-documents-bracket') ?></small></label></p>
						<input name="files[]" id="files" type="file" multiple>
						<?php if (isset($uploads)): ?>
							<?php foreach ($uploads as $file): ?>
								<small><?= $file['name'] ?></small>
							<?php endforeach ?>
						<?php endif ?>
						<?php if (isset($uploadsalerts)): ?>
							<span class="alert error">
								<?php foreach ($uploadsalerts as $uploadsalert): ?>
									<?= $uploadsalert ?>
								<?php endforeach ?>
							</span>
						<?php endif ?>
					</div>
				</div>
			</div>
	
			<?php snippet('/form/datenschutz', array('formdata' => $formdata, 'alert' => $alert)) ?>
			<?php snippet('/form/spam', array('formdata' => $formdata, 'alert' => $alert)) ?>
			
			<input type="submit" name="submit" value="<?= t('application-send') ?>" class="btn -primary" data-category="Bewerbung" data-url="/<?= $page->slug() ?>">
		</form>
	<?php endif ?>


</div>