<?php

$id = intval($_REQUEST['id']);

include '../../xtra-old/includes/actions/conexao.php;

abre();

$sql = "delete from tab_tipo_exame where id_tipo_exame=$id";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Ocorreu um erro.'));
}

fecha();
?>