<?php

namespace App\Controllers;

use App\Libs\Helper;

class LanguageController extends AbstractController
{
    use Helper;
    function defaultAction()
    {
        if ($_SESSION['lang'] == 'ar') {
            $_SESSION['lang'] = 'en';
        } else {
            $_SESSION['lang'] = 'ar';
        }
        $this->redirect('/customer');
    }
}