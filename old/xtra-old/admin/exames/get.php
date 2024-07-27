<?php
include '../../xtra-old/includes/actions/conexao.php;
abre();

	$page 			= isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows 			= isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$sort 			= isset($_POST['sort']) ? strval($_POST['sort']) : 'id_tipo_exame';
	$order 			= isset($_POST['order']) ? strval($_POST['order']) : 'asc';
	$tipoExame 		= isset($_POST['nm_tipo_exame']) ? mysql_real_escape_string($_POST['nm_tipo_exame']) : '';
	$offset 		= ($page-1)*$rows;
	$result 		= array();
	$where 			= "nm_tipo_exame like '$tipoExame%'";
	
	$rs 			 = mysql_query("select count(*) from tab_tipo_exame  where ". $where);
	$row 			 = mysql_fetch_row($rs);
	$result["total"] = $row[0];
	$rs 		 	 = mysql_query("select * from tab_tipo_exame where " . $where ." order by $sort $order limit $offset,$rows");
	$items  	  	 = array();

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