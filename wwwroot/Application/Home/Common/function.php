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
    $res = M('personal')->where(array('uid'=>is_login()))->find();
    return "<img width=60 height=60  src=".$res['iconurl']." alt=>";
  }else{
    return "<img width=60 height=60  src=./Uploads/avatars/avatars.jpg alt=>";
  }
}


/**
 * 图片修改
 * @param  $imgsrc 图片路径 $uid discuz 用户ID
 * @return 保存更新用户头像
 */
function resizejpg($imgsrc,$imgdst,$imgwidth,$imgheight,$uid,$size){ 
  $arr = getimagesize($imgsrc);                   
  $imgWidth = $imgwidth;
  $imgHeight = $imgheight;
  // Create image and define colors
  $imgsrc = imagecreatefromjpeg($imgsrc);
  $image = imagecreatetruecolor($imgWidth, $imgHeight);
  imagecopyresampled($image, $imgsrc, 0, 0, 0, 0,$imgWidth,$imgHeight,$arr[0], $arr[1]);
  $ucenterurl = './discuz/upload/uc_server';
  $uid  = sprintf("%09d", $uid);
  $dir1 = substr($uid, 0, 3);
  $dir2 = substr($uid, 3, 2);
  $dir3 = substr($uid, 5, 2);
  $url  = $ucenterurl.'/data/avatar/'.$dir1.'/'.$dir2.'/'.$dir3.'/'.substr($uid, -2).($real ? '_real' : ''); 
  $urls = $ucenterurl.'/data/avatar/'.$dir1.'/'.$dir2.'/'.$dir3.'/'; 
  is_dir($urls) || mkdir($urls,'0755',true);
  $file = $url.'_avatar_'.$size.'.jpg';  
  imagejpeg($image,$file);
  imagedestroy($image);
}

/**
 * 用户论坛头像更新
 */
function avatar_save(){
  $size = array('big'=>'200','middle'=>'120','small'=>'48');
  $res = M('personal')->where(array('uid'=>is_login()))->find();
  foreach ($size as $k => $v) {
      resizejpg($res['iconurl'],'jpg',$v,$v,is_login(),$k);
  }
}

/**
 * 发送email
 * @param $user_email 邮箱地址 $check 校验值
 */
function email($user_email,$check){
    $email = C('email');
    $localtime=date('y-m-d H:i:s',time());
    $mail = new csmtp();
    $mail->setServer($email['SYS_MAIL_SERVER'],$email['SYS_MAIL_USERNAME'],$email['SYS_MAIL_PWD'],$email['SYS_MAIL_PORT'],true); //设置smtp服务器，到服务器的SSL连接
    $mail->setFrom($email['SYS_MAIL_USERNAME']); //设置发件人
    $mail->setReceiver($user_email); //设置收件人，多个收件人，调用多次
    //$mail->setCc("XXXX"); //设置抄送，多个抄送，调用多次
    //$mail->setBcc("XXXXX"); //设置秘密抄送，多个秘密抄送，调用多次
    //$mail->addAttachment("XXXX"); //添加附件，多个附件，调用多次
    $mail->setMail('邮箱验证',"<a href=".U('user/checkmail',array('check'=>$check),'',true).">点击验证!</a>"); //设置邮件主题、内容
    $mail->sendMail();
}

/**
 * UUID 用于邮箱验证
 */
function uuid($prefix = ''){  
    $chars = md5(uniqid(mt_rand(), true));  
    $uuid  = substr($chars,0,8) . '-';  
    $uuid .= substr($chars,8,4) . '-';  
    $uuid .= substr($chars,12,4) . '-';  
    $uuid .= substr($chars,16,4) . '-';  
    $uuid .= substr($chars,20,12);  
    return $prefix . $uuid;  
}    
   
/**
 * 用户登陆密码累计
 */
function pass_check(){
  if(S('status')){
    S('status',S('status')+1);  
  }else{
    S('status','1',3600);
  }
}





