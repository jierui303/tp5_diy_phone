<?php
namespace app\common\logic;

use think\Db;
use think\Model;

class AuthGroupAccess extends Model
{
    protected $dao;

    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->dao = \think\Loader::model('AuthGroupAccess');
    }

    public function getOneById($id, $columns = ['*'])
    {
        return $this->dao
            ->where('uid', $id)
            ->field($columns)
            ->find();
    }

    public function getAllListsByWhere($where, $columns = ['*'])
    {
        return $this->dao
            ->where($where)
            ->field($columns)
            ->select();
    }

    public function getOneByWhere($where, $columns = ['*'])
    {
        return $this->dao
            ->where($where)
            ->field($columns)
            ->find();
    }
}