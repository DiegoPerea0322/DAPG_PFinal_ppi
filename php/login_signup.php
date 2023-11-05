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
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<header>
  <!-- Jumbotron -->
  <div class="p-3 text-center bg-white border-bottom">
    <div class="container">
      <div class="d-flex justify-content-between">
        <!-- Left elements -->
        <div class="">
          <a href="https://mdbootstrap.com/" target="_blank" class="">
            <img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png" height="35" />
          </a>
        </div>
        <!-- Left elements -->

        <!-- right elements -->
        <div class="">
          <a href="https://github.com/mdbootstrap/bootstrap-material-design" class="me-1 border rounded py-1 px-3 nav-link" target="_blank"> <i class="fas fa-user-alt me-2"></i>Sign in </a>
        </div>
        <!-- right elements -->
      </div>
    </div>
  </div>
  <!-- Jumbotron -->

  <!-- Heading -->
  <div class="bg-primary">
    <div class="container py-4">
      <!-- Breadcrumb -->
      <nav class="d-flex">
        <h6 class="mb-0">
          <a href="" class="text-white-50">Home</a>
          <span class="text-white-50 mx-2"> > </span>
          <a href="" class="text-white-50">Creación de cuenta</a>
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
</body>
</html>