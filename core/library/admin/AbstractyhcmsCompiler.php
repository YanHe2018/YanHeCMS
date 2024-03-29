<?php
/**
 * @author YanHe 2011-12-23
 * @copyright ©2003-2103 YHCMS
 * @license YHCMS
 * @version $Id: AbstractPwCompiler.php 3620 2011-12-29 10:21:33Z YanHe $
 * @package wekit
 * @subpackage compile
 */
abstract class AbstractPwCompiler extends WindHandlerInterceptor {

	/**
	 * 编译实现类 
	 **/
	abstract public function doCompile();

	/* (non-PHPdoc)
	 * @see WindHandlerInterceptor::preHandle()
	 */
	public function preHandle() {
		$this->doCompile();
	}

	/* (non-PHPdoc)
	 * @see WindHandlerInterceptor::postHandle()
	 */
	public function postHandle() {

	}

}
?>