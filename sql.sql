
DROP DATABASE IF EXISTS crazyhotels;
CREATE DATABASE crazyhotels;

USE crazyhotels;

CREATE TABLE hotel
(
nome varchar(255),
    indirizzo varchar(255),
    località varchar(255),
    Nstelle varchar(255),
);

CREATE TABLE camera
(
tipo varchar(255),
    numeroLetti varchar(255),
);

CREATE TABLE servizi
(
nome varchar(255),

);

CREATE TABLE utenti
(
idUtente varchar(255),
nome varchar(255),
    cognome varchar(255),
    email varchar(255),
    passwd varchar(255),
    unique (email),
    primary key(idUtente)
);