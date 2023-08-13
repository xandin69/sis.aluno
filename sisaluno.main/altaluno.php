<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadaluno.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <H1>Alterar Dados Alunos</H1>
<?php
    require_once('../conexao.php');


   $id = $_POST['id'];

   ##sql para selecionar apens um aluno
   $sql = "SELECT * FROM aluno where id= :id";
   
   # junta o sql a conexao do banco
   $retorno = $conexao->prepare($sql);

   ##diz o paramentro e o tipo  do paramentros
   $retorno->bindParam(':id',$id, PDO::PARAM_INT);

   #executa a estrutura no banco
   $retorno->execute();

  #transforma o retorno em array
   $array_retorno=$retorno->fetch();
   
   ##armazena retorno em variaveis
   $nome = $array_retorno['nome'];
   $endereco = $array_retorno['endereco'];
   $idade = $array_retorno['idade'];
   $datanascimento = $array_retorno['datanascimento'];
  
   $matricula = $array_retorno['matricula'];
?>

  <form method="POST" action="crudaluno.php">
        <label for="">Nome</label>
        <input type="text" name="nome" id="" value=<?php echo $nome?> required >
        <label for="">Endereco</label>                                        
        <input type="text" name="endereco" id="" value=<?php echo $endereco ?> required >
        <label for="">Idade</label>
        <input type="text" name="idade" id="" value=<?php echo $idade ?> required >
        <label for="">Data</label>
        <input type="text" name="datanascimento" id="" value=<?php echo $datanascimento ?> required >
       
      
        <label for="">Matricula</label>
        <input type="text" name="matricula" id="" value=<?php echo $matricula ?> required >
      
        <input type="hidden" name="id" id="" value=<?php echo $id ?> >
        
        <input type="submit" name="update" value="Alterar">
  </form>
  </div>
</body>
</html>