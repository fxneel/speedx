<?php
	$owner_email = $_POST["owner_email"];
	$headers 	 = 'From:' . $_POST["email"];
	$subject 	 = 'A message from your site visitor ' . $_POST["name"];
	
	date_default_timezone_set('America/Sao_Paulo');
	
	require_once('class.phpmailer.php');
	
	$mail             = new PHPMailer();
	$body             = file_get_contents('contents.html');
	$body             = str_replace("[\\]",'',$body);
    $body             = str_replace("{nome}", $_POST["name"] ,$body);
	$body             = str_replace("{telefone}", $_POST['phone'] ,$body);
	$body             = str_replace("{email}", $_POST['email'] ,$body);
	$body             = str_replace("{msg}",  $_POST['message'] ,$body);
	
	// Configurações de SMTP
	$mail->IsSMTP(); 
	$mail->Host       = "smtp.speedx.com.br"; 
	$mail->SMTPAuth   = true;    
	$mail->SMTPSecure = "tls";                               
	$mail->Port       = 587;                   
	$mail->Username   = "site@speedx.com.br";  
	$mail->Password   = "Site@speedx@10";      
	  
	// Dados do remetente
	$mail->SetFrom('site@speedx.com.br', 'Site SpeedX');
	$mail->Subject    = "Contato do site";
	$mail->AltBody    = "Para visualizar esta mensagem, ultilize um leitor de email compativel com html!"; // optional, comment out and test
	$mail->MsgHTML($body);
	$mail->AddAddress("josemussi@globo.com", "José Mussi");
	
	if(!$mail->Send()) {
	  $error = $mail->ErrorInfo;
	  print_r($error);
	} else {
	  $error = $body;
	  $_POST['nome']      = "";
	  $_POST['empresa']   = "";
	  $_POST['cpf']       = "";
	  $_POST['cargo']     = "";
	  $_POST['assunto']   = "";
	  $_POST['telefone']  = "";
	  $_POST['msg']       = "";
	}
	
	echo "<script>
		alert('Mensagem enviada com sucesso!');
		location.href='../marcacao.php';
	</script>";
?>