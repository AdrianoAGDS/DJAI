<?php 
/***********************************************************************
 * Objetivo: Arquivo resposnsável por realizar a conexão com o BD MySQL
 * Data: 23/11/2021
 * Autor: DJAI
 * 
************************************************************************/
//import do arquivo de configuração para acessar as constantes para conexão com o BD
require_once('modulo/config.php');

//Retorna a conexão com o BD Mysql
function conexaoMysql()
{
    $conexao = (string) null;

    //Abrindo a conexão com o BD MySQL
    if ($conexao = mysqli_connect(HOST, USER, PASSWORD, DATABASE))
         return $conexao;
    else
        return false;
}

/* Existem 03 formas de criar a conexão com o BD MySQL pelo PHP
    
    mysql_connect() - biblioteca das versões antigas do PHP (não recomendado pois é obsoleto)
    mysqli_connect() - biblioteca atual para conexão com o BD mysql
    PDO() - Permite fazer a conexão com vários BD (mysql, postgresql, sqlserver, oracle, etc), 
        indicada para criar projetos com base de POO

*/





?>