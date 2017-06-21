<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

use app\admin\model\Admin as AdminModel;
use app\admin\validate\Admin as AdminValidate;

class Admin extends Base
{
    protected $noNeedRight = ['tabledata','create'];
    /**
     * 显示管理员列表列表
     *
     * @return \think\Response
     */
    public function index()
    {
        return $this->fetch();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return $this->fetch();
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $validate = new AdminValidate();
        $result = $validate->goCheck();
        if(!$result){
            $this->error($validate->getError());
        }
        $data = input('post.');
        $data['password'] = md5($data['password']);
        $admin = new AdminModel();
        if($admin->save($data)){
            $this->success('创建账号成功');
        }else{
            $this->error('创建账号失败');
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        foreach ($id as $value) {
            AdminModel::destroy($value);
        }
        return $this->success('删除成功');
    }

    public function tableData()
    {
        return AdminModel::all();
    }
}
