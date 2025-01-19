<?php

namespace App\Controllers;

use App\Libs\FrontController;

abstract class AbstractController
{
    protected $_controller;
    protected $_action;
    protected $_params;
    protected $_data = array();
    protected $_template;
    protected $_language;

    public function notFoundAction() {
        $this->view();
    }

    /**
     * @param mixed $controller
     */
    public function setController($controller)
    {
        $this->_controller = $controller;
    }

    /**
     * @param mixed $params
     */
    public function setParams($params)
    {
        $this->_params = $params;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->_action = $action;
    }

    public function view() {
        if ($this->_action == FrontController::NOT_FOUND_ACTION) {
            require_once VIEW_PATH . 'notfound' . DS . 'notfound' . '.view.php';
        } else {
            $view = VIEW_PATH . $this->_controller . DS . $this->_action . '.view.php';

            if(file_exists($view)) {
                $this->_data = array_merge($this->_data, $this->_language->getDictionary());
                $this->_template->setActionViewFile($view);
                $this->_template->setData($this->_data);
                $this->_template->renderApp();
            } else {
                require_once VIEW_PATH . 'notfound' . DS . 'noview.view.php';
            }
        }
    }

    /**
     * @param mixed $template
     */
    public function setTemplate($template)
    {
        $this->_template = $template;
    }

    /**
     * @param mixed $language
     */
    public function setLanguage($language)
    {
        $this->_language = $language;
    }


}