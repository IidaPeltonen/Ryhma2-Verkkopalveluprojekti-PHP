drop database if exists kauppa;

create database kauppa;

use kauppa;


/* KIRJA */

CREATE TABLE kirja (kirjaid int primary key auto_increment, kirjanimi CHAR(100) NOT NULL,kirjailija CHAR(100) NOT NULL,vuosi SMALLINT,kieli CHAR(10) NOT NULL,kustantaja CHAR(100) NOT NULL,trnimi CHAR(50),kuvaus CHAR(255) NOT NULL,hinta DECIMAL(5,2),saldo SMALLINT, kuva CHAR(225),CONSTRAINT kirjanimi_un UNIQUE (kirjanimi));
INSERT INTO kirja VALUES (1, 'Piina', 'Stephen King', 1989, 'Suomi', 'Tammi',  'Kauhukirjallisuus', 'Kirjailija Paul Sheldon joutuu auto-onnettomuuteen, mutta sairaalan sijasta hän päätyy omituisen ihailijan hoidettavaksi. Piina vain pahenee, kun Paul yrittää paeta ja saa samalla selville kuinka vaarallinen Annie todella onkaan.', 19.99,10, 'https://www.students.oamk.fi/~n0peii00/kuvia/piina.png');
INSERT INTO kirja VALUES (2,'Pienen hauen pyydystys','Juhani Karila',2019,'Suomi', 'Siltala', 'Fantasiakirjallisuus','Pienen hauen pyydystys on kielellisesti virtuoosimainen romaani, yhtä aikaa rakkausdraama ja myyttinen fantasia, kansankomedia ja ympäristötuhoa edistävän elämäntapamme säälimätön kritiikki. ', 29.95,7, 'https://www.students.oamk.fi/~n0peii00/kuvia/hauki.png');
INSERT INTO kirja VALUES (3,'Hobitti eli Sinne ja takaisin','J. R. R. Tolkien',2017,'Suomi', 'WSOY', 'Fantasiakirjallisuus','Hobitin 80-vuotislaitos sisältää Janssonin satumaiset kuvat alkuperäispiirroksista suoraan kuvattuina ja aiemmin vain Hobitin ensimmäisessä suomennoksessa Lohikäärmevuori käytetyn kannen.',24.95,15, 'https://www.students.oamk.fi/~n0peii00/kuvia/hobitti.png');
INSERT INTO kirja VALUES (4,'Isyyden oppitunti/Rakas viholliseni','Kim Lawrence, Nikki Logan',2021,'Suomi', 'Harlequin', 'Romantiikka','Rio tuijotti tyrmistyneenä hänen öitään vuosia piinanneen naisen sylissä olevan pikkutytön silmiin. Kuinka Gwen oli voinut salata häneltä totuuden? Kun hän tiesi, hän halusi tutustua tyttäreensä ja ottaa menetetyt vuodet takaisin.', 6.90,11, 'https://www.students.oamk.fi/~n0peii00/kuvia/isyys.png');
INSERT INTO kirja VALUES (5, 'Aavikon kruununperillinen ','Sharon Kendrick',2021,'Suomi', 'Harlequin', 'Romantiikka','Yllätysvauva: sokki šeikille ja Jacksonien bileprinsessalle! Epäviralliset lähteet kertovat, että Ella on raskaana! Ettei vain Cinder-Ella ehtisi avioitua ennen sisartaan - ja tuottaa valtakunnalle kruununperijää?', 4.50,1, 'https://www.students.oamk.fi/~n0peii00/kuvia/aavikko.png');
INSERT INTO kirja VALUES (6, 'Shadow and Bone Boxed Set ','Leigh Bardugo',2018,'Englanti', 'Hodder Stoughton', 'Romantiikka','See the Grishaverse come to life on screen with Shadow and Bone, now a Netflix original series. All three books in Leigh Bardugos New York Times-bestselling Shadow and Bone Trilogy are now available together in a set.', 22.30,7, 'https://www.students.oamk.fi/~n0peii00/kuvia/shadow.png');
INSERT INTO kirja VALUES (7, 'They Both Die at the End','Adam Silvera',2017,'Englanti', 'Simon Schuster UK', 'Romantiikka','A love story with a difference - an unforgettable tale of life, loss and making each day count in the NO. 1 BESTSELLING book of TIKTOK fame by Adam Silvera. ', 11.30,5, 'https://www.students.oamk.fi/~n0peii00/kuvia/die.png');
INSERT INTO kirja VALUES (8, 'Turun romantiikka ','Jukka Sarjala',2020,'Suomi', 'SUOMALAISEN KIRJALLISUUDEN SEURA', 'Romantiikka','Teos esittelee Keisarillisen Turun yliopiston opiskelijoiden ja nuorten maistereiden aatteellis-kirjallista liikehdintää, varhaisromantiikkaa, Suomessa ja osin Ruotsissakin. ', 24.30,22, 'https://www.students.oamk.fi/~n0peii00/kuvia/turku.png');
INSERT INTO kirja VALUES (9, 'Usvatuulen valtakunta','Sarah J. Maas',2020,'Suomi', 'Gummerus', 'Fantasiakirjallisuus','Henkeäsalpaavan fantasiasarjan toinen osa. Haltioita uhannut vaara on voitettu, mutta hintana oli Feyren ihmisyys. Kuolemattomuus ei ole lievittänyt Feyren tuskaa. Hän joutui uhraamaan liian paljon pelastaakseen Tamlinin, sydämensä valitun.', 24.95,2, 'https://www.students.oamk.fi/~n0peii00/kuvia/usva.png');
INSERT INTO kirja VALUES (10, 'Kummitustarinoita','M.R. James',2019,'Suomi', 'Basam Books', 'Kauhukirjallisuus','Viktoriaaninen herrasmies ja kirjanoppinut, nykyaikaisten yliluonnollisten kauhutarinoiden isä panee parastaan luomalla selittämätöntä tunnelmaa ja hitaasti yltyvää kauhun ilmapiiriä.', 20.90,5, 'https://www.students.oamk.fi/~n0peii00/kuvia/kummitus.png');
INSERT INTO kirja VALUES (11, 'Junji Itos Cat Diary: Yon & Mu Collectors Edition','Junji Ito',2021,'Englanti', 'Kodansha America, Inc', 'Kauhukirjallisuus','Is there anything spookier than a silent feline, eyes glinting, stalking you in the night...IN YOUR OWN HOME??', 27.90,14, 'https://www.students.oamk.fi/~n0peii00/kuvia/junji.png');
INSERT INTO kirja VALUES (20, 'Hogfather','Terry Pratchet',2013,'Englanti', 'Orion Pub', 'Fantasiakirjallisuus','A beautiful gift-edition hardback of the classic Discworld novel.', 44.30,1, 'https://www.students.oamk.fi/~n0peii00/kuvia/karju.png');
INSERT INTO kirja VALUES (19, 'Throne of Glass - Aamunkoiton torni','Sarah J. Maas',2021,'Suomi', 'Gummerus', 'Fantasiakirjallisuus','Kuninkaallisen vartioston entinen kapteeni vahingoittui lasipalatsin sortuessa. Lojaalius, voima ja ammatillinen asema ovat olleet hänen elämänsä kulmakivet, mutta kuninkaan antama kuolinisku on riistänyt Chaolilta kaiken.', 25,11, 'https://www.students.oamk.fi/~n0peii00/kuvia/torni.png');
INSERT INTO kirja VALUES (18, 'Harry Potter ja Feeniksin kilta','J.K. Rowling',2015,'Suomi', 'Tammi', 'Fantasiakirjallisuus','Harry kohtaa ankeuttajat ennen kuin lukuvuosi ehtii alkaa, koulun uusi opettaja ottaa hänet silmätikukseen ja arpea särkee polttavasti. Lisäksi Harry näkee niin merkillisiä unia, että pelkää menettävänsä järkensä.', 14.30,14, 'https://www.students.oamk.fi/~n0peii00/kuvia/potter.png');
INSERT INTO kirja VALUES (17, 'Haltiain verta – The Witcher – Noituri 3','Andrzej Sapkowski',2012,'Suomi', 'WSOY', 'Fantasiakirjallisuus','Noituri Geralt elää syrjässä sotaa enteileviltä huhuilta. Suurin syy piiloutumiseen on palavasta kaupungista pelastettu Ciri-tyttö, prinsessa, jonka suonissa virtaa haltiakansan taikavoimainen veri.', 21.30,14, 'https://www.students.oamk.fi/~n0peii00/kuvia/noituri.png');
INSERT INTO kirja VALUES (16, 'Haudattu uhka','Risto Isomäki',2017,'Suomi', 'Tammi', 'Jännitys','Linnanjuhlat keskeytyvät dramaattisesti vieraiden rajuun oksenteluun ja yleiseen kaaokseen. Muutamassa päivässä valtaosa Suomen politiikan tärkeimmistä tekijöistä kuolee säteilymyrkytykseen.', 6.90,2, 'https://www.students.oamk.fi/~n0peii00/kuvia/uhka.png');
INSERT INTO kirja VALUES (15, 'Budapestin vakooja','Vilmos Kondor',2014,'Suomi', 'Tammi', 'Jännitys','Budapest noir -sarjan kolmannessa osassa Zsigmond Gordon jäljittää vakoojaa ja törmää sodan partaalla roikkuvan Unkarin poliittisiin kiemuroihin.', 12.50,3, 'https://www.students.oamk.fi/~n0peii00/kuvia/vakooja.png');
INSERT INTO kirja VALUES (14, 'Aave','Jo Nesbø',2017,'Suomi', 'Johnny Kniga', 'Jännitys','Harry Hole palaa Osloon oltuaan kolme vuotta ulkomailla. Hän haluaa tutkia Guston murhaa, mutta tapaus on jo suljettu; nuori narkkari ilmeisesti ammuttiin huumeriidan päätteeksi.', 7.90,10, 'https://www.students.oamk.fi/~n0peii00/kuvia/aave.png');
INSERT INTO kirja VALUES (13, 'Mitä enemmän verta','Stephen King',2021,'Suomi', 'Tammi', 'Kauhukirjallisuus','Neljä puhuttelevaa, yllättävää tarinaa, joissa onnen pilkahdukset ovat yhtä voimallisia kuin tuonpuoleisen kauhut. Humoristinen, kypsä, jopa hellä – kuulostaako Kauhun kuninkaalta? Saatat yllättyä!', 19.90,50, 'https://www.students.oamk.fi/~n0peii00/kuvia/verta.png');
INSERT INTO kirja VALUES (12, 'Lava - kauhu ja himo ','Krista Launor',2017,'Suomi', 'Avain', 'Kauhukirjallisuus','Kirjassa esiintyminen nähdään laajasti; se liittyy luennointiin mutta myös juhlapuheisiin, työpaikkahaastatteluihin, pitchauksiin ja myyntipresentaatioihin.', 28.30,4, 'https://www.students.oamk.fi/~n0peii00/kuvia/lava.png');

