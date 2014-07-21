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
    <div class="col-md-8">
        <!-- Contents
        ================================================== -->
        <h3> 过滤后的动作 </h3>
        <div id = "excInfo">
           
        </div>
    </div>
    <div id="finderLeft" class="col-md-2">

        <h4>
            --动作过滤器--1
        </h4>
        <div class="filterSep"></div>
        <div id="Filters">
            <div id="muscleFilter">
                <h4>
                    <div style="padding-bottom: 0px">肌群:&nbsp;&nbsp;
                        <a href="javascript: //" class="blueLink">全选</a>
                    </div>
                </h4>
                <table class="filterTable" id="muscleFilterTable">
                    <tbody>
                    <?php if(is_array($_list)): $k = 0; $__LIST__ = $_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($k % 2 == '1' ): ?><tr>
                                <td><input class="ids" type="checkbox" checked name="mainmuscleid" value="<?php echo ($k); ?>" /></td>
                                <td>
                                    <?php echo ($vo); ?>
                                </td><?php endif; ?>
                        <?php if($k % 2 == '0' ): ?><td><input class="ids" type="checkbox" checked name="mainmuscleid" value="<?php echo ($k); ?>" /></td>
                            <td>
                                <?php echo ($vo); ?>
                            </td>
                            </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>

                    </tbody>
                </table>

                <h4>
                    <div style="padding-bottom: 0px">锻炼类型:&nbsp;&nbsp;
                        <a href="javascript: //" class="blueLink">全选</a>
                    </div>
                </h4>
                <table class="filterTable" id="ExerciseTypeTable">

                    <tbody>
                    <?php if(is_array($_list2)): $k = 0; $__LIST__ = $_list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($k % 2 == '1' ): ?><tr>
                                <td><input class="ids" type="checkbox" checked name="exercisetypeid" value="<?php echo ($k); ?>" /></td>
                                <td>
                                    <?php echo ($vo); ?>
                                </td><?php endif; ?>
                        <?php if($k % 2 == '0' ): ?><td><input class="ids" type="checkbox" checked name="exercisetypeid" value="<?php echo ($k); ?>" /></td>
                            <td>
                                <?php echo ($vo); ?>
                            </td>
                            </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>

                    </tbody>
                </table>


                <h4>
                    <div style="padding-bottom: 0px">设备类型:&nbsp;&nbsp;
                        <a href="javascript: //" class="blueLink">全选</a>
                    </div>
                </h4>
                <table class="filterTable" id="EquipTypeTable">

                    <tbody>
                    <?php if(is_array($_list3)): $k = 0; $__LIST__ = $_list3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($k % 2 == '1' ): ?><tr>
                                <td><input class="ids" type="checkbox" checked name="equiptypeid" value="<?php echo ($k); ?>" /></td>
                                <td>
                                    <?php echo ($vo); ?>
                                </td><?php endif; ?>
                        <?php if($k % 2 == '0' ): ?><td><input class="ids" type="checkbox" checked name="equiptypeid" value="<?php echo ($k); ?>" /></td>
                            <td>
                                <?php echo ($vo); ?>
                            </td>
                            </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>

                    </tbody>
                </table>

                <h4>
                    <div style="padding-bottom: 0px">力量类型:&nbsp;&nbsp;
                        <a href="javascript: //" class="blueLink">全选</a>
                    </div>
                </h4>
                <table class="filterTable" id="ForceTypeTable">

                    <tbody>
                    <?php if(is_array($_list4)): $k = 0; $__LIST__ = $_list4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($k % 2 == '1' ): ?><tr>
                                <td><input class="ids" checked type="checkbox" name="forcetypeid" value="<?php echo ($k); ?>" /></td>
                                <td>
                                    <?php echo ($vo); ?>
                                </td><?php endif; ?>
                        <?php if($k % 2 == '0' ): ?><td><input class="ids" checked type="checkbox" name="forcetypeid" value="<?php echo ($k); ?>" /></td>
                            <td>
                                <?php echo ($vo); ?>
                            </td>
                            </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>

                    </tbody>
                </table>


                <h4>
                    <div style="padding-bottom: 0px">运行类型:&nbsp;&nbsp;
                        <a href="javascript: //" class="blueLink">全选</a>
                    </div>
                </h4>
                <table class="filterTable" id="SportTypeTable">

                    <tbody>
                    <?php if(is_array($_list5)): $k = 0; $__LIST__ = $_list5;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($k % 2 == '1' ): ?><tr>
                                <td><input class="ids" checked type="checkbox" name="sporttypeid" value="<?php echo ($k); ?>" /></td>
                                <td>
                                    <?php echo ($vo); ?>
                                </td><?php endif; ?>
                        <?php if($k % 2 == '0' ): ?><td><input class="ids" checked type="checkbox" name="sporttypeid" value="<?php echo ($k); ?>" /></td>
                            <td>
                                <?php echo ($vo); ?>
                            </td>
                            </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>

                    </tbody>
                </table>

                <h4>
                    <div style="padding-bottom: 0px">专家类型:&nbsp;&nbsp;
                        <a href="javascript: //" class="blueLink">全选</a>
                    </div>
                </h4>
                <table class="filterTable" id="LevelTypeTable">

                    <tbody>
                    <?php if(is_array($_list6)): $k = 0; $__LIST__ = $_list6;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($k % 2 == '1' ): ?><tr>
                                <td><input class="ids" checked type="checkbox" name="leveltypeid" value="<?php echo ($k); ?>" /></td>
                                <td>
                                    <?php echo ($vo); ?>
                                </td><?php endif; ?>
                        <?php if($k % 2 == '0' ): ?><td><input class="ids" checked type="checkbox" name="leveltypeid" value="<?php echo ($k); ?>" /></td>
                            <td>
                                <?php echo ($vo); ?>
                            </td>
                            </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script type="text/javascript" >
        $("document").ready(function() {
            $(".ids").click(function() {
                var filter_1 = "";
                var filter_2 = "";
                var filter_3 = "";
                var filter_4 = "";
                var filter_5 = "";
                var filter_6 = "";
                $("input[name='mainmuscleid']:checkbox:checked").each(function() {
                    filter_1 += $(this).val() + ',';
                });
                $("input[name='exercisetypeid']:checkbox:checked").each(function() {
                    filter_2 += $(this).val() + ',';
                });
                $("input[name='equiptypeid']:checkbox:checked").each(function() {
                    filter_3 += $(this).val() + ',';
                });
                $("input[name='forcetypeid']:checkbox:checked").each(function() {
                    filter_4 += $(this).val() + ',';
                });
                $("input[name='sporttypeid']:checkbox:checked").each(function() {
                    filter_5 += $(this).val() + ',';
                });
                $("input[name='leveltypeid']:checkbox:checked").each(function() {
                    filter_6 += $(this).val() + ',';
                });

                $.post("<?php echo U('Exercise/search');?>", {'filter_1': filter_1, 'filter_2': filter_2,
                    'filter_3': filter_3, 'filter_4': filter_4, 'filter_5': filter_5, 'filter_6': filter_6},
                function(data) {
                    if (data.status)
                    {
                        //alert(data.info[0].ename);
                        
                        $("#excInfo").empty();
                        for (var i = 0; i < data.info.length; i++)
                        {
                            
                            var exc = '<div class="col-md-12" style="border:2px;outline:#3399FF solid thick;">';
                            exc += '<div class="col-md-3"><image src="Public/Exercise/images/1.png" /><image src="Public/Exercise/images/2.png" /></div>';
                          exc +='<div class="col-md-7"><h5>'+"<a href=<?php echo U("Exercise/exc_all",'','');?>/eid/"+data.info[i].eid+">" + data.info[i].ename+"</a>"+data.info[i].action+"</h5>";
                          exc +='<h6>目标肌群</h6><h6>'+data.info[i].mtname+'</h6>';
                           exc +='<h6>器械</h6><h6>'+data.info[i].eqtname+'</h6></div>';
                            exc +='</div>';
         // <a href=javascript:; onclick=action(this); id="+data.info[i].eid+">添加为喜欢动作</a>
                            $("#excInfo").append(exc);
//                            $("#excInfo").append("<tr>");
//                            $("#excInfo").append("<td><a href='<?php echo U("Exercise/exc_all");?>'>" + data.info[i].ename + "</a></td>");
//                            $("#excInfo").append("<td>" + data.info[i].mtname + "</td>");
//                            $("#excInfo").append("<td>" + data.info[i].etname + "</td>");
//                            $("#excInfo").append("<td>" + data.info[i].eqtname + "</td>");
//                            $("#excInfo").append("<td>" + data.info[i].ftname + "</td>");
//                            $("#excInfo").append("<td>" + data.info[i].stname + "</td>");
//                            $("#excInfo").append("<td>" + data.info[i].ltname + "</td>");
//                            $("#excInfo").append("<td>" + data.info[i].sex + "</td>");
//                            $("#excInfo").append("<tr>");
                        }
                        
                    }
                    else
                    {
                        //$("#excInfo").append("获取失败");
                    }
                }, 'json');
            });

        })

    function action(obj){
        var id  = obj.id;
        var url = "<?php echo U('Exercise/addaction');?>";
        $.post(url,{id:id},function(data){
            if(data==1){
               $("#"+obj.id).hide(); 
            }else{
                alert('已经添加过了！');
            }
        })
    }
    </script>


         

        

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