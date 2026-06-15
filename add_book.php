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
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Add Book</title>
</head>
<body>

<h2>Add New Book</h2>

<form method="POST">

<input
type="text"
name="book_name"
placeholder="Book Name"
required>

<br><br>

<input
type="text"
name="author"
placeholder="Author Name"
required>

<br><br>

<input
type="number"
step="0.01"
name="price"
placeholder="Price"
required>

<br><br>

<input
type="text"
name="category"
placeholder="Category"
required>

<br><br>

<textarea
name="description"
placeholder="Description">
</textarea>

<br><br>

<button
type="submit"
name="add">

Add Book

</button>

</form>

</body>
</html>