create database if not exists bd_viveiro;

begin;

alter database bd_viveiro charset = utf8 collate = utf8_general_ci;

use bd_viveiro;

-- create a tabela usuarios
create table if not exists tb_users(
	id int (4) unsigned zerofill auto_increment primary key,
    nome varchar(55) not null,
    usuario varchar(15) not null,
    hashSenha varchar(255) not null,
    tipo varchar(10)not null,
    status varchar(15),
    data datetime
)auto_increment=1 engine=InnoDB;

-- create tabela attempt
create table if not exists tb_attempt(
	id int (4) unsigned zerofill auto_increment primary key,
    ip varchar(20),
    data datetime
)auto_increment=1 engine=InnoDB;

-- create tabela confirmation
create table if not exists tb_confirmation(
	id int(4) unsigned zerofill auto_increment primary key,
    email varchar(30),
    token text
)auto_increment=1 engine=InnoDB;

-- 
create table if not exists tb_especies(
	id int(4) unsigned zerofill auto_increment primary key,
    nPopular varchar(15) not null,
    nCientifico varchar(30)not null,
    familia varchar(15)not null,
    classeSucessional varchar(20)not null,
    extincao varchar(20)not null,
    dispersao varchar(15)not null,
    habito varchar(10),
    bioma varchar(15),
    descricao varchar(255)
)auto_increment=1 engine=InnoDB;

--
create table if not exists tb_clientes(
	id int(4)unsigned zerofill auto_increment primary key,
    razaosocial varchar(30)not null,
    documento char(20)not null,
    contato char(18),
    email varchar(30)not null,
    cep char (11)not null,
    endereco varchar(255)not null,
    bairro varchar(25)not null,
    cidade varchar(15)not null,
    uf varchar(2)not null,
    descricao varchar(255)
)auto_increment=1 engine=InnoDB;

--
create table if not exists tb_sementes(
	id int(4)unsigned zerofill auto_increment primary key,
    local varchar(20)not null,
    especie varchar (15)not null,
    dt date,
    cep char(25)not null,
    endereco varchar(30)not null,
    bairro varchar(25)not null,
    cidade varchar(15)not null,
    uf varchar(2)not null,
    descricao varchar(255)
)auto_increment=1 engine InnoDB;

--
create table if not exists tb_viveiro(
	id int(4)unsigned zerofill auto_increment primary key,
    local varchar(30)not null,
    nome varchar(25)not null,
    dt date,
    manutencao date,
    cep char(20)not null,
    endereco varchar(30)not null,
    bairro varchar(20)not null,
    cidade varchar(15)not null,
    uf varchar(2)not null,
    descricao varchar(255)
)auto_increment=1 engine=InnoDB;

--
create table if not exists tb_geminacao(
	id int (4)unsigned zerofill auto_increment primary key,
    especie varchar(20)not null,
    dt date,
    qtde int(30),
    descricao varchar(255)
)auto_increment=1 engine=InnoDB;

--
create table if not exists tb_repicagem(
	id int(4)unsigned zerofill auto_increment primary key,
    especie varchar(30)not null,
    dt date,
    qtde int (30),
    material varchar(30),
    descricao varchar(255)
)auto_increment=1 engine=InnoDB;

--
create table if not exists tb_insumos(
	id int(4)unsigned zerofill auto_increment primary key,
    nome varchar(20)not null,
    categoria varchar(15)not null,
    tipo varchar(10)not null,
    qtde int(30),
    descricao varchar(255)
)auto_increment=1 engine=InnoDB;

--
create table if not exists tb_descartes(
	id int(4)unsigned zerofill auto_increment primary key,
    especie varchar(25) not null,
    dt date,
    qtde int (20),
    motivo varchar(255)
)auto_increment=1 engine=InnoDB;
--

commit;