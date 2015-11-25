/*提交输入的用户名和密码*/
$('#submit').submit(function(){
        var username = $('#username').val();
        var password = $('#password').val();

        if(username == ''){
            
            art.dialog.alert('昵称不能为空！');

        }else if(password == ''){
            art.dialog.alert('家乡不能为空！');
        }else{
            $.ajax({
                type:'POST',
                url:$('#form').attr('action'),
                data:{
                    'username':$('#username').val(),
                    'password':$('#password').val()
                },
                success:function(data){
                    art.dialog.alert('个人信息修改成功！');
                  /* window.location.href = "__URL__/personal";*/
                  window.location.reload(true);
                }
            });
        }
        return false;
    });