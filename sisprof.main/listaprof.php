<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <link rel="stylesheet" href="listaprof.css">
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

   
  $retorno = $conexao->prepare('SELECT * FROM professor');
  $retorno->execute();

?>       
    
        <div class="container">
        <table class="table ">
  <thead>
    <tr>
    <th scope="col">ID</th>
      <th scope="col">NOME</th>
      <th scope="col">ENDEREÇO</th>
      <th scope="col">IDADE</th>
      <th scope="col">DATA DE NASCIMENTO</th>
      <th scope="col">STATUS</th>
      <th scope="col">CPF</th>
      <th scope="col">SIAPE</th>
      <th scope="col"></th>
      <th scope="col"></th>
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
                            <td> <?php echo $value['estatus']?> </td>
                            <td> <?php echo $value['cpf']?>  </td>  
                            <td> <?php echo $value['siape']?>  </td>  
                            <td>
                               <form method="POST" action="altprof.php">
                                        <input name="id" type="hidden" value="<?php echo $value['id'];?>"/>
                                        <button name="alterar"  type="submit">Alterar</button>
                                </form>

                             </td> 

                             <td>
                             <form method="GET" action="crudprof.php" onsubmit="return myFunction();">
    <input name="id" type="hidden" value="<?php echo $value['id'];?>"/>
    
    <script>
        function myFunction() {
            var r = confirm("Pressione o botão OK ou Cancelar");
            if (r == true) {
                // O usuário pressionou OK, (excluir aluno)
                return true;
            } else {
                // O usuário pressionou Cancelar, (aluno não será excluído)
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
   echo "<button class='button3' id='voltar'><a href='../index.php';
   '>voltar</a></button>  ";
?>
</div>

    </body>
    </html>