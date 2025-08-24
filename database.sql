-- Criação do banco --

create database if0_36803676_mpsflix;
use if0_36803676_mpsflix;

-- Estrutura de tabelas --

create table tb_usuarios (
	email varchar(512) not null primary key,
	nome varchar(256) not null,
	senha varchar(256) not null
);

create table tb_series (
	id_serie int unsigned not null auto_increment primary key,
	nome varchar(256) not null,
	sinopse varchar(1024) default null
);

create table tb_filmes (
	id_filme int unsigned not null auto_increment primary key,
	nome varchar(256) not null,
	link varchar(256) not null unique,
	duracao time not null,
	sinopse varchar(1024) default null
);

create table tb_categorias (
	id_categoria tinyint unsigned not null auto_increment primary key,
	nome varchar(256) not null unique
);

create table tb_categoria_filme (
	id int unsigned not null auto_increment primary key,
	id_filme int unsigned not null,
	id_categoria tinyint unsigned not null,
	foreign key (id_filme) references tb_filmes(id_filme),
	foreign key (id_categoria) references tb_categorias(id_categoria)
);

create table tb_categoria_serie (
	id int unsigned not null auto_increment primary key,
	id_serie int unsigned not null,
	id_categoria tinyint unsigned not null,
	foreign key (id_serie) references tb_series(id_serie),
	foreign key (id_categoria) references tb_categorias(id_categoria)
);

create table tb_episodios (
	id_episodio int unsigned not null auto_increment primary key,
	id_serie int unsigned not null,
	numero smallint unsigned not null,
	temporada tinyint unsigned not null,
	link varchar(256) not null unique,
	foreign key (id_serie) references tb_series(id_serie)
);
