<?php

session_start();
include('config.php');

if (isset($_POST['delete-menu'])) {
    $pid = $_POST['pid'];

    mysqli_query($conn, "DELETE FROM products WHERE id = '$pid'");
    header('Location: input-menu.php');
}
