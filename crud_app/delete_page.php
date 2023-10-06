<?php include('dbcon.php') ?>




<?php

 if(isset($_GET['id'])){
  $id=$_GET['id'];
}
$query="delete from `students` where `id`='$id'";
$result=mysqli_query($connection,$query);

if(!$result){
  die("query failed");
}
else {
  header('location:home.php?delete_messg=You have deleted record');
}



  ?>