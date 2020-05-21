<?php

class App
{

    protected $controller = 'transaksi',
        $method = 'index',
        $params = [];
    public function __construct()
    {
        $url = $this->parseURL();
        // controller

        if ($url) {

            if (file_exists('app/controllers/' . $url[0] . '.php')) {
                $this->controller = $url[0];
                // agar bisa megnambil parameter
                // var_dump($url);
                // menghilangkan variable controller yang tedapat di index pertama
                unset($url[0]);
            }
        }
        require_once 'app/controllers/' . $this->controller . '.php';
        // disini akan membuat instansiasi dari object Controller yang dimana disini controler= Home, sebelumnya membutuhkan file Class Home menggunaakna reqiure_once
        $this->controller = new $this->controller;


        // method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        // params
        if (!empty($url)) {
            $this->params = array_values($url);
        }


        // jalankan controller & method, serta kirimkan params jika ada
        // menggunakan sebuah function call_user_func_array()
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_SERVER['REQUEST_URI'])) {

            $url = rtrim($_SERVER['REQUEST_URI'], '/');
            $url = substr($url, 1);
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
