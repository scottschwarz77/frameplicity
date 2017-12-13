<?php

/* Copyright (c) 2017 Scott Schwarz (scottschwarz77@hotmail.com)
   For the full copyright and license information, please view the LICENSE file located in the top-level folder of this source code distribution. */

/* The Page class has methods that return the body (the content) and attributes of a page. Access a
   page object in a template or widget by calling Engine::getFoundPage() or Engine::getCurrentFoundPage() */

class Page {

	private $folderName;
	private $fileName;
	private $wholePage;
	private $attributes;
	private $body;

 	function __construct($folderName,$fileName) {
 		$this->folderName = $folderName;
 		$this->fileName = $fileName;
 		$this->loadPage();
 		$this->extractPage();
 	}
	
	public function getFileName() {
		return $this->fileName;
	}

	public function getURL() {
		return URLParser::getBaseURL()."/".Utility::getPageNameFromFileName($this->fileName)."/";
	}

	public function getAttributes() {
		return $this->attributes;
	}
	
	public function getBody() {
		return $this->body;
	}

	private function loadPage() {
		$this->wholePage = file_get_contents("./Pages/".$this->folderName."/".$this->fileName);
	}

	public function convertPageToHTML($str) {
		$str = nl2br($str);
		$str = str_replace("%FLAT_BASEURI%",URLParser::getBaseURL(),$str);
		return $str;
	}

	private function extractPage() {
		$openingBracketPos = strpos($this->wholePage,"{");
		$closingBracketPos = strpos($this->wholePage,"}");
		if ( ($openingBracketPos === false) || ($openingBracketPos === false) )
			throw new Exception(LogMessage::CANNOT_PARSE_PAGE_ATTRIBUTES);
		$JSONString = substr($this->wholePage,$openingBracketPos,$closingBracketPos-$openingBracketPos+1);
		$this->attributes = json_decode($JSONString);
		if ($this->attributes === null)
			throw new Exception(LogMessage::CANNOT_PARSE_PAGE_ATTRIBUTES);
		$this->body = $this::convertPageToHTML(substr($this->wholePage,$closingBracketPos+1));
	}

}

?>