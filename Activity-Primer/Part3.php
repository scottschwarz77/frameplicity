<?php
/* Copyright (c) 2017 Scott Schwarz (scottschwarz77@hotmail.com)
   For the full copyright and license information, please view the LICENSE file located in the top-level folder of this source code distribution. */

  	$a = 5;
  	$b = 6;

  	function lineBreak() {
  		echo "<br>";
  	}

	class Class1 {
		private $a;
		public $d;

		function __construct($a) {
			$this->a = $a;
		}

		public function modifyValue() {
			$this->a = $this->a + 10;
		}

		public function getValue() {
			return $this->a;
		}

	}

	echo $a;
	lineBreak();
	$c1 = new Class1($a);
	$c2 = new Class1($b);
	$c1->d = 50;
	echo $c1->d;
	lineBreak();
	$c1->modifyValue();
	echo $c1->getValue();
	lineBreak();
	echo $a;
	lineBreak();
	$c2->modifyValue();
	echo $c2->getValue();
	lineBreak();
	echo $b;

/* This example shows an example use of a class in PHP. Note the user of the ->
   operator. This is used to access a non-static method or variable. The next
   part explains the difference between static and non-static. */

?>
