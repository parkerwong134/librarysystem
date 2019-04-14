<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {
header('location:../index.php');
}
else{

if(isset($_POST['update']))
{
$location=$_REQUEST['location'];
$startTime=$_REQUEST['startTime'];
$endTime=$_REQUEST['endTime'];
$name=$_REQUEST['name'];
$description=$_REQUEST['description'];

$sql="INSERT INTO event(eLocation,startTime,endTime,eName,description) VALUES(:location,:startTime,:endTime,:name,:description)";

$query = $dbh->prepare($sql);
$query->bindParam(':location',$location);
$query->bindParam(':startTime',$startTime);
$query->bindParam(':endTime',$endTime);
$query->bindParam(':name',$name);
$query->bindParam(':description',$description);
$query->execute();

$sql2="UPDATE register
SET register.eLocation='" . $_REQUEST['location'] . "',
register.startTime='" . $_REQUEST['startTime'] . "',
register.endTime='" . $_REQUEST['endTime'] . "',
register.eName='" . $_REQUEST['name'] . "'
WHERE register.eName='" . urldecode($_GET['eName']) . "'
AND register.eLocation='" . urldecode($_GET['eLocation']) . "'
AND register.startTime='" . urldecode($_GET['startTime']) . "'
AND register.endTime='" . urldecode($_GET['endTime']) . "'";

$query2 = $dbh->prepare($sql2);
$query2->execute();

$sql3="DELETE FROM event
WHERE event.eName='" . urldecode($_GET['eName']) . "'
AND event.eLocation='" . urldecode($_GET['eLocation']) . "'
AND event.startTime='" . urldecode($_GET['startTime']) . "'
AND event.endTime='" . urldecode($_GET['endTime']) . "'";

$query3 = $dbh->prepare($sql3);
$query3->execute();

$_SESSION['msg']="Event Change: " . $_REQUEST['name'];
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
    <title>Edit Event</title>
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

</head>
<body>
  <?php include('admin-navbar.php');?>
    <div class="content-wrapper">
      <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Edit Event</h4>
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
<option value="<?php echo htmlentities(urldecode($_GET['eLocation']));?>"><?php echo htmlentities(urldecode($_GET['eLocation']));?></option>

<?php
$sql = "SELECT lName FROM library WHERE lName <> '" . urldecode($_GET['eLocation']) . "'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
<option value="<?php echo htmlentities($result->lName);?>"><?php echo htmlentities($result->lName);?></option>
 <?php }} ?>
</select>
</div>

<div class="form-group">
<label>Start Time<span style="color:red;">*</span> (The time input format is: YYYY-MM-DD HH:MM:SS)</label>
<input class="form-control" type="datetime-local" name="startTime" value="<?php echo htmlentities(urldecode($_GET['startTime']));?>" autocomplete="off" required="required" />
</div>

<div class="form-group">
<label>End Time<span style="color:red;">*</span> (The time input format is: YYYY-MM-DD HH:MM:SS)</label>
<input class="form-control" type="datetime-local" name="endTime" value="<?php echo htmlentities(urldecode($_GET['endTime']));?>" autocomplete="off" required="required" />
</div>

<div class="form-group">
<label>Event Name<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="name" value="<?php echo htmlentities(urldecode($_GET['eName']));?>" autocomplete="off" required="required" />
</div>

<div class="form-group">
<label>Event Description<span style="color:red;">*</span></label>

<?php
$sql = "SELECT description FROM event
WHERE eName='" . urldecode($_GET['eName']) . "'
AND eLocation='" . urldecode($_GET['eLocation']) . "'
AND startTime='" . urldecode($_GET['startTime']) . "'
AND endTime='" . urldecode($_GET['endTime']) . "'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
	<textarea class="form-control" type="text" name="description" autocomplete="off" required="required" /><?php echo htmlentities($result->description);?></textarea>
<?php }} ?>
</div>

<button type="submit" name="update" class="btn btn-info">Update</button>
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
