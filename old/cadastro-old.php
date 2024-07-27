<?php
include 'old/xtra-old/conexao.php';
abre();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Speed X Radiologia</title>
	<meta charset="utf-8">
	<meta name="author" content="Djalma Aguiar - djalma.df1@gmail.com" />
	<meta name="description" content="Speedx Radiologia Odontologica - Radiologia e diagnóstico por imagem. Superando expectativas e resultados." />
	<meta name="keywords" content="speedx, speed x radiologia odontológica, radiologia odontológica, exames, radiografia" />
	<meta name="application-name" content="Speedx" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<link rel='shortcut icon' href='images/logos/favicon7.ico' type='image/x-icon' />
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
	<link rel="stylesheet" href="xtra/includes/css/formCadastro.css">
	<script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/FF-cash.js"></script>
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.js"></script>
	<script src="js/jquery.color.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/easyTooltip.js"></script>
	<script src="js/forms.js"></script>
	<script src="js/efeitos.js"></script>
	<link rel="stylesheet" href="css/modal.css" type="text/css"	media="screen">
	<script src="js/modal.js"></script>
	<script src="js/menu.js"></script>
<script>
function OnFormSubmit() {
	var myForm  = 'document.frmContato';
	var servico =  document.getElementById("txtServ").value;
	var unidade =  document.getElementById("txtUnd").value;

	if (!RequiredFields(eval(myForm), 'txtNome, Nome','dddTel, DDD','txtTel,Telefone','campoDia, Informe o dia')) 
	return;
	
	else if(unidade == "0"){
		alert("Informe a unidade.");	
	return;
	
	}else if(servico == "0"){
		alert("Informe o tipo de exame.");	
	return;	
	
	}else{
		eval(myForm).submit();
	}
}
</script>
</head>
<body id="page5">
	<!-- header -->
	<header>
		<div id="header">
        	<?php include "../inc/topo.php"; ?>
            <div class="clear"></div>
		</div>
	</header>
	<!-- content -->
	<section id="content">
		<div class="container_24 main_width">
			<div class="wrapper">
								<div class="grid_16 prefix_1" style="width: auto;">
					<span class="tituloPag">Resultados de exames</span>
					<p
						style="color: #00B9C8; font-weight: normal; text-transform: uppercase; padding: 5px 0px 0px 3px; font-size: 14px; margin: 0px;">SPEEDX
						RADIOLOGIA</p>
					<div class="wrapper">
						<div class="map" style="padding-top: 14px;">

							<img src='images/resultados_exam.fw.png'>
						</div>
					</div>
				</div>
					<center><h5 id="message" style="color: green; background-color: #FFF8DC;"></h5></center>
			  <form id="frmContato" method="post">
					<fieldset>
						<legend>Seus dados</legend>
						<label>Como deseja se chamado?
							<select name="id_saudacao" id="id_saudacao" required>
						<option value="" selected="selected">-- Selecione</option>
				   		 <?php
							$sql = mysql_query ( "SELECT * FROM tab_saudacao" );
							while ( $rw = mysql_fetch_array ( $sql ) ) {
						 ?>
				         <option value="<?php echo $rw['id_saudacao']; ?>"><?php echo $rw["nm_saudacao"];?></option>
				                 <?php } ?>
	                		</select>
						</label> 
							<label>Nome * <span>Seu nome</span>
							<input name="txtNome" type="text" size="30" maxlength="50" required="required" value=""/>
						</label> 
						<label>Categoria <span>Dentista ou paciente</span>
							<select name="id_tipo" id="id_tipo" required>
							<option value="" selected="selected">-- Selecione</option>
				   		 <?php
							$sql2 = mysql_query ( "SELECT * FROM tab_tipo_cadastro WHERE id_tipo_cad NOT IN (2)" );
							while ( $rw2 = mysql_fetch_array ( $sql2 ) ) {
						 ?>
				         <option value="<?php echo $rw2['id_tipo_cad']; ?>"><?php echo $rw2["nm_tipo_cad"];?></option>
				                 <?php } ?>
	                		</select>
						</label> 
						<label><?php echo utf8_encode('Endere�o');?>
							<input name="txtEnd" type="txtEnd" size="30" maxlength="15" value="" />
						</label> 
						<label>Cidade
							<input name="txtCidade" type=""txtCidade"" size="30" maxlength="15" value=""/>
						</label> 
						<label>Cep<input type="text" id="cep" name="cep" onkeyup="maskIt(this,event,'##.###-###')" required value=""> </label> 
						<label>UF
							<select name="id_uf" id="id_uf" required>
							<option value="">-- Selecione </option>
				   		 <?php
								$sql = mysql_query ( "SELECT * FROM tab_uf" );
								while ( $rw = mysql_fetch_array ( $sql ) ) {
						 ?>
				         <option value="<?php echo $rw['id_uf']; ?>" ><?php echo utf8_encode($rw["nm_uf"]);?></option>
				                 <?php } ?>
	                		</select>
						</label> 
						<label>Telefone	fixo*<input name="txtTel" type="text" size="30" maxlength="15" onkeyup="maskIt(this,event,'(##) ####-####')" required 
						value="" /></label> 
						<label>Telefone Celular<input name="txtCel" type="text" size="30" maxlength="15" onkeyup="maskIt(this,event,'(##) ####-####')" value="" /></label> 
						<label>E-mail<span>Email v�lido</span><input type="email" id="email" name="email" required value="" /></label>
					</fieldset>
					
					<fieldset>
						<legend>Dados de acesso</legend>
						<label><?php echo utf8_encode('Usu�rio *');?> <span>Seu login</span>
							<input name="txtUser" type="text" size="30" maxlength="50" required="required" value="" />
						</label> 
						<label>Senha * <span>Senha pessoal</span>
							<input name="txtPwd" type="password" size="30" maxlength="50" required="required" value="" />
						</label> 
						<input type="submit" id='btnSubmit' value='Cadastrar' />
					</fieldset>
				</form>
				</div>
			</div>
		</div>
	</section>
	<!-- footer -->
	<?php include "../inc/rodape.php"; ?>
<!--  modal -->
	<div class="window" id="janela1"></div>
	<div id="mascara"></div>
<!-- -->	
		<script type="text/javascript" src="xtra/includes/js/mascaras.js"></script>

		<script type='text/javascript'>
$(document).ready(function() {

	$("#frmContato").submit(function(event) { 
		event.preventDefault();
        var dados = $( "#frmContato" ).serialize(); 
        $.ajax({  
            type: "POST", 
            url: "inserirCad.php",  
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
