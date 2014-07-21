<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
<title><?php echo C('WEB_SITE_TITLE');?></title>
<link href="/qujianshen/wwwroot/Public/static/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="/qujianshen/wwwroot/Public/home/css/base.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css" media="all">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="/qujianshen/wwwroot/Public/static/bootstrap/js/html5shiv.js"></script>
<![endif]-->

<!--[if lt IE 9]>
<script type="text/javascript" src="/qujianshen/wwwroot/Public/static/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="/qujianshen/wwwroot/Public/static/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="/qujianshen/wwwroot/Public/static/bootstrap/js/bootstrap.min.js"></script>
<!--<![endif]-->
<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader');?>

</head>
<body>
	<!-- 头部 -->
	<!-- 导航条
================================================== -->
<style type="text/css">
   .navbar-default{
    color: #383735;
    background: #ffffff;
   background-image: -moz-linear-gradient(270deg, #ffffff 0%, rgba(201, 203, 202, 0.870588) 95%);
   background-image: -webkit-linear-gradient(270deg, #ffffff 0%, rgba(201, 203, 202, 0.870588) 95%);
   background-image: -o-linear-gradient(270deg, #ffffff 0%, rgba(201, 203, 202, 0.870588) 95%);
   background-image: linear-gradient(180deg, #ffffff 0%, rgba(201, 203, 202, 0.870588) 95%);
    font-family:"Microsoft YaHei",微软雅黑,"Microsoft JhengHei",华文细黑,STHeiti,MingLiu;
   }
   #Index_nav{
    margin-left: 80px;
   }
   #mid_nav{
    margin-left: 240px;
   }
   .navbar-brand{

   }
</style>
 <nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand" href="<?php echo U('Index/Index');?>" id="Index_nav"><img src="/qujianshen/wwwroot/Public/Home/images/logo.png" class="image">去健身啦</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-middle" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav" id="mid_nav">
                <li><a href="<?php echo U('BodySpace/Index');?>" id="User_nav" >空间</a></li>
                <li><a href="<?php echo U('Exercise/exc_common');?>" id="Exercise_nav">健身</a></li>
                <li><a href="<?php echo U('nri/Index');?>" id="Nutri_nav">饮食</a></li>
                <li><a href="<?php echo U('near/Index');?>" id="Around_nav">周边</a></li>
                <li><a href="#" id="Mall_nav">商城</a></li>
      </ul>
      
      
        <div class="collapse navbar-collapse navbar-right">
                <?php if(is_login()): ?><ul class="nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-left:0;padding-right:0"><?php echo get_username();?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo U('User/profile');?>">修改密码</a>
                                <li><a href="<?php echo U('User/logout');?>">退出</a>
                            </ul>
                      
                    </ul>
                <?php else: ?>
                    <ul class="nav" style="margin-right:0">
                        <li>
                            <a href="<?php echo U('User/login');?>">登录</a>
                        
                        <li>
                            <a href="<?php echo U('User/register');?>" style="padding-left:0;padding-right:0">注册</a>
                        
                    </ul><?php endif; ?>
            </div>
       
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



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
        
            <!-- 左侧 nav
            ================================================== -->
            <div class="col-md-2 bs-docs-sidebar" style="font-size:16px;color:darkslategrey;font-weight:800; padding-top: 0px;padding-right:0px;padding-bottom:0px;padding-left: 0px;">

                <div class="user_space">
                    <div class="user_information" style="color:white;font-weight:800;background-color:darkslategrey padding-top: 3px;padding-right:3px;padding-bottom:3px;padding-left:3px;border-style: solid;" >
                        <p>..........</p>
                        <p>..........</p>
                        <p>..........</p>
                    </div>
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading" id="sidenav_panel_1">
                                <h4 class="panel-title"> 
                                    <span class="glyphicon glyphicon-home"></span> &nbsp
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        我的主页
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <a href="<?php echo U('User/login');?>">登陆</a>
                                     <a href="<?php echo U('User/password');?>">修改</a>
                                      <a href="<?php echo U('User/register');?>">注册</a>
                                       <a href="<?php echo U('User/logout');?>">退出</a>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" id="sidenav_panel_2">
                                <h4 class="panel-title">
                                    <span class="glyphicon glyphicon-calendar"></span> &nbsp
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
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
                                    <span class="glyphicon glyphicon-user"></span> &nbsp
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
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
                        <div class="panel panel-default">
                            <div class="panel-heading" id="sidenav_panel_4">
                                <h4 class="panel-title">
                                    <span class="glyphicon glyphicon-wrench"></span> &nbsp
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                        设置
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse">
                                <div class="panel-body">
                                            <a href="<?php echo U('User/profiles');?>">个人信息</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        
    <style type="text/css"> 
        #faqbg{background-color:#666666; position:absolute; z-index:99; left:0; top:0; display:none; width:100%; height:1000px;opacity:0.5;filter: alpha(opacity=50);-moz-opacity: 0.5;} 
        #faqdiv{position:absolute;width:400px; left:50%; top:50%; margin-left:-200px; height:auto; z-index:100;background-color:#fff; border:1px #8FA4F5 solid; padding:1px;} 
        #faqdiv h2{ height:25px; font-size:14px; background-color:#8FA4F5; position:relative; padding-left:10px; line-height:25px;} 
        #faqdiv h2 a{position:absolute; right:5px; font-size:12px; color:#FF0000} 
        #faqdiv .form{padding:10px;} 
    </style>
    <block name="exc_header">
   
            
    <div class="col-md-10" style="background-color: #F7F7F7;">
       <nav class="navbar" role="navigation" style="margin-top:0px;margin-left:0px; padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
        <a class="navbar-brand" href="<?php echo U('Exercise/exc_common');?>" id="exc_nav">健身</a>
        <!-- Brand and toggle get grouped for better mobile display -->
        

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style=" margin-left: 600px; padding-top: 3px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo U('Exercise/exc_filter');?>" id="filter_nav" >过滤器</a></li>
                <li><a href="<?php echo U('Exercise/exc_ind');?>" id="tml_nav">计划</a></li>
                <li><a href="<?php echo U('Exercise/exc_doc');?>" id="doc_nav">文章</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
</nav>
    </div>


    <script type="text/javascript">
 $("#filter_nav").mouseover(function(){
  $("#filter_nav").css({"border-bottom-style":"solid"," border-bottom-color":"#EB6001"});
});
$("#filter_nav").mouseleave(function(){
  $("#filter_nav").css({"border-bottom-style":""});
});
 
$("#tml_nav").mouseover(function(){
  $("#tml_nav").css({"border-bottom-style":"solid"," border-color":"#EB6001"});
});
$("#tml_nav").mouseleave(function(){
  $("#tml_nav").css({"border-bottom-style":""});
});
$("#doc_nav").mouseover(function(){
  $("#doc_nav").css({"border-bottom-style":"solid"," border-color":"#EB6001"});
});
$("#doc_nav").mouseleave(function(){
  $("#doc_nav").css({"border-bottom-style":""});
});
$("#").mouseleave(function(){
  $("#Mall_nav").css({"background-color":"#3399FF","color":"white"});
});
    
</script>
  
    <?php if($tinue == ''): ?><form action="<?php echo U('');?>" method="post" onsubmit='return view();'>
            <?php if(is_array($goaltype)): $i = 0; $__LIST__ = $goaltype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["name"]); ?>：<input type="text" class="value1" name="type[<?php echo ($vo["id"]); ?>]" value=""><?php echo ($vo["unit"]); endforeach; endif; else: echo "" ;endif; ?>
            
            <span id="error_show"></span>
           <button type="submit" class="btn submit">保存</button>
        </form>
    <?php else: ?>
        <form action="<?php echo U('');?>" method="post" onsubmit='return view();'>
            <?php if(is_array($goaltype)): $i = 0; $__LIST__ = $goaltype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["name"]); ?>：<input type="text" class="value1" name="type[<?php echo ($vo['id']); ?>]" value=<?php echo show_goal($vo['id']) ?>    ><?php echo ($vo["unit"]); endforeach; endif; else: echo "" ;endif; ?>
   
            <span id="error_show"></span>
           <button type="submit" class="btn submit">修改</button>
        </form><?php endif; ?>
    
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div style="height:344px;width:374px;float:right;">
            <div style="height:41px;width:374px;float:right;"><?php echo ($vo["name"]); ?></div>
            <div   style="width: 374px;  height: 303px;">
                 <?php echo goaltype($vo['id']) ?>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>   

    <div id="faqbg"></div> 
    <div id="faqdiv" style="display:none;"> 
            
    </div> 
    
         

        

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
		"ROOT"   : "/qujianshen/wwwroot", //当前网站地址
		"APP"    : "/qujianshen/wwwroot/index.php?s=", //当前项目地址
		"PUBLIC" : "/qujianshen/wwwroot/Public", //项目公共目录地址
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


        function ajax_form(typeid,sta){
            var url         ="<?php echo U('Exercise/goal');?>";
            var startvalue  = $("#startvalue").val();
            var goalvalue   = $("#goalvalue").val();
            var goaldate    = $("#goaldate").val();
            var type        = "#type-"+typeid;
            var d = new Date();
            var str = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
            $.post(url,{startvalue:startvalue,goalvalue:goalvalue,goaldate:goaldate,id:typeid,sta:sta},function(data){
                if(data==1){
                    $("#faqdiv").hide();
                    $(type).html(startvalue+"-"+str+"-"+goalvalue+"-"+goaldate);
                }
            });

        }

        function ajax_forms(typeid,sta){
            var url         ="<?php echo U('Exercise/goal');?>";
            var startvalue  = $("#startvalue").val();
            var goalvalue   = $("#goalvalue").val();
            var goaldate    = $("#goaldate").val();
            var type        = "#type-"+typeid;
            var currentvalue= $("#currentvalue").val();
            var d = new Date();
            var str = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
            $.post(url,{startvalue:startvalue,goalvalue:goalvalue,goaldate:goaldate,id:typeid,sta:sta,currentvalue:currentvalue},function(data){
                if(data==1){
                    $("#faqdiv").hide();
                    $(type).html(startvalue+"-"+str+"-"+goalvalue+"-"+goaldate+"-"+currentvalue+"-"+str);
                }
            });

        }


        function update_goal(json){
            var data = ""+json.name+"<div>startvalue:<input type='text' name='startvalue' id=startvalue value="+json.startvalue+"></div><div>goalvalue:<input type='text' name='goalvalue' id=goalvalue value="+json.goalvalue+"></div><div>goaldate:<input type='text' name='goaldate' id=goaldate value="+json.goaldate+"></div>currentvalue:<input type='text' name='currentvalue' id=currentvalue value="+json.currentvalue+"><button type='botton' class='btn ' onclick='ajax_forms("+json.id+",1);'>保存</button><div class='add_goal_error'></div>";
            $("#faqdiv").show().html(data);
        }

        function add_goal(id,name){
            var data = name+"<div>startvalue:<input type='text' name='startvalue' id=startvalue></div><div>goalvalue:<input type='text' name='goalvalue' id=goalvalue></div><div>goaldate:<input type='text' name='goaldate' id=goaldate></div><button type='botton' class='btn submit-btn ' onclick='ajax_form("+id+",0);'>保存</button><div class='add_goal_error'></div>";
            $("#faqdiv").show().html(data);
        }
        function view(){
           var sta = 0;
           $(".value1").each(function(){
                if($(this).val().replace(/\s+/,'') == ''){
                    $("#error_show").html('数据不能为空!');
                    sta++;
                }
            })
           if(sta>0){return false;}
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