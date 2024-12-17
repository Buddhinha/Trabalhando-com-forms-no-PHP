<?php 

require 'funcoes.php';

$erro = null;
$sucesso = null;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $texto = $_POST['texto'];
    //sanitização
    $texto = htmlspecialchars($texto);
    //ESPAÇOS
    $texto = trim($texto);


    //primeira validação
    if (empty($texto)) {
        $erro = "o campo texto é obrigatorio";    
    }elseif(strlen($texto)<5){
        $erro = "o texto deve obter no minimo 5 letras!";
    }elseif(strlen($texto)>15){
        $erro = "o texto deve ter no maximo 15 caracteres";
    }elseif(filter_var($texto, FILTER_VALIDATE_EMAIL) == false){
    $erro = 'E-mail invalido :<';
   }
    else{
        $sucesso = "tudo correto!";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario</title>
    <style>

    @import url('https://fonts.googleapis.com/css2?family=Inconsolata:wght@200..900&display=swap');

    body{
        font-family: 'Inconsolata', monospace;
    }

    </style>
</head>
<body>
    <h1>formulario</h1>

    <?php if(verErro($erro)) : ?>
    <p style="color:red;">
        <?=$erro?>
    </p>
    <?php endif; ?>   
    
    <?php  if(verErro($sucesso)) : ?>
        
        <p style="color:green;">
        <?=$sucesso?> 
    </p>   
    <?php endif; ?>

    <form method="post">
        <input type="text" name="texto" placeholder="Digite o texto">
        <input type="submit" value="enviar">
    </form>

</body>
</html>
