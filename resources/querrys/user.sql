create database helpdesk;

use helpdesk;

create table usuarios(
	id int not null primary key AUTO_INCREMENT,
	nome varchar(100) not null,
	email varchar(150) not null,
	senha varchar(32) not null
);

create table chamados( 
	id int not null primary key 
	AUTO_INCREMENT, titulo varchar(32) not null, 
	categoria varchar(32) not null, 
	descricao varchar(100) not null 
	);

	