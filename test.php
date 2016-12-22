<html>
<head>
<title>py script</title>
</head>
<body>
<h1>hey there!</h1>
<?
$pyscript = 'C:\wamp\www\CEL\spider.py';
$python = 'C:\Users\hp\AppData\Local\Programs\Python\Python35-32\python.exe';
$command=escapeshellcmd('C:\wamp\www\CEL\spider.py');
$output=shell_exec($command);
echo $output;
?>
</body>
</html>