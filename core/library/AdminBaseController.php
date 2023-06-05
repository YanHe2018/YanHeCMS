<?php
/**
 * @author YanHe 2011-10-25
 * @copyright ©2003-2103 YHCMS
 * @license YHCMS
 * @version $Id: AdminBaseController.php 4420 2012-02-17 05:22:55Z xiaoxia.xuxx $
 * @package admin
 * @subpackage library
 */
class AdminBaseController extends WindController {
	/**
	 * 后台登录用户对象
	 *
	 * @var AdminUserDm
	 */
	protected $adminUser = null;

	/* (non-PHPdoc)
	 * @see WindSimpleController::beforeAction()
	 */
	public function beforeAction($handlerAdapter) {
		$this->adminUser = $this->getForward()->getVars('adminUser');
	}

	/* (non-PHPdoc)
	 * @see WindSimpleController::setDefaultTemplateName()
	 */
	protected function setDefaultTemplateName($handlerAdapter) {
		$template = $handlerAdapter->getController() . '_' . $handlerAdapter->getAction();
		$this->setTemplate(strtolower($template));
	}

	/**
	 * 显示信息
	 * 
	 * @param string $message 消息信息
	 * @param string $referer 跳转地址
	 * @param boolean $referer 是否刷新页面
	 * @param string $action 处理句柄
	 * @see WindSimpleController::showMessage()
	 */
	protected function showMessage($message = '', $referer = '', $refresh = false) {
		$this->addMessage('success', 'state');
		$this->addMessage($this->forward->getVars('data'), 'data');
		$this->showError($message, $referer, $refresh);
	}

	/**
	 * 显示错误
	 * 
	 * @param array $error array('',array())
	 */
	protected function showError($error = '', $referer = '', $refresh = false) {
		$referer && $referer = WindUrlHelper::createUrl($referer);
		$this->addMessage($referer, 'referer');
		$this->addMessage($refresh, 'refresh');
		parent::showMessage($error);
	}

}

?>