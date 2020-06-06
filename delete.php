<?php
include("db.php");
session_start();
if($_SESSION['uid'])
{
    echo " ";
    
}
else
{
    header('location:login.php');
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Delete Details</title>
  </head>
  <body>
  <form method='post' action='delete.php'>
  <div class="form-group">
    <label for="exampleInputEmail1">Name of Company</label>
    <input type="text" class="form-control" name='scname' id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
   
  </div>
 
  <div class="form-group">
    <label for="exampleInputEmail1">City of Company</label>
    <input type="text" class="form-control" name='sccity' id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter city">
   
  </div>
  <button type="submit" class="btn btn-primary" name='search'>Search</button>
</form>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Works</th>
      <th scope="col">Address</th>
      <th scope="col">City</th>
      <th scope="col">State</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>

     <?php
     if(isset($_POST['search']))
     {
         include('db.php');
         $scname=$_POST['scname'];
         $sccity=$_POST['sccity'];
         $sql="SELECT * FROM `dash` WHERE `ccity`='$sccity' AND `cname` LIKE '%$scname%'";
         $run=mysqli_query($con,$sql);
         if(mysqli_num_rows($run)<1)
         {
             echo"No Record";
             
         }
         else
         {
             $count=0;
             while($data=mysqli_fetch_assoc($run))
             {
                 $count++;
                 ?>
                 
  <thead>
    <tr>
      <th scope="col"><?php echo $count; ?></th>
      <th scope="col"><?php echo $data['cname']; ?></th>
      <th scope="col"><?php echo $data['cwork']; ?></th>
      <th scope="col"><?php echo $data['cadd']; ?></th>
      <th scope="col"><?php echo $data['ccity']; ?></th>
      <th scope="col"><?php echo $data['cstate']; ?></th>
      <th scope="col"><a href="deleteform.php?sid=<?php echo $data['id']; ?>"class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Delete</a></th>
    </tr>
  </thead>
 
  </tbody>
</table>
                 <?php
                 
             }
         }
     }
     
     ?>

<hr>
<a href="admindash.php" class="btn btn-dark btn-lg active" role="button" aria-pressed="true">Back</a><hr>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>