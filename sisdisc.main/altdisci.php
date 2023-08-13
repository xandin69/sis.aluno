<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="caddisci.css">
    <title>Alterar Disciplina</title>
</head>
<body>

<?php
    require_once('../conexao.php');


   $id = $_POST['id'];

   ##sql para selecionar apens um aluno
   $sql = "SELECT * FROM disciplina where id= :id";
   
   # junta o sql a conexao do banco
   $retorno = $conexao->prepare($sql);

   ##diz o paramentro e o tipo  do paramentros
   $retorno->bindParam(':id',$id, PDO::PARAM_INT);

   #executa a estrutura no banco
   $retorno->execute();

  #transforma o retorno em array
   $array_retorno=$retorno->fetch();
   
   ##armazena retorno em variaveis
   $nomedisciplina = $array_retorno['nomedisciplina'];
   $ch = $array_retorno['ch'];
   $semestre = $array_retorno['semestre'];
   $idprofessor = $array_retorno['idprofessor'];
   $nota1 = $array_retorno['Nota1'];
   $nota2 = $array_retorno['Nota2'];
   $media = $array_retorno['Media'];
?>
<div class="container">
  <form method="POST" action="cruddisci.php">
    <label for="">Nome</label>
     <input type="text" name="nomedisciplina" required maxlength="100">

     <label for="">CH</label>
     <input type="text" name="ch" required maxlength="3">

     <label for="">Semestre</label>
     <input type="text" name="semestre" required max="5"> 
     <label for="">ID professor</label>
     <input type="text" name="idprofessor" required maxlength="100">
     <label for="">Nota 1</label>
     <input type="number" name="nota1" required max="100">
     <label for="">Nota 2</label>
     <input type="number" name="nota2" required max="100">
     <label for="">Media</label>
     <input type="number" name="media" required max="100">

     
     <input type="hidden" name="id" id="" value=<?php echo $id ?> >
        
        <input type="submit" name="update" value="Alterar">
     </form>

     </div>








  
</body>
</html>