<?php

include "connect.php";

if(isset($_POST['add'])){

    $book_name = $_POST['book_name'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    mysqli_query(
    $conn,
    "INSERT INTO books
    (book_name,author,price,category,description)

    VALUES

    ('$book_name','$author','$price','$category','$description')"
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

<title>Add Book</title>

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

    background:linear-gradient(
    135deg,
    #2563eb,
    #7c3aed
    );

    padding:30px;
}

.book-card{

    width:650px;

    background:white;

    padding:40px;

    border-radius:25px;

    box-shadow:
    0 20px 40px rgba(0,0,0,0.25);

}

.title{

    text-align:center;

    color:#2563eb;

    font-size:34px;

    font-weight:700;

    margin-bottom:10px;
}

.subtitle{

    text-align:center;

    color:#6b7280;

    margin-bottom:30px;
}

.input-group{

    margin-bottom:20px;
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

    border-radius:12px;

    font-size:15px;

    transition:0.3s;
}

input:focus,
textarea:focus{

    outline:none;

    border-color:#2563eb;

    box-shadow:
    0 0 12px rgba(37,99,235,0.2);
}

textarea{

    resize:none;

    height:120px;
}

.btn{

    width:100%;

    padding:15px;

    border:none;

    border-radius:12px;

    background:#10b981;

    color:white;

    font-size:17px;

    font-weight:600;

    cursor:pointer;

    transition:0.3s;
}

.btn:hover{

    background:#059669;

    transform:translateY(-2px);
}

.back{

    display:block;

    text-align:center;

    margin-top:18px;

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

<div class="book-card">

<h1 class="title">
📚 Add New Book
</h1>

<p class="subtitle">
Add books to your bookstore collection
</p>

<form method="POST">

<div class="input-group">

<label>Book Name</label>

<input
type="text"
name="book_name"
placeholder="Enter Book Name"
required>

</div>

<div class="input-group">

<label>Author Name</label>

<input
type="text"
name="author"
placeholder="Enter Author Name"
required>

</div>

<div class="input-group">

<label>Price</label>

<input
type="number"
step="0.01"
name="price"
placeholder="Enter Price"
required>

</div>

<div class="input-group">

<label>Category</label>

<input
type="text"
name="category"
placeholder="Enter Category"
required>

</div>

<div class="input-group">

<label>Description</label>

<textarea
name="description"
placeholder="Write short description about the book">
</textarea>

</div>

<button
type="submit"
name="add"
class="btn">

➕ Add Book

</button>

</form>

<a href="books.php" class="back">

← Back to Books

</a>

</div>

</body>
</html>