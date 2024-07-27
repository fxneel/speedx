<?php
include '../../xtra-old/includes/actions/checa.php;
$usuario   = $_SESSION ["usuario"];
$strCodigo = $_SESSION["idCad"];

include '.../../xtra-old/includes/actions/conexao.php
abre();

if ($strCodigo) {
	
	$btForm = 'Atualizar';
	$action = '../actions/atualizaForm.php?txtCodigo=' . $strCodigo;
	$consulta = mysql_query ( "SELECT *
			FROM tab_cadastro a, tab_usuario b
			WHERE a.id_cadastro = b.id_cadastro
			AND a.id_status =1
			AND b.id_perfil =2
			AND a.id_cadastro = '$strCodigo'
			ORDER BY a.id_cadastro");

	$row = mysql_fetch_array ( $consulta );
	
	// Colunas tab_cadastro
	$nome		 = $row['nm_cad'];
	$id_saudacao = $row['id_saudacao'];
	$id_tipo 	 = $row['id_tipo_cad'];
	$id_uf	 	 = $row['id_uf'];
	$endereco	 = $row['nm_endereco'];
	$nm_cidade	 = $row['nm_cidade'];
	$nr_cep		 = $row['nr_cep'];
	$tel_fixo	 = $row['nr_tel_fix'];
	$tel_cel	 = $row['nr_tel_cel'];
	$email 		 = $row['nm_email'];
	// Colunas tab_usuario
	$user        = $row['nm_usuario'];
	$senha       = $row['nm_senha'];
	
} else {
	echo "Cadastro n�o localizado.";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Site Speedx - Resultado de exames</title>
	<meta charset="iso-8859-1">
	<link rel="stylesheet" href="../includes/css/estilo.css">
	<link rel="stylesheet" href="../includes/css/formCadastro.css">
</head>
<body>
	<div id="master">
		<?php include "in../../xtra-old/mnt/inc/topo.php?>
		<?php incxtra-old "inc/menu.php";?>
			<section id="conteudo">
			<center><h3 id="message" style="color: green; background-color: #FFF8DC;"></h3></center>
			  <form id="frmContato" method="post">
					<fieldset>
						<legend>Dados de cadastro</legend>
						<input type="hidden" id='txtCod' name='txtCod' value='<?php echo $strCodigo;?>'>
						<label>Sauda��o
							<select name="id_saudacao" id="id_saudacao" >
				   		 <?php
							$sql = mysql_query ( "SELECT * FROM tab_saudacao" );
							while ( $rw = mysql_fetch_array ( $sql ) ) {
						 ?>
				         <option value="<?php echo $rw['id_saudacao']; ?>" <?php if($rw['id_saudacao'] == $id_saudacao) echo 'selected'; ?>><?php echo $rw["nm_saudacao"];?></option>
				                 <?php } ?>
	                		</select>
						</label> 
						<label>Nome * <span>Seu nome</span>
							<input name="txtNome" type="text" size="30" maxlength="50" required="required" value="<?php echo $nome;?>"/>
						</label> 
						<label>Endere�o
							<input name="txtEnd" type="txtEnd" size="30" maxlength="100" value="<?php echo $endereco;?>" />
						</label> 
						<label>Cidade
							<input name="txtCidade" type=""txtCidade"" size="30" maxlength="40" value="<?php echo $nm_cidade;?>"/>
						</label> 
						<label>UF
							<select name="id_uf" id="id_uf" required>
							<option value="">-- Selecione </option>
				   		 <?php
								$sql = mysql_query ( "SELECT * FROM tab_uf" );
								while ( $rw = mysql_fetch_array ( $sql ) ) {
						 ?>
				         <option value="<?php echo $rw['id_uf']; ?>" <?php if($rw['id_uf'] == $id_uf) echo 'selected'; ?>><?php echo $rw["nm_uf"];?></option>
				                 <?php } ?>
	                		</select>
						</label> 
						<label>Cep<input type="text" id="cep" name="cep" onkeyup="maskIt(this,event,'##.###-###')" required value="<?php echo $nr_cep;?>"> </label> 
						<label>Telefone	fixo*<input name="txtTel" type="text" size="30" maxlength="15" onkeyup="maskIt(this,event,'(##) ####-####')" required 
						value="<?php echo $tel_fixo;?>" /></label> 
						<label>Telefone Celular<input name="txtCel" type="text" size="30" maxlength="15" onkeyup="maskIt(this,event,'(##) ####-####')" value="<?php echo $tel_cel;?>" /></label> 
						<label>E-mail<span>Email v�lido</span><input type="email" id="email" name="email" required value="<?php echo $email;?>" /></label>
					</fieldset>
					
					<fieldset>
						<legend>Dados de login</legend>
						<label>Usu�rio * <span>Seu login</span>
							<input name="txtUser" type="text" size="30" maxlength="50" required="required" value="<?php echo $user;?>" />
						</label> 
						<label>Senha * <span>Senha pessoal</span>
							<input name="txtPwd" type="password" size="30" maxlength="50" required="required" value="<?php echo $senha;?>" />
						</label> 
						<input type="submit" id='btnSubmit' value='<?php echo $btForm;?>' />
					</fieldset>
				</form>
			</section>
		<?php incxtra-old "inc/footer.php";?>
				<script type="text/javascript" src="../includes/js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="../includes/js/mascaras.js"></script>
<script type='text/javascript'>

$(document).ready(function() {

	$("#frmContato").submit(function(event) { 
		event.preventDefault();
        var dados = $( "#frmContato" ).serialize(); 
        $.ajax({  
            type: "POST", 
            url: "cadastro/update.php",  
            data: dados,  
            success: function( data )  
            {  
				$("#message").html(data);	
            }  
        });  
  
        return false;  
	}); 
});
</script>

</body>
</html>
<?php fecha();?>