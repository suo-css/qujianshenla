<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;

/**
 * 用户控制器
 * 包括用户中心，用户登录及注册
 */
class ExerciseController extends HomeController {

	/* 用户中心首页 */
    public function exc_common(){
            $this->list     = $list      = M('goalmodule')->where(array('status'=>1))->select();
            $this->goaltype = $goaltype  = M('goalcontinuetype')->where(array('status'=>1))->select(); 
            if($_POST){
                foreach ($_POST['type'] as $k => $v) {
                    $table = D('goalcontinue');
                    $table->uid   = is_login();
                    $table->value = $v;
                    $table->continuetypeid = $k;
                    $table->create_time = date('Y-m-d H:i:s',time()); 
                    $table->status = 1;
                    $table->add(); 
                }
            }
            $this->display();
	}
	
    /**
     * 目标动作更新值
     */
    public function current(){
        $arr = array('currentvalue'=>I('current'));
        $re = M('goal')->where(array('id'=>I('id')))->save($arr);
        $status = ($re) ? 1 : 0;
        $data = array('uid'=>is_login(),'detailtypeid'=>I('detailtypeid'),'value'=>I('startvalue'),'date'=>date('Y-m-d'));
        $re   = M('goalhistory')->add($data);
        echo $status;
    }

    /**
     * 目标动作删除
     */
    public function delete_goal(){
        if(M('goal')->where(array('uid'=>is_login(),'detailtypeid'=>I('id')))->delete()){
            M('goalhistory')->where(array('uid'=>is_login(),'detailtypeid'=>I('id')))->delete();
            echo 1;
        }
    }

    /**
     * 目标动作的新增与更新
     */
    public function goal(){
        if(IS_AJAX){     
            $msg = array('errno'=>0,'msg'=>'');
            $arr['startvalue'] = I('startvalue');
            $arr['goalvalue'] = I('goalvalue');
            $arr['goaldate'] = I('goaldate');
            $type = I('type');
            if($type=='add'){
                $arr['detailtypeid'] = I('detailtypeid');
                $arr['uid'] = is_login();
                $arr['status'] = 1;
                $arr['create_time'] = date('Y-m-d H:i:s',time());
                $arr['startdate'] = date('Y-m-d H:i:s',time());
                $arr['currentvalue'] = 0;
                $arr['currenttime'] = date('Y-m-d H:i:s',time());
                $re = M('goal')->add($arr);
                $msg['id'] = $re;
            }else{
                $arr['id'] = I('save_id');                
                $arr['currentvalue'] = $arr['startvalue'];
                $arr['currenttime']  = date('Y-m-d H:i:s',time());
                $re = M('goal')->save($arr);
            }

            if($re){
                $msg['errno']=1;
                $msg['msg'] = '';
            }else{
                $msg['msg'] = I('save_id');
            }

            echo json_encode($msg);
         
        }
    }

    /**
     * GOAL首页
     */
    public function exc_test(){
        $this->list  = $list  = goaltype('1');//力量
        $this->list1 = $list1 = goaltype('2');//维度

        $goalEvents = M('goalevents');
        $conditions['uid'] = 54;
        $conditions['datetypeid'] = 4;
        $re = $goalEvents->where($conditions)->order('create_time desc')->select();
        foreach($re as $item){
            $dates[]=substr($item['create_time'],0,4);
        }
        $dates=array_flip(array_flip($dates));//清除重复
        $eventslist=array_values($dates);//设置组坐标从0开始
        foreach($eventslist as $key=>$value){
            foreach($re as $k=>$val){
                if(substr($val['create_time'],0,4) == $value){
                    $array[$key]['ymd'] = $value;
                    $array[$key]['list'][$k] = $val;
                }else{
                    continue;
                }
            }
        }
        $this->assign('eventslist',$array);

        $this->display();
    }
        

    public function exc_filter(){
            $list = M("Mainmuscletype");
            $list = $list->getField('id, name');
            $this->assign("_list", $list);
            
            $list2 = M("Exercisetype");
            $list2 = $list2->getField('id, name');
            $this->assign("_list2", $list2);
            
            $list3 = M("Equiptype");
            $list3 = $list3->getField('id, name');
            $this->assign("_list3", $list3);
            
            $list4 = M("Forcetype");
            $list4 = $list4->getField('id, name');
            $this->assign("_list4", $list4);
            
            $list5 = M("Sporttype");
            $list5 = $list5->getField('id, name');
            $this->assign("_list5", $list5);
            
            $list6 = M("Leveltype");
            $list6 = $list6->getField('id, name');
            $this->assign("_list6", $list6);
            $this->display();
	}
    public function exc_filter2(){
            $list = M("Mainmuscletype");
            $list = $list->getField('id, name');
            $this->assign("_list", $list);
            
            $list2 = M("Exercisetype");
            $list2 = $list2->getField('id, name');
            $this->assign("_list2", $list2);
            
            $list3 = M("Equiptype");
            $list3 = $list3->getField('id, name');
            $this->assign("_list3", $list3);
            
            $list4 = M("Forcetype");
            $list4 = $list4->getField('id, name');
            $this->assign("_list4", $list4);
            
            $list5 = M("Sporttype");
            $list5 = $list5->getField('id, name');
            $this->assign("_list5", $list5);
            
            $list6 = M("Leveltype");
            $list6 = $list6->getField('id, name');
            $this->assign("_list6", $list6);
            $this->display();
    }
        
