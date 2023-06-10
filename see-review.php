<?php
    session_start();
    if (!isset($_SESSION['user_id'])){
        header('Location: login-form.php');
        exit;
    }
    include('config.php');
    $uid = $_SESSION['user_id'];
    $sql = mysqli_query($conn, "SELECT role from users where id='$uid'");
    $row = mysqli_fetch_assoc($sql);
    $role = $row['role'];
    if ($role != 'admin') {
        header('Location: index.php');
        exit;
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
<section class="review reveal">

    <h1>Reviews</h1>

    <div class="box-container">
        <?php
        $sql = "SELECT * from reviews";
        $query = mysqli_query($conn, $sql);
        
        if($select_messages->rowCount() > 0){
            while($fetch_messages = $select_messages->fetch(PDO::FETCH_ASSOC)){
    ?>
    <div class="box">
        <p> name : <span><?= $fetch_messages['name']; ?></span> </p>
        <p> number : <span><?= $fetch_messages['number']; ?></span> </p>
        <p> email : <span><?= $fetch_messages['email']; ?></span> </p>
        <p> message : <span><?= $fetch_messages['message']; ?></span> </p>
        <a href="messages.php?delete=<?= $fetch_messages['id']; ?>" class="delete-btn" onclick="return confirm('delete this message?');">delete</a>
    </div>
    <?php
            }
        }else{
            echo '<p class="empty">you have no messages</p>';
        }
    ?>

    </div>

</section>
    <script>
      feather.replace()
    </script>
</body>