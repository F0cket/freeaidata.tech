CREATE DATABASE freeaidatabase;

CREATE TABLE users(id INT NOT NULL AUTO_INCREMENT, username varchar(50) NOT NULL, password varchar(225) NOT NULL, created_at datetime, PRIMARY KEY (id));

CREATE TABLE images(Account varchar(255), Subject varchar(225), File varchar(255), Dir varchar(255), Timestamp varchar(255));

CREATE TABLE auido(Account varchar(255), Subject varchar(225), File varchar(255), Dir varchar(255), Timestamp varchar(255));

CREATE TABLE texts(Account varchar(255), Subject varchar(225), File varchar(255), Dir varchar(255), Timestamp varchar(255));

CREATE TABLE videos(Account varchar(255), Subject varchar(225), File varchar(255), Dir varchar(255), Timestamp varchar(255));