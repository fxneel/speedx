<?php
header("Content-Type: text/html;  charset=ISO-8859-1",true);

// Colunas tab_cadastro
$nome		 = $_REQUEST['nm_cad'];
$id_saudacao = $_REQUEST['combo_saudacao'];
$id_tipo 	 = $_REQUEST['combo_categ'];
$id_uf	 	 = $_REQUEST['combo_uf'];
$endereco	 = $_REQUEST['nm_endereco'];
$nm_cidade	 = $_REQUEST['nm_cidade'];
$nr_cep		 = $_REQUEST['nr_cep'];
$tel_fixo	 = $_REQUEST['nr_tel_fix'];
$tel_cel	 = $_REQUEST['nr_tel_cel'];
$email 		 = $_REQUEST['nm_email'];

// Colunas tab_usuario
$user        = $_REQUEST['nm_usuario'];
$senha       = $_REQUEST['nm_senha'];
$perfil      = $_REQUEST['combo_perfil'];
$id_status 	 = $_REQUEST['combo_status'];

include '../../xtra-old/includes/actions/conexao.php;

abre();

// Checa se o e-mail ou usu�rio j� existe.
$consulta = "SELECT a.nm_email FROM tab_cadastro a, tab_usuario b WHERE a.id_cadastro = b.id_cadastro AND a.nm_email = '$email' OR b.nm_usuario = '$user'";
$qry 	  = mysql_query($consulta);
$rows	  = mysql_num_rows($qry);

if($rows > 0){
	
	echo json_encode(array('msg'=>'Atencao! Email ou login ja existem. <br> Redefina e tente novamente.'));
		
} else {

	// Insert tab_cadastro
	$sql_tb_cad = "insert into tab_cadastro(nm_cad, id_saudacao, id_tipo_cad, id_uf, id_status, nm_endereco, nm_cidade, nr_cep, nr_tel_fix, nr_tel_cel, nm_email) values('$nome','$id_saudacao', '$id_tipo','$id_uf', '1', '$endereco','$nm_cidade','$nr_cep','$tel_fixo','$tel_cel','$email')";
	
	$result = @mysql_query($sql_tb_cad);
	$idCad = mysql_insert_id();
	
	// Insert tab_usuario
	$sql_tb_user = "insert into tab_usuario(id_cadastro, nm_usuario, nm_senha, id_perfil, id_status) values('$idCad', '$user','$senha', '$perfil','$id_status')";
	
$result2 = @mysql_query($sql_tb_user);

	if ($result){
		echo json_encode(array('success'=>true));
	} else {
		echo json_encode(array('msg'=>'Ocorreram erros na query.'));
	}
}

fecha();
?>