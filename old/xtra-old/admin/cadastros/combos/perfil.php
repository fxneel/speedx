<?php
include '../../xtra-old/includes/actions/conexao.php;
abre ();

if(isset($_REQUEST['perfil'])){
	$id = intval($_REQUEST['perfil']);
}

$rs = mysql_query ( "SELECT id_perfil id, nm_perfil nome FROM tab_perfil ORDER BY id" );
	
	$resultArray = array(); 
	
	while($obj = mysql_fetch_object($rs)) {
		foreach($obj as $key => $value) {
			if (!is_null($value)) {
				$obj->$key = utf8_encode($value);
			}
			
			if(isset($_REQUEST['perfil'])){
				// Compara o id e define o combo como selecionado
				if ($obj->id == $id) {
					$obj->selected = true;
				}
			}
						
		} $resultArray[] = $obj;
	} 
	$result = json_encode($resultArray);
	
	echo $result;

?>