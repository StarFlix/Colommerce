<?php
//DB details
$dbHost = 'localhost';
$dbUsername = 'id21381387_root';
$dbPassword = '8Dj^&@QlQ}o<i)u_';
$dbName = 'id21381387_colommerce';

//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Unable to connect database: " . $db->connect_error);
}