drop database if exists kauppa;
create database kauppa;
use kauppa;

/* TUOTERYHMÄ */
create table category (
    id int primary key auto_increment,
    name varchar(100) not null
);
INSERT INTO category(name) value('Kauhukirjallisuus');
INSERT INTO category(name) value('Jännitys');
INSERT INTO category(name) value('Romantiikka');
INSERT INTO category(name) value('Fantasiakirjallisuus');


/* KIRJA */
CREATE TABLE kirja (kirjaid int primary key auto_increment, kirjanimi CHAR(100) NOT NULL,kirjailija CHAR(100) NOT NULL,vuosi SMALLINT,kieli CHAR(10) NOT NULL,kustantaja CHAR(100) NOT NULL,kuvaus CHAR(255) NOT NULL,hinta DECIMAL(5,2),saldo SMALLINT, kuva CHAR(225),CONSTRAINT kirjanimi_un UNIQUE (kirjanimi), 
category_id int not null, index category_id(category_id), foreign key (category_id) references category(id) on delete restrict);
INSERT INTO kirja VALUES (1, 'Piina', 'Stephen King', 1989, 'Suomi', 'Tammi', 'Kirjailija Paul Sheldon joutuu auto-onnettomuuteen, mutta sairaalan sijasta hän päätyy omituisen ihailijan hoidettavaksi. Piina vain pahenee, kun Paul yrittää paeta ja saa samalla selville kuinka vaarallinen Annie todella onkaan.', 19.99,10, 'https://www.students.oamk.fi/~n0peii00/kuvia/piina.png', 1);
INSERT INTO kirja VALUES (2,'Pienen hauen pyydystys','Juhani Karila',2019,'Suomi', 'Siltala','Pienen hauen pyydystys on kielellisesti virtuoosimainen romaani, yhtä aikaa rakkausdraama ja myyttinen fantasia, kansankomedia ja ympäristötuhoa edistävän elämäntapamme säälimätön kritiikki. ', 29.95,7, 'https://www.students.oamk.fi/~n0peii00/kuvia/hauki.png', 4);
INSERT INTO kirja VALUES (3,'Hobitti eli Sinne ja takaisin','J. R. R. Tolkien',2017,'Suomi', 'WSOY','Hobitin 80-vuotislaitos sisältää Janssonin satumaiset kuvat alkuperäispiirroksista suoraan kuvattuina ja aiemmin vain Hobitin ensimmäisessä suomennoksessa Lohikäärmevuori käytetyn kannen.',24.95,15, 'https://www.students.oamk.fi/~n0peii00/kuvia/hobitti.png', 4);
INSERT INTO kirja VALUES (4,'Isyyden oppitunti/Rakas viholliseni','Kim Lawrence, Nikki Logan',2021,'Suomi', 'Harlequin','Rio tuijotti tyrmistyneenä hänen öitään vuosia piinanneen naisen sylissä olevan pikkutytön silmiin. Kuinka Gwen oli voinut salata häneltä totuuden? Kun hän tiesi, hän halusi tutustua tyttäreensä ja ottaa menetetyt vuodet takaisin.', 6.90,11, 'https://www.students.oamk.fi/~n0peii00/kuvia/isyys.png', 3);
INSERT INTO kirja VALUES (5, 'Aavikon kruununperillinen ','Sharon Kendrick',2021,'Suomi', 'Harlequin','Yllätysvauva: sokki šeikille ja Jacksonien bileprinsessalle! Epäviralliset lähteet kertovat, että Ella on raskaana! Ettei vain Cinder-Ella ehtisi avioitua ennen sisartaan - ja tuottaa valtakunnalle kruununperijää?', 4.50,1, 'https://www.students.oamk.fi/~n0peii00/kuvia/aavikko.png', 3);
INSERT INTO kirja VALUES (6, 'Shadow and Bone Boxed Set ','Leigh Bardugo',2018,'Englanti', 'Hodder Stoughton','See the Grishaverse come to life on screen with Shadow and Bone, now a Netflix original series. All three books in Leigh Bardugos New York Times-bestselling Shadow and Bone Trilogy are now available together in a set.', 22.30,7, 'https://www.students.oamk.fi/~n0peii00/kuvia/shadow.png', 3);
INSERT INTO kirja VALUES (7, 'They Both Die at the End','Adam Silvera',2017,'Englanti', 'Simon Schuster UK', 'A love story with a difference - an unforgettable tale of life, loss and making each day count in the NO. 1 BESTSELLING book of TIKTOK fame by Adam Silvera. ', 11.30,5, 'https://www.students.oamk.fi/~n0peii00/kuvia/die.png', 3);
INSERT INTO kirja VALUES (8, 'Turun romantiikka ','Jukka Sarjala',2020,'Suomi', 'SUOMALAISEN KIRJALLISUUDEN SEURA','Teos esittelee Keisarillisen Turun yliopiston opiskelijoiden ja nuorten maistereiden aatteellis-kirjallista liikehdintää, varhaisromantiikkaa, Suomessa ja osin Ruotsissakin. ', 24.30,22, 'https://www.students.oamk.fi/~n0peii00/kuvia/turku.png',3);
INSERT INTO kirja VALUES (9, 'Usvatuulen valtakunta','Sarah J. Maas',2020,'Suomi', 'Gummerus','Henkeäsalpaavan fantasiasarjan toinen osa. Haltioita uhannut vaara on voitettu, mutta hintana oli Feyren ihmisyys. Kuolemattomuus ei ole lievittänyt Feyren tuskaa. Hän joutui uhraamaan liian paljon pelastaakseen Tamlinin, sydämensä valitun.', 24.95,2, 'https://www.students.oamk.fi/~n0peii00/kuvia/usva.png', 4);
INSERT INTO kirja VALUES (10, 'Kummitustarinoita','M.R. James',2019,'Suomi', 'Basam Books', 'Viktoriaaninen herrasmies ja kirjanoppinut, nykyaikaisten yliluonnollisten kauhutarinoiden isä panee parastaan luomalla selittämätöntä tunnelmaa ja hitaasti yltyvää kauhun ilmapiiriä.', 20.90,5, 'https://www.students.oamk.fi/~n0peii00/kuvia/kummitus.png',1);
INSERT INTO kirja VALUES (11, 'Junji Itos Cat Diary: Yon & Mu CE','Junji Ito',2021,'Englanti', 'Kodansha America, Inc','Is there anything spookier than a silent feline, eyes glinting, stalking you in the night...IN YOUR OWN HOME??', 27.90,14, 'https://www.students.oamk.fi/~n0peii00/kuvia/junji.png',1);
INSERT INTO kirja VALUES (20, 'Hogfather','Terry Pratchet',2013,'Englanti', 'Orion Pub', 'A beautiful gift-edition hardback of the classic Discworld novel.', 44.30,1, 'https://www.students.oamk.fi/~n0peii00/kuvia/karju.png', 4);
INSERT INTO kirja VALUES (19, 'Throne of Glass - Aamunkoiton torni','Sarah J. Maas',2021,'Suomi', 'Gummerus','Kuninkaallisen vartioston entinen kapteeni vahingoittui lasipalatsin sortuessa. Lojaalius, voima ja ammatillinen asema ovat olleet hänen elämänsä kulmakivet, mutta kuninkaan antama kuolinisku on riistänyt Chaolilta kaiken.', 25,11, 'https://www.students.oamk.fi/~n0peii00/kuvia/torni.png',4);
INSERT INTO kirja VALUES (18, 'Harry Potter ja Feeniksin kilta','J.K. Rowling',2015,'Suomi', 'Tammi','Harry kohtaa ankeuttajat ennen kuin lukuvuosi ehtii alkaa, koulun uusi opettaja ottaa hänet silmätikukseen ja arpea särkee polttavasti. Lisäksi Harry näkee niin merkillisiä unia, että pelkää menettävänsä järkensä.', 14.30,14, 'https://www.students.oamk.fi/~n0peii00/kuvia/potter.png',4);
INSERT INTO kirja VALUES (17, 'Haltiain verta – The Witcher – Noituri 3','Andrzej Sapkowski',2012,'Suomi', 'WSOY','Noituri Geralt elää syrjässä sotaa enteileviltä huhuilta. Suurin syy piiloutumiseen on palavasta kaupungista pelastettu Ciri-tyttö, prinsessa, jonka suonissa virtaa haltiakansan taikavoimainen veri.', 21.30,14, 'https://www.students.oamk.fi/~n0peii00/kuvia/noituri.png',4);
INSERT INTO kirja VALUES (16, 'Haudattu uhka','Risto Isomäki',2017,'Suomi', 'Tammi','Linnanjuhlat keskeytyvät dramaattisesti vieraiden rajuun oksenteluun ja yleiseen kaaokseen. Muutamassa päivässä valtaosa Suomen politiikan tärkeimmistä tekijöistä kuolee säteilymyrkytykseen.', 6.90,2, 'https://www.students.oamk.fi/~n0peii00/kuvia/uhka.png',2);
INSERT INTO kirja VALUES (15, 'Budapestin vakooja','Vilmos Kondor',2014,'Suomi', 'Tammi','Budapest noir -sarjan kolmannessa osassa Zsigmond Gordon jäljittää vakoojaa ja törmää sodan partaalla roikkuvan Unkarin poliittisiin kiemuroihin.', 12.50,3, 'https://www.students.oamk.fi/~n0peii00/kuvia/vakooja.png',2);
INSERT INTO kirja VALUES (14, 'Aave','Jo Nesbø',2017,'Suomi', 'Johnny Kniga','Harry Hole palaa Osloon oltuaan kolme vuotta ulkomailla. Hän haluaa tutkia Guston murhaa, mutta tapaus on jo suljettu; nuori narkkari ilmeisesti ammuttiin huumeriidan päätteeksi.', 7.90,10, 'https://www.students.oamk.fi/~n0peii00/kuvia/aave.png',2);
INSERT INTO kirja VALUES (13, 'Mitä enemmän verta','Stephen King',2021,'Suomi', 'Tammi', 'Neljä puhuttelevaa, yllättävää tarinaa, joissa onnen pilkahdukset ovat yhtä voimallisia kuin tuonpuoleisen kauhut. Humoristinen, kypsä, jopa hellä – kuulostaako Kauhun kuninkaalta? Saatat yllättyä!', 19.90,50, 'https://www.students.oamk.fi/~n0peii00/kuvia/verta.png',1);
INSERT INTO kirja VALUES (12, 'Lava - kauhu ja himo ','Krista Launor',2017,'Suomi', 'Avain', 'Kirjassa esiintyminen nähdään laajasti; se liittyy luennointiin mutta myös juhlapuheisiin, työpaikkahaastatteluihin, pitchauksiin ja myyntipresentaatioihin.', 28.30,4, 'https://www.students.oamk.fi/~n0peii00/kuvia/lava.png',1);

