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
    s_date datetime,
    user_id int,
    Constraint fk_user_subject foreign key (user_id) references
    user(user_id)
);

create table comment (
    comment_id int auto_increment primary key,
    c_content text,
    c_date datetime,
    user_id int,
    subject_id int,
    Constraint fk_user_comment foreign key (user_id) references
    user(user_id),
    Constraint fk_subject_comment foreign key (subject_id) references
    forum_subject(subject_id)
);

-- subject default values
INSERT INTO forum_subject (s_title, s_content, user_id, s_date) VALUES
('Introduction à SQL', 'Les bases du langage SQL, SELECT, INSERT, UPDATE, DELETE.', 1, '2025-07-01 09:15:00'),
('Programmation en Python', 'Découverte de Python avec des exemples pratiques.', 1, '2025-07-05 14:30:00'),
('HTML et CSS', 'Créer une page web simple avec HTML5 et CSS3.', 1, '2025-07-10 08:45:00'),
('Algorithmes de tri', 'Explication des algorithmes comme le tri à bulles, rapide, etc.', 1, '2025-07-15 16:00:00'),
('Bases de données relationnelles', 'Comprendre les relations entre les tables et les clés étrangères.', 1, '2025-07-20 11:20:00');

-- admin values
INSERT INTO user (user_id, u_first_name, u_last_ame, u_birth_date, u_gender, u_email, u_mdp, u_image, u_type) VALUES
("1", "admin", "ADMIN", "2002-01-20", "M", "admin@gmail.com", "admin", "../assets/images/user.png", "1");

-- view subject / user
create or replace view v_subject_user as 
(select u.*, s.subject_id, s.s_title, s.s_content, s.s_date, s.s_media from forum_subject s 
join user u on s.user_id = u.user_id);

-- view subject / user
create or replace view v_comment_user as 
(select u.*, c.comment_id, c.c_content, c.subject_id, c.c_date from comment c
join user u on c.user_id = u.user_id);