-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2017 at 06:48 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `login`(IN `event` VARCHAR(50), IN `uname` VARCHAR(50), IN `pwd` VARCHAR(25), IN `cid` INT, IN `uemail` VARCHAR(50), IN `uphone` VARCHAR(50), IN `uage` INT, IN `ucity` VARCHAR(50), IN `ucountry` VARCHAR(50), IN `date_updated` DATETIME, IN `ustatus` INT, IN `pag` INT)
BEGIN

IF event="fetching" THEN
SELECT * FROM login;
END IF;


IF event="fetchname" THEN
SELECT * FROM login where name=uname;
END IF;

IF event="login" THEN
SELECT * FROM login WHERE name=uname AND password=pwd;
END IF;


IF event="fetch_for_update" THEN
SELECT * FROM login WHERE id=cid;
END IF;

IF event="fetch" THEN
SELECT * FROM login ORDER BY datee LIMIT pag,4;
END IF;

IF event="delete" THEN
DELETE FROM login WHERE id=cid;
END IF;

IF event="update" THEN
UPDATE login SET name=uname,password=pwd,email=uemail,phone=uphone,age=uage,
city=ucity,country=ucountry,datee=date_updated,status=ustatus 
WHERE id=cid;
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `order_details`(IN `event` VARCHAR(25), IN `pname` VARCHAR(50), IN `pprice` VARCHAR(5), IN `pquantity` VARCHAR(5), IN `cid` INT, IN `pid` INT)
BEGIN

if event="insert" THEN

insert into order_detail (product,price,quantity,product_id,customer_id) values(pname,
pprice,pquantity,pid,cid);
END IF;

IF event="fetch" THEN

SELECT * FROM order_detail WHERE customer_id=cid;
END IF;

IF event="delete" THEN
DELETE FROM order_detail WHERE customer_id=cid;
END IF;

IF event="delete_one" THEN
DELETE FROM order_detail WHERE customer_id=cid and product_id=pid;
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `paginations`(IN `event` VARCHAR(20), IN `ptype` VARCHAR(30))
    NO SQL
BEGIN

IF event="fetch_pro_type" THEN
select count(*) from product where type=ptype;
END IF;

IF event="fetch_pro" THEN
select count(*) from product;
END IF;

IF event="fetch_user" THEN


select count(*) from login;
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `payment`(IN `event` VARCHAR(25), IN `cid` INT, IN `total_payment` INT, IN `payment_method` VARCHAR(20), IN `ip_adress` INT, IN `payment_date` DATETIME, IN `reduce_price` INT)
    NO SQL
BEGIN

IF event="fetch" THEN
select * from payment WHERE customer_id=cid;
END IF;

IF event="fetch_total" THEN

SELECT SUM(payment.total_payment)as Total_Amount FROM payment WHERE payment.customer_id=cid;

END IF;

IF event="insert" THEN

insert INTO payment (total_payment,payment_method,customer_id,ip_adress,payment_date) VALUES(total_payment,payment_method,cid,ip_adress,         payment_date);

END IF;

IF event="delete" THEN
DELETE FROM payment WHERE customer_id=cid;
END IF;

IF event="update_one" THEN
update payment set payment.total_payment=payment.total_payment-reduce_price where customer_id=cid ;
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `product`(IN `event` VARCHAR(25), IN `pag` INT, IN `pnames` VARCHAR(50), IN `pprice` VARCHAR(5), IN `ptype` VARCHAR(30), IN `expiryy` DATETIME, IN `pdetail` VARCHAR(50), IN `pquant` INT, IN `pr_id` INT)
BEGIN

IF event="fetch" THEN
   SELECT *  FROM product WHERE type=ptype LIMIT pag,4 ;
   END IF;
   
   
IF event="fetch_inventory" THEN
   SELECT *  FROM product  LIMIT pag,4 ;
   END IF;
   

IF event="fetch_for_search" THEN
   SELECT *  FROM product ORDER BY type;
   END IF;
   



IF event="fetch_for" THEN
   SELECT *  FROM product WHERE pid=pr_id;
   END IF;
      
   
IF event="insert" THEN

insert into product (pname,price,type,expiry,details,quantity) values(pnames,pprice,
ptype,expiryy,pdetail,pquant);

END IF;

IF event="delete" THEN
DELETE FROM product WHERE pid=pr_id;
END IF;

IF event="search" THEN

select pid,pname,price,type,expiry from product where  pname LIKE pnames;
END IF;



IF event="update" THEN

