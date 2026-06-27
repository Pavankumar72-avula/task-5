<?php
include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Smart BookStore</title>

<link rel="stylesheet" href="css/style.css">

<link
href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
rel="stylesheet">

<link
rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>

<!-- ================= NAVBAR ================= -->

<header>

<nav class="navbar">

<div class="logo">

<i class="fas fa-book-open"></i>

<span>Smart BookStore</span>

</div>

<ul class="nav-links">

<li><a href="index.php">Home</a></li>

<li><a href="books.php">Books</a></li>

<li><a href="about.php">About</a></li>

<li><a href="contact.php">Contact</a></li>

</ul>

<div class="nav-buttons">

<a href="login.php" class="login-btn">

Login

</a>

<a href="register.php" class="register-btn">

Register

</a>

</div>

</nav>

</header>

<!-- ================= HERO ================= -->

<section class="hero">

<div class="hero-content">

<h1>

Welcome to

<span>Smart BookStore</span>

</h1>

<p>

Discover thousands of books from different categories.
Read, Learn and Grow with us.

</p>

<div class="hero-buttons">

<a href="books.php" class="browse-btn">

Browse Books

</a>

<a href="login.php" class="hero-login">

Login

</a>

</div>

</div>

<div class="hero-image">

<img src="images/hero.jpg" alt="BookStore">

</div>

</section>

<script src="js/script.js"></script>

</body>

</html>