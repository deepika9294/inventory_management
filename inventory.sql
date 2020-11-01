
CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
   PRIMARY KEY (brand_id)
);

CREATE TABLE `users` (
  `user_id` int(4),
  `username` varchar(16) NOT NULL,
  `password` char(8) NOT NULL,
   PRIMARY KEY (user_id)
);

INSERT INTO  `users` (`user_id`, `username`, `password`) VALUES
(1, "Akanksha@shah", "Akkushah"),
(2, "Deepika@goyal", "Deeps");


INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(1, 'Nokia'),
(2, 'Samsung'),
(3, 'Sony'),
(4, 'Apple'),
(5, 'Western Digital'),
(6, 'Kingston'),
(7, 'OnePlus'),
(8, 'Motorola'),
(9, 'Transcend'),
(10, 'Dell');

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
);

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Mobile Phones'),
(2, 'Laptops'),
(3, 'Hard Drives'),
(4, 'Printers'),
(5, 'Monitors'),
(6, 'Speakers'),
(7, 'Pendrives'),
(8, 'Television'),
(9, 'CPU Casing'),
(10, 'Ear Phones'),
(11, 'Desktop');

CREATE TABLE `inventory_items` (
  `item_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
);

INSERT INTO `inventory_items` (`item_id`, `brand_id`, `item_name`,`price`, `category_id`) VALUES
(4, 5, 'WD Passport', '3000', 3),
(5,2,'Galaxy S7', "49000",1);


ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

ALTER TABLE `inventory_items`
  ADD PRIMARY KEY (`item_id`);

ALTER TABLE `inventory_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

CREATE TABLE `item_stocks` (
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `minimum_quantity` int(11) NOT NULL
);

INSERT INTO `item_stocks` (`item_id`, `quantity`, `minimum_quantity`) VALUES
(4, 5, 3),
(5, 4 ,1);

CREATE TABLE `customer` (
  `customer_id`  int(11),
  `customer_name` varchar(20) NOT NULL,
  `customer_email` varchar(30) NOT NULL,
  `customer_phone` char(10) NOT NULL,
  `customer_address` varchar(100),
   PRIMARY KEY(`customer_id`)
);

ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `customer`
  MODIFY `customer_phone` char(10) NOT NULL UNIQUE,
  MODIFY `customer_email` char(30) NOT NULL UNIQUE;
  

INSERT INTO `customer`(`customer_id`,`customer_name`,`customer_email`, `customer_phone`,`customer_address`) VALUES
(1, "Akanksha Shah", "akanksha@gmail.com", 8934767893, "Sangli, Mahrashtra" ),
(2, "Deepika Goyal", "deepika@gmail.com", 8934567893, "Pune, Mahrashtra" );

CREATE TABLE `transaction` (
  `transaction_id` int(11),
  `date` varchar(12),
  `mode` varchar(20),
  `discount` int(5),
  `selling_price` int(10),
  `amount` int(10),

  PRIMARY KEY(`transaction_id`)
);


ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

INSERT INTO `transaction` VALUES
(1, "17-09-2020", "card", 0, 6000, 6000);

CREATE TABLE `purchased`(
  item_id int(11) NOT NULL,
  customer_id int(11) NOT NULL,
  quantity int(10),
  transaction_id int(11) NOT NULL
  -- PRIMARY KEY (`item_id`,`customer_id`, `transaction_id`),
  -- FOREIGN KEY (`item_id`) REFERENCES inventory_items(`item_id`) 
);

INSERT INTO `purchased` VALUES
(4, 1, 2, 1);

CREATE TABLE `supplier` (
  `supplier_id`  int(11),
  `supplier_name` varchar(20) NOT NULL,
  `supplier_email` varchar(30) NOT NULL,
  `supplier_phone` char(10) NOT NULL,
  `supplier_address` varchar(100),
   PRIMARY KEY(`supplier_id`)
);
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `supplier`
  MODIFY `supplier_phone` char(10) NOT NULL UNIQUE,
  MODIFY `supplier_email` char(30) NOT NULL UNIQUE;


INSERT INTO `supplier`(`supplier_id`,`supplier_name`,`supplier_email`, `supplier_phone`,`supplier_address`) VALUES
(1, "Dhanashri Ahir", "dhanashri@gmail.com", 8934767000, "Akola, Mahrashtra" ),
(2, "Sakshi Kalekar", "saksi@gmail.com", 8934567111, "Kolhapur, Mahrashtra" );

CREATE TABLE `item_suppliers` (
  `supplier_id`  int(11) NOT NULL,
  `supplied_date` DATE NOT NULL,
  `delivered_date` DATE NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `item_id` int(11) NOT NULL
);
INSERT INTO `item_suppliers`(`supplier_id`,`supplied_date`,`delivered_date`,`price`,`quantity`,`item_id`) VALUES
(1,STR_TO_DATE('06-01-2019', '%m-%d-%Y'),STR_TO_DATE('08-01-2019', '%m-%d-%Y'), 400, 3 ,8);


ALTER TABLE `item_suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
