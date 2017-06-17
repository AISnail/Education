<?php
namespace app\www\controller;
use \think\Controller;

class Index extends Controller
{
    public function index()
    {
        // Demo 而已
       return $this->fetch('index');
    }
}
