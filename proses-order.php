<?php

session_start();
include('config.php');


if(isset($_POST['order'])) {
    $user_id = $_SESSION['user_id'];
    $method = $_POST['method'];
    $total_price = $_POST['total'];
    $total_price = intval(substr($total_price, 3));

    $res = mysqli_query($conn, "SELECT COUNT(*) FROM cart WHERE user_id = '$user_id'");
    $row = mysqli_fetch_row($res);
    $total_products = $row[0];

    if ($user_id == '' || $method == '' || $total_price == 0 || $total_products == 0){
        $_SESSION['failed'] = "Checkout unsuccessfull!";
        header('Location: checkout.php');
        exit;
    }
    
    mysqli_query($conn, "INSERT INTO orders (user_id, method, total_products, total_price) VALUES ('$user_id', '$method', '$total_products', '$total_price')");
    mysqli_query($conn, "DELETE FROM cart WHERE user_id = '$user_id'");
    $_SESSION['sukses'] = "Checkout successfull!";
    header('Location: index.php');
}
?>