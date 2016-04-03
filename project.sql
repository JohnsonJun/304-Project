create table flights (flightNo varchar(30) not null,
	departureLoc varchar(20) not null,
	destination varchar(20) not null,
	departureTime DATETIME not null,
	arrivalTime DATETIME not null,
	gateNo int not null,
	companyName varchar(20) not null,
	PRIMARY KEY (flightNo),
	FOREIGN KEY (companyName) references companies,
);

create table passengers (passportNo varchar(10) not null,
	name varchar(20) not null,
	specialAssistant varchar(30),
	class varchar(10) not null,
	seatNo varchar(10) not null,
	flightNo varchar(30) not null,
	PRIMARY KEY(passportNo),
	FOREIGN KEY(flightNo) references flights,
);

create table companies (companyName varchar(30) not null,
	deskLoc int not null,
	flightNo varchar(30) not null,
	sin int not null,
	PRIMARY KEY(companyName)
	FOREIGN KEY(flightNo) references flights,
	FOREIGN KEY(sin) references crews,
 );

create table crews (sin int not null,
	crewName varchar(30) not null,
	crewTitle varchar(30) not null,
	startDate DATE,
	companyName varchar(30),
	flightNo varchar(30) not null,
	PRIMARY KEY(sin),
	FOREIGN KEY(companyName) references (companies),
	FOREIGN KEY(flightNo) references (flights),
);

create table gate (gateNo int not null,
	flightNo varchar(30) not null,
	PRIMARY KEY(gateNo),
	FOREIGN KEY(flightNo) references (flights),
);

insert into companies values 
	('Air Canada', 1, 100000001);
insert into companies values
	('Air Canada', 1, 100000002);
insert into companies values
	('Air Canada', 1, 100000003);
insert into companies values
	('Air Canada', 1, 100000004);
insert into companies values
	('Air Canada', 1, 100000005);
insert into companies values
	('Air Canada', 1, 100000006);
insert into companies values
	('Air Canada', 1, 100000007);
insert into companies values
	('Air Canada', 1, 100000008);
insert into companies values
	('Air Canada', 1, 100000009);
insert into companies values
	('Air Canada', 1, 100000010);
insert into companies values
	('Air Canada', 1, 100000011);
insert into companies values
	('Air Canada', 1, 100000012);
insert into companies values
	('Air Canada', 1, 100000013);
insert into companies values
	('Air Canada', 1, 100000014);
insert into companies values
	('Air Canada', 1, 100000015);
insert into companies values
	('Air Canada', 1, 100000016);
insert into companies values
	('Air Canada', 1, 100000017);
insert into companies values
	('Air Canada', 1, 100000018);

insert into companies values
	('American Airlines', 2, 100000019);
insert into companies values
	('American Airlines', 2, 100000020);
insert into companies values
	('American Airlines', 2, 100000021);
insert into companies values
	('American Airlines', 2, 100000022);
insert into companies values
	('American Airlines', 2, 100000023);
insert into companies values
	('American Airlines', 2, 100000024);
insert into companies values
	('American Airlines', 2, 100000025);
insert into companies values
	('American Airlines', 2, 100000026);
insert into companies values
	('American Airlines', 2, 100000027);
insert into companies values
	('American Airlines', 2, 100000028);
insert into companies values
	('American Airlines', 2, 100000029);

insert into companies values
	('WestJet', 3, 100000030);
insert into companies values
	('WestJet', 3, 100000031)
insert into companies values
	('WestJet', 3, 100000032);
insert into companies values
	('WestJet', 3, 100000033);
insert into companies values
	('WestJet', 3, 100000034);
insert into companies values
	('WestJet', 3, 100000035);
insert into companies values
	('WestJet', 3, 100000036);
insert into companies values
	('WestJet', 3, 100000037);
insert into companies values
	('WestJet', 3, 100000038);
insert into companies values
	('WestJet', 3, 100000039);
insert into companies values
	('WestJet', 3, 100000040);
insert into companies values
	('WestJet', 3, 100000041);
insert into companies values
	('WestJet', 3, 100000042);

insert into companies values
	('United Airlines', 4, 100000043);
insert into companies values
	('United Airlines', 4, 100000044);
insert into companies values
	('United Airlines', 4, 100000045);
insert into companies values
	('United Airlines', 4, 100000046);
insert into companies values
	('United Airlines', 4, 100000047);
insert into companies values
	('United Airlines', 4, 100000048);
insert into companies values
	('United Airlines', 4, 100000049);
insert into companies values
	('United Airlines', 4, 100000050);
insert into companies values
	('United Airlines', 4, 100000051);
insert into companies values
	('United Airlines', 4, 100000052);
insert into companies values
	('United Airlines', 4, 100000053);
insert into companies values
	('United Airlines', 4, 100000054);
insert into companies values
	('United Airlines', 4, 100000055);
insert into companies values
	('United Airlines', 4, 100000056);
insert into companies values
	('United Airlines', 4, 100000057);

insert into companies values
	('Air China', 5, 100000058);
insert into companies values
	('Air China', 5, 100000059);
insert into companies values
	('Air China', 5, 100000060);
insert into companies values
	('Air China', 5, 100000061);
insert into companies values
	('Air China', 5, 100000062);
insert into companies values
	('Air China', 5, 100000063);
insert into companies values
	('Air China', 5, 100000064);
insert into companies values
	('Air China', 5, 100000065);
insert into companies values
	('Air China', 5, 100000066);
insert into companies values
	('Air China', 5, 100000067);
insert into companies values
	('Air China', 5, 100000068);

insert into companies values
	('Delta Airlines', 6, 100000069);
insert into companies values
	('Delta Airlines', 6, 100000070);
