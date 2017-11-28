<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->class=C('CLASS');
        if(!isset($_GET['type'])||$_GET['type']=="") $_GET['type']=0;
        if(!isset($_GET['z'])||$_GET['z']=="") $_GET['z']=-2;
        if(isset($_GET['positionname'])&&$_GET['positionname']!="") {
            $type['positionname']=I('positionname');
            $this->position=I('positionname');
        }
        if(isset($_GET['gongzi'])&&I('z')==-2) $type['_string']="fgongzi>=".I('gongzi');
        if(isset($_GET['gongzi'])&&I('z')==-1){
            if(I('gongzi')==0) 
                $type['_string']="fgongzi<=1000000";
            else
                $type['_string']="fgongzi<=".I('gongzi');
        }
        $this->z=$z=I('z');

        $type['type']=I('type');
        $type['status']=0;
        if($z==-2) $zz=M('zhaogong');
        else $zz=M('qiuzhi');
        $this->type=I(z);
        $this->gongzi=I('gongzi');
        $count = $zz->where($type)->count();
        if($z==-2)
            $p=new \Think\Page($count,21);
        else  $p=new \Think\Page($count,7);
        $p->setConfig('prev','上一页');
        $p->setConfig('next','下一页');
        $jz=$zz->where($type)->order('createtime desc')->limit($p->firstRow.','.$p->listRows)->select();
        foreach ($jz as &$jj) {
            $jj['createtime']=explode(" ",$jj['createtime'])[0];
        }
        $this->jz=$jz;
        $this->page=$p->show();
        $jzgs=M('jiazhenggongsi');
        $jzgsdata=$jzgs->select();
        $this->jzgs=$jzgsdata;

        $this->xueli=C('XUELI');
        $this->class=C('CLASS');
        $this->shisu=C('SHISU');

        $this->display();
    }
}