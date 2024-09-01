CREATE DATABASE bdctt;

USE bdctt;

CREATE TABLE usuario(
    codadmin INT PRIMARY KEY AUTO_INCREMENT,
    nivel INT,
    nome VARCHAR(50),
    cnpj VARCHAR(11),
    senha CHAR(60),
    email VARCHAR (250),
    endereco VARCHAR(50),
    fkcategoria INT NOT NULL,
    FOREIGN KEY (fkcategoria) REFERENCES categoria (codcategoria)
);

CREATE TABLE categoria (
    codcategoria INT PRIMARY KEY AUTO_INCREMENT,
    nomecategoria VARCHAR (50),
    logo VARCHAR(200) NOT NULL
);

CREATE TABLE ordem(
    codservico INT PRIMARY KEY AUTO_INCREMENT,
    dataemissao DATE,
    datafinal DATE,
    email VARCHAR(250),
    texto VARCHAR(1000),
    fkempresa INT,
    FOREIGN KEY (fkempresa) REFERENCES usuario (codadmin)
);

CREATE TABLE funcionarios_empresas (
    codfuncionario INT PRIMARY KEY AUTO_INCREMENT,
    dataadmissao DATE,
    nome VARCHAR (20),
    cpf VARCHAR(11),
    datanasc DATE,
    funcao CHAR (3),
    fkempresa INT,
    dataexame DATE,
    FOREIGN KEY (fkempresa) REFERENCES usuario (codadmin)
);

delimiter $
CREATE PROCEDURE cadfunc (pdataadmissao DATE, pnome VARCHAR (20),pcpf INT,pdatanasc DATE,pfuncao CHAR (3),pfkempresa INT)
begin 
    if (pfuncao="ADM") then
        insert into funcionarios_empresas (dataadmissao,nome,cpf,datanasc,funcao,dataexame,fkempresa) VALUES (pdataadmissao,pnome,pcpf,pdatanasc,pfuncao,date_add(pdataadmissao,INTERVAL 365 DAY),pfkempresa);
        else
        insert into funcionarios_empresas (dataadmissao,nome,cpf,datanasc,funcao,dataexame,fkempresa) VALUES (pdataadmissao,pnome,pcpf,pdatanasc,pfuncao,date_add(pdataadmissao,INTERVAL 730 DAY),pfkempresa);
    end if;
end$
delimiter ;


CREATE TABLE requerimento(
    codrequerimento INT PRIMARY KEY AUTO_INCREMENT,
    texto VARCHAR(300),
    assunto VARCHAR(300),
    datarequerimento DATE,
    statusrequerimento INT,
    descricao VARCHAR (200),
    dataup DATE,
    laudo VARCHAR (200),
    fkempresa INT NOT NULL,
    FOREIGN KEY (fkempresa) REFERENCES empresas (codempresa)
);


INSERT INTO usuario VALUES (0,1,"lucas","46416094894","$2a$12$kMz51D5GalLw3Td4jwGXuOozeMvLHTDeDJ9PgmgkDp4oeUsSQluAO
","admin@admin.com ","Rua","1");

INSERT INTO usuario VALUES (0,1,"lucas","111111111","$2a$12$kjtDQNhQNBXpFSD9ZZD5tOsi7RJA67pvHRl99O0svNscWn4N8y5lW
","monaco@gmail.com","Rua","1");


INSERT INTO categoria VALUES(0,"Alimenticio","alimenticio.png");

INSERT INTO categoria VALUES(0,"lojas","lojas.png");