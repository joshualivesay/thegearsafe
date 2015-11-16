<?php

function print_r_nice($array, $andHalt = true) {

    echo "<pre>";
    print_r($array);
    echo "</pre>";

    if ($andHalt) {
        exit;
    }
}

include dirname(__FILE__).'../settings/settings.php';
include dirname(__FILE__).'/database.php';
include dirname(__FILE__).'/emailValidation.php';

$db = new database();


