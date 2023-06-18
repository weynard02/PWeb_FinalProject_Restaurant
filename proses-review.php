<?php

session_start();
include('config.php');

if (isset($_POST['review'])){
    $userid = $_SESSION['user_id'];
    $rate = $_POST['rate'];
    $message = $_POST['message'];

    if ($userid == '' || $rate == '' || $message == ''){
        $_SESSION['failed'] = "Review is not completed!";
        header('Location: review.php');
        exit;
    }
    
    mysqli_query($conn, "INSERT INTO reviews (user_id, rate, message) VALUES ('$userid', '$rate', '$message')");
    $_SESSION['sukses'] = "Review succeed";
    header('Location: index.php');
}

?>
