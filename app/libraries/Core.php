<?php

class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];


    public function __construct()
    {
        $url = $this->getUrl();
        if(file_exists('../app/controllers/'. ucwords($url[0]. '.php')))
        {
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        
        }

        //require controller
        require_once '../app/controllers/'.ucwords($this->currentController). '.php';
        $this->currentController = new $this->currentController;
        if(isset($url[1]))
        {
            if(method_exists($this->currentController, $url[1]))
            $this->currentMethod = $url[1];
            unset($url[1]);
        }

        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

        


    

    }

    public function getUrl()
    {
        $url = $_GET['url'];
        if(isset($url))
        {
            $url = rtrim($url, '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;

        }
        
    }
}