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
    mertriQuadrati varchar(255),
    postitotali varchar(255),
    descrizione varchar(255),
    idHotel varchar(255),
    foreign key (idHotel) references hotel(idHotel)
);

CREATE TABLE utenti
(
    idUtente varchar(255),
    nome varchar(255),
    cognome varchar(255),
    email varchar(255),
    passwd varchar(255),
    sesso varchar(255),
    dataNascita date,
    numeroTelefono varchar(13)
    CHECK(passwd REGEXP"^[a-fA-F0-9]{64}$"),
    unique (email),
    unique (idUtente),
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
    url varchar(255),
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
insert into utenti(idUtente,nome,cognome,email, passwd) value ("1","Riccardo","Ilcoglione","ciao@gmail.com", SHA2("ciao",256));

insert into hotel value ("1", "Orto De Medici", "Via San Gallo 30", "Firenze", "4", "ortodeimedici@info", "0550621097", "Hotel Orto De Medici è un'ottima scelta per i viaggiatori che visitano Firenze.");
insert into hotel value ("2", "Hotel Berna", "Via Napo Torriani 18", "Milano", "3", "hotelberna@info", "0450829097", "Se cercate un hotel a Milano, sia per lavoro che per piacere, l'Hotel Berna è quello che fa per voi.");

insert into camere value ("1", "quadrupla", "Suite imperial", "104", "4", "25", "3", "Se viaggi con un gruppo di amici o con la tua famiglia, le Quadruple sono la scelta perfetta per te. Qui lo spazio e la luce non mancano, perché la…","1" );
insert into camere value ("3", "quadrupla", "ciccio", "103", "3", "3", "1", "Se viaggi con un gruppo di amici o con la tua famiglia, le Quadruple sono la scelta perfetta per te. Qui lo spazio e la luce non mancano, perché la…","1" );
insert into immaginiCamera values (default, "1" , "https://cdn-ca.dg1.services/6/270/5199/cL-23R184l3974r2433z0.4801304347826087:rw1920h1080/QUADRUPLA%20LUXURY%20VILLA%20IMPERINAIMG_0013.JPG");
insert into immaginiCamera values (default, "3" , "https://cdn-ca.dg1.services/6/270/5199/cL-23R184l3974r2433z0.4801304347826087:rw1920h1080/QUADRUPLA%20LUXURY%20VILLA%20IMPERINAIMG_0013.JPG");


insert into camere value ("2", "doppia", "Lezzona", "133", "2", "15", "2","Se viaggi con un gruppo di amici o con la tua famiglia, le Quadruple sono la scelta perfetta per te. Qui lo spazio e la luce non mancano, perché la…","2" );
insert into immaginiCamera values (default, "2", "https://hotelberna.com/wp-content/uploads/sites/10/slide-1-2.jpg");
insert into immaginiCamera values(default, "2" , "https://hotelberna.com/wp-content/uploads/sites/10/slide-2-2.jpg");
