<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {
header('location:index.php');
}
else{

if(isset($_POST['update']))
{
$lname=$_GET['lname'];
$laddress=$_POST['laddress'];
$sql="update library set lName=:lname where lName=:lname";
$sql="update library set address=:laddress where lName=:lname";
$query = $dbh->prepare($sql);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':laddress',$laddress,PDO::PARAM_STR);
$query->execute();
$_SESSION['updatemsg']="Library updated successfully";
header('location:manage-libraries.php');

}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Library</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/js/dataTables/dataTables.bootstrap4.css" rel="stylesheet" />
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
                <h4 class="header-line">Edit Library</h4>
                    </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
<div class="panel panel-info">
<div class="panel-body">
<form role="form" method="post">
<div class="form-group">

<?php
$lname=$_GET['lname'];
$sql = "SELECT * from library where lName=:lname";
$query = $dbh -> prepare($sql);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>



<div class="form-group">
<label>Library Name</label>
<input class="form-control" type="text" name="lname" value="<?php echo htmlentities($result->lName);?>" required />
</div>

<div class="form-group">
<label>Address</label>
<input class="form-control" type="text" name="laddress" value="<?php echo htmlentities($result->address);?>" required />
</div>


<?php }} ?>
</div>

<button type="submit" name="update" class="btn btn-info">Update </button>

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


