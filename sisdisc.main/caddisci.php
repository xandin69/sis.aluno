<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="caddisci.css">
    <title>CADASTRO DISCIPLINA</title>
</head>
<body>


   <div class="container">

  
   
  <form method="GET" action="cruddisci.php">
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

     <input type="submit" name="cadastrar" value="cadastrar" class="botao">
     
     </form>
     
     <div class="botao2">
     <button class="botaovoltar"><a href="../index.php">voltar</a></button>
     </div>

     </div>

</body>
</html>