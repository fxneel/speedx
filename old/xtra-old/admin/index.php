<?php 
include '../../old/xtra-old/checa.phpns/checa.php';
$usuario = $_SESSION["usuario"]; 
date_default_timezone_set("Brazil/East");
?>
<!DOCTYPE html>
<html>
<head>
<title>Site Speedx - �rea do administrador</title>
<meta charset="iso-8859-1">
<link rel="stylesheet" href="../includes/css/estilo.css">
</head>
<body>
	<div id="master">
<?php include "../../xtra-old/admin/inc/topo.php";?>
<?php incxtra-old "inc/menu.php";?>
			<section id="conteudo" style="text-align: center;">
			<header>
				<h2>Bem vindo Sr. <?php echo $usuario;?></h2>
				<small><?php echo date('d/m/Y'); ?> </small>
			</header>

			<article>
				Login efetuado com sucesso!<br> <br>Utilize a barra de menu para ter
				acesso as funcionalidades do sistemas.
			</article>
			<footer> Acesso em <?php echo date('H:i:s'); ?></footer>
		</section>
<?php incxtra-old "inc/footer.php";?>
	</div>
</body>
</html>