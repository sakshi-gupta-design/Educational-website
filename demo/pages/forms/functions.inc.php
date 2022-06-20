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

function selectalldata($table)
 {
	   $select="SELECT * FROM $table";
   $select1=mysqli_query($GLOBALS['con'],$select);
   return $select1;
 }
 
  function fetchdata($table,$where)
   {
   $select="SELECT * FROM $table where id= $where";
   $select1=mysqli_query($GLOBALS['con'],$select);
   return mysqli_fetch_array($select1);

   }
 
 function insert($data,$table)
   {
        $columns = "";
		$values = "";
		
		foreach ($data as $column => $value) {
			
			$columns .= ($columns == "") ? "" : ", ";
			
			$columns .= $column;
			
			$values .= ($values == "") ? "" : ", ";
			$values .= $value;
		}
		
		//echo $columns;
		//echo $values;
		
	$insert=("INSERT INTO $table ($columns) VALUES ($values)");
	//echo $insert;
	mysqli_query($GLOBALS['con'],$insert);
   }
   
   
    function update($data,$table,$where)
   {
	foreach ($data as $coloum => $value)
    {
    $update=("UPDATE $table SET $coloum = $value WHERE id= $where");
	mysqli_query($GLOBALS['con'],$update);
    }
	return true;
   }
   
   function deletedata($table,$where)
   {
    $delete=("DELETE FROM $table WHERE id=$where");
	mysqli_query($GLOBALS['con'],$delete) or die(mysqli_error());
	return true;
   }
   
   ?>