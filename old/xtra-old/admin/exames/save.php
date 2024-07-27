<?php

$tipoExame = $_REQUEST['nm_tipo_exame'];
$descricao = $_REQUEST['nm_descricao'];

include '../../xtra-old/includes/actions/conexao.php;
abre();

$sql = "insert into tab_tipo_exame(nm_tipo_exame,nm_descricao) values('$tipoExame','$descricao')";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}

fecha();
?>