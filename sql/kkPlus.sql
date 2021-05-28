-- Creat database

CREATE DATABASE kkplus;

-- Tables created with primary keys.

CREATE TABLE `kkplus`.`customertbl`
( `customerId` INT(11) NOT NULL AUTO_INCREMENT ,
`firstName` VARCHAR(50) NOT NULL ,
`secondName` VARCHAR(50) NOT NULL ,
`email` VARCHAR(100) NOT NULL ,
`contactNumber` VARCHAR(20) NOT NULL ,
`firstAddress` VARCHAR(50) NOT NULL ,
`secondAddress` VARCHAR(50) NOT NULL ,
`postCode` VARCHAR(10) NOT NULL ,
`password` VARCHAR(300) NOT NULL ,
PRIMARY KEY (`customerId`)) ENGINE = InnoDB;

CREATE TABLE `kkplus`.`ordertbl`
( `orderId` INT NOT NULL AUTO_INCREMENT ,
  `product_id` INT,
  `customer_id` INT,
  `qty` INT(2) NOT NULL ,
  `price` INT(4) NOT NULL ,
  `timeDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
PRIMARY KEY (`orderId`)) ENGINE = InnoDB;

CREATE TABLE `kkplus`.`orderplustbl`
( `plusId` INT(11) NOT NULL AUTO_INCREMENT ,
`customer_id` INT(11) NOT NULL ,
`totalCost` INT NOT NULL ,
`dateStamp` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,
PRIMARY KEY (`plusId`)) ENGINE = InnoDB;

CREATE TABLE `kkplus`.`foodtypetbl`
( `typeId` INT(11) NOT NULL AUTO_INCREMENT ,
`typeName` VARCHAR(50) NOT NULL ,
PRIMARY KEY (`typeId`)) ENGINE = InnoDB;

CREATE TABLE `kkplus`.`fooditemtbl`
( `id` INT(11) NOT NULL AUTO_INCREMENT ,
`type_id` INT NOT NULL ,
`foodName` VARCHAR(40) NOT NULL ,
`price` INT(10) NOT NULL ,
`description` VARCHAR(120) NOT NULL ,
PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `kkplus`.`feedbacktbl`
( `feedbackId` INT(11) NOT NULL AUTO_INCREMENT ,
`name` VARCHAR(80) NOT NULL ,
`feedBack` TEXT NOT NULL ,
PRIMARY KEY (`feedbackId`)) ENGINE = InnoDB;



-- Foreirgn key relationships added

ALTER TABLE `fooditemtbl` ADD FOREIGN KEY (`type_id`) REFERENCES `foodtypetbl`(`typeid`)
ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `ordertbl` ADD FOREIGN KEY (`product_id`) REFERENCES `fooditemtbl`(`id`)
ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `ordertbl` ADD FOREIGN KEY (`customer_id`) REFERENCES `customertbl`(`customerId`)
ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `orderplustbl` ADD FOREIGN KEY (`customer_id`) REFERENCES `customertbl`(`customerId`)
 ON DELETE RESTRICT ON UPDATE RESTRICT;


 -- populate Tables

 INSERT INTO `foodtypetbl` (`typeId`, `typeName`)
 VALUES (NULL, 'Pizza'),
 (NULL, 'Kebab'),
 (NULL, 'Burger'),
 (NULL, 'Sides'),
 (NULL, 'Drinks'),
 (NULL, 'Desserts');

 INSERT INTO `fooditemtbl` (`id`, `type_id`, `foodName`, `price`, `description`)
 VALUES (NULL, '1', 'Margarita', '6', 'Cheese & Tomato Pizza'),
 (NULL, '1', 'Pepperoni', '7', 'Cheese & Tomato with pepperoni'),
 (NULL, '2', 'Doner', '6', 'Doner meat in pita bread'),
 (NULL, '2', 'Kofte', '7', 'Lamb kofte meat in pita bread'),
 (NULL, '3', 'Plain Burger', '5', 'Beef burger in bun'),
 (NULL, '3', 'Cheese Burger', '6', 'Beef burger in bun, with cheese'),
 (NULL, '4', 'Fries', '3', 'French fries'),
 (NULL, '4', 'Garlic Bread', '4', 'Garlic flavoured baguette'),
 (NULL, '5', 'Pepsi', '1', '330ml can of Pepsi'),
 (NULL, '5', 'Tango', '1', '330ml can of Tango'),
 (NULL, '6', 'Chocolate Fudge Cake', '3', 'Chocolate Fudge Cake Slive'),
 (NULL, '6', 'Ice cream', '2', '100ml tub of vanilla ice cream');
