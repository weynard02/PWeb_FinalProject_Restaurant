<?php

session_start();
include('config.php');

if (isset($_POST['insert-cart'])) {
    $userid = $_SESSION['user_id'];
    $pid = $_POST['pid'];

    mysqli_query($conn, "INSERT INTO cart VALUES ('', '$userid', '$pid', 1)");
    // $_SESSION['sukses'] = "Input menu succeed";
    header('Location: menu.php');
}
