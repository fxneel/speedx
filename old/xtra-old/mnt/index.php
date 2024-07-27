<?php 
include '../../old/xtra-old/checa.phpns/checa.php';
$usuario = $_SESSION["usuario"]; 
?>
<!DOCTYPE html>
<html>
<head>
<title>Site Speedx - Resultado de exames</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../includes/css/estilo.css">
</head>
<body>
	<div id="master">
<?php include "../../xtra-old/mnt/inc/topo.php";?>
<?php incxtra-old "inc/menu.php";?>
			<section id="conteudo" style="text-align: center;">
			<header>
				<h2>Bem vindo Sr. <?php echo $usuario;?></h2>
				<small><?php echo date('d/m/Y'); ?> </small>
			</header>

			<article>
				Login efetuado com sucesso!<br> Utilize a barra de menu para ter
				acesso as funcionalidades do sistemas.
			</article>
			<footer> Acesso em: 10/05/2014 </footer>
		</section>
<?php incxtra-old "inc/footer.php";?>
	</div>
</body>
</html>