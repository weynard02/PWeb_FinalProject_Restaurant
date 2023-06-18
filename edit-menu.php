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
    <title>Edit Menu</title>

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
        include('admin-navbar.php');
    ?>
    <?php
            if (isset($_GET['edit-menu'])) {
                $pid = $_GET['edit-menu'];
                $sql = "SELECT * FROM products where id = '$pid'";
                $rs = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($rs,MYSQLI_ASSOC);
            }
        ?>
    <form class="form-custom" action="proses-edit-menu.php" method="post" enctype="multipart/form-data">
        <h2>Edit <span>Menu</span></h2>
        <input type="hidden" name="pid" value="<?= $row['id']; ?>">
        <div class="mb-3">
            <input type="text" class="form-control" name="name" placeholder="Product Name" required value='<?= $row['name']; ?>'>
        </div>
        <div class="mb-3">
            <?php $category = $row['category']; ?>
            <select name="category" class="form-select">
                <option <?php echo ($category == '') ? "selected" : "" ?> value=""> Select Category </option>
                <option <?php echo ($category == 'Food') ? "selected" : "" ?> value="Food"> Food </option>
                <option <?php echo ($category == 'Drink') ? "selected" : "" ?> value="Drink"> Drink </option>
                <option <?php echo ($category == 'Dessert') ? "selected" : "" ?> value="Dessert"> Dessert </option>
            </select>
        </div>
        <div class="mb-3">
            <input type="number" class="form-control" name="price" min="1000" step="100" placeholder="Price" required value='<?= $row['price']; ?>'>
        </div>
        <div class="mb-3">
            <label class="form-label" for="photo"><b>Product Image</b></label>
            <input type="file" class="form-control" id="image" name="image">
            <span style="color: red;">If you don't want to change it, don't upload!</span>
        </div>
        <div class="mb-3">
            <input class="btn-submit" type="submit" value="Update" name="submit-edit-menu" />
        </div>
        <div class="mb-3">
            <?php
                if (isset($_SESSION['failed'])) {
                    echo '<div class="alert alert-warning" role="alert">
                    '.$_SESSION['failed'].'
                    </div>';
                    unset($_SESSION['failed']);
                }
            ?>
        </div>
    </form>
    
    <script>
      feather.replace()
    </script>

</body>