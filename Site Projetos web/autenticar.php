<?php 
    //Import do arquivo de conexão com o BD
    require_once('bd/conexao2.php');

    // Chamando a função que abre a conexão com o BD Mysql
    $conexao = conexaoMysql();

    //Declarar variaveis
    $login = (string) null;
    $senha = (string) null;

    //Receber dados do formulário HTML
    $login = $_POST['txtLogin'];
    $senha = $_POST['txtSenha'];

    //Processamento de Autenticação
    $sql = "select * from tblusuario
	where login = '".$login."' and senha = '".$senha."'";

    //Executa no BD o script para validar o usuario e a senha
    $select = mysqli_query($conexao, $sql);

    if ($usuario =  mysqli_fetch_assoc($select))
       // echo('Login realizado com sucesso!');
        header('location: Painel.php');
    else
        echo('Usuário ou Senha inválidos!');


?>