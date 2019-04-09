<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {
header('location:index.php');
}
else{

if(isset($_POST['add']))
{
$aname=$_REQUEST['aname'];
$birth=$_REQUEST['birth'];
$status=$_REQUEST['status'];


$sql="INSERT INTO authors(AuthorName,Birthday,Status) VALUES(:aname,:birth,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':aname',$aname);
$query->bindParam(':birth',$birth);
$query->bindParam(':status',$status);
$query->execute();
$_SESSION['msg']="Author added successfully!";
header('location:manage-authors.php');
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Add Author</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/js/dataTables/dataTables.bootstrap4.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap4.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

</head>
<body>
  <?php include('admin-navbar.php');?>
    <div class="content-wrapper">
      <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Add Author</h4>
            </div>
        </div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
<div class="panel panel-info">

<div class="panel-body">
<form role="form" method="post">
	
<div class="form-group">
<label>Author Name<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="aname" autocomplete="off" required="required" />
</div>

<div class="form-group">
<label>Date of Birth<span style="color:red;">*</span></label>
<input class="form-control" type="date" name="birth" autocomplete="off" required="required" />
</div>

<div class="radio">
  <label>Status<br><input type="radio" name="status" value="Active" checked required="required">Active</label>
</div>
<div class="radio">
  <label><input type="radio" name="status" value="Deceased" required="required">Deceased</label>
</div>
                            
	

<button type="submit" name="add" class="btn btn-info">Add</button>
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
