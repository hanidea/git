<?php
namespace app\admin\controller;

use app\admin\common\Base;
use app\admin\model\System as SystemModel;
use think\Request;
class System extends Base
{
    public function index()
    {
        //1.获取配置信息
        $system = SystemModel::get(1);
        //2.模版赋值
        $this->view->assign('system',$system);
        //$this -> view -> assign('system', $this->getSystem());
        //3.渲染模版
        return $this->view->fetch('sys_set');
    }
    //更新配置表
    public function update(Request $request)
    {
        //判断一下提交类型
        if ($request -> isAjax(true)) {

            //获取提交的数据
            $data = $request -> param();
            //$data = array_filter($request->param());
            //设置一下更新条件
            $map = ['is_update'=> 1];

            //执行更新操作
            $res = SystemModel::update($data, $map);

            //设置更新返回信息
            $status = 1;
            $message = '更新成功';

            //如果更新失败
            if (is_null($res)) {
                $status = 0;
                $message = '更新失败';
            }
        }

        //返回更新结果
        return ['status'=> $status, 'message'=> $message];
    }

}
