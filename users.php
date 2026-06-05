<?php

include "connect.php";

$result = mysqli_query($conn,"SELECT * FROM users");

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>User Management</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#f4f6f9;
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
}

.dashboard-btn{
    text-decoration:none;
    background:#2563eb;
    color:white;
    padding:12px 20px;
    border-radius:10px;
    transition:0.3s;
}

.dashboard-btn:hover{
    background:#1d4ed8;
}

.table-box{
    background:white;
    border-radius:15px;
    overflow:hidden;
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#2563eb;
    color:white;
    padding:18px;
    text-align:center;
}

td{
    padding:15px;
    text-align:center;
    border-bottom:1px solid #e5e7eb;
}

tr:hover{
    background:#f9fafb;
}

.edit-btn{
    text-decoration:none;
    background:#f59e0b;
    color:white;
    padding:8px 15px;
    border-radius:8px;
    margin-right:5px;
}

.edit-btn:hover{
    background:#d97706;
}

.delete-btn{
    text-decoration:none;
    background:#dc2626;
    color:white;
    padding:8px 15px;
    border-radius:8px;
}

.delete-btn:hover{
    background:#b91c1c;
}

.user-count{
    margin-bottom:15px;
    font-size:18px;
    font-weight:600;
    color:#374151;
}

</style>

</head>

<body>

<div class="container">

<div class="header">

<h1 class="title">
User Management System
</h1>

<a href="dashboard.php" class="dashboard-btn">
Dashboard
</a>

</div>

<div class="user-count">

Total Users:
<?php echo mysqli_num_rows($result); ?>

</div>

<div class="table-box">

<table>

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Role</th>
<th>Actions</th>

</tr>

<?php

mysqli_data_seek($result,0);

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo ucfirst($row['role']); ?></td>

<td>

<a
href="edit.php?id=<?php echo $row['id']; ?>"
class="edit-btn">

Edit

</a>

<a
href="delete.php?id=<?php echo $row['id']; ?>"
class="delete-btn"
onclick="return confirm('Are you sure you want to delete this user?')">

Delete

</a>

</td>

</tr>

<?php

}

?>

</table>

</div>

</div>

</body>
</html>