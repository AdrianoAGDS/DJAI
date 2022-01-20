<?php 
/*************************************************************************************************
 * Objetivo: Arquivo responsável para excluir usuários
 * Data: 23/11/2021
 * Autor: DJAI
 **************************************************************************************************/

//Import do arquivo de configuração de variaveis, constantes e mensagens
require_once('../modulo/conf.php');

//Import do arquivo de conexão com o BD
require_once('conexao.php');

//Declaração de variaveis
$id = (int) 0;

//Validação para verificar se existe a variavel modo
if(isset($_GET['modo']))
{
    //Validação para verificar se a variavel modo tem o valor excluir
    if($_GET['modo'] == 'excluir')
    {
        //recebe o id do usuário que foi enviado no link da index
        $id = $_GET['id'];

        $sql = "delete from tblproduto where idproduto = ".$id;

        //abre a conexão com o BD
        $conexao = conexaoMysql();

        //Executa o script no BD e valida se deu certo
        if(mysqli_query($conexao, $sql))
            echo(REGISTRO_EXCLUIDO); //Mensagem de Sucesso
        else
            echo(ERRO_BD); //Mensagem de erro
    }
}




?>