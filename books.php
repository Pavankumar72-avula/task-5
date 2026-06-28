<?php
include "connect.php";

$search = "";

if(isset($_GET['search'])){
    $search = mysqli_real_escape_string($conn,$_GET['search']);
}

$sql = "SELECT * FROM books
WHERE
book_name LIKE '%$search%'
OR author LIKE '%$search%'
OR category LIKE '%$search%'
ORDER BY id DESC";

$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Smart BookStore</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="books.css">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:#f4f6f9;
}

.container{
width:95%;
max-width:1400px;
margin:40px auto;
}

.header{

display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:35px;

}

.logo{

font-size:38px;
font-weight:bold;
color:#2563eb;

}

.right-buttons{

display:flex;
gap:15px;

}

.dashboard-btn,
.cart-btn{

padding:12px 25px;
text-decoration:none;
color:white;
border-radius:10px;
font-weight:600;

}

.dashboard-btn{

background:#2563eb;

}

.cart-btn{

background:#16a34a;

}

.search-box{

display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:35px;

}

.search-box h2{

font-size:34px;
color:#111827;

}

.search-box form{

display:flex;
gap:10px;

}

.search-box input{

width:350px;
padding:12px;
border:2px solid #2563eb;
border-radius:8px;
font-size:16px;

}

.search-box button{

padding:12px 20px;
background:#2563eb;
color:white;
border:none;
border-radius:8px;
cursor:pointer;
font-weight:bold;

}

.search-box button:hover{

background:#1d4ed8;

}
.discount{

position:absolute;
background:#ef4444;
color:white;
padding:8px 15px;
border-radius:0 0 10px 0;
font-weight:bold;

}

.book-card{

position:relative;

}

</style>

</head>

<body>

<div class="container">

<div class="header">

<div class="logo">

📚 Smart BookStore

</div>

<div class="right-buttons">

<a href="cart.php" class="cart-btn">

🛒 My Cart

</a>

<a href="dashboard.php" class="dashboard-btn">

🏠 Dashboard

</a>

</div>

</div>

<div class="search-box">

<h2>Available Books</h2>

<form method="GET">

<input
type="text"
name="search"
placeholder="Search Books..."
value="<?php echo $search; ?>">

<button>

🔍 Search

</button>

</form>

</div>
<div class="book-container">

<?php

if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){

?>

<div class="book-card">

<div class="book-image">
<div class="discount">

20% OFF

</div>
<?php

if(!empty($row['image'])){

?>

<img src="<?php echo $row['image']; ?>" alt="Book">

<?php

}else{

?>

<img src="images/book.png" alt="Book">

<?php

}

?>

</div>

<div class="book-details">

<h3>

<?php echo $row['book_name']; ?>

</h3>

<p class="author">

✍ Author :
<b><?php echo $row['author']; ?></b>

</p>

<p class="category">

📂 <?php echo $row['category']; ?>

</p>

<p class="description">

<?php echo $row['description']; ?>

</p>

<h2 class="price">

₹<?php echo $row['price']; ?>
<p style="color:#16a34a;font-weight:bold;">

🚚 Free Delivery

</p>

</h2>

<div class="rating">

⭐⭐⭐⭐⭐

</div>

<div class="buttons">

<a
href="add_to_cart.php?id=<?php echo $row['id']; ?>"
class="buy-btn">

🛒 Add To Cart

</a>

<a href="#" class="wishlist-btn">

❤ Wishlist

</a>

</div>

</div>

</div>

<?php

}

}else{

?>

<h2 style="text-align:center;color:#555;">

No Books Found

</h2>

<?php

}

?>

</div>
</div>

</body>

</html>