<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $validUsername = "nb547";
    $validPassword = "saikiran";

    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === $validUsername && $password === $validPassword) {
        header("Location: index.php");
        exit();
    } else {
        echo "Invalid username or password. Please try again.";
        header("Location: login.php");
    }
}

?>
