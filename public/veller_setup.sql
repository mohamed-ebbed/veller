--USE VELLER

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