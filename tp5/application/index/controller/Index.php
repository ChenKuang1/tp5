<?php
namespace app\index\controller;

use think\Controller;
use think\facade\Request;
use think\captcha\Captcha;
use think\response\Json;
use think\facade\Session;

class Index extends Controller
{
    protected $beforeActionList = [
      'first',
      'second' => ['expect'=>'hello'],
      'three' => ['only'=>'hello'],
    ];

    //空操作
    public function _empty(){
        return 'empty empty empty';
    }

    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:) </h1><p> ThinkPHP V5.1<br/><span style="font-size:30px">12载初心不改（2006-2018） - 你值得信赖的PHP框架</span></p></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=64890268" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="eab4b9f840753f8e7"></think>';
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }

    protected function first()
    {
        echo 'first<br/>';
    }

    protected function second()
    {
        echo 'second<br/>';
    }

    protected function three()
    {
        echo 'three<br/>';
    }

    public function request(){//请求
        print_r(Request::url(true).'<br>');
        print_r(Request::controller().'<br>');
        print_r(Request::root(true).'<br>');
        print_r(Request::baseFile(true).'<br>');
        print_r(Request::host().'<br>');
        print_r(Request::type().'<br>');
        print_r(Request::path().'<br>');
        print_r(Request::method().'<br>');
        print_r(Request::ext().'<br>');
        print_r(Request::action().'<br>');
        $info = Request::header();
        print_r($info['user-agent'].'<br>');
    }

    public function verify(){
        $config =    [
            // 验证码字体大小
            'fontSize'    =>    30,
            // 验证码位数
            'length'      =>    3,
            // 关闭验证码杂点
            'useNoise'    =>    false,
        ];
        $captcha = new Captcha($config);
        return $captcha->entry();
    }


    public function test11(){
         return $this->fetch();
    }

    public function checkcap(){
        $cap =  $this->request('cap');
        $captcha = new Captcha();
        $rule = ['cap' => 'require'];
        $res = $this->validate($cap,$rule);
        //if(!$res){return 'empty';}

        if(!$captcha->check($cap)){
            return json_encode(array('mes'=>'验证码错误'));
        }
    }

    //验证器
    public function test2(){
        $data = ['name'=> 'aaaaaaaaaaaaaaa','age' => '21d0'];
        $validate = new \app\index\validate\User;
        if(true !== $validate->check($data)){
            dump($validate->check($data));
        }
    }

    //验证器
    public function test4(){
        $data = ['name'=> 'aaaaaaaaaaaaaaaaa','age' => '21qqq'];
        $age = 50;
        $validate = new \app\index\validate\User;
        if(!$validate->scene('edit')->check($data)){//scene
            dump($validate->getError());
        }
    }

    //批量验证
    protected $batchValidate = true;
    // 验证失败是否抛出异常
    protected $failException = true;
    public function test3(){
        $result  =  $this->validate(['name'=> 'aaaaaaaaaaaaaaa','age' => '1d'],'app\index\validate\User');
//        if(true !== $result){
//            dump($result);
//        }

    }

    //冒泡
    public function ttt(){
        $arr = ['1','4','3','8','5'];
        for($i=0;$i<count($arr);$i++){
            for($j=0;$j<(count($arr)-1);$j++){
                if($arr[$j] > $arr[$j+1]){
                    $tmp = $arr[$j];
                    $arr[$j] = $arr[$j+1];
                    $arr[$j+1] = $tmp;
                }
            }
        }
        return json($arr);
    }
    public function a(){
        session_start();
        $data = array();
        $data['data'] = '123';
        $data['expire'] = '60';
        $_SESSION['aaa'] = $data;
        $arr = ['200','1','4','3','8','5'];
        $r = $this->quick($arr);
        dump($r);
    }
    public function d(){
        $lifeTime = 24 * 3600;  // 保存一天
        session_set_cookie_params($lifeTime);
        session_start();
        $_SESSION['aa'] = '123';
    }
    public function c(){
        //初始化
        Session::init([
            // SESSION 前缀
            'prefix'         => 'think',
            //过期时间
            'expire'         => '60',
            // 驱动方式 支持redis memcache memcached
            'type'           => '',
            // 是否自动开启 SESSION
            'auto_start'     => true,
        ]);
        Session::set('a','123');
    }
    public function b(){
        $r = Session::get('a');
        //session_start();
        //$r = $_SESSION['aaa'];
        dump($r);
    }
    //快速排序
    function quick($arr){
        if(count($arr) <=1) return $arr;
        $m = $arr[0];
        $left = array();
        $right = array();
        for($i=1; $i<count($arr); $i++){
            if($arr[$i] >= $m){
                $right[] = $arr[$i];
            } else{
                $left[] = $arr[$i];
            }
        }
        $left = $this->quick($left);
        $right = $this->quick($right);
        return array_merge($left,array($m),$right);
    }
}
