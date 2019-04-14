<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {
header('location:../index.php');
}
else{

if(isset($_POST['register']))
{
$userid=$_SESSION['userid'];
$location=urldecode($_GET['eLocation']);
$startTime=urldecode($_GET['startTime']);
$endTime=urldecode($_GET['endTime']);
$name=urldecode($_GET['eName']);
$sql="INSERT INTO register(UserID,eLocation,startTime,endTime,eName) VALUES(:userid,:location,:startTime,:endTime,:name)";
$query = $dbh->prepare($sql);
$query->bindParam(':userid',$userid);
$query->bindParam(':location',$location);
$query->bindParam(':startTime',$startTime);
$query->bindParam(':endTime',$endTime);
$query->bindParam(':name',$name);
$query->execute();
$_SESSION['msg']="Event Name: " . urldecode($_GET['eName']);
header('location:event-list.php');

}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Event Registration</title>
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
<?php include('user-navbar.php');?>
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Event Registration</h4>
            </div>
        </div>
        <form role="form" method="post">
        <div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
									<tr>
                    <th>Location</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Event Name</th>
                    <th>Description</th>
                                    </tr>
                                </thead>
								<tbody>

					<tr class="odd gradeX">
                    <td class="center"><?php echo htmlentities(urldecode($_GET['eLocation']));?></td>
                    <td class="center"><?php echo htmlentities(urldecode($_GET['startTime']));?></td>
                    <td class="center"><?php echo htmlentities(urldecode($_GET['endTime']));?></td>
                    <td class="center"><?php echo htmlentities(urldecode($_GET['eName']));?></td>

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
                    <td class="center"><?php echo htmlentities($result->description);?></td>
<?php }} ?>

                                    </tr>
                                </tbody>
                            </table>
						</div>

<button type="submit" name="register" id="submit" class="btn btn-info" style="float:right;">Register</button>
					</div>
				</div>
			</div>
		</div>
		</form>
    </div>
</div>
</body>
</html>
<?php } ?>
