SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;

CREATE TABLE `admin` (
  `EmployeeID` int(11) DEFAULT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `PhoneNumber` varchar(10) NOT NULL,
  `Email`    varchar(100) NOT NULL,
  `Birthday` varchar(10) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admin` (`EmployeeID`, `FullName`, `PhoneNumber`, `Birthday`, `Email` , `UserName`, `Password`) VALUES
(1, 'Parker Wong', '4031234567', '1998-08-23', 'admin@gmail.com', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99');

CREATE TABLE `users` (
  `UserID` int(11) DEFAULT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `PhoneNumber` varchar(10) DEFAULT NULL,
  `Email`    varchar(100) NOT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`UserID`, `FullName`, `PhoneNumber`, `Email`, `UserName`, `Password`) VALUES
(1, 'Zi Ang', '5871234567', 'ziang@gmail.com', 'ziang', '4860cc0a2d75bd2e25b45becfb9cc9e8');

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `AuthorName` varchar(159) DEFAULT NULL,
  `Birthday` varchar(10) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `authors` (`id`, `AuthorName`, `Birthday`, `Status`) VALUES
(1, 'E.K. Rowling', '2017-07-08', 'Active'),
(2, 'Charlie Brown', '1950-08-01', 'Deceased'),
(3, 'Producer Bob', '1977-04-01', 'Active');

CREATE TABLE `publishers` (
  `id` int(11) NOT NULL,
  `publishName` varchar(159) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `publishers` (`ID`, `publishName`) VALUES
(1, 'Oxford University Press'),
(2, 'Pearson Education Inc.');

CREATE TABLE `collection` (
  `id` int(11) NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `GenreID` int(11) DEFAULT NULL,
  `AuthorID` int(11) DEFAULT NULL,
  `PublishID` int(11) DEFAULT NULL,
  `ISBN` int(11) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `itemType` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `collection` (`id`, `Title`, `GenreID`, `AuthorID`, `PublishID`, `ISBN`, `Price`, `itemType`) VALUES
(1, 'php for dummies like me', 1, 1, 1, 222333, 20, 'Book'),
(3, 'sql for dummies like me', 1, 2, 1, 1111, 15, 'Book'),
(5, 'The adventures of SQLman', 4, 3, 2, 241, 50, 'DVD');

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `GenreName` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `genre` (`id`, `GenreName`) VALUES
(1, 'Reference'),
(2, 'History'),
(3, 'Science'),
(4, 'Fiction');

CREATE TABLE `rent` (
  `ISBN` int(11) NOT NULL,
  `CollectionID` int(11) NOT NULL,
  `UserID` varchar(100) NOT NULL,
  `rentDate` DATE DEFAULT NULL,
  `returnDate` DATE DEFAULT NULL,
  `overdue` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `rent` (`ISBN`, `CollectionID`, `UserID`, `rentDate`, `returnDate`, `overdue`) VALUES
(222333, 1, '1', '2019-03-09', '2019-04-02', 0);

CREATE TABLE `library` (
  `address` varchar(255) NOT NULL,
  `lName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `library` (`address`, `lName`) VALUES
('29-2934 Sommerset Place, SW, Calgary', 'Sommerset Public Library');

INSERT INTO `library` (`address`, `lName`) VALUES
('23 Varmoor Place, 32 Ave, NW, Calgary', 'Verisity Public Library');

CREATE TABLE `event` (
  `eLocation` varchar(255) NOT NULL,
  `startTime` DATETIME NOT NULL,
  `endTime` DATETIME NOT NULL,
  `eName` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `event` (`eLocation`, `startTime`, `endTime`, `eName`, `description`) VALUES
('Sommerset Public Library', '2019-02-10 13:00:00', '2019-02-10 15:00:00', 'Reading Event', 'This is a event that let readers could communicate what they read.');

CREATE TABLE `register` (
  `UserID` varchar(100) NOT NULL,
  `eLocation` varchar(255) NOT NULL,
  `startTime` DATETIME NOT NULL,
  `endTime` DATETIME NOT NULL,
  `eName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `library`
  ADD PRIMARY KEY (`lName`),
  ADD UNIQUE (`address`);

ALTER TABLE `event`
  ADD FOREIGN KEY (`eLocation`) REFERENCES `library`(`lName`),
  ADD CONSTRAINT PK_event PRIMARY KEY (`eLocation`, `startTime`, `endTime`, `eName`);

ALTER TABLE `register`
  ADD CONSTRAINT FK_register FOREIGN KEY (`eLocation`, `startTime`, `endTime`, `eName`) REFERENCES `event`(`eLocation`, `startTime`, `endTime`, `eName`),
  ADD CONSTRAINT PK_register PRIMARY KEY (`UserID`, `eLocation`, `startTime`, `endTime`, `eName`);

ALTER TABLE `rent`
  ADD CONSTRAINT PK_rent PRIMARY KEY (`ISBN`, `UserID`);

ALTER TABLE `admin`
  ADD PRIMARY KEY (`EmployeeID`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `collection`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ISBN` (`ISBN`);

ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `admin`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `publishers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

COMMIT;
