<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>LANCE BLOG</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="shortcut icon" type="image/x-icon" href="/Lanceblogv.1/Public/Home/image/ad.ico" />
<link href="/Lanceblogv.1/Public/Home/css/style.css" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" type="text/css" href="/Lanceblogv.1/Public/Home/css/home.css">
  <link rel="stylesheet" type="text/css" href="/Lanceblogv.1/Public/Home/js/bin/css/default.css">
  <link href="/Lanceblogv.1/Public/Home/js/bin/css/jquery.smartmarquee.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/Lanceblogv.1/Public/Home/css/topset.css">

<script type="text/javascript" src="/Lanceblogv.1/Public/Home/js/cufon-yui.js"></script>
<script type="text/javascript" src="/Lanceblogv.1/Public/Home/js/arial.js"></script>
<script type="text/javascript" src="/Lanceblogv.1/Public/Home/js/cuf_run.js"></script>
<script type="text/javascript" src="/Lanceblogv.1/Public/Home/static/artDialog/artDialog.js?skin=default"></script>
<script src="/Lanceblogv.1/Public/Home/static/artDialog/plugins/iframeTools.js"></script>
<script type="text/javascript" src="/Lanceblogv.1/Public/Home/js/jquery.js"></script>
<script type="text/javascript" src="/Lanceblogv.1/Public/Home/js/jquery-1.11.3.min.js"></script>
<script src="/Lanceblogv.1/Public/Home/static/layer-v1.9.3/layer/layer.js"></script>

<script>window.jQuery || document.write('<script src="/Lanceblogv.1/Public/Home/js/bin/js/jquery-2.1.1.min.js"><\/script>')</script>
  <script src="/Lanceblogv.1/Public/Home/js/bin/js/jquery.smartmarquee.js"></script>
  <script type="text/javascript">
       $(document).ready(function () {
          $(".example").smartmarquee({
            // animate duration
            duration: 3000,   
            // auto loop
            loop : true,      
            // interval duration
            interval : 1000, 
            // 'vertical' or 'horizontal'
            axis : "vertical", 
          });
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
      <div class="mainbar">
         <!-- 内容 -->
         <div class="article">

           <!-- 博客滑动展示 -->
             <div class="smartmarquee example">
                <ul class="container">
                 <?php if(!empty($list)): if(is_array($list)): foreach($list as $key=>$vo): ?><li>
                     <a href="/Lanceblogv.1/index.php/Home/Index/look_artical/id/<?php echo ($vo["id"]); ?>" class="title"><?php echo ($vo["title"]); ?></a><br>
                     <a href="/Lanceblogv.1/index.php/Home/Index/look_artical/id/<?php echo ($vo["id"]); ?>"><?php echo (htmlspecialchars_decode($vo["blog_newsletter"])); ?> . . . . .</a>
                     <p>发布时间【<?php echo (date("Y-m-d H:i:s",$vo["public_date"])); ?>】 作者【<a href="#"><?php echo ($vo["nicname"]); ?></a>】  阅读【<?php echo ($vo["browsenumber"]); ?>】 点赞【<?php echo ($vo["praise"]); ?>】 分类【<a href="#"><?php echo ($vo["category"]); ?></a>】</p>
                    </li><?php endforeach; endif; ?>
                   <?php else: ?> 
                   <p style="text-align: center;">暂没有要显示的文章信息</p><?php endif; ?>
             
                </ul>
             </div>
             
               <!--罗列文章内容-->  
                <?php if(is_array($data)): foreach($data as $key=>$data): ?><div class="article">
                      <p style="font-size:18px"><a href="/Lanceblogv.1/index.php/Home/Index/look_artical/id/<?php echo ($data["id"]); ?>"><?php echo ($data["title"]); ?></a></p>
                      <div class="clr"></div>
                      <p>发布人【<a href="#"><?php echo ($data["nicname"]); ?></a>】阅读【<?php echo ($data["browsenumber"]); ?>】 分类【<a href="#"><?php echo ($data["category"]); ?></a>】 点赞【<?php echo ($data["praise"]); ?>】</p>
                      <img src="/Lanceblogv.1/Uploads//<?php echo ($data["blog_photo"]); ?>" width="613" height="193" alt="image" />
                      <div class="clr"></div>
                      <p><?php echo (htmlspecialchars_decode($data["blog_newsletter"])); ?> . . . .</p>
                   </div><?php endforeach; endif; ?>
                
                <!-- 分页设置 -->
              <div style="background-color:#E4E4E4">
                  <!-- <?php echo ($page); ?> -->
                </div>
         </div>
        </div>
      <!-- 右侧专栏 -->

      <div class="sidebar">
        <div class="gadget">
          <h2>Sidebar Menu</h2>
          <div class="clr"></div>
          <ul class="sb_menu">
            <li><a href="#">首页</a></li>
            <li><a href="#">文章</a></li>
            <li><a href="#">关于</a></li>
            <li><a href="#">简历</a></li>
          </ul>
        </div>
        <!-- 获取博客类别及关于类别的介绍 -->
        <div class="gadget">
          <h2><span>Blog Category</span></h2>
          <div class="clr"></div>
          <ul class="ex_menu">
             <?php if(!empty($blog_class)): if(is_array($blog_class)): $i = 0; $__LIST__ = $blog_class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="#" title="Website Templates"><?php echo ($vo["category"]); ?></a><br />
                   <?php echo ($vo["introduction"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
              <?php else: ?> 
                   <p style="text-align: center;">暂没有信息</p><?php endif; ?>
          </ul>
        </div>
        <div class="gadget">
          <h2>Blog Message</h2>
          <div class="clr"></div>
          <p>   <img src="/Lanceblogv.1/Public/Home/image/test_1.gif" alt="image" width="20" height="18" /> <em>呵呵，来看看你，最近好吗？ </em>.<img src="/Lanceblogv.1/Public/Home/image/test_2.gif" alt="image" width="20" height="18" /></p>
          <p style="float:right;"><strong>穆开乐</strong></p>
          </div>
      </div>
      <div class="clr"></div>
    </div>
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