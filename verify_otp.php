<?php

include "connect.php";

if(!isset($_GET['email'])){
    header("Location: register.php");
    exit();
}

$email = $_GET['email'];

if(isset($_POST['verify'])){

    $otp = $_POST['otp'];

    $query = mysqli_query($conn,
    "SELECT * FROM users
    WHERE email='$email'
    AND otp='$otp'");

    if(mysqli_num_rows($query) > 0){

        mysqli_query($conn,
        "UPDATE users
        SET is_verified=1,
        otp=NULL
        WHERE email='$email'");

        echo "<script>
        alert('Email Verified Successfully');
        window.location='login.php';
        </script>";

    }else{

        echo "<script>
        alert('Invalid OTP');
        </script>";

    }

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Verify OTP</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Poppins,sans-serif;
}

body{

height:100vh;

display:flex;

justify-content:center;

align-items:center;

background:linear-gradient(135deg,#2563eb,#7c3aed);

}

.box{

background:#fff;

padding:35px;

width:400px;

border-radius:15px;

text-align:center;

}

input{

width:100%;

padding:12px;

margin:20px 0;

border:1px solid #ccc;

border-radius:8px;

font-size:16px;

}

button{

width:100%;

padding:12px;

background:#2563eb;

color:#fff;

border:none;

border-radius:8px;

font-size:16px;

cursor:pointer;

}

button:hover{

background:#1d4ed8;

}

</style>

</head>

<body>

<div class="box">

<h2>Email Verification</h2>

<p>Enter the OTP sent to your email.</p>

<form method="POST">

<input
type="text"
name="otp"
placeholder="Enter 6-digit OTP"
required>

<button
type="submit"
name="verify">

Verify OTP

</button>

</form>

</div>

</body>

</html>