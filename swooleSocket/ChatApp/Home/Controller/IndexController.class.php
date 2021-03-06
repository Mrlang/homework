<?php

namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index() {
		$this->display();
    }
    
    public function doLogin() {
    	$user = M('user'); 
    	$data['username'] = I('post.logname');
    	$data['password'] = I('post.logpass');
		if($res = $user->where($data)->select()) {
			session('username',$res[0]['username']);
			session('is_deny',$res[0]['is_deny']);
			session('can_del',$res[0]['can_del']);
			$this->success('登录成功!请文明发言！','chatroom/username/'.$data['username'],1);
		}else {
			$this->error('未成功登录...','',1);
		}
    }
    
    public function doSign() {
    	$data['username'] = I('post.signname');
    	$data['password'] = I('post.signpass');
    	$name = $data['username'];
    	$flag = M('user')->where("username='$name'")->select();
    	if( !$flag ) {
    		M('user')->add($data);
    		session('username',$data['username']);
    		session('is_deny',0);
    		session('can_del',$data['can_del']);
    		$this->success('注册成功!请记好你的账号密码','chatroom/username/'.$data['username'],3);
    	}else {
    		$this->error('注册失败...改账号已被注册','index',3);
    	}
    }
    
     public function chatroom() {
    	if(I('session.username') && I('get.username'))
    		$this->display();
    	else
    		$this->error('需先登录哦！','index',3);
    	
    	
    }
    
    public function insertcon() {
    	if(I('session.username') ){
    		$where['username'] = I('post.sender');
    		$arr = M('user')->where($where)->select();
    		if($arr[0]['is_deny']==0){
    			$con = M('content');
		    	$data['sender'] = I('post.sender');
		    	$data['content'] = I('post.content');
		    	$data['time'] = date("Y-m-d H:i:s",time());
		    	if($con->add($data)) {
		    		$res = "发言成功！";
		    	}else {
		    		$res = "发言失败...";
		    	}
    		}else {
    			$res = "你的嘴巴太脏，已被禁止发言...";
    		}
    		$this->ajaxReturn($res);
    	}else{
    		$this->error('需先登录哦！','index',3);
    	}
    	
    }




}
