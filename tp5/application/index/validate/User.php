<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2022/8/26
 * Time: 10:10
 */
namespace app\index\validate;

use think\Validate;

class User extends Validate
{
    protected $rule = [
        'name' => 'require|max:10',
        'age' => 'numbre|checkAge',
    ];

    protected $message = [
        'name.max' => 'name超出长度',
        'name.require' => 'name必须',
        'age.number' => 'age要数字',
        'age.between' => 'age超出范围',
    ];

    //自定义
    protected function checkAge($value,$rule){
        if($value > 10 ){
            return  'age超出范围了'.$rule;
        }
    }

    //验证场景
//    protected $scene = [
//        'edit' => ['name'],];

    // edit 验证场景定义
    public function sceneEdit()
    {
        return $this->only(['name'])
            ->append('name', 'min:5')
            ->remove('age', 'between')
            ->append('age', 'require|max:100');
    }
}