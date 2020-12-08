<?php 
    require 'braintree-php-5.4.0\lib\autoload.php';

    $gateway = new Braintree\Gateway([
        'environment' => 'sandbox',
        'merchantId' => 's2f9gr23vxmrg2y8',
        'publicKey' => 'kpxf8rh8fkx5hmpd',
        'privateKey' => '134829ee638e624072a91582ec5b309a'
      ]);
      $result = $gateway->transaction()->sale([
        'amount' => '1000.00',
        'paymentMethodNonce' => 'nonceFromTheClient',
        'options' => [ 'submitForSettlement' => true ]
    ]);
?>

