-- Create the database
DROP DATABASE IF EXISTS scheduling_application;
CREATE DATABASE scheduling_application;
USE scheduling_application;  -- MySQL command

-- create table
CREATE TABLE accounts(
    accountID INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    accountType VARCHAR(255) NOT NULL
);

CREATE TABLE users(
    usersID INT (11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    usersUsername VARCHAR(255) NOT NULL,
    usersPassword VARCHAR(255) NOT NULL,
    usersName VARCHAR(255) NOT NULL,
    usersEmail VARCHAR(255) NOT NULL,
    accountID INT,
    FOREIGN KEY (accountID) REFERENCES accounts(accountID)
);

CREATE TABLE available_appointment (
    availableID  INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    availableDate DATE NOT NULL,
    availableStart VARCHAR(255) NOT NULL,
    availableEnd VARCHAR(255) NOT NULL,
    available BOOLEAN DEFAULT '0' NOT NULL
);

CREATE TABLE scheduled_appointment (
    course VARCHAR(255) NOT NULL,
    cSection VARCHAR (255) NOT NULL,
    platform VARCHAR (255) NOT NULL,
    comment VARCHAR (255) NOT NULL,
    usersID INT,
    availableID INT,
    FOREIGN KEY (usersID) REFERENCES users(usersID) ON DELETE CASCADE,
    FOREIGN KEY (availableID) REFERENCES available_appointment(availableID),
    CONSTRAINT scheduledPK PRIMARY KEY (usersID, availableID)
);

-- insert data into the database
INSERT INTO accounts VALUES
(1, 'instructor'),
(2, 'student');

INSERT INTO available_appointment (availableDate, availableStart, availableEnd) VALUES
('2020-12-01', '12:00pm', '12:15pm'),
('2020-12-01', '12:15pm', '12:30pm'),
('2020-12-01', '12:30pm', '12:45pm'),
('2020-12-01', '12:45pm', '1:00pm'),
('2020-12-03', '3:00pm', '3:15pm'),
('2020-12-03', '3:15pm', '3:30pm'),
('2020-12-03', '3:30pm', '3:45pm'),
('2020-12-03', '3:45pm', '4:00pm');

INSERT INTO users VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'instructor', 'instructor@gmail.com', 1);