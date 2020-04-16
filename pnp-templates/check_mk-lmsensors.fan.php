<?php
# PNP4Nagios template for check_mk lmsensors.* check
# Author: Wouter de Geus <benv-check_mk@junerules.com>
# Inspired by check_mk-hp_blade_psu.php

$colors = array("00868B", "00C5CD", "00CD00", "9CCB19", "FFFFAA", "EEEE00", "42C0FB", "87CEFF");
$check_title = 'Fan speed';
$check_match = 'fan';

include_once("check_mk-lmsensors.php");

?>