UPDATE product SET pname=pnames,price=pprice,type=ptype,expiry=expiryy,
details=pdetail,quantity=pquant WHERE pid=pr_id;

END IF;

IF event="update_quant" THEN

update product INNER JOIN order_detail ON product.pname=order_detail.product SET product.quantity=product.quantity-order_detail.quantity WHERE product.pid=pr_id;

END IF;

   END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shipping_info`(IN `event` VARCHAR(25), IN `usid` INT, IN `fsname` VARCHAR(50), IN `lsname` VARCHAR(50), IN `addr` VARCHAR(40), IN `cont` VARCHAR(40), IN `cit` VARCHAR(30), IN `uphone` VARCHAR(20), IN `uemail` VARCHAR(40), IN `order_datee` DATETIME)
    NO SQL
BEGIN

IF event="fetch" THEN
select * from shipping_info WHERE uid=usid;
END IF;

IF event="insert" THEN

insert into shipping_info (fname,lname,address,country,city,phone,email,uid,order_date)
values(fsname,lsname,addr,cont,cit,uphone,uemail,usid,order_datee);

END IF;

IF event="update" THEN

UPDATE shipping_info SET fname=fsname,lname=lsname,address=addr,country=cont,city=cit,phone=uphone,email=uemail,uid=usid,order_date=order_datee WHERE uid=usid;

END IF;

IF event="delete" THEN
DELETE FROM shipping_info WHERE uid=usid;
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SIGNUP`(IN `event` VARCHAR(25), IN `uname` VARCHAR(50), IN `pwd` VARCHAR(50), IN `email` VARCHAR(50), IN `phone` VARCHAR(50), IN `age` INT, IN `city` VARCHAR(50), IN `country` VARCHAR(50), IN `datee` DATETIME)
BEGIN

IF event="signin" THEN
INSERT INTO login (name,password,email,phone,age,city,country,datee) VALUES(uname,pwd,email,phone,age,city,country,datee);
END IF;

IF event="fetching" THEN
select * from login WHERE name=uname;
END IF;

IF event="fetch" THEN
select * from login where name like uname; 
END IF;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `datee` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `password`, `email`, `phone`, `age`, `city`, `country`, `datee`, `status`) VALUES
(2, 'hamza', 'a10', 'hamza@gmail.com', '312122322', 22, 'karachi', 'pakistan', '0000-00-00 00:00:00', 1),
(5, 'umair', '777aaaaaaaaaanvh', 'umair@gmail.com', '03212913443', 88, 'Dubai', 'UAE', '0000-00-00 00:00:00', 0),
(9, 'hamid', '   1145', 'h@h', '44', 444, 'k', '5', '2017-01-09 17:39:21', 0),
(11, 'sssssqas', 'aaaaaaaaaaaa5555', 'a@a.com', '4565464655465465', 0, 'Select any one...', 'Select any one...', '0000-00-00 00:00:00', 0),
(18, 'yasirali', 'a4a4a4a4a4a4a', 'a@a.com', '474848484455486', 525, 'Lahore', 'Karachi', '0000-00-00 00:00:00', 0),
(19, 'amirr', 'aaaa46', 'a@a.com', '4822485222148248', 5, 'Karachi', 'Karachi', '0000-00-00 00:00:00', 0),
(21, 'ubitaa', 'a4a4a4a4a4a4a4a', 'a@a.com', '44846548454548648', 5, 'Karachi', 'Karachi', '2017-01-03 08:39:24', 0),
(22, 'aioaoaika', 'aa44444454555', 'a@a.com', '7471714411557755', 6, 'Karachi', 'Karachi', '0000-00-00 00:00:00', 0),
(25, '".$name."', '11', '', '', 0, '', '', '0000-00-00 00:00:00', 0),
(26, 'omar javed', 'as212121626', 'a@a.com', '21315215235458', 5, 'Karachi', 'Karachi', '2017-01-13 00:18:24', 0),
(27, 'hassan', 'a4565456648', 'a@a.com', '02121522215623355', 2, 'Karachi', 'Karachi', '2017-01-13 00:28:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `id` int(11) NOT NULL,
  `product` varchar(30) NOT NULL,
  `price` varchar(10) NOT NULL,
  `quantity` varchar(5) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `product`, `price`, `quantity`, `product_id`, `customer_id`) VALUES
