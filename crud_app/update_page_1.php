<?php include('header.php') ?>
<?php include('dbcon.php') ?>


<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
}
 $query = "select * from `students` where `id`='$id'";
 $result = mysqli_query($connection, $query);
 if(!$result){
	die("query failed");
}
else{
	$row=mysqli_fetch_assoc($result);
}

  ?>								

  <?php
  if(isset($_POST['update_students'])){

  if(isset($_GET['id_new'])){
   $idnew=$_GET['id_new'];
}

    $f_name=$_POST['first_name1'];
    $l_name=$_POST['last_name1'];
    $n_notes=$_POST['notes1'];

$query="update `students` set `first_name`='$f_name', `last_name`='$l_name',`notes`='$n_notes' where `id`=$idnew";

$result=mysqli_query($connection,$query);

if(!$result){
  die("query failed");
} 
else{
  header('location:home.php?update_messg=updated data successfully');
}
  }
    ?>




<form action="update_page_1.php?id_new=<?php echo $id ?>" method="post">
            <div class="form-group">
              <label for="first_name1" >FIRST NAME </label>
              <input type="text" name="first_name1" class="form-control" value="<?php echo $row['first_name'];?>">
                </div>
              <div class="form-group">
              <label for="last_name1" >Last NAME </label>
              <input type="text" name="last_name1" class="form-control" value="<?php echo $row['last_name'];?>">
</div>
              <div class="form-group">
              <label for="notes1" >NOTES </label>
              <input type="text" name="notes1" class="form-control" value="<?php echo $row['notes'];?>">
</div>
              <input type="submit" class="btn btn-success" name="update_students" value="UPDATE"></button>
 </form>


<?php include('footer.php') ?>