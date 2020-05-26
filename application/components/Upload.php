<?php

namespace application\components;

class Upload
{
    public static function Insert($dir,$file){

    if (!empty($dir)){
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
    }

        if (!empty($file)){
            $name = $file["image"]["name"];
            $tmp = $file["image"]["tmp_name"];
            move_uploaded_file($tmp, "$dir/$name");
        }
    }

}