<?php

session_start();
include('config.php');


if(isset($_POST['checkout'])) {
    $quans = isset($_POST['quans']) ? $_POST['quans'] : [];

    // Loop through the quans array and echo each value
    foreach ($quans as $index => $value) {
        echo 'quans[' . $index . ']: ' . $value . '<br>';
    }
    // header('Location: checkout.php');
}
?>