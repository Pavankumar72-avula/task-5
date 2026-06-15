<?php

include "connect.php";

$result = mysqli_query($conn,"SELECT * FROM books");

?>

<!DOCTYPE html>
<html>
<head>
<title>Books</title>
</head>
<body>

<h1>Books List</h1>

<a href="add_book.php">Add Book</a>

<table border="1" cellpadding="10">

<tr>

<th>ID</th>
<th>Book Name</th>
<th>Author</th>
<th>Price</th>
<th>Category</th>
<th>Action</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['book_name']; ?></td>

<td><?php echo $row['author']; ?></td>

<td><?php echo $row['price']; ?></td>

<td><?php echo $row['category']; ?></td>

<td>

<a href="edit_book.php?id=<?php echo $row['id']; ?>">
Edit
</a>

<a href="delete_book.php?id=<?php echo $row['id']; ?>">
Delete
</a>

</td>

</tr>

<?php } ?>

</table>

</body>
</html>