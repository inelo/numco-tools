<?php
require(__DIR__."/../vendor/autoload.php");
use Inelo\Numco\Numco;

if (php_sapi_name() == "cli") {
    if (count($argv)!==2) {
        die("Expected 1 parameter (JSON array).\n");
    }
    $arrayToCompress = json_decode($argv[1]);
    if (!is_array($arrayToCompress)) {
        die("The argument you provided is not an JSON array of numerical values.\n");
    }
    echo Numco::compress($arrayToCompress) . "\n";
} else {
    if (count($_GET)!==1 || !array_key_exists('data', $_GET)) {
        die("Expected 1 parameter (data=JSON array)");
    }

    $arrayToCompress = json_decode($_GET['data']);
    if (!is_array($arrayToCompress)) {
        die("The argument you provided is not an JSON array of numerical values.\n");
    }
    echo Numco::compress($arrayToCompress);
}
