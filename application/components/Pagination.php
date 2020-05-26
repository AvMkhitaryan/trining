<?php

namespace application\components;

use application\components\Db;
use application\models\Order;

class Pagination
{
    private $max;
    private $total;
    private $current_page;
    private $notes_on_page;
    private $path;
    private $count;
    private $get;
    private $table;

    public function __construct($table, $path, $max)
    {
        $this->path = $path;
        $this->table = $table;
        $this->max = $max;
    }

    public function count()
    {
        $c = Order::DbCount($this->table);
        $this->count = $c;

        return $c;
    }

    public function get()
    {
        if (!empty($_GET)) {
            return $_GET['page'];
        }
    }

    public function numberOfStrange()
    {
        if (!empty($this->count())) {
            $strong = $this->count();

            $count = ceil($strong / $this->max);

            if ($count > 1) {
                return $count;
            } else {
                return 1;
            }
        }
    }

    public function Buttons()
    {
        if (!empty($this->get())) {
            return $this->get();
        } else {
            return 1;
        }
    }

    public function ThreeButtonsPage()
    {
        $pageNum = $this->Buttons();
        $pageCount = $this->numberOfStrange();
        $ForStart = "";
        $maxFor = "";
        if ($pageNum == 1) {
            $ForStart = 1;
            $maxFor = $ForStart + 1;
        }

        if ($pageNum > 1 && $pageNum < $pageCount) {

            $ForStart = $pageNum - 1;
            $maxFor = $ForStart + 2;

        }

        if ($pageNum > 1 && $pageNum == $pageCount) {
            if ($pageNum > 2) {
                $ForStart = $pageNum - 2;
                $maxFor = $ForStart + 2;

            } else {
                $ForStart = $pageNum - 1;
                $maxFor = $ForStart + 1;

            }
        }
        for ($i = $ForStart; $i <= $maxFor; $i++) {
            echo "<a href=\"$this->path?page=$i\" class='btn btn-outline-dark'>" . $i . "</a>";
        }
//        if ($pageNum=1){
//            echo $MAxButton=$pageNum+2;
//            for ($i=$pageNum;$i<=$MAxButton;$i++){
//                echo "<a href=\"$this->path?page=$i\" class='btn btn-outline-dark'>".$i."</a>";
//            }
//        }
//        if ($pageNum>1&&$pageNum<$pageCount){
//            $pageNum=$pageNum-1;
//            $MAxButton=$pageNum+2;
//
//            echo $pageNum." ".$MAxButton;
//            for ($i=$pageNum;$i<=$MAxButton;$i++){
//                echo "<a href=\"$this->path?page=$i\" class='btn btn-outline-dark'>".$i."</a>";
//            }
//        }
//        for ($i=$pageNum;$i<=$MAxButton;$i++){
//            echo "<a href=\"$this->path?page=$i\" class='btn btn-outline-dark'>".$i."</a>";
//        }
//        if ($pageCount>1&&$pageNum>1){
//
//            echo $pageNum." ".$pageCount;
////            if ($pageCount){
////
////            }
//        }
//        $MAxButton=$pageNum+2;
//        $pageCount=$this->numberOfStrange();
//        if ($pageCount>1){
//            for ($i=$pageNum;$i<=$MAxButton;$i++){
//                echo "<a href=\"$this->path?page=$i\" class='btn btn-outline-dark'>".$i."</a>";
//            }
//        }

    }


    public function BigPrev()
    {
        if (!empty($this->numberOfStrange()) && $this->numberOfStrange() > 1) {
            return "<a href=\"$this->path?page=1\" class='btn btn-outline-dark'><i class=\"fa fa-backward\" aria-hidden=\"true\"></i></a>";
        } else {
            return "BIG prev else";
        }
    }

    public function BigNext()
    {
        if (!empty($this->numberOfStrange()) && $this->numberOfStrange() > 1) {
            $beforeNext = $this->numberOfStrange();
            return "<a href=\"$this->path" . "?page=$beforeNext\" class='btn btn-outline-dark'><i class=\"fa fa-forward\" aria-hidden=\"true\"></i></a>";
        } else {
            return "BIG NEXT else";
        }
    }

    public function OnePrev()
    {
        if (!empty($this->numberOfStrange()) && $this->numberOfStrange() > 1) {
            $pageNum = $this->Buttons();
            $pageCount = $this->numberOfStrange();
            if ($pageNum == 1) {
                $ButtonNumber = $this->Buttons();
            } else {
                $ButtonNumber = $this->Buttons() - 1;
            }
            return "<a href=\"$this->path" . "?page=$ButtonNumber\" class='btn btn-outline-dark'><i class=\"fa fa-caret-left\" aria-hidden=\"true\"></i></a>";
        } else {
            return "Ore prev else";
        }
    }

    public function OneNext()
    {
        if (!empty($this->numberOfStrange()) && $this->numberOfStrange() > 1) {
            $pageNum = $this->Buttons();
            $pageCount = $this->numberOfStrange();
            if ($pageNum == $pageCount) {
                $ButtonNumber = $this->Buttons();
            } else {
                $ButtonNumber = $this->Buttons() + 1;
            }
            return "<a href=\"$this->path" . "?page=$ButtonNumber\" class='btn btn-outline-dark'><i class=\"fa fa-caret-right\" aria-hidden=\"true\"></i></a>";
        } else {
            return "Ore NEXT else";
        }
    }

    public function PaginationTrue()
    {
        if (!empty($this->count())) {
            if ($this->count() > $this->max) {
                return true;
            }
        }
    }

    public function PagCount()
    {
        if (!empty($this->PaginationTrue())) {
            if ($this->PaginationTrue() == true) {
                $pg = $this->get();
                $countPG = $this->numberOfStrange();
                echo "<div style='font-size: 20px;' class='d-flex justify-content-center'>Page $pg OF $countPG</div>";
            }
        }
    }

//    public function Buttons(){
//        if (!empty($this->numberOfStrange())){
//
//            if ($this->numberOfStrange()>1){
//
//            }
//        }
//
//    }


//    public function html()
//    {
//        $html = '';
//        $links = '';
//
//        for ($i = $this->limit[0]; $i<=$this->limit[1]; $i++) {
//            if ($i == $this->current_page) {
//                $links .= '<a href="#" style="background-color: green; color: white" class="pag_link">'.$i.'</a>';
//            } else {
//                $links .= "<a href='{$this->path}{$i}}' style='background-color: lightseagreen; color: white' class='pag_link'>'.$i.'</a>";
//            }
//        }
//
//        if ($this->current_page > 1) {
//            $Page = $this->current_page - 1;
//            $html .= "<a href='{$this->path}{$Page}}' style='background-color: lightseagreen; color: white' class='pag_link'>pre</a>";
//        }
//
//        $html .= $links;
//
//        if ($this->current_page < $this->count) {
//            $Page = $this->current_page + 1;
//            $html .= "<a href='{$this->path}{$Page}}' style='background-color: lightseagreen; color: white' class='pag_link'>next</a>";
//        }
//
//        return $html;
//    }

//    private function limit()
//    {
//        $left = $this->current_page - round($this->max / 2);
//
//        $start = $left > 0 ? $left : 1;
//
//        if ($start + $this->max <= $this->count) {
//            $end = $start > 1 ? $start + $this->max : $this->max;
//        } else {
//            $end = $this->count;
//            $start = $this->count - $this->max > 0 ? $this->count - $this->max : 1;
//        }
//
//        return array($start, $end);
//    }

//    private function countOfPages()
//    {
//        return ceil($this->total / $this->notes_on_page);
//    }
}