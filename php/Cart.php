<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"
    />
    <!-- MDB -->
    <link href="../css/mdb.min.css" rel="stylesheet"
    />
    <!-- Custom styles -->
    <link rel="stylesheet" href="../css/admin_styles.css" />
</head>
<body>
    <!--Main Navigation-->
<header>
  <!-- Sidebar -->
  <nav
       id="sidebarMenu"
       class="collapse d-lg-block sidebar collapse bg-white"
       >
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">
        <a
           href="./u_profile.php"
           class="list-group-item list-group-item-action py-2 ripple"
           aria-current="true"
           >
          <i class="fas fa-house-user fa-fw me-3"></i
            ><span>Perfil del usuario</span>
        </a>
        <a
           href="./Cart.php"
           class="list-group-item list-group-item-action py-2 ripple active"
           ><i class="fas fa-cart-shopping fa-fw me-3"></i><span>Carrito de Compras</span></a>
        <a
           href="./historial.php"
           class="list-group-item list-group-item-action py-2 ripple"
           ><i class="fas fa-clock-rotate-left fa-fw me-3"></i><span>Historial de Compras</span></a
          >
      </div>
    </div>
  </nav>
  <!-- Sidebar -->

  <!-- Navbar -->
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
      <a class="navbar-brand" href="../homepage.php">
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
                  echo "<li class=\"nav-item dropdown\"><a href=\"#\" class=\"hidden-arrow me-1 border rounded py-1 px-3 nav-link d-flex align-items-center bg-white\" id=\"userMenuDropdown\" role=\"button\" data-mdb-toggle=\"dropdown\" aria-expanded=\"false\"> <i class=\"fas fa-user-alt m-1 me-md-2\"></i><p class=\"d-none d-md-block mb-0\">Mi Cuenta</p> </a><ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"userMenuDropdown\"><li><a class=\"dropdown-item\" href=\"./u_profile.php\">Perfil</a></li><li><form role=\"form\" method=\"post\"><button class=\"dropdown-item\" type=\"submit\" name=\"logout\">Cerrar sesión</button></form></li>
                  </ul></li>";
                  echo "<li class=\"nav-item\"><a href=\"./Cart.php\" class=\"border rounded py-1 px-3 nav-link d-flex align-items-center bg-white\" target=\"_self\"> <i class=\"fas fa-shopping-cart m-1 me-md-2\"></i><p class=\"d-none d-md-block mb-0\">My cart</p> </a></li>";
              }else {
                  //There is no active session
                  echo "<li class=\"nav-item\"><a href=\"./login_signup.php\" class=\"me-1 border rounded py-1 px-3 nav-link d-flex align-items-center bg-white\" target=\"_self\"> <i class=\"fas fa-user-alt m-1 me-md-2\"></i><p class=\"d-none d-md-block mb-0\">Sign in</p> </a></li>";
                  echo "<li class=\"nav-item\"><a href=\"./login_signup.php\" class=\"border rounded py-1 px-3 nav-link d-flex align-items-center bg-white\" target=\"_self\"> <i class=\"fas fa-shopping-cart m-1 me-md-2\"></i><p class=\"d-none d-md-block mb-0\">My cart</p> </a></li>";    
              } 
          ?>
      </ul>
    </div>
  </nav>

  

  <?php
    if (isset($_POST['logout'])) {
      session_unset();
      session_destroy();
      header("Location: ../homepage.php");
      // Your code that you want to execute
    }
  ?>

  <!-- Navbar -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 58px">
  <div class="container pt-4">
    <!-- Section: Resumen de Inventario -->
    <section class="mb-4">
      <div class="card shadow-0 border">
        <div class="card-body">
        <h5 class="card-title mb-3">Carrito de Compras</h5>
        </div>
      </div>
            
      <form role="form" method="post" action="<?php $_SERVER["PHP_SELF"];?>">
        <?php

            $con = mysqli_connect("localhost", "root", "dapg100318","p_final");
            // Coneccion a la base de datos
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            } else {
                //Saco los datos de la tabla
                $id = $_SESSION['id'];
                $result = mysqli_query($con,"SELECT * FROM producto, fotos, carritoprod WHERE fotos.caratula=1 AND fotos.id_producto=producto.id_producto AND carritoprod.id_producto=producto.id_producto AND carritoprod.id_carrito=(SELECT id_carrito FROM carrito WHERE id_usuario = $id);");
                while($row = mysqli_fetch_array($result)) {

                    echo "<div class=\"row justify-content-center mb-3\">
                    <div class=\"col-md-12\">
                    <div class=\"card shadow-0 border rounded-3\">
                        <div class=\"card-body\">
                        <div class=\"row g-0\">  
                            <div class=\"col-xl-3 col-md-4 d-flex justify-content-center\">
                            <div class=\"bg-image hover-zoom ripple rounded ripple-surface me-md-3 mb-3 mb-md-0\">
                                <img src=\"..\\img\\" . $row['filename'] . "\" class=\"w-100\" />
                            </div>
                            </div>
                            <div class=\"col-xl-6 col-md-5 col-sm-7\">";
                    echo "<h5>" . $row['nombre'] . "</h5>";
                    echo "<p class=\"text mb-4 mb-md-0\">" . $row['descripcion'] . "</p>";
                    echo "</div>
                            <div class=\"col-xl-3 col-md-3 col-sm-5\">
                            <div class=\"d-flex flex-row align-items-center mb-1\">
                                <h4 class=\"mb-1 me-1\"> $" . $row['precio'] . ".00</h4>
                            </div>
                            </div>
                            

                        </div>
                        </div>
                        </div>
                        </div>
                        </div>";
            
                }
            }

        ?>

                <div class="float-end">
              	  <button type="submit" class="btn btn-success shadow-0 border" name="pay">Confirma compra</button>
            	  </div>
                <div class="float-end">
              	  <button type="submit" class="btn btn-success shadow-0 border" name="empty">Vacia el carro</button>
            	  </div>          


        </form>

    </section>
  </div>
