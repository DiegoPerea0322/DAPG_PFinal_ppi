<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Registro</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="../css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="../css/style.css" />
</head>
<body style="padding-top:50px">
<header>
  <!-- Jumbotron -->
  <nav
       id="main-navbar"
       class="navbar navbar-expand-lg navbar-light bg-white fixed-top"
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
             />
      </a>
      <!-- Right links -->
      <ul class="navbar-nav ms-auto d-flex flex-row">
        <!-- Notification dropdown -->
        <div class="">
          <a href="login_signup.php" class="me-1 border rounded py-1 px-3 nav-link" target="_blank"> <i class="fas fa-user-alt me-2"></i>Sign in / Log in</a>
        </div>
      </ul>
    </div>
  </nav>

  <?php
    // Variables que contendrán un posible mensaje de error
    $mailErr = $passwordErr = $logErr = $nombreErr = $correoErr = $telErr = $contraErr = $contraCErr = $cardErr = $addErr = $fechaErr = "";
    $flag = $flag2 = 0;
    // Variables que guardan el contenido de los campos del formulario
    $mail = $password = $nombre = $correo = $telefono = $contra = $contraC = $card = $add = $fecha ="";
    if (isset($_POST['login']))  {
        //Inicio de sesion
        // Reviso si hay campos vacios
        if (empty($_POST["usermail"])) {
            $mailErr = "Correo necesario";
            $flag = 1;
        } else {
            $mail = test_input($_POST["usermail"]);
        }
        if (empty($_POST["userpass"])) {
            $passwordErr = "Contraseña necesaria";
            $flag = 1;
        } else {
            $password = test_input($_POST["userpass"]);
        }
        if ($flag == 0) {
            // Crear una conexión
            $con = mysqli_connect("localhost", "root", "dapg100318","p_final");
            // Coneccion a la base de datos
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            } else {
                //extrae datos del formulario
                $correo = mysqli_real_escape_string($con,$mail);
                $contra = mysqli_real_escape_string($con,$password);
                
                //el usuario y contraseña son correctos?
                $sql = "SELECT id_usuario, superuser FROM usuario WHERE usuario.correo='$correo' AND usuario.password='$contra';";
                if (mysqli_query($con,$sql)) {
                    $result = mysqli_query($con,$sql);
                    $row = mysqli_fetch_array($result);
                    $id = $row['id_usuario'];
                    session_start();
                    $_SESSION['id'] = $id;
                    $sql2 = "INSERT INTO carrito (id_usuario) VALUES ('$id');";
                    if (mysqli_query($con,$sql2)) {
                      $sql3 = "SELECT id_carrito FROM carrito WHERE id_usuario='$id';";
                      $result2 = mysqli_query($con,$sql3);
                      $row2 = mysqli_fetch_array($result2);
                      $_SESSION['id_carro']=$row2['id_carrito'];
                    } else {
                    echo "Error inserting data: " . mysqli_error($con);
                    }

                    if($row['superuser']==1){
                      header("Location: ./admin_home.php");
                    }else{
                      header("Location: ../homepage.php");
                    }
                } else {
                    $logErr="Usuario o contraseña incorrectos";
                }
            }
        }
    // Si se presiona el boton de registro
    //Dar de alta nuevo usuario    
    }else if(isset($_POST['signup'])){
      // Reviso si hay campos vacios
      if (empty($_POST["name"])) {
          $nombreErr = "Nombre faltante";
          $flag2 = 1;
      } else {
          $nombre = test_input($_POST["name"]);
      }
      if (empty($_POST["fnacimiento"])) {
        $fechaErr = "Fecha de nacimiento necesaria";
        $flag2 = 1;
      } else {
        $fecha = test_input($_POST["fnacimiento"]);
      }
      if (empty($_POST["email"])) {
          $correoErr = "Correo necesario";
          $flag2 = 1;
      } else {
          $correo = test_input($_POST["email"]);
      }
      if (empty($_POST["tel"])) {
          $telErr = "Correo necesario";
          $flag2 = 1;
      } else {
          $telefono = test_input($_POST["tel"]);
      }
      if (empty($_POST["password"])) {
          $contraErr = "Contraseña necesaria";
          $flag2 = 1;
      } else {
          $contra = test_input($_POST["password"]);
      }
      if (empty($_POST["passwordC"])) {
          $contraCErr = "Confirmacion de contraseña necesaria";
          $flag2 = 1;
      } else {
          $contraC = test_input($_POST["passwordC"]);
      }
      if (empty($_POST["card"])) {
          $cardErr = "Metodo de pago necesario";
          $flag2 = 1;
      } else {
          $card = test_input($_POST["card"]);
      }
      if (empty($_POST["direccion"])) {
          $addErr = "Direccion de envio necesaria";
          $flag2 = 1;
      } else {
          $add = test_input($_POST["direccion"]);
      }

      // Reviso si las contraseñas coinciden
      if ($contra != $contraC) {
          $contraCErr = "Las contraseñas no coinciden";
          $flag2 = 1;
      }

      if ($flag2 == 0) {
          // Crear una conexión
          $con = mysqli_connect("localhost", "root", "dapg100318","p_final");
          // Coneccion a la base de datos
          if (mysqli_connect_errno()) {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
          } else {

              //extrae datos del formulario
              $name = mysqli_real_escape_string($con,$nombre);
              $date = mysqli_real_escape_string($con,$fecha);
              $email = mysqli_real_escape_string($con,$correo);
              $tel = mysqli_real_escape_string($con,$telefono);
              $password = mysqli_real_escape_string($con,$contra);
              $tarjeta = mysqli_real_escape_string($con,$card);
              $address = mysqli_real_escape_string($con,$add);

              //el usuario y contraseña son correctos?
              $sql = "INSERT INTO usuario (nombre, f_nacimiento, correo, telefono, password, tarjeta, direccion) VALUES ('$name', '$date', '$email', '$tel', '$password', '$tarjeta', '$address');";
              if (mysqli_query($con,$sql)) {
                  $sql2 = "SELECT id_usuario FROM usuario WHERE correo='$email';";
                  $result = mysqli_query($con,$sql2);
                  $row = mysqli_fetch_array($result);
                  $id = (int) $row['id_usuario'];
                  $sql3 = "INSERT INTO historial (id_usuario) VALUES ('$id');";
                  if (mysqli_query($con,$sql3)) {
                  } else {
                    echo "Error inserting data: " . mysqli_error($con);
                  }
              } else {
                  $logErr="Error al crear usuario";
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

  <!-- Heading -->
  <div class="bg-primary">
    <div class="container py-4">
      <!-- Breadcrumb -->
      <nav class="d-flex">
        <h6 class="mb-0">
          <a href="" class="text-white-50">Home</a>
          <span class="text-white-50 mx-2"> > </span>
          <a href="" class="text-white-50">Creación de cuenta / Inicio de Sesion</a>
        </h6>
      </nav>
      <!-- Breadcrumb -->
    </div>
  </div>
  <!-- Heading -->
</header>

<section class="bg-light py-5">
  <div class="container">
    <div class="row">
      <div class="col-xl-6 col-lg-6 mb-4">
        <!-- Checkout -->
        <div class="card shadow-0 border">
          <div class="p-4">
            <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
            <h5 class="card-title mb-3">Registro</h5>
            <div class="row">
              
              <div class="col-12 mb-3">
                <p class="mb-0">Nombre Completo</p>
                <div class="form-group">
                  <input type="text" id="typeText" placeholder="Nombre" class="form-control" name="name" />
                  <span class="error"> <?php echo $nombreErr;?></span>
                </div>
              </div>

              <div class="col-12 mb-3">
              <p class="mb-0">Fecha de Nacimiento</p>
              <div class="md-form md-outline input-with-post-icon datepicker" id="inline-example" inline="true">
                <input placeholder="Select date" type="date" id="example" class="form-group" format="yyyy,mm,dd" name="fnacimiento">
                <span class="error"> <?php echo $fechaErr;?></span>
              </div>
              </div>

              <div class="col-6 mb-3">
                <p class="mb-0">Correo Electrónico</p>
                <div class="form-group">
                  <input type="email" id="typeEmail" placeholder="example@gmail.com" class="form-control" name="email"/>
                  <span class="error"> <?php echo $correoErr;?></span>
                </div>
              </div>
              
              <div class="col-6 mb-3">
                <p class="mb-0">Teléfono</p>
                <div class="form-group">
                  <input type="tel" id="typePhone" value="+52" class="form-control" name="tel"/>
                  <span class="error"> <?php echo $telErr;?></span>
                </div>
              </div>
              
              <div class="col-6 mb-3">
                <p class="mb-0">Contraseña</p>
                <div class="form-group">
                  <input type="password" id="password" value="" class="form-control" name="password"/>
                  <span class="error"> <?php echo $contraErr;?></span>
                </div>
              </div>
              
              <div class="col-6 mb-3">
                <p class="mb-0">Confirmar contraseña</p>
                <div class="form-group">
                  <input type="password" id="passwordC" value="" class="form-control" name="passwordC"/>
                  <span class="error"> <?php echo $contraCErr;?></span>
                </div>
              </div>

            </div>

            <hr class="my-4" />
            
            <h5 class="card-title mb-3">Método de pago</h5>
            
            <div class="col-12 mb-3">
                <p class="mb-0">Número de Tarjeta</p>
                <div class="form-group">
                  <input type="text" id="typeText" placeholder="Tarjeta" class="form-control" name="card"/>
                  <span class="error"> <?php echo $cardErr;?></span>
                </div>
              </div>
            
            <hr class="my-4" />
						
            <h5 class="card-title mb-3">Datos de envío</h5>


            <div class="row">
              <div class="mb-3">
                <p class="mb-0">Dirección</p>
                <div class="form-group">
                  <textarea class="form-control" id="textAreaExample1" rows="2" name="direccion"></textarea>
                  <span class="error"> <?php echo $addErr;?></span>
                </div>
            	</div>

            <div class="float-end">
              <button class="btn btn-success shadow-0 border" name="signup">Enviar</button>
            </div>
          </div>
          </form>
        </div>
        <!-- Checkout -->
      </div>
      </div>
			<!--    Registro    -->
      <div class="col-xl-6 col-lg-6 mb-4">
         <div class="card shadow-0 border">
           <div class="p-4">
           <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
              <h5 class="card-title mb-3">Inicia Sesión</h5>
              <div class="row">
              <span class="error"> <?php echo $logErr;?></span>
                <div class="col-12 mb-3">
                	<p class="mb-0">Correo</p>
                	<div class="form-group">
                  	<input type="text" id="typeText" placeholder="Correo" class="form-control" name="usermail" />
                    <span class="error"> <?php echo $mailErr;?></span>
                	</div>
              	</div>
                
                <div class="col-12 mb-3">
                <p class="mb-0">Contraseña</p>
                <div class="form-group">
                  <input type="password" id="password" value="" class="form-control" name="userpass"/>
                  <span class="error"> <?php echo $passwordErr;?></span>
                </div>
              </div>
                
              <div class="float-end">
              	<button type="submit" class="btn btn-success shadow-0 border" name="login">Enviar</button>
            	</div>
              <span class="error"> <?php echo $logErr;?></span>
             	</div>
            </form>
            </div>
         </div>
       </div>
      
    </div>
  </div>
</section>

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

</body>
</html>