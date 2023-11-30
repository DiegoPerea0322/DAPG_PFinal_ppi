<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/style.css" />
</head>
<body style="padding-top:70px">
    <!--Main Navigation-->
    <header>
<nav
       id="main-navbar"
       class="navbar navbar-expand-lg navbar-light bg-primary fixed-top"
       style = "min-height: 70px;"
       >
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button
              class="navbar-toggler"
              type="button"
              data-mdb-toggle="collapse"
              data-mdb-target="#sidebarMenu"
              aria-controls="sidebarMenu"
              aria-expanded="false"
              aria-label="Toggle navigation"
              >
        <i class="fas fa-bars"></i>
      </button>
      <!-- Brand -->
      <a class="navbar-brand" href="#">
        <img
             src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png"
             height="25"
             alt=""
             loading="lazy"
             class="img-thumbnail"
             />
      </a>
      <!-- Right links -->
      <ul class="navbar-nav ms-auto d-flex flex-row">
        <!-- Notification dropdown -->
          <?php
              session_start();
              if(isset($_SESSION['id'])) {
                  echo "<li class=\"nav-item dropdown\"><a href=\"#\" class=\"hidden-arrow me-1 border rounded py-1 px-3 nav-link d-flex align-items-center bg-white\" id=\"userMenuDropdown\" role=\"button\" data-mdb-toggle=\"dropdown\" aria-expanded=\"false\"> <i class=\"fas fa-user-alt m-1 me-md-2\"></i><p class=\"d-none d-md-block mb-0\">Mi Cuenta</p> </a><ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"userMenuDropdown\"><li><a class=\"dropdown-item\" href=\"./php/u_profile.php\">Perfil</a></li><li><form role=\"form\" method=\"post\"><button class=\"dropdown-item\" type=\"submit\" name=\"logout\">Cerrar sesión</button></form></li>
                  </ul></li>";
                  echo "<li class=\"nav-item\"><a href=\"./php/Cart.php\" class=\"border rounded py-1 px-3 nav-link d-flex align-items-center bg-white\" target=\"_self\"> <i class=\"fas fa-shopping-cart m-1 me-md-2\"></i><p class=\"d-none d-md-block mb-0\">My cart</p> </a></li>";
              }else {
                  //There is no active session
                  echo "<li class=\"nav-item\"><a href=\"./php/login_signup.php\" class=\"me-1 border rounded py-1 px-3 nav-link d-flex align-items-center bg-white\" target=\"_self\"> <i class=\"fas fa-user-alt m-1 me-md-2\"></i><p class=\"d-none d-md-block mb-0\">Sign in</p> </a></li>";
                  echo "<li class=\"nav-item\"><a href=\"./php/login_signup.php\" class=\"border rounded py-1 px-3 nav-link d-flex align-items-center bg-white\" target=\"_self\"> <i class=\"fas fa-shopping-cart m-1 me-md-2\"></i><p class=\"d-none d-md-block mb-0\">My cart</p> </a></li>";    
              } 
          ?>
      </ul>
    </div>
  </nav>

  <?php 
    if (isset($_POST['logout'])) {
      session_unset();
      session_destroy();
      header("Location: homepage.php");
      // Your code that you want to execute
  }

    if (isset($_POST['CPU'])) {
      $_SESSION['cat'] = 1;
      header("Location: ./php/categoria.php");
      // Your code that you want to execute
    }else if (isset($_POST['MB'])) {
      $_SESSION['cat'] = 2;
      header("Location: ./php/categoria.php");
      // Your code that you want to execute
    }else if (isset($_POST['GPU'])) {
      $_SESSION['cat'] = 4;
      header("Location: ./php/categoria.php");
      // Your code that you want to execute
    }else if (isset($_POST['Storage'])) {
      $_SESSION['cat'] = 3;
      header("Location: ./php/categoria.php");
      // Your code that you want to execute
    }else if (isset($_POST['RAM'])) {
      $_SESSION['cat'] = 6;
      header("Location: ./php/categoria.php");
      // Your code that you want to execute
    }if (isset($_POST['Cases'])) {
      $_SESSION['cat'] = 5;
      header("Location: ./php/categoria.php");
      // Your code that you want to execute
    } 
  ?>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <!-- Container wrapper -->
    <div class="container justify-content-center justify-content-md-between">
      <!-- Toggle button -->
      <button
              class="navbar-toggler border py-2 text-dark"
              type="button"
              data-mdb-toggle="collapse"
              data-mdb-target="#navbarLeftAlignExample"
              aria-controls="navbarLeftAlignExample"
              aria-expanded="false"
              aria-label="Toggle navigation"
              >
        <i class="fas fa-bars"></i>
      </button>

      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarLeftAlignExample">
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="btn btn-link px-3 me-2"  href="../homepage.php">Home</a>
          </li>
          <li class="nav-item">
          <form role="form" method="post">
            <a class="btn btn-link px-3 me-2"  href="./php/productos.php">Productos</a>
          </form>
          </li>
          <li class="nav-item">
          <form role="form" method="post">
            <button type="submit" class="btn btn-link px-3 me-2" name="CPU">
              Procesadores
            </button>
          </form>
          </li>
          <li class="nav-item">
          <form role="form" method="post">
            <button type="submit" class="btn btn-link px-3 me-2" name="MB">
              Tarjetas Madre
            </button>        
            </form>  
          </li>
          <li class="nav-item">
          <form role="form" method="post">
          <button type="submit" class="btn btn-link px-3 me-2" name="GPU">
              Tarjetas de Video
            </button>
            </form>
          </li>
          <li class="nav-item">
          <form role="form" method="post">
          <button type="submit" class="btn btn-link px-3 me-2" name="Storage">
              Almacenamiento
            </button>     
            </form>     
          </li>
          <li class="nav-item">
          <form role="form" method="post">
            <button type="submit" class="btn btn-link px-3 me-2" name="RAM">
              Memoria RAM
            </button>      
          </form>  
          </li>
          <li class="nav-item">
          <form role="form" method="post">
            <button type="submit" class="btn btn-link px-3 me-2" name="Cases">
              Gabinetes
            </button>     
          </form>   
          </li>
        </ul>
        <!-- Left links -->
      </div>
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->

  <!-- Jumbotron -->
  <div class="bg-primary text-white py-5">
    <div class="container py-5">
      <h1>
        Los mejores <br />
        productos y marcas
      </h1>
      <p>
        Los mejores precios, productos y servicio.
      </p>
    </div>
  </div>
  <!-- Jumbotron -->