/**
* 邮件发送类
* 支持发送纯文本邮件和HTML格式的邮件，可以多收件人，多抄送，多秘密抄送，带附件(单个或多个附件),支持到服务器的ssl连接
* 需要的php扩展：sockets、Fileinfo和openssl。
* 编码格式是UTF-8，传输编码格式是base64
* @example
* $mail = new MySendMail();
* $mail->setServer("smtp@126.com", "XXXXX@126.com", "XXXXX"); //设置smtp服务器，普通连接方式
* $mail->setServer("smtp.gmail.com", "XXXXX@gmail.com", "XXXXX", 465, true); //设置smtp服务器，到服务器的SSL连接
* $mail->setFrom("XXXXX"); //设置发件人
* $mail->setReceiver("XXXXX"); //设置收件人，多个收件人，调用多次
* $mail->setCc("XXXX"); //设置抄送，多个抄送，调用多次
* $mail->setBcc("XXXXX"); //设置秘密抄送，多个秘密抄送，调用多次
* $mail->addAttachment("XXXX"); //添加附件，多个附件，调用多次
* $mail->setMail("test", "<b>test</b>"); //设置邮件主题、内容
* $mail->sendMail(); //发送
*/
class csmtp {
  /**
  * @var string 邮件传输代理用户名
  * @access protected
  */
  protected $_userName;

  /**
  * @var string 邮件传输代理密码
  * @access protected
  */
  protected $_password;

  /**
  * @var string 邮件传输代理服务器地址
  * @access protected
  */
  protected $_sendServer;

  /**
  * @var int 邮件传输代理服务器端口
  * @access protected
  */
  protected $_port;

  /**
  * @var string 发件人
  * @access protected
  */
  protected $_from;

  /**
  * @var array 收件人
  * @access protected
  */
  protected $_to = array();

  /**
  * @var array 抄送
  * @access protected
  */
  protected $_cc = array();

  /**
  * @var array 秘密抄送
  * @access protected
  */
  protected $_bcc = array();

  /**
  * @var string 主题
  * @access protected
  */
  protected $_subject;

  /**
  * @var string 邮件正文
  * @access protected
  */
  protected $_body;

  /**
  * @var array 附件
  * @access protected
  */
  protected $_attachment = array();

  /**
  * @var reource socket资源
  * @access protected
  */
  protected $_socket;

  /**
  * @var reource 是否是安全连接
  * @access protected
  */
  protected $_isSecurity;

  /**
  * @var string 错误信息
  * @access protected
  */
  protected $_errorMessage;
  
  /**
  * @var string 错误信息
  * @access protected
  */

  protected $_debugopen;


  /**
  * 设置邮件传输代理，如果是可以匿名发送有邮件的服务器，只需传递代理服务器地址就行
  * @access public
  * @param string $server 代理服务器的ip或者域名
  * @param string $username 认证账号
  * @param string $password 认证密码
  * @param int $port 代理服务器的端口，smtp默认25号端口
  * @param boolean $isSecurity 到服务器的连接是否为安全连接，默认false
  * @param boolean $debug 是否开启调试信息，默认false
  * @return boolean
  */
  public function setServer($server, $username="", $password="",$port=25, $isSecurity=false, $debug=false) {
    $this->_debugopen = $debug;
    $this->_sendServer = $server;
    $this->_port = $port;
    $this->_isSecurity = $isSecurity;
    $this->_userName = empty($username) ? "" : base64_encode($username);
    $this->_password = empty($password) ? "" : base64_encode($password);
    return true;
  }

  /**
  * 设置发件人
  * @access public
  * @param string $from 发件人地址
  * @return boolean
  */
  public function setFrom($from) {
    $this->_from = $from;
    return true;
  }

  /**
  * 设置收件人，多个收件人，调用多次.
  * @access public
  * @param string $to 收件人地址
  * @return boolean
  */
  public function setReceiver($to) {
    $this->_to[] = $to;
    return true;
  }

  /**
  * 设置抄送，多个抄送，调用多次.
  * @access public
  * @param string $cc 抄送地址
  * @return boolean
  */
  public function setCc($cc) {
    $this->_cc[] = $cc;
    return true;
  }

  /**
  * 设置秘密抄送，多个秘密抄送，调用多次
  * @access public
  * @param string $bcc 秘密抄送地址
  * @return boolean
  */
  public function setBcc($bcc) {
    $this->_bcc[] = $bcc;
    return true;
  }

