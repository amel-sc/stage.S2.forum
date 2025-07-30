create database s_forum;
use s_forum;

create table user (
    user_id int auto_increment primary key,
    u_first_name varchar(100),
    u_last_name varchar(100),
    u_birth_date date,
    u_gender enum ("M", "F"),
    u_email text,
    u_mdp varchar(100), 
    u_image text,
    u_type int
);

create table forum_subject (
    subject_id int auto_increment primary key,
    s_title text,
    s_content text,
    user_id int,
    Constraint fk_user_subject foreign key (user_id) references
    user(user_id)
);

create table comment (
    comment_id int auto_increment primary key,
    c_content text,
    user_id int,
    subject_id int,
    Constraint fk_user_comment foreign key (user_id) references
    user(user_id),
    Constraint fk_subject_comment foreign key (subject_id) references
    forum_subject(subject_id)
);

-- subject default values
INSERT INTO subject (s_title, s_content, user_id) VALUES
('Introduction à SQL', 'Les bases du langage SQL, SELECT, INSERT, UPDATE, DELETE.', 1),
('Programmation en Python', 'Découverte de Python avec des exemples pratiques.', 1),
('HTML et CSS', 'Créer une page web simple avec HTML5 et CSS3.', 1),
('Algorithmes de tri', 'Explication des algorithmes comme le tri à bulles, rapide, etc.', 1),
('Bases de données relationnelles', 'Comprendre les relations entre les tables et les clés étrangères.', 1);

-- view subject / user
create or replace view v_subject_user as 
(select *, u.u_first_name, u.u_last_name, u.u_birth_date, u.u_gender, u.u_email, u.u_image from forum_subject s 
join user u on s.user_id = u.id_user);
