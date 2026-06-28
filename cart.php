<?php
session_start();

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>My Cart</title>

<style>

body{
font-family:Poppins,sans-serif;
background:#f4f6f9;
padding:40px;
}

table{
width:100%;
background:white;
border-collapse:collapse;
box-shadow:0 8px 20px rgba(0,0,0,.1);
}

th,td{
padding:15px;
text-align:center;
border-bottom:1px solid #ddd;
}

th{
background:#2563eb;
color:white;
}

.checkout{
margin-top:20px;
display:inline-block;
padding:12px 25px;
background:#16a34a;
color:white;
text-decoration:none;
border-radius:8px;
}

</style>

</head>

<body>

<h1>🛒 My Shopping Cart</h1>

<table>

<tr>

<th>Book</th>

<th>Price</th>

</tr>

<?php

$total = 0;

foreach($_SESSION['cart'] as $book){

?>

<tr>

<td><?php echo $book['book_name']; ?></td>

<td>₹<?php echo $book['price']; ?></td>

</tr>

<?php

$total += $book['price'];

}

?>

<tr>

<th>Total</th>

<th>₹<?php echo $total; ?></th>

</tr>

</table>

<a href="#" class="checkout">

Proceed To Checkout

</a>

</body>
</html>