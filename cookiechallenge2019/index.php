<?php require('toolkit/bootstrap.php') ?>
<?php require('inc/helpers.php') ?>

<?php

//meta data
$currentpage = "https://schokoladenseite.net/schoko-spiel18";
$title = "Spieler gesucht! Helfe jetzt durch Dein Spiel.";
$description = "Je gefangenem Cookie gehen 10 Cent an Hinz&Kunzt - DAS HAMBURGER STRASSENMAGAZIN. Spiele jetzt für einen guten Zweck und verbreite die Aktion!";
$image = "https://schokoladenseite.net/schoko-spiel18/img/schokomonster.png";
$twittersite = "@schokoladenseite.net";
$twittercreator = "@schokoladenseite.net";
$company = "SCHOKOLADENSEITE.net";

//gamge date
$uid = getGamerId();
$colleted = getScore();
$highscore = loadSortedHighscore();
$scoreTarget = getTarget(); //1score = 10cent => 1000€
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <script src="js/modernizr.js"></script>

        <title><?php echo $title; ?></title>

        <!-- Open Graph for Job Detail Pages -->
        <meta property="og:title" content="<?php echo $title; ?>">
        <meta property="og:description" content="<?php echo $description; ?>">
        <meta property="og:type" content="Website">
        <meta property="og:url" content="<?php echo $currentpage; ?>">
        <meta property="og:site_name" content="<?php echo $company; ?>">
        <meta property="og:image" content="<?php echo $image; ?>">
        <meta property="og:image:height" content="600">
        <meta property="og:image:width" content="800">

        <meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="<?php echo $twittersite; ?>" />
        <meta name="twitter:creator" content="<?php echo $twittercreator; ?>" />
        <meta property="og:url" content="<?php echo $currentpage; ?>" />
        <meta property="og:title" content="<?php echo $title; ?>" />
        <meta property="og:description" content="<?php echo $description; ?>" />
        <meta property="og:image" content="<?php echo $image; ?>" />

        <!-- Bootstrap core CSS -->
        <link href="bootstrap-3-3-5/css/bootstrap.min.css" rel="stylesheet">

        <link href="css/fontawesome-all.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/style.css?v=1.5" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body data-uid="<?php echo $uid; ?>">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3 game">
                    <div class="info-site glitch"></div>
                    <div class="info-site live-lost"><img src="img/cookie-bite.png" alt="Angebissener Keks" class="game-over-img"></div>
                    <div class="info-site game-over text-center"></div>

                    <div class="info-site text-center">

                        <div class="start">
                            <div class="header">
                                <a href="#idee">Die Idee</a>
                                <a href="#superhelden">Super-Helden</a>
                                <a href="#donorhelden">Donor-Helden</a>
                                <a href="#gamerhelden">Gamer-Helden</a>
                            </div>
                            <div class="block-normal"><br>
                                <a href ="https://schokoladenseite.net/" target="_blank"><img src="img/logo-web.svg" alt="SCHOKOLADENSEITE.net" width="300"></a>
                                <div class="divider-30"></div>
                                <h1>Die Cookie-Challenge 2019</h1>
                                <div class="divider-30"></div>
                                <p class="small">Sammle Cookies für <a href="#superhelden" class="link"><u>Super-Held</u></a>:</p>
                                <a href ="https://www.hinzundkunzt.de/" target="_blank"><img src="img/huk-logo.png" alt="Hinz&Kunzt" width="180" style="vertical-align:bottom;"></a><br><br>
                                <p class="small">Für jeden gesammelten Cookie gehen 10 Cent an Hinz&Kunzt. </p>
                                <p class="small"><b>Gib Dir Mühe und rette die Welt!</b></p>
                                <div class="divider-30"></div>
                                <a href="#" class="play-btn play-btn-game">Jetzt spielen</a><br><br>
                                <p class="small">Ton an!</p>
                                <div class="divider-30"></div>
                            </div>
                        </div>

                        <div class="finish text-center">
                            <div class="block-normal">
                                <div class="links">
                                    <a href="#spender">Sponsoren</a> | <a href="#highscore">Highscore</a>
                                </div>
                                <div class="divider-30"></div>
								<img src="img/schoko.gif" alt="SCHOKO-Monster jagen Cookie Animation" class="max-width">

                                <div class="box">
                                    <h2>Danke!</h2>

                                    <p><span class="points"></span> Cookies gesammelt. <span class="betrag">XX</span> gehen an Hinz&Kunzt!</p>
                                    <div class="divider-30"></div>
                                    <h2>Fundingziel</h2>
                                    <p class="small">Vorhandene Spenden <b><?php echo score2Money($scoreTarget); ?></b> | Bisher erspielt <span class="collected <?php echo $colleted>$scoreTarget?'too-much':''; ?>"><?php echo score2Money($colleted); ?></span></p>
                                    <div class="progress">
                                        <div class="progress-bar collected-percent" role="progressbar" aria-valuenow="<?php echo collectedToPercent($scoreTarget, $colleted); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo collectedToPercent($scoreTarget, $colleted); ?>%"></div>
                                    </div>

                                    <!--
									<div style="border:1px solid #f70004; padding:5px;" class="small"><b>Achtung:</b> Die vorhandenen Spenden wurden überschritten!<br>
									Es werden dringend weitere <a href="https://schokoladenseite.net/schoko-spiel18/#donorhelden"><u>Sponsoren</u></a> benötigt!</div>
									<div class="divider-30"></div>
									-->

                                    <div class="highscore-form-wrapper">


                                        <form action="highscore.php" id="highscore-form">
                                            <div class="form-group">
                                                <!--<label for="message-text" class="col-form-label">In die Highscore-Liste eintragen.</label>-->
                                                <input type="hidden" name="uid" value="">
                                                <input type="text" class="form-control" required name="name" placeholder="Nickname in die Highscore-Liste eintragen">
                                                <div class="invalid-feedback"></div>
                                                <button type="submit" class="play-btn small">Eintragen</button>
                                            </div>
                                        </form>
                                        <div class="highscore-form-msgs"></div>
                                    </div>
                                </div>
                                <a href="#" class="play-btn play-btn-game">Nochmal?</a>
                                <div class="divider-50"></div>
                                <div class="social-share">
                                    <h2>Teilen</h2>
                                    <p class="small">Teile jetzt das Spiel, damit noch mehr Spenden zusammenkommen!</p>


                                    <?php
                                    $onclick = 'onclick="PopupSharing(this.href,\'Teile '.$title.'\', 600,600);return false;"';
                                    ?>
                                    <div class="social-icons">
                                        <a <?php echo $onclick?>
                                                href="http://www.facebook.com/sharer.php?u=<?php echo urlencode($currentpage);?>&amp;t=<?php echo $title; ?>"
                                                title="Spiel Teilen, damit noch mehr Spenden zusammenkommen!"><i class="fab fa-facebook-square fa-3x"></i></a>
                                        <a <?php echo $onclick?>
                                                href="https://twitter.com/intent/tweet?source=webclient&text=<?php echo $title." ".urlencode($currentpage) ?> via @your_account"
                                                title="Spiel Teilen, damit noch mehr Spenden zusammenkommen!"><i class="fab fa-twitter-square fa-3x"></i></a>
                                        <a href="mailto:?subject=SCHOKO-Weltretter / Die Cookie-Challenge &body=Helfe%20mir%20weitere%20Spenden%20zu%20sammeln für Hinz&Kunzt!%0Ahttps%3A%2F%2Fschokoladenseite.net%2Fschoko-spiel18"><i class="fas fa-envelope fa-3x"></i></i></a>
                                    </div>

                                </div>
                                <div class="divider-50"></div>
                                <div class="border"></div>
                                <div class="divider-30"></div>
                                <h2>Sponsoren</h2>
                                <div id="spender" class="spender">
                                    <div class="divider-30"></div>
                                    <!--
                                    <div class="partner-logo">
                                        <div class="logo-container">
                                            <a href="https://bbs-law.de/" target="_blank"><img src="img/bbs-logo.png" alt="BBS Rechtsanwälte" width="150"></a>
                                        </div>
                                    </div>
                                    <div class="partner-logo">
                                        <div class="logo-container">
                                            <a href="https://www.iphh.net/de/" target="_blank"><img src="img/logo-iphh.png" alt="IPHH" height="55"></a>
                                        </div>
                                    </div>
                                    -->
                                    <div class="partner-logo">
                                        <div class="logo-container">
                                            <a href="https://schokoladenseite.net/" target="_blank"><img src="img/schokologo.png" alt="SCHOKOLADENSEITE.net" width="150"></a>
                                        </div>
                                    </div>
                                    <!--
                                    <div class="partner-logo">
                                        <div class="logo-container">
                                            <a href="https://digum.zohosites.eu/" target="_blank"><img src="img/logo-digum-gr.png" alt="digum" width="150"></a>
                                        </div>
                                    </div>
                                    -->
                                </div>
                                <div class="divider-50"></div>
                                <div class="divider-30"></div>
                                <div id="highscore" class="highscore">
                                    <h2>Highscore</h2>
                                    <div class="divider-30"></div>
                                    <ul>
                                        <?php if($highscore): ?>
                                            <?php foreach ($highscore as $entry): ?>
                                                <li><div class="nickname"><?php echo $entry['name'] ?></div> <div>Deine erspielte Spende <span class="hs-betrag"><?php echo $entry['score']; ?></span> </div></li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="block-normal">
                            <div class="divider-30"></div>
                            <?php include 'inc/aufklapper.html'; ?>
                            <?php include 'inc/footer.html'; ?>
                        </div>

                    </div>

                    <div class="game-header"></div>
                    <div class="game-lines">
                        <div class="lines">
                            <div class="game-line game-line-0"></div>
                            <div class="game-line game-line-1"></div>
                            <div class="game-line game-line-2"></div>
                            <div class="game-line game-line-3"></div>
                            <div class="game-line game-line-4"></div>
                        </div>
                        <div class="line-walker game-line-2">
                            <div class="line-walker-bag"></div>
                        </div>
                    </div>
                    <div class="game-footer">
                        <div class="row controls">
                            <div class="col-xs-3 control text-center"><a href="#" class="control-left"></a></div>
                            <div class="col-xs-3 game-state text-center">Cookies<br><span class="selected-package-counter">0</span></div>
                            <div class="col-xs-3 game-state text-center">Leben<br><span class="live-counter"></span></div>
                            <div class="col-xs-3 control text-center"><a href="#" class="control-right"></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/soundjs.min.js"></script>
        <script src="js/main.min.js?v=1.10"></script>

    </body>
</html>
