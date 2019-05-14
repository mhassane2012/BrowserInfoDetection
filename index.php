<?php
/***************************************************************************************
								Using Class BrowserInfoDetection
***************************************************************************************/
require('browserInfoDetection.php');

$brInfoDetect = new BrowserInfoDetection();

echo $brInfoDetect->action();
