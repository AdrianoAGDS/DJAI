/***************************************************************
*	Database: dbprojetofecaf
*	Objetivo: Utilizar esse datababase para as aulas de PHP
*	Data: 20/10/2021
*	Autor: Adriano
*****************************************************************/

/****** Primero Banco de Dados******/  

#Apaga o database caso já exista
drop database if exists dbprojetofecaf;

#Cria um database no banco de dados
create database dbprojetofecaf;

#Ativa a utilização do database
use dbprojetofecaf;

#Cria a tabela de usuário no database
create table tblusuario (
	idusuario int not null auto_increment primary key,
    nome varchar (80) not null,
    nickname varchar (50) not null,
    login varchar (30) not null,
    senha varchar (50) not null,
    email varchar (50) not null,
	dataCadastro date not null
);

#Insere o primeiro usuário padrão (root) na tabela
insert into tblusuario (nome, nickname, login, senha, email, dataCadastro)
	values ('Administrador', 'admin', 'root', 'root@root', 'root@gmail.com', '2021-10-20');

/******Fim Primero Banco de Dados******/  

/******Segundo Banco de Dados******/

#Apaga o database caso já exista
drop database if exists inserirprodutos;

#Cria um database no banco de dados
create database inserirprodutos;

#Ativa a utilização do database
use inserirprodutos;


#Cria a tabela de usuário no database
create table tblproduto (
	idcategoria int not null auto_increment primary key,
    categoria varchar (80) not null,
    produto varchar (80) not null,
    descricao varchar (300) not null
);

#Inserir o primeiro produto
insert into tblproduto (categoria, produto, descricao)
values ('Plano de Internet', 'Internet M25');



#Apaga o database caso já exista
drop database if exists inserirprodutos;

#Cria um database no banco de dados
create database inserirprodutos;

#Ativa a utilização do database
use inserirprodutos;


#Cria a tabela de usuário no database
create table tblproduto (
	idcategoria int not null auto_increment primary key,
    categoria varchar (80) not null,
    produto varchar (80) not null
);

#Inserir o primeiro produto
insert into tblproduto (categoria, produto)
values ('Plano de Internet', 'Internet M25');

/******Fim Segundo Banco de Dados******/


/******Teceiro Banco de Dados******/

#Apaga o database caso já exista
drop database if exists inserirprodutos;

#Cria um database no banco de dados
create database inserirprodutos;

#Ativa a utilização do database
use inserirprodutos;


#Cria a tabela de categoria do site
create table tblcategoria (
    idcategoria int not null auto_increment primary key,
    categoria VARCHAR (200) not NULL
);

#Cria a tabela de produto do site
create table tblproduto (
    idproduto int not null auto_increment primary key,
    produto VARCHAR (200) not NULL,
    descricao VARCHAR (200) not NULL
);

ALTER TABLE tblproduto 
add column idcategoria int not null,
add constraint fk_categoria 
FOREIGN KEY(idcategoria) 
REFERENCES tblcategoria (idcategoria);

SELECT * FROM tblcategoria order by idcategoria; 

SELECT * FROM tblproduto;

select * from tblcategoria;

INSERT INTO tblcategoria (categoria)
VALUES ('Plano Internet'),
('Plano Hospedagem'),
('Melhores Combos');

#Inserir o primeiro produto
insert into tblproduto (produto, descricao,idcategoria)
VALUES ('25MB Internet', 'Instalação gratis, 25MB de download e 15MB de upload, Fibra ótica',1),
('Hospedagem Smart', 'Possivel hospedar até 2 sites, anti ddos, dominio gratis',2);

ALTER TABLE tblproduto
add column foto varchar(50);

SELECT * FROM tblproduto;

/******Fim Teceiro Banco de Dados******/