/* ASIAKAS */
CREATE TABLE asiakas (asid integer primary key auto_increment, astunnus CHAR(10), asetunimi CHAR(50) NOT NULL, assukunimi CHAR(50) NOT NULL,asosoite CHAR(50) NOT NULL,postinro CHAR(5), postitmp CHAR(10), puhelin CHAR(10),email CHAR(30)) ;
INSERT INTO asiakas VALUES (1, 'iipi','Iida','Peltonen','Iidantie 9','33720','Tampere',112, 'n0peii00@dtudents.oamk.fi') ;
INSERT INTO asiakas VALUES (2, 'speedy','Speedy','Keinonen','Hornantie 666','38300','Mänttä',0401234556, 'speedy@speedy.fi') ;
INSERT INTO asiakas VALUES (3, 'seppo','Seppo','Taalasmaa','Tie 6','35300','Turku',0404567892, 'seppo@salkkarit.fi') ;

/* TILAUS */
CREATE TABLE tilaus (tilausnro INTEGER primary key auto_increment NOT NULL,asid integer NOT NULL, pvm timestamp default current_timestamp, tila CHAR(1),CONSTRAINT tilaus_asiakas_fk FOREIGN KEY (asid)  REFERENCES asiakas (asid)) ; 
INSERT INTO tilaus VALUES (1,1,'2021-11-08','T');
INSERT INTO tilaus VALUES (2,1,'2021-11-08','L');
INSERT INTO tilaus VALUES (3,2,'2021-11-09','M');
INSERT INTO tilaus VALUES (4,3,'2021-11-01','T');

/* TILAUSRIVI */
CREATE TABLE tilausrivi (tilausnro INTEGER NOT NULL,kirjaid INTEGER, kpl INTEGER,CONSTRAINT tilausrivi_fk FOREIGN KEY (tilausnro) REFERENCES tilaus(tilausnro), CONSTRAINT tilausrivi_kirja_fk FOREIGN KEY (kirjaid)   REFERENCES kirja (kirjaid));
INSERT INTO tilausrivi VALUES (1,1,2); 
INSERT INTO tilausrivi VALUES (2,6,1);
INSERT INTO tilausrivi VALUES (2,11,2);
INSERT INTO tilausrivi VALUES (2,12,1);
INSERT INTO tilausrivi VALUES (3,7,9); 
INSERT INTO tilausrivi VALUES (3,20,1);
INSERT INTO tilausrivi VALUES (3,3,3);
INSERT INTO tilausrivi VALUES (4,2,1); 

/* ADMIN */
CREATE TABLE user (userid integer primary key auto_increment,firstname VARCHAR(50), lastname VARCHAR(50), username VARCHAR(50),password VARCHAR(10));
INSERT INTO user VALUES (1, 'Iso','Pomo','admin','admin'); 

