<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
<title><?php echo C('WEB_SITE_TITLE');?></title>
<link href="/2/Public/static/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="/2/Public/home/css/base.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css" media="all">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="/2/Public/static/bootstrap/js/html5shiv.js"></script>
<![endif]-->

<!--[if lt IE 9]>
<script type="text/javascript" src="/2/Public/static/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="/2/Public/static/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="/2/Public/static/bootstrap/js/bootstrap.min.js"></script>
<!--<![endif]-->
<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader');?>

</head>
<body>
	<!-- 头部 -->
	<!-- 导航条
================================================== -->
<style type="text/css">
        #Nutri_nav,#Index_nav,#User_nav,#Exercise_nav,#Around_nav,#Mall_nav{
    font-size:20px;
    color:white;
    font-weight:800;
}

</style>
<nav class="navbar navbar-default " role="navigation" style="
  background: #3399FF; 
  background: -webkit-gradient(linear, left top, left bottom, from(#3399FF), to(#336699));
  background: -moz-linear-gradient(top,  #faa51a,  #3399FF); 
  filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorStr='#e9e9e9', EndColorStr='#cccccc');padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
    
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            
            <a class="navbar-brand" href="<?php echo U('Index/Index');?>" style="font-size:20px;font-weight:800;color: #2a6496;background-color: #0aa;">去健身啦.com......</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="padding-top: 3px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo U('Index/Index');?>" id="Index_nav" style="margin-left:3px">主页</a></li>
                <li><a href="<?php echo U('BodySpace/Index');?>" id="User_nav" >空间</a></li>
                <li><a href="<?php echo U('Exercise/exc_common');?>" id="Exercise_nav">健身</a></li>
                <li><a href="<?php echo U('Index/Index');?>" id="Nutri_nav">饮食</a></li>
                <li><a href="<?php echo U('User/login');?>" id="Around_nav">周边</a></li>
                <li><a href="#" id="Mall_nav">商城</a></li>
            </ul>
            <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="文章,計劃..">
                </div>
                <button type="submit" class="btn btn-default">搜索</button>
            </form>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container-fluid">
    <div class="row" style="margin-top:-28px">
        <div class="col-md-12" style="background-color: white">
            <p>&nbsp</p>
        </div>
    </div>
</div>

<script type="text/javascript">
    $("#Index_nav").mouseover(function(){
  $("#Index_nav").css({"background-color":"white","color":"#3399FF"});
});
$("#Index_nav").mouseleave(function(){
  $("#Index_nav").css({"background-color":"#3399FF","color":"white"});
});
 $("#User_nav").mouseover(function(){
  $("#User_nav").css({"background-color":"white","color":"#3399FF"});
});
$("#User_nav").mouseleave(function(){
  $("#User_nav").css({"background-color":"#3399FF","color":"white"});
});
 $("#Exercise_nav").mouseover(function(){
  $("#Exercise_nav").css({"background-color":"white","color":"#3399FF"});
});
$("#Exercise_nav").mouseleave(function(){
  $("#Exercise_nav").css({"background-color":"#3399FF","color":"white"});
});
 $("#Nutri_nav").mouseover(function(){
  $("#Nutri_nav").css({"background-color":"white","color":"#3399FF"});
});
$("#Nutri_nav").mouseleave(function(){
  $("#Nutri_nav").css({"background-color":"#3399FF","color":"white"});
});
$("#Around_nav").mouseover(function(){
  $("#Around_nav").css({"background-color":"white","color":"#3399FF"});
});
$("#Around_nav").mouseleave(function(){
  $("#Around_nav").css({"background-color":"#3399FF","color":"white"});
});
$("#Mall_nav").mouseover(function(){
  $("#Mall_nav").css({"background-color":"white","color":"#3399FF"});
});
$("#Mall_nav").mouseleave(function(){
  $("#Mall_nav").css({"background-color":"#3399FF","color":"white"});
});
    
</script>

	<!-- /头部 -->
	
	<!-- 主体 -->
	<div id="main-container" class="container">
    <style type="text/css">
        .glyphicon{
            color:darkslategrey;
            background-color: white;
        }
        #sidenav_panel_1,#sidenav_panel_2,#sidenav_panel_3,#sidenav_panel_4{
            background-color:white;
        }
        [data-toggle=collapse]{
            color:darkslategrey;
        }
        #setting_list{
            margin-left: -15px;
        }
    </style>
    <div class="row" style="margin-top:-20px">
         
        
    <script type="text/javascript" src="/2/Public/static/uploadify/jquery.uploadify.min.js"></script>
    <section>
        <div class="row">
            <div class="col-md-4">
                <form class="form-horizontal" action="<?php echo U();?>" method="post" >
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="nickname">昵称</label>
                        <div class="col-md-8">
                            <input type="text" name="nickname" class="form-control" placeholder="请输入昵称">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="realname">真实姓名</label>
                        <div class="col-md-8">
                            <input type="text" name="realname"  class="form-control" placeholder="请输入真实姓名">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="realname">电话号码</label>
                        <div class="col-md-8">
                            <input type="text" name="telephone"  class="form-control" placeholder="请输入真实姓名">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="sex">性别</label>
                        <div class="col-md-8">
                            <div class="radio">
                                <label>
                                    <input type="radio"  checked name="sex" value="1">
                                    男
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio"  name="sex" value="2">
                                    女
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="telephone">家庭地址</label>
                        <div class="col-md-8">
                            <input type="text" name="homeadd"  class="form-control" placeholder="请输入家庭地址">
                        </div>    
                    </div>  

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="telephone">健身房地址</label>
                        <div class="col-md-8">
                            <input type="text" name="gymadd"  class="form-control" placeholder="请输入健身房地址">
                        </div>    
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="telephone">职业</label>
                        <div class="col-md-8">
                            <input type="text" name="occupation"  class="form-control" placeholder="请输入职业">
                         </div> 
                    </div>      

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="telephone">生日</label>
                        <div class="col-md-8">
                            <input type="text" name="birthday"  class="form-control" placeholder="请输入生日">
                        </div>
                        
                    <div>
                        
                    </div>
                        
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn submit-btn ajax-post">保存</button>
                        </div>
                    </div>
                    <div class="controls Validform_checktip text-warning"></div>
                   
                    <div class="form-group">
                        <input type="file" id="upload_picture_cover_id">
                        <input type="hidden"  name="cover_id"  id="cover_id_cover_id"/>
                        <input type="hidden" name="iconurl" value="" id="imgurl">
                        <div class="upload-img-box">
                        </div>
                    </div>
                    <script type="text/javascript">
                    //上传图片
                    /* 初始化上传插件 */
                    $("#upload_picture_cover_id").uploadify({
                        "height"          : 30,
                        "swf"             : "/2/Public/static/uploadify/uploadify.swf",
                        "fileObjName"     : "download",
                        "buttonText"      : "上传头像",
                        "uploader"        : "<?php echo U('User/uploadPicture',array('session_id'=>session_id()));?>",
                        "width"           : 120,
                        'removeTimeout'   : 1,
                        'fileTypeExts'    : '*.jpg; *.png; *.gif;',
                        "onUploadSuccess" : uploadPicturecover_id,
                        'onFallback' : function() {
                            alert('未检测到兼容版本的Flash.');
                        }
                    });
                    function uploadPicturecover_id(file, data){
                        var data = $.parseJSON(data);
                        var src = '';
                        if(data.status){
                            $("#cover_id_cover_id").val(data.id);
                            src = data.url || '/2' + data.path
                            $("#cover_id_cover_id").parent().find('.upload-img-box').html(
                                '<div class="upload-pre-item"><img src="' + src + '"/></div>'
                            );
                            $("#imgurl").val(src);
                        } else {
                            updateAlert(data.info);
                            setTimeout(function(){
                                $('#top-alert').find('button').click();
                                $(that).removeClass('disabled').prop('disabled',false);
                            },1500);
                        }
                    }
                    </script>
                </form>
            </div>
        </div>
    </section>





    </div>
