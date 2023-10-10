<html lang="en">
     <head>
        <title>Remita Regular Invoice Processing Sample</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
        <style type="text/css">
           .button {background-color: #1CA78B;  border: none;  color: white;  padding: 15px 32px;  text-align: center;  text-decoration: none;  display: inline-block;  font-size: 16px;  margin: 4px 2px;  cursor: pointer;  border-radius: 4px;}
           input {  max-width: 30%;}

    .center-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        text-align: center;
    }

        </style>
     </head>
     <body>
        @if(Session::has('error_message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Error</strong> {{Session::get('error_message')}}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif
                    @if(Session::has('success_message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Success</strong> {{Session::get('success_message')}}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    @endif
                    <div class="center-container">
                        <div class="container mt-3">
        <div class='preserveHtml' class='preserveHtml' class="container mt-3">
           <h2 class='preserveHtml' class='preserveHtml' class='preserveHtml'>Invoice Processing</h2>
           <p class='preserveHtml' class='preserveHtml' class='preserveHtml'>Note:Make sure you print your remita payment slip</p>
           <form onsubmit="makePayment()" id="payment-form">
              <div class='preserveHtml' class='preserveHtml' class="form-floating mb-3 mt-3">
                 <input type="hidden" class="form-control" id="js-firstName" placeholder="Enter RRR" name="rrr" value="{{$RRR}}">
                 <label for="rrr">{{$RRR}}</label>
              </div>

              <input type="button" onclick="makePayment()" value="Submit" button class="button"/>
           </form>
        </div>
                        </div>
                    </div>
        <script type="text/javascript" src="https://remitademo.net/payment/v1/remita-pay-inline.bundle.js"></script>
     </body>

  </html>
 <script>
        function makePayment() {
          return new Promise((resolve, reject) => {
            var randomnumber = Math.floor(Math.random() * 1101233);
            var form = document.querySelector("#payment-form");
            var rrr = document.querySelector('input[name="rrr"]').value;


            var paymentEngine = RmPaymentEngine.init({
                key:"QzAwMDAyNzEyNTl8MTEwNjE4NjF8OWZjOWYwNmMyZDk3MDRhYWM3YThiOThlNTNjZTE3ZjYxOTY5NDdmZWE1YzU3NDc0ZjE2ZDZjNTg1YWYxNWY3NWM4ZjMzNzZhNjNhZWZlOWQwNmJhNTFkMjIxYTRiMjYzZDkzNGQ3NTUxNDIxYWNlOGY4ZWEyODY3ZjlhNGUwYTY=",
                processRrr: true,
                // transactionId: randomnumber,

                extendedData: {
                    customFields: [
                        {
                            name: "rrr",
                            value: rrr
                        }
                     ]
                },
                onSuccess: function (response) {
                    console.log('callback Successful Response', response);
                    sendPaymentResponse(response);
                    resolve(response);
                    sendPaymentResponse(response);
                },
                onError: function (response) {
                    console.log('callback Error Response', response);
                    sendPaymentResponse(response);
                    reject(response);
                },
                onClose: function () {
                    console.log("closed");
                    reject("Payment window closed.");
                }
            });
            paymentEngine.showPaymentWidget();
          });
        }
</script>
