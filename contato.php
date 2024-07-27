<?php include 'inc/status-skype.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Speed X Radiologia </title>
	<meta charset="utf-8">
	<meta name="author" content="Djalma Aguiar Rodrigues - djalma.df1@gmail.com" />
	<meta name="description" content="Speedx Radiologia Odontologica - Radiologia e diagnóstico por imagem. Superando expectativas e resultados." /> 
	<meta name="keywords" content="speedx, speed x radiologia odontológica, radiologia odontológica, exames, radiografia" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="application-name" content="Speedx" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<link rel='shortcut icon' href='images/logos/favicon7.ico' type='image/x-icon' />
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
	<script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/FF-cash.js"></script>     
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.js"></script>
	<script src="js/jquery.color.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/easyTooltip.js"></script>
	<script src="js/efeitos.js"></script>
	<script src="js/mascaras.js"></script>
	<script src="js/menu.js"></script>
	<link rel="stylesheet" href="css/style-contato.css" type="text/css" media="screen">
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
                	<span class="tituloPag">CONTATO</span>
                    <p style="color: #00B9C8; font-weight: normal; text-transform: uppercase; padding: 5px 0px 0px 3px; font-size: 14px; margin: 0px;">SPEEDX RADIOLOGIA</p>
                    <div class="wrapper">
						<img src='images/icone_contato.png'><br>
						<?php showSkypeButton('speedxradiologia'); ?>
                    </div>
                </div>
                <div class="grid_6 prefix_1" style="width: 350px; padding-left: 50px;">
                	<h4>Formulário para contato</h4>
                    <p style="margin: 0px; padding: 0px; color: #999;">Seu contato é muito importante para nós.</p>
                    <form id="contato" action="bin/MailHandler.php" method="post">
                        <div class="success"> Contato enviado com sucesso!<br>
                        <strong>Em breve entraremos em contato.</strong> </div>
                        <fieldset>
                           	<label>Nome * <span>Seu nome</span> 
								<input class="input" name="name" type="text" style="width: 300px;" required />
							</label> 
                           	<label>Email * <span>Seu email</span> 
								<input class="input"  name="email" type="email" style="width: 300px;" required />
							</label> 
                           	<label>Telefone * <span>Telefone principal</span> 
								<input class="input"  name="phone" type="text" style="width: 300px;" onkeyup="maskIt(this,event,'(##) ####-####')" required />
							</label> 
                            <label>Mensagem:
                                <textarea name='message'  style="width: 300px;" required></textarea>
                            </label>
                               <input type="submit" name="Enviar" id="btnSubmit"  value="Enviar Solicitação"  />
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>  
    </section>
  <?php include "inc/rodape.php"; ?>
</body>   
</html>
