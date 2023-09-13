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
    <?php snippet('layouts', ['field' => $page->layout()])  ?>

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
        'firma'  => get('firma'),
        'name'  => get('name'),
        'email' => get('email'),
        'tel' => get('tel'),
        'website1' => get('website1'),
        'website2' => get('website2'),
        'website3' => get('website3'),
        'website4' => get('website4'),
        'text'  => get('text'),
        'datenschutz'  => get('datenschutz'),
		'captcha'  => get('captcha'),
    ];

    $rules = [
        'firma'  => ['required', 'minLength' => 3],
        'name'  => ['required', 'minLength' => 3],
        'email' => ['required', 'email'],
        'tel' => ['required'],
        'text'  => ['required', 'minLength' => 3, 'maxLength' => 3000],
        'datenschutz'  => ['required'],
		'captcha'  => ['required', 'in' => [['3']] ],
    ];

    $messages = [
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
                    'template' => 'dsgvo',
                    'from'     => 'mail@schokoladenseite.net',
                    'replyTo'  => $formdata['email'],
                    'to'       => 'mail@schokoladenseite.net',
                    'subject'  => 'DSGVO Check Anfrage',
                    'data'     => [
                        'text'   => esc($formdata['text']),
                        'sender' => esc($formdata['name']),
                        'tel' => esc($formdata['tel']),
                        'datenschutz' => esc($formdata['datenschutz']),
                        'firma' => esc($formdata['firma']),
                        'email' => esc($formdata['email']),
                        'website1' => esc($formdata['website1']),
                        'website2' => esc($formdata['website2']),
                        'website3' => esc($formdata['website3']),
                        'website4' => esc($formdata['website4']),
                    ]
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

    <div class="kontaktform row abstand-oben-weg" id="kontaktform">

      <?php if($success): ?>
      <?php header("Location: " . $kirby->url() . "/danke");
      exit; ?>
      <?php else: ?>
      <?php if (isset($alert['error'])): ?>
      <div><?= $alert['error'] ?>
      </div>
      <?php endif ?>
      <form method="post" action="<?= $page->url() ?>" novalidate>
        <input type="hidden" name="csrf" value="<?= csrf() ?>">
        <div class="honeypot" aria-hidden="true">
          <input type="url" id="website" name="website" tabindex="-1">
          <label for="website">Website <span title="required">*</span></label>
        </div>
        <div class="field">
          <small>Alle mit einem * markierten Felder sind Pflichtfelder.</small>
        </div>
        <?php snippet('/form/firma', array('required' => true, 'formdata' => $formdata, 'alert' => $alert)) ?>
        <?php snippet('/form/ansprechpartner', array('formdata' => $formdata, 'alert' => $alert)) ?>
        <div class="flex">
          <?php snippet('/form/email', array('formdata' => $formdata, 'alert' => $alert)) ?>
          <?php snippet('/form/tel', array('required' => true, 'formdata' => $formdata, 'alert' => $alert)) ?>
        </div>
        <div class="field">
          <input type="text" id="website1" name="website1" autocomplete="on"
            value="<?= esc($formdata['website1'] ?? '', 'attr') ?>"
            placeholder="Website 1">
          <label for="website1">
            Website 1
          </label>
        </div>
        <div class="field">
          <input type="text" id="website2" name="website2" autocomplete="on"
            value="<?= esc($formdata['website2'] ?? '', 'attr') ?>"
            placeholder="Website 2">
          <label for="website2">
            Website 2
          </label>
        </div>
        <div class="field">
          <input type="text" id="website3" name="website3" autocomplete="on"
            value="<?= esc($formdata['website3'] ?? '', 'attr') ?>"
            placeholder="Website 3">
          <label for="website3">
            Website 3
          </label>
        </div>
        <div class="field">
          <input type="text" id="website4" name="website4" autocomplete="on"
            value="<?= esc($formdata['website4'] ?? '', 'attr') ?>"
            placeholder="Website 4">
          <label for="website4">
            Website 4
          </label>
        </div>
        <?php snippet('/form/text', array('formdata' => $formdata, 'alert' => $alert)) ?>
        <?php snippet('/form/datenschutz', array('formdata' => $formdata, 'alert' => $alert)) ?>
        <?php snippet('/form/spam', array('formdata' => $formdata, 'alert' => $alert)) ?>
        <input type="submit" name="submit" value="Absenden" class="btn -primary" id="submit" data-category="DSGVO Check"
          data-url="/<?= $page->slug() ?>">
      </form>
      <?php endif ?>


    </div>


  </main>

  <!-- FOOTER -->
  <?php snippet('footer') ?>

  <!-- ASIDE -->
  <?php snippet('aside') ?>

  <!-- BACK-TO-TOP -->
  <?php snippet('back-to-top') ?>

  <!-- JS -->
  <?php snippet('js') ?>

</body>

</html>