</header>


<!-- Products -->
<section>
  <div class="container my-5">
    <header class="mb-4">
      <h3>Productos destacados</h3>
    </header>
    <div class="row">

    <?php
    
      $con = mysqli_connect("localhost", "root", "dapg100318","p_final");
      // Coneccion a la base de datos
      if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
      } else {
          //Saco los datos de la tabla
          $result = mysqli_query($con,"SELECT fotos.filename, producto.nombre, CONCAT('$', FORMAT(producto.precio, 2)) AS precio FROM producto INNER JOIN fotos WHERE fotos.caratula=1 AND fotos.id_producto=producto.id_producto LIMIT 4;");
          while($row = mysqli_fetch_array($result)) {
            echo "<div class=\"col-lg-3 col-md-6 col-sm-6 d-flex\">
            <div class=\"card w-100 my-2 shadow-2-strong\">";
              echo "<img src=\".\\img\\" . $row['filename'] . "\" class=\"card-img-top\" style=\"aspect-ratio: 1.5 / 1\" />
              <div class=\"card-body d-flex flex-column\">";
                echo "<h5 class=\"card-title\">". $row['nombre'] ."</h5>";
                echo "<p class=\"card-text\">" . $row['precio'] . "</p>";
              echo "</div>
            </div>
          </div>";
          }
      }

    ?>
      

      
    </div>
  </div>
</section>
<!-- Products -->

