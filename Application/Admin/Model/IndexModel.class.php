<?php
namespace Admin\Model;
use Think\Model;
/**
  *@author chengpenghui
  *
  *@date 
  *
  **/
class IndexModel extends Model{
    public function submit_blog($data){

      	$id['id']=$data['id'];
      	$arr['title']=$data['title'];
        $arr['blog_content']=$data['blog_content'];
        $arr['category_id']=$data['category_id'];
        $arr['update_time']=time();
        $model=M('blog');
        $object = $model->data($arr)->where($id)->save();
        if ($object) {
        	return true;
        }else{
        	return false;
        }
    }
}


?>