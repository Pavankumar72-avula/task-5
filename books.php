<?php

include "connect.php";

$result = mysqli_query(
$conn,
"SELECT * FROM books"
);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Book Management</title>
<ul>
    <li><a href="index.php#contact">Contact</a></li>
</ul>

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

    min-height:100vh;

    padding:40px;

}

.container{

    max-width:1200px;

    margin:auto;

}

.header{

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:25px;

}

.title{

    color:#111827;

    font-size:32px;

}

.add-btn{

    background:#10b981;

    color:white;

    text-decoration:none;

    padding:12px 20px;

    border-radius:10px;

    font-weight:600;

    transition:0.3s;

}

.add-btn:hover{

    background:#059669;

}

.book-count{

    margin-bottom:15px;

    font-size:18px;

    font-weight:600;

    color:#374151;

}

.table-box{

    background:white;

    border-radius:15px;

    overflow:hidden;

    box-shadow:0 8px 20px rgba(0,0,0,0.1);

}

table{

    width:100%;

    border-collapse:collapse;

}

th{

    background:#2563eb;

    color:white;

    padding:16px;

}

td{

    padding:16px;

    text-align:center;

    border-bottom:1px solid #e5e7eb;

}

tr:hover{

    background:#f9fafb;

}

.edit-btn{

    background:#f59e0b;

    color:white;

    text-decoration:none;

    padding:8px 16px;

    border-radius:8px;

    margin-right:10px;

    font-weight:500;

    transition:0.3s;

}

.edit-btn:hover{

    background:#d97706;

}

.delete-btn{

    background:#dc2626;

    color:white;

    text-decoration:none;

    padding:8px 16px;

    border-radius:8px;

    font-weight:500;

    transition:0.3s;

}

.delete-btn:hover{

    background:#b91c1c;

}

.dashboard-btn{

    background:#2563eb;

    color:white;

    text-decoration:none;

    padding:10px 18px;

    border-radius:8px;

    margin-left:10px;

}

.dashboard-btn:hover{

    background:#1d4ed8;

}
.action-buttons{

    display:flex;

    justify-content:center;

    align-items:center;

    gap:10px;

    flex-wrap:nowrap;

}

.view-btn,
.edit-btn,
.delete-btn{

    display:inline-block;

    padding:8px 14px;

    border-radius:8px;

    text-decoration:none;

    color:white;

    font-weight:600;

    white-space:nowrap;

}

.view-btn{

    background:#2563eb;

}

.view-btn:hover{

    background:#1d4ed8;

}

.edit-btn{

    background:#f59e0b;

}

.edit-btn:hover{

    background:#d97706;

}

.delete-btn{

    background:#dc2626;

}

.delete-btn:hover{

    background:#b91c1c;

}

</style>

</head>

<body>

<div class="container">

<div class="header">

<h1 class="title">

📚 Book Management

</h1>

<div>

<a
href="add_book.php"
class="add-btn">

➕ Add New Book

</a>

<a
href="dashboard.php"
class="dashboard-btn">

🏠 Dashboard

</a>

</div>

</div>

<div class="book-count">

Total Books:
<?php echo mysqli_num_rows($result); ?>

</div>
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

<div class="table-box">

<table>

<tr>

<th>ID</th>

<th>Book Name</th>

<th>Author</th>

<th>Price</th>

<th>Category</th>

<th>Description</th>

<th>Action</th>

</tr>

<tbody id="bookTable">

<?php

mysqli_data_seek($result,0);

while($row=mysqli_fetch_assoc($result)){

?>
</tbody>

<tr>

<td>
<?php echo $row['id']; ?>
</td>

<td>
<?php echo $row['book_name']; ?>
</td>

<td>
<?php echo $row['author']; ?>
</td>

<td>
₹<?php echo $row['price']; ?>
</td>

<td>
<?php echo $row['category']; ?>
</td>

<td>
<?php echo $row['description']; ?>
</td>

<td>

<div class="action-buttons">

<a
href="book_details.php?id=<?php echo $row['id']; ?>"
class="view-btn">

👁 View

</a>

<a
href="edit_book.php?id=<?php echo $row['id']; ?>"
class="edit-btn">

✏ Edit

</a>

<a
href="delete_book.php?id=<?php echo $row['id']; ?>"
class="delete-btn"
onclick="return confirm('Are you sure you want to delete this book?')">

🗑 Delete

</a>
<form method="GET" style="margin-bottom:20px; display:flex; gap:10px;">

<input
type="text"
name="search"
placeholder="Search by Book, Author or Category"
value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>"

style="
width:350px;
padding:12px;
border:2px solid #2563eb;
border-radius:8px;
font-size:16px;
">

<button
type="submit"
style="
padding:12px 20px;
background:#2563eb;
color:white;
border:none;
border-radius:8px;
cursor:pointer;
font-weight:bold;
">

🔍 Search

</button>

<a href="books.php"
style="
padding:12px 20px;
background:#6b7280;
color:white;
text-decoration:none;
border-radius:8px;
">

Reset

</a>

</form>

</div>

</td>

</tr>

<?php

}

?>

</table>

</div>

</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>

$(document).ready(function(){

    $("#search").keyup(function(){

        var search = $(this).val();

        $.ajax({

            url:"search_books.php",

            type:"POST",

            data:{search:search},

            success:function(data){

                $("#bookTable").html(data);

            }

        });

    });

});

</script>


</body>
</html>