<?php require('toolkit/bootstrap.php') ?>
<?php require('inc/helpers.php') ?>

<?php

$newid = null;
if(isset($_POST['uid']) && isset($_POST['score'])) {
    $newid = addScore($_POST['uid'], intval($_POST['score']));
}
$score = getScore();

header('Content-Type: application/json');
echo json_encode([
    'state' => ($newid!=null?'success':'error'),
    'newid' => ($newid!=null?$newid:null),
    'moneyGame' => ($newid!=null?score2Money(intval($_POST['score'])):'0,00€') ,
    'moneyCollected' => score2Money($score),
    'collectedToMuch' => $score>getTarget()?'too-much':'open-target',
    'percentCollected' => collectedToPercent(getTarget(), $score)]);
