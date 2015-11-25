<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>Lance博客后台</title>
    <link href="/Lanceblogv.1/Public/Admin/css/bootstrap.css" rel="stylesheet">
    <!-- Add custom CSS here -->
    <link href="/Lanceblogv.1/Public/Admin/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="/Lanceblogv.1/Public/Admin/static/font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="/Lanceblogv.1/Public/Admin/css/morris-0.4.3.min.css">
    <link rel="stylesheet" type="text/css" href="/Lanceblogv.1/Public/Admin/css/Public/login.css">
    <script type="text/javascript" src="/Lanceblogv.1/Public/Admin/static/artDialog/artDialog.js?skin=default"></script>
    <script src="/Lanceblogv.1/Public/Admin/static/artDialog/plugins/iframeTools.js"></script>
    <script type="text/javascript" src="/Lanceblogv.1/Public/Admin/js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="/Lanceblogv.1/Public/Admin/js/Public/login.js"></script>
    <script type="text/javascript" src="/Lanceblogv.1/Public/Admin/js/jquery.js"></script>
    <script src="/Lanceblogv.1/Public/Admin/static/layer-v1.9.3/layer/layer.js"></script>
    <script src="/Lanceblogv.1/Public/Admin/js/bootstrap.js"></script> 
</head>
<body style="background-color:#343434;background:url(/Lanceblogv.1/Public/Admin/image/fabric.png)">
      <h1>Lance Blog </h1>
  <div id="content">
  	  
      <form action="#" method="post" id="form">
  	     <!-- 用户名 -->
  	     <div id="message">
          <input type="text" id="url" url="/Lanceblogv.1/index.php/Admin/Public/check_login" style="display:none"> 
         </div>
  	     <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control" name="usernamr" id="username" placeholder="Enter Username">
          </div>
          <!-- 密码 -->
           <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input type="password" class="form-control" id="password" placeholder="Enter password">
          </div>
              
          <div class="form-group input-group">
          	<button type="submit" class="btn btn-success" id="submit">确 定</button>
          </div>
      </form>
  </div>

  <script type="text/javascript">
  /*提交所输入的信息*/
  $('#submit').on('click',function(){
        var username = $('#username').val();
        var password = $('#password').val();
        if(username == ''){
            layer.msg('用户名不能为空！', {icon: 5});
        }else if(password == ''){
            layer.msg('密码不能为空！', {icon: 5});
        }else{
            $.ajax({
                type:'POST',
                url:$('#url').attr('url'),
                data:{
                    'username':$('#username').val(),
                    'password':$('#password').val()
                },
                success:function(data){
                  if (data==0) {
                    layer.msg('登录成功！', function(){
                     });
                     window.location.href = "<?php echo U('Index/index');?>";
                  }else if(data==1) {
                    layer.msg('用户名或密码错误！', function(){
                     });
                    window.location.reload(true);
                  }
                  
                }
            });
        }
        return false;
  });

 
  </script>
</body>
</html>