<?php
include '../../xtra-old/includes/actions/conexao.php;
abre ();

if(isset($_REQUEST['id_saudacao'])){
	$id = intval($_REQUEST['id_saudacao']);
}

$rs = mysql_query ( "SELECT id_saudacao id, nm_saudacao nome FROM tab_saudacao ORDER BY id" );
	
	$resultArray = array(); 
	
	while($obj = mysql_fetch_object($rs)) {
		foreach($obj as $key => $value) {
			if (!is_null($value)) {
				$obj->$key = utf8_encode($value);
			}
			
			if(isset($_REQUEST['id_saudacao'])){
				if ($obj->id == $id) {
					$obj->selected = true;
				}
			}
		} $resultArray[] = $obj;
	} 
	$result = json_encode($resultArray);
	
	echo $result;

?>