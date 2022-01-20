<?php 
/**************************************************************************************************
 * Objetivo: Arquivo responsável pela inserção dos dados no Banco de Dados
 * Data: 23/11/2021
 * Autor: DJAI
 **************************************************************************************************/


 //import do arquivo que faz a conexão com o BD
 require_once('conexao.php');

 //import do arquivo de configuração de variaveis, constantes e mensagens 
 require_once('../modulo/config.php');

//Declaração de variáveis
$nome = (string) null;
$login = (string) null;
$nickName = (string) null;
$senha = (string) null;
$email = (string) null;
$dataAtual = (string) null;

//Validação para verificar se o botão salvar foi acionado
if(isset($_POST['btnEnviar']))
{
    
    //Recebendo dados do formulário HTML
    $nome = $_POST['txtNome'];
    $login = $_POST['txtLogin'];
    $senha = $_POST['txtSenha'];
    $nickName = $_POST['txtNickName'];
    $email = $_POST['txtEmail'];
    $dataAtual = date('Y-m-d');

    //Tratamentos de Erros (caixa vazia, qtde de caracteres, etc)
    //.....

    //Salvando dados no BD
    $sql = "insert into tblusuario (nome, login, nickName, senha, email, dataCadastro)
                values ('".$nome."', '".$login."', '".$nickName."','".$senha."',
                        '".$email."', '".$dataAtual."') ";

    //abre a conexão com o BD mysql
    $conexao = conexaoMysql();
    
    //Validação para verificar se o insert foi executado no BD
    if (mysqli_query($conexao, $sql))
        echo(REGISTRO_SALVO); //Mensagem de Sucesso
    else
        echo(ERRO_BD); //Mensagem de Erro

}






?>