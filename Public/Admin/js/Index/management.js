/*公开博客*/
$(function(){
	$(".public_artical").click(function(){
		 $.ajax({
			type:'POST',
			url:$("#public").attr('url'),
			data:{
				'id':$(this).attr('value')
			},
			success : function(data) {
       	  	if (data == 1) {
       	  		layer.msg('文章私有成功！', function(){
				    document.location.reload();
				});

       	  	}else if (data==0) 
       	  	{
       	  		layer.msg('文章私有失败！', {icon: 5});
       	  	}
       	  	else if (data == 2) {
       	  		layer.msg('文章不能全部私有！', {icon: 5});
       	  	}
       	  }

		});
	});
});

/*私有博客*/
$(function(){
	$(".private_artical").click(function(){
		 $.ajax({
			type:'POST',
			url:$("#private").attr('url'),
			data:{
				'id':$(this).attr('value')
			},
			success : function(data) {
       	  	if (data == 1) {
       	  		layer.msg('文章公开成功！', function(){
				    document.location.reload();
				});
       	  	}else if (data==0) 
       	  	{
       	  		layer.msg('文章公开失败！', {icon: 5});
       	  	}
       	   }

		});
	});
});

/*删除博客*/
$(function(){
	$(".delete_artical").click(function(){
		 $.ajax({
			type:'POST',
			url:$("#delete").attr('url'),
			data:{
				'id':$(this).attr('value')
			},
			success : function(data) {
       	  	if (data == 1) {
       	  		layer.msg('删除文章成功！', function(){
				    document.location.reload();
				});
       	  	}else if (data==0) 
       	  	{
       	  		layer.msg('删除文章失败！', {icon: 5});
       	  	}
       	   }

		});
	});
});



