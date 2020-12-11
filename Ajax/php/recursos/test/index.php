<?php 
//http://localhost/progressidea/Ajax/php/recursos/test/
session_start();
if (!isset($_SESSION["sesion"])) {
    header("location: ../../../../index.php");
}else if(($nivel = $_SESSION["sesion"]["nivel"])!=2){
    if($nivel == 1){
        header("location: ../../../../index.php");
    }else if($nivel == 3){
        header("location: ../../../../index.php");
    }
}
$sesion  = isset($_SESSION["sesion"]); 
 ?>
<head>
    <meta charset="utf-8">
    <script src="https://js.braintreegateway.com/web/dropin/1.25.0/js/dropin.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="../../../../librerias/bootstrap/css/bootstrap.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <script src="../../../../librerias/jQuery/js/jQuery.js"></script>
    <script src="../../../../librerias/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../../librerias/popper/js/popper.js"></script>
    <script src="../../../../librerias/FontAwesome/js/all.js"></script>
  </head>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="blog-header-logo text-dark" href="../../../../">Progress Idea</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mr-auto" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <?php if ($sesion) { ?>
                    <div class="dropdown">
                        <a class="dropdown-toggle dropdown-item" data-toggle="dropdown" href="#">
                            <span><i class="fa fa-user mr-2"> </i><?php echo $_SESSION["sesion"]["usuario"]?></span><b class="caret"></b>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="../../../../registro_login/login.php">Perfil</a>
                            <a class="dropdown-item" href="../../../../Ajax/php/cerrarsesion.php">Cerrar Sesion</a>
                        </div>
                    </div>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="btn btn-sm btn-outline-info" href="../../../../registro_login/registrar.php">Registrarme</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-sm btn-outline-info" href="../../../../registro_login/login.php">Iniciar Sesión</a>
                    </li>
                <?php } ?>

            </ul>
        </div>
    </nav>
  <body>

    <form id="payment-form" action="procesa.php" method="post">   
    <input type="hidden" id="nonce" name="payment_method_nonce"/>
    <input type="hidden" id="monto" name="monto">
    <input type="hidden" id="idProyecto" name="idProyecto">
    </form>
    <div class="container">
      <div class="row">
        <div class="col-6">
          <div class="card pt-10" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Atencion!!</h5>
              <h6 class="card-subtitle mb-2 text-muted">Patrocinar no es comprar.</h6>
              <p  style="text-align: justify;">
                Estás apoyando una actividad creativa ambiciosa.
                ProgressIdea no es una tienda. Tampoco garantiza los proyectos ni investiga la capacidad de los creadores de concretarlos.
                El creador es el único responsable de completar su proyecto según lo prometido y de responder ante cualquier reclamo.</p>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div id="dropin-container"></div>
          <button id="submit-button" class="btn btn-success btn-xs btn-block" >Pagar</button> <br>
          <p style="text-align: justify;" class="type-12 type-13-md dark-grey-500 mt3">Tu información de pago se procesa a través de Braintree. Para completar las transacciones, almacenamos el tipo de tarjeta, los últimos cuatro dígitos, el vencimiento y el nombre en la tarjeta. Al hacer tu contribución, aceptas los Términos de uso, la Política de privacidad y la Política de ProgressIdea. Nuestras políticas explican cómo usaremos y almacenaremos tus datos, y cómo puedes controlar dicho uso. Puedes editar tu configuración aquí.</p>
        </div>
      </div>
    </div>
    <script>
      var button = document.querySelector('#submit-button');
        
      braintree.dropin.create({
            authorization: 'sandbox_7bjrpyq2_s2f9gr23vxmrg2y8',
            container: '#dropin-container',
            locale: 'es_ES',
            venmo: true
        }, function (err, dropinInstance) {
            // Set up a handler to request a payment method and
            // submit the payment method nonce to your server
            //const form = document.getElementById('payment-form');
            //document.getElementById('nonce').value = payload.nonce;
            //form.submit();
           // console.log(dropinInstance);
           // console.log(err);
           button.addEventListener('click', function () {
            dropinInstance.requestPaymentMethod(function (requestPaymentMethodErr, payload) {
              // Submit payload.nonce to your server
              console.log(payload);
              const form = document.getElementById('payment-form');
              document.getElementById('nonce').value = payload.nonce;
              document.getElementById('monto').value = <?php echo $_POST['montoApoyo']?>;
              document.getElementById('idProyecto').value = <?php echo $_POST['idProyecto']?>;

              form.submit();
            });
          });

        });
    </script>
  </body>