<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>LANCE BLOG</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="shortcut icon" type="image/x-icon" href="/Lanceblogv.1/Public/Home/image/ad.ico" />
<link href="/Lanceblogv.1/Public/Home/css/style.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" type="text/css" href="/Lanceblogv.1/Public/Home/css/home.css">

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
   <script type="text/javascript" src="/Lanceblogv.1/Public/Home/js/look_artical.js"></script>
   <script type="text/javascript">
    $(function(){

      /*点击上一篇浏览量增加*/
      $('.look_cout_last').on('click',function(){
        $.ajax({
            url:$("#url").attr('url'),
            type:'post',
            data:{
               'id':$('.look_cout_last').attr('val')
               }
            });
          });
      });

    /*点击下一篇浏览量增加*/ 
    $(function(){
       $('.look_cout_after').on('click',function(){
        $.ajax({
            url:$("#url").attr('url'),
            type:'post',
            data:{
               'id':$('.look_cout_after').attr('val')
               }
            });
          });
      });
    /**博客导航高亮**/
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
      <div class="mainbar">
         <!-- 文章内容 -->
         <div class="article">
         <label style="font-size: 20px;"><?php echo ($list["title"]); ?></label>

         <p><?php echo (htmlspecialchars_decode($list["blog_content"])); ?></p>
          <!-- 点个赞 -->
           <p id="good_set">
           <span><a href="#" id="click" val="<?php echo ($list["id"]); ?>"><img src="/Lanceblogv.1/Public/Home/image/new2.png"  id="image_set" alt="赞一下"></a></span>
           <span id="sum_count"><a href="#" style="text-decoration: none;"><?php echo ($list["praise"]); ?></a></span> 
           </p><br/> 
          
          <p style="margin-top:50px">分类 : <a href="#"><?php echo ($list["category"]); ?></a></p>
           
           <!-- 上一篇 -->
             <?php if($arr["last_id"] == null ): ?><p> </p>
                 <?php else: ?> <p>上一篇：<a href="/Lanceblogv.1/index.php/Home/Index/look_artical/id/<?php echo ($arr["last_id"]); ?>" class="look_cout_last" val="<?php echo ($arr["last_id"]); ?>"><?php echo ($arr["last_title"]); ?> </a></p><?php endif; ?>
    
              <!-- 下一篇 -->
              <?php if($arr["after_id"] == null ): ?><p></p>
                 <?php else: ?> <p>下一篇:  <a href="/Lanceblogv.1/index.php/Home/Index/look_artical/id/<?php echo ($arr["after_id"]); ?>" class="look_cout_after"><?php echo ($arr["after_title"]); ?></a></p><?php endif; ?>
             <!-- 关于文章的信息 -->
             <p>Posted  <?php echo (date("Y-m-d H:i:s",$list["public_date"])); ?> by  <?php echo ($list["nicname"]); ?>  阅读 【 <?php echo ($list["browsenumber"]); ?> 】 <a href="#"> 网评 【<?php echo ($blog_count); ?>】</a></p>
              <p class="jiathis_style_32x32" style="  margin-bottom: 30px;">
                <a href="#" style="margin-right:90%">转载到：</a></span><a class="jiathis_button_qzone"></a>
                <a class="jiathis_button_tsina"></a>
                <a class="jiathis_button_tqq"></a>
                <a class="jiathis_button_weixin"></a>
                <a class="jiathis_button_renren"></a>
                <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
                 <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
              </p>
      
           <input type="text" id="url" url="/Lanceblogv.1/index.php/Home/Index/addblogcout" style="display:none" />
           <input type="text" id="post_message" url="/Lanceblogv.1/index.php/Home/Index/commit" style="display:none">
           <input type="text" id="post_click" url="/Lanceblogv.1/index.php/Home/Index/click_praise" style="display:none">
           <!-- 输出留言板的内容 -->
            <div id="commit" ><span>博客评论</span></div>
            <div id="message_set1" style="margin-top:10px">
               <?php if(!empty($message_content)): if(is_array($message_content)): foreach($message_content as $key=>$vo): ?><div id="messageset">
                    <p class="name_set"><?php echo ($vo["name"]); ?></p>
                    <p class="message_font"><?php echo ($vo["message"]); ?></p>
                    <p><?php echo (date("Y-m-d H:i:s",$vo["message_time"])); ?> <!-- <a class="delete_commit" href="/Lanceblogv.1/index.php/Home/Index/delete_commit/id/<?php echo ($vo["id"]); ?>">删除</a> --></p>
                    <!-- 博客回复功能 -->
                    <div class ="replay">
                      <form action="#" method="post" class="replay_post">
                          <label>你还可以输入140个字</label> 
                        <div class="replay_content">
                           <textarea id="" rows="5%" cols="60%"  style="resize : none;"></textarea>
                         </div>
                         <button type="submit" class="replay_submit" style=" margin-left: 77%;">回 复</button>
                       </form>
                    </div>
                    
                  </div><?php endforeach; endif; ?>
                 <?php else: ?>
                <p style="text-align: center;margin-top:15px;margin-bottom: 15px;">暂没有评论！<img src="/Lanceblogv.1/Public/Home/image/have.png" style="background-color: #E4E4E4;text-align: center;border:0 solid #E4E4E4;  margin-bottom: 15px;"></p><?php endif; ?>
            </div>
           
           <!-- 发表评论 -->
           <div id="commit_set" style=""><span>发表评论</span></div>

           <div id="leavemessage">
            <span style="font-weight: bold;font-size: 17px;">发表评论:</span>
            <!-- 传送留言内容 -->
             <form action="#" method="post" id="send">
                <input type="text" value="<?php echo ($list["id"]); ?>" name="blog_id" id="blog_id" style="display:none" />
                <ol><li>
                  <label for="name">Name (required)</label>
                  <input type="text" id="name" name="name" class="text" />
                </li><li>
                  <label for="message">Your Message</label>
                  <textarea id="message" name="message" rows="8" cols="50" style="resize : none;" ></textarea>
                </li><li>
                  <button type="submit" id="submit">提 交</button>
                  <div class="clr"></div>
                </li></ol>
            </form>
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
            <li><a href="#">专栏</a></li>
            <li><a href="#">关于</a></li>
          </ul>
        </div>
        <div class="gadget">
          <h2><span>Sponsors</span></h2>
          <div class="clr"></div>
          <ul class="ex_menu">
            <?php if(!empty($blog_class)): if(is_array($blog_class)): $i = 0; $__LIST__ = $blog_class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="#" title="Website Templates"><?php echo ($vo["category"]); ?></a><br />
                   <?php echo ($vo["introduction"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
              <?php else: ?> 
                   <p style="text-align: center;">暂没有信息</p><?php endif; ?>
          </ul>
        </div>
        <div class="gadget">
          <h2>Wise Words</h2>
          <div class="clr"></div>
          <p>   <img src="/Lanceblogv.1/Public/Home/image/test_1.gif" alt="image" width="20" height="18" /> <em>呵呵，来看看你，最近好吗？ </em>.<img src="/Lanceblogv.1/Public/Home/image/test_2.gif" alt="image" width="20" height="18" /></p>
          <p style="float:right;"><strong>穆开乐</strong></p>
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