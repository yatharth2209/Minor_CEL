<html> 
<head>
<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
<style type="text/css">
  body{
    background-color: #1a1a1a;
  }
</style>
</head>
<body> 
<form style="margin-top: 50px;" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
<input type="file" name="file" size="60" class="form-control" />
<button type="submit" class="btn btn-info">Submit</button>
</form>
</body>
</html>

<?php
if ($_FILES){
$q=basename($_FILES['file']['name'],".txt");
echo $q;
echo "<br>";

$getText = file_get_contents($q.".txt", true);
$words = array("Solar","Accounts","Tenders","material","cell");

  $Solar = substr_count($getText, "Solar");
  $Tenders = substr_count($getText, "Tenders");
  $Accounts = substr_count($getText, "Accounts");
  $Material = substr_count($getText, "material");
  $Cell = substr_count($getText, "cell");

  $final=array("Solar"=>"$Solar", "Tenders"=>"$Tenders", "Accounts"=>"$Accounts","material"=>"$Material", "cell"=>"$Cell");
  arsort($final);
  foreach($final as $key=>$value)
  {
  	echo "$key : $value"; 
  	echo "<br>";
  }
  reset($final);
  $first_key = key($final);
  echo $first_key;

  
//$dir = "C:\wamp\www\CEL";
$dirNew = "C:\wamp\www\CEL\TEST PROJECT\\" . $first_key . "\\" . $q .".txt";

  if(copy("text.txt",$dirNew) == 1)
  {
    echo "hh";
  }
}
?>