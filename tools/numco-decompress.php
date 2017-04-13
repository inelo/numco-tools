<?php
require(__DIR__."/../vendor/autoload.php");
use Inelo\Numco\Numco;

if (php_sapi_name() == "cli") {
    if (count($argv)!==2) {
        die("Expected 1 parameter (string).\n");
    }
    $data = $argv[1];
    echo json_encode(Numco::decompress($data)) . "\n";
} else {
    if (count($_GET)!==1 || !array_key_exists('data', $_GET)) {
        die("Expected 1 parameter (data=string)");
    }
    $data = $_GET['data'];
    echo json_encode(Numco::decompress($data));
}
