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
     
	<link rel="stylesheet" type="text/css" href="/Lanceblogv.1/Public/Admin/css/Index/index.css">

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
		    <h1>Lance Blog <small>留言管理</small></h1>
		    <ol class="breadcrumb" >
		      <li class="active"><i class="fa fa-dashboard"></i> 留言管理</li>
		    </ol>
		  </div>
          <!-- 博客列表 -->
        <div class="table-responsive">
        <input type="hidden" url="<?php echo U('Index/delete_commit');?>" id="delete_url">
       <table class="table table-striped">
           <thead>
           <tr>
               <th class="thbgset">UID</th>
               <th class="thbgset">博客</th>
               <th class="thbgset">留言者</th>
               <th class="thbgset">发布日期</th>
               <th class="thbgset">操作</th>
           </tr>
           </thead>
           <tbody>
           <?php if(!empty($list)): if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                       <td><?php echo ($vo["id"]); ?></td>
                       <td><?php echo ($vo["title"]); ?></td>
                       <td><?php echo ($vo["name"]); ?></td>
                       <td><?php echo (date("Y-m-d H:i:s",$vo["message_time"])); ?></td>
                       <td><a href="#" class="delete_blog"  value="<?php echo ($vo["id"]); ?>" >删除</a><a href="#" class="look_detail">查看</a></td>
                   </tr><?php endforeach; endif; else: echo "" ;endif; ?>
               <?php else: ?>
               <td colspan="10" class="text-center"> aOh! 暂时还没有内容! </td><?php endif; ?>
           </tbody>
       </table>
           </div>
    <!-- 分页 -->
    <div class="pageset">
       <?php echo ($page); ?>
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
     
	<script type="text/javascript" src="/Lanceblogv.1/Public/Admin/js/Index/index.js"></script>
    <script type="text/javascript" src="/Lanceblogv.1/Public/Admin/js/Index/message.js"></script>
    <script type="text/javascript">
        $("ul li").eq(0).removeClass('active');
        $("ul li").eq(4).addClass('active');
    </script>


</body>
</html>