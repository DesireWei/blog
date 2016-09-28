<?php 
function getMdPassword($password)
{
	$prefix = C('PASS_PRE');
	return md5($password.$prefix);
}

// 根据状态值显示内容
function getStatusValue($status)
{
	switch ($status) {
		case 0:
			echo "<span class='wait'>未回复</span>";
			break;

		case 1:
			echo "<span class='success'>已回复</span>";
			break;

		case -1:
			echo "<span class='noreplay'>垃圾留言</span>";
			break;
	}
}
?>