/* ASIAKAS */

CREATE TABLE asiakas (asid integer primary key auto_increment, astunnus CHAR(10),asnimi CHAR(50) NOT NULL,asosoite CHAR(50) NOT NULL,postinro CHAR(5), postitmp CHAR(10), puhelin CHAR(10),email CHAR(30),CONSTRAINT asnimi_un UNIQUE (asnimi)) ;
INSERT INTO asiakas VALUES (1, 'iipi','Iida Peltonen','Iidantie 9','33720','Tampere',112, 'n0peii00@dtudents.oamk.fi') ;
INSERT INTO asiakas VALUES (2, 'speedy','Speedy Keinonen','Hornantie 666','38300','Mänttä',0401234556, 'speedy@speedy.fi') ;
INSERT INTO asiakas VALUES (3, 'seppo','Seppo Taalasmaa','Tie 6','35300','Turku',0404567892, 'seppo@salkkarit.fi') ;

/* TILAUS */

CREATE TABLE tilaus (tilausnro INTEGER primary key auto_increment NOT NULL,asid integer NOT NULL, pvm DATETIME NOT NULL, tila CHAR(1),CONSTRAINT tilaus_asiakas_fk FOREIGN KEY (asid)  REFERENCES asiakas (asid)) ; 
INSERT INTO tilaus VALUES (1,1,'2021-11-08','T');
INSERT INTO tilaus VALUES (2,1,'2021-11-08','L');
INSERT INTO tilaus VALUES (3,2,'2021-11-09','M');
INSERT INTO tilaus VALUES (4,3,'2021-11-01','T');



/* TILAUSRIVI */

CREATE TABLE tilausrivi (tilausnro INTEGER NOT NULL,rivinro SMALLINT NOT NULL,kirjaid INTEGER, kpl INTEGER,CONSTRAINT tilausrivi_pk PRIMARY KEY (tilausnro, rivinro),CONSTRAINT tilausrivi_kirja_fk FOREIGN KEY (kirjaid)   REFERENCES kirja (kirjaid));
INSERT INTO tilausrivi VALUES (1,1,1,2); 
INSERT INTO tilausrivi VALUES (2,1,6,1);
INSERT INTO tilausrivi VALUES (2,2,11,2);
INSERT INTO tilausrivi VALUES (2,3,12,1);
INSERT INTO tilausrivi VALUES (3,1,7,9); 
INSERT INTO tilausrivi VALUES (3,2,20,1);
INSERT INTO tilausrivi VALUES (3,3,3,3);
INSERT INTO tilausrivi VALUES (4,1,2,1); 
