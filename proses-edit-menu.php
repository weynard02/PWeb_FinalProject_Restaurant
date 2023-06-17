<?php

session_start();
include('config.php');

if (isset($_POST['submit-edit-menu'])) {
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $filename = $_FILES['image']['name'];

    if (empty($filename)) {
        $sql = "UPDATE products SET name='$name', category='$category', price='$price' WHERE id = '$pid'";
        $query = mysqli_query($conn, $sql);
        $_SESSION['sukses'] = "Edit menu succeed";
        header('Location: input-menu.php');
    }

    else {
        $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

        if ($extension != 'jpg' && $extension != 'jpeg' && $extension != 'png') {
            $_SESSION['failed'] = "Invalid image extension!";
            header('Location: tolil.php');
            exit;
        }

        $sql = "SELECT * from products where id = '$pid' ";
        $query = mysqli_query($conn, $sql);
        $nama_gambar = mysqli_fetch_array($query);
        $lokasi = 'product-img/'.$nama_gambar['image'];
        $hapus_gambar = $lokasi;
        unlink($hapus_gambar); 
        if (move_uploaded_file($_FILES['image']['tmp_name'],'product-img/'.$filename)) {
            $sql = "UPDATE products SET name='$name', category='$category', price='$price', image='$filename' WHERE id = '$pid'";
            $query = mysqli_query($conn, $sql);
            $_SESSION['sukses'] = "Edit menu succeed";
            header('Location: input-menu.php');
        }
        else {
            $_SESSION['failed'] = "Error cannot store image!";
            header('Location: edit-menu.php');
            exit;
        }


    }
}
