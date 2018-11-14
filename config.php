<?php
//require __DIR__ "src/functions.php";
/**
 * Configuration file with common settings.
 */
error_reporting(-1);              // Report all type of errors
ini_set("display_errors", 1);     // Display all errors
$name = preg_replace("/[^a-z\d]/i", "", __DIR__);
session_id($name);
// Om det inte finns en session pågående så startar den ingen ny
if (!isset($_SESSION)) {
    session_start();
}


// Create an array of the valid users
$users = [
    "doe" => [
        "name"=> "Jahne Doe",
        "password" => password_hash("doe", PASSWORD_DEFAULT)
    ],
    "admin" => [
        "name"=> "Das Admin",
        "password" => password_hash("admin", PASSWORD_DEFAULT)
    ],
];

$fileName = "db/bmo2.sqlite";
$dsn = "sqlite:$fileName";
