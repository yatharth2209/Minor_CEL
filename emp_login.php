<?php
	session_start();

	include 'connection.php';
	date_default_timezone_set("Asia/Kolkata");
	$date = date('Y-m-d', time());
	$time = date('H:i:s',time());
	$fname="";
	$lname="";
	$serial="";
	$id=$_SESSION['id'];
	$div=$_SESSION['div'];
	$pass=$_SESSION['pass'];
	//echo $id.$div.$pass;


		$get ="SELECT * FROM register WHERE Id='$id' AND Password='$pass' AND Division='$div'";
		//echo $get;
		$q = $conn->query($get);

		$row1=$q->fetch_assoc();

		if(!$q) 
		{
   			echo 'Details not correct';
			
		}
		
		else 
		{		
				$verified = $row1['Verified'];
   				$approved = $row1['Approved'];
   				$name1=$row1['Fname'];
   				$name2=$row1['Lname'];
   				$name=$name1." ".$name2;
   				$count="";

    		if($id == $row1['Id'] AND $pass==$row1['Password'] AND $verified == "1" AND $approved == "1")
				{
					$count=$count+1;
					$sql = "insert into log (name,email,date,time) values ('$name','$id','$date','$time')";
					mysqli_query($conn,$sql);
					include 'create_dir.php';
					$_SESSION['data']='/TEST PROJECT/'.$div;
					$_SESSION['count']++;
					
					createDirectory($_SESSION['data']);
				}
		
			else 
				{
					echo "You are not authorized to enter";
				}
		}	
	
	mysqli_select_db ($conn,$dbname);

    mysqli_close($conn)

?>
<head>
  <link rel="stylesheet" href="css/bootstrap.css" />
  <style type="text/css">
  	#livesearch{
  		margin-left: 850px;
  		margin-right: 100px;
  		background-color: white;
  		border-radius: 5px; 
  	}
  	#search_box{
  		margin-left: 850px;
  	}
  </style>
<div class="container">
<div class="jumbotron" style="position: absolute; left: 0; top: 0; width: 100%; background-color: #1a1a1a; color: white;">
	<h1 style="margin-left: 20px;"><?php echo $div; ?></h1>
</div>
</div>
<body style="margin-top: 250px;">
<div id="result"></div>
</body>
</html>
