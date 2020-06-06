<?php 
   include('db.php');
    $id=$_REQUEST['sid'];
    $qry="DELETE FROM `dash` WHERE `id`='$id'";
   $run=mysqli_query($con,$qry);
    if($run==true)
    {
        ?>
<script>
    alert('Data Deleted Successfully');
    window.open('deletestudent.php?sid=<?php echo $id; ?>','_self');
</script>
<?php
    }
  
    ?>