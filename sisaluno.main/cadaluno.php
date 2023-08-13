<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadaluno.css">
    <title>CADASTRO ALUNO</title>
</head>
<body>
 
   <div class="container">
   
  <form method="GET" action="crudaluno.php">
    <label for="">Nome</label>
     <input type="text" name="nome" required maxlength="100">

     <label for="">Endereço</label>
     <input type="text" name="endereco" required maxlength="80">

     <label for="">Idade</label>
     <input type="number" name="idade" required max="100"> 

     <label for="">Data de Nascimento</label>
     <input type="date" name="datanascimento" required>
   
      
     <label for="" >Matricula</label>
     <input type="text" name="matricula" required max="11">
<div class="botao1">
     <input type="submit" name="cadastrar" value="cadastrar" class="botao">
     </div>
     </form>
     
     <div class="botao2">
     <button class="botaovoltar"><a href="../index.php">voltar</a></button>
     </div>
     </div>

</body>
</html>