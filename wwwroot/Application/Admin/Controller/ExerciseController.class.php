<?php

namespace Admin\Controller;
use Admin\Model\AuthGroupModel;
use Think\Page;

class ExerciseController extends AdminController {

    public function index()
    {
        /*$nickname       =   I('nickname');
        $map['status']  =   array('egt',0);
        if(is_numeric($nickname)){
            $map['uid|nickname']=   array(intval($nickname),array('like','%'.$nickname.'%'),'_multi'=>true);
        }else{
            $map['nickname']    =   array('like', '%'.(string)$nickname.'%');
        }

        $list   = $this->lists('Member', $map);
        int_to_string($list);
        $this->assign('_list', $list);
        $this->meta_title = '增加动作';*/

        //$map['status']  =   array('egt',0);
        $this->display();
    }
    
    public function myexercise()
    {
        $_REQUEST = array();
        $list = $this->lists('Exercise', null, null,null, 'eid, ename, sex, rating,status');
        int_to_string($list);
        
        $this->assign('_list', $list);
        $this->meta_title = '增加动作'; 
        $this->display();
    }
    

    public function add($eid='',$ename = '', $mainmuscletype = 1, $exercisetype = 1, $equiptype = 1,
                $forcetype = 1, $sport = 1, $level = 1, $sex = '',$imgurl = '')

    {  
        if(IS_POST){

            //echo $ename;
                $description = '';
                $filename = '';
                $videoname = '';
                /*$exercise = array('ename' => $ename, 
                    'mainmuscleID' => $mainmuscletype, 
                    'exercisetypeID' => $exercisetype, 
                    'equiptypeID' => $equiptype,
                    'forcetypeID' => $forcetype,
                    'sportID' => $sport, 
                    'levelID' => $level, 
                    'sex' => $sex, 
                    'description' => $description, 
                    'filename' => $filename, 
                    'videoname' => $videoname);*/
                    $exercise = D('Exercise');
                    $info = $exercise->addExercise($eid,$ename, $mainmuscletype, $exercisetype, $equiptype,
                $forcetype, $sport, $level, $sex, $description, $filename, $videoname,$imgurl);
                    
                if($info){
                    $this->success('动作添加成功！',U('myexercise'));
                } else {
                    $this->error('动作添加失败！');
                }
        } 
        else {
            $this->display();
        }
    }
    
    public function delete($table,$uid){
        $id = array_unique((array)I('id',0));
        $id = is_array($id) ? implode(',',$id) : $id;
        if (empty($id) ) {
            $this->error('请选择要操作的数据!');
        }
        $arr = explode(',',$id);
        foreach ($arr as $key => $value) {
            M($table)->where(array($uid=>$value))->delete();
        }
        $this->success('删除成功!');
    }

    public function setstatus($id = 0,$status){
        if(IS_AJAX){
            $status = ($status==1) ? 0 : 1;
            $data = array('status'=>$status);
            if(M('Exercise')->where(array('eid'=>$id))->save($data)){
                $this->success('禁用成功!');
            }else{
                $this->error("禁用失败!");
            }
        }
    }

    /**
     * 上传图片
     * @author huajie <banhuajie@163.com>
     */
    public function uploadPicture(){
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            exit; // finish preflight CORS requests here
        }

        if ( !empty($_REQUEST[ 'debug' ]) ) {
            $random = rand(0, intval($_REQUEST[ 'debug' ]) );
            if ( $random === 0 ) {
                header("HTTP/1.0 500 Internal Server Error");
                exit;
            }
        }

        // 5 minutes execution time
        @set_time_limit(5 * 60);

        $url = C('PICTURE_UPLOAD_IMG');

        $targetDir = 'upload_tmp';
        $action_name = mb_convert_encoding($_REQUEST['action_name'],"GBK","UTF-8");
        $uploadDir = $url['rootPath'].$action_name;
        $cleanupTargetDir = true; // Remove old files
        $maxFileAge = 5 * 3600; // Temp file age in seconds


