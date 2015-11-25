/*-------form提交表单------*/
    $('#form').submit(function(){
        var nickname = $('#name').val();
        var home = $('#home').val();
        var nowlive = $('#nowlive').val();
        var intrest = $('#intrest').val();
        var motto = $('#motto').val();
        var introduction = $('#introduction').val();
        console.log(introduction);

        if(nickname == ''){
            art.dialog.alert('昵称不能为空！');
        }else if(home == ''){
            art.dialog.alert('家乡不能为空！');
        }else if (nowlive =='') {
            art.dialog.alert('现居地不能为空！');
        }else if (intrest == '') {
            art.dialog.alert('个人兴趣不能为空！');
        }else if (motto == '') {
            art.dialog.alert('个人座右铭不能为空！');
        }else if (introduction == '') {
            art.dialog.alert('个人简介不能为空！');
        }   
        else{
            $.ajax({
                type:'POST',
                url:$('#form').attr('action'),
                data:{
                    'nicname':$('#name').val(),
                    'hometown':$('#home').val(),
                    'nowhome':$('#nowlive').val(),
                    'intreastthing':$('#intrest').val(),
                    'lovemotto':$('#motto').val(),
                    'introduction':$('#introduction').val()
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


/*当点击编辑时显示*/
$("#eduit").click(function(){
    $(".form-control").show();
    $(".btn").show();
    $(".user_detail").hide();
});