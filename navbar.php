<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-logo" href="#">SubWey <span>SubRazYo</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-menu nav-link" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="review.php">Review</a>
        </li>
        
      </ul>
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link cart" href="#"><i data-feather="shopping-cart"></i></a>
        </li>
        <?php
          session_start();
          if (isset($_SESSION['user_id'])){
            $uid = $_SESSION['user_id'];
            $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = '$uid'"));
            echo '
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i data-feather="user"></i>&nbsp; Hi, '. $user['name'] .
              '</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="proses-logout.php">Log out</a></li>
              </ul>
            </li>
            ';
          }
          else {
            echo '
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i data-feather="user"></i>&nbsp; Guest
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="login.php">Login</a></li>
                <li><a class="dropdown-item" href="register.php">Register</a></li>
              </ul>
            </li>
            ';
          }
        ?>
      </ul>
    </div>
  </div>
</nav>