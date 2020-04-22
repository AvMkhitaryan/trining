<?php
/**
 * Created by PhpStorm.
 * User: Артур
 * Date: 04.04.2020
 * Time: 20:17
 */

namespace application\base;

class BaseView
{
    public $basePath = "application/views/";
    protected $title;
    protected $layout;

    public function render($content, $data)
    {
        include_once $this->basePath."layout/".$this->layout.'.php';
    }

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }
}