/* PI_BD_Lógico: */

DROP DATABASE sic; -- exclui banco de dados caso já exista

CREATE DATABASE sic; -- cria banco de dados com nome sic

USE sic; -- usa banco de dados sic para criar as tabelas

/* Cria as tabelas do banco de dados  */

CREATE TABLE Usuario (-- Cria Tabela Usuario
    idUsuario smartint PRIMARY KEY AUTO_INCREMENT,-- Cria idUsuario como Chave Primária
    nomeUsuario varchar(50),
    dataNascimento date,
    eMail varchar(50),
    senha varchar(15),
    caronaAmiga boolean,
    fk_bairrosDestino_PK int,
    codMatricula varchar(15),
    Usuario_TIPO INT
);

CREATE TABLE Grupo (-- Cria Tabela Grupo
    idGrupo int PRIMARY KEY AUTO_INCREMENT,-- Cria idGrupo como Chave Primária
    nomeGrupo varchar(15)
);

CREATE TABLE bairrosDestino (-- Cria Tabela bairrosDestino
    bairrosDestino_PK int NOT NULL PRIMARY KEY AUTO_INCREMENT,-- Cria bairroDestino como Chave Primária 
    bairrosDestino varchar(50)
);

CREATE TABLE Mensagem (-- Cria Tabela Mensagem
    idMensagem int PRIMARY KEY AUTO_INCREMENT AUTO_INCREMENT,-- Chave Primária
    fk_Usuario_idUsuarioDes int,-- Chave Estrangeira
    fk_Usuario_idUsuarioOri int,-- Chave Estrangeira
    dataMensagem datetime,
    textoMensagem text,
    usuarioDestino varchar(50),
    usuarioOrigem varchar(50)
);

CREATE TABLE Participa (-- Cria Tabela Participa
    idParticipa int PRIMARY KEY AUTO_INCREMENT ,-- Cria idParticipa como Chave Primária
    fk_Grupo_idGrupo int, -- Chave Estrangeira
    fk_Usuario_idUsuarioDes int, -- Chave Estrangeira
    fk_Usuario_idUsuarioOri int, -- Chave Estrangeira
    usuarioDestino varchar(50),
    usuarioOrigem varchar(50)
);
 
 /* Finaliza a criação das tabelas do banco de dados e inicia a criação dos relacionamentos */
 
ALTER TABLE Usuario -- Cria alteração em Usuario
	ADD CONSTRAINT FK_Usuario_2 -- Adiciona restrição F_Usuario_2
    FOREIGN KEY (fk_bairrosDestino_PK) -- Identifica fk_bairrosDestino_PK como Chave Estrangeira
    REFERENCES bairrosDestino (bairrosDestino_PK) -- Referência a tabela e o campo
    ON DELETE NO ACTION;
 
ALTER TABLE Mensagem -- Cria alteração em Mensagem
	ADD CONSTRAINT FK_Mensagem_2 -- Adiciona restrição FK_Mensagem_2
    FOREIGN KEY (fk_Usuario_idUsuarioDes) -- Identifica fk_Usuario_idUsuarioDes como Chave Estrangeira
    REFERENCES Usuario (idUsuario) -- Referência a tabela e o campo
    ON DELETE RESTRICT;
 
ALTER TABLE Mensagem -- Cria alteração em Mensagem
	ADD CONSTRAINT FK_Mensagem_3  -- Adiciona restrição FK_Mensagem_3
    FOREIGN KEY (fk_Usuario_idUsuarioOri) -- Identifica fk_Usuario_idUsuarioOri como Chave Estrangeira
    REFERENCES Usuario (idUsuario) -- Referência a tabela e o campo
    ON DELETE RESTRICT;
 
ALTER TABLE Participa -- Cria alteração em Participa
	ADD CONSTRAINT FK_Participa_2 -- Adiciona restrição FK_Participa_2
    FOREIGN KEY (fk_Grupo_idGrupo) -- Identifica fk_Grupo_idGrupo como Chave Estrangeira
    REFERENCES Grupo (idGrupo) -- Referência a tabela e o campo
    ON DELETE SET NULL;
 
ALTER TABLE Participa  -- Cria alteração em Participa
	ADD CONSTRAINT FK_Participa_3 -- Adiciona restrição FK_Participa_3
    FOREIGN KEY (fk_Usuario_idUsuarioDes) -- Identifica fk_Usuario_idUsuarioDes como Chave Estrangeira
    REFERENCES Usuario (idUsuario) -- Referência a tabela e o campo
    ON DELETE SET NULL;
 
ALTER TABLE Participa  -- Cria alteração em Participa
	ADD CONSTRAINT FK_Participa_4 -- Adiciona restrição FK_Participa_4
    FOREIGN KEY (fk_Usuario_idUsuarioOri) -- Identifica fk_Usuario_idUsuarioOri como Chave Estrangeira
    REFERENCES Usuario (idUsuario) -- Referência a tabela e o campo
    ON DELETE SET NULL;
    
    /* Finaliza a criação dos relacionamentos */
