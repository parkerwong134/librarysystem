<?php
session_start();
include('includes/config.php');
error_reporting(0);

if(isset($_POST['signup']))
{

$fname=$_POST['fullname'];
$username=$_POST['username'];
$email=$_POST['email'];
$phonenum=$_POST['phonenum'];
$password=$_POST['password'];
$sql="INSERT INTO users(FullName,UserName,Email,PhoneNumber,Password) VALUES(:fname,:username,:email,:phonenum,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':username',$username,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':phonenum',$phonenum,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo '<script>alert("User Registration Successful!")</script>';
}
else
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>User Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
	<style>
		h4 {
			color:blue;
			padding:20px;
			text-align:center;
			}
	</style>

<?php include('navbar.php');?>
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line" style="text-align:center;">User Registration</h4>
            </div>
        </div>
             <div class="row">

<div class="col-md-9 col-md-offset-1">
               <div class="panel panel-danger">
                        <div class="panel-body">
                            <form name="signup" method="post" onSubmit="return valid();">
<div class="form-group">
<label>Full Name<span style="color:red">*</span></label>
<input class="form-control" type="text" name="fullname" autocomplete="off" required />
</div>

<div class="form-group">
<label>Username<span style="color:red">*</span></label>
<input class="form-control" type="username" name="username" id="username" autocomplete="off" required  />
</div>

<div class="form-group">
<label>Email Address<span style="color:red">*</span></label>
<input class="form-control" type="email" name="email" id="Email" onBlur="checkAvailability()" autocomplete="off" required  />
   <span id="user-availability-status" style="font-size:12px;"></span>
</div>

<div class="form-group">
<label>Phone Number<span style="color:red">*</span></label>
<input class="form-control" type="text" name="phonenum" autocomplete="off" required  />
</div>

<div class="form-group">
<label>Enter Password<span style="color:red">*</span></label>
<input class="form-control" type="password" name="password" autocomplete="off" required  />
</div>

<div class="form-group">
<label>Confirm Password<span style="color:red">*</span></label>
<input class="form-control"  type="password" name="confirmpassword" autocomplete="off" required  />
</div>

<button type="submit" name="signup" class="btn btn-danger" id="submit">Register Now </button>
        </div>
    </div>
</div>

</body>
</html>
