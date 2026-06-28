<?php

include "connect.php";

if(!isset($_GET['id'])){
    header("Location: books.php");
    exit();
}

$id = $_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM books WHERE id='$id'");

if(mysqli_num_rows($result) == 0){
    echo "<h2>Book Not Found!</h2>";
    exit();
}

$book = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Book Details</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{

    background:#f3f4f6;

    display:flex;

    justify-content:center;

    align-items:center;

    min-height:100vh;

}

.card{

    width:700px;

    background:white;

    border-radius:15px;

    padding:35px;

    box-shadow:0 10px 25px rgba(0,0,0,.15);

}

.card h1{

    text-align:center;

    color:#2563eb;

    margin-bottom:25px;

}

.details{

    line-height:2;

    font-size:18px;

}

.details strong{

    color:#111827;

}

.price{

    color:#16a34a;

    font-size:22px;

    font-weight:bold;

}

.btn{

    display:inline-block;

    margin-top:25px;

    background:#2563eb;

    color:white;

    text-decoration:none;

    padding:12px 22px;

    border-radius:8px;

    font-weight:600;

}

.btn:hover{

    background:#1d4ed8;

}

</style>

</head>

<body>

<div class="card">

<h1>📚 Book Details</h1>

<div class="details">

<p><strong>Book Name:</strong> <?php echo $book['book_name']; ?></p>

<p><strong>Author:</strong> <?php echo $book['author']; ?></p>

<p><strong>Category:</strong> <?php echo $book['category']; ?></p>

<p><strong>Description:</strong> <?php echo $book['description']; ?></p>

<p class="price"><strong>Price:</strong> ₹<?php echo $book['price']; ?></p>

<?php
if(isset($book['created_at'])){
?>
<p><strong>Added On:</strong> <?php echo $book['created_at']; ?></p>
<?php
}
?>

<a href="books.php" class="btn">← Back to Books</a>

</div>

</div>

</body>

</html>