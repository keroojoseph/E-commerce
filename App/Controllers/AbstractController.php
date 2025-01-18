<?php

namespace App\Controllers;

use App\Libs\FrontController;

abstract class AbstractController
{
    protected $_controller;
    protected $_action;
    protected $_params;
    protected $_data = array();

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
                extract($this->_data);
                require_once TEMPLATE_PATH . 'templateHeaderStart.php';
                require_once TEMPLATE_PATH . 'templateHeaderEnd.php';
                require_once TEMPLATE_PATH . 'header.php';
                require_once TEMPLATE_PATH . 'nav.php';
                require_once TEMPLATE_PATH . 'wrapperStart.php';
                require_once $view;
                require_once TEMPLATE_PATH . 'wrapperEnd.php';
                require_once TEMPLATE_PATH . 'footer.php';
                require_once $view;
            } else {
                require_once VIEW_PATH . 'notfound' . DS . 'noview.view.php';
            }
        }
    }


}