<head>
    <meta charset="utf-8">
    <script src="https://js.braintreegateway.com/web/dropin/1.25.0/js/dropin.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="../../../../librerias/bootstrap/css/bootstrap.min.css"/>
    <script src="../../../../librerias/jQuery/js/jQuery.js"></script>
    <script src="../../../../librerias/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../../librerias/popper/js/popper.js"></script>
    <script src="../../../../librerias/FontAwesome/js/all.js"></script>
  </head>

  <body>
    <form id="payment-form" action="procesa.php" method="post">   
    <input type="hidden" id="nonce" name="payment_method_nonce"/>
    </form>
    <div class="container">
      <div class="row">
        <div class="col-6">
          <div class="card pt-10" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div id="dropin-container"></div>
          <button id="submit-button" class="btn btn-success ">Pagar</button>
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
              form.submit();
            });
          });

        });
    </script>
  </body>