<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 

	
    <title>lance blog</title>
     
  
	 <!-- Bootstrap core CSS -->
   <link rel="shortcut icon" type="image/x-icon" href="/Lanceblogv.1/Public/Admin/image/ad.ico" />
    <link href="/Lanceblogv.1/Public/Admin/css/bootstrap.css" rel="stylesheet">
    <!-- Add custom CSS here -->
    <link href="/Lanceblogv.1/Public/Admin/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="/Lanceblogv.1/Public/Admin/static/font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="/Lanceblogv.1/Public/Admin/css/morris-0.4.3.min.css">
     
	<link rel="stylesheet" type="text/css" href="/Lanceblogv.1/Public/Admin/css/Index/writeblog.css">
	<link rel="stylesheet" type="text/css" href="/Lanceblogv.1/Public/Admin/static/upfile/css/jquery.fileupload.css">
	<link rel="stylesheet" type="text/css" href="/Lanceblogv.1/Public/Admin/static/upfile/css/jquery.fileupload-ui.css">

</head>
<body>   
     
     <div id="wrapper">
     	<!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">  lance blog </a>
           <input type="hidden" url="/Lanceblogv.1/index.php/Admin/Index" id="jump" >
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li class="active"><a href="<?php echo U('Index/index');?>"><i class="fa fa-dashboard"></i> 博客列表</a></li>
            <li><a href="<?php echo U('Index/manageblog');?>"><i class="fa fa-table"></i> 管理博客</a></li>
            <li><a href="<?php echo U('Index/writeblog');?>"><i class="fa fa-edit"></i> 添加博客</a></li>
            <li><a href="<?php echo U('User/personal');?>"><i class="fa fa-desktop"></i> 个人中心</a></li>
             <li><a href="<?php echo U('Index/message_management');?>"><i class="fa fa-bar-chart-o"></i> 留言管理</a></li>
             <li><a href="<?php echo U('Index/blog_view');?>"><i class="fa fa-caret-square-o-down"></i>  访客量</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Lance <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#" id="profile"><i class="fa fa-user"></i> 简介</a></li>
                <li><a href="#" id="modify_password"><i class="fa fa-gear"></i> 修改密码</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo U('Public/logout');?>" onclick="return confirmDel('确定要退出平台吗？')"><i class="fa fa-power-off"></i> 退出</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
    </div>
   

   <!-- main -->
   
 <div style="margin-left:18%;">
	 <div class="row" style="width:100%">
		  <!-- 导航列表 -->
		  <div class="col-lg-12" >
		    <h1>Lance Blog <small>写博客</small></h1>
		    <ol class="breadcrumb">
		      <li class="active"><i class="fa fa-dashboard"></i>写博客</li>
		    </ol>
		  </div>

          <!-- 写博客 -->
           <div id="addblog">
           	   <form action="/Lanceblogv.1/index.php/Admin/Index/submitblog" method="post" id="form" >
	           	  <!-- 博客标题 -->
	           	  <div class="form-group">
	                <label>标题</label>
	                <input class="form-control" name="title" placeholder="博客标题最多只能13个字"  maxlength="13" id="title">
	              </div>
                   
                    <!-- 文章封面图片 -->
             <div class="form-group">
              <div class="row fileupload-buttonbar" style="padding-left:15px;">

	               <div class="thumbnail col-sm-6">
	                <img id="weixin_show" style="height:180px;margin-top:10px;margin-bottom:8px;"  src="/Lanceblogv.1/Public/Admin/image/22.png" data-holder-rendered="true">
	                   <div class="progress progress-striped active" role="progressbar" aria-valuemin="10" aria-valuemax="100" aria-valuenow="0"><div id="document_progress" class="progress-bar progress-bar-success" style="width:0%;"></div></div>
	                   <div class="caption">
	                <span id="document_upload" class="btn btn-primary fileinput-button">
	                <span>选择封面图片</span>
	                <input type="file" id="document" name="document" multiple>
	                </span>
	                       <a id="document_cancle" href="javascript:void(0)" class="btn btn-warning" role="button"  style="display:none">删除</a>
	                   </div>
	                   <p> *图片最大上传3M</p>
	               </div>

               </div>

             </div>

                  <!-- 博客内容 -->
	              <div class="form-group">
	                <label>内容</label>
	                <textarea id="editor" name="content">
	                </textarea>
	              </div>
	              <!-- 标签 -->
	              <div class="form-group" class="">
	                <label>标签 </label>
	                  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><label class="radio-inline">
		                      <input type="radio" value="<?php echo ($vo["id"]); ?>" name="category"  class="choice"><?php echo ($vo["category"]); ?>
		                   </label><?php endforeach; endif; else: echo "" ;endif; ?>
	               
                    <a href="#"><img src="/Lanceblogv.1/Public/Admin/image/1.gif" width="25px" height="25px" id="imgset"></a>
                  </div>

                  <input type="hidden" id="photourl">
                 <!-- 提交按钮 -->
                  <button type="submit" class="btn btn-success" id="submitbutton">提 交</button>
           	   </form>
           	   <input type="text" url="/Lanceblogv.1/index.php/Admin/Index/addtage" id="tages" style="display:none">
           </div>
	</div>
 </div>
	

 <!-- JavaScript -->
      <script src="/Lanceblogv.1/Public/Admin/js/jquery-1.10.2.js"></script>
      <script src="/Lanceblogv.1/Public/Admin/js/bootstrap.js"></script>
      <script type="text/javascript" src="/Lanceblogv.1/Public/Admin/static/artDialog/artDialog.js?skin=default"></script>
     <script src="/Lanceblogv.1/Public/Admin/static/artDialog/plugins/iframeTools.js"></script>
     <script src="/Lanceblogv.1/Public/Admin/static/layer-v1.9.3/layer/layer.js"></script>
     
     <script type="text/javascript">
       /*当点击简介时*/
       $("#profile").on('click',function(){
         art.dialog.open('<?php echo U('Index/persion_information');?>',
         {title: '个人简介', width: 800, height: 570});
        });

       /*当点击修改密码时的弹出框*/
       $("#modify_password").on('click',function(){
         art.dialog.open('<?php echo U('User/modify_the_password');?>',
         {title: '修改密码', width: 450, height: 380});
        });


       /*-----退出系统----*/
       function confirmDel(str){
           return confirm(str);
       }

     </script>   
     
    <!--加载文本编辑插件 -->
    <script type="text/javascript" charset="utf-8" src="/Lanceblogv.1/Public/Admin/static/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Lanceblogv.1/Public/Admin/static/ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset"utf-8" src=""></script>
    <!-- 语言编辑器 -->
    <script type="text/javascript" charset="utf-8" src="/Lanceblogv.1/Public/Admin/static/ueditor/lang/zh-cn/zh-cn.js"></script>
    <script type="text/javascript" src="/Lanceblogv.1/Public/Admin/static/upfile/js/vendor/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="/Lanceblogv.1/Public/Admin/static/upfile/js/jquery.fileupload.js"></script>
	<script type="text/javascript" src="/Lanceblogv.1/Public/Admin/static/upfile/js/jquery.iframe-transport.js"></script>
	<script type="text/javascript" src="/Lanceblogv.1/Public/Admin/js/Index/addblog.js"></script>
	
	
	<script type="text/javascript">
	/*加载ue插件*/
	var ue = UE.getEditor('editor');
       /*左侧导航高亮*/
        $(function() {
            $("ul li").eq(0).removeClass('active');
            $("ul li").eq(2).addClass('active');
         });

        /*给文本框添加宽度*/
        $("textarea").css("height","300px");
        
         /*上传封面图片*/
         $(function() {
            $("#document").fileupload({
                url: '/Lanceblogv.1/index.php/Admin/Index/submitphoto',
                sequentialUploads: true
            }).bind('fileuploadprogress', function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $("#document_progress").css('width',progress + '%');
                $("#document_progress").html(progress + '%');
            }).bind('fileuploaddone', function (e,data) {
            	if (escape(data.result).indexOf("%u")<0) {
	            	$("#weixin_show").attr("src","/Lanceblogv.1/Uploads//"+data.result);
	                $("#document_upload").css({display:"none"});
	                $("#document_cancle").css({display:""});
	                $("#photourl").val(data.result);
            	}else{
            		layer.msg(data.result, function(){
					   document.location.reload();
					});
            	}

            });
        });

     /*图片删除事件*/
    $("#document_cancle").click(function(){
    	 $("#weixin_show").attr("src","/Lanceblogv.1/Public/Admin/image/22.png");
         $("#document_progress").css('width','0%');
         $("#photourl").val();
         $("#document_upload").css({display:""});
         $("#document_cancle").css({display:"none"});
        });

    /*判断所提交的内容*/
   $(function(){
    $("#form").submit(function(){
           var title = $("#title").val();
           var photourl = $("#photourl").val();
           var  blog_content = $("textarea").val();
           var choice = $("input[type='radio']:checked").val();
           if (title == '') {
              layer.msg('标题名不能为空！', {icon: 5});
           }else if (photourl == '') {
               layer.msg('博客封面不能为空！', {icon: 5});
           }else if (blog_content == '') {
                layer.msg('博客内容不能为空！', {icon: 5});      
           }else if (choice == '') {
           	    layer.msg('博客的类型至少选中一项！', {icon: 5});  
           }else{
           	 $.ajax({
                type:'POST',
                url:$('#form').attr('action'),
                data:{
                    'title':$("#title").val(),
                    'photourl':$("#photourl").val(),
                    'blog_content':$("textarea").val(),
                    'choice':$("input[type='radio']:checked").val()
                },
                success:function(data){
                     if (data == 1) {
                     	layer.msg('添加文章成功！', function(){
				           window.location.href = $("#jump").attr('url')+'/'+"index";
				         });
                     }	
                }
            });
           }
           return false;
       });
    });
    
    </script>


</body>
</html>