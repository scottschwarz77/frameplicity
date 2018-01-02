<?php
/* Copyright (c) 2017 Scott Schwarz (scottschwarz77@hotmail.com)
   For the full copyright and license information, please view the LICENSE file located in the top-level folder of this source code distribution. */

  	$a = 5;

  	function lineBreak() {
  		echo "<br>";
  	}

  	class Helper {
  		public function getVal() {
  			return 100;
  		}
  	}

	class Class1 {
		private static $a;
		private $h1;
		private $h2;

		public static function setValue($a) {
			self::$a = $a;
		}
	
		public static function modifyValue() {
			self::$a = self::$a + 10;
		}

		public static function getValue() {
			return self::$a;
		}

		public static function showHelperVal() {
			$h1 = new Helper();
			$h2 = new Helper();
			echo $h1->getVal();
			lineBreak();
			echo $h2->getVal();
		}

	}

	echo $a;
	lineBreak();
	Class1::setValue($a);
	Class1::modifyValue();
	echo Class1::getValue();
	lineBreak();
	echo Class1::showHelperVal();
	lineBreak();
	echo $a;

/* Static entities only have one instance. Using static keyword in PHP can be tricky. 
   Frameplicity uses static mostly to differentiate static from non-static classes. So 
   for example, the Engine class in Frameplicity cannot be instantiated more than once
   because there is only one Engine. In PHP, there is no single setting to mark a
   entire class as static. Instead, you must designate individual components of the
   class as static. Whenever Frameplicity defines a static class, it designates all 
   of its methods as static. Attributes (local variables within the class) may be
   designated as static or non-static depending on the situation. By default in PHP,
   all declarations are non-static unless marked with the "static" keyword.

   Note that within a static class, "$this" cannot be used. Instead "self" must be used. 
/*

?>
