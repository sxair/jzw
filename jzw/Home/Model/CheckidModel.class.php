<?php
namespace Home\Model;
use Think\Model;
class CheckidModel extends Model {
	function ins($id,$user_id){
		$data['id']=$id;
		$data['id_card']=$user_id;
		return $this->add($data);
	}
}
