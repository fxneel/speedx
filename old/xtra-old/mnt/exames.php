<?php
include '../../old/xtra-old/checa.phpns/checa.php';
$usuario   = $_SESSION ["usuario"];
$strCodigo = $_SESSION["idCad"];../../old/xtra-old/conexao.phpudes/actions/conexao.php';
abre();
?>
<!DOCTYPE html>
<html>
<head>
<title>Site Speedx - Resultado de exames</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../includes/css/estilo.css">
<style type="text/css">
.button {
  display: block;
  width: 115px;
  height: 25px;
  background: #4E9CAF;
  padding: 10px;
  text-align: center;
  border-radius: 5px;
  color: white;
  font-weight: bold;
}
</style>
</head>
<body>
	<div id="master">
<?php include "../../xtra-old/mnt/inc/topo.php";?>
<?php incxtra-old "inc/menu.php";?>
			<section id="conteudo" style="text-align: center;">
			<header>
				<h2>Download de exames</h2>
				<small><?php echo date('d/m/Y'); ?> </small>
			</header>

			<article style="height: 350px;">
				Lista de exames para download:
				<div align="center" style="height: auto;">
				<ul style="padding-top: 20px; overflow: auto; width: 550px; border: 1px solid #e8e8e8;height: 300px;">
					
					<?php 
						$query 	   = mysql_query("SELECT * from files WHERE id_cadastro = ".$strCodigo);
						$total_ln  = mysql_num_rows($query);
						
						if($total_ln > 0) {
						while($row = mysql_fetch_array($query)){
					?>
					
					<li style="padding: 5px; list-style-type: none;">
					<a href="../admin/resultados/server/php/files/<?php echo $row['name'];?>" download="<?php echo $row['name'];?>" class="button" style="text-decoration: none;"><?php echo $row['name'];?></a></li>
					
					<?php } } else { echo utf8_encode('At� o momento n�o foram identificados exames para download. <br>Tente novamente mais tarde.'); }?>
				</ul>
				</div>
			</article>
			<footer> Acesso em: 10/05/2014 </footer>
		</section>
	</div>
</body>
</html>