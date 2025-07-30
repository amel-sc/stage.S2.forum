create database learn_JS;
use learn_JS;

-- travail
create table Travail (
    id_travail int primary key auto_increment,
    nom_travail varchar(100)
);

-- personne
create table Personne (
    id_personne int primary key auto_increment,
    nom_personne varchar(100),
    prenom_personne varchar(100)
);

-- liste personne
create table Liste_Personne (
    id_liste int primary key auto_increment,
    id_personne int,
    id_travail int,
    constraint fk_Personne foreign key (id_personne) references Personne(id_personne),
    constraint fk_travail foreign key (id_travail) references Travail(id_travail)
);

insert into Travail (nom_travail) values 
('Développeur'), 
('Designer'), 
('Professeur'),
('Ingénieur');

insert into Personne (nom_personne, prenom_personne) values
('Dupont', 'Jean'),
('Martin', 'Claire'),
('Durand', 'Pierre'),
('Lefebvre', 'Sophie');

insert into Liste_Personne (id_personne, id_travail) values
(1, 1), -- Jean Dupont est Développeur
(2, 2), -- Claire Martin est Designer
(3, 3), -- Pierre Durand est Professeur
(4, 4), -- Sophie Lefebvre est Ingénieur
(1, 2),
(1, 3),
(4, 2);

-- view personne to travail
create or replace view v_personne_travail as
select Personne.id_personne, Personne.nom_personne, Personne.prenom_personne, Travail.id_travail, Travail.nom_travail
from Personne join Liste_Personne on Personne.id_personne = Liste_Personne.id_personne
join Travail on Liste_Personne.id_travail = Travail.id_travail;