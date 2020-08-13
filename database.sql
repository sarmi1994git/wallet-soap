CREATE TABLE users(
	id int NOT NULL AUTO_INCREMENT,
	identification varchar(15) NOT NULL,
	firstname varchar(100) NOT NULL,
	lastname varchar(100) NOT NULL,
	email varchar(100) NOT NULL,
	phone varchar(15) NOT NULL,
	CONSTRAINT users_pk PRIMARY KEY (id)
);