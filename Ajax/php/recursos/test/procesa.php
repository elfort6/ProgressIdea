<?php 
    require '..\..\..\..\librerias\braintree-php-5.4.0\lib\autoload.php';
    require '../../conexion.php';
    session_start();
    $consulta = "SELECT* FROM usuario where usuario='" . $_SESSION["sesion"]["usuario"] . "'";
    $result = $conexion->query($consulta);
    $usu = $result->fetch_assoc();
    $usuaroAct = $usu["idUsuario"];
    $fechaActual = date("Y-m-d");  
    $gateway = new Braintree\Gateway([
        'environment' => 'sandbox',
        'merchantId' => 's2f9gr23vxmrg2y8',
        'publicKey' => 'kpxf8rh8fkx5hmpd',
        'privateKey' => '134829ee638e624072a91582ec5b309a'
      ]);
      $nonceFromTheClient = $_POST["payment_method_nonce"]; 
      $monto = $_POST['monto'];
      $id = $_POST['idProyecto'];
      $result = $gateway->transaction()->sale([
        'amount' => $monto,
        'paymentMethodNonce' => $nonceFromTheClient,
        'options' => [ 'submitForSettlement' => true ]
    ]);
    if ($result->success) {
      $idTrans=$result->transaction->id;
      $insertAporte = "INSERT INTO aportepatrocinador VALUES (NULL,'{$id}', '{$usuaroAct}', '{$monto}', '{$idTrans}', '{$fechaActual}')";
      $resulte = mysqli_query($conexion,$insertAporte) or die('<p>Error al registrar</p><br>'.mysqli_error($conexion));
      header("location: gracias.html");
    } else if ($result->transaction) {
        print_r("Error processing transaction:");
        print_r("\n  code: " . $result->transaction->processorResponseCode);
        print_r("\n  text: " . $result->transaction->processorResponseText);
    } else {
        print_r("Validation errors: \n");
        print_r($result->errors->deepAll());
    }
?>

