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
$location=$_REQUEST['location'];
$date=$_REQUEST['date'];
$name=$_REQUEST['name'];

$sql="INSERT INTO event(eLocation,eDate,eName) VALUES(:location,:date,:name)";
$query = $dbh->prepare($sql);
$query->bindParam(':location',$location);
$query->bindParam(':date',$date);
$query->bindParam(':name',$name);
$query->execute();
$_SESSION['msg']="Event added successfully!";
header('location:manage-events.php');
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Add Collection</title>
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

</head>
<body>
  <?php include('admin-navbar.php');?>
    <div class="content-wrapper">
      <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Add Event</h4>
            </div>
        </div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
<div class="panel panel-info">

<div class="panel-body">
<form role="form" method="post">
<div class="form-group">
<label>Event Location<span style="color:red;">*</span></label>
<select class="form-control" name="location" required="required">
<option value="">Select Library Location</option>

<?php
$sql = "SELECT address from library";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
<option value="<?php echo htmlentities($result->address);?>"><?php echo htmlentities($result->address);?></option>
 <?php }} ?>
</select>
</div>

<div class="form-group">
<label>Event Date<span style="color:red;">*</span></label>
<input class="form-group" type="date" name="date" autocomplete="off" value="2019-04-04" required="required" />
</div>

<div class="form-group">
<label>Event Name<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="name" autocomplete="off" required="required" />
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
