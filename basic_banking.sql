SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE transactiontable (
  sno int(3) NOT NULL,
  sender text NOT NULL,
  receiver text NOT NULL,
  balance int(8) NOT NULL,
  datetime datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE viewcustomers (
  Id int NOT NULL,
  Customer_name varchar(20),
  Email_Id varchar(40),
  Balance int 
);

INSERT INTO viewcustomers (Id, Customer_name, Email_Id, Balance) VALUES
(1, 'Rick', 'rick@gmail.com', 60000),
(2, 'John', 'john@gmail.com', 30000),
(3, 'Jenny', 'jenny@gmail.com', 60000), 
(4, 'Luna', 'luna@gmail.com', 60000), 
(5, 'Harry', 'harry@gmail.com', 56000),
(6, 'Mark', 'mark@gmail.com', 58000), 
(7, 'Andy', 'andy@gmail.com', 58000), 
(8, 'Tom', 'tom@gmail.com', 60000), 
(9, 'Nikki', 'nikki@gmail.com', 80000), 
(10, 'Maya', 'maya@gmail.com', 61000);

ALTER TABLE transactiontable
  ADD PRIMARY KEY (sno);

--
-- Indexes for table `users`
--
ALTER TABLE viewcustomers
  ADD PRIMARY KEY (Id);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE transactiontable
  MODIFY sno int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE viewcustomers
  MODIFY ID int NOT NULL AUTO_INCREMENT;
COMMIT;
