<?php

/* Copyright (c) 2017-2018 Scott Schwarz (scottschwarz77@hotmail.com)
   For the full copyright and license information, please view the LICENSE file located in the top-level folder of this source code distribution. */

/* The Folder class has methods for iterating through the pages in the folder found by the FileLocator class. Access a Folder object in a template or widget by calling Engine::getFoundFolder() */

class Folder {		
	private $folderName;
	private $fileName;
	private $currentFileIndex;
	private $fileNamesInFolder;
	
	function __construct($fileName) {
		$this->fileName = $fileName;
		
		$this->loadFileNames();

		if (is_null($this->fileName))
			$this->gotoFirstPage();
		else {
			$this->setCurrentFileIndex();
		}
	}

	public function getPageCount() {
		return count($this->fileNamesInFolder);
	}
	
	public function gotoFirstPage() {
		$this->currentFileIndex = 0;
	}
	
	public function gotoLastPage() {
		$this->currentFileIndex = count($this->fileNamesInFolder)-1;
	}
	
	public function advanceBy($offset) {
		$this->currentFileIndex += $offset;
	}

	public function iteratorInBounds() {
		return ($this->currentFileIndex >= 0) && ($this->currentFileIndex < count($this->fileNamesInFolder));
	}

	public function gotoNextPage() {
		$this->currentFileIndex++;
	}

	public function gotoPreviousPage() {
		$this->currentFileIndex--;
	}
	
	// Return the current file's position in a sorted list of the
	// folder's file names
	public function getCurrentPageIndex() {
		return $this->currentFileIndex;
	}
	
	// Returns the current page object (at currentFileIndex) in the folder
	public function getCurrentPage() {
		if ($this->iteratorInBounds())
			return new Page($this->folderName,$this->fileNamesInFolder[$this->currentFileIndex]);
		else
			throw new Exception(LogMessage::PAGE_ITERATOR_OUT_OF_BOUNDS);
	}
	// Find the index where the page is located in sorted folder array.
	private function setCurrentFileIndex() {
    	$index = 0;
    	foreach ($this->fileNamesInFolder as $f) {
        	if ($f == $this->fileName) {
            	$this->currentFileIndex = $index;
			}
        	$index++;
    	}
	}
	
	// Return sorted array of pages in folder
	private function loadFileNames() {
    	$this->fileNamesInFolder = array();
    	$dir = "./Pages/";
    	$handle = opendir($dir);
    	while (false !== ($entry = readdir($handle))) {
        	if (($entry != '.' && $entry != '..' && !is_dir($dir."/".$entry)))  
            	$this->fileNamesInFolder[] = $entry;
    	}
    	sort($this->fileNamesInFolder);
    	closedir($handle);
	}
	
}

?>