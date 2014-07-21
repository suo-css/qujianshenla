<?php
namespace Admin\Controller;
use Admin\Model\AuthGroupModel;
use Think\Page;

class TypeController extends AdminController {
    
    public function equip(){
        $_list = M('equiptype');
        $_list   =   $this->lists($_list);
        int_to_string($_list);
        $this->assign('_list',$_list);
        $this->title = "equip";
        $this->display("index");
    }

    public function exercise(){
        $_list = M('exercisetype');
        $_list   =   $this->lists($_list);
        int_to_string($_list);
        $this->assign('_list',$_list);
        $this->title = "exercise";
        $this->display("index");
    }


    public function force(){
        $_list = M('forcetype');
        $_list   =   $this->lists($_list);
        int_to_string($_list);
        $this->assign('_list',$_list);
        $this->title = "force";
        $this->display("index");
    }



    public function level(){
        $_list = M('leveltype');
        $_list   =   $this->lists($_list);
        int_to_string($_list);
        $this->assign('_list',$_list);
        $this->title = "level";
        $this->display("index");
    }

    public function mainmuscle(){
        $_list  = M('mainmuscletype');
        $_list   =   $this->lists($_list);
        int_to_string($_list);
        $this->assign('_list',$_list);
        $this->title = "mainmuscle";
        $this->display("index");
    }


    public function sport(){
        $_list = M('sporttype');
         $_list   =   $this->lists($_list);
        int_to_string($_list);
        $this->assign('_list',$_list);
        $this->title = "sport";
        $this->display("index");
    }


    public function addtype(){
        $table = I('table');
        $type = M($table."type");
        $type->create(); 
        $type->add(); 
        if($type){
            $this->success('添加成功！',U($table));
        } else {
            $this->error('添加失败！');
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
            M($table."type")->where(array('id'=>$value))->delete();
        }
        $this->success('删除成功!');
    }
}

