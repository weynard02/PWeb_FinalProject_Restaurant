<?php

session_start();
include('config.php');

if (isset($_POST['update-cart'])) {
    $userid = $_SESSION['user_id'];
    $pid = $_POST['pid'];
    $quantity = $_POST['quantity'];

    $row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$userid' AND pid = '$pid'"));
    if ($row){
        mysqli_query($conn, "UPDATE cart SET quantity = quantity + '$quantity' WHERE user_id = '$userid' AND pid = '$pid'");
    }
    else {
        mysqli_query($conn, "INSERT INTO cart VALUES ('', '$userid', '$pid', '$quantity')");
    }

    header('Location: menu.php');
}
