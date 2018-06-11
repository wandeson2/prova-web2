CREATE DATABASE 

CREATE TABLE users(
	id interger auto_increment UNSIGNED,
	name varchar(30) NOT NULL,
	username varchar(50) NOT NULL,
	password varchar (50) NOT NULL,
	email varchar(100) NOT NULL,
	PRUMARY KEY (id)
);

CREATE TABLE students(
	id interger auto_increment UNSIGNED,
	primary key(id)
);

CREATE TABLE monitors(
	id interger auto_increment UNSIGNED,
	name varchar(40) not null,
	discipline varchar(30) not null
);

CREATE TABLE students_monitors(
	id id interger auto_increment UNSIGNED,
	student_id interger auto_increment UNSIGNED,
	monitor_id interger auto_increment UNSIGNED,
	date_time_start datetime not null,
	date_time_fin datetime not null,
	status enum('Realizado','Aluno Faltou','Cancelado','Pendente') not null,
	feedback textarea not null,
	primary key(id)
);


