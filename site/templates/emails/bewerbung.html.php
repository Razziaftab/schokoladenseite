<p>Von: <?= $email ?></p>
<p>--</p>
<p><?= $subject ?>
<p>--</p>
<p><strong>Kontaktinformationen</strong></p>
<p>--</p>
<p>Vorname: <?= $vorname ?></p>
<p>Nachname: <?= $sender ?></p>
<p>Straße, Nr: <?= $strasse ?></p>
<p>PLZ: <?= $plz ?></p>
<p>Ort: <?= $ort ?></p>
<p>Telefon: <?= $tel ?></p>
<p>E-Mail: <?= $email ?></p>
<p>Nachricht: <?= $text ?></p>
<p>--</p>
<p><strong>Dateianhänge</strong></p>
<p>--</p>
<p><?php foreach ($attachments as $attachment): ?><?= $attachment ?><?php endforeach ?></p>