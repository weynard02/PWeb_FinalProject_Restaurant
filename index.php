<?php
  session_start();
  include('config.php');
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Subwey Yoraz</title>

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
    <?php
      include('navbar.php');
    ?>
    <!-- Hero Section start -->
    <section class="hero" id="home">
      <main class="content">
        <h1>Our handsome menu: <br><span>Spicy Chicken Burger</span></h1>
        <a href="menu.php" class="cta">Order now</a>
      </main>
    </section>
    <!-- Hero Section end -->

    <!-- About Section start -->
    <section id="about" class="about reveal">
      <h2><span>About</span> Us</h2>

      <div class="row">
        <div class="col-lg-6 col-md-6 about-img">
          <img src="img/tentang-kami.jpg" class="img-fluid" />
        </div>
        <div class="col-lg-6 col-md-6 content">
          <h3>The Story of Success</h3>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo in
            tempore omnis natus ea praesentium?
          </p>
          <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae
            voluptate accusantium ex fugit incidunt similique consectetur
            tenetur vitae quos voluptatibus.
          </p>
        </div>
      </div>
    </section>
    <!-- About Section end -->

    <!-- Menu Section start -->
    <section id="menu" class="menu reveal">
      <h2>Our <span>Highlights</span></h2>
      <div class="box-container">
            <?php
                
                $sql = "SELECT * from products order by category desc limit 4";
                $query = mysqli_query($conn, $sql);
                if (mysqli_num_rows($query) > 0) {
                    while($menu = mysqli_fetch_array($query)) {
            ?>
            <div class="box">
                <img src="product-img/<?= $menu['image']; ?>">   
                <div class="name"><?= $menu['name']; ?></div>
                <div class="category"><?= $menu['category']; ?></div>
            </div>
            <?php
                    }
                  }
            ?>
      </div>
    </section>
    <!-- Menu Section end -->    

    <!-- Review Section start -->
    <section id="review" class="review reveal">
      <div class="card text-center">
        <div class="card-body">
          <h2 class="card-title">Review <span>Us</span></h2>
          <p class="card-text">I know you like it!</p>
          <a href="review.php" class="cta">Rate Us!</a>
        </div>
      </div>
    </section>
      <!-- Review Section end -->

    <footer>
      <p>&#169; Weynard, Razan, Yoyo</p>
    </footer>
    <script>
      feather.replace()
    </script>
    
  </body>