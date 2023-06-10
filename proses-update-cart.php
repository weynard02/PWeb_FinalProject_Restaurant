<?php

session_start();
include('config.php');

if (isset($_POST['update-cart'])) {
    $userid = $_SESSION['user_id'];
    $pid = $_POST['pid'];
    $quantity = $_POST['quantity'];

    mysqli_query($conn, "UPDATE cart SET quantity = '$quantity' WHERE user_id = '$userid' AND pid = '$pid'");
    // $_SESSION['sukses'] = "Input menu succeed";
    header('Location: menu.php');
}
