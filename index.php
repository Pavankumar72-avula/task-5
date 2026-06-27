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

<img src="book.jpg" alt="BookStore">

</div>

</section>
<!-- ================= FEATURED BOOKS ================= -->

<section class="featured-books">

<h2>Featured Books</h2>

<p>Explore our latest collection</p>

<div class="book-container">

<?php

$result = mysqli_query($conn,"SELECT * FROM books LIMIT 4");

while($row = mysqli_fetch_assoc($result)){

?>

<div class="book-card">

<img src="images/book.jpg" alt="Book">

<h3><?php echo $row['book_name']; ?></h3>

<p><strong>Author:</strong> <?php echo $row['author']; ?></p>

<p class="price">₹<?php echo $row['price']; ?></p>

<p><?php echo $row['category']; ?></p>

<a href="books.php" class="view-btn">
View Details
</a>

</div>

<?php

}

?>

</div>

</section>
<!-- ================= FEATURED BOOKS ================= -->

<section class="featured-books">

<h2>Featured Books</h2>

<p>Explore our latest collection</p>

<div class="book-container">

<?php

$result = mysqli_query($conn,"SELECT * FROM books LIMIT 4");

while($row = mysqli_fetch_assoc($result)){

?>

<div class="book-card">

<img src="book.jp" alt="Book">

<h3><?php echo $row['book_name']; ?></h3>

<p><strong>Author:</strong> <?php echo $row['author']; ?></p>

<p class="price">₹<?php echo $row['price']; ?></p>

<p><?php echo $row['category']; ?></p>

<a href="books.php" class="view-btn">
View Details
</a>

</div>

<?php

}

?>

</div>

</section>
<!-- ================= CATEGORIES ================= -->

<section class="categories">

<h2>Book Categories</h2>

<div class="category-container">

<div class="category-card">
💻
<h3>Programming</h3>
</div>

<div class="category-card">
📖
<h3>Novel</h3>
</div>

<div class="category-card">
🧪
<h3>Science</h3>
</div>

<div class="category-card">
🏛
<h3>History</h3>
</div>

<div class="category-card">
👤
<h3>Biography</h3>
</div>

<div class="category-card">
📚
<h3>Education</h3>
</div>

</div>

</section>
<!-- ================= WHY CHOOSE US ================= -->

<section class="why">

<h2>Why Choose Our BookStore?</h2>

<div class="why-container">

<div class="why-card">

📚

<h3>Huge Collection</h3>

<p>

Thousands of books from every category.

</p>

</div>

<div class="why-card">

🔒

<h3>Secure Login</h3>

<p>

Safe and secure authentication system.

</p>

</div>

<div class="why-card">

⚡

<h3>Fast Search</h3>

<p>

Find your favourite books instantly.

</p>

</div>

<div class="why-card">

📱

<h3>Responsive Design</h3>

<p>

Works perfectly on mobile and desktop.

</p>

</div>

</div>

</section>

<link rel="stylesheet" href="style.css">
<script src="js/script.js"></script>

</body>

</html>