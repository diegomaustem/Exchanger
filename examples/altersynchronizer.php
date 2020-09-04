<?php

include_once 'conection.php';

          $sql = $conn->prepare( "SELECT * FROM URLS as A JOIN URLS_ACTUAL as B on A.id = B.id_a");
          $sql->execute();
              #Url compõe o arquivo do servidor como referência para realizar a atualização: 
              $cont = 0;
              while($variavel=$sql->fetch(PDO::FETCH_ASSOC)){

                $url = $variavel["url"];
                $id_old = $variavel["id"];
                $urls_actual = $variavel["urlatual"];
                $id_atual = $variavel["id_a"]; 
                $urlsyn = $variavel["nome"]; 

                if($id_old = $id_atual){

                    $path = ("$url"); 
                    $xml_current = file_get_contents("$path"); 

                    $xml_current = "";
                    $handle = fopen("$path", "r"); 
                    while (!feof($handle)) { $xml_current .=fgets($handle);}
                    fclose($handle);

                    #Verificar:
                    $pathsyn = "$urlsyn"; 
                    $link =  "C:/xampp/htdocs/exchanger/examples/archives/".$urlsyn.".xml"; 
                    #Motando o link de acesso: 

                    $arq = fopen("$link","w"); 
                    $write = fwrite($arq,$xml_current);
                    fclose($arq);
                }
                
                $cont = $cont + 1;

          }

        /* $path = ("$url"); 
          $xml_current = file_get_contents("$path"); 

          $xml_current = "";
          $handle = fopen("$path", "r"); 
          while (!feof($handle)) { $xml_current  .=fgets($handle);}
          fclose($handle); 
          

          # Resgatando URL do arquivo atual, para ser atualizado. 
          $sqlsyn = $conn->prepare("SELECT * FROM urls_actual ORDER BY id DESC LIMIT 1");
          $sqlsyn->execute();

              while($variavelsyn=$sqlsyn->fetch(PDO::FETCH_ASSOC)){

                $urlsyn = $variavelsyn["nome"];  

              }

           $pathsyn = "$urlsyn"; 
           $link =  "C:/xampp/htdocs/Android17/examples/archives/".$urlsyn.".xml"; 
           #Motando o link de acesso: 

           $arq = fopen("$link","w"); 
           $write = fwrite($arq,$xml_current);
           fclose($arq); */ 

?>