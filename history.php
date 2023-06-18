<?php
    session_start();
    if (!isset($_SESSION['user_id'])){
        header('Location: login.php');
        exit;
    }
    include('config.php');
    $uid = $_SESSION['user_id'];
    $sql = mysqli_query($conn, "SELECT role from users where id='$uid'");
    $row = mysqli_fetch_assoc($sql);
    $role = $row['role'];
    if ($role != 'admin') {
        header('Location: login-form.php');
        exit;
    }

    if(isset($_GET['delete'])){
        $did = $_GET['delete'];
        $query = "DELETE from orders where id = '$did'";
        $msg = mysqli_query($conn, $query);
        if (!$msg) {
            die("Error executing query: " . mysqli_error($conn));
        }
        header('location:history.php');
     }

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
    <script src="js/script.js"></script>

    <!-- My style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />


</head>
<body>
    <?php include('admin-navbar.php')?>
    <section class="see-review">

        <h1>History Orders</h1>

        <div class="box-container">
            <?php
            $sql = "SELECT * FROM orders join users on orders.user_id = users.id";
            $query = mysqli_query($conn, $sql);
            if (mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_array($query)) {
            ?>
            <div class="box">
                <p>Placed on : <span><?= $row['placed_on']; ?></span></p>
                <p>Name : <span><?= $row['name']; ?></span></p>
                <p>Email : <span><?= $row['email']; ?></span></p>
                <p>Number : <span><?= $row['number']; ?></span></p>
                <p>Address : <span><?= $row['address']; ?></span></p>
                <p>Payment Method : <span><?= $row['method']; ?></span></p>
                <p>Your orders : <span><?= $row['total_products']; ?></span></p>
                <p>Total price : <span>Rp.<?= $row['total_price']; ?></span></p>
                <a href="history.php?delete=<?= $row['id']; ?>" class="btn-delete" onclick="return confirm('delete this order?');">Delete</a>
            </div>
            <?php
                }
            }else {
                echo '<p class="empty">you have no messages</p>';
            }
        ?>

        </div>

    </section>
    <script>
      feather.replace()
    </script>
</body>