<?php session_start();
include("./functions/userfunctions.php");
include("./includes/header.php");
include("authenticate.php");
?>


<div class="py-5">
    <div class="container">
        <form action="functions/placeorder.php" method="POST">
            <div class="row">
                <div class="col-md-7">
                    <h5>Basic Details</h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class=" fw-semibold">Name</label>
                            <input type="text"  name="name" id="name" placeholder="Enter Your Fullname" class="form-control ">
                            <small class="text-danger name"></small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class=" fw-semibold">Email</label>
                            <input type="email"  name="email" id="email" placeholder="Enter Your Email" class="form-control">
                            <small class="text-danger name email"></small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class=" fw-semibold">Phone</label>
                            <input type="text"  name="phone" id="phone" maxlength="10" placeholder="Enter Your Phone" class="form-control">
                            <small class="text-danger name phone"></small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class=" fw-semibold">Pincode</label>
                            <input type="text" name="pin" id="pin" placeholder="Pincode" class="form-control">
                            <small class="text-danger name pin"></small>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class=" fw-semibold">Address</label>
                            <textarea name="address" id="address"  rows="2" class="form-control"></textarea>
                            <small class="text-danger name address"></small>
                        </div>

                    </div>
                </div>

                <div class="col-md-5">
                    <h5>Order Details</h5>
                    <hr>


                    <?php $items = getCartItems();
                    $total = 0;
                    foreach ($items as $citem) {
                    ?>
                        <div class=" mb-1 border">

                            <div class="row align-items-center">
                                <div class="col-md-2 py-4" style="padding-left:20px">
                                    <img src="uploads/<?= $citem['image'] ?>" alt="Image" width="60px">
                                </div>
                                <div class="col-md-5">
                                    <label><?= $citem['name'] ?></label>
                                </div>
                                <div class="col-md-3">
                                    <label><?= $citem['selling_price'] ?></label>
                                </div>
                                <div class="col-md-2">
                                    <label>x<?= $citem['prod_qty'] ?></label>
                                </div>

                            </div>
                        </div>
                    <?php
                        $total += $citem['selling_price'] * $citem['prod_qty'];
                    }

                    ?>
                    <hr>
                    <h5>Total Price-<span class="float-end"><?= $total ?></span></h5>
                    <div class="payment">
                        <input type="hidden" name="payment_mode" value="COD">
                        <button type="submit" name="placeOrder" class="btn  btn-primary float-end mb-3 w-100">Confirm and Place Order | COD </button>
                        <div id="paypal-button-container"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

</div>
</div>
</div>




<?php include("./includes/footer.php"); ?>
    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=AZEOMqin66vEEKKhvKebinAr_LDHA32fi4asmQkxKuDjLoGR127K7n8VBdjc6wHH17LMQzEWW2XdP656&currency=USD"></script>
    <script>
    
      paypal.Buttons({
        
        onClick(){
            var name=$('#name').val();
            var email=$('#email').val();
            var phone=$('#phone').val();
            var pin=$('#pin').val();
            var address=$('#address').val();
            if(name.length == 0)
            {
                $('.name').text("*This field id required");
            }
            else{
                $('name').text("");
            }
            if(email.length == 0)
            {
                $('.email').text("*This field id required");
            } else{
                $('email').text("");
            }
            if(phone.length == 0)
            {
                $('.phone').text("*This field id required");
            } else{
                $('phone').text("");
            }
            if(pin.length == 0)
            {
                $('.pin').text("*This field id required");
            } else{
                $('pin').text("");
            }
            if(address.length == 0)
            {
                $('.address').text("*This field id required"); 
            } else{
                $('address').text("");
            }
            if(name.length ==0 || email.length==0 || phone.length==0 || pin.length==0 || address.length==0)
            {
                return false;
            }
        },
        // Order is created on the server and the order id is returned
        createOrder: (data, actions) => {
  return actions.order.create({
    purchase_units: [{
      amount: {
        currency_code: "USD", // Update currency code to INR
        value: '10'
      }
    }]
  });
        },
        // Finalize the transaction on the server after payer approval
        onApprove:(data,actions)=> {
          return actions.order.capture().then(function(orderData){
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  window.location.href = 'thank_you.html';
          });
        }
      }).render('#paypal-button-container');
    </script>
    <script>
    document.title="Checkout";
</script>