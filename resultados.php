<!DOCTYPE html>
<html lang="en">
<head>
<title>Speedx Radiologia</title>
<meta charset="utf-8">
<meta name="author"	content="Djalma Aguiar Rodrigues - djalma.df1@gmail.com" />
<meta name="description" content="Speedx Radiologia Odontologica - Radiologia e diagnóstico por imagem. Superando expectativas e resultados." />
<meta name="keywords" content="speedx, speed x radiologia odontológica, radiologia odontológica, exames, radiografia" />
<meta name="application-name" content="Speedx" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<link rel='shortcut icon' href='images/logos/favicon7.ico'	type='image/x-icon' />
<link rel="stylesheet" href="css/reset.css" type="text/css"	media="screen">
<link rel="stylesheet" href="css/style.css" type="text/css"	media="screen">
<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/style-resultado.css" type="text/css" media="screen">
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/FF-cash.js"></script>
<script src="js/hoverIntent.js"></script>
<script src="js/superfish.js"></script>
<script src="js/easyTooltip.js"></script>
<script src="js/jquery.color.js"></script>
<script src="js/menu.js"></script>
<!--[if lt IE 7]> 
	  <div style=' clear: both;  height: 59px; padding:0 0 0 15px; position: relative;'> 
	  <a  href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
	  <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg"  border="0" height="42" width="820" alt="You are using an outdated browser. For a  faster, safer browsing experience, upgrade for free today." /></a></div>  
<![endif]-->
<!--[if lt IE 9]> 
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
	<script type="text/javascript" src="js/html5.js"></script>
  <![endif]-->
<script type="text/javascript">
$(document).ready(function(){
	$('#opcaoResultado').change(function(){
		var formPaciente = $('#paciente');
		var formDentista = $('#dentista');
		var valor		 = parseInt( $(this).val() );

		switch( valor ){
			case 1: // Paciente
				formPaciente.show();
				formDentista.hide();
			break;
			case 2: // Dentista
				formPaciente.hide();
				formDentista.show();
			break;
			default: // Nenhum
				formPaciente.hide();
				formDentista.hide();
			break;
		}
	});
});
</script>
</head>
<body id="page6">
	<!-- header -->
	<header>
		<div id="header">
        	<?php include "inc/topo.php"; ?>            
            <div class="clear"></div>
		</div>
	</header>
	<!-- content -->
	<section id="content">
		<div class="main">
			<div class="pad-left">
				<fieldset>
					<legend>Informe os dados abaixo. </legend>
					<label>Tipo do resultado <select id='opcaoResultado'>
							<option value="">Selecione aqui...</option>
							<option value="1">Dentista</option>
							<option value="2">Paciente</option>
					</select>
					</label>
					<form method="post" name="dentista" target="_top" id="dentista"
						action="http://www.docviewer.com.br/login.php?go=clinica&retorno=examespeedx.com.br"
						style="display: none;">
						<label>E-mail<input name="email" type="text" class="forms"
							id="email" onfocus="if(this.value == 'E-mail') this.value=''"
							onblur="if(this.value =='') this.value= 'E-mail'" value="E-mail" />
						</label><label>Senha: <input name="senha" type="password"
							class="forms" id="senha"
							onfocus="if(this.value == 'Senha') this.value=''"
							onblur="if(this.value =='') this.value= 'Senha'" value="Senha" />
						</label> 
						<label> <input name="button4" type="submit"
							class="titulos" id="button4" value="Entrar" />
						</label>
					</form>
					<form action="http://examespeedx.com.br/paciente.php" method="post"
						name="paciente" target="_top" id="paciente" style="display: none;">
						<label>Paciente <input name="doc_user" type="text" class="forms"
							id="doc_user" onblur="if(this.value =='') this.value= 'Número'"
							onfocus="if(this.value == 'Número') this.value=''" size="12"
							value="Número"></label><label>Senha:<input name="senha_user"
							type="password" class="forms" id="senha"
							onfocus="if(this.value == 'Senha') this.value=''"
							onblur="if(this.value =='') this.value= 'Senha'" value="Senha">
						</label>
						<label><input name="button5" type="submit" class="titulos"
							id="button5" value="Entrar" /></label>
					</form>
				</fieldset>
			</div>
		</div>
	</section>
	<?php include "inc/rodape.php"; ?>
</body>
</html>
