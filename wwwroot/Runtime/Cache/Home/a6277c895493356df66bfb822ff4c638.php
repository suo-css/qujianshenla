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
                                            <a href="<?php echo U('User/profile');?>">个人信息</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        
        <div class="col-md-10" style="background-color: white;">
       <nav class="navbar" role="navigation" style="background-color: white; margin-top:-8px;margin-left: -15px; padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
        <!-- Brand and toggle get grouped for better mobile display -->
        

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style=" padding-top: 3px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo U('Exercise/exc_common');?>" id="exc_nav">健身主页</a></li>
                <li><a href="<?php echo U('Exercise/exc_filter');?>" id="filter_nav" >过滤器</a></li>
                <li><a href="<?php echo U('Exercise/exc_ind');?>" id="tml_nav">制定计划</a></li>
                <li><a href="<?php echo U('Index/Index');?>" id="Nutri_nav">饮食</a></li>
                <li><a href="<?php echo U('User/login');?>" id="Around_nav">周边</a></li>
                <li><a href="#" id="Mall_nav">商城</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
</nav>
    </div>
    
        <div class="col-md-5" id="video_con">
video
        </div>
        <div class="col-md-5" id="describe_con">
          describe
        </div>
        <div class="col-md-2" id="rating_con">

            <div id="save_con">
save
            </div>
        </div>

        <div class="col-md-6" id="img1_con">

        </div>
        <div class="col-md-6" id="img2_con">

        </div>
        <div class="col-md-6" id="img3_con">

        </div>
        <div class="col-md-6" id="img4_con">

        </div>

        <div class="col-md-3" id="group_con">

        </div>
        <div class="col-md-9" id="text_con">

        </div>
 
        <div class="col-md-7" id="relate_con">

        </div>
        <div class="col-md-5" id="top_con">

        </div>

        <div class="col-md-6" id="img1_con">

        </div>
        <div class="col-md-6" id="img2_con">

        </div>
        <div class="col-md-6" id="img3_con">

        </div>
        <div class="col-md-6" id="img4_con">

        </div>



<div class="col-md-6">
 <label class="item-label">内容<span class="check-tips"></span></label>
          <label class="textarea input-large">
                <textarea id="content"></textarea>
          </label>
          <span id="error_content" style="color:red;display:none;">内容不能为空!</span>
        <br>
        <div class="form-item">
            <button class="btn submit-btn ajax-post" id="submit" type="submit" target-form="form-horizontal">确 定</button>
            <button class="btn btn-return" onclick="javascript:history.back(-1);return false;">返 回</button>
        </div>
    <br>
    <div id="save">
      <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="wc_list_nod clearfix">
                  <br>
                  <div class="nod_inner clearfix" >
                      <div><?php $result = review_comment($vo['uid']);echo $result['username']; ?></div>
                      <div class="wb_cmR comm_main">
                          <div class="content_txt"><?php echo ($vo["content"]); ?></div>
                          <div class="content_txt"><?php echo ($vo["create_time"]); ?></div>
                          <?php echo reply_comment($vo['cid']) ?>
                          <div class="rl_area" id="<?php echo ($vo['cid']); ?>_reply">
                                <a href="javascript:;" onclick="$(this).siblings('div').toggle();">回复</a>
                                <div style="display:none;" id=<?php echo ($vo["uid"]); ?>_togg>
                                  <label class="textarea input-large">
                                        <textarea id="content_reply-<?php echo ($vo["cid"]); ?>"></textarea>
                                  </label>  
                                  <div style="display:none;color:red;">评论不能为空!</div>
                                  <a href="javascript:;" id="content_submit" onclick='content_submit(this)' name=<?php echo ($vo["cid"]); ?>-<?php echo is_login() ?>>提交</a>
                                </div>
                          </div>
                      </div>
                  </div>
                  <br>
          </div><?php endforeach; endif; else: echo "" ;endif; ?>
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
    $(document).ready(function(){
          var url     = "<?php echo U('Exercise/add_review');?>"; 
          $("#submit").click(function(){
            var eid     = "<?php echo $_GET['eid'] ?>";
            if(eid==""){return}
            var content = $("#content").val();
            var content = content.replace(/[ ]/g,"");
            if(content!=""){
              $("#error_content").hide();
              $.post(url,{content:content,eid:eid},function(data){
                if(data.status){
                  $("#content").val("");
                  $("#save").prepend("<div class='nod_inner clearfix' ><div>"+data.name+"</div><div class='wb_cmR comm_main'><div class='content_txt'>"+data.content+"</div><div class='content_txt' >"+data.create_time+"</div><div class='rl_area' id="+data.cid+"_reply><a onclick=togg("+data.cid+");>回复</a><div style='display:none;' id="+data.cid+"-togg><label class='textarea input-large'><textarea id=content_reply-"+data.cid+"></textarea></label><div style='display:none;color:red;' id=nu-"+data.cid+">评论不能为空!</div><a onclick=content_submit(this); name="+data.cid+"-"+data.uid+">提交</a></div></div></div></div>").fadeIn();
                }
              },'json')
            }else{
              $("#error_content").show();
            }
          })
    })

    function togg(obj){
      var togg = "#"+obj+"-togg";
      $(togg).show();
    }

    function togghide(obj){
      var togg = "#"+obj+"-togg";
      $(togg).hide();
    }

    function reply_show(obj,type){
      if(type=="show"){
         var togg = "#nu-"+obj;
        $(togg).show();
      }else{
        var togg = "#nu-"+obj;
        $(togg).hide();
      }
    }

    function content_submit(obj){
        var id      = obj.name.split("-");
        var cid     = id[0];
        var reply   = "#content_reply-"+cid;
        var content = "#content_reply-"+cid;
        var content = $(content).val();
        var content = content.replace(/[ ]/g,"");
        var uid     = id[1];
        var url     = "<?php echo U('Exercise/reply_save');?>";
        var save    = "#"+cid+"_reply";
        if(content!=""){
          reply_show(cid,'hide');
          togghide(cid)
          $.post(url,{content:content,cid:cid,uid:uid},function(data){
            if(data.status){
              $(reply).val("");
              $(save).before("<div style='margin-left:7px;' class='nod_inner clearfix' ><div>"+data.name+"</div><div class='wb_cmR comm_main'><div class='content_txt'>"+data.content+"</div><div class='content_txt'>"+data.create_time+"</div></div>").fadeIn();
            }
          },'json')
        }else{
           reply_show(cid,'show');
        }
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