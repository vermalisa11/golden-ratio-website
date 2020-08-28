CREATE TABLE user(
	userID int not null PRIMARY KEY,
	firstName varchar(100),
	lastName varchar(100),
	email varchar(200) not null,
	password varchar(200) not null,
	profileImage varchar(255),
	registerDate datetime


);