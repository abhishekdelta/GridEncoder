<?php
require_once('gridencoder.lib.php');
echo "INTEGER \t==> ENCODED \t\t==> DECODED\n";
for($var=0;$var<10;$var++){
	$enc = gridEncode($var);
	echo $var." \t\t==> ".$enc." \t==> ".gridDecode($enc)."\n";
}
for($var=100000000;$var<100000010;$var++){
	$enc = gridEncode($var);
	echo $var." \t==> ".$enc." \t==> ".gridDecode($enc)."\n";
}
?>
