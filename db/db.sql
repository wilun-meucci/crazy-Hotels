DROP DATABASE IF EXISTS crazyhotels;
CREATE DATABASE crazyhotels;

USE crazyhotels;



CREATE TABLE camere
(
    idCamera varchar(255) primary key,
    tipo varchar(255),
    nomeCamera varchar(255),
    numeroCamera varchar(255),
    numeroLetti varchar(255),
    mertriQuadrati varchar(255),
    descrizione varchar(255)
);

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
    idCamera varchar(255),
    primary key(idHotel),
    foreign key (idCamera) references camere(idCamera)
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


insert into camere value ("1", "quadrupla", "Suite imperial", "104", "4", "25", "Se viaggi con un gruppo di amici o con la tua famiglia, le Quadruple sono la scelta perfetta per te. Qui lo spazio e la luce non mancano, perché la…" );


insert into hotel value ("1", "Orto De Medici", "Via San Gallo 30", "Firenze", "4", "ortodeimedici@info", "0550621097", "Hotel Orto De Medici è un'ottima scelta per i viaggiatori che visitano Firenze.", "1");


insert into immaginiCamera values (default, "1" , "https://www.google.com/imgres?imgurl=https%3A%2F%2Fcdn-ca.dg1.services%2F6%2F270%2F5197%2FcL50R417l4048r2666z0.4801304347826087%2FQUADRUPLA%2520LUXURY%2520VILLA%2520IMPERINAIMG_0005_1.JPG&tbnid=krNf4XCACTa15M&vet=12ahUKEwiTzpatvNv-AhXNhP0HHQ7eBSMQMygAegUIARDJAQ..i&imgrefurl=https%3A%2F%2Fwww.villaimperina.it%2Frooms-%2Fcamera-quadrupla&docid=4t9nW0h1ZQGp8M&w=1920&h=1080&q=camera%20quadrupla&ved=2ahUKEwiTzpatvNv-AhXNhP0HHQ7eBSMQMygAegUIARDJAQ");

insert into camere value ("2", "doppia", "Lezzona", "133", "2", "15", "Se viaggi con un gruppo di amici o con la tua famiglia, le Quadruple sono la scelta perfetta per te. Qui lo spazio e la luce non mancano, perché la…" );
insert into hotel value ("2", "Hotel Berna", "Via Napo Torriani 18", "Milano", "3", "hotelberna@info", "0450829097", "Se cercate un hotel a Milano, sia per lavoro che per piacere, l'Hotel Berna è quello che fa per voi.", "2");