<?php
include '../../xtra-old/includes/actions/checa.php;
$usuario = $_SESSION ["usuario"];
?>
<!DOCTYPE html>
<html>
<head>
<title>Site Speedx - Resultado de exames</title>
	<meta charset="iso-8859-1">
	<link rel="stylesheet" type="text/css" href="../includes/css/easyui.css">
	<link rel="stylesheet" type="text/css" href="../includes/css/icon.css">
	<link rel="stylesheet" type="text/css" href="../includes/css/demo.css">
	<link rel="stylesheet" href="../includes/css/estilo.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
	<script type="text/javascript" src="../includes/js/jquery.easyui.min.js"></script>
	<script type="text/javascript">
		var url;
		function novo(){
			$('#dlg').dialog('open').dialog('setTitle','New User');
			$('#fm').form('clear');
			url = 'exames/save.php';
		}
		
		function editar(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Edit User');
				$('#fm').form('load',row);
				url = 'exames/update.php?id='+row.id_tipo_exame;
			}
		}
		
		function salvar(){
			$('#fm').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#dlg').dialog('close');		// close the dialog
						$('#dg').datagrid('reload');	// reload the user data
					} else {
						$.messager.show({
							title: 'Error',
							msg: result.msg
						});
					}
				}
			});
		}
		
		function remover(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirmacao','Tem certeza que deseja remover?',function(r){
					if (r){
						$.post('exames/remove.php',{id:row.id_tipo_exame},function(result){
							if (result.success){
								$('#dg').datagrid('reload');	// reload the user data
							} else {
								$.messager.show({	// show error message
									title: 'Error',
									msg: result.msg
								});
							}
						},'json');
					}
				});
			}
		}

	    function pesquisar(){
	        $('#dg').datagrid('load',{
	        	nm_tipo_exame: $('#nm_tipo_exame').val()
	        });
	        $('#dg').datagrid('reload');
	      }
	</script>
</head>
<body>
	<div id="master">
<?php include "i../../xtra-old/admin/inc/topo.php;?>
<?php incxtra-old "inc/menu.php";?>
			<section id="conteudo" style="text-align: center;">
			<header>
				<h2>Exames</h2>
				<small><?php echo date('d/m/Y'); ?> </small>
			</header>
			<article>
			<table id="dg" title="Dados cadastrais" class="easyui-datagrid" style="width:800px;height:250px" url="exames/get.php"
			toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
				<th field="nm_tipo_exame" width="20">Tipo de exame</th>
				<th field="nm_descricao" width="50">Descricao</th>
			</tr>
		</thead>
	</table>
	
	<div id="toolbar">
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="novo()">Novo</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editar()">Editar</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="remover()">Remover</a>
		<span style="padding-left: 250px">
		 Tipo de exame &nbsp;<input id="nm_tipo_exame" style="line-height:26px;border:1px solid #ccc">
		<a href="#" class="easyui-linkbutton" plain="true" iconCls="icon-search" onclick="pesquisar()">Pesquisar</a>
		</span>
	</div>
	
	<div id="dlg" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px" closed="true" buttons="#dlg-buttons">
		<div class="ftitle">Informa��o</div>
		<form id="fm" method="post" novalidate>
			<div class="fitem">
				<label>Tipo de exame:</label>
				<input name="nm_tipo_exame" class="easyui-validatebox" required="true">
			</div>
			<div class="fitem">
				<label>Descri��o:</label>
				<input name="nm_descricao" class="easyui-validatebox" required="true">
			</div>
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="salvar()">Salvar</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancelar</a>
	</div>
			</article>
			<footer>  Acesso em <?php echo date('H:i:s'); ?></footer>
		</section>
<?php incxtra-old "inc/footer.php";?>
	</div>
</body>
</html>