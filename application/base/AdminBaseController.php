<?php
/**
 * Created by PhpStorm.
 * User: Артур
 * Date: 04.04.2020
 * Time: 20:22
 */

namespace application\base;
use application\components\Auth;

class AdminBaseController
{
    protected $view;

    public function __construct()
    {
        $this->view = new BaseView();
        $this->view->setLayout('admin');
    }
}
