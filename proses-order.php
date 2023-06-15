<?php

session_start();
include('config.php');


if(isset($_POST['order'])) {
    $user_id = $_SESSION['user_id'];
    $method = $_POST['method'];
    $total_price = $_POST['total'];
    $total_price = intval(substr($total_price, 3));
    $total_products = "";

    $cart_res = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$user_id'");
    $i = 0;
    while ($cart_row = mysqli_fetch_assoc($cart_res)) {
        $menu_row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id = '{$cart_row['pid']}'"));
        if ($i > 0) $total_products = $total_products . ", " . $menu_row['name'] . " x " . $cart_row['quantity'];
        else $total_products = $total_products . $menu_row['name'] . " x " . $cart_row['quantity'];
        $i = $i + 1;
    }

    if ($user_id == '' || $method == '' || $total_price == 0 || $total_products == ''){
        $_SESSION['failed'] = "Checkout unsuccessfull!";
        header('Location: checkout.php');
        exit;
    }
    
    mysqli_query($conn, "INSERT INTO orders (user_id, method, total_products, total_price) VALUES ('$user_id', '$method', '$total_products', '$total_price')");
    mysqli_query($conn, "DELETE FROM cart WHERE user_id = '$user_id'");
    $_SESSION['sukses'] = "Checkout successfull!";
    header('Location: order.php');
}
?>