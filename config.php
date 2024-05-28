<?php
$servername = "";
$username = "dbusr22360859068";
$password = "nwTHddZv6QWz";
$dbname = "dbstorage22360859068";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
