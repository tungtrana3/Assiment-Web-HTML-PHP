
use ecomerce;
CREATE TABLE `user` (
  `id` integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `email_address` varchar(255),
  `phone_number` varchar(255),
  `password` varchar(255),
  `isAdmin` boolean
);

CREATE TABLE `user_address` (
  `id` integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` integer,
  `address_id` integer,
  `is_default` boolean
);

CREATE TABLE `address` (
  `id` integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `unit_number` varchar(255),
  `street_number` varchar(255),
  `address_line1` varchar(255),
  `address_line2` varchar(255),
  `city` varchar(255),
  `region` varchar(255),
  `postal_code` varchar(255),
  `country_id` integer
);

CREATE TABLE `country` (
  `id` integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `country_name` varchar(255)
);

CREATE TABLE `user_review` (
  `id` integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` integer,
  `ordered_product_id` integer,
  `rating_value` integer,
  `comment` varchar(255)
);

CREATE TABLE `user_payment_method` (
  `id` integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` integer,
  `payment_type_id` integer,
  `provider` varchar(255),
  `account_number` varchar(255),
  `expiry_date` timestamp,
  `is_default` boolean
);

CREATE TABLE `payment_type` (
  `id` integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `value` varchar(255)
);

CREATE TABLE `shopping_cart` (
  `id` integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` integer
);

CREATE TABLE `shopping_cart_item` (
  `id` integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `cart_id` integer,
  `product_item_id` integer,
  `quanty` integer
);

CREATE TABLE `order` (
  `id` integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` integer,
  `order_date` timestamp,
  `payment_method_id` integer,
  `shipping_address` integer,
  `shipping_method` integer,
  `order_total` integer,
  `order_status` integer
);

CREATE TABLE `order_status` (
  `id` integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `status` varchar(255),
  `description` varchar(255)
);

CREATE TABLE `order_line` (
  `id` integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `product_item_id` integer,
  `order_id` integer,
  `quanty` integer,
  `price` decimal
);

CREATE TABLE `product_configuration` (
  `id` integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `product_item_id` integer,
  `variation_option_id` integer
);

CREATE TABLE `variation_option` (
  `id` integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `variation_id` integer,
  `value` varchar(255)
);

CREATE TABLE `category` (
  `id` integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `parent_category_id` integer,
  `category_name` varchar(255)
);

CREATE TABLE `product` (
  `id` integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `category_id` integer,
  `name` varchar(255),
  `description` varchar(255),
  `product_image` varchar(255),
  `product_thumbnail` varchar(255)
);

CREATE TABLE `product_item` (
  `id` integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `product_id` integer,
  `SKU` varchar(255),
  `quanty_in_stock` integer,
  `price` decimal,
  `product_thumbnail` varchar(255)
);

CREATE TABLE `promotion` (
  `id` integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `description` varchar(255),
  `discount_rate` varchar(255),
  `start_date` timestamp,
  `end_date` timestamp
);

CREATE TABLE `promotion_product` (
  `id` integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `promotion_id` integer,
  `product_id` integer
);

CREATE TABLE `shipping_method` (
  `id` integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `price` decimal
);

ALTER TABLE `address` ADD FOREIGN KEY (`country_id`) REFERENCES `country` (`id`);

ALTER TABLE `user_address` ADD FOREIGN KEY (`address_id`) REFERENCES `address` (`id`);

ALTER TABLE `user_address` ADD FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `user_review` ADD FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `user_payment_method` ADD FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `user_payment_method` ADD FOREIGN KEY (`payment_type_id`) REFERENCES `payment_type` (`id`);

ALTER TABLE `shopping_cart_item` ADD FOREIGN KEY (`product_item_id`) REFERENCES `product_item` (`id`);

ALTER TABLE `order_line` ADD FOREIGN KEY (`product_item_id`) REFERENCES `product_item` (`id`);

ALTER TABLE `user_review` ADD FOREIGN KEY (`ordered_product_id`) REFERENCES `order_line` (`id`);

ALTER TABLE `order` ADD FOREIGN KEY (`order_status`) REFERENCES `order_status` (`id`);

ALTER TABLE `order` ADD FOREIGN KEY (`shipping_address`) REFERENCES `address` (`id`);

ALTER TABLE `order` ADD FOREIGN KEY (`shipping_method`) REFERENCES `shipping_method` (`id`);

ALTER TABLE `product_configuration` ADD FOREIGN KEY (`product_item_id`) REFERENCES `product_item` (`id`);

ALTER TABLE `product_configuration` ADD FOREIGN KEY (`variation_option_id`) REFERENCES `variation_option` (`id`);

ALTER TABLE `product_item` ADD FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

ALTER TABLE `promotion_product` ADD FOREIGN KEY (`product_id`) REFERENCES `product_item` (`id`);

ALTER TABLE `promotion_product` ADD FOREIGN KEY (`promotion_id`) REFERENCES `promotion` (`id`);

ALTER TABLE `product` ADD FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);


ALTER TABLE `shopping_cart` ADD FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
ALTER TABLE `order_line` ADD FOREIGN KEY (`order_id`) REFERENCES `order` (`id`);
ALTER TABLE `shopping_cart_item` ADD FOREIGN KEY (`cart_id`) REFERENCES `shopping_cart` (`id`);