<?php
$flg = 0;
$cc = '';
while($line = trim(fgets(STDIN))){
	list($s, $e, $c) = explode("\t", $line);
	if($c != $cc || $s != $end + 1){
		if($flg != 0){
			echo "{$start}\t{$end}\t{$cc}\n";
		}else{$flg = 1;}
		$start = $s;
	}
	$end = $e;
	$cc = $c;
}
echo "{$start}\t{$end}\t{$cc}\n";
