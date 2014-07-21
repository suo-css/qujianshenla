<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
<title><?php echo C('WEB_SITE_TITLE');?></title>
<link href="/wwwroot/Public/static/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="/wwwroot/Public/home/css/base.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="/wwwroot/Public/static/bootstrap/js/html5shiv.js"></script>
<![endif]-->

<!--[if lt IE 9]>
<script type="text/javascript" src="/wwwroot/Public/static/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="/wwwroot/Public/static/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="/wwwroot/Public/static/bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
  $(":checkbox").click(function(){
   var filter_1 = "";
   var filter_2 = "";
   var filter_3 = "";
   var filter_4 = "";
   var filter_5 = "";
   var filter_6 = "";
   var filter_7 = "";
   $("input[name='filter_1']:checkbox:checked").each(function(){ 
   filter_1+=$(this).val() + ","
}) 
$("input[name='filter_2']:checkbox:checked").each(function(){ 
   filter_2+=$(this).val() + ","
}) 
$("input[name='filter_3']:checkbox:checked").each(function(){ 
   filter_3+=$(this).val() + ","
}) 
$("input[name='filter_4']:checkbox:checked").each(function(){ 
   filter_4+=$(this).val() + ","
}) 
$("input[name='filter_5']:checkbox:checked").each(function(){ 
   filter_5+=$(this).val() + ","
}) 
$("input[name='filter_6']:checkbox:checked").each(function(){ 
   filter_6+=$(this).val() + ","
}) 
$("input[name='filter_7']:checkbox:checked").each(function(){ 
   filter_7+=$(this).val() + ","
}) 
    var filter_all = [
        filter_1,
        filter_2,
        filter_3,
        filter_4,
        filter_5,
        filter_6,
        filter_7
    ]
alert(filter_all); 
})
  });
</script>
<!--<![endif]-->
<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader');?>

</head>
<body>
	<!-- 头部 -->
	<!-- 导航条
================================================== -->
<style type="text/css">
        li{
            color:white;
        }

</style>
<nav class="navbar navbar-default " role="navigation" style="background-color: darkslategrey; padding-top: 1px;padding-right:0px;padding-bottom:0px;padding-left:0px;border-style: solid;">
    
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo U('Index/Index');?>" style="font-size:20px;font-weight:800;color: #2a6496;background-color: #0aa;">去健身啦.com......</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="background-color: darkslategrey; padding-top: 3px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo U('Index/Index');?>" id="Index_nav" style="font-size:16px;color:white;font-weight:800;">主页</a></li>
                <li><a href="#" id="user_nav" style="font-size:16px;color:white;font-weight:800">空间</a></li>
                <li><a href="<?php echo U('Exercise/exc_filter');?>" id="Exercise_nav" style="font-size:16px;color:white;font-weight:800">健身</a></li>
                <li><a href="<?php echo U('Index/Index');?>" id="Nutri_nav" style="font-size:16px;color:white;font-weight:800">饮食</a></li>
                <li><a href="<?php echo U('User/login');?>" id="Around_nav" style="font-size:16px;color:white;font-weight:800">周边</a></li>
                <li><a href="#" id="Mall_nav" style="font-size:16px;color:white;font-weight:800">商城</a></li>
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

<script type="text/javascript">
    $("#Index_nav").mouseover(function(){
  $("#Index_nav").css({"background-color":"white","color":"darkslategrey"});
});
$("#Index_nav").mouseleave(function(){
  $("#Index_nav").css({"background-color":"darkslategrey","color":"white"});
});
 $("#user_nav").mouseover(function(){
  $("#user_nav").css({"background-color":"white","color":"darkslategrey"});
});
$("#user_nav").mouseleave(function(){
  $("#user_nav").css({"background-color":"darkslategrey","color":"white"});
});
 $("#Exercise_nav").mouseover(function(){
  $("#Exercise_nav").css({"background-color":"white","color":"darkslategrey"});
});
$("#Exercise_nav").mouseleave(function(){
  $("#Exercise_nav").css({"background-color":"darkslategrey","color":"white"});
});
 $("#Nutri_nav").mouseover(function(){
  $("#Nutri_nav").css({"background-color":"white","color":"darkslategrey"});
});
$("#Nutri_nav").mouseleave(function(){
  $("#Nutri_nav").css({"background-color":"darkslategrey","color":"white"});
});
$("#Around_nav").mouseover(function(){
  $("#Around_nav").css({"background-color":"white","color":"darkslategrey"});
});
$("#Around_nav").mouseleave(function(){
  $("#Around_nav").css({"background-color":"darkslategrey","color":"white"});
});
$("#Mall_nav").mouseover(function(){
  $("#Mall_nav").css({"background-color":"white","color":"darkslategrey"});
});
$("#Mall_nav").mouseleave(function(){
  $("#Mall_nav").css({"background-color":"darkslategrey","color":"white"});
});
    
