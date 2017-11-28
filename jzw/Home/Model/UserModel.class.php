<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model {
	protected $_validate=array(
#	  	array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间])
#验证条件 
#		self::EXISTS_VALIDATE 或者0 存在字段就验证(默认)
#		self::MUST_VALIDATE 或者1 必须验证
#		self::VALUE_VALIDATE或者2 值不为空的时候验证
#验证时间
#		Model::MODEL_INSERT或者1新增数据时候验证
#		Model::MODEL_UPDATE或者2编辑数据时候验证
#		Model::MODEL_BOTH或者3全部情况下验证（默认）
	  	array('id_card','18','不是有效身份证',2,'length'),
	  	array('id_card','check_identity','不是有效身份证',2,'callback'),
	  	array('id_card','/^[a-zA-Z0-9_]*$/u','身份证格式不符合要求',1,'regex'),
	  	array('user_name','1,20','用户名长度不符合要求',1,'length',1),
	  	array('user_name','','此用户名已申请',1,'unique',1),
	  	array('password','3,20','密码长度过短',1,'length'),
	  	array('mail','email','邮箱格式错误',1)
	);
	public function check_identity($value){
		$id=$value;
	    $set = array(7,9,10,5,8,4,2,1,6,3,7,9,10,5,8,4,2);
	    $ver = array('1','0','x','9','8','7','6','5','4','3','2');
	    $arr = str_split($id);
	    $sum = 0;
	    for ($i = 0; $i < 17; $i++)
	    {
	        if (!is_numeric($arr[$i]))
	        {
	            return false;
	        }
	        $sum += $arr[$i] * $set[$i];
	    }
	    $mod = $sum % 11;
	    if (strcasecmp($ver[$mod],$arr[17]) != 0)
	    {
	        return false;
	    }
	    return true;
	}
	protected $_auto = array (
		#array(完成字段1,完成规则,[完成条件,附加规则])
		array('password','md5',3,'function')
	);
	function register(){
		if(!$this->create()){
			return $this->getError();
		}else{
			return $this->add();
		}
	}
	function finduser($type=0){
		if($type==0){
			$where['user_name']=I('user_name');
			$where['password']=md5(I('password'));
		}else{
			$where['id']=session('id');	
		}
		$var=$this->where($where)->find();
		return $var?$var:0;
	}
	function revise(){
		$where['id']=session('id');
		if(!$this->create()){
			return $this->getError();
		} else {
			$this->where($where)->save();
			return "修改成功";
		}
	}
	function settype($type,$id=NULL){
		if($id==NULL) $where['id']=session('id');
		else $where['id']=$id;
		$data['type']=$type;
		$this->where($where)->save($data);
	}
}
