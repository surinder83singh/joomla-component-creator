<?php
/**
 * The ViewnjsTask Tasks handles creating and updating view files.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         CakePHP(tm) v 1.2
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('ViewTask', 'Console/Command/Task');

/**
 * Task class for creating and updating view files.
 *
 * @package       Cake.Console.Command.Task
 */
class ViewnjsTask extends ViewTask {

	/**
	 * Override initialize
	 *
	 * @return void
	 */
	public function initialize() {
		$this->path = current(App::path('View'));
		$this->pathJs = WWW_ROOT.'/js/core/';
	}
	/**
	 * Assembles and writes bakes the view and js file.
	 *
	 * @param string $action Action to bake
	 * @param string $content Content to write
	 * @return boolean Success
	 */
	
	public function bake($action, $content = '') {
		/*if ($content === true) {
			$content = $this->getContent($action);
		}
		if (empty($content)) {
			return false;
		}*/
		$this->out("\n" . __d('cake_console', 'Baking `%s` view file...', $action), 1, Shell::QUIET);
		/*$path = $this->getPath();
		$filename = $path . $this->controllerName . DS . Inflector::underscore($action) . '.ctp';
		$viewBakingResult = $this->createFile($filename, $content);
		return $this->bakeJs($action, $content);*/
	}
	
 	/**
	 * Assembles and writes bakes the js file.
	 *
	 * @param string $action Action to bake
	 * @param string $content Content to write
	 * @return boolean Success
	 */
	public function bakeJs($action, $content = '') {		
		$content = $this->Template->generate('js', 'core');		
		if (empty($content)) {
			return false;
		}
		$fileName = strtolower(Inflector::underscore($this->controllerName)) . '.js';
		$this->out("\n" . __d('cake_console', 'Baking `%s` js file...', $fileName), 1, Shell::QUIET);
		
		return  $this->createFile($this->pathJs .$fileName, $content);
	}

}
