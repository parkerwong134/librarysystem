<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
 {
 header('location:../index.php');
}
 else{
   if(isset($_GET['del']))
   {
   $id=$_GET['del'];
   $sql = "delete from rent WHERE ISBN=:id";
   $query = $dbh->prepare($sql);
   $query -> bindParam(':id',$id, PDO::PARAM_STR);
   $query -> execute();
   $_SESSION['delmsg']="Item returned successfully";
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
  <title>My Items</title>
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
                <h4 class="header-line">My Items</h4>
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
       <?php if($_SESSION['updatemsg']!="")
       {?>
       <div class="col-md-6">
       <div class="alert alert-success" >
        <strong>Success :</strong>
        <?php echo htmlentities($_SESSION['updatemsg']);?>
       <?php echo htmlentities($_SESSION['updatemsg']="");?>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>ISBN</th>
                                            <th>Borrow Date</th>
                                            <th>Return Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$uid=$_SESSION['userid'];
$sql="SELECT collection.Title,collection.ISBN,rent.rentDate,
rent.returnDate,rent.ISBN
from  rent join users on users.UserID=rent.UserID
join collection on collection.id=rent.CollectionID
where users.UserID=:uid order by rent.ISBN desc";
$query = $dbh -> prepare($sql);
$query-> bindParam(':uid', $uid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center"><?php echo htmlentities($result->Title);?></td>
                                            <td class="center"><?php echo htmlentities($result->ISBN);?></td>
                                            <td class="center"><?php echo htmlentities($result->rentDate);?></td>
                                            <td class="center"><?php echo htmlentities($result->returnDate);?></td>
                                            <td class="center">
                                              <a href="user-items.php?del=<?php echo htmlentities($result->ISBN);?>" onclick="return confirm('Return Item?');" >  <button class="btn btn-danger"><i class="fa fa-pencil"></i>Return</button>
                                            </td>
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
</div>

</body>
</html>
<?php } ?>
