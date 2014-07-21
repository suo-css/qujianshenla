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
class GoalModel extends Model{
	protected $_validate = array(
					
	);
	/* 自动完成规则 */
    protected $_auto = array(
        array('status', 1, self::MODEL_INSERT),
        array('create_time',create_time, self::MODEL_INSERT,'callback'),
        array('startdate',create_time, self::MODEL_INSERT,'callback'),
    );

    public function create_time(){
    	return date('Y-m-d H:i:s');
    }
}
