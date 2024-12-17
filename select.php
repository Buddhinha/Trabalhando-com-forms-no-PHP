<?php 

require 'funcoes.php';

$erro = null;
$sucesso = null;

 $tecnologias = ["HTML","CSS","JAVASCRIPT","PHP"];
 $tecnologiasValidas = ["JAVASCRIPT", "PHP"];

 $estruturaDoBanco = [
    ['codigo' => 'html', 'nome' => 'HTML'],
    ['codigo' => 'css', 'nome' => 'CSS'],
    ['codigo' => 'javascript', 'nome' => 'JAVASCRIPT'],
    ['codigo' => 'rn', 'nome' => 'REACT NATIVE'],
    ['codigo' => 'php', 'nome' => 'php']
 ];

 $estruturaDaApi = [
    'html'=>'HTML',
    'css'=>'CSS',
    'javascript'=>'JAVASCRIPT',
    'rn'=>'REACT NATIVE',
    'php'=>'PHP'
 ]; 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $opçoes = $_POST['opções'];
    //var_dump($opçoes);
    if(count($opçoes) != 2){
        $erro = "selecione duas opções";
    }

    foreach($opçoes as $opçao){
        if(!in_array($opçao,$tecnologiasValidas)){
            $erro = "A tecnologia $opçao não é valida.";
            break;
        }

    }

    if(empty($erro)){
        $sucesso = "tudo aconteceu com esmero";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario com select</title>

    <style>

    @import url('https://fonts.googleapis.com/css2?family=Inconsolata:wght@200..900&display=swap');

    body{
        font-family: 'Inconsolata', monospace;
    }

</style>

</head>
<body>
    <H1>formulario com select</H1> 

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

    <form method="POST">
        <select name="opções[]" multiple>

            <?php 
             foreach($tecnologias as $tec):?>
                <option value="<?=$tec;?>"><?=$tec;?></option>
            <?php endforeach; ?>
            <input type="submit" value="enviar">
        </select>


    </form>
</body>
</html>
