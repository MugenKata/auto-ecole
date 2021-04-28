Drop database if exists auto_ecole;
Create database auto_ecole;
Use auto_ecole;

Drop table if exists users;
Create table if not exists users (
    id_u int(11) not null auto_increment,
    nom varchar(50),
    prenom varchar(50),
    tel varchar(10) UNIQUE,
    email varchar(255) UNIQUE,
    mdp varchar(255),
    lvl int(11) default 1,
    adresse varchar(100),
    cp varchar(10),
    primary key (id_u)
) ENGINE=InnoDB;

Insert users values

-- Administrateur (lvl 3)
(1, "NOM", "Prenom", "0606060606", "admin@gmail.com", "107d348bff437c999a9ff192adcb78cb03b8ddc6", 3, "5 rue de CHEPAKOI", "77000"),

-- Moniteur (lvl 2)
(2, "NOM", 'Prenom', "0707070707", "moniteur@gmail.com", "107d348bff437c999a9ff192adcb78cb03b8ddc6", 2, "18, Avenue de CHEPAKOI", "87500"),

-- Élève (lvl 1)
(3, "NOM", "Prenom", "0808080808", "eleve@gmail.com", "107d348bff437c999a9ff192adcb78cb03b8ddc6", 1, "5 rue de CHEPAKOI", "78500");

-- Pour générer des (faux) utilisateurs -> https://www.fakenamegenerator.com/

-- 107d348bff437c999a9ff192adcb78cb03b8ddc6 : Azerty123
-- Pour hasher un mot de passe -> https://www.sha1.fr

Drop table if exists lessons;
Create table if not exists lessons (
    id_l int(11) not null auto_increment,
    titre varchar(50),
    description text,
    date_l datetime,
    date_fin datetime,
    id_e int(11),
    id_m int(11),
    primary key (id_l),
    foreign key (id_e) references users (id_u),
    foreign key (id_m) references users (id_u)
) ENGINE=InnoDB;

Insert into lessons values
(1, "Maitrise de la vitesse", "Conduite en voiture tout en contrôlant la vitesse", "2021-04-15 09:00:00", "2021-04-15 11:00:00", 3, 2),
(2, "Maitrise du volant", "Conduite en voiture tout en contrôlant le volant", "2021-04-21 10:00:00", "2021-04-21 12:00:00", 3, 2);

Drop table if exists messages;
Create table if not exists messages (
    id_exp int(11),
    id_dest int(11),
    date_envoi datetime,
    lu int(11) default 0,
    primary key (id_exp, id_dest),
    foreign key (id_dest) references users (id_u)
) ENGINE=InnoDB;

Insert into messages values
(1, 2, "2021-03-11 17:59:37", 0),
(2, 1, "2021-03-16 17:59:37", 1);
