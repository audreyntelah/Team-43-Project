-- Active: 1701339889526@@127.0.0.1@3306@fragrancedb

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Database: `fragrancedb`
-- --------------------------------------------------------

-- Table structure for table `admin`
CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password_hash` BINARY(60) NOT NULL, -- Assuming password hashing like bcrypt
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table `basket`
CREATE TABLE `basket` (
  `basketID` int(11) NOT NULL AUTO_INCREMENT,
  `sessionID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`basketID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table `category`
CREATE TABLE `category` (
  `categoryID` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table `customer`
CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password_hash` BINARY(60) NOT NULL, -- Assuming password hashing like bcrypt
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  PRIMARY KEY (`customerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table `customeraddress`
CREATE TABLE `customeraddress` (
  `addressID` int(11) NOT NULL AUTO_INCREMENT,
  `customerID` int(11) NOT NULL,
  `addressLine1` varchar(50) NOT NULL,
  `addressLine2` varchar(50) DEFAULT NULL,
  `postcode` varchar(8) NOT NULL,
  `country` varchar(15) DEFAULT 'UK',
  PRIMARY KEY (`addressID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table `discount`
CREATE TABLE `discount` (
  `discountID` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`discountID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table `orderitem`
CREATE TABLE `orderitem` (
  `itemID` int(11) NOT NULL AUTO_INCREMENT,
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` decimal(6,2) NOT NULL,
  `bottleSize` int(11) DEFAULT NULL,
  `engraving` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`itemID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table `orders`
CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL AUTO_INCREMENT,
  `paymentID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `total` decimal(6,2) NOT NULL,
  `discountID` int(11) DEFAULT NULL,
  PRIMARY KEY (`orderID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table `payment`
CREATE TABLE `payment` (
  `paymentID` INT NOT NULL AUTO_INCREMENT,
  `paymentType` VARCHAR(255) NOT NULL,
  `cardNumber` VARCHAR(19) NOT NULL,
  `expiryDate` DATE NOT NULL,
  `CVV` SMALLINT NOT NULL,
  `paymentName` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`paymentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table `product`
CREATE TABLE `product` (
  `productID` INT NOT NULL AUTO_INCREMENT,
  `categoryID` INT NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  `colour` VARCHAR(255) DEFAULT NULL,
  `scent` VARCHAR(255) DEFAULT NULL,
  `season` VARCHAR(255) DEFAULT NULL,
  `images` VARCHAR(1000) DEFAULT NULL,
  `saleID` INT DEFAULT NULL,
  PRIMARY KEY (`productID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table `productinventory`
CREATE TABLE `productinventory` (
  `inventoryID` int(11) NOT NULL AUTO_INCREMENT,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`inventoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table `review`
CREATE TABLE `review` (
  `reviewID` INT NOT NULL AUTO_INCREMENT,
  `productID` INT NOT NULL,
  `customerID` INT NOT NULL,
  `rating` INT NOT NULL,
  `comment` VARCHAR(2000) DEFAULT NULL,
  PRIMARY KEY (`reviewID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table `sale`
CREATE TABLE `sale` (
  `saleID` INT NOT NULL AUTO_INCREMENT,
  `salePercentage` FLOAT NOT NULL,
  `active` TINYINT(1) NOT NULL,
  PRIMARY KEY (`saleID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table `shoppingsession`
CREATE TABLE `shoppingsession` (
  `sessionID` int(11) NOT NULL AUTO_INCREMENT,
  `customerID` int(11) NOT NULL,
  PRIMARY KEY (`sessionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Indexes for each table

-- Indexes for table `basket`
ALTER TABLE `basket`
  ADD KEY `productID` (`productID`),
  ADD KEY `sessionID` (`sessionID`);

-- Indexes for table `customeraddress`
ALTER TABLE `customeraddress`
  ADD KEY `customerID` (`customerID`);

-- Indexes for table `orderitem`
ALTER TABLE `orderitem`
  ADD KEY `orderID` (`orderID`),
  ADD KEY `productID` (`productID`);

-- Indexes for table `orders`
ALTER TABLE `orders`
  ADD KEY `paymentID` (`paymentID`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `discountID` (`discountID`);

-- Indexes for table `product`
ALTER TABLE `product`
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `saleID` (`saleID`);

-- Indexes for table `productinventory`
ALTER TABLE `productinventory`
  ADD KEY `productID` (`productID`);

-- Indexes for table `review`
ALTER TABLE `review`
  ADD KEY `productID` (`productID`),
  ADD KEY `customerID` (`customerID`);

-- Indexes for table `shoppingsession`
ALTER TABLE `shoppingsession`
  ADD KEY `customerID` (`customerID`);

-- --------------------------------------------------------
COMMIT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`),
  ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`sessionID`) REFERENCES `shoppingsession` (`sessionID`);

--
-- Constraints for table `customeraddress`
--
ALTER TABLE `customeraddress`
  ADD CONSTRAINT `customeraddress_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`);

--
-- Constraints for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD CONSTRAINT `orderitem_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`),
  ADD CONSTRAINT `orderitem_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`paymentID`) REFERENCES `payment` (`paymentID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`discountID`) REFERENCES `discount` (`discountID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`saleID`) REFERENCES `sale` (`saleID`);

--
-- Constraints for table `productinventory`
--
ALTER TABLE `productinventory`
  ADD CONSTRAINT `productinventory_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`);

--
-- Constraints for table `shoppingsession`
--
ALTER TABLE `shoppingsession`
  ADD CONSTRAINT `shoppingsession_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`);

COMMIT;
