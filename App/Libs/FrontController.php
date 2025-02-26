<?php

namespace App\Libs;

class FrontController
{
    const NOT_FOUND_CONTROLLER = 'App\Controllers\NotFoundController';
    const NOT_FOUND_ACTION = 'notFoundAction';

    private $_controller = 'index';
    private $_action = 'default';
    private $_params = array();
    private $_template;
    private $_language;

    public function __construct(Template $template , Language $language)
    {
        $this->_language = $language;
        $this->_template = $template;
        $this->_parseUrl();
    }

    private function _parseUrl() {
        $url = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), 3);

        if(isset($url[0]) && $url[0] != '') {
            $this->_controller = $url[0];
        }

        if(isset($url[1]) && $url[1] != '') {
            $this->_action = $url[1];
        }

        if(isset($url[2]) && $url[2] != '') {
            $this->_params = explode('/', $url[2]);
        }
    }

    public function dispatch() {
        $controllerClassName = 'App\Controllers\\' . ucfirst($this->_controller) . 'Controller';
        $actionName = $this->_action . 'Action';

        if(!class_exists($controllerClassName)) {
            $this->_controller = $controllerClassName = self::NOT_FOUND_CONTROLLER;
        }
        $controller = new $controllerClassName();

        if(!method_exists($controller, $actionName)) {
            $this->_action = $actionName = self::NOT_FOUND_ACTION;
        }
        $controller->setController($this->_controller);
        $controller->setAction($this->_action);
        $controller->setParams($this->_params);
        $controller->setTemplate($this->_template);
        $controller->setLanguage($this->_language);
        $controller->$actionName();
    }
}
