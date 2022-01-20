<?php 
    /*************************************************************************
     * Objetivo: Arquivo responsável pela atualização dos dados no BD
     * Data: 23/11/2021
     * Autor: DJAI
     *************************************************************************/

 //import do arquivo que faz a conexão com o BD
 require_once('conexao.php');

 //import do arquivo de configuração de variaveis, constantes e mensagens 
 require_once('../modulo/conf.php');

//Declaração de variáveis
$produto = (string) null;
$descricao = (string) null;
$idcategoria = (string) null;
$file = (string) null;
$nomeFoto = (string) null;

//Validação para verificar se o botão salvar foi acionado
if(isset($_POST['btnEnviar']))
{
    
    //Recebendo dados do formulário HTML
    $produto = $_POST['txtproduto'];
    $descricao = $_POST['txtdescricao'];


    //recebemos o id que foi encaminhado no action do form da página index
    $id = $_GET['id'];

    //Tratamentos de Erros (caixa vazia, qtde de caracteres, etc)
    //.....

    //Salvando dados no BD
    $sql = "update tblproduto set 
				produto = '".$produto."',
                descricao = '".$descricao."',
            where idproduto = ".$id;

    //abre a conexão com o BD mysql
    $conexao = conexaoMysql();
    
    //Validação para verificar se o insert foi executado no BD
    if (mysqli_query($conexao, $sql))
        echo(REGISTRO_SALVO); //Mensagem de Sucesso
    else
        echo(ERRO_BD); //Mensagem de Erro

}

?>