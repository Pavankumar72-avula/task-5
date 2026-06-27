<?php

include "connect.php";

$id = $_GET['id'];

$result = mysqli_query(
$conn,
"SELECT * FROM books WHERE id=$id"
);

$book = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $book_name = $_POST['book_name'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    mysqli_query(
    $conn,
    "UPDATE books SET
    book_name='$book_name',
    author='$author',
    price='$price',
    category='$category',
    description='$description'
    WHERE id=$id"
    );

    header("Location: books.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Book</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{

    min-height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

    background:linear-gradient(135deg,#2563eb,#7c3aed);

}

.edit-card{

    width:600px;

    background:white;

    padding:35px;

    border-radius:20px;

    box-shadow:0 15px 35px rgba(0,0,0,0.25);

}

.title{

    text-align:center;

    color:#2563eb;

    font-size:32px;

    font-weight:700;

    margin-bottom:25px;

}

.input-group{

    margin-bottom:18px;

}

label{

    display:block;

    margin-bottom:8px;

    font-weight:600;

    color:#374151;

}

input,
textarea{

    width:100%;

    padding:14px;

    border:2px solid #e5e7eb;

    border-radius:10px;

    font-size:15px;

    transition:0.3s;

}

input:focus,
textarea:focus{

    outline:none;

    border-color:#2563eb;

    box-shadow:0 0 10px rgba(37,99,235,0.2);

}

textarea{

    resize:none;

    height:120px;

}

.btn{

    width:100%;

    padding:14px;

    border:none;

    border-radius:10px;

    background:#2563eb;

    color:white;

    font-size:16px;

    font-weight:600;

    cursor:pointer;

    transition:0.3s;

}

.btn:hover{

    background:#1d4ed8;

}

.back{

    display:block;

    text-align:center;

    margin-top:15px;

    text-decoration:none;

    color:#2563eb;

    font-weight:600;

}

.back:hover{

    text-decoration:underline;

}

</style>

</head>

<body>

<div class="edit-card">

<h1 class="title">
📚 Edit Book
</h1>

<form method="POST">

<div class="input-group">

<label>Book Name</label>

<input
type="text"
name="book_name"
value="<?php echo $book['book_name']; ?>"
required>

</div>

<div class="input-group">

<label>Author Name</label>

<input
type="text"
name="author"
value="<?php echo $book['author']; ?>"
required>

</div>

<div class="input-group">

<label>Price</label>

<input
type="number"
step="0.01"
name="price"
value="<?php echo $book['price']; ?>"
required>

</div>

<div class="input-group">

<label>Category</label>

<input
type="text"
name="category"
value="<?php echo $book['category']; ?>"
required>

</div>

<div class="input-group">

<label>Description</label>

<textarea
name="description"><?php echo $book['description']; ?></textarea>

</div>

<button
type="submit"
name="update"
class="btn">

Update Book

</button>

</form>

<a href="books.php" class="back">

← Back to Books

</a>

</div>

</body>
</html>