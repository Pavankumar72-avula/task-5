<?php
session_start();
include "connect.php";

$cartCount = 0;

if(isset($_SESSION['cart'])){
    $cartCount = count($_SESSION['cart']);
}

$books = mysqli_query($conn,"SELECT * FROM books");

?>
<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Smart BookStore</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<link rel="stylesheet" href="book.css">

</head>

<body>
    <header class="header">

<div class="logo">

📚 Smart BookStore

</div>

<div class="header-buttons">

<a href="cart.php" class="cart-btn">

<i class="fa fa-shopping-cart"></i>

My Cart (<?php echo $cartCount; ?>)

</a>

<a href="dashboard.php" class="dashboard-btn">

🏠 Dashboard

</a>

</div>

</header>
<section class="hero">

<div>

<h1>

📖 Available Books

</h1>

<p>

Choose your favourite books and enjoy reading.

</p>

</div>

<div>

<input

type="text"

id="search"

placeholder="Search books, authors or categories...">

</div>

</section>
<div class="categories">

<button class="category active" data-category="All">
All Categories
</button>

<button class="category" data-category="Programming">
Programming
</button>

<button class="category" data-category="Web Development">
Web Development
</button>

<button class="category" data-category="Database">
Database
</button>

<button class="category" data-category="Networking">
Networking
</button>

<button class="category" data-category="Others">
Others
</button>

</div>


   <div class="book-container">

<?php while($row = mysqli_fetch_assoc($books)){ ?>

<div class="book-card">

    <div class="discount">
        20% OFF
    </div>

    <img
    src="images/<?php echo $row['image']; ?>"
    class="book-image"
    alt="<?php echo $row['book_name']; ?>">

    <h3>
        <?php echo $row['book_name']; ?>
    </h3>

    <p class="author">
        <?php echo $row['author']; ?>
    </p>

    <div class="rating">
        ★★★★★
    </div>

    <h2>
        ₹<?php echo $row['price']; ?>
    </h2>

    <p class="stock">
        ✔ In Stock
    </p>

    <div class="book-actions">

        <a
        href="add_to_cart.php?id=<?php echo $row['id']; ?>"
        class="cart-button">

        🛒 Add To Cart

        </a>

        <button class="wishlist">
            ❤
        </button>

    </div>

</div>

<?php } ?>

</div>

<div class="pagination">

<button>⬅ Previous</button>

<button class="active">1</button>

<button>2</button>

<button>3</button>

<button>Next ➜</button>

</div>
<footer>

<div class="footer">

<h2>

📚 Smart BookStore

</h2>

<p>

Your favourite destination for books.

</p>

<div class="social">

<a href="#">📘</a>

<a href="#">📸</a>

<a href="#">🐦</a>

<a href="#">💼</a>

</div>

<p>

© 2026 Smart BookStore

</p>

</div>

</footer>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
 <script src="books.js"></script> 
 <div id="toast">

✅ Book Added To Cart

</div>
</body>
</html>