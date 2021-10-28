<?php
session_start();
$info = '';

$diretorio = './arquivos/';
$tamanho_bytes ='2000000';
$temporario = $_FILES['arquivo']['tmp_name'];
$nome_de_arquivo = $_FILES['arquivo']['name'];
$tamanho_arquivo =$_FILES['arquivo']['size']; 
$arquivotype = $_FILES['arquivo']['type'];
$Cmps = explode(".", $nome_de_arquivo);
$extensao = strtolower(end($Cmps));
$novo_arquivo =  uniqid('ARQUIVO-',true). '.' .$extensao;
$tipo_arquivo = array('pdf','zip','txt','xls','doc');
$destino = $diretorio . $novo_arquivo;



if (isset($_POST['Enviar'])){
	
if (isset($_FILES['arquivo'])){
   
		if($tamanho_arquivo > $tamanho_bytes)
		{
			$info = 'Não foi possivel enviar, limite é de 2MB...';
		}
	    else{
			
	             
        if (in_array($extensao,$tipo_arquivo)){
     
    		if(move_uploaded_file($temporario, $destino)){
			$info ='O arquivo foi enviando com sucesso!';
				
			#LEMBRETE: Coloque aqui SQL INSERT#
			#vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvV#	
			}
			else{
			$info = 'Falha: O arquivo não foi enviado!';}
        
		}else{
      		$info = 'Extensão não permitido, só extensão válida: ' . implode(',',$tipo_arquivo);}}
}
	
  
  
}else{
$info = 'Ocorreu um erro desconhecido no upload do arquivo...';
}



$_SESSION['mensagem'] = $info;
header("Location: index.php");

?>