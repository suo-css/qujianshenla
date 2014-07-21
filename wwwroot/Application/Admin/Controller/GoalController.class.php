<?php
namespace Admin\Controller;
use Admin\Model\AuthGroupModel;
use Think\Page;

class GoalController extends AdminController {
    
    public function goalcontinuetype(){
        $_list = M('goalcontinuetype');
        $_list   =   $this->lists($_list);
        int_to_string($_list);
        $this->assign('_list',$_list);
        $this->display("goalcontinuetype");
    }

    public function goaltype_add(){
        $this->list = $list = M('goalmodule')->select();
        $this->display();
    }

    public function goaltype(){
        $_list = M('goaltype');
         $_list   =   $this->lists($_list);
        int_to_string($_list);
        $this->assign('_list',$_list);
        $this->display("goaltype");
    }

    public function goalcontinuetype_edit(){
         $this->list = $list = M('goalcontinuetype')->where(array('id'=>I('id')))->find();
         $this->display();
    }



    public function goaltype_edit(){
         $this->list = $list = M('goaltype')->where(array('id'=>I('id')))->find();
         $this->le   = $le = M('goalmodule')->select();
         $this->display();
    }
    
    public function save(){
        $table= I('table');
        $list = D($table);
        if($list->create()){
            $list->save();
            $this->success('修改成功!',U($table));
        }else{
             $this->error($list->getError());
        }
    }



    public function addtype(){
        $table = I('table');
        $type  = D($table);
        if($type->create()){
            $type->add(); 
            $this->success('添加成功！',U($table));
        }else{
            $this->error($type->getError());
        }
    }

    public function delete($table){
        $id = array_unique((array)I('id',0));
        $id = is_array($id) ? implode(',',$id) : $id;
        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }
        $arr = explode(',',$id);
        foreach ($arr as $key => $value) {
            M($table)->where(array('id'=>$value))->delete();
        }
        $this->success('删除成功!');
    }

    public function setstatus($id = 0,$status,$table){
        if(IS_AJAX){
            $status = ($status==1) ? 0 : 1;
            $data = array('status'=>$status);
            if(M($table)->where(array('id'=>$id))->save($data)){
                $this->success('禁用成功!');
            }else{
                $this->error("禁用失败!");
            }
        }
    }

}