</script>

	<!-- /头部 -->
	
	<!-- 主体 -->
	

<div id="main-container" class="container">
    <div class="row" style="margin-top:-22px">
        
            <!-- 左侧 nav
            ================================================== -->
            <div class="col-md-2 bs-docs-sidebar" style="font-size:16px;color:darkslategrey;font-weight:800;background-color:white;  padding-top: 0px;padding-right:0px;padding-bottom:0px;padding-left: 0px;border-style: solid">

                <div class="user_space">
                    <div class="user_information" style="color:white;font-weight:800;background-color:darkslategrey;  padding-top: 3px;padding-right:3px;padding-bottom:3px;padding-left:3px;border-style: solid;" >
                        <p>..........</p>
                        <p>..........</p>
                        <p>..........</p>
                    </div>
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading" id="sidenav_panel_1">
                                <h4 class="panel-title"> 
                                    <span class="glyphicon glyphicon-hand-right" style="color:white"></span> &nbsp
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="color:white">
                                        登陆
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <form class="form-horizontal" action="/wwwroot/index.php?s=/Home/Exercise/exc_index.html" method="post">
                                        <div class="form-group">
                                            <label class="col-md-6 control-label" for="inputEmail">用户名</label>
                                            <div class="col-md-12">
                                                <input type="text" id="inputEmail" class="form-control" placeholder="请输入用户名"  ajaxurl="/member/checkUserNameUnique.html" errormsg="请填写1-16位用户名" nullmsg="请填写用户名" datatype="*1-16" value="" name="username">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-5 control-label" for="inputPassword">密码</label>
                                            <div class="col-md-12">
                                                <input type="password" id="inputPassword"  class="form-control" placeholder="请输入密码"  errormsg="密码为6-20位" nullmsg="请填写密码" datatype="*6-20" name="password">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12 col-md-offset-2 checkbox">
                                                <input type="checkbox"> 自动登陆
                                            </label>
                                        </div>
                                        <div class="col-md-6">    
                                            <button type="submit" class="btn">登 陆</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" id="sidenav_panel_2">
                                <h4 class="panel-title">
                                    <span class="glyphicon glyphicon-off" style="color:white"></span> &nbsp
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="color:white">
                                        注册
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <form class="form-horizontal" action="/wwwroot/index.php?s=/Home/Exercise/exc_index.html" method="post" role="form">
                                        <div class="form-group">
                                            <label class="col-md-6 control-label" for="inputEmail">用户名</label>
                                            <div class="col-md-12">
                                                <input type="text" id="inputEmail" class="form-control" placeholder="请输入用户名"  ajaxurl="/member/checkUserNameUnique.html" errormsg="请填写1-16位用户名" nullmsg="请填写用户名" datatype="*1-16" value="" name="username">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-5 control-label" for="inputPassword">密码</label>
                                            <div class="col-md-12">
                                                <input type="password" id="inputPassword"  class="form-control" placeholder="请输入密码"  errormsg="密码为6-20位" nullmsg="请填写密码" datatype="*6-20" name="password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-7 control-label" for="inputPassword">确认密码</label>
                                            <div class="col-md-12">
                                                <input type="password" id="inputPassword" class="form-control" placeholder="请再次输入密码" recheck="password" errormsg="您两次输入的密码不一致" nullmsg="请填确认密码" datatype="*" name="repassword">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-5 control-label" for="inputEmail">邮箱</label>
                                            <div class="col-md-12">
                                                <input type="text" id="inputEmail" class="form-control" placeholder="请输入电子邮件"  ajaxurl="/member/checkUserEmailUnique.html" errormsg="请填写正确格式的邮箱" nullmsg="请填写邮箱" datatype="e" value="" name="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label" for="inputPassword">验证码</label>
                                            <div class="col-md-12">
                                                <input type="text" id="inputPassword" class="form-control" placeholder="请输入验证码"  errormsg="请填写5位验证码" nullmsg="请填写验证码" datatype="*5-5" name="verify">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label"></label>
                                            <div class="col-md-12">
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
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" id="sidenav_panel_3">
                                <h4 class="panel-title">
                                    <span class="glyphicon glyphicon-user" style="color:white"></span> &nbsp
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" style="color:white">
                                        健身小组
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Anim pariatur cliche atatquer farm-to-tablee sustainable VHS.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        
        
    <div class="col-md-9" style="border-style: solid;">
        <!-- Contents
        ================================================== -->
        <section id="contents">
            <?php $category=D('Category')->getChildrenId(1);$__LIST__ = D('Document')->page(!empty($_GET["p"])?$_GET["p"]:1,10)->lists($category, '`level` DESC,`id` DESC', 1,true); if(is_array($__LIST__)): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?><div class="">
                    <h2>这是建设中的<strong>去健身啦.com</strong>的首页</h2>
                </div>
                    <div>
                        <p class="lead"><?php echo ($article["description"]); ?></p>
                    </div>
                    <div>
                        <span><a href="<?php echo U('Article/detail?id='.$article['id']);?>">查看全文</a></span>
                        <span class="pull-right">
                            <span class="author"><?php echo (get_username($article["uid"])); ?></span>
                            <span>于 <?php echo (date('Y-m-d H:i',$article["create_time"])); ?></span> 发表在 <span>
                            <a href="<?php echo U('Article/lists?category='.get_category_name($article['category_id']));?>"><?php echo (get_category_title($article["category_id"])); ?></a></span> ( 阅读：<?php echo ($article["view"]); ?> )
                    </span>
                </div>
                <hr/><?php endforeach; endif; else: echo "" ;endif; ?>

        </section>
    </div>
        </div>

    </div>
