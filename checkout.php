<?php
session_start();
include "connect.php";

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

$total = 0;

foreach($_SESSION['cart'] as $book){
    $total += $book['price'];
}

if(isset($_POST['place_order'])){

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    foreach($_SESSION['cart'] as $book){

        mysqli_query($conn,"
        INSERT INTO orders
        (user_name,user_email,phone,address,book_name,price)

       VALUES
(
'$name',
'".$_SESSION['user_email']."',
'$phone',
'$address',
'".$book['book_name']."',
'".$book['price']."'
)
        ");
    }

    $_SESSION['cart']=[];

    header("Location: order_success.php");
    exit();

}
?>

<!DOCTYPE html>
<html>

<head>

<title>Checkout</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Poppins,sans-serif;
}

body{
background:#f4f6f9;
padding:40px;
}

.container{

max-width:700px;
margin:auto;
background:white;
padding:30px;
border-radius:15px;
box-shadow:0 10px 25px rgba(0,0,0,.1);

}

h1{

text-align:center;
margin-bottom:25px;
color:#2563eb;

}

input,textarea{

width:100%;
padding:12px;
margin-bottom:15px;
border:2px solid #ddd;
border-radius:8px;

}

button{

width:100%;
padding:14px;
background:#16a34a;
color:white;
border:none;
border-radius:8px;
font-size:18px;
cursor:pointer;

}

button:hover{

background:#15803d;

}

.total{

font-size:22px;
font-weight:bold;
color:#dc2626;
margin:20px 0;

}

</style>

</head>

<body>

<div class="container">

<h1>🛒 Checkout</h1>

<form method="POST">

<input
type="text"
name="name"
placeholder="Full Name"
required>

<input
type="text"
name="phone"
placeholder="Mobile Number"
required>

<textarea
name="address"
rows="4"
placeholder="Delivery Address"
required></textarea>

<div class="total">

Total Amount :
₹<?php echo $total; ?>

</div>

<button
type="submit"
name="place_order">

Place Order

</button>

</form>

</div>

</body>

</html>