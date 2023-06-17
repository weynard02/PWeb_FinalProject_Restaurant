<?php

session_start();
include('config.php');

if (isset($_POST['update'])){
    $email = $_POST['email'];
    if (strpos($email, '@') == true) {
    } else {
        $_SESSION['failed'] = "Email Format is incorrect!";
        header('Location: admin-user.php');
        exit;
    }

    $password = $_POST['password'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $number = $_POST['number'];
    $uid = $_POST['uid'];

    if ($password == '' || $name == '' || $address == '' || $number == ''){
        $_SESSION['failed'] = "Please complete your data!";
        header('Location: admin-user.php');
        exit;
    }

    mysqli_query($conn, "UPDATE users SET name='$name', email='$email', number='$number', password='$password', address='$address' where id = '$uid'");
    $_SESSION['sukses'] = "User updated succeed!";
    header('Location: admin-user.php');
}

?>