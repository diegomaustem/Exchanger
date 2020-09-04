<?php

include_once 'conection.php';

$Send = filter_input(INPUT_POST, 'btn-outher', FILTER_SANITIZE_STRING);
if($Send){

  	#Recebe os dados do formulário:
    $url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_STRING);
    $codmodel = filter_input(INPUT_POST, 'cod-model', FILTER_SANITIZE_STRING);
    $namearchive = filter_input(INPUT_POST, 'name_archive', FILTER_SANITIZE_STRING);

    #Realiza a consulta na tabela dice quando os códigos forem de acordo: 
    $sql = $conn->prepare ("SELECT * FROM dice WHERE cod=$codmodel ");
    $sql->execute();

    	while($variavel=$sql->fetch(PDO::FETCH_ASSOC)){
	           $soucer = $variavel["sourcee"];
	           $medio = $variavel["mediumm"];
	           $campanha = $variavel["campaign"];

               $path = "$url";
               #File_get_contents é o método para ler o conteúdo de um arquivo: 
               $xml = file_get_contents("$path"); 
               #Na variável $Path está armazenado o link do arquivo para fazer a leitura: 
               $tag = "";

                    #Strpos verifica a primeira ocorrência dentro do arquivo $xml da string "<g:link>":
              		$startPosition = strpos($xml, "<g:link>");
	               		# Verifica se a tag foi encontrada:
	                if($startPosition !== false) {
	               
	                    #Posição final do valor da tag:
	                    $endPosition = strpos($xml, "</g:link>");
                        #strlen - Retorna o tamanho de uma string:
	                    #Ponto de início do valor da tag:
	                    $start = $startPosition + strlen("<g:link>");
	                    #Tamanho do valor da tag:
	                    $length = $endPosition - $start;
	                    #substr — Retorna uma parte de uma string:
	                    $tag = substr($xml, $start, $length);

	                } else {
	                    echo "a tag <g:link> não foi encontrada";
	                }
                        #parse_url — Interpreta uma URL e retorna os seus componentes:
		                $urlInfos = parse_url($tag);
                        #Converte a string em variáveis
		                parse_str($urlInfos["query"], $urlQuerys);

                       #Adicionando os valores dos campos do form ao urlQuerys: 
		               $urlQuerys['utm_source'] = "$soucer";
		               $urlQuerys['amp;utm_medium'] = "$medio";
		               $urlQuerys['amp;utm_campaign'] = "$campanha";

                       #Aqui é feita a montagem do link com todos os paramentros: 
                  	   #Ex: utm_sourcer=valor_input, utm_medium=valor_input ...: 
		               $newURLQuery = http_build_query($urlQuerys);                
               		   $absorve = $newURLQuery;
		               $ourSufix = $absorve;

                		#Abrindo arquivo para leitura: 
                		$xml = "";
                		$handle = fopen("$path", "r"); 
		                        while (!feof($handle)) {
		                          $xml .=fgets($handle);
		                        }
                          fclose($handle);

                            #Agora vamos ter uma variável que será percorrida:
                            $currentXML = $xml;
                            #Vamos definir nossa referencia para facilitar:
                            $refSearch = "<g:link>";
                            $refSearchEnd = "</g:link>";
                            #Vamos definir o que irá dividir o sufixo e prefixo:
                            $infix = "?";
                            #Vamos começar percorrendo a variavél para retirar os sufixos:
                          		 
                                 while(strpos($currentXML, $refSearch) !== false) {

                                    $startPosition = strpos($currentXML, $refSearch) + strlen($refSearch);
                                    $currentXML = substr($currentXML, $startPosition);
                                    #Vamos extrair agora o sufixo que desejamos:
                                    $startPosition = strpos($currentXML, $infix) + strlen($infix);
                                    $currentXML = substr($currentXML, $startPosition);
                                    $endPosition = strpos($currentXML, $refSearchEnd);
                                    #Vamos substituir o sufixo pelo nosso: 
                                    $xml = str_replace(substr($currentXML, 0, $endPosition),$ourSufix,$xml);
                                    #Vamos continuar a percorrer a string:
                                    $currentXML = substr($currentXML, $endPosition);
								                  }

      }                       
                            #Substituição de caracters especiais:
                            $xml = str_replace("&","&amp;",$xml);
							$xml_actual = preg_replace('(amp%3B)', '', $xml);

                               
                            #Criar novo arquivo e atribuindo conteudo:  
                            $arquivo = fopen("C:/xampp/htdocs/exchanger/examples/archives/".$namearchive.".xml","w+"); 
                            $escreve = fwrite($arquivo,$xml_actual);
                            fclose($arquivo);          
                            $namearchive;
                            #Aqui é montado o novo link 
                           	$newlink =  $_SERVER['SERVER_NAME']."/exchanger/examples/archives/".$namearchive.".xml";

                           	  #Salva os dados no banco 
	                          $sqltwo = "INSERT INTO urls_actual(nome, urlatual) VALUES (:namearchive, :newlink)";
	                          $insert = $conn->prepare($sqltwo);
	                          $insert->bindParam(':newlink', $newlink);
	                          $insert->bindParam(':namearchive', $namearchive);
            
                              if($insert->execute()){
                                  echo " Sucesso"; 
                              }else{
                                  $_SESSION['msg'] = "<p style='color:red;'>Ocorreu um erro!</p>";
                              } 
             
                          
}

?>