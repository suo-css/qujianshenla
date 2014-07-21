<?php

namespace Admin\Controller;
use Admin\Model\AuthGroupModel;
use Think\Page;

class MemberexctplController extends AdminController {
  
    public function index(){
        $this->list = $list = M('Memberexctpl')->select();
        $this->display();
    }

    public function delete($table,$id){
        $id = array_unique((array)I('id',0));
        $id = is_array($id) ? implode(',',$id) : $id;
        if (empty($id) ) {
            $this->error('请选择要操作的数据!');
        }
        $arr = explode(',',$id);
        foreach ($arr as $key => $value) {
            M($table)->where(array($uid=>$value))->delete();
        }
        $this->success('删除成功!');
    }

    public function setstatus($id = 0,$status){
        if(IS_AJAX){
            $status = ($status==1) ? 0 : 1;
            $data = array('status'=>$status);
            if(M('Exercise')->where(array('eid'=>$id))->save($data)){
                $this->success('禁用成功!');
            }else{
                $this->error("禁用失败!");
            }
        }
    }

    
}

