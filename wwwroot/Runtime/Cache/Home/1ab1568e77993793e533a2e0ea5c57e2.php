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
                        <label class="col-md-4 control-label"  for="telephone">家庭地址</label>
                        <div class="col-md-8">
                            <input type="text" value="<?php echo ($result["homeadd"]); ?>" onclick="show_address();"  name="homeadd"  class="form-control" placeholder="请输入家庭地址">
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

        <!-- 地址选择器 -->
        <div class="modal fade" id="Address" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">地址选择</h4>
              </div>
              <div class="modal-body">
                    <div style="width:100%;">
                        <?php if(is_array($province)): $i = 0; $__LIST__ = $province;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="javascript:;" id="<?php echo ($vo["id"]); ?>" onclick="show_citys(this);$(this).css('color','red').siblings().css('color','');"><?php echo ($vo["name"]); ?></a>&nbsp&nbsp&nbsp&nbsp&nbsp<?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <div style="width:100%;margin-top:5px;" class="show_div">
                        <hr>
                        <?php  foreach ($cityinfo as $k => $v) { echo "<div  id=city-".$k.">"; foreach ($cityinfo[$k] as $key => $value) { echo "<a href=javascript:; onclick=$(this).css('color','red').siblings().css('color','')>$value[name]</a>&nbsp&nbsp&nbsp&nbsp&nbsp"; } echo "</div>"; } ?>
                    </div>
                    <div style="width:100%;margin-top:5px;">
                        <hr>
                        
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
		"ROOT"   : "/qujianshenla/wwwroot", //当前网站地址
		"APP"    : "/qujianshenla/wwwroot/index.php?s=", //当前项目地址
		"PUBLIC" : "/qujianshenla/wwwroot/Public", //项目公共目录地址
		"DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
		"MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
		"VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
	}
})();
</script>

<link href="/qujianshenla/wwwroot/Public/static/datetimepicker/css/datetimepicker.css" rel="stylesheet" type="text/css">
<?php if(C('COLOR_STYLE')=='blue_color') echo '<link href="/qujianshenla/wwwroot/Public/static/datetimepicker/css/datetimepicker_blue.css" rel="stylesheet" type="text/css">'; ?>
<link href="/qujianshenla/wwwroot/Public/static/datetimepicker/css/dropdown.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/qujianshenla/wwwroot/Public/static/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="/qujianshenla/wwwroot/Public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>

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

    function show_address(){
        $(".show_div div:gt(0)").hide();
        $('#Address').modal();
    }

    function show_citys(obj){
        $("#city-"+obj.id).show()
                          .siblings('div').hide();
        
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