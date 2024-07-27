<?php
// Colunas tab_cadastro
$id 		 = intval($_REQUEST['txtCod']);
$nome		 = utf8_decode($_REQUEST['txtNome']);
$id_saudacao = $_REQUEST['id_saudacao'];
$id_uf	 	 = $_REQUEST['id_uf'];
$endereco	 = utf8_decode($_REQUEST['txtEnd']);
$nm_cidade	 = utf8_decode($_REQUEST['txtCidade']);
$nr_cep		 = $_REQUEST['cep'];
$tel_fixo	 = $_REQUEST['txtTel'];
$tel_cel	 = $_REQUEST['txtCel'];
$email 		 = utf8_decode($_REQUEST['email']);
 
// Colunas tab_usuario
$user        = utf8_decode($_REQUEST['txtUser']);
$senha       = utf8_decode($_REQUEST['txtPwd']);

include '../../xtra-old/includes/actions/conexao.php;

abre();

// Checar se o e-mail j� existe no banco, diferente do mesmo id.
$sql_email 	  = mysql_query("SELECT id_cadastro FROM tab_cadastro WHERE nm_email = '$email' AND id_cadastro NOT IN($id)");
$cont_email	  = mysql_num_rows($sql_email);

// Checar se o login j� existe no banco, diferente do mesmo id.
$sql_login 	  = mysql_query("SELECT id_cadastro FROM tab_usuario WHERE nm_usuario = '$user' AND id_cadastro NOT IN($id)");
$cont_login	  = mysql_num_rows($sql_login);

$valida = $cont_email + $cont_login;

// Informa��o j� existe no banco, n�o se pode atualizar.
if($valida > 0){

	echo utf8_encode('Atencao! Email ou login informados j� existem na base de dados. Altere e tente novamente.');

} else {
		
		// Update tab_cadastro
		$sql_tb_cad = "UPDATE tab_cadastro SET
		nm_cad 				= '$nome',
		id_saudacao 		= '$id_saudacao',
		id_uf				= '$id_uf',
		nm_endereco 		= '$endereco',
		nm_cidade 			= '$nm_cidade',
		nr_cep				= '$nr_cep',
		nr_tel_fix  		= '$tel_fixo',
		nr_tel_cel  		= '$tel_cel',
		nm_email 		  	= '$email'
		WHERE id_cadastro 	= $id";
		
		$result1 = @mysql_query($sql_tb_cad);
		// Update tab_usuario
		$sql_tb_user = "UPDATE tab_usuario SET
		nm_usuario			= '$user',
		nm_senha	 		= '$senha',
		WHERE id_cadastro 	= $id";
		
		$result2 = @mysql_query($sql_tb_user);
		
		if ($result1){
			echo 'Dados atualizados com sucesso.';
		} else {
			echo 'Ocorreu um erro';
		}
}
fecha();
?>