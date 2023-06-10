<?php
    session_start();
    if (!isset($_SESSION['user_id'])){
        header('Location: login-form.php');
        exit;
    }
    include('config.php');
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

    <!-- My style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />


</head>
<body>
    <?php
        include('navbar.php');
    ?>
   <section id="products" class="products">
        <h1>Your <span>Cart</span></h1>

        <div class="box-container">
            <?php
                $uid = $_SESSION['user_id'];
                $sql = "SELECT * from cart where user_id='$uid'";
                $query = mysqli_query($conn, $sql);
                if (mysqli_num_rows($query) > 0) {
                    while($cart = mysqli_fetch_array($query)) {
                        $pid = $cart['pid'];
                        $menu = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM products WHERE id = '$pid'"));
                        
            ?>

                        <form action="" method="post" class="box"> 
                            <input type="hidden" name="pid" value="<?= $menu['id']; ?>">
                            <input type="hidden" name="name" value="<?= $menu['name']; ?>">
                            <input type="hidden" name="price" value="<?= $menu['price']; ?>">
                            <input type="hidden" name="image" value="<?= $menu['image']; ?>">
                            <img src="product-img/<?= $menu['image']; ?>">   
                            <div class="name"><?= $menu['name']; ?></div>
                            <div class="flex">
                                <div class="price"><span>Rp.</span><?= $menu['price']; ?></div>
                                <!-- <input type="number" name="qty" class="qty" min="1" max="99" value="<?= $menu['quantity']; ?>" maxlength="2"> -->
                                <input class="form-control" type="text" value="<?= $cart['quantity']; ?>" readonly>
                            </div>
                            
                        </form>
            <?php
                    }
                } else {
                    echo '<p class="empty">Sorry, we broke!</p>';
                }
            ?>
        </div>
        <a href="" class="btn-submit ms-5">Submit</a>
    </section>
    <script>
      feather.replace()
    </script>

</body>