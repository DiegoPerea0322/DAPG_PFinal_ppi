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
           class="list-group-item list-group-item-action py-2 ripple active"
           target="_self"
           ><i class="fas fa-circle-plus fa-fw me-3"></i><span>Agregar producto</span></a>
        <a
           href="./s_mod.php"
           class="list-group-item list-group-item-action py-2 ripple"
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

<!--Main layout-->
<main style="margin-top: 58px">
  <div class="container pt-4">
    <!-- Section: Main chart -->
    <section class="mb-4">
      <div class="card shadow-0 border">
        <div class="card-body">
        <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
          <h5 class="card-title mb-3">Añadir producto</h5>
          <div class="row">
            <div class="col-12 mb-3">
              <p class="mb-0">Nombre del producto</p>
              <div class="form-group">
                <input type="text" id="typeText" placeholder="Type here" class="form-control" name="name"/>
              </div>
            </div>

            <div class="col-6 mb-3">
              <p class="mb-0">Categoria</p>
                  <select class="form-select" id="categoria" name="categoria">
                  
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
              <textarea class="form-control" id="textDescripcion" rows="5" name="descripcion"></textarea>
            </div>
          </div>
          
          <div class="row">
            
            <div class="col-sm-6 mb-3">
              <p class="mb-0">Precio</p>
              <div class="form-group">
                <input type="number" id="typeNumber" class="form-control" name="precio"/>
                <label class="form-label" for="typeNumber"></label>
              </div>
            </div>
          
            <div class="col-sm-6 mb-3">
                <p class="mb-0">Cantidad en Almacen</p>
                <div class="form-group">
                  <input type="number" id="typeNumber" class="form-control" name="cantidad" />
                  <label class="form-label" for="typeNumber"></label>
                </div>
            </div>
            
          </div>
          
          
          <hr class="my-4" />

          <h5 class="card-title mb-3">Agrega Imagenes</h5>
          
          <div class="mb-3">
            <label for="formFileLg" class="form-label">Caratula</label>
            <input class="form-control form-control-lg" id="fileToUpload" type="file" name="fileToUpload"/>
          </div>
          
          <!-- <div class="mb-3">
            <label for="formFileMultiple" class="form-label">Imagenes extra</label>
            <input class="form-control" type="file" name="imagenes" id="formFileMultiple" multiple />
          </div> -->
          
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
                $sql = "INSERT INTO producto (nombre, descripcion, precio, c_almacen, id_categoria) SELECT '$nombre', '$descripcion', $precio, $cantidad, id_categoria FROM categoria WHERE n_categoria='$categoria';";
                if (mysqli_query($con,$sql)) {
                } else {
                echo "Error inserting data: " . mysqli_error($con);
                }
                
                // Subida de Imagen

                $target_dir = "../img/";
                $newFileName = date('dmYHis') . str_replace(" ", "", basename($_FILES["fileToUpload"]["name"]));
                $target_file = $target_dir . $newFileName;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                
                
                // Check if image file is a actual image or fake image
                if (isset($_POST["submit"])) {
                  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                  if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . "." . "<br>";
                    $uploadOk = 1;
                  } else {
                    echo "File is not an image." . "<br>";
                    $uploadOk = 0;
                  }
                }

                // Check file size e.g. limit to 1000kb
                if ($_FILES["fileToUpload"]["size"] > 1000000) {
                  echo "Sorry, your file is too large." . "<br>";
                  $uploadOk = 0;
                }
                
                // Allow certain file formats
                if (
                  $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                  && $imageFileType != "gif"
                ) {
                  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed." . "<br>";
                  $uploadOk = 0;
                }
                
                function insertIntoDatabase($fileName)
                {

                  // Create connection
                  $conn = new mysqli("localhost", "root", "dapg100318","p_final");
                  $name = test_input($_POST["name"]);
                  $nombre = mysqli_real_escape_string($conn,$name);
                  $stmt = $conn->prepare("INSERT INTO fotos (filename, caratula, id_producto) SELECT ?, 1, id_producto FROM producto WHERE producto.nombre='$nombre'");
                  $stmt->bind_param("s", $imageName);
                  $imageName = $fileName;
                  $stmt->execute();
                
                  $stmt->close();
                  $conn->close();
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                  echo "Sorry, your file was not uploaded." . "<br>";
                  // if everything is ok, try to upload file
                } else {
                  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    insertIntoDatabase($newFileName);
                  } else {
                    echo "Sorry, there was an error uploading your file." . "<br>";
                  }
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
