DROP database test;
CREATE DATABASE test;

use test;


/*CREATE TABLE donation (
										 donationId INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
										 firstname VARCHAR(30) NOT NULL,
										 lastname VARCHAR(30) NOT NULL,
										 email VARCHAR(50) NOT NULL,
										 age INT(3),
										 location VARCHAR(50),
										 date TIMESTAMP
); */

CREATE TABLE users (
										 id INT(11) ,
										 userId VARCHAR (30) NOT NULL,
										 firstname VARCHAR(30) NOT NULL,
										 lastname VARCHAR(30) NOT NULL,
										 email VARCHAR(50) NOT NULL,
										 age INT(3),
										 location VARCHAR(50),
										 address VARCHAR(50),
										 date TIMESTAMP,
										PRIMARY KEY (userId)
);




CREATE TABLE donation (
												donationId INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
												userId VARCHAR (30) NOT NULL,
												itemId VARCHAR(30) NOT NULL,
												itemName VARCHAR(30) NOT NULL,
												quantity INT(3),
												date TIMESTAMP,
												FOREIGN KEY (userId) REFERENCES users(userId)
);

CREATE TABLE item (
										itemId INT(11) UNSIGNED PRIMARY KEY,
										itemName VARCHAR(30) NOT NULL,
										date TIMESTAMP
);


