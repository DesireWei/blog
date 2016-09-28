<?php
namespace Common\Model;
use Think\Model;

class CommentModel extends Model
{
	public function findAll($condition=array())
	{
		$res = M("Comment")->where($condition)->order('status, addtime desc')->select();
		// echo M("Comment")->getLastSql();die;
		return $res;
	}

	// 根据id去查询留言信息
	public function findMsgById($id)
	{
		$res = M("Comment")->where('comment_id = '.$id)->find();
		return $res;
	}

	// 根据id去修改状态值
	public function markByIdReplayed($id)
	{
		$data['status'] = 1;
		$res = M("Comment")->where('comment_id = '.$id)->save($data);
		return $res;
	}

	// 根据id删除指定的信息
	public function delById($id)
	{
		$data['status'] = -1;
		$res = M("Comment")->where('comment_id = '.$id)->save($data);
		return $res;
	}
}