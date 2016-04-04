create database Project304;
use Project304;

drop table if exists flights;
drop table if exists passengers;
drop table if exists companies;
drop table if exists crews;
drop table if exists gate;
drop table if exists takes;
drop table if exists has;
drop table if exists works_in_c;
drop table if exists works_in_f;
drop table if exists stops_at;


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

create table takes (seatNo varchar(10) not null,
	flightNo varchar(30) not null,
	passportNo varchar(10) not null,
	specialAssistant varchar(30),
	class varchar(10) not null
);

create table has (companyName varchar(20) not null,
    flightNo varchar(30) not null
);

create table works_in_c (companyName varchar(20) not null,
    sin int not null,
	crewTitle varchar(30) not null
);

create table works_in_f (flightNo varchar(30) not null,
    sin int not null
);

create table stops_at (flightNo varchar(30) not null,
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

insert into companies values ('Air Canada', 1);
insert into companies values ('American Airlines', 2);
insert into companies values ('WestJet', 3);
insert into companies values ('Air China', 4);
	
insert into flights values('AC8083', 'Vancouver', 'Victoria', '2016-04-01 12:00:00', '2016-04-01 13:30:00' );	
insert into flights values('AC156', 'Vancouver', 'Toronto', '2016-04-01 11:00:00', '2016-04-01 16:30:00');
insert into flights values('WS1910', 'Vancouver', 'Orlando', '2016-04-01 07:00:00', '2016-04-01 15:30:00');
insert into flights values('AA504', 'Vancouver', 'Phoenix', '2016-04-01 9:30:00', '2016-04-01 12:00:00');
insert into flights values('AA7148', 'Vancouver', 'Los Angeles', '2016-04-02 12:00:00', '2016-04-01 15:30:00');
insert into flights values('CA991', 'Vancouver', 'Beijing', '2016-04-01 12:30:00', '2016-04-02 8:30:00');
insert into flights values('AC238', 'Vancouver', 'Orlando', '2016-04-03 11:30:00', '2016-04-03 6:30:00');
insert into flights values('AC240', 'Vancouver', 'Phoenix', '2016-04-05 18:30:00', '2016-04-05 23:30:00');
insert into flights values('AC288', 'Vancouver', 'Los Angeles', '2016-04-03 10:55:00', '2016-04-03 2:40:00');
insert into flights values('AC92', 'Vancouver', 'Beijing', '2016-04-04 11:30:00', '2016-04-05 7:30:00');

insert into passengers values('cd12345','Jessica');
insert into passengers values('ab12345','xiaomai');
insert into passengers values('ab34567','Joe');
insert into passengers values('ef33333','Frank');
insert into passengers values('gh44444','Christine');
insert into passengers values('ij12345','Lee');
insert into passengers values('aa11111','Lynn');
insert into passengers values('aa22222','Kyle');
insert into passengers values('aa33333','Johnson');
insert into passengers values('aa44444','Tony');
insert into passengers values('aa55555','Johnson');


insert into crews values('987654321','Kevin','2014-09-01');
insert into crews values('123456777','Jack','2012-03-15');
insert into crews values('123456888','Kim','2013-09-25');
insert into crews values('123456789','erika','2015-01-01');

insert into gate values(1,'t1');
insert into gate values(2,'t2');
insert into gate values (3,'t1');
insert into gate values (4, 't2');
insert into gate values (5, 't1');

insert into takes values('15D','AC8083','cd12345','child','economy');
insert into takes values('1C','AC8083','ab12345','','first');
insert into takes values('6A','AC156','ab34567','','business');
insert into takes values('4F','WS1910','ef33333','wheelchair','first');
insert into takes values('13C','AA7148','gh44444','senior','economy');
insert into takes values('9B','CA991','ij12345','','business');
insert into takes values('1H','AC156','aa11111','','first');
insert into takes values('3B','AC156','aa22222','','business');
insert into takes values('15A','AC156','aa33333','','economy');
insert into takes values('30C','AC156','aa44444','','economy');
insert into takes values('8C','AC156','aa55555','','first');

insert into has values('Air Canada','AC8083');
insert into has values('Air Canada','AC156');
insert into has values('WestJet','WS1910');
insert into has values('American Airlines','AA504');
insert into has values('American Airlines','AA7148');
insert into has values('Air China','CA991');
insert into has values('Air Canada','AC238');
insert into has values('Air Canada','AC240');
insert into has values('Air Canada','AC288');
insert into has values('Air Canada','AC92');


insert into works_in_c values('WestJet','987654321','flight attendant');
insert into works_in_c values('American Airlines','123456777','flight attendant');
insert into works_in_c values('Air China','123456888','flight attendant');
insert into works_in_c values('Air Canada','123456789','captain');



insert into works_in_f values('WS1910','987654321');
insert into works_in_f values('AA7148','123456777');
insert into works_in_f values('CA991','123456888');
insert into works_in_f values('AC8083','123456789');

insert into stops_at values('AC8083',1);
insert into stops_at values('AC156',2);
insert into stops_at values('WS1910',3);
insert into stops_at values('AA504',4);
insert into stops_at values('AA7148',1);
insert into stops_at values('CA991',3);
insert into stops_at values('AC238',2);
insert into stops_at values('AC240',4);
insert into stops_at values('AC288',2);
insert into stops_at values('AC92',1);


