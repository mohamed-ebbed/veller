CREATE TABLE User_account(
    id INT NOT NULL, 
    name varchar(50) NOT NULL,
    email varchar(50) NOT NULL,
    profile_picture varchar(15) NOT NULL DEFAULT 'default.png',
    country varchar(30) NOT NULL,
    city varchar(30),
    zip INT NOT NULL,
    password varchar(100) NOT NULL,
    phone_number varchar(15) NOT NULL,
    about TEXT NOT NULL,
    
    PRIMARY KEY (id)
);

create table Applicant(
    id INT NOT NULL,
    gender varchar(6) NOT NULL,
    day INT NOT NULL,
    month INT NOT NULL,
    resume TEXT NOT NULL,
    
    PRIMARY KEY(id),
    FOREIGN KEY(id) REFERENCES User_account(id) ON DELETE CASCADE ON UPDATE RESTRICT
);

CREATE TABLE Organization(
    id INT NOT NULL,
    field varchar(25) NOT NULL,
    type varchar(25) NOT NULL,
    
    PRIMARY KEY(id),
    FOREIGN KEY(id) REFERENCES User_account(id) ON DELETE CASCADE ON UPDATE RESTRICT
);

create table message(
    sent_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    sent_by INT NOT NULL,
    content TEXT NOT NULL,
    recieved_by INT NOT NULL,
    
    PRIMARY KEY(sent_at),
    FOREIGN KEY(sent_by) REFERENCES user_account(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(recieved_by) REFERENCES user_account(id) ON DELETE CASCADE ON UPDATE RESTRICT
);

create table education(
    applicant_id INT NOT NULL,
    start_date INT NOT NULL,
    end_date INT NOT NULL,
    degree varchar(20) NOT NULL,
    institution varchar(20) NOT NULL,
    
    PRIMARY KEY(applicant_id),
    FOREIGN KEY(applicant_id) REFERENCES applicant(id) ON DELETE CASCADE ON UPDATE RESTRICT
);

CREATE TABLE interests(
    applicant_id INT NOT NULL,
    interest varchar(20) NOT NULL,
    PRIMARY KEY(applicant_id),
    FOREIGN KEY(applicant_id) references applicant(id)
);


CREATE TABLE Opportunity (
	post_id INT NOT NULL,
	post_date DATE	NOT NULL DEFAULT Current_timestamp,
	expiration_date DATE NOT NULL,
	description TEXT NOT NULL,
	country VARCHAR(30),
	city VARCHAR(30),
	duration VARCHAR(50) NOT NULL,
	funded VARCHAR(20) NOT NULL,
	requirements TEXT NOT NULL,
	posted_by INTEGER  NOT NULL,
	type VARCHAR(15) NOT NULL,
	title VARCHAR(50) NOT NULL,
	PRIMARY KEY (post_id),
	FOREIGN KEY (posted_by) REFERENCES Organization ON DELETE CASCADE ON UPDATE RESTRICT
);

CREATE TABLE Volunteering(
	post_id	INT NOT NULL,
	previous_experience TEXT NOT NULL,
	PRIMARY KEY (post_id),
	FOREIGN KEY (post_id) REFERENCES Opportunity ON DELETE CASCADE ON UPDATE RESTRICT
);

CREATE TABLE Contest(
	post_id INT NOT NULL,
	prizes TEXT,
	specialization VARCHAR(50) NOT NULL,
	PRIMARY KEY (post_id),
	FOREIGN KEY (post_id) REFERENCES Opportunity ON DELETE CASCADE ON UPDATE RESTRICT
);

CREATE TABLE Internship(
	post_id INT NOT NULL,
	specialization VARCHAR(50) NOT NULL,
	paid BIT NOT NULL DEFAULT 0,
	PRIMARY KEY (post_id),
	FOREIGN KEY (post_id) REFERENCES Opportunity ON DELETE CASCADE ON UPDATE RESTRICT
);

CREATE TABLE Exchange_Program(
	post_id INT NOT NULL,
	specialization VARCHAR(50) NOT NULL,
	PRIMARY KEY (post_id),
	FOREIGN KEY (post_id) REFERENCES Opportunity ON DELETE CASCADE ON UPDATE RESTRICT
);

CREATE TABLE Scholarship (
	post_id INT NOT NULL,
	specialization VARCHAR(50) NOT NULL,
	paid BIT NOT NULL DEFAULT 0,
	type VARCHAR(20),
	PRIMARY KEY (post_id),
	FOREIGN KEY (post_id) REFERENCES Opportunity ON DELETE CASCADE ON UPDATE RESTRICT
);

CREATE TABLE Tags(
	post_id INT NOT NULL,
	tag VARCHAR(20) NOT NULL,
	PRIMARY KEY(post_id, tag),
	FOREIGN KEY (post_id) REFERENCES Opportunity ON DELETE CASCADE ON UPDATE RESTRICT
);

CREATE TABLE Applicable_Countries (
	post_id INT NOT NULL,
	country VARCHAR(30) NOT NULL,
	PRIMARY KEY (post_id, country),
	FOREIGN KEY (post_id) REFERENCES Exchange_Program ON DELETE CASCADE ON UPDATE RESTRICT
);

CREATE TABLE Apply_For (
	id INT NOT NULL,
	post_id INT NOT NULL,
	PRIMARY KEY(id, post_id),
	FOREIGN KEY (id) REFERENCES Applicant,
	FOREIGN KEY (post_id) REFERENCES Opportunity ON DELETE CASCADE ON UPDATE RESTRICT
);

CREATE TABLE Supervisor(
	id INT NOT NULL,
	name VARCHAR(50) NOT NULL,
	email VARCHAR(50) NOT NULL,
	phone_number VARCHAR(15) NOT NULL,
	country VARCHAR(30) NOT NULL,
	city VARCHAR(30) NOT NULL,
	zip INT NOT NULL,
	password VARCHAR(100) NOT NULL,
	support_tickets_count INT NOT NULL DEFAULT 0,
	PRIMARY KEY (id)	
);

CREATE TABLE Support_Tickets(
	ticket_id INT NOT NULL,
	sent_at DATETIME NOT NULL DEFAULT Current_timestamp,
	content TEXT NOT NULL,
	solved BIT NOT NULL DEFAULT 0,
	solved_by INT,
	sent_by INT,
	PRIMARY KEY (ticket_id),
	FOREIGN KEY (solved_by) REFERENCES Supervisor ON DELETE SET NULL ON UPDATE RESTRICT
	FOREIGN KEY (sent_by) REFERENCES User_Account ON DELETE SET NULL ON UPDATE RESTRICT
);