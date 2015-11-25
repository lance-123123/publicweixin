<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>LANCE BLOG</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="shortcut icon" type="image/x-icon" href="/Lanceblogv.1/Public/Home/image/ad.ico" />
<link href="/Lanceblogv.1/Public/Home/css/style.css" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" type="text/css" href="/Lanceblogv.1/Public/Home/css/home.css">
  <link rel="stylesheet" type="text/css" href="/Lanceblogv.1/Public/Home/static/time/css/default.css" />
  <link rel="stylesheet" type="text/css" href="/Lanceblogv.1/Public/Home/static/time/css/component.css" />

<script type="text/javascript" src="/Lanceblogv.1/Public/Home/js/cufon-yui.js"></script>
<script type="text/javascript" src="/Lanceblogv.1/Public/Home/js/arial.js"></script>
<script type="text/javascript" src="/Lanceblogv.1/Public/Home/js/cuf_run.js"></script>
<script type="text/javascript" src="/Lanceblogv.1/Public/Home/static/artDialog/artDialog.js?skin=default"></script>
<script src="/Lanceblogv.1/Public/Home/static/artDialog/plugins/iframeTools.js"></script>
<script type="text/javascript" src="/Lanceblogv.1/Public/Home/js/jquery.js"></script>
<script type="text/javascript" src="/Lanceblogv.1/Public/Home/js/jquery-1.11.3.min.js"></script>
<script src="/Lanceblogv.1/Public/Home/static/layer-v1.9.3/layer/layer.js"></script>

  <script type="text/javascript" src="/Lanceblogv.1/Public/Home/js/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="/Lanceblogv.1/Public/Home/js/jquery.js"></script>
  <script type="text/javascript" src="/Lanceblogv.1/Public/Home/static/time/js/modernizr.custom.js"></script>
  <script type="text/javascript">
 /*是用ajax传递浏览量参数*/ 
/* $(function(){
    $('.click_cout').on('click',function(){
       $.ajax({
           url:$(".url").attr('url'),
           type:'post',
           data:{
               'id':$('.click_cout').attr('val')
              }
            });
          });
      });*/
     
      /**导航高亮**/
      $(function() {
          $("ul li").eq(0).removeClass('active');
          $("ul li").eq(1).addClass('active');
         });
  </script>

<!-- CuFon ends -->
</head>
<body>
   
    <!-- main body -->
    <div class="main">
  
     <!-- header -->
    <div class="header">
     <div class="header_resize">
       <div class="logo">
        	<h1><a href="index.html">Lance <span> Blog</span></a><small>Great minds have purpose, others have wishes.</small></h1>
       </div>
        <div class="clr"></div>
      <div class="menu_nav">
	        <ul>
	          <li class="active"><a href="<?php echo U('Index/index');?>">首页</a></li>
	          <li><a href="<?php echo U('Index/blog_list');?>">文章</a></li>
	          <li><a href="#">关于</a></li>
	          <li><a href="#">简历</a></li>
	        </ul>
	       
	       <!-- 搜索栏 -->
	       <div class="search">
		        <form id="form" name="form" method="post" action="#">
		          <span>
		          <input name="q" type="text" class="keywords" id="textfield" maxlength="50" value="" style="" />
		          <input name="b" type="image" src="/Lanceblogv.1/Public/Home/image/search.gif" class="button" />
		          </span>
		        </form>
	       </div>
	      		<!--/search -->
	    </div>
	      <div class="clr"></div>
	   </div>
	 </div>
	 
       <!-- 内容 -->
       
    <div class="content">
    <div class="content_resize">
      <!-- 循环出全部文章 -->
      <div class="mainbar">
        <ul class="cbp_tmtimeline">
          <?php if(!empty($list)): if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
            <time class="cbp_tmtime" datetime="<?php echo (date("Y-m-d H:i:s",$vo["public_date"])); ?>"><span style="color:#6CBFEE;font-size:18px;float:left">
            <?php echo (date("Y-m-d H:i:s",$vo["public_date"])); ?></span> <span> </span></time>
            <div class="cbp_tmicon cbp_tmicon-screen"></div>
            <div class="cbp_tmlabel">
              <p style="font-size:20px;"><a href="/Lanceblogv.1/index.php/Home/Index/look_artical/id/<?php echo ($vo["id"]); ?>" class="click_cout" val="<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a></p>
              <p><?php echo (htmlspecialchars_decode($vo["blog_newsletter"])); ?> <a href="/Lanceblogv.1/index.php/Home/Index/look_artical/id/<?php echo ($vo["id"]); ?>">Read more</a></p>
              <p>发布者【<?php echo ($vo["nicname"]); ?>】  阅读【 <?php echo ($vo["browsenumber"]); ?> 】 <a href="#"> 好评【<?php echo ($vo["praise"]); ?>】</a></p>
            </div>
          </li><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php else: ?><p>暂还没有文章信息！</p><?php endif; ?>
        </ul>
      </div>
      </div>
      <!-- <input type="text" class="url" url="/Lanceblogv.1/index.php/Home/Index/addblogcout" style="display:none"> --> 
      <div class="article" style="padding:5px 20px 2px 20px; background:none; border:0;">
           <div class="pageset">
               <?php echo ($page); ?>
           </div>
        </div>
      <div class="clr"></div>
    </div>
  </div>

       <!-- 尾部 -->
       
	    <div class="fbg">
	    <div class="fbg_resize">
	      <div class="col c1">
	        <h2><span>博客相册</span></h2>
	        <a href="#"><img src="/Lanceblogv.1/Public/Home/image/gallery_1.jpg" width="58" height="58" alt="pix" /></a> 
	        <a href="#"><img src="/Lanceblogv.1/Public/Home/image/gallery_2.jpg" width="58" height="58" alt="pix" /></a> 
	        <a href="#"><img src="/Lanceblogv.1/Public/Home/image/gallery_3.jpg" width="58" height="58" alt="pix" /></a> 
	        <a href="#"><img src="/Lanceblogv.1/Public/Home/image/gallery_4.jpg" width="58" height="58" alt="pix" /></a> 
	        <a href="#"><img src="/Lanceblogv.1/Public/Home/image/gallery_5.jpg" width="58" height="58" alt="pix" /></a> 
	        <a href="#"><img src="/Lanceblogv.1/Public/Home/image/gallery_6.jpg" width="58" height="58" alt="pix" /></a> 
	      </div>
	      <div class="col c2">
	        <h2><span>Blog Link</span></h2>
	        <p>这里写几个博客链接<br />
	          <a href="#">赵亚飞的博客</a><br/>
	          <a href="#">张琦守的博客</a><br/>
	          <a href="#">黄天的博客</a></p>
	      </div>
	      <div class="col c3">
	        <h2><span>Contact</span></h2>
	        <p>这里写我的具体的联系方式 <a href="#">
	        mail@example.com</a><br/>
	          <a href="#">+1 (123) 444-5677</a></p>
	      </div>
	      <div class="clr"></div>
    </div>
    <div class="footer">
      <p class="lr">(c) Copyright <a href="#">Lance Blog</a>.</p>
      <div class="clr"></div>
    </div>
  </div>
   
     </div>
    
</body>