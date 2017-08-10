<?php

include "db.php";

$firstname = $_POST["first_name"];
$lastname = $_POST['last_name'];
$email = $_POST["email"];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$mobile = $_POST['mobile'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];

$name = "/^[A-Z][a-zA-Z ]+$/";
$emailValidation= "/^[_a-zA-Z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
$number= "/^[0-9]+$/";


if(empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($repassword) || empty($mobile) || empty($address1) || empty($address2)){
	echo "
	<div class='alert alert-warning'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b> Some fields are missing, please fill it.....!</b>
		</div>

	";
	exit();
}
else{
if(!preg_match($name,$firstname))
{
	echo "<div class='alert alert-warning'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>!! your name $firstname is not valid !!</b>
		</div>";
	exit();
}

if(!preg_match($name,$lastname))
{
	echo "<div class='alert alert-warning'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>!! your lastname $lastname is not valid !!</b>
		</div>";
	exit();
}

if(!preg_match($emailValidation,$email))
{
	echo "<div class='alert alert-warning'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>!! your email $email is not valid !!</b>
		</div>";
	exit();
}

if(strlen($password)<9)
{
	echo "<div class='alert alert-warning'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>!! your password is weak !!</b>
		</div>";
	exit();
}

if($password!=$repassword)
{
	echo "<div class='alert alert-warning'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>!! your password is not same !!</b>
		</div>";
	exit();
}

if(!preg_match($number,$mobile))
{
	echo "<div class='alert alert-warning'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>!! your mobile number is not valid !!</b>
		</div>";
	exit();
}
if (!(strlen($mobile)==10))
{
	echo "<div class='alert alert-warning'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>!! invlaid moblie number digit !!</b>
		</div>";
	exit();
}
/*existing email address in out database*/
$sql= "SELECT user_id FROM user_info where Email='$email' LIMIT 1";
$check_query=mysqli_query($con,$sql);
$count_email=mysqli_num_rows($check_query);
if($count_email>0){
	echo"<div class='alert alert-danger'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>!! Email address already exist !!</b>
		</div>";
	exit();
}
else{
	$password=md5($password);
	$sql="INSERT INTO 
	`user_info` 
	(`user_id`, `First_Name`, `Last_Name`, `Email`, `Password`, `Moblie`, `Address1`, `Address2`) 
	VALUES (NULL, '$firstname', '$lastname', '$email', '$password', '$mobile', '$address1', '$address2');";
	$run_query=mysqli_query($con,$sql);
	if($run_query){
		echo "<div class='alert alert-success'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>!! Registration Successful !!</b>
		</div>";
	}
}
}



?>