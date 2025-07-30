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

create table subject (
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
    subject(subject_id)
);

