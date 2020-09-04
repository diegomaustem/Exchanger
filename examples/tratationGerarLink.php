<?php

include_once 'conection.php';
include_once 'read.php';

#Quando o botão for clicado: 
$Send = filter_input(INPUT_POST, 'btn-outher', FILTER_SANITIZE_STRING);
#Chega se o botão foi clicado:
if($Send){
    #Se o botão for clicado, é passado o valor dos resultados passados nos inputs:
    $models = filter_input(INPUT_POST, 'select', FILTER_SANITIZE_STRING);
    $url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_STRING);
    $cod_model = filter_input(INPUT_POST, 'cod-model', FILTER_SANITIZE_STRING);
    $name_archive = filter_input(INPUT_POST, 'name_archive', FILTER_SANITIZE_STRING);
    #Estabelece a consulta na tabela dice e armazena o resultado da consulta no sql:  
 	$sql = $conn->prepare ("SELECT cod,sourcee FROM dice");
    $sql->execute();
    #Percorre o array com os dados da consulta: 
    while($variavel=$sql->fetch(PDO::FETCH_ASSOC) ){
        #Faz a verificação se o código do modelo armazenado é igual ao´que foi inserido no input: 
    	if($cod_model == $variavel['cod']){
             #Faz a inserção na tabela urls caso o IF acima seja verdadeiro: 
   			 $sqltwo = "INSERT INTO urls (url,nome_archive) VALUES (:url,:name_archive)";
    		 $insert = $conn->prepare($sqltwo);
             #Faz a inserção dos valores passando as referências abaixo: 
    		 $insert->bindParam(':url', $url);
    		 $insert->bindParam(':name_archive',$name_archive);
    		    
			    if($insert->execute()){
			        echo " Sucesso"; #$_SESSION['msg'] = "<p style='color:green;'>Arquivo armazenado!</p>";
			        header("Location: Listarlinks.php");
			    }else{
			        $_SESSION['msg'] = "<p style='color:red;'>Ocorreu um erro!</p>";
			        echo " Errado";#header("Location: index.php");
			    } 
    	}else{
    		echo "Codigo Invalido";
            header("Location: gerarlink.php");
    	}


    }
    
}

?>