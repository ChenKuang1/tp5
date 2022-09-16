<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2022/8/23
 * Time: 14:55
 */
namespace app\index\controller;

class Login extends \think\Controller
{
    protected $middleware = ['Check'];

    public function login(){
        $request = $this->request;
        $name = $request->param('name');
        echo $name;
    }
}