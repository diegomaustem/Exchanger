<?php

include_once 'conection.php';

          $sql = $conn->prepare("SELECT * FROM urls ORDER BY id DESC LIMIT 1");
          $sql->execute();
              #Url compõe o arquivo do servidor como referência para realizar a atualização: 
              while($variavel=$sql->fetch(PDO::FETCH_ASSOC)){
                $url = $variavel["url"];  
              }

          $path = ("$url"); 
          $xml_current = file_get_contents("$path"); 

          $xml_current = "";
          $handle = fopen("$path", "r"); 
          while (!feof($handle)) { $xml_current  .=fgets($handle);}
          fclose($handle);

          #Resgatando URL do arquivo atual, para ser atualizado: 
          $sqlsyn = $conn->prepare("SELECT * FROM urls_actual ORDER BY id DESC LIMIT 1");
          $sqlsyn->execute();

              while($variavelsyn=$sqlsyn->fetch(PDO::FETCH_ASSOC)){
                $urlsyn = $variavelsyn["nome"];  
              }

           #Aqui é motado o link de acesso:
           $pathsyn = "$urlsyn"; 
           $link =  "C:/xampp/htdocs/Android17/examples/archives/".$urlsyn.".xml"; 
             
           $arq = fopen("$link","w"); 
           $write = fwrite($arq,$xml_current);
           fclose($arq); 
?>