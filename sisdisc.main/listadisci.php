<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <link rel="stylesheet" href="listadisci.css">
</head>
<body>
    
</body>
</html>


<?php 
/*
 * Melhor prática usando Prepared Statements
 * 
 */
require_once('../conexao.php');

   
  $retorno = $conexao->prepare('SELECT * FROM disciplina');
  $retorno->execute();

?>       
    
        <div class="container">
        <table class="table ">
  <thead>
    <tr>
    <th scope="col">ID</th>
      <th scope="col">NOME</th>
      <th scope="col">CH</th>
      <th scope="col">SEMESTRE</th>
      <th scope="col">ID professor</th>
      <th scope="col">Nota 1</th>
      <th scope="col">Nota 2</th>
      <th scope="col">Media</th>
    </tr>
  </thead>
  <tbody>
  <tr>
    <?php foreach($retorno->fetchAll() as $value) { ?>
    <tr>
        <td> <?php echo $value['id']?>  </td> 
        <td> <?php echo $value['nomedisciplina']?>  </td> 
        <td> <?php echo $value['ch']?>  </td> 
        <td> <?php echo $value['semestre']?> </td> 
        <td> <?php echo $value['idprofessor']?> </td> 
        <td> <?php echo $value['Nota1']?> </td> 
        <td> <?php echo $value['Nota2']?> </td> 
        <td> <?php echo $value['Media']?> </td> 
   
    
                            <td>
                               <form method="POST" action="altdisci.php">
                                        <input name="id" type="hidden" value="<?php echo $value['id'];?>"/>
                                        <button name="alterar"  type="submit">Alterar</button>
                                </form>

                             </td> 

                             <td>
                             <form method="GET" action="cruddisci.php" onsubmit="return myFunction();">
    <input name="id" type="hidden" value="<?php echo $value['id'];?>"/>
    <html>
    <script>
        function myFunction() {
            var r = confirm("Pressione o botão OK ou Cancelar");
            if (r == true) {
                // O usuário pressionou OK, prosseguir com o envio do formulário (excluir aluno)
                return true;
            } else {
                // O usuário pressionou Cancelar, cancelar o envio do formulário (aluno não será excluído)
                return false;
            }
        }
    </script>
    <button name="excluir" type="submit">Excluir</button>
</form>

                             </td> 


                       
                      </tr>
                    <?php  }  ?> 
                 </tr>
            </tbody>
</table>
<?php         
   echo "<button class='button3' id='voltar'><a href='../index.php'>voltar</a></button>  ";
?>
</div>