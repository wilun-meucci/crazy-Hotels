DROP DATABASE IF EXISTS crazyhotels;
CREATE DATABASE crazyhotels;

USE crazyhotels;


SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));

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
    postitotali int,
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

INSERT INTO `hotel` (`idHotel`, `nome`, `indirizzo`, `citta`, `Nstelle`, `mail`, `numero`, `descrizione`) VALUES
('1', 'Orto De Medici', 'Via San Gallo 30', 'Firenze', '4', 'ortodeimedici@info', '0550621097', 'Hotel Orto De Medici è un\'ottima scelta per i viaggiatori che visitano Firenze.'),
('2', 'Hotel Berna', 'Via Napo Torriani 18', 'Milano', '3', 'hotelberna@info', '0450829097', 'Se cercate un hotel a Milano, sia per lavoro che per piacere, l\'Hotel Berna è quello che fa per voi.'),
('3', 'Park Grand Paddington Court', 'Devonshire Terrace Paddinngton 27', 'Londra', '4', 'ParkGrandPaddingtonCourt@info', '04218296793', 'questo alloggio offre i migliori comfort di Londra e un ottimo rapporto qualità-prezzo.'),
('4', 'Hotel Italia', 'Viale Cavour 67', 'Siena', '3', 'HotelItalia@info', '4573829574', 'Hotel alle porte del Centro Storico di Siena completamente rinnovato nelle aree comuni.'),
('5', 'Hotel Bellavista', 'Via Carnia 34', 'Lignano Sabbiadoro', '4', 'HotelBellavista@info', '35389463894', 'L\' hotel Bellavista è passato di generazione in generazione, i nostri nonni prima, e poi i nostri genitori ci hanno lasciato in eredità.'),
('6', 'Hotel Maritan', 'Via Gattamelata 34', 'Padova', '3', 'HotelMaritan@info', '234234765869', 'Situato a 5 minuti a piedi dalla Basilica di Sant\'Antonio, il Maritan offre un parcheggio , un centro benessere olistico e camere moderne.'),
('7', 'Novo Hotel Rossi', 'Via delle Coste 2', 'Milano', '3', 'NovoHotelRossi@info', '9674829384', 'il Novo Hotel Rossi mette a disposizione 50 camere, doppie e triple, ed ambienti del tutto nuovi.');

INSERT INTO `camere` (`idCamera`, `tipo`, `nomeCamera`, `numeroCamera`, `numeroLetti`, `metriQuadrati`, `postitotali`, `descrizione`, `idHotel`) VALUES
('1', 'quadrupla', 'Suite imperial', '104', '4', '25', 3, 'Se viaggi con un gruppo di amici o con la tua famiglia, le Quadruple sono la scelta perfetta per te. Qui lo spazio e la luce non mancano, perché la…', '1'),
('10', 'doppia', 'matrimoniale', '34', '2', '15', 2, 'perfetta per una coppia', '7'),
('11', 'quadrupla', 'suite', '230', '4', '40', 4, 'per una vacanza incredibile il miglior dei comfort', '5'),
('12', 'quadrupla', 'suite', '233', '4', '35', 4, 'per una vacanza incredibile il miglior dei comfort', '5'),
('14', 'doppia', 'matrimoniale', '174', '1', '12', 2, 'perfetta per una coppia', '7'),
('15', 'doppia', 'doppia singola', '23', '2', '10', 2, 'perfetta se sei con amici', '2'),
('16', 'tripla', 'long island', '227', '2', '20', 3, 'per una vacanza con la tua famiglia', '2'),
('17', 'doppia', 'love suite', '169', '1', '20', 2, 'per una vacanza romantica', '3'),
('18', 'tripla', 'suite', '127', '2', '25', 3, 'per una vacanza con la tua famiglia', '4'),
('20', 'singola', 'singola', '22', '1', '12', 1, 'per una vacanza solitaria', '4'),
('3', 'quadrupla', 'ciccio', '103', '3', '20', 4, 'Se viaggi con un gruppo di amici o con la tua famiglia, le Quadruple sono la scelta perfetta per te. Qui lo spazio e la luce non mancano, perché la…', '1'),
('4', 'tripla', 'Long Island', '69', '3', '15', 2, 'Se viaggi con un gruppo di amici o con la tua famiglia, le Quadruple sono la scelta perfetta per te. Qui lo spazio e la luce non mancano, perché la…', '3'),
('5', 'doppia', 'Francesco Totti', '97', '2', '10', 2, 'Se viaggi con un gruppo di amici o con la tua famiglia, le Quadruple sono la scelta perfetta per te. Qui lo spazio e la luce non mancano, perché la…', '4'),
('6', 'tripla', 'imperial', '220', '3', '25', 3, 'perfetta per te e la tua famiglia', '6'),
('7', 'doppia', 'matrimoniale', '34', '2', '15', 2, 'perfetta per una coppia', '7'),
('9', 'quadrupla', 'imperial', '240', '3', '25', 4, 'perfetta per te e la tua famiglia', '6');

