<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
	public function checklogin(){
		if(!isset($_SESSION['name'])) return 0;
		return 1;
	}
	public function logintype(){
		if(!$this->checklogin()) $this->redirect("/Index/index");
		else {
			return session('type');
		}
	}
	public function getuser_id(){
		return session('id');
	}
	private function setss($id,$name,$type){
		session('name',$name);
		session('id',$id);
		session('type',$type);
	}
    public function register(){
		$user=D('User');
		$err=$user->register();
		if(is_numeric($err)){
			$this->setss($err,I('user_name'),0);
			$this->success("注册成功",U("/Index/index"));
		}
		else $this->error("$err");

    }
    public function login(){
		$user=D('User');
		if($id=$user->finduser()){
			$this->setss($id['id'],$id['user_name'],$id['type']);
			$this->redirect("/Index/index");
		}else alert("登录失败");
    }
    public function logout(){
		session('name',null);
		session('id',null);
		session('type',null);
		$this->redirect("/Index/index");
    }
    public function loginpage(){ $this->display(); }
    public function registerpage(){ $this->display(); }
    public function userbar(){ $this->display(); }
    public function revisepage(){
    	if(!$this->checklogin()) $this->redirect("/Index/index");
    	else {
    		$user=D('User');
    		$data=$user->finduser(1);
    		$this->assign('name',$data['user_name']);
    		$this->assign('id',$data['user_id']);
    		$this->assign('postionname',$data['positionname']);
    		$this->assign('mail',$data['mail']);
    		$this->assign('question',$data['question']);
    		$this->assign('answer',$data['answer']);
    		$this->display();
    	}
    }
    public function revise(){
    	if(!$this->checklogin()) $this->redirect("/Index/index");
    	else {
    		$user=D('User');
    		$err=$user->revise();
			if($err=="修改成功"){
				$id=$user->finduser(1);
				session('name',null);
				session('id',null);
				session('type',null);
				$this->setss($id['id'],$id['user_name'],$id['type']);
				$this->success("修改成功",U("/Index/index"));
			}else alert($err);
    	}
    }
    public function upload_idpicturepage(){
    	if(!$this->checklogin()||session('type')){
    		$this->redirect("/Index/index");
    		return ;
    	}
    	$this->display();
    }
    public function upload_idpicture(){
    	if(!$this->checklogin()||session('type')){
    		$this->redirect("/Index/index");
    		return ;
    	}
    	$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize = 3145728 ;// 设置附件上传大小
		$upload->exts = array('jpg');// 设置附件上传类型
		$upload->rootPath = C('CKPICTURE'); // 设置附件上传根目录
		$upload->autoSub = false; //不产生日期文件
		$upload->replace = true;
		$upload->saveName = $this->getuser_id();// 设置文件名
		// 上传文件
		$info = $upload->uploadOne($_FILES['picture']);
		if(!$info) {// 上传错误提示错误信息
			$this->error($upload->getError());
		}else {// 上传成功
			$checkid=D('Checkid');
			$user=D('User');
			$id=$user->finduser(1);
			if($checkid->ins(session('id'),$id['id_card'])){
				$this->success('上传成功！',U('/Index/index'));
				$user->settype(1);
				session('type',1);
			}else{
				unlink(C('CKPICTURE').$info['savename']);
				alert("更改失败");
			}
		}
    }
    public function findpasspage(){
    	$this->display();
    }
    public function getquestion(){
    	$where['user_name']=I('user_name');
    	$user=M('User');
    	$data=$user->where($where)->select()[0];
    	if(!$data){
    		alert("无此用户名");
    		return ;
    	}
    	$this->data=$data;
    	$this->display();
    }

    public function sendmail(){
    	$where['id']=I('id');
    	$where['answer']=I('answer');
    	$user=M('User');
    	$data=$user->where($where)->select()[0];
    	if(!$data){
    		alert("答案错误");
    		return ;
    	}
    	$p=getRandChar(8);
    	$new['password']=md5($p);
    	$user->where($where)->save($new);
    	$this->success("您的新密码为".$p."，请及时更改",U('/Index/index'),60);
    }
}