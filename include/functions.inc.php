<?php
function pr($arr){
	echo '<pre>';
	print_r($arr);
}

function prx($arr){
	echo '<pre>';
	print_r($arr);
	die();
}

function get_safe_value($con,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($con,$str);
	}
}

function get_question($con,$limit='',$sem_id='',$question_id=''){
	$sql="select question_paper.*,semesters.semesters from question_paper,semesters where question_paper.status=1 ";
	if($sem_id!=''){
		$sql.=" and question_paper.semesters_id=$sem_id ";
	}
	if($question_id!=''){
		$sql.=" and question_paper.id=$question_id ";
	}
	$sql.=" and question_paper.semesters_id=semesters.id ";
	$sql.=" order by question_paper.id desc";
	if($limit!=''){
		$sql.=" limit $limit";
	}
	
	$res=mysqli_query($con,$sql);
	$data=array();
	if ($query = mysqli_query($con, $sql)) {
	while($row=mysqli_fetch_assoc($res)){
		$data[]=$row;
	}
	}
	return $data;
}


function get_notes($con,$limit='',$sub_id='',$notes_id=''){
	$sql="select notes.*,subjects.subjects from notes,subjects where notes.status=1 ";
	if($sub_id!=''){
		$sql.=" and notes.subjects=$sub_id ";
	}
	if($notes_id!=''){
		$sql.=" and notes.id=$notes_id ";
	}
	$sql.=" and notes.subjects_id=subjects.id ";
	$sql.=" order by notes.id desc";
	if($limit!=''){
		$sql.=" limit $limit";
	}
	
	$res=mysqli_query($con,$sql);
	$data=array();
	if ($query = mysqli_query($con, $sql)) {
	while($row=mysqli_fetch_assoc($res)){
		$data[]=$row;
	}
	}
	return $data;
}



?>
