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

    <script>
        var data = new Array (<?php echo $row_total['amount']+1?>);
        function calc(id, price) {
            subtotal(id, price);
            total(id, price);
        }
        function subtotal(id, price) {
            var qty = parseInt(document.getElementById(id).value);
            var sub_total = qty*price;
            document.getElementById('sub-total-'+id).value = 'Rp.'+sub_total;
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
            
            document.getElementById('total').value = 'Rp. '+total_price;
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
   <section id="checkout" class="checkout">
        <div class="box-container">
        <h1><span>Summary</span></h1>
            <?php
                $uid = $_SESSION['user_id'];
                $sql = "SELECT * from cart where user_id='$uid'";
                $query = mysqli_query($conn, $sql);
                if (mysqli_num_rows($query) > 0) {
                    while($cart = mysqli_fetch_array($query)) {
                        $pid = $cart['pid'];
                        $menu = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM products WHERE id = '$pid'"));
                        
            ?>
            <input type="hidden" id="<?= $menu['id'] ?>" name="qty" class="qty" min="1" max="99" value="<?= $cart['quantity']; ?>" maxlength="2" >       
            <p><span class="name"><?= $cart['quantity']; ?> x <?= $menu['name']; ?> </span> 
            <input type="text" class="sub-total" id="sub-total-<?= $menu['id'] ?>" size="7" value="" readonly></p>
                
                        
            <?php
                    }
                } 
                if (mysqli_num_rows($query) > 0){
                    ?>
                    <form action="proses-order.php" class="form-custom-2" method="post">
                        <h5>Total: &nbsp; <input type="text" name="total" class="input-total" id="total" value="" size="7" readonly></h5>
                        <div class="mb-3">
                            <select name="method" class="form-select">
                                <option selected value=""> Select Payment Method </option>
                                <option value="OVO" class="payment-method ovo">OVO</option>
                                <option value="Gopay" class="payment-method gopay">Gopay</option>
                                <option value="ShopeePay" class="payment-method shopeepay">ShopeePay</option>
                            </select>
                        </div>
                    
                        <button type="submit" class="btn-submit-2" name="order">Order</button>
                    </form>
                <?php
                }
                else {
                    echo '<p class="empty">No items in your cart!</p>';
                }
            ?>
            
        </div>
    </section>
    <script>
      feather.replace()
    </script>

</body>