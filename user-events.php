<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {
header('location:index.php');
}
else{

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>My Events</title>
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
                <h4 class="header-line">My Events</h4>
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
                  </tr>
                </thead>
								<tbody>

<?php
$uid = $_SESSION['userid'];
$sql = "SELECT * FROM register WHERE UserID=:uid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':uid', $uid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
            <tr class="odd gradeX">
              <td class="center"><?php echo htmlentities($result->eLocation);?></td>
              <td class="center"><?php echo htmlentities($result->startTime);?></td>
              <td class="center"><?php echo htmlentities($result->endTime);?></td>
              <td class="center"><?php echo htmlentities($result->eName);?></td>
<?php }} ?>

                                    </tr>
                                </tbody>
                            </table>
						</div>

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
