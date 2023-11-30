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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet"
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
           href="./admin_home.php"
           class="list-group-item list-group-item-action py-2 ripple"
           aria-current="true"
           >
          <i class="fas fa-tachometer-alt fa-fw me-3"></i
            ><span>Panel de control</span>
        </a>
        <a
           href="./prod_upload.php"
           class="list-group-item list-group-item-action py-2 ripple"
           ><i class="fas fa-circle-plus fa-fw me-3"></i><span>Agregar producto</span></a>
        <a
           href="./s_mod.php"
           class="list-group-item list-group-item-action py-2 ripple active"
           ><i class="fas fa-pen-to-square fa-fw me-3"></i><span>Modificar Productos</span></a
          >
        <a
           href="elimina.php"
           class="list-group-item list-group-item-action py-2 ripple "
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

<!--Main layout-->
<main style="margin-top: 58px">
  <div class="container pt-4">
    <!-- Section: Resumen de Inventario -->
    <section class="mb-4">
      <div class="card shadow-0 border">
        <div class="card-body">
        <h5 class="card-title mb-3">Selecciona Producto a Modificar</h5>
        <form role="form" method="post" action="<?php $_SERVER["PHP_SELF"];?>">
        <?php

            $con = mysqli_connect("localhost", "root", "dapg100318","p_final");
            // Coneccion a la base de datos
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            } else {
                //Saco los datos de la tabla
                $result = mysqli_query($con,"SELECT fotos.filename, producto.nombre, producto.descripcion, CONCAT('$', FORMAT(producto.precio, 2)) AS precio, producto.id_producto, categoria.n_categoria FROM producto, fotos, categoria WHERE fotos.caratula=1 AND fotos.id_producto=producto.id_producto AND producto.id_categoria=categoria.id_categoria;");
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
                            <div class=\"col-xl-4 col-md-3 col-sm-5\">";
                    echo "<h5>" . $row['nombre'] . "</h5>";
                    echo "<p class=\"text mb-4 mb-md-0\">" . $row['descripcion'] . "</p><br>";
                    echo "<p class=\"text mb-4 mb-md-0\">Categoria: " . $row['n_categoria'] . "</p>";
                    echo "</div>
                            <div class=\"col-xl-3 col-md-3 col-sm-5\">
                            <div class=\"d-flex flex-row align-items-center mb-1\" style=\"padding-left:70px\">
                                <h4 class=\"mb-1 me-1\"> " . $row['precio'] . "</h4>
                            </div>
                            </div>
                            <div class=\"col-xl-2 col-md-2 col-sm-2\">
                                <input type=\"radio\" name=\"selectedValue\" value=\"" .$row['id_producto']. "\"> Modifica producto
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
              	<button type="submit" class="btn btn-success shadow-0 border" name="mod">Modifica producto seleccionado</button>
            	</div>            

        </form>
        </div>
      </div>
    </section>
  </div>

  <?php

if (isset($_POST['mod']))  {
    // Check if the checkbox values are set in the POST request
    if (isset($_POST["selectedValue"])) {
        // Retrieve the selected checkbox values
        $selectedValue = $_POST["selectedValue"];
        $_SESSION['mod_idprod'] = (int) $selectedValue;
        echo "<a class=\"btn btn-link px-3 me-2\"  href=\"./modifica.php\">Siguiente</a>";
        
    } else {
        // No checkboxes were selected
        echo "No checkboxes selected.";
    }
}
?>

</main>
<!--Main layout-->
    <!-- MDB -->
    <script type="text/javascript" src="../js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="../js/script.js"></script>
</body>
<?php

?>
</html>