INSERT INTO `immaginiCamera` (`idImg`, `idCamera`, `url`) VALUES
(16, '1', 'https://cdn-ca.dg1.services/6/270/5199/cL-23R184l3974r2433z0.4801304347826087:rw1920h1080/QUADRUPLA%20LUXURY%20VILLA%20IMPERINAIMG_0013.JPG'),
(1, '3', 'https://www.hoteldaltavilla.it/wp-content/uploads/2016/10/camera7-1196x598.jpg'),
(2, '6', 'https://www.hotelcentrotrieste.it/assets/images/header/camere/tripla/tripla_2019.jpg'),
(3, '20', 'https://baiadelsolehotel.it/wp-content/uploads/2016/02/CAMERA-SINGOLA-BAIA-DEL-SOLE-HOTEL-MARINA-DI-RAGUSA-1-3.jpg'),
(4, '12', 'https://media-cdn.tripadvisor.com/media/photo-s/0e/24/02/7c/camera-quadrupla.jpg'),
(5, '5', 'https://www.gardaland.it/media/3e2bmaob/gh-classicdoppia-010.jpg'),
(6, '17', 'https://www.amenitiz.com/wp-content/uploads/2022/10/ydrzmoahdob1e441xw0o.jpg'),
(7, '10', 'https://www.parkhotelargento.com/immagini/camera-doppia-con-balcone-loggiato-parkhotelargento-resort-spa-levanto.jpg'),
(8, '14', 'https://www.gardaland.it/media/wcyljfqz/gh-classicdoppia-003.jpg'),
(9, '15', 'https://www.hotelsilvermilano.com/wp-content/uploads/sites/12/2019/07/hotel_silver_camere_doppia_gallery_02.jpg'),
(10, '16', 'https://www.hotelristorantelapineta.com/images/camere/main/camera-tripla-hotel-la-pineta-marina-di-carrara.jpg'),
(11, '18', 'https://www.hotelcentrotrieste.it/assets/images/header/camere/tripla/tripla_2019.jpg'),
(12, '4', 'https://lancasterhotel.it/lancaster_upl/hotel/camera-tripla/camera-tripla-lancaster-hotel-milano-01.jpg'),
(13, '11', 'https://www.hotel-spuntadimare.com/wp-content/uploads/sites/236/2020/12/Chambre-quadruple__006.jpg'),
(14, '9', 'https://www.ortodeimedici.it/images/room/gallery/quadruple/orto-dei-medici-quadruple-01.jpg'),
(15, '7', 'https://www.hotelromaflorence.com/sites/www.hotelromaflorence.com/files/styles/testata/public/images/Hotel_Roma_Firenze_DoppiaVista_FI008.jpg?itok=eGofrHl1');



insert into camere value ("2", "doppia", "bella", "133", "2", "15", "2","Se viaggi con un gruppo di amici o con la tua famiglia, le Quadruple sono la scelta perfetta per te. Qui lo spazio e la luce non mancano, perché la…","2" );
insert into immaginiCamera values (default, "2", "https://www.grandhotelmolveno.it/files/anteprima/1920/grandhotelmolveno-classic-1,1352.jpg?WebbinsCacheCounter=1");



