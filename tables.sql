create database Project304;

use Project304;
create table flights (flightNo varchar(30) not null,
	departureLoc varchar(20) not null,
	destination varchar(20) not null,
	departureTime DATETIME not null,
	arrivalTime DATETIME not null,
	gateNo int not null,
	companyName varchar(20) not null,
	PRIMARY KEY (flightNo)
);

create table passengers (passportNo varchar(10) not null,
	name varchar(20) not null,
	specialAssistant varchar(30),
	class varchar(10) not null,
	seatNo varchar(10) not null,
	flightNo varchar(30) not null,
	PRIMARY KEY(passportNo)	
);

create table companies (companyName varchar(30) not null,
	deskLoc int not null,	
	PRIMARY KEY(companyName)
 );

 
 create table crews (sin int not null,
	crewName varchar(30) not null,
	crewTitle varchar(30) not null,
	startDate DATE,
	companyName varchar(30),
	flightNo varchar(30) not null,
	PRIMARY KEY(sin)
);

create table gate (gateNo int not null,
	flightNo varchar(30) not null,
	PRIMARY KEY(gateNo)	
);

ALTER table flights ADD foreign key (companyName) references companies(companyName);
ALTER table passengers ADD foreign KEY(flightNo) references flights(flightNo);
ALTER TABLE crews ADD FOREIGN KEY(companyName) references companies(companyName);
ALTER TABLE crews ADD FOREIGN KEY(flightNo) references flights(flightNo);
ALTER TABLE GATE ADD FOREIGN KEY(flightNo) references flights(flightNo);

insert into companies values 
	('Air Canada', 1);

insert into flights values
	('AC8083', 'Vancouver', 'Victoria', '2016-04-01 12:00:00', '2016-04-01 13:30:00', 1, 'Air Canada');

insert into passengers values('ab12345','xiaomai','erika','first','1C', 'AC8083');

insert into crews values('123456789','erika','captain','2015-01-01','Air Canada', 'AC8083');
	
	
insert into gate values(1,'AC8083');

insert into companies values 
	('American Airlines', 2);

insert into companies values 
	('WestJet', 3);

insert into companies values 
	('Air China', 4);


insert into flights values
	('AC156', 'Vancouver', 'Toronto', '2016-04-01 11:00:00', '2016-04-01 16:30:00', 2, 'Air Canada');

insert into flights values
	('WS1910', 'Vancouver', 'Orlando', '2016-04-01 07:00:00', '2016-04-01 15:30:00', 3, 'WestJet');

insert into flights values
	('AA504', 'Vancouver', 'Phoenix', '2016-04-01 9:30:00', '2016-04-01 12:00:00', 4, 'American Airlines');

insert into flights values
	('AA7148', 'Vancouver', 'Los Angeles', '2016-04-02 12:00:00', '2016-04-01 15:30:00', 1, 'American Airlines');

insert into flights values
	('CA991', 'Vancouver', 'Beijing', '2016-04-01 12:30:00', '2016-04-02 8:30:00', 3, 'Air China');

insert into passengers values('cd12345','Jessica','child','economy','15D', 'AC8083');

insert into passengers values('ab34567','Joe',' ','business','6A', 'AC156');

insert into passengers values('ef33333','Frank','wheelchair','first','4F', 'WS1910');

insert into passengers values('gh44444','Christine','senior','economy','13C', 'AA7148');

insert into passengers values('ij12345','Lee','','business','9B', 'CA991');

insert into crews values('987654321','Kevin','flight attendant','2014-09-01','WestJet', 'WS1910');

insert into crews values('123456777','Jack','flight attendant','2012-03-15','American Airlines', 'AA7148');

insert into crews values('123456888','Kim','flight attendant','2013-09-25','Air China', 'CA991');

insert into gate values(2,'AC156');

insert into gate values (3,'WS1910');

insert into gate values (4, '');

insert into gate values (5, '');