/*提交所评论的内容*/
$(function(){
	$("#submit").on('click',function(){
        var name = $('#name').val();
        var message = $('#message').val();

        if(name == ''){
            layer.msg('昵称不能为空！', {icon: 5});
        }else if(message == ''){
            layer.msg('留言内容不能为空！', {icon: 5});
        }  
        else{
            $.ajax({
                type:'POST',
                url:$('#post_message').attr('url'),
                data:{
                    'id':$('#blog_id').val(),
                    'name':$('#name').val(),
                    'message':$('#message').val()
                },
                success:function(data){
                    if (data==1) {
                       layer.msg('留言成功！',{time: 1000}, function(){  //关闭后的操作
                            window.location.reload(true);                   
                        });
                         
                    }else if(data==0){
                        layer.msg('留言失败！',{time: 1000}, function(){  //关闭后的操作
                            window.location.reload(true);                   
                        });
                    }
                 
                }
            });
        }
        return false;
	});

   /*对有用的文章点赞*/ 
   $("#click").on('click',function(){
         $.ajax({
                type:'POST',
                url:$('#post_click').attr('url'),
                data:{
                    'id':$('#click').attr('val'),
                },
                success:function(data){
                    if (data==1) {
                       layer.msg('点赞成功！', function(){  //关闭后的操作
                            window.location.reload(true);                   
                        });
                        
                    }else{
                        layer.msg('点赞失败！', function(){  //关闭后的操作
                            window.location.reload(true);                   
                        });
                    }
                 
                }
            });
        });
   
   /*博客回复*/
   $(".huifu").on('click',function(){
         
           $(".replay").show();
   });



});