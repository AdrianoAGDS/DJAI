<?php 
/**************************************************************************************************
 * Objetivo: Arquivo responsável pela inserção dos dados no Banco de Dados
 * Data: 23/11/2021
 * Autor: DJAI
 **************************************************************************************************/


 //import do arquivo que faz a conexão com o BD
 require_once('conexao.php');

 //import do arquivo de configuração de variaveis, constantes e mensagens 
 require_once('../modulo/conf.php');
 //Impprt dp arquivo de upload de foto
 require_once('../modulo/upload.php');



//Declaração de variáveis
$produto = (string) null;
$descricao = (string) null;
$idcategoria = (int) 0;
$file = (string) null;
$nomeFoto = (string) null;

//Validação para verificar se o botão salvar foi acionado
if(isset($_POST['btnEnviar']))
{
    
    //Recebendo dados do formulário HTML
    $produto = $_POST['txtproduto'];
    $descricao = $_POST['txtdescricao'];
    $idcategoria = $_POST['sltcategoria'];


    //Recebe o objeto array do file, que a index enviou pelo metodo POST e enctype
    $file = $_FILES['fleFoto'];

    //Chama a função que faz o upload da foto e recebe o nome da foto
    //para inserir no BD
    $nomeFoto = uploadArquivo($file);

    //Tratamentos de Erros (caixa vazia, qtde de caracteres, etc)
    //.....

    //Salvando dados no BD
    $sql = "insert into tblproduto (produto, descricao, idcategoria, foto)
                values ('".$produto."','".$descricao."',".$idcategoria.",'".$nomeFoto."')";

              
                
    //abre a conexão com o BD mysql
    $conexao = conexaoMysql();
    
    //Validação para verificar se o insert foi executado no BD
    if (mysqli_query($conexao, $sql))
        echo(REGISTRO_SALVO); //Mensagem de Sucesso
    else
        echo(ERRO_BD); //Mensagem de Erro

}






?>





?>