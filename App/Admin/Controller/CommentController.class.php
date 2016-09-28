<?php
namespace Admin\Controller;

class CommentController extends CommonController
{
	public function index()
	{
		$condition['status'] = array('neq', -1);
		$ret = D("Comment")->findAll($condition);

		$this->assign('list', $ret);

		// 通过C层，操作V层
		$this->display();
	}

	public function search()
	{
		$username = I('get.username');

		if (!$username || !isset($username)) {
			echo "<script>alert('请输入用户名');window.location.href='".U('Comment/index')."'</script>";die;
		}

		$condition['username'] = array("like", '%'.$username.'%');
		$condition['status'] = array('neq', -1);

		$ret = D("Comment")->findAll($condition);

		// 传递给视图层
		$this->assign('list', $ret);

		// 通过C层，操作V层
		$this->display('Comment/index');
	}

	public function show()
	{
		$id = I('get.id');
		
		if (!$id || !is_numeric($id)) {
			echo "<script>alert('该页面不存在');window.location.href='".U('Comment/index')."'</script>";die;
		}

		// 根据id，去数据库M层获取指定id的数据
		$ret = D("Comment")->findMsgById($id);
		
		// dump($ret);
		$this->assign('result', $ret);

		$this->display();
	}

	public function markup()
	{
		$id = I('get.id');
		
		if (!$id || !is_numeric($id)) {
			echo "<script>alert('该页面不存在');window.location.href='".U('Comment/index')."'</script>";die;
		}

		$ret = D("Comment")->markByIdReplayed($id);

		if (!$ret) {
			echo "<script>alert('回复失败');window.location.href='".U('Comment/index')."'</script>";die;
		}

		echo "<script>alert('回复成功');window.location.href='".U('Comment/index')."'</script>";die;
	}

	public function del()
	{
		$id = I('get.id');
		
		if (!$id || !is_numeric($id)) {
			echo "<script>alert('该页面不存在');window.location.href='".U('Comment/index')."'</script>";die;
		}

		$ret = D("Comment")->delById($id);

		if (!$ret) {
			echo "<script>alert('删除失败');window.location.href='".U('Comment/index')."'</script>";die;
		}

		echo "<script>alert('操作成功');window.location.href='".U('Comment/index')."'</script>";die;
	}

	public function delete()
	{
		$condition['status'] = array('eq', -1);
		$ret = D("Comment")->findAll($condition);

		$this->assign('list', $ret);

		$this->display('Comment/index');
	}
}
?>