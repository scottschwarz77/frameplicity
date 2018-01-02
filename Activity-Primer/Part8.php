<?php
/* Copyright (c) 2017 Scott Schwarz (scottschwarz77@hotmail.com)
   For the full copyright and license information, please view the LICENSE file located in the top-level folder of this source code distribution. */

	function lineBreak() {
  		echo "<br>";
	}

    $jsonStr = '{"a":"10","b":"50"}';
    $jsonArray = json_decode($jsonStr);
    echo $jsonArray->{'a'};
    lineBreak();
    echo $jsonArray->{'b'};

/* JSON is a convienent way of storing name/value pairs as well as more complex data.
   An example JSON string is shown above. PHP has the built-in json_decode function that can be used to extract the values */
?>