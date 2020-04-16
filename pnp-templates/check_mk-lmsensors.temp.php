<?php
# PNP4Nagios template for check_mk lmsensors.* check
# Author: Wouter de Geus <benv-check_mk@junerules.com>
# Inspired by check_mk-hp_blade_psu.php

$colors = array("FF0000", "E38217", "FCD116", "8B7500", "C73F17", "EE4000", "691F01", "FF7722");
$check_title = 'Temperature';
$check_match  = 'temp';

include_once("check_mk-lmsensors.php");

?>
