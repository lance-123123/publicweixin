<?php
namespace Home\Controller;
use Think\Controller;

/**
  *@author chengpenghui
  * 
  *前台 home
  *
  *@param
  *
  *@date 2015/8/24
  */
class IndexController extends Controller {
    /**
      *首页显示文章
      *
      */
    public function index(){
     $blog_model = M('blog');
     $commit=M('comment');
     $catego=M('blog_classification');
	   $blog_cout = $blog_model->where("status= 0")->count();
	   $Page = new \Think\Page($blog_cout,4);
	   $show = $Page->show();// 分页显示输出
		 
     /*在滚动栏中显示*/
     $list = $blog_model->alias('A') //按时间输出
		    ->field('A.id, A.title, A.category_id, A.blog_content, A.blog_photo, A.browsenumber, A.blog_newsletter, A.user_id, A.praise, A.public_date, B.category, C.nicname')
			 ->join('blog_classification as B on B.id = A.category_id')
       ->join('user_datail as C on C.id=A.user_id')
       ->where('A.status=0 ')
       ->limit($Page->firstRow.','.$Page->listRows)
			 ->select();
     
     /*获取浏览量最高的博客，按浏览量排序*/
     $data = $blog_model->alias('A') //按照浏览量输出倒叙输出
        ->field('A.id, A.title, A.category_id, A.blog_content, A.blog_photo, A.browsenumber, A.blog_newsletter, A.user_id, A.praise, A.public_date, B.category, C.nicname')
       ->join('blog_classification as B on B.id = A.category_id')
       ->join('user_datail as C on C.id=A.user_id')
       ->where('A.status=0')
       ->order('A.browsenumber desc')
       ->limit($Page->firstRow.','.$Page->listRows)
       ->select();

       /*获取博客的类别和博客的有关博客的简介*/
       $catego_data=$catego->where('id !=0')->select();
       $this->assign('blog_class',$catego_data);
       $this->assign('data',$data); //输出模板文件
  		 $this->assign('list',$list);
       $this->assign('page',$show);// 赋值分页输出 
       $this->display();
    }

    /**
      *查看文章
      *
      */
    public function look_artical(){
    	$id = $_GET['id'];
    	$blog_model=M('blog');
    	$commit=M('comment');
      $catego=M('blog_classification');
      $blog_find=$blog_model->alias('A')
      ->field('A.id,A.title, A.category_id, A.blog_photo,A.blog_content, A.browsenumber, A.user_id, A.public_date,A.praise, A.status, B.category,  C.nicname')
      ->join('blog_classification as B on B.id = A.category_id')
      ->join('user_datail as C on C.id=A.user_id')
      ->where("A.id=$id")
      ->find();
      
      $commit_content = $commit->where("blog_id = $id and status = 0")->select();
        
      //根据博客id获取留言内容
       $commit_count=$commit->where("blog_id = $id and status = 0")->count();
 
       $data['browsenumber']=array('exp','browsenumber+1');//文章浏览量加1
       $result=$blog_model->where("id=$id")->save($data);
       
       /*获取博客的类别和博客的有关博客的简介*/
       $catego_data=$catego->where('id !=0')->select();
       $this->assign('blog_class',$catego_data);

    	//调用show_title()函数把$id传入
       $last = $this->show_title($id);
       $arr['last_title'] = $last[0]['title']; //用数组盛放上一篇的标题及id
       $arr['last_id'] = $last[0]['id']; 
       $arr['after_title'] = $last[1]['title']; //用数组盛放下一篇的
       $arr['after_id'] = $last[1]['id'];
       $this->assign('arr',$arr);
       $this->assign('list',$blog_find);
       $this->assign('blog_count',$commit_count);
       $this->assign('message_content',$commit_content);
    	 $this->display();
    }

    /** 
       *博客的浏览量增加
       *
       */
    public function addblogcout()
    {
         $id=I('post.id');
         $data['browsenumber']=array('exp','browsenumber+1');//文章浏览量加1
         $blog_model=M('blog');
         $result=$blog_model->where("id=$id")->save($data);
       
    }
    
    /**
      *对有用的博客点赞
      *
      **/
    public function click_praise()
    {
      /*$iipp = $_SERVER["REMOTE_ADDR"];*/
      $id=I('post.id');
      $blog_model=M('blog');
      $data['praise']=array('exp','praise+1');//文章赞加1
      $result=$blog_model->where("id=$id")->save($data);
      if ($result) {

           $this->ajaxReturn(1); // 点赞成功则返回1
        }  
    }


    /**
      *文章的上一篇及下一篇
      **/
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
       *博客留言
       *
       */
     public function commit(){
         $commit_model=M('comment');
         $data['blog_id']=I('post.id');
         $data['name']=I('post.name');
         $data['message']=I('post.message');
         $data['message_time']=time();
         $result=$commit_model->data($data)->add();
         if ($result) {
            $this->ajaxReturn(1); //成功情况
         }else{
           $this->ajaxReturn(0); //成功情况
         }
     }

    /**
      *博客文章罗列
      *
      **/
    public function blog_list()
    {
       $blog_model = M('blog');
       $commit=M('comment');
       $blog_cout = $blog_model->where("id != 0 and status =0")->count();
       $Page = new \Think\Page($blog_cout,4);
       $show = $Page->show();// 分页显示输出
    
        $list = $blog_model->alias('A')
          ->field('A.id, A.title, A.category_id, A.blog_content, A.blog_photo, A.browsenumber, A.blog_newsletter, A.user_id, A.praise, A.public_date, B.category, C.nicname')
         ->join('blog_classification as B on B.id = A.category_id')
         ->join('user_datail as C on C.id=A.user_id')
         ->where('A.id != 0 and A.status =0')
         ->limit($Page->firstRow.','.$Page->listRows)
         ->order('A.id desc')
         ->select();
    
         $this->assign('list',$list);
         $this->assign('page',$show);// 赋值分页输出
         $this->display();
    }

    /**
      *管理留言板
      *
      **/
    
    






}