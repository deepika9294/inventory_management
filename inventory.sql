
CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
)

CREATE TABLE `users` (
  `user_id` int(4),
  `user_name` varchar(16) NOT NULL,
  `password` char(8) NOT NULL,
   PRIMARY KEY (user_id)
)

INSERT INTO  `users` (`user_id`, `user_name`, `password`) VALUES
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
  `price` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
);

INSERT INTO `inventory_items` (`item_id`, `brand_id`, `item_name`,`price`, `category_id`) VALUES
(4, 5, 'WD Passport', '3000', 3),
(5,2,'Galaxy S7', "49000",1);

ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

ALTER TABLE `inventory_items`
  ADD PRIMARY KEY (`item_id`);
