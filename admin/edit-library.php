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
$lname=$_REQUEST['lname'];
$laddress=$_REQUEST['laddress'];
$sql="INSERT INTO library(lName, address) VALUES(:lname, :laddress)";

$query = $dbh->prepare($sql);
$query->bindParam(':lname',$lname);
$query->bindParam(':laddress',$laddress);
$query->execute();

$sql="SELECT * FROM event WHERE event.eLocation='" . urldecode($_GET['lName']) . "'";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{
	$sql2="INSERT INTO event(eLocation, startTime, endTime, eName, description) VALUES('" . $_REQUEST['lname'] . "', '" . $result->startTime . "', '" . $result->endTime . "', '" . $result->eName . "', '" . $result->description . "')";
	$query2 = $dbh->prepare($sql2);
	$query2->execute();
}}

$sql3="UPDATE register
SET register.eLocation='" . $_REQUEST['lname'] . "'
WHERE register.eLocation='" . urldecode($_GET['lName']) . "'";

$query3 = $dbh->prepare($sql3);
$query3->execute();

$sql4="DELETE FROM event WHERE eLocation = '" . urldecode($_GET['lName']) . "'";

$query4 = $dbh->prepare($sql4);
$query4->execute();

$sql5="DELETE FROM library WHERE lName = '" . urldecode($_GET['lName']) . "'";

$query5 = $dbh->prepare($sql5);
$query5->execute();

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
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

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


<div class="form-group">
<label>Library Name</label>
<input class="form-control" type="text" name="lname" value="<?php echo htmlentities(urldecode($_GET['lName']));?>" required />
</div>

<?php
$sql = "SELECT address from library where lName='" . urldecode($_GET['lName']) . "'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>

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