<!-- Footer -->
<footer class="text-center text-lg-start text-muted bg-primary mt-3">
  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start pt-4 pb-4">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-12 col-lg-3 col-sm-12 mb-2">
          <!-- Content -->
          <a href="https://mdbootstrap.com/" target="_blank" class="text-white h2">
            MDB
          </a>
          <p class="mt-1 text-white">
            © 2023 Copyright: MDBootstrap.com
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-6 col-sm-4 col-lg-2">
          <!-- Links -->
          <h6 class="text-uppercase text-white fw-bold mb-2">
            Store
          </h6>
          <ul class="list-unstyled mb-4">
            <li><a class="text-white-50" href="#">About us</a></li>
            <li><a class="text-white-50" href="#">Find store</a></li>
            <li><a class="text-white-50" href="#">Categories</a></li>
            <li><a class="text-white-50" href="#">Blogs</a></li>
          </ul>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-6 col-sm-4 col-lg-2">
          <!-- Links -->
          <h6 class="text-uppercase text-white fw-bold mb-2">
            Information
          </h6>
          <ul class="list-unstyled mb-4">
            <li><a class="text-white-50" href="#">Help center</a></li>
            <li><a class="text-white-50" href="#">Money refund</a></li>
            <li><a class="text-white-50" href="#">Shipping info</a></li>
            <li><a class="text-white-50" href="#">Refunds</a></li>
          </ul>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-6 col-sm-4 col-lg-2">
          <!-- Links -->
          <h6 class="text-uppercase text-white fw-bold mb-2">
            Support
          </h6>
          <ul class="list-unstyled mb-4">
            <li><a class="text-white-50" href="#">Help center</a></li>
            <li><a class="text-white-50" href="#">Documents</a></li>
            <li><a class="text-white-50" href="#">Account restore</a></li>
            <li><a class="text-white-50" href="#">My orders</a></li>
          </ul>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-12 col-sm-12 col-lg-3">
          <!-- Links -->
          <h6 class="text-uppercase text-white fw-bold mb-2">Newsletter</h6>
          <p class="text-white">Stay in touch with latest updates about our products and offers</p>
          <div class="input-group mb-3">
            <input type="email" class="form-control border" placeholder="Email" aria-label="Email" aria-describedby="button-addon2" />
            <button class="btn btn-light border shadow-0" type="button" id="button-addon2" data-mdb-ripple-color="dark">
              Join
            </button>
          </div>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <div class="">
    <div class="container">
      <div class="d-flex justify-content-between py-4 border-top">
        <!--- payment --->
        <div>
          <i class="fab fa-lg fa-cc-visa text-white"></i>
          <i class="fab fa-lg fa-cc-amex text-white"></i>
          <i class="fab fa-lg fa-cc-mastercard text-white"></i>
          <i class="fab fa-lg fa-cc-paypal text-white"></i>
        </div>
        <!--- payment --->

        <!--- language selector --->
        <div class="dropdown dropup">
          <a class="dropdown-toggle text-white" href="#" id="Dropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false"> <i class="flag-united-kingdom flag m-0 me-1"></i>English </a>

          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="Dropdown">
            <li>
              <a class="dropdown-item" href="#"><i class="flag-united-kingdom flag"></i>English <i class="fa fa-check text-success ms-2"></i></a>
            </li>
            <li><hr class="dropdown-divider" /></li>
            <li>
              <a class="dropdown-item" href="#"><i class="flag-poland flag"></i>Polski</a>
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="flag-china flag"></i>中文</a>
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="flag-japan flag"></i>日本語</a>
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="flag-germany flag"></i>Deutsch</a>
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="flag-france flag"></i>Français</a>
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="flag-spain flag"></i>Español</a>
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="flag-russia flag"></i>Русский</a>
            </li>
            <li>
              <a class="dropdown-item" href="#"><i class="flag-portugal flag"></i>Português</a>
            </li>
          </ul>
        </div>
        <!--- language selector --->
      </div>
    </div>
  </div>
</footer>

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>

