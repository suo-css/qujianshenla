<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Model;
use Think\Model;

/**
 * 分类模型
 */
class PersonalModel extends Model{
	protected $_validate = array(
		array('nickname', 'require', '昵称不能为空', self::EXISTS_VALIDATE, 'regex', self::MODEL_BOTH),
		array('realname', 'require', '真实姓名不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
		array('birthday', 'require', '生日不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
		array('occupation', 'require', '职业不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
		array('telephone', 'require', '电话号码不能为空', self::MUST_VALIDATE),
		array('homeadd', 'require', '家庭地址不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
		array('gymadd', 'require', '健身房地址不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),	
	);
	
	/**
	 * 头像上传
	 * @param $filename 头像地址
	 */
	public function upload($filename){
		$res = M('personal')->where(array('uid'=>is_login()))->find();
		unlink($res['iconurl']);//删除原有头像文件
		$data = array('iconurl'=>$filename);
		M('personal')->where(array('uid'=>is_login()))->save($data);//更新头像地址
		avatar_save();//论坛头像同步
	}
}
