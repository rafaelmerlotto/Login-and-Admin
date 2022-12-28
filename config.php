<?php
setcookie("Autore", "Rafael Merlotto", time() + 3600);


$host = "localhost";
$user = "rafael";
$password = "basiliko";
$database = "capitolo9";

$connessione = mysqli_connect($host, $user, $password, $database);

?>