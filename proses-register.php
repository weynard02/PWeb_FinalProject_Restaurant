<?php

session_start();
include('config.php');

if (isset($_POST['register'])){
    $email = $_POST['email'];
    if (strpos($email, '@') == true) {
        $res = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
        if (mysqli_num_rows($res) === 1){
            $_SESSION['failed'] = "Email not available!";
            header('Location: register.php');
            exit;
        }
    } else {
        $_SESSION['failed'] = "Email Format is incorrect!";
        header('Location: register.php');
        exit;
    }

    $password = $_POST['password'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $number = $_POST['number'];

    if ($password == '' || $name == '' || $address == '' || $number == ''){
        $_SESSION['failed'] = "Please complete your data!";
        header('Location: register.php');
        exit;
    }

    mysqli_query($conn, "INSERT INTO users (name, email, number, password, address, role) VALUES ('$name', '$email', '$number', '$password', '$address', 'user')");
    $_SESSION['sukses'] = "User register suceed! Please login!";
    header('Location: login.php');
}

?>