// 删除博客
$(function(){
    
	$(".delete_blog").click(function(){
		 $.ajax({
			type:'POST',
			url:$("#delete_url").attr('url'),
			data:{
				'id':$(this).attr('value')
			},
			success : function(data) {
       	  	if (data == 0) {
       	  		art.dialog.tips('删除成功！');
       	  		 document.location.reload();
       	  	}else if (data==1) 
       	  	{
       	  		art.dialog.tips('删除失败！');
       	  	}
       	  }

		});
	});
});

