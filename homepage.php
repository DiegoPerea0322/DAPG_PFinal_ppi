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
              if(isset($_SESSION['id_carro'])) {
                echo "ID carro: ".$_SESSION['id_carro'];
              }
              if(isset($_SESSION['id'])) {
                  echo "<li class=\"nav-item dropdown\"><a href=\"#\" class=\"hidden-arrow me-1 border rounded py-1 px-3 nav-link d-flex align-items-center bg-white\" id=\"userMenuDropdown\" role=\"button\" data-mdb-toggle=\"dropdown\" aria-expanded=\"false\"> <i class=\"fas fa-user-alt m-1 me-md-2\"></i><p class=\"d-none d-md-block mb-0\">Mi Cuenta</p> </a><ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"userMenuDropdown\"><li><a class=\"dropdown-item\" href=\"./php/u_profile.php\">Perfil</a></li><li><button class=\"dropdown-item\" type=\"button\" name=\"logout\">Cerrar sesión</button></li>
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
      <button type="button" class="btn btn-light shadow-0 text-primary pt-2 border border-white">
        <span class="pt-1">Purchase now</span>
      </button>
    </div>
  </div>
  <!-- Jumbotron -->
</header>


<!-- Products -->
<section>
  <div class="container my-5">
    <header class="mb-4">
      <h3>New products</h3>
    </header>

    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
        <div class="card w-100 my-2 shadow-2-strong">
          <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/1.webp" class="card-img-top" style="aspect-ratio: 1 / 1" />
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">GoPro HERO6 4K Action Camera - Black</h5>
            <p class="card-text">$790.50</p>
            <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
              <a href="./php/Prod_details.html" class="btn btn-primary shadow-0 me-1">Ver</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
        <div class="card w-100 my-2 shadow-2-strong">
          <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/2.webp" class="card-img-top" style="aspect-ratio: 1 / 1" />
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Canon camera 20x zoom, Black color EOS 2000</h5>
            <p class="card-text">$320.00</p>
            <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
              <a href="./php/Prod_details.html" class="btn btn-primary shadow-0 me-1">Ver</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
        <div class="card w-100 my-2 shadow-2-strong">
          <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/3.webp" class="card-img-top" style="aspect-ratio: 1 / 1" />
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Xiaomi Redmi 8 Original Global Version 4GB</h5>
            <p class="card-text">$120.00</p>
            <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
              <a href="./php/Prod_details.html" class="btn btn-primary shadow-0 me-1">Ver</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
        <div class="card w-100 my-2 shadow-2-strong">
          <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/4.webp" class="card-img-top" style="aspect-ratio: 1 / 1" />
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Apple iPhone 12 Pro 6.1" RAM 6GB 512GB Unlocked</h5>
            <p class="card-text">$120.00</p>
            <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
              <a href="./php/Prod_details.html" class="btn btn-primary shadow-0 me-1">Ver</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
        <div class="card w-100 my-2 shadow-2-strong">
          <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/5.webp" class="card-img-top" style="aspect-ratio: 1 / 1" />
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Apple Watch Series 1 Sport Case 38mm Black</h5>
            <p class="card-text">$790.50</p>
            <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
              <a href="./php/Prod_details.html" class="btn btn-primary shadow-0 me-1">Ver</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
        <div class="card w-100 my-2 shadow-2-strong">
          <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/6.webp" class="card-img-top" style="aspect-ratio: 1 / 1" />
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">T-shirts with multiple colors, for men and lady</h5>
            <p class="card-text">$120.00</p>
            <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
              <a href="./php/Prod_details.html" class="btn btn-primary shadow-0 me-1">Ver</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
        <div class="card w-100 my-2 shadow-2-strong">
          <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/7.webp" class="card-img-top" style="aspect-ratio: 1 / 1" />
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Gaming Headset 32db Blackbuilt in mic</h5>
            <p class="card-text">$99.50</p>
            <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
              <a href="./php/Prod_details.html" class="btn btn-primary shadow-0 me-1">Ver</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
        <div class="card w-100 my-2 shadow-2-strong">
          <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/8.webp" class="card-img-top" style="aspect-ratio: 1 / 1" />
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">T-shirts with multiple colors, for men and lady</h5>
            <p class="card-text">$120.00</p>
            <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
              <a href="./php/Prod_details.html" class="btn btn-primary shadow-0 me-1">Ver</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Products -->

<!-- Footer -->
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>

