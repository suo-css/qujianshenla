<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com>
// +----------------------------------------------------------------------

namespace Admin\Model;
use Think\Model;
/**
 * 配置模型
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */

class GoalcontinuetypeModel extends Model {
    protected $_validate = array(
        array('id', 'require', 'ID不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
        array('name', 'require', '名称不能为空', self::EXISTS_VALIDATE, 'regex', self::MODEL_BOTH),
        array('unit', 'require', '单位不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
    );

    /* 自动完成规则 */
    protected $_auto = array(
        array('status', 1, self::MODEL_INSERT),
        array('create_time',create_time, self::MODEL_INSERT,'callback'),
    );

    public function create_time(){
        return date('Y-m-d H:i:s');
    }
 
}
