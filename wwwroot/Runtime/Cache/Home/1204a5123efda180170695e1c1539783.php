<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
<title><?php echo C('WEB_SITE_TITLE');?></title>
<link href="/qujianshenla/wwwroot/Public/static/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="/qujianshenla/wwwroot/Public/home/css/base.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css" media="all">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="/qujianshenla/wwwroot/Public/static/bootstrap/js/html5shiv.js"></script>
<![endif]-->

<!--[if lt IE 9]>
<script type="text/javascript" src="/qujianshenla/wwwroot/Public/static/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="/qujianshenla/wwwroot/Public/static/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="/qujianshenla/wwwroot/Public/static/bootstrap/js/bootstrap.min.js"></script>
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

      <a class="navbar-brand" href="<?php echo U('Index/Index');?>" id="Index_nav"><img src="/qujianshenla/wwwroot/Public/Home/images/logo.png" class="image">去健身啦</a>
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
            <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="文章,計劃..">
                </div>
                <button type="submit" class="btn btn-default">搜索</button>
                <?php echo hook('login');?>
            </form>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->

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
        
        

      
            <div class="col-md-8" style="background-color:#FFF; height:1500px; ">
                   <div  class="col-md-12" style=" height:330px; ">
                              <div  class="col-md-3" style="background-color:#FFF; height:160px;  border:0.3px; border-color:#D5D5D5; 
                                                                                        border-style:dashed none solid none;   border-radius: 20px; ">
                                         <div  class="col-md-12" style="background-color:#BABABA; height:20px;  text-align:center;  
                                                                  border-radius: 7px; ">STEP1</div>
                                       <div  class="col-md-12" style="height:100px;  text-align:center;"></div>
                                       <div  class="col-md-12" style=" height:40px;  text-align:center;">aababcadftg</div>
                              </div>
                              <div  class="col-md-3" style="background-color:#FFF; height:160px;  border:0.3px; border-color:#D5D5D5; 
                                                                                        border-style:dashed none solid none; ">
                                         <div  class="col-md-12" style="background-color:#BABABA; height:20px;  text-align:center;
                                                                                                        border-radius: 7px; ">STEP1</div>
                                       <div  class="col-md-12" style=" height:100px;  text-align:center;"></div>
                                       <div  class="col-md-12" style=" height:40px;  text-align:center;">aababcadftg</div>
                              </div>
                               <div  class="col-md-3" style="background-color:#FFF; height:160px;  border:0.3px; border-color:#D5D5D5; 
                                                                                        border-style:dashed none solid none; ">
                                         <div  class="col-md-12" style="background-color:#BABABA; height:20px;  text-align:center;
                                                                                                        border-radius: 7px; ">STEP1</div>
                                       <div  class="col-md-12" style=" height:100px;  text-align:center;"></div>
                                       <div  class="col-md-12" style=" height:40px;  text-align:center;">aababcadftg</div>
                              </div>
                               <div  class="col-md-3" style="background-color:#FFF; height:160px;  border:0.3px; border-color:#D5D5D5; 
                                                                                        border-style:dashed none solid none; ">
                                         <div  class="col-md-12" style="background-color:#BABABA; height:20px;  text-align:center;
                                                                                                        border-radius: 7px; ">STEP1</div>
                                       <div  class="col-md-12" style=" height:100px;  text-align:center;"></div>
                                       <div  class="col-md-12" style=" height:40px;  text-align:center;">aababcadftg</div>
                              </div>
                               <div  class="col-md-12" style="background-color:#FFF; height:150px; margin-top: 10px; border:6px solid #BABABA;">
                                        <h3  style="line-height: 80px;">AAAAAAAAAAAAAA</h3>
                                        <h6>AAAAAAAAAAAAAAAAAAAAAAAAAAAAbbbbbbbbbbbbbbbbbbbbbbbbbb</h6>
                                        <div style="  float: right; margin-top: -90px; ">
                                                 <img src="/qujianshenla/wwwroot/Public/Home/images/exc/close.png " width:20px; height:20px;>
                                        </div>  
                                                                                        
                               </div>

                   </div>

                   <div  class="col-md-12" style="background-color:#FFF; height:180px;  border-bottom: 1px solid #BABABA;">
                           <div   class="col-md-3" style=" height:130px;  margin-top: -5px;"></div>
                           <div   class="col-md-3" style="height:130px;  margin-top: 25px;">
                                 <h4>21 day</h4>
                                 <span>jintshigeshaoriijianegjoin</span>
                                 <span>jintshigeshaoriijeingaonhgoingownh</span>
                                 <span>jintshigeshaoriijieong</span>
                                 <span>jintshigeshaoriijiengalohginhnahop</span>
                           </div>
                           <div  class="col-md-1" style="height:30px; background-color:#05578A; float:right;text-align:center; color:#FFF; margin-top: 70px">
                                  <h5 style="margin-top: 5px;  text-align:center; margin-left: -3px;">select</h5>
                           </div>
                   </div>
                    <div  class="col-md-12" style="background-color:#FFF; height:180px; border-bottom: 1px solid #BABABA;">
                           <div   class="col-md-3" style=" height:130px;  margin-top: -5px;"></div>
                           <div   class="col-md-3" style="height:130px;  margin-top: 25px;">
                                 <h4>21 day</h4>
                                 <span>jintshigeshaoriijianegjoin</span>
                                 <span>jintshigeshaoriijeingaonhgoingownh</span>
                                 <span>jintshigeshaoriijieong</span>
                                 <span>jintshigeshaoriijiengalohginhnahop</span>
                           </div>
                           <div  class="col-md-1" style="height:30px; background-color:#05578A; float:right;text-align:center; color:#FFF; margin-top: 70px">
                                  <h5 style="margin-top: 5px;  text-align:center; margin-left: -3px;">select</h5>
                           </div>
                   </div>
                    <div  class="col-md-12" style="background-color:#FFF; height:180px;  border-bottom: 1px solid #BABABA;">
                           <div   class="col-md-3" style=" height:130px;  margin-top: -5px;"></div>
                           <div   class="col-md-3" style="height:130px;  margin-top: 25px;">
                                 <h4>21 day</h4>
                                 <span>jintshigeshaoriijianegjoin</span>
                                 <span>jintshigeshaoriijeingaonhgoingownh</span>
                                 <span>jintshigeshaoriijieong</span>
                                 <span>jintshigeshaoriijiengalohginhnahop</span>
                           </div>
                           <div  class="col-md-1" style="height:30px; background-color:#05578A; float:right;text-align:center; color:#FFF; margin-top: 70px">
                                  <h5 style="margin-top: 5px;  text-align:center; margin-left: -3px;">select</h5>
                           </div>
                   </div>
                    <div  class="col-md-12" style="background-color:#FFF; height:180px;  border-bottom: 1px solid #BABABA;">
                           <div   class="col-md-3" style=" height:130px;  margin-top: -5px;"></div>
                           <div   class="col-md-3" style="height:130px;  margin-top: 25px;">
                                 <h4>21 day</h4>
                                 <span>jintshigeshaoriijianegjoin</span>
                                 <span>jintshigeshaoriijeingaonhgoingownh</span>
                                 <span>jintshigeshaoriijieong</span>
                                 <span>jintshigeshaoriijiengalohginhnahop</span>
                           </div>
                           <div  class="col-md-1" style="height:30px; background-color:#05578A; float:right;text-align:center; color:#FFF; margin-top: 70px">
                                  <h5 style="margin-top: 5px;  text-align:center; margin-left: -3px;">select</h5>
                           </div>

     </div>
     
      <div style="float:right;margin-top:10px;"><a href="<?php echo U('Exercise/exc_mte');?>" class="btn btn-primary btn-lg active" role="button" ;>下一步</a></div>
