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
                <form class="form-horizontal" action="/git/qujianshen/wwwroot/index.php?s=/Home/User/register.html" method="post" role="form">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputEmail">用户名</label>
                        <div class="col-md-8">
                            <input type="text" id="inputEmail" class="form-control" placeholder="请输入用户名" onkeyup="reg_name(this)"  ajaxurl="/member/checkUserNameUnique.html" errormsg="请填写1-16位用户名" nullmsg="请填写用户名" datatype="*1-16" value="" name="username">
                            <span id="name_error" style="display:none;"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputPassword">密码</label>
                        <div class="col-md-8">
                            <input type="password" id="inputPassword"  class="form-control" placeholder="请输入密码"  errormsg="密码为6-20位" nullmsg="请填写密码" datatype="*6-20" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputPassword">确认密码</label>
                        <div class="col-md-8">
                            <input type="password" id="inputPassword" class="form-control" placeholder="请再次输入密码" recheck="password" errormsg="您两次输入的密码不一致" nullmsg="请填确认密码" datatype="*" name="repassword">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputEmail">邮箱</label>
                        <div class="col-md-8">
                            <input type="text" id="inputEmail" class="form-control" placeholder="请输入电子邮件" onkeyup="reg_email(this)"  ajaxurl="/member/checkUserEmailUnique.html" errormsg="请填写正确格式的邮箱" nullmsg="请填写邮箱" datatype="e" value="" name="email">
                            <span id="email_error" style="display:none;"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputPassword">验证码</label>
                        <div class="col-md-8">
                            <input type="text" id="inputPassword" class="form-control" placeholder="请输入验证码"  errormsg="请填写5位验证码" nullmsg="请填写验证码" datatype="*5-5" name="verify">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <img class="verifyimg reloadverify" alt="点击切换" src="<?php echo U('verify');?>" style="cursor:pointer;">
                        </div>
                        <div class="col-md-8 Validform_checktip text-warning"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-3">
                            <button type="submit" class="btn">注 册</button>
                        </div>
                    </div>
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
		"ROOT"   : "/git/qujianshen/wwwroot", //当前网站地址
		"APP"    : "/git/qujianshen/wwwroot/index.php?s=", //当前项目地址
		"PUBLIC" : "/git/qujianshen/wwwroot/Public", //项目公共目录地址
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

        $("form").submit(function() {

            var self = $(this);
            $.post(self.attr("action"), self.serialize(), success, "json");
            return false;

            function success(data) {
                if (data.status) {
                    window.location.href = data.url;
                } else {
                    self.find(".Validform_checktip").text(data.info);
                    //刷新验证码
                    $(".reloadverify").click();
                }
            }
        });

        $(function() {
            var verifyimg = $(".verifyimg").attr("src");
            $(".reloadverify").click(function() {
                if (verifyimg.indexOf('?') > 0) {
                    $(".verifyimg").attr("src", verifyimg + '&random=' + Math.random());
                } else {
                    $(".verifyimg").attr("src", verifyimg.replace(/\?.*$/, '') + '?' + Math.random());
                }
            });
        });
        
        var url = "<?php echo U('User/reg_email_name');?>";
        function reg_email(obj){
            var reg = /^[a-zA-Z0-9_-]+(\.([a-zA-Z0-9_-])+)*@[a-zA-Z0-9_-]+[.][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*$/;   
            if(reg.test(obj.value)){
                $.post(url,{email:obj.value,key:'email'},function(data){
                    if(data==1){
                        $("#email_error").show().html('该邮箱已经被占用!').css('color','red');
                    }else{
                        $("#email_error").show().html('该邮箱可以使用！').css('color','greed');
                    }
                })  
            }else{
                $("#email_error").show().html('该邮箱格式不正确！').css('color','red');
            }
        }

        function reg_name(obj){
            $.post(url,{name:obj.value,key:'name'},function(data){
                if(data==1){
                    $("#name_error").show().html('该用户名已经被占用!').css('color','red');
                }else{
                    $("#name_error").show().html("该用户名可以使用！").css('color','greed');
                }
            })
        }
    </script>
 <!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<?php echo hook('pageFooter', 'widget');?>
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
	
</div>

	<!-- /底部 -->
</body>
</html>