  /**
  * 设置邮件附件，多个附件，调用多次
  * @access public
  * @param string $file 文件地址
  * @return boolean
  */
  public function addAttachment($file) {
    if(!file_exists($file)) {
      $this->_errorMessage = "file " . $file . " does not exist.";
      return false;
    }
    $this->_attachment[] = $file;
    return true;
  }

  /**
  * 设置邮件信息
  * @access public
  * @param string $body 邮件主题
  * @param string $subject 邮件主体内容，可以是纯文本，也可是是HTML文本
  * @return boolean
  */
  public function setMail($subject, $body) {
    $this->_subject = base64_encode($subject);
    $this->_body = base64_encode($body);
    return true;
  }

  /**
  * 发送邮件
  * @access public
  * @return boolean
  */
  public function sendMail() {
    $command = $this->getCommand();

    $this->_isSecurity ? $this->socketSecurity() : $this->socket();
    
    foreach ($command as $value) {
      $result = $this->_isSecurity ? $this->sendCommandSecurity($value[0], $value[1]) : $this->sendCommand($value[0], $value[1]);
      if($result) {
        continue;
      }
      else{
        return false;
      }
    }
    
    //其实这里也没必要关闭，smtp命令：QUIT发出之后，服务器就关闭了连接，本地的socket资源会自动释放
    $this->_isSecurity ? $this->closeSecutity() : $this->close();
    return true;
  }

  /**
  * 返回错误信息
  * @return string
  */
  public function error(){
    if(!isset($this->_errorMessage)) {
      $this->_errorMessage = "";
    }
    return $this->_errorMessage;
  }

