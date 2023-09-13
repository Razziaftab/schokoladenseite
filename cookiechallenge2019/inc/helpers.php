<?php

define('MAXGAMESCORELIMIT', 1000);
define('TARGET', 5000);

/**
 * Updates the highscore-sorted-db by the entries in the highsore-db
 */
function updateSortedHighscore() {
    $highscore = [];

    $data = f::read('db/highscore.txt');

    foreach (explode(':::', $data) as $entry) {
        if(str::contains($entry, ':')) {
            $e = explode(':', $entry);
            if(count($e)==5 && $e[0]!="" && $e[1]!="" && $e[2]!="" && $e[3]!="") {
                $highscore[$e[3]] = ['name' => $e[0], 'score' => score2Money(intval($e[2])), 'date' => $e[4]];
            }
        }
    }

    ksort($highscore);

    f::write('db/highscore-sorted.txt',$highscore);
}

/**
 * creates a highscore for $name if the given $uid and $score values exists in the score-db
 * @param $uid
 * @param $name
 * @param $score
 * @return bool
 */
function addHighscore($uid, $name, $score) {

    if($name!="" && ctype_alnum(str_replace([' ', '-', 'ä', 'Ä', 'ö', 'Ö', 'ü', 'Ü', 'ß'],'a',$name))) {
        if(is_int($score) && $score>0 && $score < MAXGAMESCORELIMIT) {
            $data = f::read('db/highscore.txt');
            $scores = f::read('db/score.txt');

            if (!str::contains($data, ':::' . $name . ':')) {
                if(str::contains($scores, ':::' . $uid . '::' . $score) && !str::contains($data, ':' . $uid . ':')) {
                    f::write('db/highscore.txt', ':::' . $name . ':' . $uid . ':' . $score . ':' . (MAXGAMESCORELIMIT*100 - intval($score)) . '-' . time() . ':' . date('y-m-d h_i_s'), true);

                    //Maybe another user set an entry with the same name at the same time.
                    //Then the file contains 2 entries with the same name.
                    //Because the name is the key in the output, only one will shown.

                    updateSortedHighscore();
                    return 'success';
                }
                return 'invalid_combination';
            }
            return 'duplicate_name';
        }
        return 'invalid_score';
    }
    return 'invalid_name';
}

/**
 * Return a valid uid and creates a entry in the gamer-db
 * @return string
 */
function getGamerId() {
    $uid = uniqid('', true);
    f::write('db/gamer-'.date('y-m-d').'.txt', ':::' . $uid , true);

    return $uid;
}

/**
 * Saves the score for the uid.
 * the uid must be valid (exist in gamer-db, and not used in score-db)
 * return a new uid if score is saved. Otherwise returns null
 * @param $uid
 * @param $score
 * @return null|string
 */
function addScore($uid, $score) {
    if(is_int($score) && $score>=0 && $score < MAXGAMESCORELIMIT) {
        $gamer = f::read('db/gamer-'.date('y-m-d').'.txt');
        //maybe gamer created add 23:59:59 and highscore added at 00:00:00
        $gamerYesterday = f::read('db/gamer-'.date('y-m-d', time()-(60*60*24)).'.txt');

        $scores = f::read('db/score.txt');

        if(str::contains($gamer, $uid) || str::contains($gamerYesterday, $uid)) {
            if(!str::contains($scores, ':::'.$uid.'::')) {
                f::write('db/score.txt', ':::' . $uid . '::' . $score , true);
                return getGamerId();
            }
        }
    }
    return null;
}

/**
 * Returns the collected $score by all gamers
 * @return int
 */
function getScore() {
    $collected = 0;
    $data = f::read('db/score.txt');
    foreach (explode(':::', $data) as $entry) {
        $values = explode('::', $entry);
        if(count($values)==2) {
            $collected += intval($values[1]);
        }
    }
    return $collected;
}

/**
 * Returns the sorted highscore as array from the sorted-highsore-db
 * @return mixed
 */
function loadSortedHighscore() {
    if(!f::exists('db/highscore-sorted.txt')) {
        updateSortedHighscore();
    }

    return unserialize(f::read('db/highscore-sorted.txt'));
}

/**
 * Return the money-value for the given $score
 * @param $score
 * @return string
 */
function score2Money($score, $targetAsLimit=false) {

    if($targetAsLimit && $score > getTarget()) {
        $score = getTarget();
    }

    return number_format(intval($score)/10, 2,',','.').'€';
}

/**
 * Return the percentage of the $collected score from the $target
 * @param $target
 * @param $collected
 * @return string
 */
function collectedToPercent($target, $collected) {
    $value =  number_format((100/$target*($collected)),2,'.', '');

    if($value > 100) {
        $value = 100;
    }

    return $value;
}

function getTarget() {
    return TARGET;
}

?>