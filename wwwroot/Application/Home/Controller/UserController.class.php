<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;
use User\Api\UserApi;

/**
 * 用户控制器
 * 包括用户中心，用户登录及注册
 */
class UserController extends HomeController {

	/* 用户中心首页 */
	public function index(){

	}

	/* 注册页面 */
	public function register($username = '', $password = '', $repassword = '', $email = '', $verify = ''){
        if(!C('USER_ALLOW_REGISTER')){
            $this->error('注册已关闭');
        }
		if(IS_POST){ //注册用户
			/* 检测验证码 */
			if(!check_verify($verify)){
				$this->error('验证码输入错误！');
			}

			/* 检测密码 */
			if($password != $repassword){
				$this->error('密码和重复密码不一致！');
			}			

			/* 调用注册接口注册用户 */
            $User = new UserApi;
			$uid = $User->register($username, $password, $email);
			if(0 < $uid){ //注册成功
				//TODO: 发送验证邮件
				$this->success('注册成功！',U('login'));
			} else { //注册失败，显示错误信息
				$this->error($this->showRegError($uid));
			}

		} else { //显示注册表单
			$this->display();
		}
	}

	/* 登录页面 */
	public function login($username = '', $password = '', $verify = ''){
		if(IS_POST){ //登录验证
			/* 检测验证码 */
			if(!check_verify($verify)){
				$this->error('验证码输入错误！');
			}

			/* 调用UC登录接口登录 */
			$user = new UserApi;
			$uid = $user->login($username, $password);
			if(0 < $uid){ //UC登录成功
				/* 登录用户 */
				$Member = D('Member');
				if($Member->login($uid)){ //登录用户
					//TODO:跳转到登录前页面
					$this->success('登录成功！',U('Home/Index/index'));
				} else {
					$this->error($Member->getError());
				}

			} else { //登录失败
				switch($uid) {
					case -1: $error = '用户不存在或被禁用！'; break; //系统级别禁用
					case -2: $error = '密码错误！'; break;
					default: $error = '未知错误！'; break; // 0-接口参数错误（调试阶段使用）
				}
				$this->error($error);
			}

		} else { //显示登录表单
			$this->display();
		}
	}

	/**
	 * 用户名与邮箱验证是否存在
	 * @param  string  $name 用户名 string $email 邮箱
	 * @return $status 验证状态 
	 */
	public function reg_email_name(){
		if(IS_AJAX){
			$status = 0;
			switch ($_POST['key']) {
		 		case 'email':
		 			$status = (M('ucenter_member')->where(array('email'=>$_POST['email']))->find()) ? 1 : 0; 
		 			break;
		 		case 'name':
		 			$status = (M('ucenter_member')->where(array('username'=>$_POST['name']))->find()) ? 1 : 0; 
		 			break;	
			} 
			echo $status;
		}
	}


	/* 退出登录 */
	public function logout(){
		if(is_login()){
			D('Member')->logout();
			$this->success('退出成功！', U('User/login'));
		} else {
			$this->redirect('User/login');
		}
	}

	/* 验证码，用于登录和注册 */
	public function verify(){
		$verify = new \Think\Verify();
		$verify->entry(1);
	}

	/**
	 * 获取用户注册错误信息
	 * @param  integer $code 错误编码
	 * @return string        错误信息
	 */
	private function showRegError($code = 0){
		switch ($code) {
			case -1:  $error = '用户名长度必须在16个字符以内！'; break;
			case -2:  $error = '用户名被禁止注册！'; break;
			case -3:  $error = '用户名被占用！'; break;
			case -4:  $error = '密码长度必须在6-30个字符之间！'; break;
			case -5:  $error = '邮箱格式不正确！'; break;
			case -6:  $error = '邮箱长度必须在1-32个字符之间！'; break;
			case -7:  $error = '邮箱被禁止注册！'; break;
			case -8:  $error = '邮箱被占用！'; break;
			case -9:  $error = '手机格式不正确！'; break;
			case -10: $error = '手机被禁止注册！'; break;
			case -11: $error = '手机号被占用！'; break;
			default:  $error = '未知错误';
		}
		return $error;
	}


    //发送email
    public function email(){
    	$email = C('email');
        $localtime=date('y-m-d H:i:s',time());
        $mail = new csmtp();
        $mail->setServer($email['SYS_MAIL_SERVER'],$email['SYS_MAIL_USERNAME'],$email['SYS_MAIL_PWD'],$email['SYS_MAIL_PORT'],true); //设置smtp服务器，到服务器的SSL连接
        $mail->setFrom($email['SYS_MAIL_USERNAME']); //设置发件人
        $mail->setReceiver('455078389@qq.com'); //设置收件人，多个收件人，调用多次
        //$mail->setCc("XXXX"); //设置抄送，多个抄送，调用多次
        //$mail->setBcc("XXXXX"); //设置秘密抄送，多个秘密抄送，调用多次
        //$mail->addAttachment("XXXX"); //添加附件，多个附件，调用多次
        $mail->setMail("eamil发送成功!"); //设置邮件主题、内容
        if($mail->sendMail()){ //发送
        	echo "发送成功!";
     	}   
    }

    /**
     * 个人用户信息更新
     * @author huajie <banhuajie@163.com>
     */
    public function profiles(){
		if ( !is_login() ) {
			$this->error( '您还没有登陆',U('User/login') );
		}
        if (IS_POST) {
        	$personal      = D('personal');
            $data     	   = $personal->create();
      		$personal->uid = is_login();
            if($data){
               	$personal->save();
                $this->success('保存成功!',U('Index/index'));                 
            } else {
                $this->error($personal->getError());
            }
        }else{
        	if(!M('personal')->where(array('uid'=>is_login()))->find()){$data=array('uid'=>is_login(),'birthday'=>'');M('personal')->add($data);}
        	$result = M('personal')->where(array('uid'=>is_login()))->find();
			p($result);
        	$this->result = $result;
            $this->display();
        }
    }

    public function upload(){
    	$post_input = 'php://input';
		$save_path = './Uploads/avatars/'.is_login();  //定义一个要上传头像的目录
		is_dir($save_path) || mkdir($save_path);
		$postdata = file_get_contents( $post_input );
		if ( isset( $postdata ) && strlen( $postdata ) > 0 ) {
			$filename = $save_path . '/' . is_login() . '.jpg';
			$handle = fopen( $filename, 'w+' );
			fwrite( $handle, $postdata );
			fclose( $handle );
			if ( is_file( $filename ) ) {
				echo 1;
				exit ();
			}else {
				die ( '上传失败' );
			}
		}else {
			die ( '没有图片信息!' );
		}
	}	
}
