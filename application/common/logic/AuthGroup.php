<?php
namespace app\common\logic;

use think\Db;
use think\Model;

class AuthGroup extends Model
{
    protected $dao;

    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->dao = \think\Loader::model('AuthGroup');
    }

    public function getOneById($id, $columns = ['*'])
    {
        return $this->dao
            ->where('id', $id)
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