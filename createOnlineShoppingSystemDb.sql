DROP DATABASE IF EXISTS ONLINESHOPPINGSYSTEM;
CREATE DATABASE ONLINESHOPPINGSYSTEM;
USE ONLINESHOPPINGSYSTEM;

CREATE TABLE parts(
	pno		integer(5) 		not null,
	pname		varchar(30),
	qoh		integer,
	price		decimal(6,2),
	olevel		integer,
	primary key (pno));
    
CREATE TABLE customers (
	cno 		integer(10) 		not null 	AUTO_INCREMENT,
	cname		varchar(30),
	street		varchar(50),
	city		varchar(30),
	state		varchar(30),
	zip		integer(5),
	phone		char(12),
	email		varchar(50),
	password	varchar(15),
	primary key (cno));
ALTER TABLE customers AUTO_INCREMENT = 100;

CREATE TABLE cart(
	cartno 		integer(10)		not null 	AUTO_INCREMENT,
	cno 		integer(10)		not null,
	pno 		integer(5)		not null,
	qty 		integer,
	primary key (cartno, pno),
	foreign key (cno) references customers,
	foreign key (pno) references parts); 
    
CREATE TABLE orders (
	ono 		integer(5) 		not null 	AUTO_INCREMENT,
	cno 		integer(10),
	received 	date,
	shipped 	date,
	primary key (ono),
	foreign key (cno) references customers);
ALTER TABLE orders AUTO_INCREMENT = 1000;

create table odetails (
	ono 		integer(5) 		not null,
	pno 		integer(5) 		not null,
	qty 		integer,
	primary key (ono,pno),
	foreign key (ono) references orders,
	foreign key (pno) references parts);
