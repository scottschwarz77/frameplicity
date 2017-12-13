<?php

/* Copyright (c) 2017 Scott Schwarz (scottschwarz77@hotmail.com)
   For the full copyright and license information, please view the LICENSE file located in the top-level folder of this source code distribution. */

/* The Utility class contains methods that are called by other classes in the framework. */

class Utility {

	public static function applyLogMessage2($args) {
		$text = $args[0];
		$count = 0;
		foreach ($args as $input) {
			if ($count >= 1) {
				$text = str_replace("%".$count,$input,$text);
			}
			$count++;
		}
	return $text;
	}

	public static function applyLogMessage() {
		return self::applyLogMessage2(func_get_args());
	}

	public static function checkArrayKeyExists($key,$arr) {
		 if (array_key_exists($key,$arr))
		 	return $arr[$key];
		 else
		 	return null;
	}

	public static function replaceNullWithEmpty($val) {
		if ( ($val == null) || ($val == '') )
			return "[empty]";
		else
			return $val;
	}

	public static function getPageNameFromFileName($fileName) {
  		$tempStr = substr($fileName,3,strlen($fileName)-3); 
   		//$tempStr = substr($fileName,0,strlen($fileName)-4);
    	return $tempStr;
	}

	public static function strInsert($sourceStr,$insertStr,$insertPos) {
		return substr($sourceStr,0,$insertPos).$insertStr.
			substr($sourceStr,$insertPos);
	}

	public static function getFileNameFromFullPath($fullPath) {
		$parts = explode('/',$fullPath);
		return $parts[sizeof($parts)-1];
	}
	
}

?>