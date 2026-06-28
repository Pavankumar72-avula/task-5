<?php

session_start();

include "connect.php";

$id = $_GET['id'];

$result = mysqli_query($conn,
"SELECT * FROM books WHERE id='$id'");

$row = mysqli_fetch_assoc($result);

$_SESSION['cart'][] = $row;

header("Location: cart.php");

?>