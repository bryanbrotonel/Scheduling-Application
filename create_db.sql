-- Create the my_guitar_shop1 database
DROP DATABASE IF EXISTS scheduling_application;
CREATE DATABASE scheduling_application;
USE scheduling_application;  -- MySQL command

-- create the tables
CREATE TABLE accounts (
    accountID  INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    accountType     VARCHAR(255)   NOT NULL
);

CREATE TABLE users (
    usersID  INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    usersUserName VARCHAR(255) NOT NULL,
    usersPassword VARCHAR(255) NOT NULL,
    usersName VARCHAR(255) NOT NULL,
    usersEmail VARCHAR(255) NOT NULL,
    accountID INT,
    FOREIGN KEY (accountID) REFERENCES accounts(accountID)
);

CREATE TABLE details (
    detailsID  INT (11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    detailsCourse  VARCHAR(255) NOT NULL,
    detailsSection VARCHAR(255) NOT NULL,
    detailsPlatform VARCHAR(255) NOT NULL,
    detailsComment VARCHAR(255) NOT NULL,
    usersID INT,
    FOREIGN KEY (usersID) REFERENCES users(usersID)
);

CREATE TABLE available_appointment (
    availableID  INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    availableDate DATE NOT NULL,
    availableStart VARCHAR(255) NOT NULL,
    availableEnd VARCHAR(255) NOT NULL
);

CREATE TABLE scheduled_appointment (
    usersID INT,
    detailsID INT,
    availableID INT,
    FOREIGN KEY (usersID) REFERENCES users(usersID),
    FOREIGN KEY (detailsID) REFERENCES details(detailsID),
    FOREIGN KEY (availableID) REFERENCES available_appointment(availableID),
    CONSTRAINT scheduledPK PRIMARY KEY (usersID, detailsID, availableID)
);

-- insert data into the database
INSERT INTO accounts VALUES
(1, 'instructor'),
(2, 'student');


INSERT INTO users VALUES
(1, 'lospina', 'lpassword', 'luis ospina', 'lospina@gmail.com', 2),
(2, 'bbrotonel', 'bpassword', 'bryan brotonel', 'bbrotonel@gmail.com', 2),
(3, 'mvong', 'mpassword', 'mike vong', 'mvong@gmail.com', 2),
(4, 'instructor', 'ipassword', 'the instructor', 'instructor@gmail.com', 1);


INSERT INTO details VALUES
(1, 'INFO 3135', 'S10', 'Zoom', 'Final exam question', 1),
(2, 'INFO 3135', 'S10', 'Big Blue Button', 'Grades question', 3);

INSERT INTO available_appointment VALUES
(1, '2020-12-01', '12:00pm', '12:15pm'),
(2, '2020-12-01', '12:15pm', '12:30pm'),
(3, '2020-12-01', '12:30pm', '12:45pm'),
(4, '2020-12-01', '12:45pm', '1:00pm'),
(5, '2020-12-03', '3:00pm', '3:15pm'),
(6, '2020-12-03', '3:15pm', '3:30pm'),
(7, '2020-12-03', '3:30pm', '3:45pm'),
(8, '2020-12-03', '3:45pm', '4:00pm');

INSERT INTO scheduled_appointment VALUES
(1, 1, 3),
(3, 2, 7);