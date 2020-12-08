<?php 
    require 'braintree-php-5.4.0\lib\autoload.php';

    $gateway = new Braintree\Gateway([
        'environment' => 'sandbox',
        'merchantId' => 's2f9gr23vxmrg2y8',
        'publicKey' => 'kpxf8rh8fkx5hmpd',
        'privateKey' => '134829ee638e624072a91582ec5b309a'
      ]);
      

      $nonceFromTheClient = $_POST["payment_method_nonce"]; 
      $result = $gateway->transaction()->sale([
        'amount' => '1000.00',
        'paymentMethodNonce' => $nonceFromTheClient,
        'options' => [ 'submitForSettlement' => true ]
    ]);
    if ($result->success) {
      print_r("success!: " . $result->transaction->id);
    } else if ($result->transaction) {
        print_r("Error processing transaction:");
        print_r("\n  code: " . $result->transaction->processorResponseCode);
        print_r("\n  text: " . $result->transaction->processorResponseText);
    } else {
        print_r("Validation errors: \n");
        print_r($result->errors->deepAll());
    }
?>

