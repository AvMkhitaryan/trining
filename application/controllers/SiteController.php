<?php
/**
 * Created by PhpStorm.
 * User: Артур
 * Date: 04.04.2020
 * Time: 20:27
 */

namespace application\controllers;

use application\base\BaseController;
use application\components\Auth;

class SiteController extends BaseController
{
    public function actionIndex()
    {
        $this->view->setTitle('home');
        $this->view->render('site/index', []);

        return true;
    }

    public function actionContact()
    {
        $this->view->setTitle('contact');
        $this->view->render('site/contact', []);

        return true;
    }

    public function actionError()
    {
        $this->view->setLayout('error');
        $this->view->setTitle('error');
        $this->view->render('', []);

        return true;
    }

    public function actionLogout()
    {
        $this->view->render('user/logout', []);
    }
}