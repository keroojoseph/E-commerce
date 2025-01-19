<?php

namespace App\Controllers;

class IndexController extends AbstractController
{
    public function defaultAction() {
        $this->_language->load('template.comman');
        $this->view();
    }

    public function addAction() {
        $this->_language->load('template.comman');
        $this->view();
    }
}