</div>


         
             <div class="col-md-2" >
                  <div class="col-md-2"  style=" border: 1px solid #BABABA; height:500px;  position:fixed;" >
                            悬浮框  悬浮框  悬浮框  悬浮框   悬浮框   悬浮框  悬浮框  悬浮框  悬浮框  悬浮框   悬浮框   悬浮框  悬浮框  悬浮框  悬浮框  悬浮框   悬浮框   悬浮框  悬浮框  悬浮框  悬浮框  悬浮框   悬浮框   悬浮框  悬浮框  悬浮框  悬浮框  悬浮框   悬浮框   悬浮框  悬浮框  悬浮框  悬浮框  悬浮框   悬浮框   悬浮框  悬浮框  悬浮框  悬浮框  悬浮框   悬浮框   悬浮框  
                            悬浮框  悬浮框  悬浮框  悬浮框   悬浮框   悬浮框  
                            悬浮框  悬浮框  悬浮框  悬浮框   悬浮框   悬浮框  
                 </div>
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
		"ROOT"   : "/qujianshenla/wwwroot", //当前网站地址
		"APP"    : "/qujianshenla/wwwroot/index.php?s=", //当前项目地址
		"PUBLIC" : "/qujianshenla/wwwroot/Public", //项目公共目录地址
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