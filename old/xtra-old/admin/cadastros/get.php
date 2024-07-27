<?php
include '../../xtra-old/includes/actions/conexao.php;
abre();

	$page 				= isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows 				= isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$sort 				= isset($_POST['sort']) ? strval($_POST['sort']) : 'a.id_cadastro';
	$order 				= isset($_POST['order']) ? strval($_POST['order']) : 'asc';
	$nome 	   			= isset($_POST['nm_cad']) ? mysql_real_escape_string($_POST['nm_cad']) : '';
	$id_tipo_cliente    = isset($_REQUEST['id_tipo']) ? $_REQUEST['id_tipo'] : 0;	
	$nome 				= utf8_decode($nome);
	$offset 			= ($page-1)*$rows;
	$result 			= array();
	$where 				= "a.id_cadastro = b.id_cadastro AND a.nm_cad like '$nome%' AND a.id_status = 1";
	
	if ($id_tipo_cliente > 0){
		$where .= " AND a.id_tipo_cad = ". $id_tipo_cliente;
	}
	
	// Contagem de linhas
	$rs 			 = mysql_query("select count(*) from tab_cadastro a, tab_usuario b where " . $where);
	$row 			 = mysql_fetch_row($rs);
	$result["total"] = $row[0];
	
	// Query	
	$sql   		  = "select * from tab_cadastro a, tab_usuario b where " . $where ." order by $sort $order limit $offset,$rows";
	$rs 		  = mysql_query($sql);
	$items  	  = array(); 
	
	
	while($row = mysql_fetch_object($rs)) {
		array_push($items, $row);
		foreach($row as $key => $value) {
			if (!is_null($value)) {
				$row->$key = utf8_encode($value);
			}
		}
	} 
	
	$result["rows"] = $items;
	
	echo json_encode($result);
	
	fecha();
?>