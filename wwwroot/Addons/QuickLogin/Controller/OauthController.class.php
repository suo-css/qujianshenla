<?php
/**
* 
*/
namespace Addons\QuickLogin\Controller;
use Home\Controller\AddonsController; 
use ORG\ThinkSDK\ThinkOauth;
class OauthController extends AddonsController{
	public function _initialize(){
		$addon_config = $this->getConfig();
		// QQ互联 sdk配置
		$qq_configs = array(
			'APP_KEY' => $addon_config['qq_qzone_akey'],
			'APP_SECRET' => $addon_config['qq_qzone_skey'],
			'CALLBACK' => U('home/addons/execute',array('_addons'=>'QuickLogin','_controller'=>'Oauth','_action'=>'getQqAT'),true,false,true)
			);
		C('THINK_SDK_QQ',$qq_configs);

		// 新浪微博 sdk配置
		$sina_configs = array(
			'APP_KEY' => $addon_config['sina_wb_akey'],
			'APP_SECRET' => $addon_config['sina_wb_skey'],
			'CALLBACK' => U('home/addons/execute',array('_addons'=>'QuickLogin','_controller'=>'Oauth','_action'=>'getSinaAT'),true,false,true)
			);
		C('THINK_SDK_SINA',$sina_configs);
	}
	// QQ互联 登陆
	public function qq(){

		//加载ThinkOauth类并实例化一个对象
        import("ORG.ThinkSDK.ThinkOauth");
        $sns  = ThinkOauth::getInstance('qq');
        //跳转到授权页面
        redirect($sns->getRequestCodeURL());
		
	}
	// QQ互联回调地址
	public function getQqAT(){
		$code = I('get.code');
		$this->login('qq',$code);
	}


	// 新浪微博登陆
	public function sina(){
		//加载ThinkOauth类并实例化一个对象
        import("ORG.ThinkSDK.ThinkOauth");
        $sns  = ThinkOauth::getInstance('sina');
        //跳转到授权页面
        redirect($sns->getRequestCodeURL());
	}

	// 新浪微博回调地址
	public function getSinaAT(){
		$code = I('get.code');
		$this->login('sina',$code);
	}
	/**
	 * 用户登陆
	 */
	public function login($type = null, $code = null){
		(empty($type) || empty($code)) && $this->error('参数错误');
        
        //加载ThinkOauth类并实例化一个对象
        import("ORG.ThinkSDK.ThinkOauth");
        $sns  = ThinkOauth::getInstance($type);

        //腾讯微博需传递的额外参数
        $extend = null;
        
        //请妥善保管这里获取到的Token信息，方便以后API调用
        //调用方法，实例化SDK对象的时候直接作为构造函数的第二个参数传入
        //如： $qq = ThinkOauth::getInstance('qq', $token);
        $token = $sns->getAccessToken($code , $extend);
        //获取当前登录用户信息
        if(is_array($token)){
            $user_info = A('Addons://QuickLogin/Type', 'Event')->$type($token);
            header("Content-type: text/html; charset=utf-8");
            dump($user_info);
            // your code
            /**
             * 描述：
             * 此插件新建了一个表 onethink_login 保存用户登陆的数据
             * 主要用于用户绑定
	            CREATE TABLE `onethink_login` (
				  `login_id` int(11) NOT NULL AUTO_INCREMENT,
				  `uid` int(11) NOT NULL COMMENT '用户UID',
				  `type_uid` varchar(255) NOT NULL COMMENT '授权登陆用户名 第三方分配的appid',
				  `type` char(80) NOT NULL COMMENT '登陆类型 qq|sina',
				  `oauth_token` varchar(150) DEFAULT NULL COMMENT '授权账号',
				  PRIMARY KEY (`login_id`),
				  KEY `uid` (`uid`)
				) ENGINE=MyISAM DEFAULT CHARSET=utf8;
             *
             * 思路：QQ互联为例
             * 如果第三方登陆成功后 获得第三方登陆的$token
             * 1、存在用户
             * 根据 $token 获得用户 $uid
             * 利用OT的登陆功能获得用户信息
             * 2、不存在用户
             * 利用OT的注册功能注册新用户 返回 $uid
             * 将第三方用户 进行 本地用户 $uid 绑定
             * $data['uid'] = $uid;
             * $data['type_uid'] = $token['openid'];
             * $data['type'] = $type;
             * $data['oauth_token'] = $token['access_token'];
             * M('Login')->add($data);
			*/
        }
	}
	public function FunctionName($value='')
	{
		# code...
	}
    /**
     * 获取插件的配置数组
     */
    final public function getConfig(){
        static $_config = array();
        $name = 'QuickLogin';
        if(isset($_config[$name])){
            return $_config[$name];
        }
        $config =   array();
        $map['name']    =   $name;
        $map['status']  =   1;
        $config  =   M('Addons')->where($map)->getField('config');
        if($config){
            $config   =   json_decode($config, true);
        }else{
        	return false;
        }
        $_config[$name]     =   $config;
        return $config;
    }
}
?>