<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="crudprof.css">
    <title>Document</title>
</head>
<body>


<?php
##permite acesso as variaves dentro do aquivo conexao
require_once('../conexao.php');




##cadastrar
if(isset($_GET['cadastrar'])){
        ##dados recebidos pelo metodo GET
        $nome = $_GET["nome"];
        $idade = $_GET["idade"];
        $endereco = $_GET["endereco"];
        $datanascimento = $_GET["datanascimento"];
        $estatus = $_GET["estatus"];
        $cpf = $_GET["cpf"];
        $siape = $_GET["siape"];

        ##codigo SQL
        $sql = "INSERT INTO professor(nome,endereco,idade, datanascimento,cpf, siape, estatus) 
                VALUES('$nome','$endereco',$idade,'$datanascimento','$cpf', '$siape', '$estatus')";

        ##junta o codigo sql a conexao do banco
        $sqlcombanco = $conexao->prepare($sql);

        ##executa o sql no banco de dados
        if($sqlcombanco->execute())
            {
                echo " <p><strong>OK!</strong> o professor
                $nome foi Incluido com sucesso!!!</p>"; 
                echo " <button class='button'><a href='../index.php'>voltar</a></button>";
            }
        }
#######alterar
if(isset($_POST['update'])){


    ##dados recebidos pelo metodo POST
    $id=  $_POST["id"];
    $nome = $_POST["nome"];
    $endereco = $_POST["endereco"];
    $idade = $_POST["idade"];
    $datanascimento = $_POST["datanascimento"];
    
    $cpf = $_POST["cpf"];
    $siape = $_POST["siape"];

   
      ##codigo sql
    //$sql = "UPDATE  professor SET nome= :nome, idade= :idade, endereco= :endereco, datanascimento= :datanascimento, cpf= :cpf, SIAPE= :SIAPE WHERE id= :id ";
   
    $sql = "UPDATE  professor SET nome= :nome, idade= :idade, endereco= :endereco, datanascimento= :datanascimento, cpf= :cpf, siape= :siape WHERE id= :id ";
   
    ##junta o codigo sql a conexao do banco
    $stmt = $conexao->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $stmt->bindParam(':id',$id, PDO::PARAM_INT);
    $stmt->bindParam(':nome',$nome, PDO::PARAM_STR);
    $stmt->bindParam(':idade',$idade, PDO::PARAM_INT);
    $stmt->bindParam(':endereco',$endereco, PDO::PARAM_STR);
    $stmt->bindParam(':datanascimento',$datanascimento, PDO::PARAM_STR);
    $stmt->bindParam(':cpf',$cpf, PDO::PARAM_STR);
    $stmt->bindParam(':siape',$siape, PDO::PARAM_STR);
    $stmt->execute();
 


    if($stmt->execute())
        {
            echo " <p> <strong>OK!</strong> o professor
             $nome foi Alterado com sucesso!!!</p>"; 

            echo " <button class='button'><a href='listaprof.php'>voltar</a></button>";
        }

}        


##Excluir
if(isset($_GET['excluir'])){
    $id = $_GET['id'];
    $sql ="DELETE FROM `professor` WHERE id={$id}";
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->execute())
        {
            echo "<p> <strong>OK!</strong> o professor
             $id foi excluido!!!</p>"; 

            echo " <button class='button'><a href='listaprof.php'>voltar</a></button>";
        }

}

        
?>

</body>
</html>