<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | Trace设置 开启 app_trace 后 有效
// +----------------------------------------------------------------------
return [
    // 内置Html Console 支持扩展
    'type' => 'Console',
    'trace_tabs' =>  [
        'base'=>'基本',
        'file'=>'文件',
        'info'=>'流程',
        'error'=>'错误',
        'sql'=>'SQL',
        'debug'=>'调试',
        'user'=>'用户'
    ]
];
