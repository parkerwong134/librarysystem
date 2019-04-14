<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {
header('location:../index.php');
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
    <title>View Event Attendees</title>
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
                <h4 class="header-line">View Event Attendees</h4>
    </div>
     <div class="row">
    <?php if($_SESSION['error']!="")
    {?>
<div class="col-md-6">
<div class="alert alert-danger" >
 <strong>Error :</strong>
 <?php echo htmlentities($_SESSION['error']);?>
<?php echo htmlentities($_SESSION['error']="");?>
</div>
</div>
<?php } ?>
<?php if($_SESSION['msg']!="")
{?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong>
 <?php echo htmlentities($_SESSION['msg']);?>
<?php echo htmlentities($_SESSION['msg']="");?>
</div>
</div>
<?php } ?>



   <?php if($_SESSION['delmsg']!="")
    {?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong>
 <?php echo htmlentities($_SESSION['delmsg']);?>
<?php echo htmlentities($_SESSION['delmsg']="");?>
</div>
</div>
<?php } ?>

</div>


        </div>
        <h5 class="header-line">Event</h5>
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
<?php $sql = "SELECT * FROM event
WHERE eName='" . urldecode($_GET['eName']) . "'
AND eLocation='" . urldecode($_GET['eLocation']) . "'
AND startTime='" . urldecode($_GET['startTime']) . "'
AND endTime='" . urldecode($_GET['endTime']) . "'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($result->eLocation);?></td>
                                            <td class="center"><?php echo htmlentities($result->startTime);?></td>
                                            <td class="center"><?php echo htmlentities($result->endTime);?></td>
                                            <td class="center"><?php echo htmlentities($result->eName);?></td>
                                            <td class="center"><?php echo htmlentities($result->description);?></td>

                                        </tr>
 <?php $cnt=$cnt+1;}} ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <h5 class="header-line">Attendees</h5>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User ID</th>
                                            <th>User Full Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php $sql = "SELECT register.UserID, users.FullName
FROM register
INNER JOIN users ON users.UserID=register.UserID
WHERE register.eName='" . urldecode($_GET['eName']) . "'
AND register.eLocation='" . urldecode($_GET['eLocation']) . "'
AND register.startTime='" . urldecode($_GET['startTime']) . "'
AND register.endTime='" . urldecode($_GET['endTime']) . "'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center"><?php echo htmlentities($result->UserID);?></td>
                                            <td class="center"><?php echo htmlentities($result->FullName);?></td>
                                        </tr>
 <?php $cnt=$cnt+1;}} ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
    </div>
    </div>

</body>
</html>
<?php } ?>
