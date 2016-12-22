<!doctype html>
<html lang="us-en">
	<head>
		<title>OTP</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8" />
		<link rel="stylesheet" href="css/font-awesome.css" type="text/css" />
		<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
		<style>
			#box{
				margin-left: 500px; 
				margin-right: 500px; 
				padding: 20px; 
				background-color: #bfbfbf;
				border-radius: 5px;
				padding-left: 30px;
				padding-right: 30px;
			}
		</style>
	</head>
	
	<body>
		<div class="jumbotron" style="background-color: #1a1a1a; color: white;">
			<h1 style="margin-left: 20px;">OTP Verification</h1>
		</div>
		<div id="box">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-horizontal">
				<div class="form-group">
					<label class="control-label">OTP:</label>
					<input type="password" class="form-control" name="otp" placeholder="One Time Password">
				</div>
				
				<button type="submit" class="btn btn-default" name="submit1" style="color: #000; font-weight: bold; margin-left: 0;">Login</button>
			</form>
		</div>
	</body>
</html>

<?php
session_start();
if(isset($_POST["submit1"]))
{	
	$id=$_SESSION['user_id'];
	$otp=$_POST['otp'];
	/*echo $otp;
	echo $id;*/
	if($otp==$_SESSION['otp'])
	{
		echo '<script>alert("You are authenticated.");</script>';
		include 'connection.php';
		$sql="UPDATE register SET Verified='1' WHERE Id='$id'";
		mysqli_query($conn,$sql);
		echo '<script>window.location.assign("key.php");</script>';
	}
	else{
		echo "<script>alert('Wrong OTP');</script>";
	}
}
?>