(14, 'olpers', '112', '1', 1, 5),
(15, 'olpers', '112', '1', 1, 5),
(16, 'olpers', '112', '1', 1, 5),
(17, 'olpers', '112', '1', 1, 5),
(18, 'olpers', '112', '1', 1, 5),
(19, 'olpers', '112', '1', 1, 5),
(21, 'Dove Shampoo', '155', '1', 3, 5),
(22, 'olpers', '112', '1', 1, 5),
(23, 'Daal Moong', '130', '1', 4, 5),
(38, 'Blueband Butter', '130 P', '1', 19, 5),
(39, 'olpers', '112 P', '1', 1, 23),
(41, 'olpers', '112 P', '1', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL,
  `total_payment` int(11) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `ip_adress` int(11) NOT NULL,
  `payment_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `total_payment`, `payment_method`, `customer_id`, `ip_adress`, `payment_date`) VALUES
(9, -224, 'Direct Bank Transfer', 5, 0, '0000-00-00 00:00:00'),
(10, -224, 'Direct Bank Transfer', 5, 0, '0000-00-00 00:00:00'),
(11, -224, 'paypal', 5, 0, '0000-00-00 00:00:00'),
(12, -224, 'Cheque Payment', 5, 0, '0000-00-00 00:00:00'),
(13, -181, 'paypal', 5, 0, '0000-00-00 00:00:00'),
(14, -224, 'Direct Bank Transfer', 5, 0, '0000-00-00 00:00:00'),
(15, -206, 'Cheque Payment', 5, 0, '0000-00-00 00:00:00'),
(16, 314, 'Direct Bank Transfer', 5, 0, '0000-00-00 00:00:00'),
(17, -94, 'Direct Bank Transfer', 5, 0, '0000-00-00 00:00:00'),
(18, 426, 'Direct Bank Transfer', 5, 0, '0000-00-00 00:00:00'),
(19, -206, 'Direct Bank Transfer', 5, 0, '0000-00-00 00:00:00'),
(20, -46, 'paypal', 5, 0, '0000-00-00 00:00:00'),
(21, -16, 'paypal', 5, 0, '0000-00-00 00:00:00'),
(22, 144, 'Cheque Payment', 5, 0, '0000-00-00 00:00:00'),
(24, -206, 'Cheque Payment', 5, 0, '0000-00-00 00:00:00'),
(25, 112, 'Direct Bank Transfer', 23, 0, '0000-00-00 00:00:00'),
(26, -112, 'Direct Bank Transfer', 5, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `pid` int(11) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `expiry` date NOT NULL,
  `details` char(100) CHARACTER SET utf8 DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `price`, `type`, `expiry`, `details`, `quantity`) VALUES
(1, 'olpers', '112 P', 'Dairy', '2016-12-11', '1 litre Tetra pack', 0),
(2, 'Milk Pak', '112 PKR', 'Dairy', '2016-11-28', '1 litre Tetra Pack', 0),
(3, 'Dove Shampoo', '155 PKR', 'Health&Beauty', '2016-11-22', 'Protect from Hair fall', 3),
(4, 'Daal Moong', '130 PKR', 'pulses', '2016-12-31', 'Fresh daal/pulses', -2),
(5, 'lemon max bar', '30 PKR', 'detergent', '2016-08-23', 'dish washing bar', 5),
(6, 'Palmolive', '35 PKR', 'Health&Beauty', '2016-09-09', 'Beauty soap', 5),
(7, 'Everyday', '650 PKR', 'Dairy', '2017-08-18', 'powder Milk for tea', 0),
(8, 'Daal chana', '140 PKR', 'pulses', '2016-11-12', 'Fresh daal/pulses', -3),
(9, 'Daal Masoor', '150 PKR', 'pulses', '2016-09-14', 'Fresh daal/pulsess', -1),
(10, 'White chana', '90 PKR', 'pulses', '2016-09-15', 'Fresh daal/pulsess', 5),
(11, 'Black chana', '110 PKR', 'pulses', '2016-10-06', 'Fresh daal/pulsess', 5),
(12, 'Tapal family mixture', '425 PKR', 'Grocery', '2016-12-23', '450 mg Tea powder', 5),
(13, 'Vital ', '325 PKR', 'Grocery', '2017-01-25', 'Tea powder', 5),
(14, 'Dalda Ghee', '175 PKR', 'Grocery', '2016-09-25', '1 KG GHEE', 3),
(16, 'Pantene', '160 PKR', 'Health & Beauty', '2016-10-10', '175ml Shampoo', -2),
(17, 'Lipton Yellow Label', '450 PKR', 'Grocery', '2016-12-11', '450 mg Tea powder', 5),
(18, 'Areil', '230 P', 'detergent', '0000-00-00', '1 KG Washing powder', 0),
(19, 'Blueband Butter', '130 PKR', 'Dairy', '2016-09-28', 'BUTTER', 0),
(20, 'Bonus', '130 PKR', 'detergent', '2016-12-28', '1 kg Washing Powder', 4),
(21, 'Nido', '700 PKR', 'dairy', '0000-00-00', '1 KG Powder Milk', 5);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_info`
--

CREATE TABLE IF NOT EXISTS `shipping_info` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `address` varchar(40) NOT NULL,
  `country` varchar(25) NOT NULL,
  `city` varchar(25) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `uid` int(11) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping_info`
--

INSERT INTO `shipping_info` (`id`, `fname`, `lname`, `address`, `country`, `city`, `phone`, `email`, `uid`, `order_date`) VALUES
(7, 'a', 's', 'a', 'GB', 'aa', 'sca', 'asd@ada', 5, '0000-00-00 00:00:00'),
(9, 'ali', 'ansari', 'a', 'GB', 'aa', 'sca', 'asd@adaa', 5, '0000-00-00 00:00:00'),
(10, 'ali', 'ansari', 'a', 'GB', 'aa', 'hkhk', 'asdadaa@gmail.com', 5, '0000-00-00 00:00:00'),
(12, 'ali', 'ansari', 'a', 'GB', 'aa', 'hkhk', 'asdadaa@gmal.com', 5, '0000-00-00 00:00:00'),
(13, 'Amir', 'Ansar', 'asndlajdj', 'PK', 'karachi', '03131351523', 'aamir@gmail.com', 5, '0000-00-00 00:00:00'),
(14, 'ali', 'Ansar', 'l28', 'GB', 'karachi', '122131311', 'aamir@gmail.com.pk', 5, '0000-00-00 00:00:00'),
(15, 'hamza', 'ansari', 'l287', 'PK', 'islamabad', '0312221333', 'as@outlook.com', 5, '0000-00-00 00:00:00'),
(31, 'jj', 'll', 'jk', 'GB', 'jd', '021', 'n@f', 5, '0000-00-00 00:00:00'),
(32, 'l', 'u', 'k', 'GB', 'k', '2k', 'k@k', 5, '0000-00-00 00:00:00'),
(33, 'ff', 'g', 'g', 'GB', 'g', 'gg', 'g@g', 5, '0000-00-00 00:00:00'),
(34, 'jj', 'jh', 'jh', 'GB', 'h', 'h', 'h@d', 5, '0000-00-00 00:00:00'),
(35, 'fg', 'f', 'f', 'GB', 'f', 'df', 'f@f', 5, '0000-00-00 00:00:00'),
(36, 'hy', 'fr', 'rr', 'GB', 'r', 'fr', 'r@t', 5, '0000-00-00 00:00:00'),
(37, 'jq', 'j', 'j', 'GB', 'j', 'jjjj', 'jf', 5, '0000-00-00 00:00:00'),
(38, 'op', 'o', 'o', 'GB', ' c', 'klk', 'o2l', 5, '0000-00-00 00:00:00'),
(39, 'ljlkjlk', 'LNLK', 'lkj', 'GB', 'lkj', 'kllk', 'jj2njnj', 5, '0000-00-00 00:00:00'),
(40, 'gq', 'g', 'g', 'GB', 'g', 'g', 'gg', 5, '0000-00-00 00:00:00'),
(41, 'b', 'b', 'b', 'GB', 'b', 'b', 'bb', 5, '0000-00-00 00:00:00'),
(42, 'yy', 'y', 'y', 'GB', 'y', 'yyyy', 'yyy', 5, '0000-00-00 00:00:00'),
(43, 'far', 'ha', 'hh', 'GB', 'h', 'hhkkh', 'hh', 5, '0000-00-00 00:00:00'),
(45, 'kkkkkkkkkkk', 'llllllllllllll', 'jhjkk', 'GB', 'h', 'kkkk', 'khi', 5, '0000-00-00 00:00:00'),
(46, 'aaa', 'aaa', 'aa', 'GB', 'ka', '', 'aacom', 23, '0000-00-00 00:00:00'),
(47, 'a', '1', '4', 'GB', '4f', '', 'df', 5, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`password`),
  ADD UNIQUE KEY `email` (`email`,`phone`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `name_2` (`name`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `pname` (`pname`),
  ADD UNIQUE KEY `pname_2` (`pname`);

--
-- Indexes for table `shipping_info`
--
ALTER TABLE `shipping_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `address` (`address`,`phone`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `shipping_info`
--
ALTER TABLE `shipping_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
