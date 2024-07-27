<?php
include '../../xtra-old/includes/actions/conexao.php;
abre ();

if(isset($_REQUEST['iduf'])){
	$id = intval($_REQUEST['iduf']);
}

$rs = mysql_query ( "SELECT id_uf id, nm_uf nome FROM tab_uf ORDER BY id" );
	
	$resultArray = array(); 
	
	while($obj = mysql_fetch_object($rs)) {
		foreach($obj as $key => $value) {
			if (!is_null($value)) {
				$obj->$key = utf8_encode($value);
			}
			if(isset($_REQUEST['iduf'])){
				if ($obj->id == $id) {
					$obj->selected = true;
				}
			}
			
		} $resultArray[] = $obj;
	} 
	$result = json_encode($resultArray);
	
	echo $result;

?>