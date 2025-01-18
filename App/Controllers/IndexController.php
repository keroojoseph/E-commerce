<?php

namespace App\Controllers;

class IndexController extends AbstractController
{
    public function defaultAction() {
        $this->view();
    }

    public function addAction() {
        $this->view();
    }
}