  /**
  * 返回mail命令
  * @access protected
  * @return array
  */
  protected function getCommand() {
    $separator = "----=_Part_" . md5($this->_from . time()) . uniqid(); //分隔符

    $command = array(
        array("HELO sendmail\r\n", 250)
      );
    if(!empty($this->_userName)){
      $command[] = array("AUTH LOGIN\r\n", 334);
      $command[] = array($this->_userName . "\r\n", 334);
      $command[] = array($this->_password . "\r\n", 235);
    }

    //设置发件人
    $command[] = array("MAIL FROM: <" . $this->_from . ">\r\n", 250);
    $header = "FROM: <" . $this->_from . ">\r\n";

    //设置收件人
    if(!empty($this->_to)) {
      $count = count($this->_to);
      if($count == 1){
        $command[] = array("RCPT TO: <" . $this->_to[0] . ">\r\n", 250);
        $header .= "TO: <" . $this->_to[0] .">\r\n";
      }
      else{
        for($i=0; $i<$count; $i++){
          $command[] = array("RCPT TO: <" . $this->_to[$i] . ">\r\n", 250);
          if($i == 0){
            $header .= "TO: <" . $this->_to[$i] .">";
          }
          elseif($i + 1 == $count){
            $header .= ",<" . $this->_to[$i] .">\r\n";
          }
          else{
            $header .= ",<" . $this->_to[$i] .">";
          }
        }
      }
    }

    //设置抄送
    if(!empty($this->_cc)) {
      $count = count($this->_cc);
      if($count == 1){
        $command[] = array("RCPT TO: <" . $this->_cc[0] . ">\r\n", 250);
        $header .= "CC: <" . $this->_cc[0] .">\r\n";
      }
      else{
        for($i=0; $i<$count; $i++){
          $command[] = array("RCPT TO: <" . $this->_cc[$i] . ">\r\n", 250);
          if($i == 0){
          $header .= "CC: <" . $this->_cc[$i] .">";
          }
          elseif($i + 1 == $count){
            $header .= ",<" . $this->_cc[$i] .">\r\n";
          }
          else{
            $header .= ",<" . $this->_cc[$i] .">";
          }
        }
      }
    }

    //设置秘密抄送
    if(!empty($this->_bcc)) {
      $count = count($this->_bcc);
      if($count == 1) {
        $command[] = array("RCPT TO: <" . $this->_bcc[0] . ">\r\n", 250);
        $header .= "BCC: <" . $this->_bcc[0] .">\r\n";
      }
      else{
        for($i=0; $i<$count; $i++){
          $command[] = array("RCPT TO: <" . $this->_bcc[$i] . ">\r\n", 250);
          if($i == 0){
          $header .= "BCC: <" . $this->_bcc[$i] .">";
          }
          elseif($i + 1 == $count){
            $header .= ",<" . $this->_bcc[$i] .">\r\n";
          }
          else{
            $header .= ",<" . $this->_bcc[$i] .">";
          }
        }
      }
    }

    //主题
    $header .= "Subject: =?UTF-8?B?" . $this->_subject ."?=\r\n";
    if(isset($this->_attachment)) {
      //含有附件的邮件头需要声明成这个
      $header .= "Content-Type: multipart/mixed;\r\n";
    }
    elseif(false){
      //邮件体含有图片资源的,且包含的图片在邮件内部时声明成这个，如果是引用的远程图片，就不需要了
      $header .= "Content-Type: multipart/related;\r\n";
    }
    else{
      //html或者纯文本的邮件声明成这个
      $header .= "Content-Type: multipart/alternative;\r\n";
    }

    //邮件头分隔符
    $header .= "\t" . 'boundary="' . $separator . '"';

    $header .= "\r\nMIME-Version: 1.0\r\n";

    //这里开始是邮件的body部分，body部分分成几段发送
    $header .= "\r\n--" . $separator . "\r\n";
    $header .= "Content-Type:text/html; charset=utf-8\r\n";
    $header .= "Content-Transfer-Encoding: base64\r\n\r\n";
    $header .= $this->_body . "\r\n";
    $header .= "--" . $separator . "\r\n";

    //加入附件
    if(!empty($this->_attachment)){
      $count = count($this->_attachment);
      for($i=0; $i<$count; $i++){
        $header .= "\r\n--" . $separator . "\r\n";
        $header .= "Content-Type: " . $this->getMIMEType($this->_attachment[$i]) . '; name="=?UTF-8?B?' . base64_encode( basename($this->_attachment[$i]) ) . '?="' . "\r\n";
        $header .= "Content-Transfer-Encoding: base64\r\n";
        $header .= 'Content-Disposition: attachment; filename="=?UTF-8?B?' . base64_encode( basename($this->_attachment[$i]) ) . '?="' . "\r\n";
        $header .= "\r\n";
        $header .= $this->readFile($this->_attachment[$i]);
        $header .= "\r\n--" . $separator . "\r\n";
      }
    }

    //结束邮件数据发送
    $header .= "\r\n.\r\n";


    $command[] = array("DATA\r\n", 354);
    $command[] = array($header, 250);
    $command[] = array("QUIT\r\n", 221);
    
    return $command;
  }

  /**
  * 发送命令
  * @access protected
  * @param string $command 发送到服务器的smtp命令
  * @param int $code 期望服务器返回的响应吗
  * @return boolean
  */
  protected function sendCommand($command, $code) {
    if($this->_debugopen)echo 'Send command:' . $command . ',expected code:' . $code . '<br />';
    //发送命令给服务器
    try{
      if(socket_write($this->_socket, $command, strlen($command))){

        //当邮件内容分多次发送时，没有$code，服务器没有返回
        if(empty($code))  {
          return true;
        }

        //读取服务器返回
        $data = trim(socket_read($this->_socket, 1024));
        if($this->_debugopen)echo 'response:' . $data . '<br /><br />';

        if($data) {
          $pattern = "/^".$code."+?/";
          if(preg_match($pattern, $data)) {
            return true;
          }
          else{
            $this->_errorMessage = "Error:" . $data . "|**| command:";
            return false;
          }
        }
        else{
          $this->_errorMessage = "Error:" . socket_strerror(socket_last_error());
          return false;
        }
      }
      else{
        $this->_errorMessage = "Error:" . socket_strerror(socket_last_error());
        return false;
      }
    }catch(Exception $e) {
      $this->_errorMessage = "Error:" . $e->getMessage();
    }
  }

