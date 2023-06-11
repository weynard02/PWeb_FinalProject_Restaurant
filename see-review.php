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
        $query = "DELETE from reviews where id = '$did'";
        $msg = mysqli_query($conn, $query);
        if (!$msg) {
            die("Error executing query: " . mysqli_error($conn));
        }
        header('location:see-review.php');
     }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SubWey SuRazYo</title>

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
    <?php include('navbar.php')?>
    <section class="see-review">

        <h1>Reviews</h1>

        <div class="box-container">
            <?php
            $sql = "SELECT users.name, users.number, users.email, reviews.* from reviews join users on reviews.user_id = users.id";
            $query = mysqli_query($conn, $sql);
            if (mysqli_num_rows($query) > 0) {
                while ($rev = mysqli_fetch_array($query)) {
            ?>
            <div class="box">
                <p> name : <span><?= $rev['name']; ?></span> </p>
                <p> number : <span><?= $rev['number']; ?></span> </p>
                <p> email : <span><?= $rev['email']; ?></span> </p>
                <p><i data-feather="star"></i> <span><?= $rev['rate']; ?>/5</span></p>
                <p> message : <span><?= $rev['message']; ?></span> </p>
                <a href="see-review.php?delete=<?= $rev['id']; ?>" class="btn-delete" onclick="return confirm('delete this review?');">Delete</a>
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