<?php 

    //import do arquivo de configuração para acessar as constantes para conexão com o BD
    require_once('modulo/conf.php');

    //import do arquivo de conexão com o BD
    require_once('bd/conexao.php');

    //chama a função que abre a conexão com o BD Mysql    
    $conexao = conexaoMysql();

	//Declaração de variáveis (para o editar)
	$id = (int) 0;
	$produto = (string) null;
    $descricao = (string) null;
    $nomeFoto = (string) null;
	$actionForm = (string) "bd/inserirProduto.php";

//Valida se a variavel modo existe na URL (ela é enviada no link do editar)
    if(isset($_GET['modo']))
    {
        //valida se o conteudo da variavel é editar
        if($_GET['modo'] == 'editar')
        {
            //recebe o id do registro enviado no link do editar
            $id = $_GET['id'];

            //Script para encontrar qual o registro que será editado
            $sql = "select * from tblproduto where idproduto=".$id;

            //Executa no BD o script SQL e guarda os dados de retorno
            $select = mysqli_query($conexao, $sql);

            //converte o resultado do BD em um array para 
            //podermos acessar os dados
            /*
                mysqli_fetch_assoc ou 
                mysqli_fetch_array ou 
                mysqli_fetch_object
            */
            if($listProduto = mysqli_fetch_assoc($select))
            {
                //Recebe os dados do array e guarda em variaveis locais
                $produto = $listProduto['produto'];
                $descricao = $listProduto['descricao'];

                //colocamos a página atualizarProduto para ser chamada no action do form
                //e estamos encaminhando o id, pela URL, pois utilizamos o metodo POST no form
                $actionForm = "bd/atualizarProduto.php?id=".$id;

            }
        }
    }



?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
    	<title>DJAI - Telecomunicações</title>
    	<meta charset="utf-8">
    	<link rel="stylesheet" href="css/style.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    </head>
	<body>
    </form>
    <div id="Interface">
		<header class="cabecalho">
            <div class="frmLogin">
                <form name="frmLogin" method="post" action="autenticar.php">
                Login: <br>
                <input id="txtLogin" type="text" name="txtLogin" >
                <br><br>
                Senha: <br>
                <input id="txtSenha"  type="password" name="txtSenha"> 
                <br>
                <input id="Logar" type="submit" name="btnLogar" value="Logar">
                <br>
                </form>
                </div>
			<h1 class="logo">
				<a href="index.html" title="DJAI - Telecomunicações"> DJAI - Telecomunicações </a>
			</h1>
		</header>
		<nav class="menu">
			<ul>
                <li> <a href="index.html"> Principal</li>
					      <li> <a href="produtos.php"> Produtos </a> </li>	               		
			</ul>
			  <div class="dropdown">
				<button id="botaodrop" class="mainmenubtn"> Parceiros </button>
				<div id="cor2" class="dropdown-content">
					<a target="_blank" href="../Site Projetos web/joao/joao.html" >João</a>
					<a target="_blank" href="http://adrianoagdsgti.atwebpages.com/" >Adriano</a>
					<a target="_blank" href="http://diegodutragti.atwebpages.com/" >Diego</a>
					<a target="_blank" href="../Site Projetos web/Curriculo Igor/igor.html" >Igor</a>
				</div>
		</nav>

        <article id="PrincipalPagina">
        <!-- Propagandas --> 
        <div class="PromocoesPrincipal">
        <img class="Promocoes" src="img/PlanoPrincipal.png" width="300px">
        <img class="Promocoes" src="img/HospedagemPrincipal.jpg" width="300px" >
        <img class="Promocoes" src="img/CombosPrincipal.jpg" width="300px" >
        </div>


        <div id="navservicos" class="radius-dez">

                <h2 id="h2-menu"> Serviços </h2>
                <?php 

                //Script SQL que será executado no BD
                $sql = "select * from tblproduto";

                //Executa no BD o script SQL
                $select = mysqli_query($conexao, $sql);

                //mysqli_fetch_assoc() - Permite converter o resultado do BD em um array de dados no PHP
                while ($listProduto = mysqli_fetch_assoc($select))
                  {
                  ?>
                <nav>
                   <ul>
                                <li id="li"><a href="#"> Planos de Internet </a></li>
                                <ul>
                                   <li id="lili"><a href="#"> Internet M25</a></li>
                                   <li id="lili"><a href="#"> Internet M35</a></li>
                                   <li id="lili"><a href="#"> Internet M50</a></li>
                                   <li id="lili"><a href="#"> Internet M100 </a></li>
                                   <li id="lili"><a href="#"> Internet M150 </a></li>
                                   <li id="lili"><a href="#"> Internet M200 </a></li>  
                                </ul>
                 
                                <li id="li"><a href="#"> Planos de Hospedagem</a></li>  
                                <ul>  
                                  <li id="lili"><a href="#"> Hospedagem P</a></li>
                                  <li id="lili"><a href="#"> Hospedagem M</a></li>        
                                  <li id="lili"><a href="#"> Hospedagem Business </a></li>
                                </ul>

                     
                                
                               <li id="li"><a href="#"> Melhores Combos</a></li>
                                <ul>         
                                  <li id="lili"><a href="#">Combo CP100</a></li>
                                  <li id="lili"><a href="#">Combo CP150</a></li>
                                  <li id="lili"><a href="#">Combo CMM150</a></li>
                                  <li id="lili"><a href="#">Combo CBM200</a></li>
                                </ul>
                              
                    <ul>  
                <?php      
                  }
                ?>            
                </nav>
              
        </div> <!-- /#menu -->

        <!-- Painel -->       
        <div class="meu-container1">
                 <ul>                  
                    <li>
                        <a href="Cadastro.php">
                            <figure>
								<img src="img/25Mega.jpg" >  
                                <figcaption>M25 R$ 75,00</figcaption>                              
                            </figure>
                        </a>
                    </li>
                 </ul>
        </div>   
   </article>
   <!--Rodapé -->
   <section class="newsletter">
			<h3> Newsletter </h3>
			<p> Receba nossas promoções por email </p>
			<form method="post">
				<input type="text" placeholder="Seu nome">
				<input type="email" placeholder="Seu email">
				<button> Cadastrar </button>
			</form>
		</section>
   <footer class="rodape">
        <p> © DJAI - Todos os direitos reservados </p>
   </footer>
	</body>
</html>