  /**
  * 安全连接发送命令
  * @access protected
  * @param string $command 发送到服务器的smtp命令
  * @param int $code 期望服务器返回的响应吗
  * @return boolean
  */
  protected function sendCommandSecurity($command, $code) {
    if($this->_debugopen)echo 'Send command:' . $command . ',expected code:' . $code . '<br />';
    try {
      if(fwrite($this->_socket, $command)){
        //当邮件内容分多次发送时，没有$code，服务器没有返回
        if(empty($code))  {
          return true;
        }
        //读取服务器返回
        $data = trim(fread($this->_socket, 1024));
        if($this->_debugopen)echo 'response:' . $data . '<br /><br />';

        if($data) {
          $pattern = "/^".$code."+?/";
          if(preg_match($pattern, $data)) {
            return true;
          }
          else{
            $this->_errorMessage = "Error:" . $data . "|**| command:";
            return false;
          }
        }
        else{
          return false;
        }
      }
      else{
        $this->_errorMessage = "Error: " . $command . " send failed";
        return false;
      }
    }catch(Exception $e) {
      $this->_errorMessage = "Error:" . $e->getMessage();
    }
  } 

  /**
  * 读取附件文件内容，返回base64编码后的文件内容
  * @access protected
  * @param string $file 文件
  * @return mixed
  */
  protected function readFile($file) {
    if(file_exists($file)) {
      $file_obj = file_get_contents($file);
      return base64_encode($file_obj);
    }
    else {
      $this->_errorMessage = "file " . $file . " dose not exist";
      return false;
    }
  }

  /**
  * 获取附件MIME类型
  * @access protected
  * @param string $file 文件
  * @return mixed
  */
  protected function getMIMEType($file) {
    if(file_exists($file)) {
      $mime = mime_content_type($file);
      /*if(! preg_match("/gif|jpg|png|jpeg/", $mime)){
        $mime = "application/octet-stream";
      }*/
      return $mime;
    }
    else {
      return false;
    }
  }

  /**
  * 建立到服务器的网络连接
  * @access protected
  * @return boolean
  */
  protected function socket() {
    //创建socket资源
    $this->_socket = socket_create(AF_INET, SOCK_STREAM, getprotobyname('tcp'));
    
    if(!$this->_socket) {
      $this->_errorMessage = socket_strerror(socket_last_error());
      return false;
    }

    socket_set_block($this->_socket);//设置阻塞模式

    //连接服务器
    if(!socket_connect($this->_socket, $this->_sendServer, $this->_port)) {
      $this->_errorMessage = socket_strerror(socket_last_error());
      return false;
    }
    $str = socket_read($this->_socket, 1024);
    if(!preg_match("/220+?/", $str)){
      $this->_errorMessage = $str;
      return false;
    }
    
    return true;
  }

  /**
  * 建立到服务器的SSL网络连接
  * @access protected
  * @return boolean
  */
  protected function socketSecurity() {
    $remoteAddr = "tcp://" . $this->_sendServer . ":" . $this->_port;
    $this->_socket = stream_socket_client($remoteAddr, $errno, $errstr, 30);
    if(!$this->_socket){
      $this->_errorMessage = $errstr;
      return false;
    }

    //设置加密连接，默认是ssl，如果需要tls连接，可以查看php手册stream_socket_enable_crypto函数的解释
    stream_socket_enable_crypto($this->_socket, true, STREAM_CRYPTO_METHOD_SSLv23_CLIENT);

    stream_set_blocking($this->_socket, 1); //设置阻塞模式
    $str = fread($this->_socket, 1024);
    if(!preg_match("/220+?/", $str)){
      $this->_errorMessage = $str;
      return false;
    }

    return true;
  }

  /**
  * 关闭socket
  * @access protected
  * @return boolean
  */
  protected function close() {
    if(isset($this->_socket) && is_object($this->_socket)) {
      $this->_socket->close();
      return true;
    }
    $this->_errorMessage = "No resource can to be close";
    return false;
  }

  /**
  * 关闭安全socket
  * @access protected
  * @return boolean
  */
  protected function closeSecutity() {
    if(isset($this->_socket) && is_object($this->_socket)) {
      stream_socket_shutdown($this->_socket, STREAM_SHUT_WR);
      return true;
    }
    $this->_errorMessage = "No resource can to be close";
    return false;
  }
}
