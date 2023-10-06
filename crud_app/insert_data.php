<?php 
include('dbcon.php');
 if(isset($_POST['add_students'])){
 	
 	$fname=$_POST['first_name1'];
 	$lname=$_POST['last_name1'];
 	$note=$_POST['notes1'];

if($fname == ""||empty($fname)){
header('location:home.php?message=you need to fill input feild');
}
else{
$query="insert into `students`(`first_name`,`last_name`,`notes`) values('$fname', '$lname', '$note')";

$result=mysqli_query($connection, $query);

if(!$result){
	die("query failed".mysqli_error());
}
	else
	{
		header('location:home.php?insert_mess=successfully inserted');
	}
}

}

 ?>