    public function search()
        {
            $filter1 = I('filter_1');
            $filter1 = substr($filter1,0,strlen($filter1)-2);
            $map['mainmuscleID'] = array('in', $filter1);
            
            $filter2 = I('filter_2');
            
            $filter2 = substr($filter2,0,strlen($filter2)-2);
            $map['exercisetypeID'] = array('in', $filter2);
            
            $filter3 = I('filter_3');
            $filter3 = substr($filter3,0,strlen($filter3)-2);
            $map['equiptypeID'] = array('in', $filter3);
            
            $filter4 = I('filter_4');
            $filter4 = substr($filter4,0,strlen($filter4)-2);
            $map['forcetypeID'] = array('in', $filter4);
            
            $filter5 = I('filter_5');
            $filter5 = substr($filter5, 0,strlen($filter5)-2);
            $map['sporttypeID'] = array('in', $filter5);
            
            $filter6 = I('filter_6');
            $filter6 = substr($filter6,0,strlen($filter6)-2);
            $map['levelID'] = array('in', $filter6);
            
            //$exercise = D('Exercise');
            $exercise = M("Exercise");
            /*$info = $exercise->table('Exercise exc, Mainmuscletype t1')
                    ->where ( 'exc.mainmuslceID = t1.id')
                    ->field('exc.ename as ename, t1.name as mname, exc.sex, exc.rating')
                    ->select();*/
            
            $prefix   = C('DB_PREFIX');
            $l_table  = $prefix.('exercise');
            $r_table1  = $prefix.('mainmuscletype');
            $r_table2  = $prefix.('exercisetype');
            $r_table3  = $prefix.('equiptype');
            $r_table4  = $prefix.('forcetype');
            $r_table5  = $prefix.('sporttype');
            $r_table6  = $prefix.('leveltype');
            
            $info = M() ->table($l_table.' exc')
                       ->where( $map )
                       ->join ( $r_table1.' t1 on exc.mainmuscleID = t1.id' )
                    ->join ( $r_table2.' t2 on exc.exercisetypeID = t2.id' )
                    ->join ( $r_table3.' t3 on exc.equiptypeID = t3.id' )
                    ->join ( $r_table4.' t4 on exc.forcetypeID = t4.id' )
                    ->join ( $r_table5.' t5 on exc.sporttypeID = t5.id' )
                    ->join ( $r_table6.' t6 on exc.levelID = t6.id' )
                    ->field('exc.ename as ename, t1.name as mtname, t2.name as etname, t3.name as eqtname,'
                            . 't4.name as ftname, t5.name as stname, exc.eid,t6.name as ltname, exc.sex, exc.rating')
                    ->select();
        
            $data["status"] = 0;
            if(count($info) > 0){
                $data["status"] = 1;
                foreach ($info as $k => $v) {
                    $info[$k]['action'] = actiontype($v['eid']);
                }
                $data["info"] = $info;
            }
            $this->ajaxReturn($data, 'json');
        }

    public function exc_all(){
        $list = M('exercisecomment')->where(array('eid'=>$_GET['eid']));
        $list = $this->lists('exercisecomment', null, null,null, null);
        int_to_string($list);
        $this->assign('list', $list);
        $this->display();
    }

    /**
     * 评论添加
     */
    public function add_review(){
        if(IS_AJAX){
            $data = array(
                'eid'=>I('eid'),
                'uid'=>is_login(),
                'replyid'=>'0',
                'content'=>I('content'),
                'create_time'=>date('Y-m-d H:i:s',time()),
                'status'=>'1',
                'viewnum'=>''
            );
            if($id=M('exercisecomment')->add($data)){
                $result = review_comment($data['uid']);
                $json = json_encode(array('status'=>1,'cid'=>$id,'name'=>$result['username'],'content'=>$data['content'],'create_time'=>$data['create_time'],'uid'=>$data['uid']));
                echo $json;
            } 
        }
    }

    /**
     * 评论回复
     */
    public function reply_save(){
       if(IS_AJAX){
            $data = array(
                'eid'=>'1',
                'uid'=>I('uid'),
                'replyid'=>I('cid'),
                'content'=>I('content'),
                'create_time'=>date('Y-m-d H:i:s',time()),
                'status'=>'1',
                'viewnum'=>''
            );
            if(M('exercisecomment')->add($data)){
                $result = review_comment($data['uid']);
                $json = json_encode(array('status'=>1,'cid'=>$data['replyid'],'name'=>$result['username'],'content'=>$data['content'],'create_time'=>$data['create_time']));
                echo $json;
            } 
        }
    }

    /**
     * 添加喜欢的动作
     */
    public function addaction(){
        $result = M('likeaction')->where(array('uid'=>is_login()))->find();
        if($result){
            $json   = json_decode($result['actionid']);
            $json[] = I('id');
            $data = array('actionid'=>json_encode($json));
            M('likeaction')->where(array('uid'=>is_login()))->save($data);
            echo 1;     
        }else{
            $array = json_encode(array(I('id'))); 
            $data  = array('uid'=>is_login(),'actionid'=>$array);
            M('likeaction')->add($data);
            echo 1;
        }  
    }

    public function exc_tml(){
        $this->display();
    }
    
    public function exc_mte(){
        $list = M('likeaction')->where(array('uid'=>2))->find();
        $arr  = json_decode($list['actionid']);
        $res  = array();
        foreach ($arr as $k => $value) {
            $res[] = M('exercise')->where(array('eid'=>$value))->field('eid,ename')->find();
        }
        $this->res = $res;
        $this->display();
    }

    public function exc_ind(){
        $this->display();
    }
    public function exc_name(){
        $this->display();
    }
    public function nav(){
        $this->display();
    }

    public function exc_doc(){
        $list = M('document')->where(array('category_id'=>40))->select();
        $this->assign('list',$list);
        $this->display();
    }
}

