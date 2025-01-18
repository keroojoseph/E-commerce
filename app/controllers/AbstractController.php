<?php

namespace App\controllers;

use App\lib\FrontController;

abstract class AbstractController
{
    protected $_controller;
    protected $_action;
    protected $_params;

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
                require_once $view;
            } else {
                require_once VIEW_PATH . 'notfound' . DS . 'noview.view.php';
            }
        }
    }


}