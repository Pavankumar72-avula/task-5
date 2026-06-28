<?php
session_start();
include "connect.php";
$email = $_SESSION['user_email'];

$result = mysqli_query(
$conn,
"SELECT * FROM orders
WHERE user_email='$email'
ORDER BY id DESC"
);

?>

<!DOCTYPE html>

<html>

<head>

<title>My Orders</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<style>

body{

font-family:Poppins,sans-serif;
background:#f4f6f9;
padding:40px;

}

table{

width:100%;
border-collapse:collapse;
background:white;
box-shadow:0 10px 25px rgba(0,0,0,.1);

}

th{

background:#2563eb;
color:white;
padding:15px;

}

td{

padding:15px;
text-align:center;
border-bottom:1px solid #ddd;

}

h1{

margin-bottom:20px;
color:#2563eb;

}

</style>

</head>

<body>

<h1>

📦 My Orders

</h1>

<p>

Welcome,

<b>

<?php echo $_SESSION['user_name']; ?>

</b>

</p>

<br>
<a href="books.php"
style="
background:#2563eb;
color:white;
padding:12px 20px;
text-decoration:none;
border-radius:8px;
display:inline-block;
margin-bottom:20px;
">

📚 Continue Shopping

</a>

<table>

<tr>

<th>ID</th>

<th>Customer</th>

<th>Book</th>

<th>Price</th>

<th>Date</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['user_name']; ?></td>

<td><?php echo $row['book_name']; ?></td>

<td>₹<?php echo $row['price']; ?></td>

<td><?php echo $row['order_date']; ?></td>

</tr>

<?php

}

?>

</table>

</body>

</html>