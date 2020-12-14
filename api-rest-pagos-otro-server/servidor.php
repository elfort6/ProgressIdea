<?php
include 'brain/lib/autoload.php';
$gateway = new Braintree\Gateway([
    'environment' => 'sandbox',
    'merchantId' => 's2f9gr23vxmrg2y8',
    'publicKey' => 'kpxf8rh8fkx5hmpd',
    'privateKey' => '134829ee638e624072a91582ec5b309a'
  ]);
      $nonceFromTheClient = $_GET["nonce"]; 
      $monto = $_GET['monto'];
      $id = $_GET['idp'];
      $result = $gateway->transaction()->sale([
        'amount' => $monto,
        'paymentMethodNonce' => $nonceFromTheClient,
        'options' => [ 'submitForSettlement' => true ]
    ]);
    if ($result->success) {
        $idTrans=$result->transaction->id;
        /// $insertAporte = "INSERT INTO aportepatrocinador VALUES (NULL,'{$id}', '{$usuaroAct}', '{$monto}', '{$idTrans}', '{$fechaActual}')";
        ///$resulte = mysqli_query($conexion,$insertAporte) or die('<p>Error al registrar</p><br>'.mysqli_error($conexion));
        header("location: https://progressidea.tk/api-rest-pagos-otro-server\cliente.php?idt=".$idTrans."&idp=".$id ."");
      } else if ($result->transaction) {
          print_r("Error processing transaction:");
          print_r("\n  code: " . $result->transaction->processorResponseCode);
          print_r("\n  text: " . $result->transaction->processorResponseText);
      } else {
          print_r("Validation errors: \n");
          print_r($result->errors->deepAll());
      }
?>