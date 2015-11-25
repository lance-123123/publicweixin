 
 /*提交所修改的用户密码*/
 $("#form").submit(function(){
        var newpassword = $('#newpassword').val();
        var checkpassword = $('#checkpassword').val();

        if(newpassword == ''){
            art.dialog.alert('新密码不能为空！');
        }else if(checkpassword == ''){
            art.dialog.alert('确认密码不能为空！');
        }else{
            $.ajax({
                type:'POST',
                url:$('#form').attr('action'),
                data:{
                    'id':$('#user_id').val(),
                    'newpassword':$('#newpassword').val(),
                    'check_password':$('#checkpassword').val()
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