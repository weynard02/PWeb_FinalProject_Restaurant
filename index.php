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

    <!-- My style -->
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <?php
      include('navbar.php');
    ?>
    <!-- Hero Section start -->
    <section class="hero" id="home">
      <main class="content">
        <h1>Nikmati menu favorit <span>Spicy Chicken Burger</span></h1>
        <a href="#" class="cta">Pesan Sekarang</a>
      </main>
    </section>
    <!-- Hero Section end -->

    <!-- About Section start -->
    <section id="about" class="about">
      <h2><span>Tentang</span> Kami</h2>

      <div class="row">
        <div class="about-img">
          <img src="img/tentang-kami.jpg" alt="Tentang Kami" />
        </div>
        <div class="content">
          <h3>Kisah dari Subway</h3>
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

    <!-- Feather Icons -->
    <script>
      feather.replace();
    </script>

    <!-- My Javascript -->
    <script src="js/script.js"></script>
  </body>