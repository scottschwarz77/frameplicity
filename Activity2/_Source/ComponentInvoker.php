<?php

/* Copyright (c) 2017 Scott Schwarz (scottschwarz77@hotmail.com)
   For the full copyright and license information, please view the LICENSE file located in the top-level folder of this source code distribution. */

abstract class Component {
	abstract protected function render();
}

/* The ComponentInvoker class loads a component (if not already loaded) and invokes a component.
   There are two types of components: templates and widgets. */

class ComponentInvoker {
	
	private static function globalPrefix($isGlobal) {
		if ($isGlobal === true)
			return "_Global/";
		else
			return "";
	}

	private static function findClassPath($isGlobal, $componentClass, $componentType) {
		$classPath = "./".self::globalPrefix($isGlobal).$componentType."s/".$componentClass.".php";
		writeToLog(LogMessage::LOCATING_CLASS_PATH,$classPath);
		return $classPath;
	}
	private static function import($componentClass, $classPath) {
		if (file_exists($classPath)) {
			writeToLog(LogMessage::IMPORTING_CLASS_FILE,$classPath);
			require_once($classPath);
			if (!class_exists($componentClass)) {
				throw new Exception(Utility::applyLogMessage(LogMessage::CLASS_NOT_FOUND,$componentClass));
			}
		}
		else
			throw new Exception(Utility::applyLogMessage(LogMessage::FILE_NOT_FOUND,$classPath));
	}
	
	private static function invoke($componentClass) {
		if (method_exists($componentClass,"render")) {
			writeToLog(LogMessage::CREATING_NEW_CLASS_INSTANCE,$componentClass);
			$componentInstance = new $componentClass();
			$componentInstance->render();
		}
		else
			throw new Exception(Utility::applyLogMessage(LogMessage::RENDER_METHOD_NOT_FOUND,$componentClass));
	}
	public static function run($componentClass,$componentType,$isGlobal) {
			if (class_exists($componentClass))
				self::invoke($componentClass);
			else {
				$classPath = self::findClassPath($isGlobal,$componentClass,$componentType);
				self::import($componentClass,$classPath);
				self::invoke($componentClass);
			}
	}
	
	
}
?>