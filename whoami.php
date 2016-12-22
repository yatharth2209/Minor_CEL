<?php
//system('simple_videofacerec.exe');
exec( 'simple_videofacerec.exe', $output);
echo implode(",",$output);
?>