use freedb_mpsflix;

create table tb_usuarios (
	email varchar(256) not null primary key unique,
	nome varchar(256) not null,
	senha varchar(256) not null
);

create table tb_assistidos (
	id int primary key not null auto_increment,
	nome varchar(256) not null,
	tipo enum('filme', 'serie') not null,
	assistido enum('1', '0') not null default '0'
);
