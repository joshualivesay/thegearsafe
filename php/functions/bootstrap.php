<?php

function print_r_nice($array, $andHalt = true) {

    echo "<pre>";
    print_r($array);
    echo "</pre>";

    if ($andHalt) {
        exit;
    }
}