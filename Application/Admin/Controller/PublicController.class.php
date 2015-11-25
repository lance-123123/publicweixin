<?php
namespace Admin\Controller;
use Think\Controller;
/**
  *@author chengpenghui
  *public 界面设置
  *@date 2015/8/23
  *
  **/
class PublicController extends Controller{
     public function login(){
     	$this->display();
     }

     /*用户登录后台*/
     public function check_login(){
          $user_model=M('user');
          $username = trim(I('post.username'));
          $password=  trim(I('post.password'));
          $where["username"] = $username;
          $where["password"] = md5($password);
          
          $data = $user_model->where($where)->find();
          if ($data) {
          	session("id",$data["id"]);
          	$this->ajaxReturn(0);//登录成功情况下！
          }else{
          	$this->ajaxReturn(1);//登录失败情况下！
          }
     } 
     /**
       *用户退出
       **/
     public function logout(){
        session('id',null);
        session('username',null);
        $this->redirect('Public/login');
     }


}



?>