<?php
/* Copyright (c) 2017 Scott Schwarz (scottschwarz77@hotmail.com)
   For the full copyright and license information, please view the LICENSE file located in the top-level folder of this source code distribution. */

  	function lineBreak() {
  		echo "<br>";
  	}

  	class Class1 {
  		public function raiseException1($a) {
  			try {
  				if ($a == 10)
  					throw new Exception("Variable a cant have value 10");
  			} 
  			catch (Exception $e) {
  				echo $e->getMessage();
  			}
  		}

  		public function raiseException2() {
  			throw new Exception("Raised exception not in try-catch block");
  		}
  	}

  	$c1 = new Class1();
  	$c1->raiseException1(10);
  	try {
		$c1->raiseException2();
		lineBreak();
		echo "This line shouldnt be printed";
  	}
  	catch (Exception $e) {
  		lineBreak();
		echo $e->getMessage();
  	}

/* Exceptions are used to make error handling more elegant and maintainable. This
   example demonstrates throwing and catching exceptions. */

?>