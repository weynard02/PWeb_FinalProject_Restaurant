<?php
    session_start();
    if (isset($_SESSION['user_id'])){
        header('Location: index.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
</head>
<body>
   
<div class="form-container">
    <form action="proses-login.php" method="post" class="form-custom">
        <h2>Selamat Datang</h2>
        <label>Email<sup>*</sup></label>
        <input type="text" class="form-control" name="email" id="email" required placeholder="enter your email">
        <br>
        <label>Password<sup>*</sup></label>
        <input type="password" class="form-control col-sm-2" name="password" id="password" required placeholder="enter your password">

        <input type="submit" name="login" value="login" class="form-btn btn-submit">
        <p>don't have an account? <a href="register.php">register now</a></p>
        <?php
            if (isset($_SESSION['failed'])) {
                echo "<div class='alert alert-danger' role='alert'>".$_SESSION['failed']."</div>";
                unset($_SESSION['failed']);
            }
        ?>
        <?php
            if (isset($_SESSION['sukses'])) {
                echo "<div class='alert alert-success' role='alert'>".$_SESSION['sukses']."</div>";
                unset($_SESSION['sukses']);
            }
        ?>
    </form>

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>
