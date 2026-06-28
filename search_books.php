<?php

include "connect.php";

$search = "";

$category = "All";

if(isset($_POST['search'])){
    $search = $_POST['search'];
}

if(isset($_POST['category'])){
    $category = $_POST['category'];
}

$sql = "SELECT * FROM books WHERE
book_name LIKE '%$search%'
OR author LIKE '%$search%'
OR category LIKE '%$search%'";

if($category!="All"){
    $sql .= " AND category='$category'";
}

$result = mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){

?>

<div class="book-card">

<div class="discount">

20% OFF

</div>

<img
src="images/books/<?php echo $row['image'];?>"
class="book-image">

<h3>

<?php echo $row['book_name'];?>

</h3>

<p class="author">

<?php echo $row['author'];?>

</p>

<div class="rating">

★★★★★

</div>

<h2>

₹<?php echo $row['price'];?>

</h2>

<p class="stock">

✔ In Stock

</p>

<a
href="add_to_cart.php?id=<?php echo $row['id'];?>"
class="cart-button">

🛒 Add To Cart

</a>

</div>

<?php

}
?>