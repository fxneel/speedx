<?php
include '../../old/xtra-old/checa.phpns/checa.php';
$usuario = $_SESSION ["usuario"];
include '../../xtra-old/includes/actions/conexao.php;
abre();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Site Speedx - Resultado de exames</title>
	<meta charset="iso-8859-1">
	<link rel="stylesheet" type="text/css" href="../includes/css/easyui.css">
	<link rel="stylesheet" type="text/css" href="../includes/css/icon.css">
	<link rel="stylesheet" type="text/css" href="../includes/css/demo.css">
	<link rel="stylesheet" href="../includes/css/estilo.css">
	<script type="text/javascript" src="../includes/js/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="../includes/js/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="../includes/js/mascaras.js"></script>
	<script type="text/javascript">
		var url;
		function novo(){
			$('#dlg').dialog('open').dialog('setTitle','New User');
			$('#fm').form('clear');
			
			// Preencha os comboboxs.
		    $('#combo_saudacao').combobox({
			        url:'cadastros/combos/saudacao.php',
			        valueField:'id',
			        textField:'nome',
			        required:true,
			        editable:false,
			        panelHeight:'auto'
		    });

		    $('#combo_categ').combobox({
			        url:'cadastros/combos/categoria.php',
			        valueField:'id',
			        textField:'nome',
			        required:true,
			        editable:false,
			        panelHeight:'auto'
			});
		
		    $('#combo_uf').combobox({
			        url:'cadastros/combos/uf.php',
			        valueField:'id',
			        textField:'nome',
			        required:true,
			        editable:false,
			        panelHeight:'auto'
		    });
	
		    $('#combo_perfil').combobox({
			        url:'cadastros/combos/perfil.php',
			        valueField:'id',
			        textField:'nome',
			        required:true,
			        editable:false,
			        panelHeight:'auto'
	     	});
		     
		    $('#combo_status').combobox({
			        url:'cadastros/combos/status.php',
			        valueField:'id',
			        textField:'nome',
			        required:true,
			        editable:false,
			        panelHeight:'auto'
		    });

		    url = 'cadastros/save.php';
		}
		
		function editar(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Editar Usu�rio');
				$('#fm').form('load',row);

				// Preencha os comboboxs.
			    $('#combo_saudacao').combobox({
				        url:'cadastros/combos/saudacao.php?id_saudacao='+row.id_saudacao,
				        valueField:'id',
				        textField:'nome',
				        required:true,
				        editable:false,
				        value: '-- Selecione',
				        panelHeight:'auto'
			     });

			    $('#combo_categ').combobox({
				        url:'cadastros/combos/categoria.php?id_cat='+row.id_tipo_cad,
				        valueField:'id',
				        textField:'nome',
				        required:true,
				        editable:false,
				        value: '-- Selecione',
				        panelHeight:'auto'
				});
				
			    $('#combo_uf').combobox({
				        url:'cadastros/combos/uf.php?iduf='+row.id_uf,
				        valueField:'id',
				        textField:'nome',
				        required:true,
				        editable:false,
				        value: '-- Selecione',
				        panelHeight:'auto'
			     });

			    $('#combo_perfil').combobox({
				        url:'cadastros/combos/perfil.php?perfil='+row.id_perfil,
				        valueField:'id',
				        textField:'nome',
				        required:true,
				        editable:false,
				        value: '-- Selecione',
				        panelHeight:'auto'
		     	});
			     
			    $('#combo_status').combobox({
				        url:'cadastros/combos/status.php?status='+row.id_status,
				        valueField:'id',
				        textField:'nome',
				        required:true,
				        editable:false,
				        value: '-- Selecione',
				        panelHeight:'auto'
			     });

				url = 'cadastros/update.php?id='+row.id_cadastro;
			}
		}
		
		function salvar(){
			$('#fm').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					// Debug
					// alert(result);
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
						$.post('cadastros/remove.php',{id:row.id_cadastro},function(result){
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
	        	nm_cad: $('#nm_cad').val(),
	        	id_tipo: $('#id_tipo').find('option:selected').val()
	        	
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
				<h2>Cadastro de contatos</h2>
				<small><?php echo date('d/m/Y'); ?> </small>
			</header>
			<article>
			<table id="dg" title="Painel de informa��es" class="easyui-datagrid" style="width:850px;height:300px" url="cadastros/get.php"
			toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
				<th field="nm_cad" width="50">Nome</th>
				<th field="nm_endereco" width="50">Endere�o</th>
				<th field="nm_cidade" width="50">Cidade</th>
				<th field="nr_tel_fix" width="50">Telefone</th>
				<th field="nr_tel_cel" width="50">Celular</th>
				<th field="nm_email" width="50">Email</th>
			</tr>
		</thead>
	</table>
	
	<div id="toolbar">
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="novo()">Novo</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editar()">Editar</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="remover()">Remover</a>
		<span style="padding-left:170px;">
		Nome: &nbsp;<input id="nm_cad" style="line-height:26px;border:1px solid #ccc">
		Categoria: <select name="id_tipo" id="id_tipo" style="width: 100px;">
			   		 <?php
							$sql = mysql_query ( "SELECT * FROM tab_tipo_cadastro" );
							while ( $rw = mysql_fetch_array ( $sql ) ) {
					 ?>
			         <option value="<?php echo $rw['id_tipo_cad']; ?>"><?php echo $rw["nm_tipo_cad"];?></option>
			                 <?php } ?>
                </select>
    	<a href="#" class="easyui-linkbutton" plain="true" iconCls="icon-search" onclick="pesquisar()">Pesquisar</a></span>
	</div>
	
	<div id="dlg" class="easyui-dialog" style="width:400px;height:auto;padding:10px 20px" closed="true" buttons="#dlg-buttons">
		<form id="fm" method="post" novalidate>
		<div class="ftitle">Dados cadastrais.</div>
			<div class="fitem">
				<label>Nome:</label>
				<input name="nm_cad" class="easyui-validatebox" required="true" validType='length[2,50]'>
			</div>
			<div class="fitem">
				<label>Sauda��o:</label>
				<input id="combo_saudacao" name="combo_saudacao" class="easyui-combobox" >
    		</div>
			<div class="fitem">
				<label>Categoria:</label>
				<input id="combo_categ" name="combo_categ" class="easyui-combobox" >
    		</div>
    		<div class="fitem">
				<label>Endere�o:</label>
				<input name="nm_endereco" class="easyui-validatebox" required="true" validType='length[5,50]'>
			</div>
    		<div class="fitem">
				<label>Cidade:</label>
				<input name="nm_cidade" class="easyui-validatebox" required="true">
			</div>
    		<div class="fitem">
				<label>UF:</label>
				<input id="combo_uf" name="combo_uf" class="easyui-combobox" >
			</div>
    		<div class="fitem">
				<label>Cep</label>
				<input name="nr_cep" class="easyui-validatebox" required="true" onkeyup="maskIt(this,event,'##.###-###')">
			</div>
    		<div class="fitem">
				<label>Telefone:</label>
				<input name="nr_tel_fix" class="easyui-validatebox" required="true" validType='length[8,15]' onkeyup="maskIt(this,event,'(##) ####-####')">
			</div>
    		<div class="fitem">
				<label>Celular</label>
				<input name="nr_tel_cel" class="easyui-validatebox" onkeyup="maskIt(this,event,'(##) ####-####')">
			</div>
    		<div class="fitem">
				<label>Email:</label>
				<input name="nm_email" class="easyui-validatebox" required="true" validType="email">
			</div>
			<div class="ftitle">Login:</div>
			  <div class="fitem">
				<label>Usu�rio:</label>
				<input name="nm_usuario" class="easyui-validatebox" required="true">
			</div>
    		<div class="fitem">
				<label>Senha:</label>
				<input type="password" name="nm_senha" class="easyui-validatebox" required="true">
			</div>
			<div class="fitem">
				<label>Perfil:</label>
				<input id="combo_perfil" name="combo_perfil" class="easyui-combobox" >
			</div>
			<div class="fitem">
				<label>Ativo:</label>
				<input id="combo_status" name="combo_status" class="easyui-combobox" >
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
<?php fecha();?>