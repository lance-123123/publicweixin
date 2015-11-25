<?php
namespace Admin\Controller;
use Think\Controller;

/*@author chengpenghui
 *
 *@date 2015/8/17
 *
 **/
class IndexController extends Controller {

	 /*初始化方法*/
   public function _initialize(){
      if(!session('id')){
            $this->redirect('Public/login');
        }
    }

  /**
	  *博客列表
	  *
	  **/
    public function index(){

    $blog_model = M('blog');
	  $blog_cout = $blog_model->where("id != 0")->count();
	  $Page = new \Think\Page($blog_cout,10);
		$show = $Page->show();// 分页显示输出
		
    $list = $blog_model->alias('A')
			->field('A.id,A.title, A.category_id, A.browsenumber, A.user_id, A.public_date, A.status, B.category,  C.nicname')
			->join('blog_classification as B on B.id = A.category_id')
      ->join('user_datail as C on C.id=A.user_id')
			->limit($Page->firstRow.','.$Page->listRows)
			->select();
  		$this->assign('_list',$list);
  		$this->assign('page',$show);// 赋值分页输出
      $this->display();
    }


    /**
      *管理博客
      *
      *@author 
      *
      *@param 
      *
      **/
    public function manageblog(){    
    $blog_model = M('blog');
    $blog_cout = $blog_model->where("id != 0")->count();
    $Page = new \Think\Page($blog_cout,10);
    $show = $Page->show();// 分页显示输出
    
    $list = $blog_model->alias('A')
      ->field('A.id,A.title, A.category_id, A.browsenumber, A.user_id, A.public_date, A.status, B.category,  C.nicname')
      ->join('blog_classification as B on B.id = A.category_id')
      ->join('user_datail as C on C.id=A.user_id')
      ->limit($Page->firstRow.','.$Page->listRows)
      ->select();
      $this->assign('_list',$list);
      $this->assign('page',$show);// 赋值分页输出
      $this->display();
    }


    /**
      *添加博客
      *
      *@author 
      *@param  
      *
      **/
    public function writeblog(){
      $model = M('blog_classification');
      $list = $model->where('id !=0 ')->select();
      $this->assign('list',$list); 
    	$this->display();
    }

    /**
      *@author 
      *
      *@param 
      * 添加博客标签
      **/
    public function addtage(){
         $data['category']=I('post.category');
         $tages = M('blog_classification');
         $findtage = $tages->where($data)->find();
         if($findtage) {
             $this->ajaxReturn(1); //如果出错的情况下返回1
          }else{
            $result = $tages->data($data)->add();
            $this->ajaxReturn(0); //如果成功的情况下返回0 
          } 
    }


     /**把公开博客设置私有
       *
       **/
     public function public_blog()
     {
             /*$id = $_GET['id'];*/
             $id = I('post.id');
             $blog_model=M('blog');
             $public_cout=$blog_model->where("status=0")->count();//判断文章的总数是否只剩下当前一个
             if ($public_cout==1) {
                  $this->ajaxReturn(2); //文章不能全部私有
             }else{
               $set= $blog_model->where("id=$id")->save(array('status'=>1));
               if ($set) {
                  $this->ajaxReturn(1);//私有成功情况  
               }else{
                  $this->ajaxReturn(0);//私有失败情况
               }
             }
     }

     /**
       *把私有博客公开
       *
       **/
     public function private_blog()
     {
        $id = I('post.id');
        $blog_model=M('blog');
        $set= $blog_model->where("id=$id")->save(array('status'=>0));
        if ($set) {
            $this->ajaxReturn(1);
        }else{
            $this->ajaxReturn(0);
        }
     }
     


     /**
      *查看博客
      */
    public function  look_blog()
    {
      
      $id = $_GET['id'];
      $blog_model=M('blog');

      $blog_find=$blog_model->alias('A')
      ->field('A.title, A.category_id, A.blog_photo,A.blog_content, A.browsenumber, A.user_id, A.public_date, A.status, B.category,  C.nicname')
      ->join('blog_classification as B on B.id = A.category_id')
      ->join('user_datail as C on C.id=A.user_id')
      ->where("A.id=$id")
      ->find();
       //调用show_title()函数把$id传入
       $last = $this->show_title($id);
       $arr['last_title'] = $last[0]['title']; //用数组盛放上一篇的标题及id
       $arr['last_id'] = $last[0]['id']; 
       $arr['after_title'] = $last[1]['title']; //用数组盛放下一篇的
       $arr['after_id'] = $last[1]['id'];
       $this->assign('arr',$arr);
       $this->assign('data',$blog_find);
       $this->display();
    }
     
