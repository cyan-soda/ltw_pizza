<?php

class App 
{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // controller process
        if(isset($url[0]))
        {
            if(file_exists("./app/controllers/". $url[0] .".php"))
            {
                $this->controller = $url[0];
            }
            unset($url[0]);
        }

        require_once "./app/controllers/". $this->controller. ".php";
        $this->controller = new $this->controller;

        // method process
        if(isset($url[1]))
        {
            if(strlen(strstr($url[1], ".php")) > 0)
            {
                $url[1] = substr($url[1], 0, strlen($url[1] - 4));
            }
            if(method_exists($this->controller, $url[1]))
            {
                $this->method = $url[1];
            }
            unset($url[1]);
        }

        // params process
        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if(isset($_GET['url'])) 
        {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}

?>