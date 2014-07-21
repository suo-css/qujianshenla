<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
<title><?php echo C('WEB_SITE_TITLE');?></title>
<link href="/git/qujianshen/wwwroot/Public/static/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="/git/qujianshen/wwwroot/Public/home/css/base.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css" media="all">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="/git/qujianshen/wwwroot/Public/static/bootstrap/js/html5shiv.js"></script>
<![endif]-->

<!--[if lt IE 9]>
<script type="text/javascript" src="/git/qujianshen/wwwroot/Public/static/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="/git/qujianshen/wwwroot/Public/static/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="/git/qujianshen/wwwroot/Public/static/bootstrap/js/bootstrap.min.js"></script>
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
                <li><a href="<?php echo U('nri/Index');?>" id="Nutri_nav">饮食</a></li>
                <li><a href="<?php echo U('near/Index');?>" id="Around_nav">周边</a></li>
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
         
        
    <section>
        <div class="row">
            <div class="col-md-4">
                <form class="form-horizontal" action="<?php echo U();?>" method="post" >
                    
                    <div id="img_save"><?php echo avatars();?></div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="nickname">昵称</label>
                        <div class="col-md-8">
                            <input type="text" value="<?php echo ($result["nickname"]); ?>" name="nickname" class="form-control" placeholder="请输入昵称">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="realname">真实姓名</label>
                        <div class="col-md-8">
                            <input type="text" value="<?php echo ($result["realname"]); ?>" name="realname"  class="form-control" placeholder="请输入真实姓名">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="realname">电话号码</label>
                        <div class="col-md-8">
                            <input type="text" name="telephone" value="<?php echo ($result["telephone"]); ?>"  class="form-control" placeholder="请输入真实姓名">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="sex">性别</label>
                        <div class="col-md-8">
                            <div class="radio">
                                <label>
                                    <input type="radio" value="1" name='sex' <?php if($result['sex'] == 1 ): ?>checked<?php endif; ?>>
                                    男
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio"  name="sex" value="2" <?php if($result['sex'] == 2 ): ?>checked<?php endif; ?>>
                                    女
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="telephone">家庭地址</label>
                        <div class="col-md-8">
                            <input type="text" value="<?php echo ($result["homeadd"]); ?>" name="homeadd"  class="form-control" placeholder="请输入家庭地址">
                        </div>    
                    </div>  

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="telephone">健身房地址</label>
                        <div class="col-md-8">
                            <input type="text" value="<?php echo ($result["gymadd"]); ?>" name="gymadd"  class="form-control" placeholder="请输入健身房地址">
                        </div>    
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="telephone">职业</label>
                        <div class="col-md-8">
                            <input type="text" name="occupation" value="<?php echo ($result["occupation"]); ?>"  class="form-control" placeholder="请输入职业">
                         </div> 
                    </div>      

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="telephone">生日</label>
                        <div class="col-md-8">
                            <input type="text" id="time-start" name="birthday"  value="<?php echo ($result["birthday"]); ?>"  class="form-control" onkeyup="$(this).val('')" placeholder="请输入生日">
                        </div>
                        
                    <div>
                        
                    </div>
                                        
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn submit-btn ajax-post">保存</button>
                        </div>
                    </div>
                    <div class="controls Validform_checktip text-warning"></div>
                    <input type="hidden" name=id value="<?php echo ($result["id"]); ?>">
                </form>
            </div>
        </div>

        <!-- Button trigger modal -->
        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
          上传头像
        </button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">上传头像</h4>
              </div>
              <div class="modal-body">
                  <div id="altContent"  ><!-- 上传图片容器 -->
                        
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
              </div>
            </div>
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
		"ROOT"   : "/git/qujianshen/wwwroot", //当前网站地址
		"APP"    : "/git/qujianshen/wwwroot/index.php?s=", //当前项目地址
		"PUBLIC" : "/git/qujianshen/wwwroot/Public", //项目公共目录地址
		"DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
		"MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
		"VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
	}
})();
</script>

<link href="/git/qujianshen/wwwroot/Public/static/datetimepicker/css/datetimepicker.css" rel="stylesheet" type="text/css">
<?php if(C('COLOR_STYLE')=='blue_color') echo '<link href="/git/qujianshen/wwwroot/Public/static/datetimepicker/css/datetimepicker_blue.css" rel="stylesheet" type="text/css">'; ?>
<link href="/git/qujianshen/wwwroot/Public/static/datetimepicker/css/dropdown.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/git/qujianshen/wwwroot/Public/static/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="/git/qujianshen/wwwroot/Public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>

    <script src="http://open.web.meitu.com/sources/xiuxiu.js" type="text/javascript"></script>

    <script type="text/javascript">
        window.onload=function(){
            xiuxiu.embedSWF("altContent",5,"850","560");
               /*第1个参数是加载编辑器div容器，第2个参数是编辑器类型，第3个参数是div容器宽，第4个参数是div容器高*/
            var url = "<?php echo U('user/upload');?>";
            xiuxiu.setUploadURL("http://127.0.0.1/"+url);//修改为您自己的上传接收图片程序 
            xiuxiu.onUploadResponse = function (data)
            {
                if(data==1){
                  $("#img_save").html("<img width=60 height=60 src=./Uploads/avatars/<?php echo ($result["uid"]); ?>/<?php echo ($result["uid"]); ?>.jpg?<?php echo rand(100,999); ?> alt=>");
                }else{
                    alert('服务器繁忙！');
                }
            }
        }
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
    $('#time-start').datetimepicker({
        format: 'yyyy-mm-dd',
        language:"zh-CN",
        minView:2,
        autoclose:true
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