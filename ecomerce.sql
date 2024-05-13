-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 12, 2024 at 01:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `unit_number` varchar(255) DEFAULT NULL,
  `street_number` varchar(255) DEFAULT NULL,
  `address_line1` varchar(255) DEFAULT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `unit_number`, `street_number`, `address_line1`, `address_line2`, `city`, `region`, `postal_code`, `country_id`) VALUES
(1, '20', '10', 'cao thi chinh', 'phuong phu thuan', 'TP HCM', 'HCM', '7000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `image` varchar(255) NOT NULL,
  `delete_at` timestamp NULL DEFAULT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `is_active`, `image`, `delete_at`, `description`) VALUES
(1, 'qqqqqqqqqq', 1, 'https://i.pinimg.com/564x/19/c7/52/19c75230f22ab763867fa5e2c20985e1.jpg', '2024-05-09 12:50:14', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(5, 'tung@gmail.comf', 1, 'https://i.pinimg.com/564x/19/c7/52/19c75230f22ab763867fa5e2c20985e1.jpg', '2024-05-09 12:50:14', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(7, 'asdfadsf', 1, 'http://localhost/server/Public/upload/IMG_0276.jpeg', '2024-05-09 12:50:14', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(11, 'Loai moi', 0, 'http://localhost/server/Public/upload/person_3.png', NULL, 'mota'),
(12, 'Đồ uống, nước ngọt', 1, 'http://localhost/server/Public/upload/sting.png', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(13, 'Thịt, trứng, cá, hải sản', 1, 'http://localhost/server/Public/upload/5.png', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(14, 'Sữa các loại', 1, 'http://localhost/server/Public/upload/2.png', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(15, 'Bánh kẹo các loại', 1, 'http://localhost/server/Public/upload/banh.png', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(16, 'Mỹ phẩm', 1, 'http://localhost/server/Public/upload/mypham.png', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(17, 'Gạo, bột, đồ khô', 1, 'http://localhost/server/Public/upload/3.jpeg', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(18, 'Vệ sinh nhà cửa', 1, 'http://localhost/server/Public/upload/buoi.png', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(19, 'Mẹ và bé', 1, 'http://localhost/server/Public/upload/mypham.png', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(20, 'Dầu ăn, gia vị, nước chấm', 1, 'http://localhost/server/Public/upload/phomai.png', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country_name`) VALUES
(1, 'Viet Nam');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `payment_method_id` int(11) DEFAULT NULL,
  `shipping_address` int(11) DEFAULT NULL,
  `shipping_method` int(11) DEFAULT NULL,
  `order_total` int(11) DEFAULT NULL,
  `order_status` int(11) DEFAULT NULL,
  `delete_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `order_date`, `payment_method_id`, `shipping_address`, `shipping_method`, `order_total`, `order_status`, `delete_at`) VALUES
(2, 1, '2024-05-11 22:28:25', 1, 1, 1, 100, 3, NULL),
(3, 1, '2024-05-11 22:28:33', 1, 1, 1, 100, 3, NULL),
(4, 1, '2024-05-11 22:28:36', 1, 1, 1, 100, 3, NULL),
(5, 1, '2024-05-09 19:41:47', 1, 1, 1, 100, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_line`
--

CREATE TABLE `order_line` (
  `id` int(11) NOT NULL,
  `product_item_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `quanty` int(11) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `status`, `description`) VALUES
(1, 'FINISHED', 'FINISH'),
(2, 'CANCELED', 'CANCELED'),
(3, 'WAITING', 'WAITING');

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE `payment_type` (
  `id` int(11) NOT NULL,
  `value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_type`
--

INSERT INTO `payment_type` (`id`, `value`) VALUES
(1, 'COD'),
(2, 'MOMO'),
(3, 'PAYPAL'),
(4, 'VNPAY');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `delete_at` timestamp NULL DEFAULT NULL,
  `quan` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `description`, `product_image`, `is_active`, `delete_at`, `quan`, `price`) VALUES
(1, 13, 'Đây là con cá', 'Đây là con cá', 'http://localhost/server/Public/upload/IMG_7294.jpeg', 1, NULL, 100, 100000),
(11, 13, 'Phô mai con bò cười', 'Phô mai con bò cười', 'http://localhost/server/Public/upload/phomai.png', 1, NULL, 200, 15000),
(12, 13, 'Cá ngừ thái lát', 'Đây là lát cá', 'http://localhost/server/Public/upload/5.png', 1, NULL, 10, 100000),
(13, 11, 'Chuối nè', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'http://localhost/server/Public/upload/chuoi.png', 1, NULL, 20, 200000),
(14, 11, 'Đây là quả bưởi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'http://localhost/server/Public/upload/buoi.png', 1, NULL, 30, 300000),
(15, 12, 'Đây là quả cam', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'http://localhost/server/Public/upload/cam.png', 1, NULL, 40, 400000),
(16, 11, 'Đây là chùm nho', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'http://localhost/server/Public/upload/nho.png', 1, NULL, 51, 500000),
(17, 12, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'http://localhost/server/Public/upload/sua.png', 1, NULL, 60, 600000),
(18, 11, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'https://i.pinimg.com/564x/19/c7/52/19c75230f22ab763867fa5e2c20985e1.jpg', 1, NULL, 70, 700000),
(19, 12, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'https://i.pinimg.com/564x/19/c7/52/19c75230f22ab763867fa5e2c20985e1.jpg', 1, NULL, 80, 800000),
(20, 11, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'https://i.pinimg.com/564x/19/c7/52/19c75230f22ab763867fa5e2c20985e1.jpg', 1, NULL, 90, 900000),
(21, 11, 'san pham moi', 'Mo ta', 'http://localhost/server/Public/upload/2.png', 1, NULL, 1000, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `product_configuration`
--

CREATE TABLE `product_configuration` (
  `id` int(11) NOT NULL,
  `product_item_id` int(11) DEFAULT NULL,
  `variation_option_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_item`
--

CREATE TABLE `product_item` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `SKU` varchar(255) DEFAULT NULL,
  `quanty_in_stock` int(11) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `product_thumbnail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `discount_rate` varchar(255) DEFAULT NULL,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotion_product`
--

CREATE TABLE `promotion_product` (
  `id` int(11) NOT NULL,
  `promotion_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_method`
--

CREATE TABLE `shipping_method` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping_method`
--

INSERT INTO `shipping_method` (`id`, `name`, `price`) VALUES
(1, 'NHANH', 30000),
(2, 'HOA TOC', 50000),
(3, 'CHAM', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`id`, `user_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart_item`
--

CREATE TABLE `shopping_cart_item` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `product_item_id` int(11) DEFAULT NULL,
  `quanty` int(11) DEFAULT NULL,
  `delete_at` timestamp NULL DEFAULT NULL,
  `ordered_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shopping_cart_item`
--

INSERT INTO `shopping_cart_item` (`id`, `cart_id`, `product_item_id`, `quanty`, `delete_at`, `ordered_at`) VALUES
(1, 1, 1, 10, '2024-05-10 10:31:17', NULL),
(2, 1, 1, 5, '2024-05-10 10:42:28', NULL),
(3, 1, 11, 7, '2024-05-10 10:42:28', NULL),
(4, 1, 1, 10, '2024-05-10 10:42:28', NULL),
(5, 1, 1, 10, '2024-05-10 10:42:28', NULL),
(6, 1, 11, 1, '2024-05-10 10:42:28', NULL),
(7, 1, 11, 1, '2024-05-10 10:42:28', NULL),
(8, 1, 11, 1, '2024-05-10 10:42:28', NULL),
(9, 1, 1, 10, '2024-05-10 10:42:28', NULL),
(10, 1, 1, 10, '2024-05-10 10:42:28', NULL),
(11, 1, 1, 10, '2024-05-10 10:42:28', NULL),
(12, 1, 1, 10, NULL, NULL),
(13, 1, 12, 1, NULL, NULL),
(14, 1, 13, 2, NULL, NULL),
(15, 1, 11, 1, NULL, NULL),
(16, 1, 11, 1, NULL, NULL),
(17, 1, 15, 1, NULL, NULL),
(18, 1, 15, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  `avatar` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `delete_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email_address`, `phone_number`, `password`, `isAdmin`, `avatar`, `is_active`, `delete_at`) VALUES
(1, 'tung1@gmail.xom', '2222222', '123', 1, 'https://i.pinimg.com/564x/79/cd/b5/79cdb55108d960617123bc4b86c1aaab.jpg', 1, '2024-05-09 12:47:01'),
(2, 'tung.tranxuan@hcmut.edu.vn', '11', '123', 0, 'https://i.pinimg.com/564x/79/cd/b5/79cdb55108d960617123bc4b86c1aaab.jpg', 0, NULL),
(3, 'an@gmail.com', ' 0123456789', '123dd', 1, 'https://i.pinimg.com/564x/79/cd/b5/79cdb55108d960617123bc4b86c1aaab.jpg', 1, NULL),
(6, 'b222@gmail.com', '0123456780', '111111111', 1, 'https://i.pinimg.com/564x/79/cd/b5/79cdb55108d960617123bc4b86c1aaab.jpg', 1, NULL),
(7, 'tungtrana3@gmail.com', ' asdfasdf', 'asdfasfd', 1, '', 1, NULL),
(8, 'tungtranae3@gmail.com', ' asdfasdf', 'asdfasfd', 0, '', 1, NULL),
(9, 'tungtrana3111@gmail.com', ' 0987654321', 'qwer', 0, '', 1, NULL),
(10, 'tungtrana3112@gmail.com', ' 0987654321', 'qwer', 0, '', 1, NULL),
(11, 'tungtrana31@gmail.com', ' 111', '111', 0, '', 1, NULL),
(12, 't@gmail.com', ' 2', '3', 0, '', 1, NULL),
(13, 't2@gmail.com', ' 2', '3', 0, '', 1, NULL),
(14, 'sdfdsf@gmail.com', ' dsf', 'sdf', 0, '', 1, NULL),
(15, '1@gmail.com', ' dsf', 'sdf', 0, '', 1, NULL),
(16, 'eee@gmail.com', ' eee', 'eee', 0, '', 1, '2024-05-11 20:46:31'),
(17, 'tung1@gmail.com', '123', '123', 0, '', 1, NULL),
(18, 'xuan@gmail.com', ' 0123456789', '123', 0, '', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_payment_method`
--

CREATE TABLE `user_payment_method` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `payment_type_id` int(11) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `expiry_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_default` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_review`
--

CREATE TABLE `user_review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ordered_product_id` int(11) DEFAULT NULL,
  `rating_value` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `variation_option`
--

CREATE TABLE `variation_option` (
  `id` int(11) NOT NULL,
  `variation_id` int(11) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_status` (`order_status`),
  ADD KEY `shipping_address` (`shipping_address`),
  ADD KEY `shipping_method` (`shipping_method`);

--
-- Indexes for table `order_line`
--
ALTER TABLE `order_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_item_id` (`product_item_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_configuration`
--
ALTER TABLE `product_configuration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_item_id` (`product_item_id`),
  ADD KEY `variation_option_id` (`variation_option_id`);

--
-- Indexes for table `product_item`
--
ALTER TABLE `product_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion_product`
--
ALTER TABLE `promotion_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `promotion_id` (`promotion_id`);

--
-- Indexes for table `shipping_method`
--
ALTER TABLE `shipping_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping_cart_item`
--
ALTER TABLE `shopping_cart_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_id` (`address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_payment_method`
--
ALTER TABLE `user_payment_method`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `payment_type_id` (`payment_type_id`);

--
-- Indexes for table `user_review`
--
ALTER TABLE `user_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ordered_product_id` (`ordered_product_id`);

--
-- Indexes for table `variation_option`
--
ALTER TABLE `variation_option`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_line`
--
ALTER TABLE `order_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_type`
--
ALTER TABLE `payment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_configuration`
--
ALTER TABLE `product_configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_item`
--
ALTER TABLE `product_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotion_product`
--
ALTER TABLE `promotion_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_method`
--
ALTER TABLE `shipping_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shopping_cart_item`
--
ALTER TABLE `shopping_cart_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_payment_method`
--
ALTER TABLE `user_payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_review`
--
ALTER TABLE `user_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `variation_option`
--
ALTER TABLE `variation_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`),
  ADD CONSTRAINT `address_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`),
  ADD CONSTRAINT `address_ibfk_3` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`),
  ADD CONSTRAINT `address_ibfk_4` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`),
  ADD CONSTRAINT `address_ibfk_5` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`order_status`) REFERENCES `order_status` (`id`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`shipping_address`) REFERENCES `address` (`id`),
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`shipping_method`) REFERENCES `shipping_method` (`id`);

--
-- Constraints for table `order_line`
--
ALTER TABLE `order_line`
  ADD CONSTRAINT `order_line_ibfk_1` FOREIGN KEY (`product_item_id`) REFERENCES `product_item` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `product_configuration`
--
ALTER TABLE `product_configuration`
  ADD CONSTRAINT `product_configuration_ibfk_1` FOREIGN KEY (`product_item_id`) REFERENCES `product_item` (`id`),
  ADD CONSTRAINT `product_configuration_ibfk_2` FOREIGN KEY (`variation_option_id`) REFERENCES `variation_option` (`id`);

--
-- Constraints for table `product_item`
--
ALTER TABLE `product_item`
  ADD CONSTRAINT `product_item_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `promotion_product`
--
ALTER TABLE `promotion_product`
  ADD CONSTRAINT `promotion_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product_item` (`id`),
  ADD CONSTRAINT `promotion_product_ibfk_2` FOREIGN KEY (`promotion_id`) REFERENCES `promotion` (`id`);

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `user_address_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`),
  ADD CONSTRAINT `user_address_ibfk_10` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_address_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_address_ibfk_3` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`),
  ADD CONSTRAINT `user_address_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_address_ibfk_5` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`),
  ADD CONSTRAINT `user_address_ibfk_6` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_address_ibfk_7` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`),
  ADD CONSTRAINT `user_address_ibfk_8` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_address_ibfk_9` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`);

--
-- Constraints for table `user_payment_method`
--
ALTER TABLE `user_payment_method`
  ADD CONSTRAINT `user_payment_method_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_payment_method_ibfk_10` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_type` (`id`),
  ADD CONSTRAINT `user_payment_method_ibfk_2` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_type` (`id`),
  ADD CONSTRAINT `user_payment_method_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_payment_method_ibfk_4` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_type` (`id`),
  ADD CONSTRAINT `user_payment_method_ibfk_5` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_payment_method_ibfk_6` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_type` (`id`),
  ADD CONSTRAINT `user_payment_method_ibfk_7` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_payment_method_ibfk_8` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_type` (`id`),
  ADD CONSTRAINT `user_payment_method_ibfk_9` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user_review`
--
ALTER TABLE `user_review`
  ADD CONSTRAINT `user_review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_review_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_review_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_review_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_review_ibfk_5` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_review_ibfk_6` FOREIGN KEY (`ordered_product_id`) REFERENCES `order_line` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
