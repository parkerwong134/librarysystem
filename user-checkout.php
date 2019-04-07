<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {
header('location:index.php');
}
else{

if(isset($_POST['checkout']))
{
$isbn=$_REQUEST['ISBN'];
$userid=$_SESSION['userid'];
$collectionid=intval($_GET['collectionid']);
$sql="INSERT INTO rent(ISBN,CollectionID,UserID) VALUES(:isbn,:collectionid,:userid)";
$query = $dbh->prepare($sql);
$query->bindParam(':isbn',$isbn);
$query->bindParam(':userid',$userid);
$query->bindParam(':collectionid',$collectionid);
$query->execute();
$_SESSION['msg']="ISBN: " . $isbn;
/* $_SESSION['msg']="User ID: " . $userid;*/
/* $_SESSION['msg']="Collection ID: " . $collectionid;*/
header('location:user-items.php');

}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Collection</title>
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
                <h4 class="header-line">Checkout Item</h4>
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
                                        <th>Collection ID</th>
                                        <th>Item Name</th>
                                        <th>ISBN</th>
                                    </tr>
                                </thead>
								<tbody>
<?php
$sql = "SELECT id, Title, ISBN
from collection
where id = '" . $_GET['collectionid'] . "'";
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
											<td class="center"><?php echo htmlentities($result->id);?></td>
                                            <td class="center"><?php echo htmlentities($result->Title);?></td>
                                            <td class="center"><?php echo htmlentities($result->ISBN);?></td>
                                            <input type="hidden" name="ISBN" value=<?php echo htmlentities($result->ISBN);?>>
                                        </td>
                                    </tr>
									
                                    <?php $num=$num+1;}} ?>
                                </tbody>
                            </table>
						</div>
						
<button type="submit" name="checkout" id="submit" class="btn btn-info" style="float:right;">Checkout</button>
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
