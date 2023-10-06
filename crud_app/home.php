<?php include('header.php') ?>
<?php include('dbcon.php') ?>
<?php session_start()?>

<div class="box"> 
<h2>ALL STUDENTS</h2>
<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
ADD STUDENTS </button>
</div>
<table class="table table-bordered table-striped table-hover">
<thead>
 <tr>
	<th>ID</th>
	<th>FIRST_NAME</th>
	<th>LAST_NAME</th>
	<th>NOTES</th>
  <th>UPDATE</th>
  <th>DELETE</th>
 </tr>
</thead>
<tbody>
<?php 

$query="select * from `students`";
$result=mysqli_query($connection, $query);

if(!$result){
	die("no connection");
}
else{
	while($row=mysqli_fetch_assoc($result)){
		?>
 <tr>
	<td><?php echo $row['id'];?></td>
	<td><?php echo $row['first_name'];?></td>
	<td><?php echo $row['last_name'];?></td>
	<td><?php echo $row['notes'];?></td>
  <td><a href="update_page_1.php?id=<?php echo $row['id'];?>" class="btn btn-success">Update</a></td>
  <td><a href="delete_page.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>
 </tr>

<?php 
	}
}

?>

 </tbody>
 </table>




  <form action="logout.php" method="post">
  <input type="submit" class="btn btn-danger" value="LOGOUT" name="logout" id="m"></button>
  </form>

<?php 
if(isset($_SESSION['uname'])){
  echo "<h6>HELLO ".$_SESSION['uname']."</h6>";
}
else{
  header('location:index.php');
}
?>








<?php
if(isset($_GET['message'])){
	echo "<h6>".$_GET['message']."</h6>";
}
?>

<?php
if(isset($_GET['insert_mess'])){
	echo "<h6>".$_GET['insert_mess']."</h6>";
}
?>

<?php
if(isset($_GET['update_messg'])){
  echo "<h6>".$_GET['update_messg']."</h6>";
}
  ?>

<?php 
if(isset($_GET['delete_messg'])){
  echo "<h6>".$_GET['delete_messg']."</h6";
}
?>

<?php 
if(isset($_GET['login_messg'])){
  echo "<h6>".$_GET['login_messg']."</h6>";
}
?>

<form action="insert_data.php" method="post">
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD STUDENTS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
              <label for="first_name1" >FIRST NAME </label>
              <input type="text" name="first_name1" class="form-control">

              <div class="form-group">
              <label for="last_name1" >Last NAME </label>
              <input type="text" name="last_name1" class="form-control">

              <div class="form-group">
              <label for="notes1" >NOTES </label>
              <input type="text" name="notes1" class="form-control">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_students" value="ADD"></button>
      </div>
    </div>
  </div>
</div>




 <?php include('footer.php') ?>



 