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
<nav class="navbar navbar-default " role="navigation" style="background-color: darkslategrey;">
    
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo U('Index/Index');?>" style="font-size:20px;font-weight:800;color: #2a6496;background-color:white;">去健身啦.com......</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo U('Index/Index');?>" style="font-size:16px;color:white;font-weight:800">主页</a></li>
                <li><a href="#" style="font-size:16px;color:white;font-weight:800">空间</a></li>
                <li><a href="<?php echo U('Exercise/index');?>" style="font-size:16px;color:white;font-weight:800">健身</a></li>
                <li><a href="<?php echo U('Index/Index');?>" style="font-size:16px;color:white;font-weight:800">饮食</a></li>
                <li><a href="<?php echo U('User/login');?>" style="font-size:16px;color:white;font-weight:800">周边</a></li>
                <li><a href="#" style="font-size:16px;color:white;font-weight:800">商城</a></li>
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

	<!-- /头部 -->
	
	<!-- 主体 -->
	

    <header class="jumbotron subhead" id="overview">
        <div class="container">
            <h2>健身动作</h2>
            <p class="lead"></p>
        </div>

    </header>
    <!--    暂时放这儿-->
    <style type="text/css">
        h3{

            color: green; 

        }

        input[type="checkbox"]{
            vertical-align: middle;
            margin:0;
            width:17px;
            height:17px;
            overflow:hidden;
            margin-bottom: 0px;
        }
    
    </style>


<div id="main-container" class="container">
    <div class="row">
        
    <!-- 左侧 nav
    ================================================== -->
    <div class="span3  bs-docs-sidebar">
        <div id="finderLeft">

            <h4>
                --动作过滤器--
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
                            <td><input class="ids" type="checkbox" name="mainmuscleid" value="<?php echo ($k); ?>" /></td>
                            <td>
                            <?php echo ($vo); ?>
                            </td><?php endif; ?>
                        <?php if($k % 2 == '0' ): ?><td><input class="ids" type="checkbox" name="mainmuscleid" value="<?php echo ($k); ?>" /></td>
                            <td>
                            <?php echo ($vo); ?>
                            </td>
                            </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript" >
$("document").ready(function(){
    $(".ids").click(function(){
        var filter_1 = "";
         $("input[name='mainmuscleid']:checkbox:checked").each(function(){ 
   filter_1+=$(this).val() + ',';
}); 

    $.post("<?php echo U('Exercise/search');?>",{'filter_1':filter_1},
    function(data){
        if(data.status)
        {
            //alert(data.info[0].ename);
            $("#excInfo").append("<tbody>");
            for(var i = 0; i < data.info.length; i++)
            {
                $("#excInfo").append("<tr>");
                $("#excInfo").append("<td>" + data.info[i].ename + "</td>");
                $("#excInfo").append("<td>" + data.info[i].mname + "</td>");
                $("#excInfo").append("<td>" + data.info[i].ename + "</td>");
                $("#excInfo").append("<tr>");
            }
            $("#excInfo").append("</tbody>");
        }
        else
        {
            alert("获取失败");
        }
    }, 'json');
  });

})
</script>



        
    <div class="span9">
        <!-- Contents
        ================================================== -->
        <h1> 过滤后的动作 </h1>
        <div id = "excInfo">
        
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
</div>
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