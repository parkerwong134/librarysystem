SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `EmployeeID` varchar(100) DEFAULT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `PhoneNumber` varchar(10) NOT NULL,
  `Email`    varchar(100) NOT NULL,
  `Birthday` varchar(10) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admin` (`id`, `EmployeeID`, `FullName`, `PhoneNumber`, `Birthday`, `Email` , `UserName`, `Password`) VALUES
(1, '1', 'Parker Wong', '4031234567', '1998-08-23', 'admin@gmail.com', 'admin', 'password');

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `UserID` varchar(100) DEFAULT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `PhoneNumber` varchar(10) DEFAULT NULL,
  `Email`    varchar(100) NOT NULL,
  `Birthday` varchar(10) DEFAULT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `UserID`, `FullName`, `PhoneNumber`, `Email`, `Birthday`, `UserName`, `Password`) VALUES
(1, '1', 'Zi Ang', '5871234567', 'ziang@gmail.com', '1998-05-13', 'ziang', 'yihang');

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `BookName` varchar(255) DEFAULT NULL,
  `AuthorId` int(11) DEFAULT NULL,
  `ISBNNumber` int(11) DEFAULT NULL,
  `BookPrice` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `books` (`id`, `BookName`, `AuthorId`, `ISBNNumber`, `BookPrice`) VALUES
(1, 'php for dummies like me', 1, 222333, 20),
(3, 'sql for dummies like me', 4, 1111, 15);

ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `EmployeeID` (`EmployeeID`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UserID` (`UserID`);

ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

COMMIT;
