<?php 
			session_start();
			$x=$_POST['val'];
			if($_SESSION['count']>0){

				$_SESSION['data']=$_SESSION['data'].'/'.$x;
				//echo $_SESSION['data'];
				$_SESSION['count']++;
				//echo $_SESSION['data'].'<br/>';
			}
			
			include 'create_dir.php';
			createDirectory($_SESSION['data']);

?>