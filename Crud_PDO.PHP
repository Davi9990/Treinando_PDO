<?php

//---------------------CONEXÃO--------------------\\
try{
    $pdo = new PDO("mysql:dbname=CRUDPDO;host=localhost","root","");
}catch(PDOException $e)
{
    echo "Error com banco de dados: ". $e->getMessage();
}
catch(Exception $e){
    echo "Error generico: ".$e->getMessage();
}

//-------------INSERT-----------------------\\

// 1 Forma:
//$res = $pdo->prepare("INSERT INTO Pessoa(nome,telefone,email) VALUES (:n, :t,:e)");

/*
//Aceita variaveis e funções e valores passados diretamente
$res->bindValue(":n","Vivo_Lixo_Pano");
$res->bindValue(":t","585858858");
$res->bindValue(":e","Vivo@gmail.com");
$res->execute();
*/

//Aceita valores variaveis, mas não aceita valores passados diretamente
//$res->bindParam(":n","");


//2 Forma:
//$pdo->query("INSERT INTO Pessoa(nome,telefone,email) VALUES ('Porra','99999','Porra@gmail.com')");

//---------------------DELETE E UPDATE -------------------\\

/*
$res = $pdo->prepare("DELETE FROM Pessoa WHERE id = :id");
$id = 2;
$res ->bindValue(":id",$id);
$res->execute();
*/

//$res = $pdo->query("DELETE FROM Pessoa WHERE id = '3'");

$cmd = $pdo->prepare("UPDATE Pessoa SET email = :e WHERE id = :id");

$cmd->bindValue(":e","Cuzao@gmail.com");
$cmd->bindValue(":id", 1);
$cmd->execute();
?>