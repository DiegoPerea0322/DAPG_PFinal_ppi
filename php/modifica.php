<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="../css/mdb.min.css" />
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
           href="./admin_home.php"
           class="list-group-item list-group-item-action py-2 ripple"
           target="_self"
           >
          <i class="fas fa-tachometer-alt fa-fw me-3"></i
            ><span>Panel de control</span>
        </a>
        <a
           href="./prod_upload.php"
           class="list-group-item list-group-item-action py-2 ripple"
           target="_self"
           ><i class="fas fa-circle-plus fa-fw me-3"></i><span>Agregar producto</span></a>
        <a
           href="./s_mod.php"
           class="list-group-item list-group-item-action py-2 ripple active"
           ><i class="fas fa-pen-to-square fa-fw me-3"></i><span>Modificar Productos</span></a
          >
        <a
           href="elimina.php"
           class="list-group-item list-group-item-action py-2 ripple"
           ><i class="fas fa-circle-minus fa-fw me-3"></i
          ><span>Eliminar productos</span></a
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

<?php

    $con = mysqli_connect("localhost", "root", "dapg100318","p_final");
    // Coneccion a la base de datos
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    } else {
    $idprod = (int) $_SESSION['mod_idprod'];
    $sql2 = "SELECT * FROM producto WHERE id_producto=$idprod;";
    $result2 = mysqli_query($con,$sql2);
    $row2 = mysqli_fetch_array($result2);
    $nombre = $row2['nombre'];
    $descripcion = $row2['descripcion'];
    $precio = (float) $row2['precio'];
    $cantidad = (int) $row2['c_almacen'];
    $categoria = (int) $row2['id_categoria'];
    }
?>

<!--Main layout-->
<main style="margin-top: 58px">
  <div class="container pt-4">
    <!-- Section: Main chart -->
    <section class="mb-4">
      <div class="card shadow-0 border">
        <div class="card-body">
        <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
          <h5 class="card-title mb-3">Modificar producto</h5>
          <div class="row">
            <div class="col-12 mb-3">
              <p class="mb-0">Nombre del producto</p>
              <div class="form-group">
                <input type="text" id="typeText" placeholder="Type here" class="form-control" name="name" value="<?php echo $nombre; ?>"/>
              </div>
            </div>

            <div class="col-6 mb-3">
              <p class="mb-0">Categoria</p>
                  <select class="form-select" id="categoria" name="categoria" value="<?php echo $categoria; ?>">
                  
                  <?php
                    $con = mysqli_connect("localhost", "root", "dapg100318","p_final");
                    // Coneccion a la base de datos
                    if (mysqli_connect_errno()) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    } else {
                        //Saco los datos de la tabla
                        $result = mysqli_query($con,"SELECT n_categoria FROM categoria;");
                        while($row = mysqli_fetch_array($result)) {
                          echo "<option value=\"".$row['n_categoria']."\">".$row['n_categoria']."</option>";
                        }
                    }
                  ?>
                  
                  </select>

              <!--  Termina dropdown   -->
            </div>
            
          </div>
          
          <div class="mb-3">
            <p class="mb-0">Descripión</p>
            <div class="form-group">
              <textarea class="form-control" id="textDescripcion" rows="5" name="descripcion"> <?php echo $descripcion; ?></textarea>
            </div>
          </div>
          
          <div class="row">
            
            <div class="col-sm-6 mb-3">
              <p class="mb-0">Precio</p>
              <div class="form-group">
                <input type="number" id="typeNumber" class="form-control" name="precio" value="<?php echo $precio; ?>"/>
                <label class="form-label" for="typeNumber"></label>
              </div>
            </div>
          
            <div class="col-sm-6 mb-3">
                <p class="mb-0">Cantidad en Almacen</p>
                <div class="form-group">
                  <input type="number" id="typeNumber" class="form-control" name="cantidad" value="<?php echo $cantidad; ?>"/>
                  <label class="form-label" for="typeNumber"></label>
                </div>
            </div>
            
          </div>
          
          <hr class="my-4" />
          
          <div class="float-end">
            <button type="submit" class="btn btn-success shadow-0 border">Submit</button>
          </div>
        </form>
        </div>
      </div>
    </section>
    <!-- Section: Main chart -->
  </div>
</main>

<!--Main layout-->
    <!-- MDB -->
    <script type="text/javascript" src="../js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="../js/script.js"></script>
</body>
<?php
    // Variables que contendrán un posible mensaje de error
    $nameErr = $catErr = $precioErr = $descErr = $cantErr ="";
    $flag = 0;
    // Variables que guardan el contenido de los campos del formulario
    $name = $category = $description = $price = $quantity = "";
    // Reviso si hay campos vacios
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Nombre necesario";
            $flag = 1;
        } else {
            $name = test_input($_POST["name"]);
        }
        if (empty($_POST["categoria"])) {
            $catErr = "Categoria necesaria";
            $flag = 1;
        } else {
            $category = test_input($_POST["categoria"]);
        }
        if (empty($_POST["descripcion"])) {
            $descErr = "Descripcion faltante";
            $flag = 1;
        } else {
            $description = test_input($_POST["descripcion"]);
        }
        if (empty($_POST["precio"])) {
            $precioErr = "Precio necesario";
            $flag = 1;
        } else {
            $price = test_input($_POST["precio"]);
        }
      	if (empty($_POST["cantidad"])) {
            $cantErr = "Cantidad necesaria";
            $flag = 1;
        } else {
            $quantity = test_input($_POST["cantidad"]);
        }
        if (empty($_POST["cantidad"])) {
          $cantErr = "Cantidad necesaria";
          $flag = 1;
         } else {
          $quantity = test_input($_POST["cantidad"]);
        }
        if ($flag == 0) {
            // Crear una conexión
            $con = mysqli_connect("localhost", "root", "dapg100318","p_final");
            // Coneccion a la base de datos
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            } else {
                //extrae datos del formulario
                $nombre = mysqli_real_escape_string($con,$name);
                $categoria = mysqli_real_escape_string($con,$category);
                $descripcion = mysqli_real_escape_string($con,$description);
                $precio = (float) $price;
                $cantidad = (int) $quantity;
                
                //la tabla existe, inserto los datos
                $sql = "UPDATE producto SET nombre='$nombre', descripcion='$descripcion', precio=$precio, c_almacen=$cantidad WHERE id_producto=$idprod;";
                if (mysqli_query($con,$sql)) {
                } else {
                echo "Error updating data: " . mysqli_error($con);
                }    
            }
        }
    }
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>
</html>
