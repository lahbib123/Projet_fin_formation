CREATE DATABASE IF NOT EXISTS `drs_shop`;
USE `drs_shop`;
-- admins_accounts
CREATE TABLE `admins_accounts` (
    `ID` INT NOT NULL AUTO_INCREMENT,
    `fullName` VARCHAR(20) NOT NULL,
    `email` VARCHAR(60) NOT NULL,
    `password` VARCHAR(20) NOT NULL,
    `phone` CHAR(10) NOT NULL,
    `DOB` DATE NOT NULL,
    `gender` ENUM('male', 'female') NOT NULL,
    `city` VARCHAR(20) NOT NULL,
    `address` VARCHAR(100) NOT NULL,
    `DOR` TIMESTAMP NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE = InnoDB;
-- all_acounts
CREATE TABLE `all_accounts` (
    `account` VARCHAR(60) NOT NULL,
    `user_admin` ENUM('user', 'admin') NOT NULL,
    PRIMARY KEY (`account`)
) ENGINE = InnoDB;
-- feedback
CREATE TABLE `feedback` (
    `feedbackID` INT NOT NULL AUTO_INCREMENT,
    `feedbackOwnerID` INT NOT NULL,
    `feedbackOwnerName` VARCHAR(30) NOT NULL,
    `feedbackTitle` VARCHAR(30) NOT NULL,
    `feedbackBody` VARCHAR(2000) NOT NULL,
    PRIMARY KEY (`feedbackID`)
) ENGINE = InnoDB;
-- orders
CREATE TABLE `orders` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `orderSender` INT NOT NULL,
    `orderReceiver` INT NOT NULL,
    `idProduct` INT NOT NULL,
    `quntite` INT NOT NULL,
    `orderDate` TIMESTAMP NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;
-- products
CREATE TABLE `products` (
    `idProduct` INT NOT NULL AUTO_INCREMENT,
    `productOwner` INT NOT NULL,
    `nameProduct` VARCHAR(20) NOT NULL,
    `productType` VARCHAR(20) NOT NULL,
    `priceProduct` INT NOT NULL,
    `quantity` INT NOT NULL,
    `productPicture` LONGBLOB NOT NULL,
    `productDescription` VARCHAR(1000) NOT NULL,
    `addedDate` TIMESTAMP NOT NULL,
    PRIMARY KEY (`idProduct`)
) ENGINE = InnoDB;
-- product_categories
CREATE TABLE `product_categories` (
    `categoryID` INT NOT NULL AUTO_INCREMENT,
    `categoryName` VARCHAR(60) NOT NULL,
    `categoriesPicture` LONGBLOB NOT NULL,
    PRIMARY KEY (`categoryID`),
    UNIQUE (`categoryName`)
) ENGINE = InnoDB;
-- users_accounts
CREATE TABLE `users_accounts` (
    `ID` INT NOT NULL AUTO_INCREMENT,
    `fullName` VARCHAR(20) NOT NULL,
    `email` VARCHAR(60) NOT NULL,
    `password` VARCHAR(20) NOT NULL,
    `phone` CHAR(10) NOT NULL,
    `DOB` DATE NOT NULL,
    `gender` ENUM('male', 'female') NOT NULL,
    `city` VARCHAR(20) NOT NULL,
    `address` VARCHAR(100) NOT NULL,
    `DOR` TIMESTAMP NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE = InnoDB;
-- store owner
INSERT INTO `admins_accounts` (
        `fullName`,
        `email`,
        `password`,
        `phone`,
        `DOB`,
        `gender`,
        `city`,
        `address`,
        `DOR`
    )
VALUES (
        '',
        'drissraiss25@gmail.com',
        'DRISSdriss25',
        '',
        '',
        'male',
        '',
        '',
        ''
    );
INSERT INTO `all_accounts` (`account`, `user_admin`)
VALUES ('drissraiss25@gmail.com', 'admin');