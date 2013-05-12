<?php
while($line = trim(fgets(STDIN))){
	@list($registry, $cc, $type, $start, $value, $tmp, $status) = explode("|", $line);
	if($type == 'ipv4' && ($status == 'allocated' || $status == 'assigned')){
		$num = 0;
		foreach(explode(".", $start) as $val){
			$num = ($num << 8) + $val;
		}
		echo $num,"\t",($num + $value - 1),"\t",$cc,"\n";
	}
}
