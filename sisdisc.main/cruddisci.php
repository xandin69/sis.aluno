<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cruddisci.css">
    <title>CRUD Disciplina</title>
</head>
<body>


<?php
##permite acesso as variaves dentro do aquivo conexao
require_once('../conexao.php');



##cadastrar
if(isset($_GET['cadastrar'])){
        ##dados recebidos pelo metodo GET
        $nomedisciplina = $_GET["nomedisciplina"];
        $ch = $_GET["ch"];
        $semestre = $_GET["semestre"];
        $idprofessor = $_GET["idprofessor"];
        $Nota1 = $_GET["nota1"];
        $Nota2 = $_GET["nota2"];
        $Media = $_GET["media"];

        ##codigo SQL
        $sql = "INSERT INTO disciplina(nomedisciplina, ch, semestre, idprofessor, nota1, nota2, media) 
                VALUES('$nomedisciplina','$ch','$semestre','$idprofessor','$Nota1', '$Nota2', '$Media')";

        ##junta o codigo sql a conexao do banco
        $sqlcombanco = $conexao->prepare($sql);

        ##executa o sql no banco de dados
        if($sqlcombanco->execute())
            {
                echo " <p><strong>OK!</strong> A Disciplina
                $nomedisciplina foi Incluida com sucesso!!!</p>"; 
                echo " <button class='button'><a href='../index.php'>voltar</a></button>";
            }
        }
#######alterar
if(isset($_POST['update'])){

    ##dados recebidos pelo metodo POST
    $id = $_POST["id"];
    $nomedisciplina = $_POST["nomedisciplina"];
    $ch = $_POST["ch"];
    $semestre = $_POST["semestre"];
    $idprofessor = $_POST["idprofessor"];
    $Nota1 = $_POST["nota1"];
    $Nota2 = $_POST["nota2"];
    $Media = $_POST["media"];

    ##codigo sql
    $sql = "UPDATE disciplina SET nomedisciplina = :nomedisciplina, ch = :ch, semestre = :semestre, idprofessor = :idprofessor, Nota1 = :nota1, Nota2 = :nota2, Media = :media WHERE id = :id";

    ##junta o codigo sql a conexao do banco
    $stmt = $conexao->prepare($sql);

    ##diz o parametro e o tipo do parametro
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nomedisciplina', $nomedisciplina, PDO::PARAM_STR);
    $stmt->bindParam(':ch', $ch, PDO::PARAM_INT);
    $stmt->bindParam(':semestre', $semestre, PDO::PARAM_INT);
    $stmt->bindParam(':idprofessor', $idprofessor, PDO::PARAM_INT);
    $stmt->bindParam(':nota1', $Nota1, PDO::PARAM_STR);
    $stmt->bindParam(':nota2', $Nota2, PDO::PARAM_STR);
    $stmt->bindParam(':media', $Media, PDO::PARAM_STR);

    if($stmt->execute()){
        echo "<p> <strong>OK!</strong> A disciplina $nomedisciplina foi Alterada com sucesso!!!</p>"; 
        echo "<button class='button'><a href='listadisci.php'>voltar</a></button>";
    }

} 
##Excluir
if(isset($_GET['excluir'])){
    $id = $_GET['id'];
    $sql ="DELETE FROM `disciplina` WHERE id={$id}";
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->execute())
        {
            echo "<p> <strong>OK!</strong> A disciplina
             $id foi excluida!!!</p>"; 

            echo " <button class='button'><a href='listadisci.php'>voltar</a></button>";
        }

}

        
?>

</body>
</html>