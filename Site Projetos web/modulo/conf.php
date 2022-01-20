<?php 
/********************************************************************************************
 * Objetivo: Arquivo resposnsável por armazenar variáveis e constantes do projeto
 * Data: 23/11/2021
 * Autor: DJAI
 * 
********************************************************************************************/
/*
/***********************Constantes para conexão com o BD MySQL******************************/
    //Caminho do BD
    const HOST = "localhost";
    //Usuário de autenticação do BD
    const USER = "root";
    //Senha para autenticação do BD
    const PASSWORD = "a1993007";
    //Database que será utilizado no projeto
    const DATABASE = "inserirprodutos";
//****************************************** */

/***********************Constantes para mensagens do sistemas *******************************/
    const REGISTRO_SALVO = "<script>
                                alert('Registro salvo com sucesso no Banco de Dados!');
                                window.location.href = '../Painel.php';
                            </script>
                            ";

    const REGISTRO_EXCLUIDO = "<script>
                            alert('Registro excluído com sucesso do Banco de Dados!');
                            window.location.href = '../Painel.php';
                        </script>
                        ";

    const ERRO_BD = "<script>
                        alert('Não foi possível manipular os dados no Banco de Dados!');    
                        window.history.back();
                     </script>
                    ";

?>
