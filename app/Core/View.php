<?php

class View
{
    public static function load($view, $data = [])
    {
        $file = VIEWS. $view .'.php';
        if (file_exists($file)) {
            extract($data);
            ob_start();
            require($file);
            ob_end_flush();
        }
        else {
            echo "This view: ". $view ." does not exist";
        }
    }

    public static function redirect($view, $data = [])
    {
        $file = VIEWS. $view .'.php';
        $data['url'] = $view;
        if (file_exists($file)) {
            extract($data);
            ob_start();
            require($file);
            ob_end_flush();
        }
        else {
            echo "This view: ". $view ." does not exist";
        }
        exit();
    }
}