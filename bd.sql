CREATE TABLE users(
	id int UNSIGNED auto_increment ,
	name varchar(30) NOT NULL,
	username varchar(50) NOT NULL,
	password varchar (50) NOT NULL,
	email varchar(100) NOT NULL,
	role VARCHAR(20) NOT NULL,
	created DATETIME DEFAULT NULL,
	modified DATETIME DEFAULT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE students(
	id int UNSIGNED auto_increment ,
	primary key(id)
);

CREATE TABLE monitors(
	id int UNSIGNED auto_increment ,
	name varchar(40) not null,
	discipline varchar(30) not null,
	primary key (id)
);

CREATE TABLE students_monitors(
	id int UNSIGNED auto_increment ,
	student_id int UNSIGNED auto_increment ,
	monitor_id int UNSIGNED auto_increment ,
	date_time_start datetime not null,
	date_time_fin datetime not null,
	status enum('Realizado','Aluno Faltou','Cancelado','Pendente') not null,
	feedback varchar(255) not null,
	primary key(id),
	foreign key (student_id) references students(id),
	foreign key (monitor_id) references monitors (id)
);


