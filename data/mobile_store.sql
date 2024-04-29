-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.1.0 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for Evgheni_Russuleac_B00158335_mobile_store
DROP DATABASE IF EXISTS `mobile_store`;
CREATE DATABASE IF NOT EXISTS `mobile_store` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `mobile_store`;

-- Dumping structure for table Evgheni_Russuleac_B00158335_mobile_store.categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table Evgheni_Russuleac_B00158335_mobile_store.categories: ~3 rows (approximately)
INSERT INTO `categories` (`category_id`, `category_name`) VALUES
	(1, 'Smartphones'),
	(2, 'Tablets'),
	(3, 'Smartwatches');

-- Dumping structure for table Evgheni_Russuleac_B00158335_mobile_store.products
DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `category_id` int DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `screen_size` decimal(3,1) DEFAULT NULL,
  `battery_capacity` varchar(100) DEFAULT NULL,
  `storage_capacity` varchar(100) DEFAULT NULL,
  `front_camera_quality` varchar(100) DEFAULT NULL,
  `back_camera_quality` varchar(100) DEFAULT NULL,
  `operating_system` varchar(100) DEFAULT NULL,
  `hardware` varchar(255) DEFAULT NULL,
  `description` text,
  `Quantity` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`product_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table Evgheni_Russuleac_B00158335_mobile_store.products: ~25 rows (approximately)
INSERT INTO `products` (`product_id`, `category_id`, `brand`, `model`, `price`, `color`, `screen_size`, `battery_capacity`, `storage_capacity`, `front_camera_quality`, `back_camera_quality`, `operating_system`, `hardware`, `description`, `Quantity`) VALUES
	(1, 1, 'Apple', 'IPhone 15 Pro Max', 1399.99, 'White', 6.7, '4441mAh', '256GB', '12MP', '48MP + 12MP + 12MP', 'iOS', 'A17 Pro', 'Introducing the iPhone 15 Pro Max: Unleash the Power of Possibilities! Prepare to embark on a journey of technological marvels with     the iPhone 15 Pro Max, a device that redefines the boundaries of what a smartphone can achieve. This exceptional flagship is a harmonious blend of raw power, exquisite craftsmanship, and uncompromising innovation, designed to exceed your wildest expectations.', 60),
	(2, 1, 'Apple', 'IPhone 15 Pro Max', 1619.99, 'Black', 6.7, '4441mAh', '512GB', '12MP', '48MP + 12MP + 12MP', 'iOS', 'A17 Pro', 'Apple has once again managed to really differentiate its Pro models from the normal range. They have a significantly better camera, the latest and fastest processor and a better display. This makes the iPhone 15 Pro Max one of the best devices at the moment. The casing of the iPhone 15 Pro Max is this time made of titanium, a super-strong material that is a lot lighter than the usual aluminium. On the side, you\'ll find a customisable button so you can access your favourite apps and features at lightning speed.', 80),
	(3, 1, 'Apple', 'IPhone 15 Plus', 1049.99, 'Pink', 6.7, '4407mAh', '128GB', '12MP', '48MP + 12MP', 'iOS', 'A16 Bionic Chip', 'iPhone 15 Plus brings you Dynamic Island, a 48MP Main camera and USB-C all in a durable colour-infused glass and aluminium design. Dynamic Island bubbles up alerts and Live Activities so you don\'t miss them while you\'re doing something else. It\'s splash, water and dust resistant.', 85),
	(4, 1, 'Apple', 'IPhone 15 Pro', 1299.99, 'Black', 6.1, '3274mAh', '256GB', '12MP', '48MP + 12MP + 12MP', 'iOS', 'A17 Pro chip', 'The iPhone 15 Pro display has rounded corners that follow a beautiful curved design, and these corners are within a standard rectangle. When measured as a standard rectangular shape, the screen is 6.12 inches diagonally (actual viewable area is less).', 65),
	(5, 1, 'Apple', 'IPhone 14 Plus', 889.99, 'Midnight', 6.7, '4325mAh', '256GB', '12MP', '48MP', 'iOS', 'A15 Bionic chip', 'iPhone 14 Plus. Think big with a larger 6.7-inch display 1 and all-day battery life. Capture stunning photos in low light and bright light with the new dual-camera system. Crash Detection,3 a new safety feature, calls for help when you can\'t.', 45),
	(6, 1, 'Apple', 'IPhone 15', 979.99, 'Green', 6.7, '3367mAh', '128GB', '12MP', '48MP + 12MP', 'iOS', 'A16 Bionic chip', 'iPhone 15 brings you Dynamic Island, a 48MP Main camera and USB-C all in a durable colour-infused glass and aluminium design. While you\'re doing something else, Dynamic Island bubbles up alerts and Live Activities. It\'s splash, water and dust resistant. The Ceramic Shield front is super-tough. And the 6.1\' Super Retina XDR display is up to 2x brighter in the sun compared to iPhone 14. 48MP Main camera shoots in high resolution. With amazing detail, you can take standout photos. A16 Bionic\'s efficiency helps deliver great battery life all day. If you need emergency services and you don\'t have mobile service or Wi-Fi, you can use Emergency SOS via satellite.', 64),
	(7, 1, 'Apple', 'IPhone 15 Plus', 1049.99, 'Blue', 6.7, '4407mAh', '128GB', '12MP', '48MP + 12MP', 'iOS', 'A16 Bionic Chip', 'iPhone 15 Plus brings you Dynamic Island, a 48MP Main camera and USB-C all in a durable colour-infused glass and aluminium design. Dynamic Island bubbles up alerts and Live Activities so you don\'t miss them while you\'re doing something else. It\'s splash, water and dust resistant.', 69),
	(8, 1, 'Apple', 'IPhone 13', 659.99, 'Pink', 6.1, '3227mAh', '256GB', '12MP', '48MP', 'iOS', 'A15 Bionic', 'Apple introduces iPhone 13 and iPhone 13 mini, delivering breakthrough camera innovations and a powerhouse chip with an impressive leap in battery life. Featuring a sleek and durable design, an advanced new dual-camera system for improved photos and videos in low light, and introducing Cinematic mode', 66),
	(9, 1, 'Apple', 'IPhone 14', 759.99, 'Midnight', 6.1, '3279mAh', '256GB', '12MP', '48MP + 12MP', 'iOS', 'A15 Bionic chip', 'The iPhone 14 feature a 6.1-inch (15 cm) and 6.7-inch (17 cm) display, improvements to the rear-facing camera, and satellite connectivity for contacting emergency services when a user in trouble is beyond the range of Wi-Fi or cellular networks.', 55),
	(10, 1, 'Apple', 'IPhone SE', 549.99, 'Midnight Black', 4.7, '2018mAh', '256GB', '12MP', '12MP', 'iOS', 'A9 Bionic', 'The iPhone SE is based on the design of the iPhone 5S, but with newer components, such as the Apple A9 processor and a 12MP camera, which also functions as a 4K video camera. Basically, the iPhone SE has the shell of an iPhone 5s, but has iPhone 6s internal components.', 51),
	(11, 1, 'Samsung', 'Galaxy S24 Ultra', 1469.99, 'Titanium Black', 6.8, '5000mAh', '256GB', '12MP', '200MP + 50MP + 12MP + 10MP', 'Android', 'Octa-Core', 'Welcome to the era of mobile AI. With Galaxy S24 Ultra in your hands, you can unleash whole new levels of creativity, productivity and possibility starting with the most important device in your life. Your smartphone. Meet Galaxy S24 Ultra, the ultimate form of Galaxy Ultra with a new titanium exterior and a 6.8\' flat display.5,6 It\'s an absolute marvel of design.', 39),
	(12, 1, 'Samsung', 'Galaxy S23 FE', 719.99, 'Graphite', 6.7, '4500mAh', '128GB', '12MP', '50MP + 12MP + 8MP', 'Android', 'Octa Core', 'Galaxy S23 FE opens the door for more people to experience the extraordinary. With its long-lasting power and stunning night shots, the phone becomes your gateway to lasting epic memories. The new Galaxy S23 FE takes after the iconic design of Galaxy S23 Series, adopting its classic aesthetic and many of the practical features.', 50),
	(13, 1, 'Samsung', 'Galaxy S24+', 1159.99, 'Marble Grey', 6.7, '4900mAh', '256GB', '12MP', '50.0 MP + 10.0 MP + 12.0 MP', 'Android', 'Deca-Core', 'Welcome to the era of mobile AI. With Galaxy s24+ in your hands, you can unleash whole new levels of creativity, productivity and possibility — starting with the most important device in your life. Your smartphone. Easy to grip. Satisfying to hold. With their unified design and satin finish, Galaxy s24+ feel as smooth as they look. Bigger screen. Bigger battery. More processing power.There\'s so much more to love about Galaxy s24+.', 25),
	(14, 1, 'Samsung', 'Galaxy Z Flip5', 1089.99, 'Graphite', 6.7, '3700mAh', '256GB', '12MP + 12MP', '10MP', 'Android', 'Snapdragon', 'The Galaxy Z Flip 5 has two screens: its foldable inner 6.7-inch display with a 120 Hz variable refresh rate and its 3.4-inch cover display. The device has 8 GB of RAM, and either 256 GB or 512 GB of UFS 4.0 flash storage, with no support for expanding the device\'s storage capacity via micro-SD cards.', 60),
	(15, 1, 'Samsung', 'Galaxy A23', 329.99, 'Black', 6.6, '5000mAh', '64GB', '8MP', '50MP + 5MP + 2MP + 2MP', 'Android', 'Snapdragon', 'Featuring a spectacular 6.6" FHD+ Display, the Galaxy A23 5G has all you want in a smartphone. From a huge 50MP main camera, contemporary design and fingerprint reader, to a colossal 5,000mAh all-day battery, the A23 5G has it all.', 40),
	(16, 1, 'Honor', 'Magic V2', 1999.99, 'Black', 7.9, '5000mAh', '512GB', '20MP', '50MP', 'MagicOS', 'Snapdragon 8 Gen 2', 'The HONOR Magic V2 is the thinnest foldable phone ever made, at 9.9mm when folded and 4.7mm when unfolded. It has a 7.92 inch inner screen and a 6.43 inch outer screen. This incredible phone is powered by the Snapdragon 8 Gen 2 processor and has a 5000mAh battery.', 30),
	(17, 1, 'Honor', 'Magic5 Pro', 879.99, 'Black', 6.8, '5100mAh', '512GB', '12MP', '50MP + 50MP + 50MP', 'Android', 'Qualcomm Snapdragon', 'The Honor Magic5 Pro features a powerful Triple Main Camera combination comprising of a 50MP Wide Camera, a 50MP Ultra-Wide Camera, and a 50MP Telephoto Camera. With an increased sensor size for superior light sensing performance, the camera system produces photos in refined detail every time, regardless of lighting conditions. Featuring a 6.81-inch LTPO Display with a unique Quad-Curved Floating Screen, the phone guarantees an immersive viewing experience whether users are browsing, gaming or reading.', 45),
	(18, 1, 'Honor', 'Magic 6 Lite', 399.99, 'Midnight Black', 6.7, '5300mAh', '256GB', '16MP', '108MP', 'MagicOS', 'Snapdragon 6 Gen 1', 'The Honor Magic 6 Lite offers a 6.78 inch AMOLED display with a 120Hz refresh rate - excellent for movies, gaming and more. Do all that and more for longer thanks to a 5300mAh battery and the powerful Snapdragon 6 Gen 1 processor.', 25),
	(19, 2, 'Apple', 'IPad Air', 799.99, 'Pink', 10.9, '8000mAh', '64GB', '12MP', '12MP', 'iPadOS', 'Apple M1 chip', 'iPad Air lets you immerse yourself in whatever you\'re reading, watching or creating. The 10.9-inch Liquid Retina display features advanced technologies like True Tone, P3 wide colour and an anti‑reflective coating.', 36),
	(20, 2, 'Apple', 'IPad', 649.99, 'Space Grey', 10.2, '8526mAh', '256GB', '12MP', '8MP', 'iPadOS', 'A13 Bionic', 'Perfect for playing immersive games and more. A more powerful Neural Engine drives machine learning–based features like Live Text in iPadOS. The A13 Bionic chip effortlessly powers advanced apps like Adobe Fresco and Procreate. With all-day battery life, iPad is ready to work or play for as long as you need it.', 29),
	(21, 2, 'Apple', 'IPad Mini', 669.99, 'Starlight', 8.3, '5124mAh', '64GB', '12MP', '12MP', 'iPadOS', 'A15 Bionic', 'The 8.3-inch Liquid Retina display features True Tone, P3 wide colour and ultra-low reflectivity, making text sharp and colours vivid, wherever you are. Apple Pencil attaches magnetically to the side of iPad mini, so it\'s always with you and ready for a spur‑of‑the‑moment sketch or spontaneous brainstorming session.', 48),
	(22, 2, 'Samsung', 'Galaxy Tab S9', 949.99, 'Grey', 11.0, '8160mAh', '128GB', '12MP', '13MP', 'Android', 'Qualcomm Snapdragon 8 Gen 2', 'The Galaxy Tab S9 Series delivers an engrossing, photo-realistic gaming experience on the Tab\'s expansive screen for marathon playthroughs. The experience is heightened with immersive audio from the quad AKG speaker system and Dolby Atmos surround sound.', 98),
	(23, 2, 'Samsung', 'Galaxy Tab S9+', 1149.99, 'Grey', 12.4, '9800mAh', '256GB', '12MP', '13MP + 8MP Ultra Wide', 'Android', 'Qualcomm Snapdragon 8 Gen 2', 'Boasting a luxurious AMOLED 2X display the Galaxy Tab S9+ Series offers more space and detail to enhance everything you could possibly want to do. With a creative canvas that goes on forever you really can do it all. The latest Snapdragon 8 Gen 2 processor keeps everything moving, so you\'re never slowed down by power-hungry, pro-grade apps. And as always, the iconic S Pen is never far away when inspiration strikes. With more space to work, watch, play and create, the Galaxy Tab S9+ Series is the ultimate second screen, for life at home and away.', 74),
	(24, 2, 'Samsung', 'Galaxy Tab S9 Ultra', 1399.99, 'Beige', 14.6, '10880mAh', '256GB', '12MP + 12MP Ultra Wide', '13MP + 8MP Ultra Wide', 'Android', 'Qualcomm Snapdragon 8 Gen 2', 'Boasting a luxurious AMOLED 2X display the Galaxy Tab S9 Ultra Series offers more space and detail to enhance everything you could possibly want to do. With a creative canvas that goes on forever you really can do it all. The latest Snapdragon 8 Gen 2 processor keeps everything moving, so you\'re never slowed down by power-hungry, pro-grade apps. And as always, the iconic S Pen is never far away when inspiration strikes. With more space to work, watch, play and create, the Galaxy Tab S9 Ultra Series is the ultimate second screen, for life at home and away.', 56),
	(28, 1, 'Nokia', '3310', 999.00, 'Blue', 6.1, '4500mAh', '128GB', '12MP', '48MP', 'Android', 'A17 Pro', 'Introducing the Nokia 3310: Unleash the Power of Possibilities! Prepare to embark on a journey of technological marvels with the Nokia 3310, a device that redefines the boundaries of what a smartphone can achieve. This exceptional flagship is a harmonious blend of raw power, exquisite craftsmanship, and uncompromising innovation, designed to exceed your wildest expectations.', 65);

-- Dumping structure for table Evgheni_Russuleac_B00158335_mobile_store.product_images
DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `image_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `image_url` varchar(255) NOT NULL,
  PRIMARY KEY (`image_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table Evgheni_Russuleac_B00158335_mobile_store.product_images: ~76 rows (approximately)
INSERT INTO `product_images` (`image_id`, `product_id`, `image_url`) VALUES
	(1, 1, 'images/products/iphone_15_pro_max_white_1.jpg'),
	(2, 1, 'images/products/iphone_15_pro_max_white_2.jpg'),
	(3, 1, 'images/products/iphone_15_pro_max_white_3.jpg'),
	(4, 1, 'images/products/iphone_15_pro_max_white_4.jpg'),
	(5, 2, 'images/products/iphone_15_pro_max_black_1.jpg'),
	(6, 2, 'images/products/iphone_15_pro_max_black_2.jpg'),
	(7, 2, 'images/products/iphone_15_pro_max_black_3.jpg'),
	(8, 2, 'images/products/iphone_15_pro_max_black_4.jpg'),
	(9, 3, 'images/products/iphone_15_plus_pink_1.jpg'),
	(10, 3, 'images/products/iphone_15_plus_pink_2.jpg'),
	(11, 3, 'images/products/iphone_15_plus_pink_3.jpg'),
	(12, 4, 'images/products/iphone_15_pro_black_1.jpg'),
	(13, 4, 'images/products/iphone_15_pro_black_2.jpg'),
	(14, 4, 'images/products/iphone_15_pro_black_3.jpg'),
	(15, 4, 'images/products/iphone_15_pro_black_4.jpg'),
	(16, 5, 'images/products/iphone_14_plus_black_1.jpg'),
	(17, 5, 'images/products/iphone_14_plus_black_2.jpg'),
	(18, 5, 'images/products/iphone_14_plus_black_3.jpg'),
	(19, 6, 'images/products/iphone_15_green_1.jpg'),
	(20, 6, 'images/products/iphone_15_green_2.jpg'),
	(21, 6, 'images/products/iphone_15_green_3.jpg'),
	(22, 7, 'images/products/iphone_15_plus_blue_1.jpg'),
	(23, 7, 'images/products/iphone_15_plus_blue_2.jpg'),
	(24, 7, 'images/products/iphone_15_plus_blue_3.jpg'),
	(25, 8, 'images/products/iphone_13_pink_1.jpg'),
	(26, 8, 'images/products/iphone_13_pink_2.jpg'),
	(27, 8, 'images/products/iphone_13_pink_3.jpg'),
	(28, 9, 'images/products/iphone_14_midnight_1.jpg'),
	(29, 9, 'images/products/iphone_14_midnight_2.jpg'),
	(30, 9, 'images/products/iphone_14_midnight_3.jpg'),
	(31, 10, 'images/products/iphone_se_midnight_black_1.jpg'),
	(32, 10, 'images/products/iphone_se_midnight_black_2.jpg'),
	(33, 10, 'images/products/iphone_se_midnight_black_3.jpg'),
	(34, 11, 'images/products/samsung_galaxy_s24_ultra_black_titanium_1.jpg'),
	(35, 11, 'images/products/samsung_galaxy_s24_ultra_black_titanium_2.jpg'),
	(36, 11, 'images/products/samsung_galaxy_s24_ultra_black_titanium_3.jpg'),
	(37, 12, 'images/products/samsung_galaxy_s23_fe_graphite_1.jpg'),
	(38, 12, 'images/products/samsung_galaxy_s23_fe_graphite_2.jpg'),
	(39, 12, 'images/products/samsung_galaxy_s23_fe_graphite_3.jpg'),
	(40, 13, 'images/products/samsung_galaxy_s24_marble_grey_1.jpg'),
	(41, 13, 'images/products/samsung_galaxy_s24_marble_grey_2.jpg'),
	(42, 13, 'images/products/samsung_galaxy_s24_marble_grey_3.jpg'),
	(43, 14, 'images/products/samsung_galaxy_zflip5_graphite_1.jpg'),
	(44, 14, 'images/products/samsung_galaxy_zflip5_graphite_2.jpg'),
	(45, 14, 'images/products/samsung_galaxy_zflip5_graphite_3.jpg'),
	(46, 15, 'images/products/samsung_galaxy_a23_black_1.jpg'),
	(47, 15, 'images/products/samsung_galaxy_a23_black_2.jpg'),
	(48, 15, 'images/products/samsung_galaxy_a23_black_3.jpg'),
	(49, 16, 'images/products/honor_magic_v2_black_1.jpg'),
	(50, 16, 'images/products/honor_magic_v2_black_2.jpg'),
	(51, 16, 'images/products/honor_magic_v2_black_3.jpg'),
	(52, 17, 'images/products/honor_magic5pro_black_1.jpg'),
	(53, 17, 'images/products/honor_magic5pro_black_2.jpg'),
	(54, 17, 'images/products/honor_magic5pro_black_3.jpg'),
	(55, 18, 'images/products/honor_magic_6lite_midnightblack_1.jpg'),
	(56, 18, 'images/products/honor_magic_6lite_midnightblack_2.jpg'),
	(57, 18, 'images/products/honor_magic_6lite_midnightblack_3.jpg'),
	(58, 19, 'images/products/apple_ipad_air_pink_1.jpg'),
	(59, 19, 'images/products/apple_ipad_air_pink_2.jpg'),
	(60, 19, 'images/products/apple_ipad_air_pink_3.jpg'),
	(61, 20, 'images/products/apple _ipad_space_grey_1.jpg'),
	(62, 20, 'images/products/apple _ipad_space_grey_2.jpg'),
	(63, 20, 'images/products/apple _ipad_space_grey_3.jpg'),
	(64, 21, 'images/products/apple_ipad_mini_starlight_1.jpg'),
	(65, 21, 'images/products/apple_ipad_mini_starlight_2.jpg'),
	(66, 21, 'images/products/apple_ipad_mini_starlight_3.jpg'),
	(67, 22, 'images/products/samsung_galaxy_tab_s9_grey_1.jpg'),
	(68, 22, 'images/products/samsung_galaxy_tab_s9_grey_2.jpg'),
	(69, 22, 'images/products/samsung_galaxy_tab_s9_grey_3.jpg'),
	(70, 23, 'images/products/samsung_galaxy_tab_s9+_grey_1.jpg'),
	(71, 23, 'images/products/samsung_galaxy_tab_s9+_grey_2.jpg'),
	(72, 23, 'images/products/samsung_galaxy_tab_s9+_grey_3.jpg'),
	(73, 24, 'images/products/samsung_galaxy_tab_s9ultra_beige_1.jpg'),
	(74, 24, 'images/products/samsung_galaxy_tab_s9ultra_beige_2.jpg'),
	(75, 24, 'images/products/samsung_galaxy_tab_s9ultra_beige_3.jpg'),
	(77, 28, 'images/products/nokia3310.jpg');

-- Dumping structure for table Evgheni_Russuleac_B00158335_mobile_store.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(4) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `user_type` enum('Administrator','Standard') NOT NULL DEFAULT 'Standard',
  `address_line1` varchar(255) DEFAULT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table Evgheni_Russuleac_B00158335_mobile_store.users: ~11 rows (approximately)
INSERT INTO `users` (`id`, `title`, `firstname`, `lastname`, `email`, `password`, `birthdate`, `user_type`, `address_line1`, `address_line2`, `city`, `postal_code`, `country`, `phone_number`) VALUES
	(2, 'Mr.', 'John', 'Smith', 'smith@mail.com', '$2y$10$LHmPTIiyD52NBfXv3JnbX.Ba0JqKU60m8oKNbAW/z3ofc0E9sO0cy', NULL, 'Standard', '', '', '', '', '', '00353860695602'),
	(5, 'Mr.', 'Derek', 'White', 'white@mail.com', '$2y$10$AWhh4rOLrS.tFgy8cTuHKuOJspTIq4ucCCPxgLTbIvEzNKtpjG/Wq', '1990-02-23', 'Standard', '311 Wyckham Point', 'Wyckham Way', 'Dundrum', 'D16PW59', 'Ireland', '0860695602'),
	(6, 'Mr', 'Alan', 'Walters', 'walters@mail.com', '$2y$10$MSNr6zlmjAjoEye7vHlOtOJqYni3sbRb5rASPr.oVHVkjix7FWezm', '1988-12-23', 'Standard', NULL, NULL, NULL, NULL, NULL, NULL),
	(7, 'Mr', 'Dan', 'Russu', 'russu@mail.com', '$2y$10$s.AHAHheD97HlHvYtZt51O9u.KqNlFWzx.o9jxw/x/PZDNPmVCQ9S', '1999-12-23', 'Standard', NULL, NULL, NULL, NULL, NULL, NULL),
	(8, 'Mr', 'Adam', 'Black', 'black@mail.com', '$2y$10$iJTYM6OBu.bRN1nfSNIUou2a6GwshE4Ryz5wZ.liTbrVH1.xcKbV6', '1988-12-13', 'Standard', NULL, NULL, NULL, NULL, NULL, NULL),
	(9, NULL, 'Andrew', 'Nick', 'nick@mail.com', '$2y$10$STw/MxDZcaLActA/Zc.8FevCa3dd/L1IyuvuDEi2RrGQukNpazloa', '1986-12-13', 'Standard', NULL, NULL, NULL, NULL, NULL, NULL),
	(10, 'Mr', 'John', 'Walsh', 'walsh@mail.com', '$2y$10$ms8kR7vIrJn9pey8aXxfq.xBAwx1MCGlag5TO.XxmEwxcYxbXwY3S', '1988-12-23', 'Standard', NULL, NULL, NULL, NULL, NULL, NULL),
	(11, 'Mr', 'John', 'Border', 'border@mail.com', '$2y$10$UQwZe0eJwLFL8NmQbTX2DOjd2zgj7IjWI7fMd.awVDBVVRj5dwk8K', '2050-12-13', 'Standard', NULL, NULL, NULL, NULL, NULL, NULL),
	(12, 'Mrs', 'Ivy', 'Shomera', 'shomera@mail.com', '$2y$10$LAbvWpGOCipOds0cFYBJCOItTfyEUwi/MO5.BZXfXcyHKfW9b6CkS', '2030-06-16', 'Standard', NULL, NULL, NULL, NULL, NULL, NULL),
	(13, 'Mr.', 'Jason', 'Statham', 'statham@mail.com', '$2y$10$kOyH5im9OgCYqKikOmrTn.qt8s8npMht4nCgw6hr01b5Zn7OS5YLy', '1990-04-26', 'Standard', '', '', '', '', '', ''),
	(14, 'Mr.', 'Evgheni', 'Russuleac', 'russuleac@mail.com', '$2y$10$x250w0jHQOvEpEOnTXqF.eLWJl4MeMt/TCB4ZZ/quysinX4cx.XaS', '1988-04-21', 'Administrator', '', '', '', '', '', '');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
