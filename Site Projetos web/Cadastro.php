<?php 

    //import do arquivo de configuração para acessar as constantes para conexão com o BD
    require_once('modulo/config.php');

    //import do arquivo de conexão com o BD
    require_once('bd/conexao2.php');

    //chama a função que abre a conexão com o BD Mysql    
    $conexao = conexaoMysql();

    //Declaração de variáveis (para o editar)
    $id = (int) 0;
    $nome = (string) null;
    $nickName = (string) null;
    $login = (string) null;
    $senha = (string) null;
    $email = (string) null;
    $actionForm = (string) "bd/inserirUsuario.php";

        
    //Valida se a variavel modo existe na URL (ela é enviada no link do editar)
    if(isset($_GET['modo']))
    {
        //valida se o conteudo da variavel é editar
        if($_GET['modo'] == 'editar')
        {
            //recebe o id do registro enviado no link do editar
            $id = $_GET['id'];

            //Script para encontrar qual o registro que será editado
            $sql = "select * from tblUsuario where idUsuario=".$id;

            //Executa no BD o script SQL e guarda os dados de retorno
            $select = mysqli_query($conexao, $sql);

            //converte o resultado do BD em um array para 
            //podermos acessar os dados
            /*
                mysqli_fetch_assoc ou 
                mysqli_fetch_array ou 
                mysqli_fetch_object
            */
            if($listUsuario = mysqli_fetch_assoc($select))
            {
                //Recebe os dados do array e guarda em variaveis locais
                $nome = $listUsuario['nome'];
                $nickName = $listUsuario['nickname'];
                $login = $listUsuario['login'];
                $senha = $listUsuario['senha'];
                $email = $listUsuario['email'];

                //colocamos a página atualizarUsuario para ser chamada no action do form
                //e estamos encaminhando o id, pela URL, pois utilizamos o metodo POST no form
                $actionForm = "bd/atualizarUsuario.php?id=".$id;

            }
        }
    }

?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title> Dados do Produto </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    </head>
    <header class="cabecalho">
			<h1 class="logo">
				<a href="index.html" title="DJAI - Telecomunicações"> DJAI - Telecomunicações </a>
			</h1>
			<form method="post" action="">
				<a href="/Djai - Projeto/Site Projetos web/produtos.html" target="_blank">
				</a>			
			</form> 
		</header>
		<nav class="menu">
			<ul>
					<li> <a href="index.html"> Principal</li>
					<li> <a href="produtos.php"> Produtos </a> </li>	               	
					<li> <a href="Painel.php">Painel</a></li>
                    <li> <a href="Cadastro.php">Administrador</a></li>    	
			</ul>
			  <div class="dropdown">
				<button id="botaodrop" class="mainmenubtn"> Parceiros </button>
				<div id="cor2" class="dropdown-content">
				<a target="_blank" href="../Site Projetos web/joao/joao.html" >João</a>
				<a target="_blank" href="../Site Projetos web/adriano/adriano.html" >Adriano</a>
				<a target="_blank" href="http://diegodutragti.atwebpages.com/" >Diego</a>
				<a target="_blank" href="../Site Projetos web/Igor/igor.html" >Igor</a>
				</div>
				</div>
			<div class="social-icons">
				<ul id="redes-sociais"> <!--Icones do Bootstrap-->
					<li><i class="bi bi-youtube"></i>
					  <svg xmlns="http://www.w3.org/2000/svg" color=gold width="25" height="25" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
						  <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
						</svg></li>  
					  <li><i class="bi bi-facebook"></i>
						  <svg xmlns="http://www.w3.org/2000/svg" color=gold width="25" height="25" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
							  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
							</svg></li>
					  <li><i class="bi bi-twitter"></i>
						  <svg xmlns="http://www.w3.org/2000/svg" color=gold width="25" height="25" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
							  <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
							</svg></li>
					  <li><i class="bi bi-google"></i>
						  <svg xmlns="http://www.w3.org/2000/svg" color=gold width="25" height="25" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
							  <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
							</svg></li>
			</div>
		</nav>
    <body>


    <main class="principal">
    <div class=dashboard> 
        <ul>
        
        <li >
        <img src="img/shop.jpg"> 
        <a href="produtos.php"> Adm. Conteúdo</a>  </li> 

        <li>
        <img src="img/produtos.jpg">  
        <a href="Painel.php"> Adm. Produtos </a> </li>  

        <li>
        <img src="img/admin.jpg">   <a href="Cadastro.php"> Adm. Usuários </a></li>
        </ul>
    </div>

    <div id="cadastro"> 
            <div id="cadastroTitulo"> 
                <h1> Cadastro de Usuários </h1>
            </div>
            <div id="cadastroInformacoes">
                
                <form action="<?=$actionForm?>" name="frmCadastro" method="post" >
                   
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Nome: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtNome" value="<?=$nome?>" placeholder="Digite seu Nome" maxlength="100">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Sobrenome: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtNickName" value="<?=$nickName?>" placeholder="Digite seu Sobrenome">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Login: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtLogin" value="<?=$login?>" placeholder="Digite um Login">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Senha: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="password" name="txtSenha" value="<?=$senha?>" maxlength="20" placeholder="Digite uma Senha">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Email: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="email" name="txtEmail" value="<?=$email?>" placeholder="Exemplo djai@gmail.com">
                        </div>
                    </div>
                    <div class="enviar">
                        <div class="enviar">
                            <input type="submit" name="btnEnviar" value="Salvar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="consultaDeDados">
            <table id="tblConsulta" >
                <tr>
                    <td id="tblTitulo" colspan="5">
                        <h1> Lista de Usuários</h1>
                    </td>
                </tr>
                <tr id="tblLinhas">
                    <td class="tblColunas destaque"> Nome </td>
                    <td class="tblColunas destaque"> NickName </td>
                    <td class="tblColunas destaque"> Login </td>
                    <td class="tblColunas destaque"> Opções </td>
                </tr>
                
                <?php 

                    //Script SQL que será executado no BD
                    $sql = "select * from tblusuario";

                    //Executa no BD o script SQL
                    $select = mysqli_query($conexao, $sql);

                    //mysqli_fetch_assoc() - Permite converter o resultado do BD em um array de dados no PHP
                    while ($listUsuarios = mysqli_fetch_assoc($select))
                    {
                ?>
                    <tr id="tblLinhas">
                        <td class="tblColunas registros"><?=$listUsuarios['nome']?></td>
                        <td class="tblColunas registros"><?=$listUsuarios['nickname']?></td>
                        <td class="tblColunas registros"><?=$listUsuarios['login']?></td>
                        <td class="tblColunas registros">
                            <a href="Cadastro.php?modo=editar&id=<?=$listUsuarios['idusuario']?>">
                                <img src="img/edit.png" alt="Editar" title="Editar" class="editar">
                            </a>
                            <a href="bd/excluirUsuario.php?modo=excluir&id=<?=$listUsuarios['idusuario']?>">
                                <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                            </a>
                        </td>
                    </tr>
                <?php 
                    }
                ?>
            </table>
        </div>
    </main>
        <footer class="rodape">
			<p> © DJAI - Todos os direitos reservados </p>
	   	</footer>
    </body>
</html>