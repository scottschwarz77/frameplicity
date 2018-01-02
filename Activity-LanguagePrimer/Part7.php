<?php
/* Copyright (c) 2017 Scott Schwarz (scottschwarz77@hotmail.com)
   For the full copyright and license information, please view the LICENSE file located in the top-level folder of this source code distribution. */

   	function lineBreak() {
  		echo "<br>";
	}

	abstract class Shape {
		abstract protected function render();
	}

	class Triange extends Shape {
		public function render() {
			echo "Render triange here";
		}
	}

	class Square extends Shape {
		public function render() {
			echo "Render square here";
		}
	}

	$t = new Triange();
	$s = new Square();
	$t->render();
	lineBreak();
	$s->render();

/* An example of inheritance (an OOP concept) is shown here. The Frameplicity
   framework only uses inheritance in a situation such as the above, where the base
   class (Shape in this example) contains an "abstract" method redner that has no
   implementation. The derived classes (Triangle and Shape) implement the render method. */

?>