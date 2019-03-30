<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['alogin'])==0)
    {
header('location:index.php');
}
else{
if(isset($_POST['update']))
{
$fname=$_POST['fullname'];
$phonenum=$_POST['phonenum'];
$email=$_POST['email'];

$sql="update admin set FullName=:fname, PhoneNumber=:phonenum, Email=:email";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':phonenum',$phonenum,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->execute();

echo '<script>alert("Your profile has been updated!")</script>';
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Admin Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <script src="assets/js/jquery-1.10.2.js"></script>
   <script src="assets/js/bootstrap.js"></script>
   <script src="assets/js/custom.js"></script>

</head>
<body>

<?php include('admin-navbar.php');?>
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">My Profile</h4>

                            </div>

        </div>
             <div class="row">

<div class="col-md-9 col-md-offset-1">
               <div class="panel panel-danger">
                        <div class="panel-body">
                            <form name="signup" method="post">
<?php
$sql="SELECT * from admin";
$query = $dbh -> prepare($sql);
$query-> bindParam(':uid', $uid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>

<div class="form-group">
<label>Employee ID : </label>
<?php echo htmlentities($result->EmployeeID);?>
</div>

<div class="form-group">
<label>Full Name</label>
<input class="form-control" type="text" name="fullname" value="<?php echo htmlentities($result->FullName);?>" autocomplete="off" required />
</div>

<div class="form-group">
<label>Mobile Number :</label>
<input class="form-control" type="text" name="phonenum" maxlength="10" value="<?php echo htmlentities($result->PhoneNumber);?>" autocomplete="off" required />
</div>

<div class="form-group">
<label>Enter Email</label>
<input class="form-control" type="email" name="email" value="<?php echo htmlentities($result->Email);?>"  autocomplete="off" required />
</div>
<?php }} ?>

<button type="submit" name="update" class="btn btn-primary" id="submit">Update Now </button> | <a href="admin-password.php">Change Password</a>

                                    </form>
                            </div>
                        </div>
                            </div>
        </div>
    </div>
    </div>

</body>
</html>
<?php } ?>
