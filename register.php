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
    <title>Register Form</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
</head>
<body>
   
<div class="form-container">
    <form class="form-custom" action="proses-register.php" method="post">
        <h2>Register Now</h2>

        <label>Name<sup>*</sup></label>
        <input type="text" class="form-control" name="name" id="name" required placeholder="enter your name">
        <br>
        <label>Email<sup>*</sup></label>
        <input type="text" class="form-control" name="email" id="email" required placeholder="enter your email">
        <br>
        <label>Password<sup>*</sup></label>
        <input type="password" class="form-control" name="password" id="password" required placeholder="enter your password">   
        <br>
        <label>Address<sup>*</sup></label>
        <input type="text" class="form-control" name="address" id="address" required placeholder="enter your address">
        <br>
        <label>Phone Number<sup>*</sup></label>
        <input type="text" class="form-control" name="number" id="number" required placeholder="enter your phone number">

        <input type="submit" name="register" value="register" class="form-btn btn-submit">
        <p>already have an account? <a href="login.php">login now</a></p>

        <?php
            if (isset($_SESSION['failed'])) {
                echo "<div class='alert alert-danger' role='alert'>".$_SESSION['failed']."</div>";
                unset($_SESSION['failed']);
            }
        ?>
    </form>

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>
