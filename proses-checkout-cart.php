<?php

session_start();
include('config.php');

$sql = "select count(*) as amount from products";
$rs = mysqli_query($conn, $sql);
$row_total = mysqli_fetch_array($rs, MYSQLI_ASSOC);

for ($i = 1; $i <= $row_total['amount']; $i++) {
    
    $postget = 'delete-cart-'.$i;
    // echo $postget.'<br>';
    if (isset($_POST[$postget])) {
        $userid = $_SESSION['user_id'];
        $pid = $i;

        mysqli_query($conn, "DELETE FROM cart WHERE user_id = '$userid' AND pid = '$pid'");
        header('Location: cart.php');
    }
}


if(isset($_POST['checkout'])) {
    // $quans = isset($_POST['quans']) ? $_POST['quans'] : [];

    // // Loop through the quans array and echo each value
    // foreach ($quans as $index => $value) {
    //     echo 'quans[' . $index . ']: ' . $value . '<br>';
    // }
    $userid = $_SESSION['user_id'];
    $rs = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$userid'");
    while($row = mysqli_fetch_array($rs)) {
        if ($row){
            $pid = $row['pid'];
            $str = 'qty-'.$pid;
            //echo $str.'<br>';
            $qty = $_POST[$str];
            //echo $qty.'<br>';
            mysqli_query($conn, "UPDATE cart SET quantity = '$qty' WHERE user_id = '$userid' AND pid = '$pid'");
        }
    }
    
    header('Location: checkout.php');
}
?>