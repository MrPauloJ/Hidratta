<?php
// Recebe dados via POST
$nome = $_POST['user_name'];
$telefone = $_POST['user_cell'];
$email = $_POST['user_mail'];
$mensagem = $_POST['user_message'];

# Formula mensagem escrita
$message ="Nome = ". $nome . "\r\n". "Telefone =".$telefone."\r\n" ."Email = " . $email . "\r\n Message =" . $mensagem; 

// Breve configs
$subject ="My email subject";
$fromname ="My Website Name";
$mailto = 'paulinhodafielserio@gmail.com';  // Email destinatário

// Transforma e divide o conteúdo em base64
$content = chunk_split(base64_encode(file_get_contents($_FILES['user_file']['tmp_name'])));

// Cria separador
$separator = md5(time());

// Definição de cabeçalho
$headers = "From: ".$fromname." <".$email."> \r\n";
$headers .= "MIME-Version: 1.0 \r\n";
$headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\""."\r\n";
$headers .= "Content-Transfer-Encoding: 7bit \r\n";
$headers .= "This is a MIME encoded message. \r\n";

// Definindo escopo da mensagem escrita
$body = "--" . $separator . "\r\n";
$body .= "Content-Type: text/plain; charset=\"iso-8859-1\""."\r\n";
$body .= "Content-Transfer-Encoding: 8bit"."\r\n";
$body .= $message."\r\n";

// Definindo escopo do anexo
$body .= "--" . $separator."\r\n";
$body .= "Content-Type: application/octet-stream; name=\"" . $_FILES['user_file']['name'] . "\""."\r\n";
$body .= "Content-Transfer-Encoding: base64"."\r\n";
$body .= "Content-Disposition: attachment"."\r\n";
$body .= $content."\r\n";
$body .= "--" . $separator . "--";

// Envia e checa seu resultado
if (@mail($mailto, $subject, $body, $headers)) {
    echo "Mail sent !";
} else {
    echo "ERROR!";
    print_r( error_get_last() );
}
?>