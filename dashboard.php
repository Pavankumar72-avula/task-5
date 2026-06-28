<?php

session_start();

include "connect.php";

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$totalBooks = mysqli_fetch_assoc(
mysqli_query($conn,"SELECT COUNT(*) AS total FROM books")
);

$totalUsers = mysqli_fetch_assoc(
mysqli_query($conn,"SELECT COUNT(*) AS total FROM users")
);

$totalCategories = mysqli_fetch_assoc(
mysqli_query($conn,"SELECT COUNT(DISTINCT category) AS total FROM books")
);

$averagePrice = mysqli_fetch_assoc(
mysqli_query($conn,"SELECT AVG(price) AS avg_price FROM books")
);
/* ================= CHART DATA ================= */

$chart = mysqli_query($conn,"
SELECT category, COUNT(*) AS total
FROM books
GROUP BY category
");

$categories = [];
$totals = [];

while($row = mysqli_fetch_assoc($chart)){

    $categories[] = $row['category'];
    $totals[] = $row['total'];

}

?>


<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<ul>
    <li><a href="index.php#contact">Contact</a></li>
</ul>


<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{

background:#f3f4f6;

}

.container{

width:95%;

max-width:1200px;

margin:40px auto;

}

.header{

background:linear-gradient(135deg,#2563eb,#7c3aed);

color:white;

padding:30px;

border-radius:15px;

display:flex;

justify-content:space-between;

align-items:center;

box-shadow:0 10px 25px rgba(0,0,0,.15);

}

.user-info h1{

margin-bottom:10px;

}

.user-info p{

font-size:17px;

margin:5px 0;

}

.avatar{

width:90px;

height:90px;

background:white;

color:#2563eb;

display:flex;

justify-content:center;

align-items:center;

border-radius:50%;

font-size:42px;

font-weight:bold;

}

.dashboard-cards{

display:grid;

grid-template-columns:repeat(auto-fit,minmax(220px,1fr));

gap:20px;

margin-top:30px;

}

.card{

padding:25px;

border-radius:15px;

color:white;

text-align:center;

box-shadow:0 8px 20px rgba(0,0,0,.12);

transition:.3s;

}

.card:hover{

transform:translateY(-8px);

}

.card h2{

font-size:40px;

margin-bottom:10px;

}

.blue{

background:#2563eb;

}

.green{

background:#10b981;

}

.orange{

background:#f59e0b;

}

.red{

background:#dc2626;

}

.admin-panel{

margin-top:30px;

background:white;

padding:25px;

border-radius:15px;

box-shadow:0 8px 20px rgba(0,0,0,.1);

}

.manage{

display:inline-block;

margin:10px;

padding:12px 22px;

background:#2563eb;

color:white;

text-decoration:none;

border-radius:8px;

font-weight:600;

transition:.3s;

}

.manage:hover{

background:#1d4ed8;

}

.logout{

display:inline-block;

margin-top:30px;

padding:12px 25px;

background:#dc2626;

color:white;

text-decoration:none;

border-radius:8px;

font-weight:bold;

transition:.3s;

}

.logout:hover{

background:#b91c1c;

}
canvas{

max-width:900px;

margin:auto;

}

</style>

</head>

<body>

<div class="container">

<div class="header">

<div class="user-info">

<h1>

Welcome,

<?php echo $_SESSION['user_name']; ?>

👋

</h1>

<p>

<strong>Email :</strong>

<?php echo $_SESSION['user_email']; ?>

</p>

<p>

<strong>Role :</strong>

<?php echo $_SESSION['role']; ?>

</p>

</div>

<div class="avatar">

👤

</div>

</div>

<div class="dashboard-cards">

<div class="card blue">

<h2>

<?php echo $totalBooks['total']; ?>

</h2>

<p>📚 Total Books</p>

</div>

<div class="card green">

<h2>

<?php echo $totalUsers['total']; ?>

</h2>

<p>👥 Total Users</p>

</div>

<div class="card orange">

<h2>

<?php echo $totalCategories['total']; ?>

</h2>

<p>📂 Categories</p>

</div>

<div class="card red">

<h2>

₹<?php echo number_format($averagePrice['avg_price'],2); ?>

</h2>

<p>💰 Average Price</p>

</div>

</div>
<!--==================== ADMIN PANEL ====================-->

<?php

if($_SESSION['role']=="admin"){

?>

<div class="admin-panel">
    <div class="admin-panel">

<h2>📊 Books by Category</h2>

<canvas id="bookChart"></canvas>

</div>

<h2>⚙️ Admin Panel</h2>

<p style="margin:15px 0;color:#555;">
Manage your bookstore from here.
</p>

<a href="users.php" class="manage">

👥 Manage Users

</a>

<a href="books.php" class="manage" style="background:#10b981;">

📚 Manage Books

</a>

<!-- <a href="add_book.php" class="manage" style="background:#f59e0b;">

➕ Add Book

</a>
 -->
<a href="index.php" class="manage" style="background:#7c3aed;">

🏠 Home

</a>

</div>

<?php

}

?>

<div style="text-align:center;">

<a href="logout.php" class="logout">

🚪 Logout

</a>

<a href="orders.php" class="manage" style="background:#16a34a;">

📦 My Orders

</a>
</div>

</div>
<script>

const ctx = document.getElementById('bookChart');
if(ctx) {
new Chart(ctx,{

type:'bar',

data:{

labels:<?php echo json_encode($categories); ?>,

datasets:[{

label:'Number of Books',

data:<?php echo json_encode($totals); ?>,

backgroundColor:[
'#2563eb',
'#10b981',
'#f59e0b',
'#dc2626',
'#7c3aed',
'#06b6d4'
],

borderRadius:8

}]

},

options:{

responsive:true,

plugins:{

legend:{
display:false
}

},

scales:{

y:{
beginAtZero:true
}

}

}

});
}

</script>


</body>

</html>