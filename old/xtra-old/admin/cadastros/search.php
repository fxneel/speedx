<?php
include '../../xtra-old/includes/actions/conexao.php;
abre();

$aJson = array(
		'rows' => array(
				array(
						'nome' => 'Amanda',
						'sobrenome' => 'Clark',
						'telefone' => '(11) 1111-1111'
				),
				array(
						'nome' => 'Steve',
						'sobrenome' => 'Jobs',
						'telefone' => '(11) 2222-2222'
				),
				array(
						'nome' => 'Bill',
						'sobrenome' => 'Gates',
						'telefone' => '(11) 3333-3333'
				),
				array(
						'nome' => 'Albert',
						'sobrenome' => 'Einstein',
						'telefone' => '(11) 4444-4444'
				),
		),
);
//simulando uma busca
if(isset($_POST['search_nome']) && !empty($_POST['search_nome'])) {
	foreach($aJson['rows'] as $k => $aData) {
		//echo $k. '<br />';
		if(in_array($_POST['search_nome'], $aData)) {
			$aJson = null;
			$aJson['rows'][] = $aData;
		}
	}
}
$aJson['total'] = count($aJson['rows']);
echo json_encode($aJson);

fecha();
?>