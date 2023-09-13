<?php require('toolkit/bootstrap.php') ?>
<?php require('inc/helpers.php') ?>

<?php

$result = 'invalid_name';
if(isset($_POST['uid']) && isset($_POST['name']) && isset($_POST['score'])) {
    $result = addHighscore($_POST['uid'], $_POST['name'], intval($_POST['score']));
}
$highscore  = loadSortedHighscore();

header('Content-Type: application/json');
echo json_encode([
    'state' => $result, 'highscore' => $highscore]);
