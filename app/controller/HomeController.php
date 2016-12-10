<?php

class HomeController extends Controller
{
    public function index($name = '')
    {
        echo $_SERVER['REQUEST_URI'];
        header('Location: http://' . $_SERVER['SERVER_NAME'] . '/login');
    }

}