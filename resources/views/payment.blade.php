<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body onload="javascript:openPayment()">
    
</body>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    function openPayment() {
        var amount = "{{$data['amount']}}";
        var orderID = "{{$data['order_id']}}";
      
        var email = "{{$data['email']}}";
        var password = "{{$data['password']}}";  
        var name = "{{$data['name']}}";  

       
       
        var options = {
    "key": "rzp_test_lo0bztfBJpZatE", // Enter the Key ID generated from the Dashboard
    "amount": amount, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Acme Corp", //your business name
    "description": "Test Transaction",
    "image": "https://example.com/your_logo",
    "order_id": orderID, //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "callback_url": "{{route('success')}}",
    "prefill": {
        "name": name, //your customer's name
        "email": email,
        "contact": "9000090000"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);

    rzp1.open();
    e.preventDefault();

    }
</script>
</html>