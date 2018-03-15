<?php

/* Copyright (c) 2017 Scott Schwarz (scottschwarz77@hotmail.com)
   For the full copyright and license information, please view the LICENSE file located in the top-level folder of this source code distribution. */

/* Given the request URL (the web address the user typed in the browser), the FileLocator class finds
   the URL page's corresponding file in the filesystem. */

class FileLocator {
	 
	public $foundFile;

	public function verifyPagesFolderExists() {
		$dirToSearch = "./Pages/";
		writeToLog(LogMessage::VERIFY_PAGES_FOLDER,$dirToSearch);
		if (is_dir($dirToSearch))
			writeToLog(LogMessage::FOLDER_FOUND,$dirToSearch);
		else
			throw new Exception(Utility::applyLogMessage(LogMessage::FOLDER_NOT_FOUND,$dirToSearch));
	}

	public function locatePageFile() {
		$searchFilePathPages = "./Pages/[0-9][0-9]-".URLParser::getPageName();//.".*";
		writeToLog('');
		writeToLog(LogMessage::SEARCH_FOR_FILE_GENERAL);
		writeToLog(LogMessage::SEARCH_FOR_FILE,$searchFilePathPages);
		$searchResult = glob($searchFilePathPages);
		if ($searchResult) {
			$this->foundFile = Utility::getFileNameFromFullPath($searchResult[0]);
			writeToLog(LogMessage::FILE_PATH_FOUND,$this->foundFile);
		}
		else {
			throw new Exception(Utility::applyLogMessage(LogMessage::FILE_PATH_NOT_FOUND));

		}
	}

	public function run() {
		$this->foundFile = null;
		$this->verifyPagesFolderExists();
		if (URLParser::getPageName() != null)
			$this->locatePageFile();
	}

}

?>