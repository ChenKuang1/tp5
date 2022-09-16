<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2022/8/24
 * Time: 14:49
 */
namespace app\index\controller;

use think\Controller;
use think\Request;

class Error extends Controller
{
    public function _empty(Request $request){
        return '空的控制器';
    }
}