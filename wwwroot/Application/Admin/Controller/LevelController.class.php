<?php
namespace Admin\Controller;
class LevelController extends AdminController {
    public function index(){
        $level = M('leveltype')->select();
        $this->assign('level',$level);
        $this->display();
    }

    public function addtype(){
        $leveltype = M('leveltype');
        $leveltype->create(); 
        $leveltype->add(); 
        $this->success('添加成功！');
    }

    public function deletetype(){
        //M('leveltype')->where(array('id'=>$_POST['id']))->delete();
        echo 1;
    }
}
