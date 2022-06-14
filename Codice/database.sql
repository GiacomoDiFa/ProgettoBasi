SET storage_engine=InnoDB;
SET FOREIGN_KEY_CHECKS=1;
CREATE DATABASE IF NOT EXISTS danza;
SET NAMES 'utf8mb4';
-- use danza
use danza;
-- drop tables if they already exist
DROP TABLE IF EXISTS Programmazione;
DROP TABLE IF EXISTS Sala;
DROP TABLE IF EXISTS Insegnante;
DROP TABLE IF EXISTS Lezione;
DROP TABLE IF EXISTS Coppia;
-- create tables

CREATE TABLE Sala(
    CodSala CHAR(10) NOT NULL,
    NomeSala CHAR(30) NOT NULL,
    MetriQuadri SMALLINT NOT NULL,
    MaxPersone SMALLINT NOT NULL CHECK (MaxPersone > 0),
    PRIMARY KEY(CodSala)
);

CREATE TABLE Insegnante(
    CodInsegnante SMALLINT NOT NULL AUTO_INCREMENT,
    Nome CHAR(30) NOT NULL,
    Cognome CHAR(30) NOT NULL,
    Nazionalità CHAR(30) NOT NULL,
    PrezzoAdOra SMALLINT NOT NULL CHECK (PrezzoAdOra > 0),
    UNIQUE(Nome,Cognome),
    PRIMARY KEY(CodInsegnante)
);

CREATE TABLE Lezione(
    CodLezione CHAR(10) NOT NULL,
    BalloTrattato CHAR(30),
    PRIMARY KEY(CodLezione)
);

CREATE TABLE Coppia(
    CodCoppia SMALLINT NOT NULL AUTO_INCREMENT,
    NomeBallerino CHAR(30) NOT NULL,
    CognomeBallerino CHAR(30) NOT NULL,
    NomeBallerina CHAR(30) NOT NULL,
    CognomeBallerina CHAR(30) NOT NULL,
    Nazionalità CHAR(30) NOT NULL,
    Categoria CHAR(6) NOT NULL,
    Classe CHAR(3) NOT NULL,
    Passkey CHAR(255) NOT NULL,
    UNIQUE(NomeBallerino,CognomeBallerino,NomeBallerina,CognomeBallerina),
    PRIMARY KEY(CodCoppia)
);


CREATE TABLE Programmazione(
    OraInizio TIME NOT NULL,
    CodLezione CHAR(10) NOT NULL,
    CodInsegnante SMALLINT NOT NULL,
    CodCoppia SMALLINT NOT NULL,
    CodSala CHAR(10) NOT NULL,
    PRIMARY KEY(OraInizio,CodInsegnante),
    FOREIGN KEY(CodLezione) REFERENCES Lezione(CodLezione) ON DELETE NO ACTION ON UPDATE CASCADE,
    FOREIGN KEY(CodInsegnante) REFERENCES Insegnante(CodInsegnante) ON DELETE NO ACTION ON UPDATE CASCADE,
    FOREIGN KEY(CodCoppia) REFERENCES Coppia(CodCoppia) ON DELETE NO ACTION ON UPDATE CASCADE,
    FOREIGN KEY(CodSala) REFERENCES Sala(CodSala) ON DELETE NO ACTION ON UPDATE CASCADE
);

