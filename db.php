<?php
$hostname = "localhost";
$username = "nb547";
$password = "saikiran";
$dbname = "projectwork";

$conn = new mysqli($hostname, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>