<?php

namespace Admin\Model;
use Think\Model;

/**
 * 分类模型
 */
class ExerciseModel extends Model{

	protected $_validate = array(
            /*array('ename', '', '标识不能为空', self::EXISTS_VALIDATE, 'regex', self::MODEL_BOTH),
            array('ename', 'require', '标识已经存在', self::VALUE_VALIDATE, 'unique', self::MODEL_BOTH),
            array('mainmuscleID', '', '主肌肉类型不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
            array('exercisetypeID', '', '训练不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
            array('equiptypeID', '', '设备类型不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
            array('forcetypeID', '', '发力类型不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
            array('sporttypeID', '', '运动类型不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
            array('levelID', '', '等级不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
            array('sex', '', '性别不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),*/
	);

	protected $_auto = array(
            array('rating', 0.0, self::MODEL_INSERT),
		array('create_time', NOW_TIME, self::MODEL_INSERT),
            array('md5','',self::MODEL_INSERT),
            array('sha1','',self::MODEL_INSERT),
		array('status', '1', self::MODEL_INSERT),
            
	);


	/**
	 * 获取分类详细信息
	 * @param  milit   $id 分类ID或标识
	 * @param  boolean $field 查询字段
	 * @return array     分类信息
	 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
	 */
	public function info($id, $field = true){
		/* 获取分类信息 */
		$map = array();
		if(is_numeric($id)){ //通过ID查询
			$map['eid'] = $id;
		} else { //通过标识查询
			$map['ename'] = $id;
		}
		return $this->field($field)->where($map)->find();
	}
        
       // public function search($mainmuscleID, $exercisetypeID, $equiptypeID,
         //       $forcetypeID, $sporttypeID, $levelID, $field = true){
        public function search($mainmuscleID,  $field = true){
            /* 获取分类信息 */
            $map = array();
            if(is_numeric($mainmuscleID)){ //通过ID查询
                    $map['mainmuscleID'] = array('in', $mainmuscleID);
            }
            /*if(is_numeric($exercisetypeID)){ //通过ID查询
                    $map['exercisetypeID'] = array('in', $exercisetypeID);
            }
            if(is_numeric($equiptypeID)){ //通过ID查询
                    $map['equiptypeID'] = array('in', $equiptypeID);
            }
            if(is_numeric($forcetypeID)){ //通过ID查询
                    $map['$forcetypeID'] = array('in', $forcetypeID);
            }
            if(is_numeric($mainmuscleID)){ //通过ID查询
                    $map['$sporttypeID'] =array('in', $sporttypeID);
            }
            if(is_numeric($mainmuscleID)){ //通过ID查询
                    $map['$levelID'] = array('in', $levelID);
            }*/
            return $this->field($field)->where($map)->select();
	}
        
        
        public function addExercise($ename, $mainmuscletype, $exercisetype, $equiptype,
                $forcetype, $sport, $level, $sex, $description, $filename, $videoname){
            
                /*$setting = C('EDITOR_UPLOAD.exerciseImgPath');
                $imageurl = $setting + $filename;
                $videourl = $setting + $videoname;*/
                
            $description = "";
            $imageurl = "";
            $video = "";
		$data = array(
                        'ename' => $ename, 
                        'mainmuscleID' => $mainmuscletype,    
                        'exercisetypeID' => $exercisetype,
                        'equiptypeID' => $equiptype,
                        'forcetypeID' => $forcetype, 
                        'sporttypeID' => $sport, 
                        'levelID' => $level, 
                        'sex' => $sex, 
                        'description' => $description, 
                        'imageurl' => $imageurl, 
                        'videourl' =>$videourl,
		);
                
		/* 添加用户 */
		if($this->create($data)){
			$eid = $this->add();
			return $eid ? $eid : 0; //0-未知错误，大于0-注册成功
		} else {
			return $this->getError(); //错误详情见自动验证注释
		}
	}


	/**
	 * 更新分类信息
	 * @return boolean 更新状态
	 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
	 */
	public function update(){
		$data = $this->create();
		if(!$data){ //数据对象创建错误
			return false;
		}

		/* 添加或更新数据 */
		return empty($data['eid']) ? $this->add() : $this->save();
	}




}