    /**
      *博客的当前篇及下一篇
      *
      ***/
    public function show_title($id)
     {
         $m=M('blog');
         $where['id'] = array('lt',$id);//小于当前id
         $res1 = $m->where($where)->field('title, id')->find(); //上一篇
         $where['id']  = array('gt',$id);//大于当前id
         $res2 = $m->where($where)->field('title, id')->find();//下一篇
         $arr[] = $res1;//使用数组盛放上一篇的内容
         $arr[] = $res2;//盛放下一篇的内容
         return $arr;//返回数组
     }
    
    /**
      *删除博客
      *
      **/
    public function delete_blog()
    {
      $id = I('post.id');
      $blog_model = M('blog');
      $blog_delete = $blog_model->where("id = $id")->delete();
      if ($blog_delete) {
         $this->ajaxReturn(1); //删除博客成功！
      }else{
        $this->ajaxReturn(0); //删除博客失败！
      }
  }

  /**
    *编辑博客
    *
    **/
  public function edit_blog()
  {

    $id = $_GET['id'];
    $blog_model= M("blog");
    $find_blog = $blog_model->where("id=$id")->find();
    $model = M('blog_classification');
    $list = $model->where('id !=0 ')->select();
    $this->assign('list',$list);
    $this->assign('data',$find_blog);
    $this->display();
  }

  /**
    *查看博客
    *
    */
  public function look_commit_detail()
  {
    $id=$_GET['id'];
    $commit_model=M('comment');
    $show_commit=$commit_model->where("id = $id")->find();
    $this->assign("commit_detail",$show_commit);
    $this->display();
  }
  
  /**
    *提交所编辑的博客
    *
    **/
    public function  submit_edit_blog()
    {
       $blog_model=M('blog');
       $data['id']=(int)I('post.blog_id');
       $data['title']=I('post.title');
       $data['blog_content']=I('post.content');
       $data['category_id'] = I('post.category');
       $result = D('Admin/Index')->submit_blog($data);
       if ($result==true) {
          $this->success('博客编辑成功！','manageblog');
       }else{
          $this->error("博客编辑失败！");
       }
    }
 

    /**
      *@author 
      *
      *@param
      *
      *提交博客内容
      **/
    public function submitblog()
    {
      $blog=M("blog");
      $data['title'] = I("post.title");
      $data['blog_photo'] = I("post.photourl");
      $data['category_id'] =I("post.choice");
      $data['user_id']=(int)$_SESSION['id'];
      $data['blog_content'] = I("post.blog_content");
      $data['public_date']=time();
      $data['status'] = 0 ; //默认是公开状态
      $data['blog_newsletter']=mb_substr($data['blog_content'],0,120,'utf-8');
      $res = $blog->data($data)->add();

       if ($res) {
            $this->ajaxReturn(1);//成功情况
       }else{
           $this->ajaxReturn(0);//失败情况
       }
    }
    
    /**
      *个人简历
      *
      **/
    public function persion_information()
    {
      $persion_model=M('user_datail');
       
       $this->display();

    }


   /*博客留言板功能*/
   public function message_management()
   {    
       $commit_model=M('comment');
       $commit_cout = $commit_model->where("status=0")->count();
       $Page = new \Think\Page($blog_cout,20);
       $show = $Page->show();// 分页显示输出
     
      $list = $commit_model->alias('A')//显示所有博客评论信息
         ->field('A.id, A.blog_id, A.name, A.message_time, B.title')
         ->join('blog as B on B.id = A.blog_id')
         ->where('A.status=0')
         ->limit($Page->firstRow.','.$Page->listRows)
         ->select();
       $this->assign('list',$list);
       $this->display();
   }

      /*
       *删除留言
       */
    public function delete_commit()
    {
      $id=(int)I('post.id');
      $commit_model=M('comment');
      $delete=$commit_model->where("id=$id")->delete();
      if($delete){
         $this->ajaxReturn(0); //删除留言成功返回 1
      }else{
        $this->ajaxReturn(1);//删除留言失败返回 0
      }
    }


    /*博客浏览询量*/
    public function blog_view()
    {  
       $this->display();
    }


    /*获取数据显示图表信息*/
    public function retrun_date()
    {
       $id=I('post.id');
       $blog_model=M('blog');
       $list=$blog_model->where("status=0")->getField('id,browsenumber');
       if($list){
          /*$jsonencode = json_encode($list);*/
           $this->ajaxReturn($list);//获取数据成功则返回一个数组
        }else{
           $this->ajaxReturn(1);//未获取数据则返回1(错误信息提示)
        }    
    }


    /**
    *上传图片文件
    */
    public function  submitphoto(){
        $meaasage="";
       if(isset($_FILES['document'])) {
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 3145728;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->savePath = 'Picture/'; // 设置附件上传目录
            $info = $upload->upload();
            if (!$info) {// 上传错误提示错误信息
                $meaasage=$upload->getError();
                $this->ajaxReturn($meaasage);
            }else {// 上传成功 获取上传文件信息
                foreach ($info as $file) {
                    $url = $file['savepath'].$file['savename'];
                }
            }
        }
        $this->ajaxReturn($url);
    }

}