<?php
# PNP4Nagios template for check_mk lmsensors.* check
# Author: Wouter de Geus <benv-check_mk@junerules.com>
# Inspired by check_mk-hp_blade_psu.php

# check_title, check_match and colors defined by caller
if (!isset($colors[0]))
	$colors = array("FF0000", "00FF00", "0000FF");

if (!function_exists('getAllSensorFiles')) {
	function getAllSensorFiles($path, $check_match) {
		$files = array();
		if($h = opendir($path)) {
			while(($file = readdir($h)) !== false) {
				if(preg_match('/^Sensor_.*?'.$check_match.'.*\.rrd$/i', $file, $aRet))
					$files[] = $aRet[0];
			}
			natcasesort($files);
			closedir($h);
		}
		return $files;
	}
}

$path = dirname($RRDFILE[1]);
if(isset($check_match)) {
	$files = getAllSensorFiles($path, $check_match);
} elseif(preg_match('/^Sensor_([a-zA-Z]+)/', basename($RRDFILE[1]), $aRet)) {
	$check_match = $aRet[1];
	$files = getAllSensorFiles($path, $check_match);
} else {
	$files = array($RRDFILE[1]);
}

$opt[0] = "-l 0 --title \"$check_title\" ";
$def[0] = '';

$i = 0;
foreach($files AS $file) {
	$color = array_shift($colors); array_push($colors, $color);

	$name  = str_replace('_', ' ', str_replace('.rrd', '', $file));

	$def[0] .= "DEF:var$i=$path/$file:$DS[1]:AVERAGE " ;
	$vt = $name;
	if (strlen($vt) < 24)
		$vt .= str_repeat (' ', 24 - strlen($name));

	if($i == 0)
		$def[0] .= "LINE2:var$i#$color:\"$vt\" " ;
	else
		$def[0] .= "LINE2:var$i#$color:\"$vt\" " ;
	$def[0] .= "GPRINT:var$i:LAST:\"%6.1lf last \" ";
	$def[0] .= "GPRINT:var$i:MAX:\"%6.1lf max \" ";
	$def[0] .= "GPRINT:var$i:AVERAGE:\"%6.2lf  avg \\n\" ";
	$i++;
}
?>
