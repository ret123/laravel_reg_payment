  <!-- @if(!empty($data)) -->


<!-- <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
  var SITEURL = 'pay-success';
  //alert('SITEURL');
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 }
 }); 
 $('body').on('click', '.buy_now', function(e){
 var totalAmount = $('#grandtotal').val();
 // var totalAmount = $(this).attr("data-amount");
 //alert(totalAmount);
 var product_id =  $(this).attr("data-id");
 var options = {
 "key": "****************",
 "amount": (totalAmount*100), // 2000 paise = INR 20
 "name": "AddSpy",
 "description": "Payment",
 "image": "http://localhost:8000/frontend/images/addspy1.png",
 "handler": function (response){
        $.ajax({
        url: SITEURL,
        type: 'post',
        dataType: 'json',
        data: {
            "_token": $('#token').val(),
            razorpay_payment_id: response.razorpay_payment_id , 
            totalAmount : totalAmount ,product_id : product_id,
            user_id : $('#user_id').val(),
            name : $('#name').val(),
            email : $('#email').val(),
            package : $('#package').val(),
            months : $('#months').val(),
            price  : $("#price").val(),
            subtotal : $("#subtotal").val(),
            discount : $("#discount").val(),
            grandtotal : $("#grandtotal").val(),
            expiry_date : $('#expiry_date').val(),

        }, 
        success: function (msg) {
                window.location.href = 'thank-you';
        }
       });
       },
       "prefill": {
       "contact": '1234567890',
       "email":   'xxxxxxxxx@gmail.com',
       },
       "theme": {
       "color": "#528FF0"
       }
       };
       var rzp1 = new Razorpay(options);
       rzp1.open();
       e.preventDefault();
       });
    </script> -->


     <!-- <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="rzp_test_lo0bztfBJpZatE" data-amount="{{$data['amount']}}" data-currency="INR" data-order_id="{{$data['order_id']}}" data-buttontext="Register" data-buttonColor="blue" data-prefill.name="name" data-prefill.email=email data-description="Test transaction" data-theme.color="blue">
              </script> -->