        // Create target dir
        if (!file_exists($targetDir)) {
            @mkdir($targetDir);
        }

        // Create target dir
        if (!file_exists($uploadDir)) {
            @mkdir($uploadDir);
        }

        // Get a file name
        if (isset($_REQUEST["name"])) {
            $fileName = $_REQUEST["name"];
        } elseif (!empty($_FILES)) {
            $fileName = $_FILES["file"]["name"];
        } else {
            $fileName = uniqid("file_");
        }

        $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
        $uploadPath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;

        // Chunking might be enabled
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;


        // Remove old temp files
        if ($cleanupTargetDir) {
            if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
            }

            while (($file = readdir($dir)) !== false) {
                $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

                // If temp file is current file proceed to the next
                if ($tmpfilePath == "{$filePath}_{$chunk}.part" || $tmpfilePath == "{$filePath}_{$chunk}.parttmp") {
                    continue;
                }

                // Remove temp file if it is older than the max age and is not the current file
                if (preg_match('/\.(part|parttmp)$/', $file) && (@filemtime($tmpfilePath) < time() - $maxFileAge)) {
                    @unlink($tmpfilePath);
                }
            }
            closedir($dir);
        }


        // Open temp file
        if (!$out = @fopen("{$filePath}_{$chunk}.parttmp", "wb")) {
            die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        }

        if (!empty($_FILES)) {
            if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
            }

            // Read binary input stream and append it to temp file
            if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        } else {
            if (!$in = @fopen("php://input", "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        }

        while ($buff = fread($in, 4096)) {
            fwrite($out, $buff);
        }

        @fclose($out);
        @fclose($in);

        rename("{$filePath}_{$chunk}.parttmp", "{$filePath}_{$chunk}.part");

        $index = 0;
        $done = true;
        for( $index = 0; $index < $chunks; $index++ ) {
            if ( !file_exists("{$filePath}_{$index}.part") ) {
                $done = false;
                break;
            }
        }
        if ( $done ) {
            if (!$out = @fopen($uploadPath, "wb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
            }

            if ( flock($out, LOCK_EX) ) {
                for( $index = 0; $index < $chunks; $index++ ) {
                    if (!$in = @fopen("{$filePath}_{$index}.part", "rb")) {
                        break;
                    }

                    while ($buff = fread($in, 4096)) {
                        fwrite($out, $buff);
                    }

                    @fclose($in);
                    @unlink("{$filePath}_{$index}.part");
                }

                flock($out, LOCK_UN);
            }
            @fclose($out);
        }

        // Return Success JSON-RPC response
        die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');
    }

    public function edit($id = 0){
        if(IS_POST){
            $Exercise = D('Exercise');
            $data = $Exercise->create();
            $Exercise->eid = $id;
            if($data){
                rename($_SERVER['DOCUMENT_ROOT'].$Exercise->imgurl,"./Uploads/ExercisePic/".$Exercise->ename.".jpg");            
                $Exercise->imgurl = "./Uploads/ExercisePic/".$Exercise->ename.".jpg";
                if($Exercise->save()){
                   $this->success('更新成功',U('myexercise'));
                } else {
                    $this->error('更新失败');
                }
            } else {
                $this->error($Exercise->getError());
            }
        } else {
            $info = array();
            /* 获取数据 */
            $info = M('Exercise')->field(true)->find($id);

            if(false === $info){
                $this->error('获取信息失败!');
            }
            $this->assign('info', $info);   
            $this->display();
        }
    }
    public function delete_img(){
        foreach (I('id') as $k => $v) {
           unlink($_SERVER['DOCUMENT_ROOT'].$v);
        }
        $this->success('');
/*        foreach ($_POST['mycars'] as $k => $v) {
         unlink($_SERVER['DOCUMENT_ROOT'].$v);
        }*/ 
    }
}

