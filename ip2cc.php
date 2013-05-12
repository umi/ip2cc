<?php
$file = './ipv4.txt';
$ipv4db = file($file);

echo ip2cc($ipv4db, $argv[1])."\n";

function ip2cc($ipv4db, $addr){
	if(!preg_match('/^(?:\d{1,3}\.){3}\d{1,3}$/', $addr, $match)) return false;

	$num = 0;
	foreach(explode('.', $addr) as $val){
		$num = ($num << 8) + $val;
	}
    $l = 0;
    $h = count($ipv4db);

    while ($l < $h) {
        $m = floor(($l + $h) / 2);
        list($start, $end, $cc) = explode("\t", rtrim($ipv4db[$m]));
        if ($start <= $num && $num <= $end)
            return $cc;
        elseif ($end < $num)
            $l = $m + 1;
		elseif ($start > $num)
            $h = $m - 1;
		else
            return false;
    }
}
