<?php
namespace Home\Controller;
use Think\Controller;
class JzController extends Controller {
    public function zgpage(){
        if(!session('id')){alert("请登录");return 0;}
        if(session('type')<2){return 0;}

        $this->class=C('CLASS');
        $this->xueli=C('XUELI');
        $this->shisu=C('SHISU');
        $this->display();
    }
    public function qzpage(){
        if(!session('id')){alert("请登录");return 0;}
        if(session('type')<2){return 0;}

        $this->class=C('CLASS');
        $this->xueli=C('XUELI');
        $this->shisu=C('SHISU');
        $this->display();
    }
    public function addzg(){
        if(!session('id')){alert("请登录");return 0;}
        if(session('type')<2){alert("请上传身份证或等待审核");return 0;}
        $zg=M('zhaogong');
        $_POST['createtime']=date('y-m-d H:i:s',time());
        $_POST['user_id']=session('id');
        $zg=M('zhaogong');
        if(!$zg->create() || !$zg->add()){
            alert('发布失败');return 0;
        }
        $this->success("发布成功",U("/Index/index"));
    }
    public function addqz(){
        if(!session('id')){alert("请登录");return 0;}
        if(session('type')<2){alert("请上传身份证或等待审核");return 0;}
        $_POST['createtime']=date('y-m-d H:i:s',time());
        $_POST['user_id']=session('id');
        $qz=M('qiuzhi');
        if(!$qz->create() || !$id=$qz->add()){
            alert('发布失败');return 0;
        }

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728 ;// 设置附件上传大小
        $upload->exts = array('jpg');// 设置附件上传类型
        $upload->rootPath = C('QZPICTURE'); // 设置附件上传根目录
        $upload->autoSub = false; //不产生日期文件
        $upload->saveName =$id; // 设置文件名
        // 上传文件
        $info = $upload->uploadOne($_FILES['picture']);
        if(!$info){
            alert($upload->getError());
            $where['qiuzhi_id']=$id;
            $qz->where($where)->delete();
            return 0;
        }
        $this->success("发布成功",U("/Index/index"));
    }
    public function glzg(){
        $this->xueli=C('XUELI');
        $this->class=C('CLASS');
        $this->shisu=C('SHISU');

        $jzgs=M('jiazhenggongsi');
        $jzgsdata=$jzgs->select();
        $this->jzgs=$jzgsdata;

        $this->display();
    }
    public function ajglzg(){
        $where['user_id']=session('id');
        $this->xueli=C('XUELI');
        $this->class=C('CLASS');
        $this->shisu=C('SHISU');

        $zg=M('zhaogong');
        $count = $zg->where($where)->count();
        $p=new \Think\Page($count,21);
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
        
        $jzgs=M('jiazhenggongsi');
        $jzgsdata=$jzgs->select();
        $this->jzgs=$jzgsdata;

        $this->display();
    }
    public function ajglqz(){
        if(!session('id')){alert("请登录");return 0;}
        $where['user_id']=session('id');
        $this->xueli=C('XUELI');
        $this->class=C('CLASS');
        $this->shisu=C('SHISU');

        $qz=M('qiuzhi');
        $count = $qz->where($where)->count();
        $p=new \Think\Page($count,21);
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
    public function delzg(){
        if(!session('id')&&!session('admin')){alert("请登录");return 0;}
        $zg=M('zhaogong');
        $where['zhaogong_id']=I('zhaogong_id');
        if(!session('admin')) $where['user_id']=session('id');
        if($zg->where($where)->delete())
            alert("删除成功");
        else  alert("删除失败");
    }
    public function delqz(){
        if(!session('id')&&!session('admin')){alert("请登录");return 0;}
        $qz=M('qiuzhi');
        $where['qiuzhi_id']=I('qiuzhi_id');
        if(!session('admin')) $where['user_id']=session('id');
        if($qz->where($where)->delete()){
            alert("删除成功");
        }
        else  alert("删除失败");
    }
    public function rezgstatus(){
        $zg=M('zhaogong');
        $where['zhaogong_id']=I('zhaogong_id');
        if(!session('admin'))$where['user_id']=session('id');
        $data['status']=I('status');
        $data['createtime']=date('y-m-d H:i:s',time());
        if($zg->where($where)->save($data)){
            alert("修改成功");
        }
        else  alert("修改失败");
    }
    public function reqzstatus(){
        $qz=M('qiuzhi');
        $where['qiuzhi_id']=I('qiuzhi_id');
        if(!session('admin')) $where['user_id']=session('id');
        $data['status']=I('status');
        $data['createtime']=date('y-m-d H:i:s',time());
        if($qz->where($where)->save($data)){
            alert("修改成功");
        }
        else  alert("修改失败");
    }
    public function rezgpage(){
        $zg=M('zhaogong');
        $where['zhaogong_id']=I('zhaogong_id');
        $this->data=$zg->where($where)->select()[0];
        $this->shisu=C('SHISU');
        $this->xueli=C('XUELI');
        $this->display();
    }
    public function reqzpage(){
        $qz=M('qiuzhi');
        $where['qiuzhi_id']=I('qiuzhi_id');
        $this->data=$qz->where($where)->select()[0];
        $this->shisu=C('SHISU');
        $this->display();
    }
    public function rezg(){
        if(!session('id')&&!session('admin')){alert("请登录");return 0;}
        $zg=M('zhaogong');
        $_POST['createtime']=date('y-m-d H:i:s',time());
        if(!session('admin')) $_POST['user_id']=session('id');
        $zg=M('zhaogong');
        $where['zhaogong_id']=I('zhaogong_id');
        if(!$zg->create() || !$zg->where($where)->save()){
            alert('修改失败');return 0;
        }
         alert("修改成功",-2);
    }
    public function reqz(){
        if(!session('id')&&!session('admin')){alert("请登录");return 0;}
        $_POST['createtime']=date('y-m-d H:i:s',time());
        if(!session('admin')) $_POST['user_id']=session('id');
        $where['qiuzhi_id']=I('qiuzhi_id');
        $qz=M('qiuzhi');
        if(!$qz->create() || !$id=$qz->where($where)->save()){
            alert('修改失败');return 0;
        }
         alert("修改成功",-2);
    }
    public function zginfo(){
        $zg=M('zhaogong');
        $where['zhaogong_id']=I('id');
        $this->data=$zg->where($where)->select()[0];
        $this->xueli=C('XUELI');
        $this->class=C('CLASS');
        $this->shisu=C('SHISU');
        $qz=M('zhaogong');
        $status['status']=0;
        $this->alldata=$qz->where($status)->order('createtime desc')->limit(10)->select();
        $this->display();
    }
    public function qzinfo(){
        $qz=M('qiuzhi');
        $where['qiuzhi_id']=I('id');
        $data=$qz->where($where)->select()[0];
        $data['birth']=explode("-",$data['birth'])[0];
        $data['birth']=intval(date('Y',time()),10)-$data['birth'];
        $this->data=$data;
        $status['status']=0;
        $this->alldata=$qz->where($status)->order('createtime desc')->limit(6)->select();
        $this->xueli=C('XUELI');
        $this->class=C('CLASS');
        $this->shisu=C('SHISU');
        $this->display();
    }
}