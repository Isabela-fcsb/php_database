<?php
session_start();

if ($_SESSION['email']) {
    $email = $_SESSION['email'];

    include './config/database.php';

    $query = "DELETE FROM `usuarios` WHERE email='" . $email . "';";

    $msqli->query($query);

    $msqli->close();
}
header("Location: login.php");
