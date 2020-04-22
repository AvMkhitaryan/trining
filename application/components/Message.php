<?php


namespace application\components;


class Message
{
    public static function set_message($message)
    {
        $_SESSION['message'] = $message;
    }

    public static function get_message()
    {
        return isset($_SESSION['message']) ? $_SESSION['message'] : '';
    }
}