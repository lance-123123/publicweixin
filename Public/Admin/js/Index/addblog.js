  /*点击添加标签事件*/
  $(function(){
    $("#imgset").click(function(){
   
   var str=prompt("添加标签","");
    if(str){
       $.ajax({
          url:$("#tages").attr('url'),
          type:'post',
          data:{'category':str},
          success : function(data) {
            if (data == 1) {
              art.dialog.tips('添加失败！');
            }else if (data==0) 
            {
              art.dialog.tips('添加成功！');
                document.location.reload();
            }
          }
          
       });
    }
  });
  });
  


/*使用ajax添加添加博客*/
/*$(function(){
   $('#form').submit(function(){
        var blog_title = $('#title').val();
        var content = $('#blog_content').val();
        var category = $('.choice').val();
        var photo = $('.blog_photo').val;
        var motto = $('motto').val();
        var introduction = $('introduction').val();

        if(blog_title == ''){
            layer.msg('标题名不能为空！', {icon: 5});
        }*/
        /*else{
            $.ajax({
                type:'POST',
                url:$('#form').attr('action'),
                data:{
                    'nicname':$('#name').val(),
                    'hometown':$('#home').val(),
                    'nowhome':$('#nowlive').val(),
                    'intreastthing':$('#intrest').val(),
                    'lovemotto':$('#motto').val(),
                    'selfintroduction':$('#introduction').val()
                },
                error: function(request) {
                    art.dialog.tips('个人信息修改成功！');
                    window.location.reload(true);
                },
                success:function(data){
                    art.dialog.alert('个人信息修改成功！');
                   window.location.href = "__URL__/personal";
                 window.location.reload(true);
                }
            });
        }*/
/*        return false;
    });
});  
  */

  