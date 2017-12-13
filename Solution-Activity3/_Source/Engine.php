<?php

/* Copyright (c) 2017 Scott Schwarz (scottschwarz77@hotmail.com)
   For the full copyright and license information, please view the LICENSE file located in the top-level folder of this source code distribution. */

/* The Engine class is the main driver class that calls all of the other classes in the framework. */

class Engine {
	private static $globalSettings, $fileLocator, $outputBuffers, $foundFolder, $foundPage;

	public static function getOutputBuffers() {
		return self::$outputBuffers;
	}

	public static function getFoundFolder() {
		return self::$foundFolder;
	}

	public static function getFoundPage() {
		return self::$foundPage;
	}

	public static function getCurrentFoundPage() {
		return self::$foundFolder->getCurrentPage();
	}

	private static function loadGlobalSettings() {
		$filePath = "./_Global/settings.json";
		if (!file_exists($filePath))
			throw new Exception(LogMessage::CANNOT_FIND_GLOBAL_SETTINGS_FILE);
		self::$globalSettings = file_get_contents($filePath);
	}

	private static function getGlobalSettings() {
		$settingsJSON = json_decode(self::$globalSettings);
		if ($settingsJSON === null)
			throw new Exception(LogMessage::CANNOT_PARSE_GLOBAL_SETTINGS);
		else
			return $settingsJSON;
	} 

	private static function createOutputBuffers() {
		self::$outputBuffers = array();
		self::$outputBuffers['content'] = new ContentBuffer();
		self::$outputBuffers['log'] = new LogBuffer();
		writeToLog(LogMessage::LOG_DATE,date(DATE_RFC2822));
		writeToLog('');
	}

	/* Find the URL page's corresponding file in the filesystem. */
	private static function locatePageInFileSystem() {
		self::$fileLocator = new FileLocator();
		self::$fileLocator->run();
	}

	/* Create the found page object that contains the attributes and content of
	   the found page. Create the found folder object that contains the enclosing folder of the found page as well as methods for iterating to other pages in the folder */
	private static function createFoundPageAndFolder() {
		self::$foundFolder = new Folder(self::$fileLocator->foundFile);
		self::$foundPage = self::$foundFolder->getCurrentPage();
	}

	/* Display the global header, which is shown on every page. */
	private static function renderglobalHeader() {
		writeToLog('');
		writeToLog(LogMessage::RENDERING_TO_BROWSER);
		renderGlobalTemplate('HeaderTemplate');
	}

	/* Display the global footer, which is shown on every page. */
	private static function renderglobalFooter() {
		renderGlobalTemplate('FooterTemplate');
	}

	private static function getBodyTemplateName() {
		writeToLog(LogMessage::DETERMINE_BODY_TEMPLATE);
		if (URLParser::getPageName() != null) {
			$templateType = TemplateType::DETAIL;
			$templateName = "DetailTemplate";
			writeToLog(LogMessage::USE_DETAIL_TEMPLATE,$templateName.".php");	
			}
		else {
			$templateType = TemplateType::MASTER;
			$templateName = "MasterTemplate";
			writeToLog(LogMessage::USE_MASTER_TEMPLATE,$templateName.".php");	
		}
		return $templateName;
	}

	private static function renderBodyTemplate($templateClassName) {
		renderTemplate($templateClassName);
	}

	private static function commitOutputBuffer() {
		self::$outputBuffers['content']->commit();
	}

	private static function commitLogBuffer($logBufferType) {
		self::$outputBuffers['log']->commit($logBufferType);
	}

	/* The main driver function that does everything */
	public static function run() {
		self::createOutputBuffers();
		try {
			URLParser::run();
			self::loadGlobalSettings();
			$settings = self::getGlobalSettings();
			URLParser::writeURLInfoToLog();
			self::locatePageInFileSystem();
			self::createFoundPageAndFolder();
			self::renderglobalHeader();
			self::renderBodyTemplate(self::getBodyTemplateName());
			self::renderglobalFooter();
			self::commitOutputBuffer();
			self::commitLogBuffer(LogBufferType::FILE);
		} catch (Exception $e) {
			writeToLog($e->getMessage());
			self::commitLogBuffer(LogBufferType::HTML);
			self::commitLogBuffer(LogBufferType::FILE);
		}
		
	}	
}

?>