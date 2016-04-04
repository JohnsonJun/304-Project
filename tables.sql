create database Project304;

use Project304;
create table flights (flightNo varchar(30) not null,
	departureLoc varchar(20) not null,
	destination varchar(20) not null,
	departureTime DATETIME not null,
	arrivalTime DATETIME not null,
	PRIMARY KEY (flightNo)
);

create table passengers (passportNo varchar(10) not null,
	name varchar(20) not null,
	PRIMARY KEY(passportNo)	
);

create table companies (companyName varchar(30) not null,
	deskLoc int not null,	
	PRIMARY KEY(companyName)
 );

 
 create table crews (sin int not null,
	crewName varchar(30) not null,
	startDate DATE,
	PRIMARY KEY(sin)
);

create table gate (gateNo int not null,
    gateloc varchar(30) not null,    
    PRIMARY KEY(gateNo)	
);

create table takes(seatNo varchar(10) not null,
	flightNo varchar(30) not null,
	passportNo varchar(10) not null,
	specialAssistant varchar(30),
	class varchar(10) not null
);

create table has(companyName varchar(20) not null,
    flightNo varchar(30) not null
);

create table works_in_c(companyName varchar(20) not null,
    sin int not null,
	crewTitle varchar(30) not null
);

create table works_in_f(flightNo varchar(30) not null,
    sin int not null
);

create table stops_at(flightNo varchar(30) not null,
    gateNo int not null
);


ALTER table takes ADD foreign KEY(flightNo) references flights(flightNo);
ALTER table takes ADD foreign KEY(passportNo) references passengers(passportNo);
ALTER table has ADD foreign key (companyName) references companies(companyName);
ALTER table has ADD foreign key (flightNo) references flights(flightNo);
ALTER TABLE works_in_c ADD FOREIGN KEY(companyName) references companies(companyName);
ALTER TABLE works_in_c ADD FOREIGN KEY(sin) references crews(sin);
ALTER TABLE works_in_f ADD FOREIGN KEY(flightNo) references flights(flightNo);
ALTER TABLE works_in_f ADD FOREIGN KEY(sin) references crews(sin);
ALTER TABLE stops_at ADD FOREIGN KEY(flightNo) references flights(flightNo);
ALTER TABLE stops_at ADD FOREIGN KEY(gateNo) references gate(gateNo);