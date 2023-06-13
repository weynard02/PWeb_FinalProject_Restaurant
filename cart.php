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

    $sql = "select products.id, products.price from products join cart on products.id = cart.pid";
    $rs = mysqli_query($conn, $sql);
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

    <script>
        var data = new Array (<?php echo $row_total['amount']+1?>);
        function calc(id, price) {
            subtotal(id, price);
            total(id, price);
        }
        function subtotal(id, price) {
            var qty = parseInt(document.getElementById(id).value);
            var sub_total = qty*price;
            document.getElementById('sub-total-'+id).value = sub_total;
        }

        function total(id, price) {
            
            var qty = parseInt(document.getElementById(id).value);
            data[id] = qty*price;
            var total_price = 0;
            for (a=1; a<= <?php echo $row_total['amount']?>; a++)
            {
                if(data[a]>0)
                    total_price = parseInt(total_price) + parseInt(data[a]);
            }
            
            document.getElementById('total').value = total_price;
        }

        window.onload = function() {
            <?php
            while ($rowfood = mysqli_fetch_array($rs, MYSQLI_ASSOC)){ ?>
                subtotal(<?= $rowfood['id'] ?>, <?= $rowfood['price'] ?>);
                total(<?= $rowfood['id'] ?>, <?= $rowfood['price'] ?>);
            <?php } ?>
        };
    </script>

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

                        <form action="proses-delete-cart.php" method="post" class="box"> 

                            <input type="hidden" name="pid" value="<?= $menu['id']; ?>">
                            <input type="hidden" name="name" value="<?= $menu['name']; ?>">
                            <input type="hidden" name="price" value="<?= $menu['price']; ?>">
                            <input type="hidden" name="image" value="<?= $menu['image']; ?>">
                            <img src="product-img/<?= $menu['image']; ?>">   
                            <div class="name"><?= $menu['name']; ?></div>
                            <div class="flex">
                                <div class="price"><span>Rp.</span><?= $menu['price']; ?></div>
                                <input type="number" id="<?= $menu['id'] ?>" name="qty" class="qty" min="1" max="99" value="<?= $cart['quantity']; ?>" maxlength="2" 
                                onchange="calc(<?= $menu['id']?>, <?= $menu['price']?>)"> 

                            </div>
                            
                            
                            <div class="sub-flex">
                                <div class="sub-price">
                                    Sub-total: <span>Rp.</span> 
                                </div>
                                <input type="text" class="sub-total" id="sub-total-<?= $menu['id'] ?>" value="" size="18" readonly>
                                <input type="hidden" name="pid" value="<?= $menu['id']; ?>"/>
                                <button type="submit" class="trash" name="delete-cart"><i data-feather="trash-2"></i></button>
                            </div>
                            
                            
                        </form>
                        
            <?php
                    }
                } else {
                    echo '<p class="empty">No items in your cart!</p>';
                }
            ?>
            
        </div>
        <?php
            if (mysqli_num_rows($query) > 0){
                echo '<h1>Total: &nbsp;<span>Rp.</span> <input type="text" class="input-total" id="total" value="" size="5" readonly></h1>
                    <a href="checkout.php" class="btn-submit position-relative top-50 start-50 translate-middle">Checkout</a>';
            }
        ?>
    </section>
    <script>
      feather.replace()
    </script>

</body>