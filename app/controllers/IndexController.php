<?php

namespace App\controllers;

class IndexController extends AbstractController
{
    public function defaultAction() {
        $this->view();
    }

    public function addAction() {
        $this->view();
    }
}