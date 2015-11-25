<?php
namespace Admin\Controller;
use Think\Controller;

/**个人主页
  *@author chengpenghui
  *
  *date 2015/8/19
  **/

class UserController extends Controller{
    
    /*初始化方法*/
   public function _initialize(){
      if(!session('id')){
            $this->redirect('Public/login');
        }
    }

    /**个人中心
      *@author chengpenghui
      **/
    public function personal(){
    	$user=M('user_datail');
    	$id=(int)$_SESSION['id'];
    	$data=$user->find();
    	$this->assign('data',$data);
    	$this->display();
    }

    /**
      *@author chengpenghui
      *
      *@param 
      **/
    public function adduser()
    {
        $usermodel=M('user_datail');
        $data['nicname'] =I('post.nicname');
        $data['hometown']=I('post.hometown');
        $data['nowhome']=I('post.nowhome');
        $data['intreastthing']=I('post.intreastthing');
        $data['lovemotto'] = I('post.lovemotto');
        $data['selfintroduction']=I('post.selfintroduction');
        $useradd=$usermodel->data($data)->add();
        if ($useradd) {
        	  $this->success("添加成功！"); //添加成功
        }else{
             $this->ajaxReturn(0); //添加失败
        }
    }


    /**
      *修改个人信息
      *
      *@author chengpenghui
      *
      *@param 
      **/
    public function modify_user_detail()
    {
     	   $usermodel = M('user_datail');
    	   $data['id']=(int)$_SESSION['id'];
    	   $data['nicname'] =I('post.nicname');
         $data['hometown']=I('post.hometown');
         $data['nowhome']=I('post.nowhome');
         $data['intreastthing']=I('post.intreastthing');
         $data['lovemotto'] = I('post.lovemotto');
         $data['selfintroduction']=I('post.introduction');
         $result = D('Admin/User')->modify_user_detail($data);
		if($result == true){
			$this->success('修改成功');
		}else{
			$this->ajaxReturn(0); //添加失败
		}
    }

    
    /**
      *修改密码
      *
      **/
    public function modify_the_password()
    {
      
      $user_id = (int)$_SESSION['id'];
      $user_model=M('user');
      $find = $user_model->where("id= $user_id")->find();
      $this->assign('data',$find);
      $this->display();
    }

    /**
      *提交所修改的密码
      *
      */
    public function submit_modify()
    {
         $user_model=M('user');
         $id=(int)$_SESSION['id'];
         $password=md5(I('post.newpassword'));
         $check_password=md5(I('post.check_password'));
         if ($password==$check_password) {
             $result = $user_model->where("id=$id")->save(array('password'=>$password));
             if ($result) {
                $this->ajaxReturn(0);//密码修该成功 
              }else{
                $this->ajaxReturn(1);//密码修该失败 
              } 
         }else{
               $this->ajaxReturn(2);//新密码和确认密码不一致 
         }
    }

    /**
      *
      *
      **/


  
} 


?>