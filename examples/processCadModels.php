<?php
session_start();
include_once 'conection.php';

$Send = filter_input(INPUT_POST, 'btn', FILTER_SANITIZE_STRING);

if($Send){

	#Recebe os dados dos inputs do formulário:
    $cod = filter_input(INPUT_POST, 'cod', FILTER_SANITIZE_STRING);
    $source = filter_input(INPUT_POST, 'source', FILTER_SANITIZE_STRING);
    $medium = filter_input(INPUT_POST, 'medium', FILTER_SANITIZE_STRING);
    $campaign = filter_input(INPUT_POST, 'campaign', FILTER_SANITIZE_STRING);

    #Faz a inserção no BD:
    $sql = "INSERT INTO dice (cod,sourcee,mediumm,campaign) VALUES (:cod,:source, :medium, :campaign)";
    $insert = $conn->prepare($sql);
    $insert->bindParam(':cod', $cod);
    $insert->bindParam(':source', $source);
    $insert->bindParam(':medium', $medium);
    $insert->bindParam(':campaign', $campaign);
    
    if($insert->execute()){
        #$_SESSION['msg'] = "<p style='color:green;'>Arquivo armazenado!</p>";
        header("Location: ../index.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red;'>Ocorreu um erro!</p>";
        #header("Location: index.php");
    } 

}else{
    $_SESSION['msg'] = "<p style='color:red;'>Ocorreu um erro!</p>";
    #header("Location: index.php");
}

?>



