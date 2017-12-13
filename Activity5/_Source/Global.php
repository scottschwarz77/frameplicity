<?php

/* Copyright (c) 2017 Scott Schwarz (scottschwarz77@hotmail.com)
   For the full copyright and license information, please view the LICENSE file located in the top-level folder of this source code distribution. */

/* This file contains wrapper functions that are called often by templates and widgets as well as
   by classes in the framework. Because these functions should be easily accessible, they are not placed in a class (e.g. the Utility class) and instead located in this file. */

abstract class TemplateType {
	const DETAIL = 0;
	const MASTER = 1;
}

/* Wrapper output functions */

function writeToLog() {
	$ob = Engine::getOutputBuffers();
	$args = func_get_args();
	$ob['log']->write($args);
}

function emit($text) {
	$ob = Engine::getOutputBuffers();
	$ob['content']->write($text);
}

/* Wrapper functions to invoke components */

function renderGlobalTemplate($componentClass) {
	ComponentInvoker::run($componentClass,"Template",true);
}
	
function renderGlobalWidget($componentClass) {
	ComponentInvoker::run($componentClass,"Widget",true);
}
	
function renderTemplate($componentClass) {
	ComponentInvoker::run($componentClass,"Template",false);
}

function renderWidget($componentClass) {
	ComponentInvoker::run($componentClass,"Widget",false);
}

?>