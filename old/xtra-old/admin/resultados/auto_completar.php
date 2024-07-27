<?php
include '../../xtra-old/includes/actions/conexao.php;
abre();

$sort 				= isset($_POST['sort']) ? strval($_POST['sort']) : 'a.id_cadastro';
$order 				= isset($_POST['order']) ? strval($_POST['order']) : 'asc';
$nome 	   			= isset($_GET['term']) ? mysql_real_escape_string($_GET['term']) : '';
$nome 				= utf8_decode($nome);
$where 				= "a.id_cadastro = b.id_cadastro AND a.nm_cad like '%$nome%' AND a.id_status = 1";

// Query
$sql   		  = "select a.id_cadastro id, a.nm_cad nome from tab_cadastro a, tab_usuario b where " . $where ." order by $sort $order";
$rs 		  = mysql_query($sql);

//formata o resultado para JSON
$json = '[';
$first = true;
while($row = mysql_fetch_array($rs))
{
  if (!$first) { $json .=  ','; } else { $first = false; }
  $json .= '{
    		"value":"'.utf8_encode($row['id']).'", "label":"'.utf8_encode($row['nome']).'"
			}';
}
$json .= ']';
 
echo $json;

fecha();