</div>

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
    $(function() {
        $(window).resize(function() {
            $("#main-container").css("min-height", $(window).height() - 343);
        }).resize();
    })
</script>

<!--

<div class="member_space">
    <div class="member_information">
        <p>awrawrawr</p>
        <p>awrawrawr</p>
        <p>awrawrawr</p>
    </div>
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading" id="sidenav_panel_1">
                <h4 class="panel-title"> 
                    <span class="glyphicon glyphicon-home" style="color:white"></span> &nbsp
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="color:white">
                        我的主页
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    Anim pa sunt aliqua put a bird yeh an excepteur butcher vice lomo. Legginustainable VHS.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" id="sidenav_panel_2">
                <h4 class="panel-title">
                    <span class="glyphicon glyphicon-calendar" style="color:white"></span> &nbsp
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="color:white">
                        我的计划
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    Anim pariatur cliche ch 3 wolf moonente ea le, raw denim aestheabore sustainable VHS.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" id="sidenav_panel_3">
                <h4 class="panel-title">
                    <span class="glyphicon glyphicon-user" style="color:white"></span> &nbsp
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" style="color:white">
                        健身小组
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                    Anim pariatur cliche atatquer farm-to-tablee sustainable VHS.
                </div>
            </div>
        </div>
    </div>
</div>-->
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
		"ROOT"   : "/wwwroot", //当前网站地址
		"APP"    : "/wwwroot/index.php?s=", //当前项目地址
		"PUBLIC" : "/wwwroot/Public", //项目公共目录地址
		"DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
		"MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
		"VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
	}
})();
</script>
 <!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<?php echo hook('pageFooter', 'widget');?>
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
	
</div>

	<!-- /底部 -->
</body>
</html>