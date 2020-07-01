<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$mensagem = $_POST['mensagem'];
		
        require 'vendor/autoload.php';

        $from = new SendGrid\Email(null, "contato@alphacolorspinturas.com.br");
        $subject = "Mensagem de contato";
        $to = new SendGrid\Email(null, "contato@alphacolorspinturas.com.br");
        $content = new SendGrid\Content("text/html", "Olá AlphaColors, <br><br>Nova mensagem de contato<br><br>Nome: $nome<br>Email: $email <br>Mensagem: $mensagem");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        //Necessário inserir a chave
        $apiKey = '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';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);
        echo "Mensagem enviada com sucesso";
		
        ?>
    </body>
</html>
