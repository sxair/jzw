<?php
namespace Home\Controller;
use Think\Controller;
class AdminController extends Controller {
    public function index(){
        if($this->checklogin()==0){
            $this->redirect('loginpage'); return;
        }
        $check=M('checkid');
        $x=$check->limit(1)->select();
        $this->assign('id',$x[0]['id']);
        $this->assign('id_card',$x[0]['id_card']);

        $zg=M('zhaogong');
        $this->zg=$zg->select();
        $qz=M('qiuzhi');
        $this->qz=$qz->select();

        if(isset($_GET['tab'])&&I('tab')!="") $this->tab=I('tab');
        else $this->tab=I('tab');

        $this->aa=I('zz');

        $jzgs=M('jiazhenggongsi');
        $jzgsdata=$jzgs->select();
     
        $this->jzgs=$jzgsdata;
        
        $this->display();
    }
    public function checkid_ok(){
        if($this->checklogin()==0){
            $this->redirect('loginpage'); return;
        }
        $check=M('checkid');
        $data['id']=I('id');
        $x=$check->where($data)->delete();
        $user=M('user');
        $type['type']=I('type');
        $user->where($data)->save($type);
        $this->success('成功',U('/Admin/index'));
    }
	private function setlogin(){
		session('admin','admin');
	}
	private function checklogin(){
		if(session('admin')=='admin') return 1;
		return 0;
	}
    public function loginpage(){
    	$this->display();
    }
    public function login(){
        $ad=M('jzadmin');
        $where['id']=I('admin');
        $where['password']=md5(I('pass'));
    	if($ad->where($where)->select()){
    		$this->setlogin();
    		$this->redirect('/Admin/index');
    	}
    	else alert("登录失败");
    }
    public function logout(){
        session('admin',NULL);
        $this->success("退出成功",U("/Index/index"));
    }
    public function addjiazhenggongsi(){
        if($this->checklogin()==0){
            $this->redirect('loginpage'); return;
        }
        if(!isset($_POST['name'])||!isset($_POST['url'])){
            alert("操作失败");
            return;
        }
        $data['name']=$_POST['name'];$data['url']=$_POST['url'];
        $jz=M('jiazhenggongsi');
        if($jz->add($data))
            alert("新增成功");
        else alert("操作失败");
    }
    public function rejiazhenggongsi(){
        if($this->checklogin()==0){
            $this->redirect('loginpage'); return;
        }
        if(!isset($_POST['name'])||!isset($_POST['url'])){
            alert("操作失败");
            return;
        }
        $where['name']=$_POST['name'];$data['url']=$_POST['url'];
        $jz=M('jiazhenggongsi');
        if(!$jz->where($where)->select()){
            alert("无此公司");
            return;
        }
        $jz->where($where)->save($data);
        alert("修改成功");
    }
    public function deletejiazhenggongsi(){
        if($this->checklogin()==0){
            $this->redirect('loginpage'); return;
        }
        $jz=M('jiazhenggongsi');
        $data['name']=I('name');
        if($jz->where($data)->delete())
            alert("删除成功");
        else alert("操作失败");
    }
    public function delzg(){
        if($this->checklogin()==0){
            $this->redirect('loginpage'); return;
        }
        $where['zhaogong_id']=I('zhaogong_id');
        $zg=M('zhaogong');
        if($zg->where($where)->delete())
            alert("删除成功");
        else  alert("删除失败");
    }
    public function delqz(){
        if($this->checklogin()==0){
            $this->redirect('loginpage'); return;
        }
        $zg=M('qiuzhi');
        $where['qiuzhi_id']=I('qiuzhi_id');
        if($zg->where($where)->delete())
            alert("删除成功");
        else  alert("删除失败");
    }
    public function readpass(){
        if($this->checklogin()==0){
            $this->redirect('loginpage'); return;
        }
        $pass=I('pass');
        $repass=I('repass');
        if($pass!=$repass){
            alert("重复密码不一致"); return 0;
        }
        $ad=M('jzadmin');

        $where['id']=session('admin');
        $date['password']=md5($pass);
        $ad->where($where)->save($date);
        alert("修改成功");
    }
    public function glzg(){
        $this->xueli=C('XUELI');
        $this->class=C('CLASS');
        $this->shisu=C('SHISU');

        $zg=M('zhaogong');
        $count = $zg->where()->count();
        $p=new \Think\Page($count,13);
        $p->setConfig('prev','上一页');
        $p->setConfig('next','下一页');
        $data=$zg->where($where)->order('createtime desc')->limit($p->firstRow.','.$p->listRows)->select();
        foreach ($data as &$jj) {
            $jj['createtime']=explode(" ",$jj['createtime'])[0];
        }
        $this->zg=$data;
        $this->page=$p->show();
        $this->display();
    }
    public function glqz(){
        $this->xueli=C('XUELI');
        $this->class=C('CLASS');
        $this->shisu=C('SHISU');

        $qz=M('qiuzhi');
        $count = $qz->where()->count();
        $p=new \Think\Page($count,13);
        $p->setConfig('prev','上一页');
        $p->setConfig('next','下一页');
        $data=$qz->where($where)->order('createtime desc')->limit($p->firstRow.','.$p->listRows)->select();
        foreach ($data as &$jj) {
            $jj['createtime']=explode(" ",$jj['createtime'])[0];
        }
        $this->qz=$data;
        $this->page=$p->show();
        $this->display();
    }
    public function showuser(){
        $user=M('User');
        $count = $user->where()->count();
        $p=new \Think\Page($count,13);
        $p->setConfig('prev','上一页');
        $p->setConfig('next','下一页');
        $data=$user->limit($p->firstRow.','.$p->listRows)->select();
        $this->user=$data;
        $this->page=$p->show();
        $this->display();
    }
    public function distype(){
        $user=D('User');
        $user->settype(0,I('id'));
        alert("设置成功");
    }
    public function starttype(){
        $check=M('checkid');
        $x=$check->limit(1)->select();
        $this->assign('id',$x[0]['id']);
        $this->assign('id_card',$x[0]['id_card']);
        $this->display();
    }
}