<?php
/* Copyright (c) 2017 Scott Schwarz (scottschwarz77@hotmail.com)
   For the full copyright and license information, please view the LICENSE file located in the top-level folder of this source code distribution. */

  	$a = 5;

  	function lineBreak() {
  		echo "<br>";
  	}

	function f1($a) {
		$a = 10;
		echo $a;
		lineBreak();
		$a = 20;
	}

	echo $a;
	lineBreak();
	f1($a);
	echo $a;

/* This example demomstrates global variable scope vs scope of variable within
   a function. */
?>