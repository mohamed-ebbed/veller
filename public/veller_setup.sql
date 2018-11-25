CREATE DATABASE veller;

use veller;

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
    FOREIGN KEY(id) REFERENCES User_account(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Organization(
    id INT NOT NULL,
    field varchar(25) NOT NULL,
    type varchar(25) NOT NULL,
    
    PRIMARY KEY(id),
    FOREIGN KEY(id) REFERENCES User_account(id) ON DELETE CASCADE ON UPDATE CASCADE
);

create table message(
    sent_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    sent_by INT NOT NULL,
    content TEXT NOT NULL,
    recieved_by INT NOT NULL,
    
    PRIMARY KEY(sent_at),
    FOREIGN KEY(sent_by) REFERENCES user_account(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(recieved_by) REFERENCES user_account(id) ON DELETE CASCADE ON UPDATE CASCADE
);

create table education(
    applicant_id INT NOT NULL,
    start_date INT NOT NULL,
    end_date INT NOT NULL,
    degree varchar(20) NOT NULL,
    institution varchar(20) NOT NULL,
    
    PRIMARY KEY(applicant_id),
    FOREIGN KEY(applicant_id) REFERENCES applicant(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE interests(
    applicant_id INT NOT NULL,
    interest varchar(20) NOT NULL,
    PRIMARY KEY(applicant_id),
    FOREIGN KEY(applicant_id) references applicant(id)
);

