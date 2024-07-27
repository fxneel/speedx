<?php
header("Content-Type: text/html;  charset=ISO-8859-1",true);

$id = intval($_REQUEST['id']);
$tipoExame = $_REQUEST['nm_tipo_exame'];
$descricao = $_REQUEST['nm_descricao'];

include '../../xtra-old/includes/actions/conexao.php;
abre();

$sql = "update tab_tipo_exame set nm_tipo_exame='$tipoExame',nm_descricao='$descricao' where id_tipo_exame=$id";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}

fecha();
?>