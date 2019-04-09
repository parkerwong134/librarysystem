<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {
header('location:index.php');
}
else{

if(isset($_POST['register']))
{
$location=$_REQUEST['location'];
$startTime=$_REQUEST['startTime'];
$endTime=$_REQUEST['endTime'];
$name=$_REQUEST['name'];
$userid=$_SESSION['userid'];
$sql="INSERT INTO event(eLocation,startTime,endTime,eName,UserID) VALUES(:location,:startTime,:endTime,:name,:userid)";
$query = $dbh->prepare($sql);
$query->bindParam(':location',$location);
$query->bindParam(':startTime',$startTime);
$query->bindParam(':endTime',$endTime);
$query->bindParam(':name',$name);
$query->bindParam(':userid',$userid);
$query->execute();
$_SESSION['msg']="Event Registration Successful!";
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
										<th>#</th>
                    <th>Location</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Event Name</th>
                    <th>Description</th>
                                    </tr>
                                </thead>
								<tbody>
<?php
$sql = "SELECT * FROM event ORDER BY startTime DESC";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$num=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
									<tr class="odd gradeX">
										<td class="center"><?php echo htmlentities($num);?></td>
                    <td class="center"><?php echo htmlentities($result->eLocation);?></td>
                    <td class="center"><?php echo htmlentities($result->startTime);?></td>
                    <td class="center"><?php echo htmlentities($result->endTime);?></td>
                    <td class="center"><?php echo htmlentities($result->eName);?></td>
                    <td class="center"><?php echo htmlentities($result->description);?></td>
                    <input type="hidden" name="userid" value=<?php echo htmlentities($result->UserID);?>>

                                    </tr>

                                    <?php $num=$num+1;}} ?>
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
