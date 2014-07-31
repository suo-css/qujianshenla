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
	public function register($username = '', $password = '', $repassword = '', $verify = ''){
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
            $User  = new UserApi;
            $check = uuid();
			$uid   = $User->register($username, $password,$check);
			if($uid>0){ //注册成功
				//TODO: 发送验证邮件
				email($username,$check);
				$_SESSION['email_status'] = 1;
				$this->success('注册成功！',U('checkmail'));
			} else { //注册失败，显示错误信息
				$this->error($this->showRegError($uid));
			}

		} else { //显示注册表单 
			$this->display();
		}
	}

	/**
	 * 用户注册成功
	 */
	public function regsus(){
		if($_SESSION['regsus']!="1"){
			$this->redirect('index/index');
		}
		unset($_SESSION['regsus']);
		unset($_SESSION['email_status']);
		$this->display();
	}

	/**
	 * 修改密码
	 */
	public function set_password(){
		if ( !is_login() ) {
			$this->error( '您还没有登陆',U('User/login') );
		}
        if ( IS_POST ) {
            //获取参数
            $uid        =   is_login();
            $password   =   I('post.old');
            $repassword = I('post.repassword');
            $data['password'] = I('post.password');
            empty($password) && $this->error('请输入原密码');
            empty($data['password']) && $this->error('请输入新密码');
            empty($repassword) && $this->error('请输入确认密码');

            if($data['password'] !== $repassword){
                $this->error('您输入的新密码与确认密码不一致');
            }

            $Api = new UserApi();
            $res = $Api->updateInfo($uid, $password, $data);
            if($res['status']){
                $this->success('修改密码成功！');
            }else{
                $this->error($res['info']);
            }
        }else{
            $this->display();
        }
    }
	
	/**
	 * setting
	 */
	public function setting(){
 		$this->display();
    }
	/**
	 * 用户邮箱验证
	 */
	public function checkmail(){
		if(empty($_SESSION['email_status']) and empty($_GET['check'])){$this->redirect('index/index');}
    	if(!empty($_GET['check'])){
    		$user  = new UserApi;
    		$type  = empty($_GET['check']) ? 2 : 1;
    		$uid   = $user->email_check($_GET['check']);
    		if($uid>0){
    			$_SESSION['regsus'] = 1;
    			$this->redirect('regsus');
    		}else{
    			$this->redirect('index/index');
    		}
    	}
 		$this->display();
    }

    /**
     * 重新发送邮箱
     */
    public function email(){
/*    	if(IS_AJAX){*/
    		if(!empty($_SESSION['email'])){
    			$result = M('email_check')->where(array('username'=>$_SESSION['email']))->find();
	    		email($_SESSION['email'],$result['check']);
	    		echo 1;
    		}
/*    	}else{
    		$this->redirect('index/index');
    	}*/
    }

	/* 登录页面 */
	public function login($username = '', $password = '', $verify = ''){
		if(IS_POST){ //登录验证
			/* 检测验证码 */
			if(S('status')>=3){
				if(!check_verify($verify)){
					$this->error(array('result'=>'验证码输入错误！'));
				}
			}
			/* 调用UC登录接口登录 */
			$user = new UserApi;
			$uid = $user->login($username, $password);
			if($uid > 0){ //UC登录成功
				/* 登录用户 */
				$Member = D('Member');
				if($Member->login($uid)){ //登录用户
					//TODO:跳转到登录前页面
					S('status',NULL);
					$this->success('登录成功！',U('Home/Index/index'));
				} else {
					$this->error($Member->getError());
				}

			} else { //登录失败
				switch($uid) {
					case -1:
					if(M('email_check')->where(array('username'=>$username))->find()){
						$error = array('result'=>"帐号没有激活,<a href=".U('user/checkmail').">激活</a>",'status'=>'');
						$_SESSION['email'] = $username;
						$_SESSION['email_status'] = 1; 
					}else{
						$error = array('result'=>"用户名不存在,或被禁用!",'status'=>'');
					}
					break; //系统级别禁用
					case -2: pass_check();$error = array('result'=>'用户名或密码错误','status'=>S('status'));break;
					default: $error = array('result'=>'未知错误！','status'=>''); break; // 0-接口参数错误（调试阶段使用）
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
		 	$status = (M('ucenter_member')->where(array('username'=>$_POST['username']))->find()) ? 1 : 0; 
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
    /**
     * 个人用户信息更新
     * @author huajie <banhuajie@163.com>
     */
    public function set_profiles(){
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
        	
        	$result   = M('personal')->where(array('uid'=>is_login()))->find();
     		
     		if(!S('province')){
     			$this->province = $province = M('provinceinfo')->field('id,name')->where(array('status'=>1))->select();
     			S('province',$province,7200);
     		}else{
     			$this->province = $province = S('province');
     		}

       	    if(!S('cityinfo')){
     			$cityinfo = M('cityinfo')->field('name,province_id,id')->where(array('status'=>1))->select();
     			$array = array();
	     		foreach ($cityinfo as $k => $v) {
	     			$array[$v['province_id']][] = array('id'=>$v['id'],'name'=>$v['name']); 
	     		}
	     		$this->cityinfo = $array;
     			S('cityinfo',$array,7200);
     		}else{
     			$this->cityinfo = $cityinfo = S('cityinfo');
     		}

     		if(S('sectioninfo')){
     			$sectioninfo = M('sectioninfo')->field('name,cityid')->where(array('status'=>1))->select();
     			$array = array();
     			foreach ($sectioninfo as $k => $v) {
	     			$array[$v['cityid']][] = array('id'=>$v['id'],'name'=>$v['name']); 
	     		}
	     		$this->sectioninfo = $array;
     			S('sectioninfo',$array,7200);
     		}else{
     			$this->sectioninfo = $sectioninfo = S('sectioninfo');
     		}

        	$this->result = $result;
            $this->display();
        }
    }
    public function profiles(){
		
            $this->display();
        
    }
    //头像上传
    public function upload(){
    	$post_input = 'php://input';
		$save_path = './Uploads/avatars/'.is_login();  //定义一个要上传头像的目录
		is_dir($save_path) || mkdir($save_path);
		$postdata = file_get_contents( $post_input );
		if ( isset( $postdata ) && strlen( $postdata ) > 0 ) {
			$uuid = uuid();
			$filename  = $save_path . '/'.$uuid .'.jpg';
			$handle = fopen( $filename, 'w+' );
			fwrite( $handle, $postdata );
			fclose( $handle );
			if ( is_file( $filename ) ) {
				$personal = D('personal');
				$personal->upload($filename);
				$json = json_encode(array('img'=>$filename,'status'=>'1'));
				echo $json;
			}
		}

	}	
}
