<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

/**
 * 前台公共库文件
 * 主要定义前台公共函数库
 */

/**
 * 检测验证码
 * @param  integer $id 验证码ID
 * @return boolean     检测结果
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function check_verify($code, $id = 1){
	$verify = new \Think\Verify();
	return $verify->check($code, $id);
}

/**
 * 获取列表总行数
 * @param  string  $category 分类ID
 * @param  integer $status   数据状态
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function get_list_count($category, $status = 1){
    static $count;
    if(!isset($count[$category])){
        $count[$category] = D('Document')->listCount($category, $status);
    }
    return $count[$category];
}

/**
 * 获取段落总数
 * @param  string $id 文档ID
 * @return integer    段落总数
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function get_part_count($id){
    static $count;
    if(!isset($count[$id])){
        $count[$id] = D('Document')->partCount($id);
    }
    return $count[$id];
}

/**
 * 获取导航URL
 * @param  string $url 导航URL
 * @return string      解析或的url
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function get_nav_url($url){
    switch ($url) {
        case 'http://' === substr($url, 0, 7):
        case '#' === substr($url, 0, 1):
            break;        
        default:
            $url = U($url);
            break;
    }
    return $url;
}

function int_to_string(&$data,$map=array('status'=>array(1=>'正常',-1=>'删除',0=>'禁用',2=>'未审核',3=>'草稿'))) {
    if($data === false || $data === null ){
        return $data;
    }
    $data = (array)$data;
    foreach ($data as $key => $row){
        foreach ($map as $col=>$pair){
            if(isset($row[$col]) && isset($pair[$row[$col]])){
                $data[$key][$col.'_text'] = $pair[$row[$col]];
            }
        }
    }
    return $data;
}



/**
 * 评论用户姓名返回
 * @param  $uid 用户ID
 * @return array 返回当前ID用户信息
 */
function review_comment($uid){
    return M('ucenter_member')->where(array('id'=>$uid))->find();
}

/**
 * 评论信息 回复显示
 * @param  $cid 评论ID
 * @return HTML 信息
 */
function reply_comment($cid){
    $list = M('exercisecomment')->where(array('replyid'=>$cid))->select();
    foreach ($list as $k => $v) {
        $result = review_comment($v[uid]);
        $data .= "<div style='margin-left:7px;'>$result[username]</div><div style='margin-left:7px;'>$v[content]</div><div style='margin-left:7px;'>$v[create_time]</div>";   
    }
    return $data;
}



/**
 * 数组打印
 * @param  $arr 数组
 */
function p($arr){
    echo "<pre>";
            print_r($arr);
    echo "</pre>";
}

/**
 * 根据模块ID返回对应的信息
 * @param  $id   模块ID
 * @return $data HTML 信息
 */
function goaltype($id){
   $list   = M('goaltype')->where(array('status'=>1,'moduleid'=>$id))->select();
   foreach ($list as $v) {
       $result = M('goal')->where(array('status'=>1,'uid'=>is_login(),'detailtypeid'=>$v['id']))->find();
       if(!$result){
          $name  = json_encode($v['typename']);
          $data .="<div><div id=type-$v[id]></div><span>".$v['typename']."  </span><a href=javascript:; onclick='add_goal($v[id],$name)';>新增目标</a></div><br>";
       }else{
          $json  = json_encode(array('startvalue'=>$result['startvalue'],'startdate'=>$result['startdate'],'goalvalue'=>$result['goalvalue'],'goaldate'=>$result['goaldate'],'name'=>$v['typename'],'id'=>$v['id'],'currentvalue'=>$result['currentvalue']));
          $data .="<div><div id=type-$v[id]>".$result['startvalue']."-".$result['startdate']."-".$result['goalvalue']."-".$result['goaldate']."</div><span>".$v['typename']."  </span><a href=javascript:; onclick=update_goal($json)>修改目标</a>  <a href=".U('Exercise/delete_goal',array('id'=>$result['id'])) .">删除目标</a></div><br>";
       }
       
   }
   return $data;
}

/**
 * 根据对应ID返回数据
 */
function show_goal($id){
    $tinue = M('goalcontinue')->where(array('status'=>1,'uid'=>is_login(),'continuetypeid'=>$id))->field('value')->order('create_time desc')->limit('0,1')->select();
    foreach ($tinue as $key => $value) {
      return $value['value'];
    }
  
}

/**
 * 判断用户是否已经添加了对应的
 * @param  $id 动作ID
 * @return html 
 */
function actiontype($id){ 
  if($result = M('likeaction')->where(array('uid'=>is_login()))->find()){
    if(!in_array($id,json_decode($result['actionid']))){
        return "<a href=javascript:; onclick=action(this); id=".$id.">添加为喜欢动作</a>";
    }else{
        return '<img src="http://www.easyicon.net/api/resize_png_new.php?id=1160318&size=128" height="20" width="20">';
    }
  }else{
      $url = U('user/login');
      return "<a href=javascript:if(confirm('你还没有登陆!确定去登陆吗？'))location='".$url."'>添加为喜欢动作</a>";
  }
}


/**
 * 判断用户是否已经有了头像
 */
function avatars(){
  $save_path = './Uploads/avatars/'.is_login();
  if(is_dir($save_path)){
    return "<img width=60 height=60 src=./Uploads/avatars/".is_login()."/".is_login().".jpg alt=>";
  }
}