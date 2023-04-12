DROP DATABASE IF EXISTS crazyhotels;
CREATE DATABASE crazyhotels;

USE crazyhotels;

CREATE TABLE hotel
(
	idHotel varchar(255),
	nome varchar(255),
    indirizzo varchar(255) unique,
    citta varchar(255),
    Nstelle varchar(255),
    mail varchar(255),
    numero varchar(13),
    descrizione varchar(255),
    primary key(idHotel)
);

CREATE TABLE camere
(
	idCamera varchar(255) primary key,
	tipo varchar(255),
    nomeCamera varchar(255),
    numeroCamera varchar(255),
    numeroLetti varchar(255),
    descrizione varchar(255)
);

CREATE TABLE utenti
(
	idUtente varchar(255),
	nome varchar(255),
    cognome varchar(255),
    email varchar(255),
    passwd varchar(255),
    CHECK(passwd REGEXP"^[a-fA-F0-9]{64}$"),
    unique (email),
    primary key(idUtente)
);

CREATE TABLE prenotazioni
(
	idPrenotazione int auto_increment primary key,
    dataCheckIn date,
    dataCheckOut date,
    idCamera varchar(255),
    idUtente varchar(255),
    foreign key (idUtente) references utenti(idUtente),
    foreign key (idCamera) references camere(idCamera)
);


CREATE TABLE immaginiCamera
(
	idImg int Primary key auto_increment,
	idCamera varchar(255),
    foreign key (idCamera) references camere(idCamera)
);

CREATE TABLE servizi
(
	idServ varchar(255) primary key,
	nome varchar(255),
    luogo varchar(255),
    descrizione varchar(255)
);

CREATE TABLE offertaServizi
(
	idHotel varchar(255),
    idServ varchar(255),
    foreign key (idHotel) references hotel(idHotel),
    foreign key (idServ) references servizi(idServ)
);

CREATE TABLE commenti
(
	idCommento int auto_increment primary key,
    titolo varchar(255),
    corpo varchar(255)
);

CREATE TABLE scrivono
(
	idUtente varchar(255),
    idCommento int,
    data date,
    ora int,
    foreign key (idUtente) references utenti(idUtente),
    foreign key(idCommento) references commenti(idCommento)
);
