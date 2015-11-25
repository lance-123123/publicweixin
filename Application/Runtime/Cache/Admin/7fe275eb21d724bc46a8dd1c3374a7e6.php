<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>修改密码</title>
	<!-- Bootstrap core CSS -->
    <link href="/Lanceblogv.1/Public/Admin/css/bootstrap.css" rel="stylesheet">
    <!-- Add custom CSS here -->
    <link href="/Lanceblogv.1/Public/Admin/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="/Lanceblogv.1/Public/Admin/static/font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="/Lanceblogv.1/Public/Admin/css/morris-0.4.3.min.css">
    <link rel="stylesheet" type="text/css" href="/Lanceblogv.1/Public/Admin/css/user/modify_password.css">
    <script type="text/javascript" src="/Lanceblogv.1/Public/Admin/static/artDialog/artDialog.js?skin=default"></script>
    <script src="/Lanceblogv.1/Public/Admin/static/artDialog/plugins/iframeTools.js"></script>
    <script type="text/javascript" src="/Lanceblogv.1/Public/Admin/js/jquery.js"></script>
    <script src="/Lanceblogv.1/Public/Admin/js/bootstrap.js"></script>
</head>
<body>
 
 <div id="form_set">
 <form action="#" method="post">
  
 <input type="text" name="url" id="url" url="/Lanceblogv.1/index.php/Admin/User/submit_modify" style="display:none"> 
 <input type="text" name="id" value="<?php echo ($data["id"]); ?>" id="user_id" style="display:none">
 <!-- 提交表单内容 -->
 <div class="form-group">
	<label>用户名</label>
	<input class="form-control" name="username" id="user" value="<?php echo ($data["username"]); ?>" disabled>
 </div>

 <div class="form-group">
	<label>新密码</label>
	<input class="form-control" type="password" name="newpassword" id="newpassword" placeholder="Enter newpassword">
 </div>

 <div class="form-group">
	<label>确认密码</label>
	<input class="form-control" type="password" id="checkpassword" name="check_password" placeholder="Enter Confirm password">
 </div>

 <div class="form-group">
 	<button type="submit" class="btn btn-success" id="submit">确 定</button>
 </div>
 </form>
 </div>

 <script type="text/javascript">
   $("#submit").on('click',function(){
       var newpassword = $('#newpassword').val();
        var checkpassword = $('#checkpassword').val();

        if(newpassword == ''){
            art.dialog.alert('新密码不能为空！');
        }else if(checkpassword == ''){
            art.dialog.alert('确认密码不能为空！');
        }else{
            $.ajax({
                type:'POST',
                url:$('#url').attr('url'),
                data:{
                    'id':$('#user_id').val(),
                    'newpassword':$('#newpassword').val(),
                    'check_password':$('#checkpassword').val()
                },

                success:function(data){
                    if (data==0) {
                        art.dialog.alert('密码修改成功!',function(){
                            art.dialog.close();
                        });
                        
                    }else if (data==1){

                        art.dialog.alert("修改失败！");

                    }else if (data==2){

                        art.dialog.alert("新密码和确认密码不一致");
                    }
                }
            });
        }
        return false;
   });
 </script> 
</body>
</html>