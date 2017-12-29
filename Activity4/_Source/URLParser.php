<?php

/* Copyright (c) 2017 Scott Schwarz (scottschwarz77@hotmail.com)
   For the full copyright and license information, please view the LICENSE file located in the top-level folder of this source code distribution. */

/* The URLParser class contains methods that retrieve the different parts of the request URL. */

class URLParser {
	/*** Functions to get parts of the request URL ***/
	private static $segments;

	public static function getURL() {
		return $_SERVER['REQUEST_URI'];
	}

	public static function getSiteName() {
		return Utility::checkArrayKeyExists('siteName',self::$segments);
	}

	public static function getPageName() {
		return Utility::checkArrayKeyExists('pageName',self::$segments);
	}

	public static function getQueryString() {
		return parse_url($_SERVER['REQUEST_URI'],PHP_URL_QUERY);
	}
	public static function getQueryStringFieldValue($fieldName) {
		parse_str(self::getQueryString(),$queryStringArr);
		if (array_key_exists($fieldName,$queryStringArr))
			return $queryStringArr[$fieldName];
		else
			return null;
	}

	public static function makeSegments() {
		$request = explode('/',$_SERVER['REQUEST_URI']);
		list(self::$segments['first'],self::$segments['siteName'],self::$segments['pageName']) = explode('/',$_SERVER['REQUEST_URI']);
		list(self::$segments['pageName']) = explode('?',self::$segments['pageName']);
		}
		
	public static function getBaseURL() {
		if (self::getSiteName() <> null)
			return "http://".$_SERVER['HTTP_HOST']."/".self::getSiteName();
		else
			return "http://".$_SERVER['HTTP_HOST'];
	}

	private static function getSegmentCount() {
		return count(explode('/',$_SERVER['REQUEST_URI']));
	}

	public static function writeURLInfoToLog() {
		writeToLog(LogMessage::URL_REQUEST_INFO);
		writeToLog(LogMessage::URL_REQUEST,Utility::replaceNullWithEmpty(self::getURL()));
		writeToLog(LogMessage::URL_QUERY_STRING,Utility::replaceNullWithEmpty(self::getQueryString()));
		writeToLog(LogMessage::URL_SITE_NAME,Utility::replaceNullWithEmpty(self::getSiteName()));
		writeToLog(LogMessage::URL_PAGE_NAME,Utility::replaceNullWithEmpty(self::getPageName()));
	}

	public static function run() {
		self::makeSegments();
	}
}

?>