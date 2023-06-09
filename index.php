<!-- <?php
  include('config.php');
?> -->
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

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
        <a href="#" class="cta">Order now</a>
      </main>
    </section>
    <!-- Hero Section end -->

    <!-- About Section start -->
    <section id="about" class="about reveal">
      <h2><span>About</span> Us</h2>

      <div class="row">
        <div class="col about-img">
          <img src="img/tentang-kami.jpg" alt="Tentang Kami" />
        </div>
        <div class="col content">
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
      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque sunt porro voluptatem ab ipsa inventore itaque illo aut et quam!</p>
      <div class="card-group">
        <!-- <?php
          $sql = "SELECT * from products";
          $query = mysqli_query($db, $sql);
          while ($product = mysqli_fetch_array($query)) {
            echo '<div class="card">
              <img src="/img/'.$product['image'].'" class="card-img-top">
              <div class="card-body">
                <h5 class="card-title">'.$product['name'].'</h5>
             </div>';
          }
        ?> -->
      </div>
    </section>
    <!-- Menu Section end -->    
        
    <!-- Feather Icons -->
    <script>
      feather.replace();
    </script>

    <!-- My Javascript -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    
  </body>