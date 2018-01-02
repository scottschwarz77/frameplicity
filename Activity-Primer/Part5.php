<?php
/* Copyright (c) 2017 Scott Schwarz (scottschwarz77@hotmail.com)
   For the full copyright and license information, please view the LICENSE file located in the top-level folder of this source code distribution. */

    function lineBreak() {
  		  echo "<br>";
  	}

  	class Class1 {
  		  public function getVal() {
  			   return 100;
  		}
  	}

  	class Class2 {
  		  private $c1;

  		  public function getVal() {
  			   $c1 = new Class1();
  			   return $c1;
  		  }
  	}


	   $a = new Class2();
	   $b = $a->getVal();
	   echo $b->getVal();
	   lineBreak();
	   echo $a->getVal()->getVal();

/* This code shows an example of "object chaining" where Class1 is instantiated
   inside of Class2. */ 
?>