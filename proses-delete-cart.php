<?php

session_start();
include('config.php');

if (isset($_POST['delete-cart'])) {
    $userid = $_SESSION['user_id'];
    $pid = $_POST['pid'];

    mysqli_query($conn, "DELETE FROM cart WHERE user_id = '$userid' AND pid = '$pid'");
    header('Location: cart.php');
}