</div>

<script type="text/javascript">
    $(function() {
        $(window).resize(function() {
            $("#main-container").css("min-height", $(window).height() - 343);
        }).resize();
    })
</script>


	<!-- /主体 -->

	<!-- 底部 -->
	
    <!-- 底部
    ================================================== -->
    <footer class="footer">
      <div class="container">
          <p> 本站由 <strong><a href="http://www.onethink.cn" target="_blank">OneThink</a></strong> 强力驱动</p>
      </div>
    </footer>

<script type="text/javascript">
(function(){
	var ThinkPHP = window.Think = {
		"ROOT"   : "/2", //当前网站地址
		"APP"    : "/2/index.php?s=", //当前项目地址
		"PUBLIC" : "/2/Public", //项目公共目录地址
		"DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
		"MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
		"VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
	}
})();
</script>

    <script type="text/javascript">
        $(document)
                .ajaxStart(function() {
                    $("button:submit").addClass("log-in").attr("disabled", true);
                })
                .ajaxStop(function() {
                    $("button:submit").removeClass("log-in").attr("disabled", false);
                });

        $("form").submit(function(){
            var self = $(this);
            $.post(self.attr("action"), self.serialize(), success, "json");
            return false;

            function success(data){
                if(data.status){
                    window.location.href = data.url;
                } else {
                    self.find(".Validform_checktip").text(data.info);
                }
            }
        });

    </script>
 <!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<?php echo hook('pageFooter', 'widget');?>
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
	
</div>

	<!-- /底部 -->
</body>
</html>