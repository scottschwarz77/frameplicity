<?php

/* Copyright (c) 2017 Scott Schwarz (scottschwarz77@hotmail.com)
   For the full copyright and license information, please view the LICENSE file located in the top-level folder of this source code distribution. */

/* The OutputBuffer class stores that content that is rendered in the browser after the user requests
   a URL. The LogBuffer class stores log messages and errors that are generated as the framework
   processes the URL requested by the user. */

class ContentBuffer {
	protected $text;

	public function write($newText) {
		$this->text = $this->text.$newText;
	}

	public function commit() {
		echo $this->text;
	}
}

class LogBufferType {
	const FILE = 0;
	const HTML = 1;
}

class LogBuffer {
	const LINEBREAK = '<<line break>>';
	private $text;

	public function write($args) {
		$newText = Utility::applyLogMessage2($args);
		$this->text = $this->text.$newText.self::LINEBREAK;
	}

	private function endOfLineCharacters($logBufferType) {
		if ($logBufferType == LogBufferType::HTML)
			return "<br>";
		else if ($logBufferType == LogBufferType::FILE)
			return "\r\n";
	}

	private function commitLogFile($commitedText) {
		$existingLogFileContents = file_get_contents("./_Global/logs.txt");
		if ($existingLogFileContents === FALSE)
			$existingLogFileContents = "";
		$logFile = fopen("./_Global/logs.txt","w");
		fwrite($logFile,$commitedText);
		fwrite($logFile,$existingLogFileContents);
		fclose($logFile);
	}

	public function commit($logBufferType) {
		writeToLog('');
		$committedText = str_replace(self::LINEBREAK,$this->endOfLineCharacters($logBufferType),$this->text);
		if ($logBufferType == LogBufferType::HTML) 
			echo $committedText;
		//else 
			//$this->commitLogFile($committedText);
	}
}

?>