<?php
namespace VIRGIN;
require "config.php";
require "vendor/autoload.php";
error_reporting(E_ERROR | E_PARSE);

$cmd = "mysql -h " . $config['db_host'] . " -u" . $config['db_user'] . " -p" . $config['db_pwd'] . " " . $config['db'] . " < " . __DIR__ . "/seeds/db.sql";

shell_exec($cmd, $output);