<?php 

require 'funcoes.php';

$erro = null;
$sucesso = null; 

 $tecnologias = ["HTML","CSS","JAVASCRIPT","PHP","GO"];
 $tecnologiasValidas = ["JAVASCRIPT", "PHP","HTML"];

 $estruturaDoBanco = [
    ['codigo' => 'HTML', 'nome' => 'HTML'],
    ['codigo' => 'CSS', 'nome' => 'CSS'],
    ['codigo' => 'JAVASCRIPT', 'nome' => 'JAVASCRIPT'],
    ['codigo' => 'rn', 'nome' => 'REACT NATIVE'],
    ['codigo' => 'PHP', 'nome' => 'PHP']
 ];

 $estruturaDaApi = [
    'html'=>'HTML',
    'css'=>'CSS',
    'javascript'=>'JAVASCRIPT',
    'rn'=>'REACT NATIVE',
    'php'=>'PHP'
 ]; 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(empty($_POST['tecnologia'])){
     $erro = "envie uma tecnologia";    
    }
    $opçoes = $_POST['tecnologia'] ?? [];
    //var_dump($opçoes);
    if(count($opçoes) != 1){
        $erro = "selecione 1 tecnologia";
    }
    if($opçoes[0] != 'HTML'){
        $erro = "selecione uma opção valida";
    }

    if(empty($erro)){
        $sucesso = "tudo certo pode prosseguir";
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
    <?php foreach($estruturaDoBanco as $tec): ?>    

    <label for="tecnologia1"><?=$tec['codigo'];?></label>
    <input type="checkbox" name="tecnologia[]" value="<?=$tec['nome'];?>"
    <?php if(isset($opçoes) && in_array($tec['nome'],$opçoes))echo"checked"?>>
    
    <hr/>

    <?php endforeach; ?>    
    <input type="submit" value="enviar">
    </form>
    
</body>
</html>
