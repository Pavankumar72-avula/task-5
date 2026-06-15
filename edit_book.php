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
<html>
<head>
<title>Edit Book</title>
</head>
<body>

<h2>Edit Book</h2>

<form method="POST">

<input
type="text"
name="book_name"
value="<?php echo $book['book_name']; ?>"
required>

<br><br>

<input
type="text"
name="author"
value="<?php echo $book['author']; ?>"
required>

<br><br>

<input
type="number"
step="0.01"
name="price"
value="<?php echo $book['price']; ?>"
required>

<br><br>

<input
type="text"
name="category"
value="<?php echo $book['category']; ?>"
required>

<br><br>

<textarea
name="description"><?php echo $book['description']; ?></textarea>

<br><br>

<button
type="submit"
name="update">

Update Book

</button>

</form>

</body>
</html>