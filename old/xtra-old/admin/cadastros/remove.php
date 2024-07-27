<?php

$id = intval($_REQUEST['id']);

include '../../xtra-old/includes/actions/conexao.php;

abre();

$sql = "UPDATE tab_cadastro SET id_status = '2' where id_cadastro = $id";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Ocorreu um erro.'));
}

fecha();
?>