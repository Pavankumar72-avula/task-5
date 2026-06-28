<?php
session_start();

include "connect.php";
include "mail_config.php";

$showOTP = false;

if(isset($_SESSION['showOTP'])){
    $showOTP = true;
}

/*=========================
SEND OTP
==========================*/

if(isset($_POST['register'])){

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role'];

    if($password != $confirm_password){

        echo "<script>alert('Passwords do not match');</script>";

    }else{

        $check = mysqli_query($conn,
        "SELECT * FROM users WHERE email='$email'");

        if(mysqli_num_rows($check)>0){

            echo "<script>
            alert('Email already exists');
            </script>";

        }else{

            $otp = rand(100000,999999);

            $_SESSION['otp'] = $otp;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = password_hash($password,PASSWORD_DEFAULT);
            $_SESSION['role'] = $role;
            $_SESSION['showOTP'] = true;

            if(sendOTP($email,$otp)){

                $showOTP = true;

                echo "<script>
                alert('OTP Sent Successfully');
                </script>";

            }else{

                echo "<script>
                alert('Unable to send OTP');
                </script>";

            }

        }

    }

}

/*=========================
VERIFY OTP
==========================*/

if(isset($_POST['verify'])){

    $showOTP = true;

    if($_POST['otp']==$_SESSION['otp']){

        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        $password = $_SESSION['password'];
        $role = $_SESSION['role'];

        mysqli_query($conn,
        "INSERT INTO users
        (name,email,password,role,is_verified)

        VALUES

        ('$name',
        '$email',
        '$password',
        '$role',
        1)");

        session_unset();
        session_destroy();

        echo "<script>
        alert('Registration Successful');
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
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>User Registration</title>

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

    background:
    linear-gradient(
    135deg,
    #2563eb,
    #7c3aed
    );

}

.form-box{

    width:420px;

    background:white;

    padding:35px;

    border-radius:20px;

    box-shadow:
    0 15px 35px rgba(0,0,0,0.2);

}

h2{

    text-align:center;

    margin-bottom:25px;

    color:#111827;

}

input,
select{

    width:100%;

    padding:13px;

    margin-bottom:15px;

    border:2px solid #e5e7eb;

    border-radius:10px;

    font-size:15px;

    transition:0.3s;

}

input:focus,
select:focus{

    outline:none;

    border-color:#2563eb;

}

button{

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

button:hover{

    background:#1d4ed8;

}

.login-link{

    text-align:center;

    margin-top:15px;

}

.login-link a{

    text-decoration:none;

    color:#2563eb;

    font-weight:600;

}

</style>

</head>

<body>

<div class="form-box">

<h2>Create Account</h2>

<form method="POST">

<input
type="text"
name="name"
placeholder="Enter Full Name"
required>

<input
type="email"
name="email"
placeholder="Enter Email"
required>

<input
type="password"
name="password"
placeholder="Enter Password"
required>

<input
type="password"
name="confirm_password"
placeholder="Confirm Password"
required>

<select name="role" required>

<option value="">
Select Role
</option>

<option value="user">
User
</option>

<option value="admin">
Admin

</select>

<?php if(!$showOTP){ ?>

<button
type="submit"
name="register">

Send OTP

</button>

<?php } ?>
<?php if($showOTP){ ?>

<hr style="margin:20px 0;">

<h3 style="text-align:center;color:#2563eb;">
Email Verification
</h3>

<p style="text-align:center;font-size:14px;color:#666;">
Enter the OTP sent to your email.
</p>

<input
type="text"
name="otp"
placeholder="Enter 6-digit OTP"
maxlength="6"
required>

<button
type="submit"
name="verify">

Verify OTP & Register

</button>

<?php } ?>

</button>


</form>

<div class="login-link">

Already have an account?

<a href="login.php">
Login
</a>

</div>

</div>

</body>
</html>