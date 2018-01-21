##drop table Clients;
##drop table AccountTypes;
##drop table Identis;
##drop table IdentiTypes;
##drop table accounts;

CREATE TABLE Clients(
id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
name VARCHAR(20) NOT NULL,
telephone int NOT NULL,
email VARCHAR(50) NOT NULL,
clientNo VARCHAR(7) UNIQUE NOT NULL
);

CREATE TABLE IdentiTypes(
id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
name VARCHAR(50) NOT NULL
);

CREATE TABLE Identis(
id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
expire_date DATE NOT NULL,
idenType INT NOT NULL,
attachment VARCHAR(200) NOT NULL,
clientId INT NOT NULL,
CONSTRAINT identi_type_fk FOREIGN KEY(idenType) REFERENCES IdentiTypes(id),
CONSTRAINT identi_client_fk FOREIGN KEY(clientId) REFERENCES Clients(id)
);

CREATE TABLE AccountTypes(
id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
name VARCHAR(200) NOT NULL
);

CREATE TABLE accounts(
accountNo VARCHAR(50) PRIMARY KEY NOT NULL,
city VARCHAR(50) NOT NULL,
bank VARCHAR(50) NOT NULL,
expiredDate DATE NOT NULL,
clientId INT NOT NULL,
accType INT NOT NULL,
CONSTRAINT account_client_fk FOREIGN KEY(clientId) REFERENCES Clients(id),
CONSTRAINT account_type_fk FOREIGN KEY(accType) REFERENCES AccountTypes(id)
);

INSERT INTO IdentiTypes(name) VALUES('Passport');
INSERT INTO IdentiTypes(name) VALUES('Id Card');
INSERT INTO IdentiTypes(name) VALUES('Drive License');
INSERT INTO IdentiTypes(name) VALUES('Others');

INSERT INTO AccountTypes(name) VALUES('RMB');
INSERT INTO AccountTypes(name) VALUES('NZD');
INSERT INTO AccountTypes(name) VALUES('USD');
INSERT INTO AccountTypes(name) VALUES('AUD');
INSERT INTO AccountTypes(name) VALUES('HKD');



INSERT INTO Clients(name,telephone,email,clientNo) VALUES('A',1545,'asd@asd.com','M_10001');
INSERT INTO Clients(name,telephone,email,clientNo) VALUES('B',1545,'asd@asd.com','M_10002');
INSERT INTO Clients(name,telephone,email,clientNo) VALUES('C',1545,'asd@asd.com','M_10003');
