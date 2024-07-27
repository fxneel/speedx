<?php
include '../../xtra-old/includes/actions/conexao.php;
abre ();

if(isset($_REQUEST['status'])){
	$id = intval($_REQUEST['status']);
}

$rs = mysql_query ( "SELECT id_status id, nm_status nome FROM tab_status ORDER BY id" );
	
	$resultArray = array(); 
	
	while($obj = mysql_fetch_object($rs)) {
		foreach($obj as $key => $value) {
			if (!is_null($value)) {
				$obj->$key = utf8_encode($value);
			}
			if(isset($_REQUEST['status'])){
				if ($obj->id == $id) {
					$obj->selected = true;
				}
			}
		} $resultArray[] = $obj;
	} 
	$result = json_encode($resultArray);
	
	echo $result;

?>