</main>

<?php

  if (isset($_POST['pay']))  {
        $con = mysqli_connect("localhost", "root", "dapg100318","p_final");
            // Coneccion a la base de datos
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            } else {
                // Process the values as needed
                    $idsession = (int) $_SESSION['id'];
                    $sql = "SELECT id_historial FROM historial WHERE id_usuario= $idsession ;";
                    $result = mysqli_query($con,$sql);
                    $row = mysqli_fetch_array($result);
                    $value = $row['id_historial'];
                    $valor = (int) $value;
                    $value2 = $_SESSION['id_carro'];
                    $valor2 = (int) $value2;
                    $sql3 = "SELECT id_producto FROM carritoprod WHERE id_carrito= $valor2 ;";
                    $result3 = mysqli_query($con,$sql3);
                    while($row = mysqli_fetch_array($result3)) {
                        $value3 = $row['id_producto'];
                        $valor3 = (int) $value3;
                        $sql4 = "INSERT INTO historialprod (id_historial, id_producto) VALUES ($valor, $valor3);";
                        if (mysqli_query($con,$sql4)) {
                        } else {
                        echo "Error inserting data: " . mysqli_error($con);
                        }
                        $sql7 = "UPDATE producto SET c_almacen = c_almacen - 1 WHERE id_producto = $valor3;";
                        if (mysqli_query($con,$sql7)) {
                        } else {
                        echo "Error updating data: " . mysqli_error($con);
                        }
                    }
                    $sql5 = "DELETE FROM carritoprod WHERE id_carrito= $valor2 ;";
                    if (mysqli_query($con,$sql5)) {
                    } else {
                    echo "Error deleting data: " . mysqli_error($con);
                    }
                    $sql6 = "DELETE FROM carrito WHERE id_usuario= $idsession ;";
                    if (mysqli_query($con,$sql6)) {
                    } else {
                    echo "Error deleting data: " . mysqli_error($con);
                    }
                    echo "<script type='text/javascript'>alert('Compra realizada con exito');</script>";
                    $sql8 = "INSERT INTO carrito (id_usuario) VALUES ($idsession);";
                    if (mysqli_query($con,$sql8)) {
                      $sql9 = "SELECT id_carrito FROM carrito WHERE id_usuario= $idsession ;";
                      $result9 = mysqli_query($con,$sql9);
                      $row9 = mysqli_fetch_array($result9);
                      $value9 = $row9['id_carrito'];
                      $_SESSION['id_carro'] = $value9;
                    } else {
                    echo "Error inserting data: " . mysqli_error($con);
                    }
                
            }
  }else if (isset($_POST['empty'])){
    $con = mysqli_connect("localhost", "root", "dapg100318","p_final");
    // Coneccion a la base de datos
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    } else {
      $idcarro = $_SESSION['id_carro'];
      $sql = "DELETE FROM carritoprod WHERE id_carrito= $idcarro ;";
      if (mysqli_query($con,$sql)) {
      } else {
      echo "Error deleting data: " . mysqli_error($con);
      }
    }
    
  } 
?>

<!--Main layout-->
    <!-- MDB -->
    <script type="text/javascript" src="../js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="../js/script.js"></script>
</body>
<?php

?>
</html>
