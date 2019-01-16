<?php 

    /*
    App Core Class
    - Create URl and Loads core controller
    - URL FORMAT - /controller/method/params
    */

class Core {

    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];


    public function __construct(){
       
        $url = $this->getUrl();
        //print_r($this->getUrl());
        //Look in controller for first value
        if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
            //if exists, set as controller
            $this->currentController = ucwords($url[0]);
            unset($url[0]);//unset the value of the variable

        }

        //Require teh controller
        require_once '../app/controllers/'.$this->currentController.'.php';

        //Instatiate controller class
        $this->currentController = new $this->currentController;

        //Check for second paret of url
        // $po = $url[1];
        // echo $po;
        if(isset($url[1])){
            //Check to see if method exists in controller
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
                //print_r($url);
                unset($url[1]); //unset 1 index
            }

        }
        // echo '<br>';
        // echo $this->currentMethod;
        // echo '<br>';
        // print_r(array_values($url));
        // echo '<br>';

        //Get Params
        $this->params = $url ? array_values($url) : [];
        // echo '<br>';
        // echo '<br>';
        // echo '<br>';
        // print_r($this->params);
        // echo '<br>';

        //Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);



    }

    public function getUrl(){
        if(isset( $_GET['url'])){
            $url = rtrim( $_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);   
            $url = explode('/', $url);
            return $url;
        }
    }

 }


















 ?>
