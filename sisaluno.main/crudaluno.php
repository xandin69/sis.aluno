<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="crudaluno.css">
    <title>Document</title>
</head>
<body>


<?php
##permite acesso as variaves dentro do aquivo conexao
require_once('../conexao.php');



##cadastrar
if(isset($_GET['cadastrar'])){
        ##dados recebidos pelo metodo GET
        $nomealuno = $_GET["nome"];
        $idadealuno = $_GET["idade"];
        $enderecoaluno = $_GET["endereco"];
        $dataaluno = $_GET["datanascimento"];
       
        $matriculaaluno = $_GET["matricula"];

        ##codigo SQL
        $sql = "INSERT INTO aluno(nome,endereco,idade, datanascimento,matricula) 
                VALUES('$nomealuno','$enderecoaluno',$idadealuno,'$dataaluno','$matriculaaluno')";

        ##junta o codigo sql a conexao do banco
        $sqlcombanco = $conexao->prepare($sql);

        ##executa o sql no banco de dados
        if($sqlcombanco->execute())
            {
                echo " <p><strong>OK!</strong> o aluno
                $nomealuno foi Incluido com sucesso!!!</p>"; 
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
    $matricula = $_POST["matricula"];
    
   
      ##codigo sql
    $sql = "UPDATE  aluno SET nome= :nome, idade= :idade, endereco= :endereco, datanascimento= :datanascimento, matricula= :matricula WHERE id= :id ";
   
    ##junta o codigo sql a conexao do banco
    $stmt = $conexao->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $stmt->bindParam(':id',$id, PDO::PARAM_INT);
    $stmt->bindParam(':nome',$nome, PDO::PARAM_STR);
    $stmt->bindParam(':endereco',$endereco, PDO::PARAM_STR);
    $stmt->bindParam(':datanascimento',$datanascimento, PDO::PARAM_STR);
   
    $stmt->bindParam(':matricula',$matricula, PDO::PARAM_STR);
    $stmt->bindParam(':idade',$idade, PDO::PARAM_INT);
    $stmt->execute();
 


    if($stmt->execute())
        {
            echo " <p> <strong>OK!</strong> o aluno
             $nome foi Alterado com sucesso!!!</p>"; 

            echo " <button class='button'><a href='listaaluno.php'>voltar</a></button>";
        }

}        


##Excluir
if(isset($_GET['excluir'])){
    $id = $_GET['id'];
    $sql ="DELETE FROM `aluno` WHERE id={$id}";
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->execute())
        {
            echo "<p> <strong>OK!</strong> o aluno
             $id foi excluido!!!</p>"; 

            echo " <button class='button'><a href='listaaluno.php'>voltar</a></button>";
        }

}

        
?>

</body>
</html>