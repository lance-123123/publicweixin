<?php
namespace Admin\Model;
use Think\Model;

class UserModel extends Model{
    public function modify_user_detail($data){

      	$id['id']=$data['id'];
      	$arr['nicname']=$data['nicname'];
        $arr['hometown']=$data['hometown'];
        $arr['nowhome']=$data['nowhome'];
        $arr['intreastthing']=$data['intreastthing'];
        $arr['lovemotto']=$data['lovemotto'];
        $arr['selfintroduction']=$data['selfintroduction'];
        $model=M('user_datail');
        $object = $model->data($arr)->where($id)->save();
        if ($object) {
        	return true;
        }else{
        	return false;
        }
    }


}
?>