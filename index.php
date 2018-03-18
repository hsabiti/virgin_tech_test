<?php
namespace VIRGIN;
require "config.php";
require "vendor/autoload.php";
error_reporting(E_ERROR | E_PARSE);

//test connectivity
try {
    $conn = Database::getInstance()->getConnection();
    $server = new Server($conn);
} catch (\Exception $e) {
    die ("\n" . $e->getMessage() . "\n");
}






try {
    echo "\n";
    echo "Name() " . $server->Name();
    echo "\n";

    echo "\n";
    echo "Applications() \;";
    print_r($server->Applications());
    echo "\n";

    echo "\n";
    echo "Version() " . $server->Version(1);
    echo "\n";

    echo "\n";
    echo "OwnerEmail() " . $server->OwnerEmail();
    echo "\n";

} catch (\Exception $e) {
    echo "\n" .$e->getMessage() . "\n";
}

