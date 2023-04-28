<?php

/**
 * 
 * front end controller
 */

class App
{
    protected $controller = "HomeController";
    protected $action = "index";
    protected $params = [];

    public function __construct()
    {
        $this->prepareUrl();
        $this->render();
    }

    /**
     * 
     * extract controller, method and params
     * @return void
     */
    private function prepareUrl()
    {
        $url = $_SERVER['QUERY_STRING'];
        if (!empty($url)) {
            $url = trim($url, '/');
            $url = explode('/', $url);

            // define controller
            $this->controller = isset($url[0]) ? ucwords($url[0])."Controller" : 'HomeController';
            unset($url[0]);
            
            // define action
            $this->action = isset($url[1]) ? $url[1] : 'index';
            unset($url[1]);

            // define params
            $this->params = !empty($url) ? array_values($url) : [];

        }
    }

    private function render()
    {
        if (class_exists($this->controller)) {
            $controller = new $this->controller;
            if (method_exists($controller, $this->action)) {
                call_user_func_array([$controller, $this->action], $this->params);
            }
            else {
                View::load('Error/404');
            }
        }
        else {
            echo "not found";
            // View::load('Error/404');
        }
    }
}
