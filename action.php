<?php
$name=$_GET['name'];
$score=$_GET['score'];
$new=$score.'&&'.$name;
//获取成绩信息
$a=file_get_contents('score.txt');
$everyscore=explode('@',$a);
$arr=array();
for($i=0;$i<count($everyscore);$i++){
	preg_match('/[0-9]+/',$everyscore[$i],$b);
	if($b[0]<$score){
		$arr[]=$new;
		for($i;$i<(count($everyscore)-1);$i++){
			$arr[]=$everyscore[$i];
		}
		echo '真厉害，您进入了排行榜！';
		break;
	}else{
		$arr[]=$everyscore[$i];
	}
}
file_put_contents('score.txt',implode('@',$arr));
