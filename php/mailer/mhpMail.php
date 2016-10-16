<?PHP
/**
 * © Copyright - MHP
 * Mail script om de standaard mailfunctie te vervangen. 
 */
function mailTo($to, $subject, $message, $headers=false, $from = null) {
	global $user, $pass;
	require_once('class.phpmailer.php');
	$mail		= new PHPMailer();
	
	$mail->CharSet  = 'UTF-8';
	//~ $mail->Encoding = 'quoted-printable';
	
	$body 			= preg_replace('/\[\]/',"",$message);

	$mail->IsSMTP();
	
	$mail->SMTPAuth   	= true;
	$mail->Host       		= "smtp.mijnhostingpartner.nl";
	$mail->Port       		= 25;
	$mail->Username   	= MAIL_ADDRESS;
	$mail->Password   	= MAIL_PASS;
	
	if(is_null($from)) {
		$mail->SetFrom($user);
	} else {
		$mail->SetFrom($from['email']);
	}
	
	$mail->Subject		= $subject;
	$mail->IsHTML(true);
	$mail->Body = mb_convert_encoding($body, 'ISO-8859-15', 'UTF-8');;
	
	if($headers !== false) {
		$mail->addCustomHeader($headers);
	}
	$address = $to;
	
	$mail->AddAddress($address, $address);
	

	if(!$mail->Send()) {
		return false;
	} else {
		return true;
	}
}
?>