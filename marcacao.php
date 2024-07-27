<!DOCTYPE html>
	<html lang="pt-br">
<head>
	<title>Speed X Radiologia</title>
	<meta charset="utf-8">
	<meta name="author" content="Djalma Aguiar Rodrigues - djalma.df1@gmail.com" />
	<meta name="description" content="Speedx Radiologia Odontologica - Radiologia e diagnóstico por imagem. Superando expectativas e resultados." />
	<meta name="keywords" content="speedx, speed x radiologia odontológica, radiologia odontológica, exames, radiografia" />
	<meta name="application-name" content="Speedx" />
	<link rel='shortcut icon' href='images/logos/favicon7.ico' type='image/x-icon' />
	<script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/FF-cash.js"></script>
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.js"></script>
	<script src="js/jquery.color.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/easyTooltip.js"></script>
	<script src="js/efeitos.js" ></script>
	<script src="js/mascaras.js"></script>
	<script src="js/menu.js" type="text/javascript"></script>
	<!--  Date picker -->
	<link rel="stylesheet" href="css/jquery-ui.css">
	<script src="js/jquery-ui.js"></script>
	<!-- CSS -->
	<link rel="stylesheet" href="css/reset.css" type="text/css"	media="screen">
	<link rel="stylesheet" href="css/style.css" type="text/css"	media="screen">
	<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/style-marcacao.css" type="text/css" media="screen">
<!--[if lt IE 7]> 
	  <div style=' clear: both;  height: 59px; padding:0 0 0 15px; position: relative;'> 
	  <a  href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
	  <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg"  border="0" height="42" width="820" alt="You are using an outdated browser. For a  faster, safer browsing experience, upgrade for free today." /></a></div>  
<![endif]-->
<!--[if lt IE 9]> 
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
	<script type="text/javascript" src="js/html5.js"></script>
  <![endif]-->
</head>
<body id="page5">
	<!-- header -->
	<header>
		<div id="header">
        	<?php include "inc/topo.php"; ?>
            <div class="clear"></div>
		</div>
	</header>
	<!-- content -->
	<section id="content">
		<div class="container_24 main_width">
			<div class="wrapper">
				<div class="grid_16 prefix_1" style="width: auto;">
					<span class="tituloPag">Marcação de consulta (exames)</span>
					<p
						style="color: #00B9C8; font-weight: normal; text-transform: uppercase; padding: 5px 0px 0px 3px; font-size: 14px; margin: 0px;">SPEEDX
						RADIOLOGIA</p>
					<div class="wrapper">
						<div class="map" style="padding-top: 14px;">

							<img src='images/marcacao.png'>
						</div>
					</div>
				</div>
				<div class="grid_6 prefix_1" style="width: 470px; padding-left: 80px;">
					<h4>Agende seu exame</h4>
					<p style="margin: 0px; padding: 0px; color: #999;">A data e horário solicitados serão previamente confirmados em um prazo máximo de 24h, nos seguintes dias e horários: Segunda a sexta das 8h às 18h.</p>
					<form action="" method="post" id="frmMarcacao">
					<h5 align="center" id='resposta' class="resposta"></h5>
						<fieldset>
							<legend>Dados Pessoais</legend>
							
							<label>Nome * <span>Seu nome</span> 
								<input name="txtNome" type="text" size="30" maxlength="50" required />
							</label> 
							
							<label>CPF * <span>Paciente ou responsável</span> 
								<input name="txtCpf" type="text" size="30" maxlength="50" required onkeyup="maskIt(this,event,'###.###.###-##')" />
							</label> 
							
							<label>Telefone *
								<input name="txtTel" type="text" size="15" maxlength="15" required onkeyup="maskIt(this,event,'(##) ####-####')"/>
							</label> 
							
							<label>E-mail *<span>Email válido</span>
								<input name="txtEmail" type="email" size="20" maxlength="30" required />
							</label> 
							
							<label>Marcação 
								<select name="marcacao" id="marcacao" required='required' >
									<option value="" selected="selected">-- Selecione</option>
									<option value="1">Convênio</option>
									<option value="2">Particular</option>
								</select>
							</label> 
							<!-- Marcação = convênio -->
							<div id='div_convenio' style="display: none;">
							
									<label for="nmdoutor">Nome do doutor
										<input type='text' name="nmdoutor1" id='nmdoutor1'>
									</label>
									
									<label for="crodoutor">CRO
										<input type='text' name="crodoutor1" id='crodoutor'>
									</label>
									
									<label for="nmconv">Nome convênio
										<input type='text' name="nmconv" id='nmconv'>
									</label>
									
									<label for="nmplano">Plano
										<input type='text' name="nmplano" id='nmplano'>
									</label>
									
									<label for="nrcarteirinha">Número da carteira
										<input type='text' name="nrcarteirinha" id='nrcarteirinha'>
									</label>
							</div>
							<!-- Marcação = particular -->
							<div id='div_particular' style="display: none;">
							
									<label for="nmdoutor2">Nome do doutor
									<input type='text' name="nmdoutor2" id='nmdoutor2'></label>
									
									<label for='crodoutor2'>CRO
									<input type='text' name="crodoutor2" id='crodoutor2'></label>
									
									<label for='teldoutor'>Telefone do doutor
									<input type='text' name="teldoutor" id='"teldoutor"' onkeyup="maskIt(this,event,'(##) ####-####')"></label>
							</div>
						</fieldset>
						<fieldset style="margin-top: 20px;">
							<legend>Dados do Exame</legend>
							<label> Tipo de exame* 
							<select name="idexame" id="idexame" required="required">
								<option value="">-- Selecione</option>
								<option value="1">Tomografia computadorizada por feixe cônico (Cone beam)</option>
								<option value="2">Tru-Pan</option>
								<option value="3">Panorâmica</option>
								<option value="4">Documentação ortodôntica</option>
								<option value="5">Levantamento Periapical (Boca Toda)</option>
								<option value="6">Outros</option>
	                		</select>
							</label> 
							<label>Data<span>Informe a data válida</span>
								<input name="data" id='data' type="text" size="10" onkeyup="maskIt(this,event,'##/##/####')" />
							</label>
							<label> Horário preferencial 
							<select required name="txtHorario" class="Imput_Form" id="txtHorario">
									<option selected="selected" value="">--</option>
									<option value="8:00 às 10:00">8:00 às 10:00</option>
									<option value="10:00 às 12:00">10:00 às 12:00</option>
									<option value="12:00 às 14:00">12:00 às 14:00</option>
									<option value="14:00 às 16:00">14:00 às 16:00</option>
									<option value="16:00 às 18:00">16:00 às 18:00</option>
							</select>
							</label> 
							<label>Observa&ccedil;&atilde;o<br> 
								<textarea name="txtMensagem" cols="20" rows="4"></textarea>
							</label>
						</fieldset>
						
						<input type="submit" name="Enviar" id="btnSubmit" style="width: auto;" value="Enviar pedido de agendamento"  />
					</form>
					<div id="datepicker"></div>
				</div>
			</div>
		</div>
	</section>
	<?php include "inc/rodape.php"; ?>
<script src='js/marcacao.js'></script>
</body>
</html>