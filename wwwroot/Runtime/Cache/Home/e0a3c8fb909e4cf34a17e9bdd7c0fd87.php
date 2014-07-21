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
         
        
    <section>
 <div class="col-md-8">
     <div>
          <p>
            <h3 style="margin-top:30px;font-family:宋体；margin-left:5px;">如何制定你的计划</h3>
          </p>
     </div>
         <hr color="#BABABA" width:100%; size:1px; noshade />
 

     <div>
        <div style="margin-bottom:40px;float:left; padding-right: 65px;">
            <img style="float:left" src="" alt="tub" />
                <h4 >确定你的目标</h4>
                   <p style="width:500px";height:100px;>Build your ultimate workout program. Does your program burn fat, build muscle, or support a different fitness goal? Choose your goal, name your program, describe how it works, select the difficulty level, and let the world know if it's designated for men, women, or everyone</p>
      </div>

     <div style="float:left; width:180px; height:120px; border-left: 1px solid #BABABA;">
          <img src="" alt="tu1" style="padding-left:10px";>
     </div>
  
   
 </div> 

<div>
   
   <div style="margin-bottom:40px;float:left; padding-right: 65px;">
       <img style="float:left" src="" alt="tub" />
          <h4 >确定你的目标</h4>
              <p style="width:500px";height:100px;>Build your ultimate workout program. Does your program burn fat, build muscle, or support a different fitness goal? Choose your goal, name your program, describe how it works, select the difficulty level, and let the world know if it's designated for men, women, or everyone
              </p>
   </div>

    <div style="float:left; width:180px; height:120px; border-left: 1px solid #BABABA;">
     <img src="" alt="tu1" style="padding-left:10px";>
    </div>
  
   
 </div> 

<div>
   
   <div style="margin-bottom:40px;float:left; padding-right: 65px;">
       <img style="float:left" src="" alt="tub" />
           <h4 >确定你的目标</h4>
               <p style="width:500px";height:100px;>Build your ultimate workout program. Does your program burn fat, build muscle, or support a different fitness goal? Choose your goal, name your program, describe how it works, select the difficulty level, and let the world know if it's designated for men, women, or everyone
               </p>
   </div>

    <div style="float:left; width:180px; height:120px; border-left: 1px solid #BABABA;">
     <img src="" alt="tu1" style="padding-left:10px";>
    </div>
  
   
 </div> 

<div>
   
   <div style="margin-bottom:40px;float:left; padding-right: 65px;">
       <img style="float:left" src="" alt="tub" />
           <h4 >确定你的目标</h4>
              <p style="width:500px";height:100px;>Build your ultimate workout program. Does your program burn fat, build muscle, or support a different fitness goal? Choose your goal, name your program, describe how it works, select the difficulty level, and let the world know if it's designated for men, women, or everyone
              </p>
   </div>

    <div style="float:left; width:180px; height:120px; border-left: 1px solid #BABABA;">
     <img src="" alt="tu1" style="padding-left:10px";>
    </div>
  
   
   </div> 
       <hr color="#ccc" width:100%; size:1px; noshade />
   </div>

</div>



   



<div>
   <div style="width:374px;height:342px;border: 1px solid #BABABA;margin-right:30px;float:left;">
         <div style="height:40px; width:372px; border-bottom:1px soild  #BABABA ; background-color:#ccc;">目标1</div>
         <div style="width:372px; height:300px;">
              <div style="width:352px; height:300px;float:left;">
                aaaaaaaaaaaaaaa
              </div>
              <div style="width:20px; height:300px;background:#ccc;display:block;float:left;
              border-top: 1px solid #BABABA;"></div>
         </div>
   </div>
   <div style="width:374px;height:342px;border: 1px solid #BABABA;float:left;">
         <div style="height:40px; width:372px; border-bottom:1px soild  #BABABA ; background-color:#ccc;">目标2</div>
         <div style="width:372px; height:300px;">
              <div style="width:352px; height:300px;float:left;"></div>
              <div style="width:20px; height:300px;background:#ccc;display:block;float:left;
              border-top: 1px solid #BABABA;"></div>
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
		"ROOT"   : "/qujianshen/wwwroot", //当前网站地址
		"APP"    : "/qujianshen/wwwroot/index.php?s=", //当前项目地址
		"PUBLIC" : "/qujianshen/wwwroot/Public", //项目公共目录地址
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