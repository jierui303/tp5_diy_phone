<?php
namespace app\admin\controller;

use app\common\service\Users;
use think\Controller;
use think\Request;
use think\Loader;
use think\Session;

class Base extends Controller
{
    protected $current_action;
    protected $request;

    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub

        //判断用户是否登录
         if(!Session::get("uid")){
             $this->error("请先登录！", "admin/login/index");
         }


        Loader::import("org/Auth", EXTEND_PATH);
        $auth=new \Auth();
        //把模块、控制器和方法转换成一个字符串
        $this->current_action = request()->module().'/'.request()->controller().'/'.lcfirst(request()->action());
        $result = $auth->check($this->current_action, Session::get('uid'));
//        if(!$result){
//            $this->error("您没有该操作的权限!", "admin/index/showError");
//        }

        //获取用户信息
        $userInfo = (new \app\common\model\Users())->find(Session::get('uid'));
        var_dump($userInfo['user_name']);
        $this->assign('userInfo', $userInfo);
    }
}
