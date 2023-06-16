<?php
    session_start();
    if (!isset($_SESSION['user_id'])){
        header('Location: login.php');
        exit;
    }
    include('config.php');
    $sql = "select count(*) as amount from products";
    $rs = mysqli_query($conn, $sql);
    $row_total = mysqli_fetch_array($rs, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SubWey Yoraz</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
    rel="stylesheet"
    />

    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-- My style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />


</head>
<body>
    <?php
        include('navbar.php');
    ?>
    <section class="order">
        <h1>Your <span>Order</span></h1>
        <div class="container">
    <?php
        if (isset($_SESSION['sukses'])) {
            echo "<div class='alert alert-success' role='alert'>".$_SESSION['sukses']."</div>";
            unset($_SESSION['sukses']);
        }
        $uid = $_SESSION['user_id'];
        $sql = "SELECT * FROM orders join users on orders.user_id = users.id where user_id = '$uid'";
        $rs = mysqli_query($conn, $sql);
        mysqli_data_seek($rs, mysqli_num_rows($rs) - 1);
        $row = mysqli_fetch_array($rs,MYSQLI_ASSOC);
    ?>
        </div>
    <div class="order-details">
        <h3>THANK YOU FOR <span>ORDER</span></h3>
      <p>Placed on : <span><?= $row['placed_on']; ?></span></p>
      <p>Name : <span><?= $row['name']; ?></span></p>
      <p>Email : <span><?= $row['email']; ?></span></p>
      <p>Number : <span><?= $row['number']; ?></span></p>
      <p>Address : <span><?= $row['address']; ?></span></p>
      <p>Payment Method : <span><?= $row['method']; ?></span></p>
      <p>Your orders : <span><?= $row['total_products']; ?></span></p>
      <p>Total price : <span>Rp.<?= $row['total_price']; ?></span></p>
      <div class="ok">
        <a href="index.php" class="btn-submit">OK</a>
      </div>
   </div>
        
    </section>
    <script>
      feather.replace()
    </script>

</body>