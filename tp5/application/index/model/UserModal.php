<?php
namespace app\index\model;

use think\Db;
use think\Model;

class UserModal extends Model
{
    protected $table = 'user';
    protected $pk = 'id';

    public $name = 'aaa';

    //只读
    protected $readonly = ['age'];

    //初始化
    protected static function init(){
        self::event('before_insert',function ($data){//新增之前
           if(intval($data->age) < 10){
               return false;
           }
        });
    }


    // 定义全局的查询范围
    public function base($query){
        $query->where('id','>',0);
    }

    public function getwc($p_wc, $p_order = "", $p_start = -1, $p_limit = -1, $p_method = ""){
        $sql = Db::table('user');
        if ($p_wc)
            $sql->where($p_wc);
        if ($p_order)
            $sql->order($p_order);
        if ($p_limit > -1 && $p_start > -1)
            $sql->limit($p_limit, $p_start);
        switch (strtolower($p_method)) {
            case 'fetchrow':
                return $sql->find($sql);
                break;
            case 'fetchassoc':
            default:
                return $sql->select($sql);
                break;
        }
    }

    public function scopeAge($query,$age){
        $query->where('age','>',$age)->limit(10);
    }

    public function scopeName($query,$name){
        $query->where('name','like','%'.$name.'%');
    }
}