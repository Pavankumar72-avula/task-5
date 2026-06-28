<?php

include "connect.php";

$search = "";

if(isset($_POST['search'])){
    $search = mysqli_real_escape_string($conn, $_POST['search']);
}

$query = "SELECT * FROM books
WHERE
book_name LIKE '%$search%'
OR author LIKE '%$search%'
OR category LIKE '%$search%'
ORDER BY id DESC";

$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)){
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['book_name']; ?></td>

<td><?php echo $row['author']; ?></td>

<td>₹<?php echo $row['price']; ?></td>

<td><?php echo $row['category']; ?></td>

<td><?php echo $row['description']; ?></td>

<td style="display:flex;gap:10px;justify-content:center;">

<a href="book_details.php?id=<?php echo $row['id']; ?>" class="view-btn">
👁 View
</a>

<a href="edit_book.php?id=<?php echo $row['id']; ?>" class="edit-btn">
✏ Edit
</a>

<a href="delete_book.php?id=<?php echo $row['id']; ?>"
class="delete-btn"
onclick="return confirm('Delete this book?')">
🗑 Delete
</a>

</td>

</tr>

<?php
}
?>