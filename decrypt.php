<html> 
<body> 
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
<input type="file" name="file" size="60" />
<input type="submit" value="Read Contents and Decrypt" />
</form>
</body>
</html>


<?php
if($_FILES){
	
 if($_FILES['file']['name'] != "") {

 if(isset($_FILES) && $_FILES['file']['type'] != 'text/plain') {

 echo "<span>File could not be accepted ! Please upload any '*.txt' file.</span>";

 exit();
  } 
  
  echo "<center><span id='Content'>Contents of ".$_FILES['file']['name']." File</span></center>";
  $fileName = $_FILES['file']['tmp_name'];
  
		exec('C:\wamp\www\CEL\fibdecry.exe');

  $file = fopen($fileName,"r") or exit("Unable to open file!");
	
 while(!feof($file)) {
 echo fgets($file). "";
 }
 
 while(!feof($file)) {
 echo fgetc($file);
 }
 fclose($file);
 }

 else {
 if(isset($_FILES) && $_FILES['file']['type'] == '')
	 echo "<span>Please Choose a file by click on 'Browse' or 'Choose File' button.</span>";
 }
}
?>
