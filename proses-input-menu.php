<?php

session_start();
include('config.php');

if (isset($_POST['input-menu'])) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    $filename = $_FILES['image']['name'];
    $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

    if ($extension != 'jpg' && $extension != 'jpeg' && $extension != 'png') {
        $_SESSION['failed'] = "Invalid image extension!";
        header('Location: input-menu.php');
        exit;
    } else {
        $directory = 'product-img/';
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
        $destination = $directory . $filename;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
            mysqli_query($conn, "INSERT INTO products (name, category, price, image) VALUES ('$name', '$category', '$price', '$filename')");
            $_SESSION['sukses'] = "Input menu succeed";
            header('Location: input-menu.php');
        } else {
            $_SESSION['failed'] = "Error cannot store image!";
            header('Location: input-menu.php');
            exit;
        }
    }
}
