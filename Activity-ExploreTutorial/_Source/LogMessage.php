<?php

/* Copyright (c) 2017-2018 Scott Schwarz (scottschwarz77@hotmail.com)
   For the full copyright and license information, please view the LICENSE file located in the top-level folder of this source code distribution. */

class LogMessage {
	
	/* Log Setup */
	const LOG_DATE = "#### Log for %1 (UTC time) ####";
	const RENDERING_TO_BROWSER = "*** Rendering page to web browser ***";
	const URL_REQUEST_INFO = "*** URL request info ***";
	const URL_REQUEST = "URL requested from browser (without domain): %1";
	const URL_SITE_NAME = "=> Site name is: %1";
	const URL_PAGE_NAME = "=> Page name is: %1";
	const URL_QUERY_STRING = "=> Query string is: %1";

	/* Global settings file */
	const CANNOT_FIND_GLOBAL_SETTINGS_FILE = "Cannot find global settings file settings.json in _Global folder";
	const CANNOT_PARSE_GLOBAL_SETTINGS = "Cannot parse JSON config in global settings file";

	/* Finding the page in the file system */
	const SEARCH_FOR_FILE_GENERAL = "*** Searching for file in file system corresponding to URL page name ***";
	const SEARCH_FOR_FILE = "Searching for file path using regular expression %1";
	const FILE_PATH_NOT_FOUND = "File path not found";
	const FILE_PATH_FOUND = "=> File path found. Found file in file path: %1";
	const VERIFY_PAGES_FOLDER = "Verifying folder %1 exists in file system";
	const FOLDER_NOT_FOUND = "Folder %1 in file system not found";
	const FOLDER_FOUND = "=> Folder %1 found in file system";
	
	/* Finding the template */
	const DETERMINE_BODY_TEMPLATE = "Determining the type and name of body template to use (master or detail)";
	const USE_DETAIL_TEMPLATE = "=> Using the detail template (%1) since there is a page found in the Pages folder";
	const USE_MASTER_TEMPLATE = "=> Using the master driven template (%1) since there is no page found in the Pages folder";

	/* Importing and invoking a component */
	const LOCATING_CLASS_PATH = "Searching for class path at %1";
	const IMPORTING_CLASS_FILE = "Importing class file %1";
	const CLASS_NOT_FOUND = "Class %1 not found";
	const FILE_NOT_FOUND = "File %1 not found";
	const CREATING_NEW_CLASS_INSTANCE = "Creating instance of %1 class";
	const RENDER_METHOD_NOT_FOUND = "Render method not found";

	/* Page specific */
	const CANNOT_PARSE_PAGE_ATTRIBUTES = "Cannot find or parse JSON page attributes";
	const PAGE_ITERATOR_OUT_OF_BOUNDS = "Cannot access page in folder; page iterator out of bounds";
}
?>