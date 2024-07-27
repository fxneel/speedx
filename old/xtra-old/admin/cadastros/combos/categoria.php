<?php
include '../../xtra-old/includes/actions/conexao.php;
abre ();

if(isset($_REQUEST['id_cat'])){
	$id = intval($_REQUEST['id_cat']);
}
$rs = mysql_query ( "SELECT id_tipo_cad id, nm_tipo_cad nome FROM tab_tipo_cadastro ORDER BY id" );
	
	$resultArray = array(); 
	
	while($obj = mysql_fetch_object($rs)) {
		foreach($obj as $key => $value) {
			if (!is_null($value)) {
				$obj->$key = utf8_encode($value);
			}
		if(isset($_REQUEST['id_cat'])){
			if ($obj->id == $id) {
				$obj->selected = true;
			}
		}
		} $resultArray[] = $obj;
	} 
	$result = json_encode($resultArray);
	
	echo $result;

?>