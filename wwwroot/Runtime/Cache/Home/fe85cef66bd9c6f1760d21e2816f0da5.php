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
                <li><a href="#" id="User_nav" >空间</a></li>
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
	<div class="span12">
        <form class="login-form" action="/wwwroot/index.php?s=/Home/User/password.html" method="post">
          <div class="control-group">
            <label class="control-label" for="inputPassword">原密码</label>
            <div class="controls">
              <input type="password" id="inputPassword"  class="span3" placeholder="请输入密码"  errormsg="密码为6-20位" nullmsg="请填写密码" datatype="*6-20" name="old">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputPassword">新密码</label>
            <div class="controls">
              <input type="password" id="inputPassword"  class="span3" placeholder="请输入密码"  errormsg="密码为6-20位" nullmsg="请填写密码" datatype="*6-20" name="password">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputPassword">确认密码</label>
            <div class="controls">
              <input type="password" id="inputPassword" class="span3" placeholder="请再次输入密码" recheck="password" errormsg="您两次输入的密码不一致" nullmsg="请填确认密码" datatype="*" name="repassword">
            </div>
            <div class="controls Validform_checktip text-warning"></div>
          </div>
          <div class="control-group">
            <div class="controls">
              <button type="submit" class="btn">提 交</button>
            </div>
          </div>
        </form>
	</div>
</section>
    <table>  
            <tbody>  
                <tr>  
                    <td>编辑个性签名</td>  
                    <td>12345645</td>  
                </tr>  
            </tbody>  
        </table> 

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
		"ROOT"   : "/wwwroot", //当前网站地址
		"APP"    : "/wwwroot/index.php?s=", //当前项目地址
		"PUBLIC" : "/wwwroot/Public", //项目公共目录地址
		"DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
		"MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
		"VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
	}
})();
</script>

	<script type="text/javascript">
            $(document).ready(function(){  
    //找到所有td节点  
    var tds = $("td");  
    //给所有的td节点增加点击事件  
    tds.click(tdclick);  
});  
function tdclick(){  
    var clickfunction = this;  
    //0,获取当前的td节点  
    var td = $(this);  
    //1,取出当前td中的文本内容保存起来  
    var text = $(this).text();  
    //2，清空td里边内同  
    td.html("");  
    //3,建立一个文本框，也就是建一个input节点  
    var input = $("<input>");  
    //4,设置文本框中值是保存起来的文本内容  
    input.attr("value",text);  
    //4.5让文本框可以相应键盘按下的事件  
    input.keyup(function(event){  
        //记牌器当前用户按下的键值  
        var myEvent = event || window.event;//获取不同浏览器中的event对象  
        var kcode = myEvent.keyCode;  
        //判断是否是回车键按下  
        if(kcode == 13){  
            var inputnode = $(this);  
            //获取当前文本框的内容  
            var inputext = inputnode.val();  
            //清空td里边的内容,然后将内容填充到里边  
            var tdNode = inputnode.parent();  
            tdNode.html(inputext);  
            //让td重新拥有点击事件  
            tdNode.click(tdclick);  
        }  
    });  
    //5，把文本框加入到td里边去  
    td.append(input);  
    //5.5让文本框里边的文章被高亮选中  
    //需要将jquery的对象转换成dom对象  
    var inputdom = input.get(0);  
    inputdom.select();  
     
    //6,需要清楚td上的点击事件  
    td.unbind("click");  
}  

    	$(document)
	    	.ajaxStart(function(){
	    		$("button:submit").addClass("log-in").attr("disabled", true);
	    	})
	    	.ajaxStop(function(){
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