<?php 
/*
 * Desenvolvido por: Djalma Aguiar Rodrigues
 * djalma.df1@gmail.com
 * 21/12/2014
 */

	$headers 	 		= 'From:' . $_POST["txtEmail"];
	date_default_timezone_set('America/Sao_Paulo');
	
	require_once('class.phpmailer.php');
	$mail   = new PHPMailer();
	
	function valCpf($cpf){
		$cpf = preg_replace('/[^0-9]/','',$cpf);
		$digitoA = 0;
		$digitoB = 0;
		for($i = 0, $x = 10; $i <= 8; $i++, $x--){
			$digitoA += $cpf[$i] * $x;
		}
		for($i = 0, $x = 11; $i <= 9; $i++, $x--){
			if(str_repeat($i, 11) == $cpf){
				return false;
			}
			$digitoB += $cpf[$i] * $x;
		}
		$somaA = (($digitoA%11) < 2 ) ? 0 : 11-($digitoA%11);
		$somaB = (($digitoB%11) < 2 ) ? 0 : 11-($digitoB%11);
		if($somaA != $cpf[9] || $somaB != $cpf[10]){
			return false;
		}else{
			return true;
		}
	}
	
	if( !valCpf( $_POST['txtCpf'] ) ){
			echo "CPF incorreto! Por favor, Corrija e tente novamente.";
			die; // Importante! finaliza a execução do script aqui, pois senão enviará o e-mail.
	}
	
	switch ($_POST["idexame"]){
		case 1: $exame = 'Tomografia computadorizada por feixe cônico (Cone beam)';
		break;
		case 2: $exame = 'Tru-Pan';
		break;
		case 3: $exame = 'Panorâmica';
		break;
		case 4: $exame = 'Documentação ortodôntica';
		break;
		case 5: $exame = 'Levantamento Periapical (Boca Toda)';
		break;
		case 6: $exame = 'Outros';
		break;
	}
	
	// Convênio
	if( $_POST['marcacao'] == 1 ){
		
		$doutor = $_POST['nmdoutor1'];
		$cro 	= $_POST['crodoutor1'];
		$body   = file_get_contents('marcacao-convenio.html');
		
	
	// Particular
	} else {
		$doutor = $_POST['nmdoutor2'];
		$cro 	= $_POST['crodoutor2'];
		$body   = file_get_contents('marcacao-particular.html');
		
	}
	$body             = str_replace("[\\]",'',$body);
	$body             = str_replace("{nome}", $_POST["txtNome"] ,$body);
	$body             = str_replace("{cpf}", $_POST["txtCpf"] ,$body);
	$body             = str_replace("{convenio}", $_POST["nmconv"] ,$body);
	$body             = str_replace("{telefone}", $_POST['txtTel'] ,$body);
	$body             = str_replace("{email}", $_POST['txtEmail'] ,$body);
	$body             = str_replace("{data}", $_POST['data'] ,$body);
	$body             = str_replace("{exame}", $exame,$body);
	$body             = str_replace("{horario}", $_POST['txtHorario'] ,$body);
	// Novos dados.
	$body             = str_replace("{nmdoutor}", $doutor ,$body);
	$body             = str_replace("{crodoutor}", $cro ,$body);
	$body             = str_replace("{nmconv}", $_POST['nmconv'] ,$body);
	$body             = str_replace("{nmplano}", $_POST['nmplano'] ,$body);
	$body             = str_replace("{teldoutor}", $_POST['teldoutor'] ,$body);
	$body             = str_replace("{nrcarteirinha}", $_POST['nrcarteirinha'] ,$body);
	$body             = str_replace("{mensagem}", $_POST['txtMensagem'] ,$body);
	
	
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
	$mail->Subject    = "Speedx - Dados da consulta";
	$mail->AltBody    = "Para visualizar esta mensagem, ultilize um leitor de email compativel com html!"; // optional, comment out and test
	$mail->MsgHTML($body);
	$mail->AddAddress("josemussi@globo.com", "Jose Mussi");
	//$mail->AddAddress("djalma.df1@gmail.com", "Djalma Aguiar");
	
	if(!$mail->Send()) {
		$error = $mail->ErrorInfo;
		print_r($error);
	} else {
		$error = $body;
		$_POST['nome']         = "";
		$_POST['cpf']          = "";
		$_POST['convenio']     = "";
		$_POST['telefone']     = "";
		$_POST['celular']      = "";
		$_POST['email']        = "";
		$_POST['data']    	   = "";
		$_POST['exame']    	   = "";
		$_POST['horario']      = "";
		$_POST['mensagem']     = "";
		echo "1";  // Sucesso.
	}
?>