insert into companies values
	('Delta Airlines', 6, 100000071);
insert into companies values
	('Delta Airlines', 6, 100000072);
insert into companies values
	('Delta Airlines', 6, 100000073);
insert into companies values
	('Delta Airlines', 6, 100000074);
insert into companies values
	('Delta Airlines', 6, 100000075);
insert into companies values
	('Delta Airlines', 6, 100000076);
insert into companies values
	('Delta Airlines', 6, 100000077);
insert into companies values
	('Delta Airlines', 6, 100000078);
insert into companies values
	('Delta Airlines', 6, 100000079);

insert into companies values
	('Alaska Airlines', 7, 100000079);
insert into companies values
	('Alaska Airlines', 7, 100000080)
insert into companies values
	('Alaska Airlines', 7, 100000081)
insert into companies values
	('Alaska Airlines', 7, 100000082)
insert into companies values
	('Alaska Airlines', 7, 100000083)
insert into companies values
	('Alaska Airlines', 7, 100000084)
insert into companies values
	('Alaska Airlines', 7, 100000085)
insert into companies values
	('Alaska Airlines', 7, 100000086)
insert into companies values
	('Alaska Airlines', 7, 100000087)
insert into companies values
	('Alaska Airlines', 7, 100000088)
insert into companies values
	('Alaska Airlines', 7, 100000089)
insert into companies values
	('Alaska Airlines', 7, 100000090)

insert into companies values
	('AeroMexico', 8, 100000091)
insert into companies values
	('AeroMexico', 8, 100000092)
insert into companies values
	('AeroMexico', 8, 100000093)
insert into companies values
	('AeroMexico', 8, 100000094)
insert into companies values
	('AeroMexico', 8, 100000095)
insert into companies values
	('AeroMexico', 8, 100000096)
insert into companies values
	('AeroMexico', 8, 100000097)
insert into companies values
	('AeroMexico', 8, 100000098)
insert into companies values
	('AeroMexico', 8, 100000099)


create table flights (flightNo varchar(30) not null,
	departureLoc varchar(20) not null,
	destination varchar(20) not null,
	departureTime DATETIME not null,
	arrivalTime DATETIME not null,
	gateNo int not null,
	companyName varchar(20) not null,
	PRIMARY KEY (flightNo)
)

insert into flights values
	('AC8083', 'Vancouver', 'Victoria', 2016-04-01 12:00:00, 2016-04-01 13:30:00, 1, 'Air Canada');

insert into flights values
	('AC156', 'Vancouver', 'Toronto', 2016-04-01 15:00:00, 2016-04-01 22:30:00, 1, 'Air Canada');

insert into flights values
	('AC230', 'Vancouver', 'Calgary', 2016-04-01 9:00:00, 2016-04-01 11:25:00, 1, 'Air Canada');

insert into flights values
	('AA504', 'Vancouver', 'Phoenix', 2016-04-01 9:30:00, 2016-04-01 12:00:00, 1, 'American Airlines');
	
insert into flights values
	('AA7148', 'Vancouver', 'Los Angeles', 2016-04-02 12:00:00, 2016-04-01 15:30:00, 1, 'American Airlines');

insert into flights values
	('WS1910', 'Vancouver', 'Orlando', 2016-04-01 07:00:00, 2016-04-01 15:30:00, 1, 'WestJet');
	
insert into flights values
	('AC8083', 'Vancouver', 'Victoria', 2016-04-01 12:00:00, 2016-04-01 13:30:00, 1, 'WestJet');

insert into flights values
	('AC8083', 'Vancouver', 'Victoria', 2016-04-01 12:00:00, 2016-04-01 13:30:00, 1, 'WestJet');

insert into flights values
	('AC8083', 'Vancouver', 'Victoria', 2016-04-01 12:00:00, 2016-04-01 13:30:00, 1, 'United Airlines');

insert into flights values
	('AC8083', 'Vancouver', 'Victoria', 2016-04-01 12:00:00, 2016-04-01 13:30:00, 1, 'United Airlines');

insert into flights values
	('AC8083', 'Vancouver', 'Victoria', 2016-04-01 12:00:00, 2016-04-01 13:30:00, 1, 'United Airlines');	

insert into flights values
	('CA991', 'Vancouver', 'Beijing', 2016-04-01 12:30:00, 2016-04-02 8:30:00, 1, 'Air China');

insert into flights values
	('CA991', 'Vancouver', 'Beijing', 2016-04-03 12:30:00, 2016-04-04 8:30:00, 1, 'Air China');

insert into flights values
	('CA991', 'Vancouver', 'Victoria', 2016-04-04 12:30:00, 2016-04-04 8:30:00, 1, 'Air China');


insert into flights values
	('AC8083', 'Vancouver', 'Victoria', 2016-04-01 12:00:00, 2016-04-01 13:30:00, 1, 'Delta Airlines');

insert into flights values
	('AC8083', 'Vancouver', 'Victoria', 2016-04-01 12:00:00, 2016-04-01 13:30:00, 1, 'Delta Airlines');
insert into flights values
	('AC8083', 'Vancouver', 'Victoria', 2016-04-01 12:00:00, 2016-04-01 13:30:00, 1, 'Alaska Airlines');

insert into flights values
	('AC8083', 'Vancouver', 'Victoria', 2016-04-01 12:00:00, 2016-04-01 13:30:00, 1, 'Alaska Airlines');
insert into flights values
	('AC8083', 'Vancouver', 'Victoria', 2016-04-01 12:00:00, 2016-04-01 13:30:00, 1, 'AeroMexico');
insert into flights values
	('AC8083', 'Vancouver', 'Victoria', 2016-04-01 12:00:00, 2016-04-01 13:30:00, 1, 'AeroMexico');