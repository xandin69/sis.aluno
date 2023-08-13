<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <link rel="stylesheet" href="listaaluno.css">
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

   
  $retorno = $conexao->prepare('SELECT * FROM aluno');
  $retorno->execute();

?>       
    
        <div class="container">
        <table class="table">
  <thead>
    <tr>
    <th scope="col">ID</th>
      <th scope="col">NOME</th>
      <th scope="col">ENDEREÇO</th>
      <th scope="col">IDADE</th>
      <th scope="col">DATA DE NASCIMENTO</th>
      <th scope="col">MATRICULA</th>
    
    </tr>
  </thead>
  <tbody>
  <tr>
                    <?php foreach($retorno->fetchall() as $value) { ?>
                    </tr>
                        <tr>
                           <td> <?php echo $value['id']?>  </td> 
                            <td> <?php echo $value['nome']?>  </td> 
                            <td> <?php echo $value['endereco']?>  </td> 
                            <td> <?php echo $value['idade']?> </td> 
                            <td> <?php echo $value['datanascimento']?> </td>
                            <td> <?php echo $value['matricula']?>  </td>  
                            <td>
                               <form method="POST" action="altaluno.php">
                                        <input name="id" type="hidden" value="<?php echo $value['id'];?>"/>
                                        <button name="alterar"  type="submit">Alterar</button>
                                </form>

                             </td> 

                             <td>
                             <form method="GET" action="crudaluno.php" onsubmit="return myFunction();">
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