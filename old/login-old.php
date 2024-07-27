<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<meta charset="utf-8">
<link rel="stylesheet" href="xtra/includes/css/formLogin.css">
</head>
<body>
    <a href="#" class="fechar" style="float: right;"><img src='images/btFechar.png' border='0'></a>
	<fieldset id='login'>
		<img src='xtra/includes/img/2.jpg'>
		<form action="xtra/includes/actions/login.php" method="post">
			  <label>Login <span> Nome de usuário</span> 
			    <input type='text'
				name='nome' required='required'>
		      </label> 
			  <label>Senha <span> Senha
			    de acesso</span>
			    <input type='password' name='senha'
				required='required'>
		      </label> 
			  <a href='cadastro.php'>
		      <input
				type='button' id='btCadastro' value='Cadastrar'>
		      </a> 
			  <input type='submit'  value='Acessar' id='btnSubmit'/>
		</form>
        <span style="color:#999999; font-family:Verdana, Geneva, sans-serif; font-size:9px; font-style:normal; text-align:justify; padding:5px;position: relative; display: inline-block; ">Pacientes em caso de dúvidas e/ou  problemas de acesso entrar em contato com nossa Central de Atendimento (11) 4587-4222</span>
	</fieldset>
	<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
	<script type="text/javascript">
	$( document ).ready(function() {
		
		$('.fechar').click(function(ev){
			ev.preventDefault();
			$("#stylized").remove(); // Remove html inserido, atualizando dinamicamente o html (no remover esta linha)
			$("#mascara").hide();
			$(".window").hide();
		});
		
	function OnFormSubmit() {
			myForm = 'document.frmLogin';
			if (!RequiredFields(eval(myForm), 'txtLogin, Nome de usuário','txtSenha, Senha')){
			return;
		}
		if (!ConfirmPassword(eval(myForm).txtSenha)) 
		return;
		eval(myForm).submit();
	};
		function recuperarSenha(){
		myForm = document.forms['frmLogin'];
		if (myForm.txtLogin.value == ''){
			alert("Favor informar seu nome de usuario.");
		} else{
			window.location.href = "inc/recupera_senha.php?txtLogin=" + myForm.txtLogin.value; 
		}
	};
	});
	</script>
</body>
</html>