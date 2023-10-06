<?php include('dbcon.php') ?>
<?php session_start()?>


<?php 
if(isset($_POST['login'])){
$usern=$_POST['uname'];
$emaill=$_POST['email'];



$query="select * from `users` where `username`='$usern' and `email_id`='$emaill'";

$result=mysqli_query($connection,$query);


if(!$result){
	die("query failed".mysqli_error());

}
else{
	$row=mysqli_num_rows($result);

	if($row==1){
		$_SESSION['uname']=$usern;
		header('location:home.php?login_messg=You have successfully logged in');
	}
	else{
		header('location:index.php?index_mssg=YOU MUST ENTER CORRECT PASSWORD');
	}
}
}
?>




<?php include('header.php') ?>
   <h1>LOGIN PAGE</h1>
          <div class="container">
            <form class="form" action="" method="post">
            <div class="form-group">
              <label for="uname" >Username</label>
              <input type="text" name="uname" class="form-control">
              </div>


              <div class="form-group">
              <label for="email" >Email</label>
              <input type="text" name="email" class="form-control">
              </div>

               <input type="submit" class="btn btn-success" name="login" value="LOGIN"></button>
  </form>
</div>
<?php include('footer.php') ?>



<?php
if(isset($_GET['index_mssg'])){
  echo "<h6>".$_GET['index_mssg']."</h6>";
}
?>