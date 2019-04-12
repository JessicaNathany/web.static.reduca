create database bd_viveiro;
use bd_viveiro;

CREATE TABLE tb_attempt (
    id int (11) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,
    ip varchar (20),
    date datetime
)AUTO_INCREMENT=1 ENGINE=INNODB;

CREATE TABLE tb_confirmation (
    id int (11) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,
    email varchar (90),
    token text    
)AUTO_INCREMENT=1 ENGINE=INNODB;

CREATE TABLE tb_users (
	id int (4) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,
    nome varchar (100),
    usuario varchar (30),
    hashSenha varchar(255),
    email varchar(100),
    tipo varchar(30),
    data datetime
)AUTO_INCREMENT=1 ENGINE=INNODB;

CREATE TABLE tb_funcionarios (
	id int (4) 	UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,
    nome varchar(30),
    email varchar(30),
    rg varchar(30),
    cpf mediumint(20) unsigned,
    nascimento date,
    endereco varchar(30),
    cidade varchar(30),
    estado varchar(30),
    cep mediumint(20) unsigned,
    tel mediumint(20)unsigned,
    cargo varchar(30),
    setor varchar(30),
    admissao date
)AUTO_INCREMENT=1 ENGINE=INNODB;

CREATE TABLE tb_especiesVariedades(
	id int (4) unsigned ZEROFILL AUTO_INCREMENT PRIMARY KEY,
    nPopular varchar(30),
    nCientifico varchar(30),
    familia varchar(30),
    classeSucessional varchar(30),
    gFuncional varchar(30),
    extincao varchar(30),
    dispersao varchar(30),
    habito varchar(30),
    bioma varchar(30)
)AUTO_INCREMENT=1 ENGINE=INNODB;

CREATE TABLE tb_clientes(
    id int (4) unsigned zerofill auto_increment primary key,
    razaoSocial varchar (30),
    cnpj varchar (30),
    rg varchar (30),
    contato mediumint (20) unsigned,
    email varchar (30),
    endereco varchar (30),
    cidade varchar (30),
    estado varchar (30),
    cep mediumint (20)    
)AUTO_INCREMENT=1 ENGINE=INNODB;

create table tb_sementes(
    id int (4) unsigned zerofill auto_increment primary key,
    especie varchar (30),
    dt date,
    nFuncionario varchar(30),
    endereco varchar (30),
    cidade varchar (30),
    estado varchar (30),
    cep mediumint (20)
)AUTO_INCREMENT=1 ENGINE=INNODB;

create table tb_viveiro(
    id int (4) unsigned zerofill auto_increment primary key,
    nome varchar (30),
    manutencao date,
    obs varchar (255),
    endereco varchar (30),
    cidade varchar (30),
    estado varchar (30),
    cep mediumint (20)
)AUTO_INCREMENT=1 ENGINE=INNODB;

create table tb_geminacao(
    lote int (4) unsigned zerofill auto_increment primary key,
    especie varchar (30),
    dt date,
    obs varchar (255),
    qtde int (30),    
)AUTO_INCREMENT=1 ENGINE=INNODB;

create table tb_repicagem(
    lote int (4) unsigned zerofill auto_increment primary key,
    especie varchar (30),
    dt date,
    obs varchar (255),
    qtde int (30),    
    embalagem varchar(30),    
)AUTO_INCREMENT=1 ENGINE=INNODB;

USE bd_viveiro;
INSERT INTO tb_usuarios(id,usuario,senha,email) 
VALUES(null,
'root',
'master',
'root@admin.com.br');

INSERT INTO tb_funcionarios(id,nome,email,rg,cpf,nascimento,endereco,cidade,estado,cep,tel,cargo,setor,admissao) 
VALUES(null,
'Wanclei Felipe',
'wanfel81@gmail.com',
md5('405905014'),
md5('42243333848'),
'1993-10-02',
'Rua Doutor Flavio Antunes 239',
'Franco da Rocha',
'Sao Paulo',
'07865200',
'11993219897',
'Estagiario',
'HelpDesk',
'2018-09-14'
);

INSERT INTO tb_especiesVariedades(id,familia,nPopular,nCientifico,classeSucessional,gFuncional,extincao,dispersao,habito,bioma) 
VALUES(null,
'Acanthaceae',
'Mangue Amarelo',
'Avicennia Schaueriana Stapf',
'Pioneira',
'Recobrimento',
'Vulneravel',
'Autocorica',
'Arvore',
'Man-1-2'
);