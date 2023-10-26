<?php

include_once 'config.php';
include_once 'functions.php';
$debug = false;
session_start();
try {
    $dbh = new PDO("mysql:host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME.";", DB_USER, DB_PASSWORD);
    // set the PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($debug) {
        echo "Connected successfully";
    }
} catch(PDOException $e) {
    if ($debug){
    echo "Connection failed: " . $e->getMessage();
    }
}