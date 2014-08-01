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

    
    /**
     * GOAL首页
     */
    public function exc_goal(){
        $this->list  = $list  = goaltype('1');//力量
        $this->list1 = $list1 = goaltype('2');//维度
        $goalEvents = M('goalevents');
        $conditions['uid'] = is_login();
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
	
    /**
     * 目标动作更新值
     */
    public function current(){
        $arr = array('currentvalue'=>I('current'));
        $re = M('goal')->where(array('id'=>I('id')))->save($arr);
        $status = ($re) ? 1 : 0;
        //如果今天有更新的记录，那么就更新值，没有就新增一条记录
        if(M('goalhistory')->where(array('uid'=>is_login(),'date'=>date('Y-m-d',time()),'detailtypeid'=>I('detailtypeid')))->find()){
            $data = array('value'=>I('startvalue'));
            $re   = M('goalhistory')->where(array('uid'=>is_login(),'date'=>date('Y-m-d',time()),'detailtypeid'=>I('detailtypeid')))->save($data);
        }else{
            $data = array('uid'=>is_login(),'detailtypeid'=>I('detailtypeid'),'value'=>I('startvalue'),'date'=>date('Y-m-d'));
            $re   = M('goalhistory')->add($data);
        }

        echo $status;
    }

    /**
     * 目标动作删除
     */
    public function delete_goal(){
        if(M('goal')->where(array('uid'=>is_login(),'id'=>I('id')))->delete()){
            M('goalhistory')->where(array('uid'=>is_login(),'detailtypeid'=>I('detailtypeid')))->delete();
            $data = array('task_state'=>I('status'));
            M('goalevents')->where(array('uid'=>is_login(),'goal_id'=>I('id'),'status'=>1))->save($data);
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
                $goal = D('Exercise')->goalevents(I('detailtypeid'),I('startvalue'),I('goalvalue'),I('goaldate'),'add',$re);
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
     * 动作库
     */
    
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
            
            $exercise = M("Exercise");
            $exerciselist = $exercise->field('eid,ename')->select();
            $this->assign('exerciselist',$exerciselist);
            $this->display();
    }
        
    public function search(){
        $type = I('type');
        /*type 1 表示 复选框搜索  2 表示 搜索框搜索*/
        if($type==1){
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
        }else if($type==2){
            $ename = I('ename');
            $map['ename'] = array('like','%'.$ename.'%');
        }
        
        $exercise = M("Exercise");
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
    public function getename(){
        $exercise = M("Exercise");
        $ename = I('ename');
        $map['ename'] = array('like','%'.$ename.'%');
        $exerciselist = $exercise->where($map)->field('eid,ename')->select();
        $data["status"] = 0;
        if(count($exerciselist) > 0){
            $data["status"] = 1;
            $data["info"] = $exerciselist;
        }
        $this->ajaxReturn($data,'json');
    }
    
    public function exc_all(){

        $table=M('ucenter_member exercisecomment');
        $res=$table->join('news N on exercisecomment.uid=N.id')->select();
        p($res);die;

        $list = M('exercisecomment')->where(array('eid'=>$_GET['eid']));
        $list = $this->lists('exercisecomment', null, null,null, null);
        int_to_string($list);
        $this->assign('list', $list);
        $this->display();
    }
    /*exc_all 新*/
    public function exc_all2(){
        if(!isset($_GET['eid'])){
            return;
        }
        $eid = $_GET['eid'];
        $prefix   = C('DB_PREFIX');
        /*查询评论*/
        
        $conditions['eid'] = $eid;
        $conditions['status'] = 1;
        $conditions['replyid'] = 0;
        /*
        $exercisecomment = $prefix.('exercisecomment');
        $personal = $prefix.('personal');//->join( $personal.' user on exc.uid = user.id ' )
        $list = M()->table($exercisecomment.' exc')->where($conditions)->field('exc.*')->select();
        //$list = $this->lists($list,$conditions);
        */
        $list = $this->recursiveReply($conditions);
        //var_dump($list);
        int_to_string($list);
        //p($list);
        $this->assign('exercisecomment', $list);
        
        
        /*查询动作信息*/
        $exercise = M("Exercise");
        $map['eid'] = $eid;
        $l_table  = $prefix.('exercise');           //动作
        $r_table1  = $prefix.('mainmuscletype');    //主要肌群
        $r_table2  = $prefix.('exercisetype');      //运动类型
        $r_table3  = $prefix.('equiptype');         //器械
        $r_table4  = $prefix.('forcetype');         //推 拉  静态
        $r_table5  = $prefix.('sporttype');         //是  否 
        $r_table6  = $prefix.('leveltype');         //等级
        
        $info = M() ->table($l_table.' exc')
                   ->where( $map )
                   ->join ( $r_table1.' t1 on exc.mainmuscleID = t1.id' )
                ->join ( $r_table2.' t2 on exc.exercisetypeID = t2.id' )
                ->join ( $r_table3.' t3 on exc.equiptypeID = t3.id' )
                ->join ( $r_table4.' t4 on exc.forcetypeID = t4.id' )
                ->join ( $r_table5.' t5 on exc.sporttypeID = t5.id' )
                ->join ( $r_table6.' t6 on exc.levelID = t6.id' )
                ->field('exc.ename as ename,exc.imgurl,exc.description, t1.name as mtname, t2.name as etname, t3.name as eqtname,'
                        . 't4.name as ftname, t5.name as stname, exc.eid,t6.name as ltname, exc.sex, exc.rating')
                ->find();
        //var_dump($info);
        $this->assign('info',$info);
        $this->display();
    }
    
    //递归查询 评论 回复
    public function recursiveReply($conditions){
        $list = M('exercisecomment')->where($conditions)->order("create_time desc")->select();
        if(count($list)>0){
            foreach($list as $key=>&$value){
                $user = M('personal')->where(array("uid"=>$value['uid']))->field('nickname,iconurl')->find();
                $value['nickname'] = $user['nickname'];
                $value['iconurl'] = $user['iconurl'];
                $where['replyid'] = $value['cid'];
                //$value['replynums'] = M('exercisecomment')->where($where)->count();  //回复数
                $value['reply'] = M('exercisecomment')->where($where)->order("create_time desc")->select();
                if(count($value['reply'])>0){
                    $value['reply'] = $this->recursiveReply($where);
                }else{
                    continue;
                }
            }
        }
        return $list;
    } 
    
    public function reviewedit(){
        if(IS_AJAX){
            $msg = array("status"=>0,"msg"=>"网络故障，请稍后！");
            $arr['eid'] = I('eid');
            $arr['uid'] = is_login()==null?54:is_login();
            $arr['replyid'] = I('replyid');
            $arr['content'] = I('content');
            $arr['create_time'] = date('Y-m-d H:i:s',time());
            $arr['status'] = 1;
            $arr['viewnum'] = '';
            $re = M('exercisecomment')->add($arr);
            if($re){
                $user = M('personal')->where(array("uid"=>$arr['uid']))->field('nickname,iconurl')->find();
                $arr['nickname'] = $user['nickname'];
                $arr['iconurl'] = $user['iconurl'];
                $arr['create_time'] = time_tran($arr['create_time']);
                $arr['cid'] = $re;
                $msg['status'] = 1;
                $msg['info'] = $arr;
            }
            echo json_encode($msg);
        } 
    }
    

    /**
     * 评论添加
     */
     /*
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
*/
    /**
     * 评论回复
     */
     /*
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
    */

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
    public function lineChart(){

            
       // if(IS_AJAX){


            $strdate = '2012-07-01';
            $enddate = '2014-08-01';

            $strsec = strtotime($strdate);
            $endsec = strtotime($enddate);
            $midsec = $endsec-$strsec;
            $secsec = $midsec/5;
            $day1 = $strdate;
            $day2 = $strsec + $secsec;
            $day3 = $strsec + $secsec*2;
            $day4 = $strsec + $secsec*3;
            $day5 = $strsec + $secsec*4;
            $day6 = $enddate;
            $day2 = date('Y-m-d',$day2);
            $day3 = date('Y-m-d',$day3);
            $day4 = date('Y-m-d',$day4);
            $day5 = date('Y-m-d',$day5);
           // echo $day1." /  ".$day2." /  ".$day3." /  ".$day4." /  ".$day5." /  ".$day6;

            $cursec = $strsec;

            $value1 = "";
            $date1 = ""; 

            while($cursec<$endsec){

                $cur = date('Y-m-d',$cursec);

                if ($cur==$day1||$cur==$day2||$cur==$day3||$cur==$day4||$cur==$day5||$cur==$day6){
                    $date1 .= $cur;
                }
                else{
                    $date1 .= ",";
                }

                $res = M('goalhistory')->where(array('uid'=>'54','datailtypeid'=>'5','date'=>$cur))->find();
                
                if ($res){
                    $value1 .= $res['value'];
                }
                else{
                    $value1 .= ",";
                }
   

                $cursec+=3600*24;
                
                
            }
            $arr = json_encode(array('date'=>$date1,'vlaue'=>$value1));
       // }    
        echo $date1;

        echo "<br>";echo "<br>";echo "<br>";echo "<br>";
        echo $value1;
        $this->display();
    }
}
