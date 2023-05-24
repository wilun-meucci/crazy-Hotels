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
    metriQuadrati varchar(255),
    postitotali varchar(255),
    descrizione varchar(255),
    idHotel varchar(255),
    foreign key (idHotel) references hotel(idHotel)
);

CREATE TABLE utenti
(
    idUtente varchar(255) primary key,
    nome varchar(255),
    cognome varchar(255),
    email varchar(255),
    passwd varchar(255),
    sesso varchar(255),
    dataNascita date,
    numeroTelefono varchar(13),
    CHECK(passwd REGEXP"^[a-fA-F0-9]{64}$"),
    unique (email),
    unique (idUtente)
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
insert into hotel values("3","Park Grand Paddington Court","Devonshire Terrace Paddinngton 27","Londra","4","ParkGrandPaddingtonCourt@info","04218296793","questo alloggio offre i migliori comfort di Londra e un ottimo rapporto qualità-prezzo.");
insert into hotel values("4","Hotel Italia","Viale Cavour 67","Siena","3","HotelItalia@info","4573829574","Hotel alle porte del Centro Storico di Siena completamente rinnovato nelle aree comuni.");
insert into hotel values("5","Hotel Bellavista","Via Carnia 34","Lignano Sabbiadoro","4","HotelBellavista@info","35389463894","L' hotel Bellavista è passato di generazione in generazione, i nostri nonni prima, e poi i nostri genitori ci hanno lasciato in eredità.");
insert into hotel values("6","Hotel Maritan","Via Gattamelata 34","Padova","3","HotelMaritan@info","234234765869","Situato a 5 minuti a piedi dalla Basilica di Sant'Antonio, il Maritan offre un parcheggio , un centro benessere olistico e camere moderne.");
insert into hotel values("7","Novo Hotel Rossi","Via delle Coste 2","Milano","3","NovoHotelRossi@info","9674829384","il Novo Hotel Rossi mette a disposizione 50 camere, doppie e triple, ed ambienti del tutto nuovi.");

insert into camere value ("1", "quadrupla", "Suite imperial", "104", "4", "25", "3", "Se viaggi con un gruppo di amici o con la tua famiglia, le Quadruple sono la scelta perfetta per te. Qui lo spazio e la luce non mancano, perché la…","1" );
insert into camere value ("3", "quadrupla", "ciccio", "103", "3", "20", "4", "Se viaggi con un gruppo di amici o con la tua famiglia, le Quadruple sono la scelta perfetta per te. Qui lo spazio e la luce non mancano, perché la…","1" );
insert into camere value ("4", "tripla", "Long Island", "69", "3", "15", "2", "Se viaggi con un gruppo di amici o con la tua famiglia, le Quadruple sono la scelta perfetta per te. Qui lo spazio e la luce non mancano, perché la…","3" );
insert into camere value ("5", "doppia", "Francesco Totti", "97", "2", "10", "2", "Se viaggi con un gruppo di amici o con la tua famiglia, le Quadruple sono la scelta perfetta per te. Qui lo spazio e la luce non mancano, perché la…","4" );

insert into immaginiCamera values (default, "1" , "https://cdn-ca.dg1.services/6/270/5199/cL-23R184l3974r2433z0.4801304347826087:rw1920h1080/QUADRUPLA%20LUXURY%20VILLA%20IMPERINAIMG_0013.JPG");
insert into immaginiCamera values (default, "3" , "https://u.profitroom.pl/2020-lovechotel-com/thumb/1920x1080/uploads/rooms/Hotel_lovec_rooms_46.jpg");
insert into immaginiCamera values (default, "4" , "https://www.luesnerhof.it/fileadmin/_processed_/7/3/csm_Hotel__3__3748235756.jpg");
insert into immaginiCamera values (default, "5" , "https://www.weinegg.com/images/content/99607_11855_2_C_1920_1080_0_1503670/k.180424112107.jpg");


insert into camere value ("2", "doppia", "Lezzona", "133", "2", "15", "2","Se viaggi con un gruppo di amici o con la tua famiglia, le Quadruple sono la scelta perfetta per te. Qui lo spazio e la luce non mancano, perché la…","2" );
insert into immaginiCamera values (default, "2", "https://www.grandhotelmolveno.it/files/anteprima/1920/grandhotelmolveno-classic-1,1352.jpg?WebbinsCacheCounter=1");



