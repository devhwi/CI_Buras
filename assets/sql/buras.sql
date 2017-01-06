SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `user`;
DROP TABLE IF EXISTS `rental`;
DROP TABLE IF EXISTS `product`;
DROP TABLE IF EXISTS `user_level`;
DROP TABLE IF EXISTS `board`;
DROP TABLE IF EXISTS `finance`;
DROP TABLE IF EXISTS `genre`;
DROP TABLE IF EXISTS `color`;
DROP TABLE IF EXISTS `style`;
DROP TABLE IF EXISTS `board_category`;
DROP TABLE IF EXISTS `reply`;
DROP TABLE IF EXISTS `type`;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE `user` (
    `user_id` VARCHAR(20) NOT NULL,
    `user_name` VARCHAR(20) NOT NULL,
    `user_password` VARCHAR(50) NOT NULL,
    `user_season` INT(5) NOT NULL,
    `user_birth` DATE NOT NULL,
    `user_enter` INT(4) NOT NULL,
    `user_phone` VARCHAR(13) NOT NULL,
    `user_major` VARCHAR(30) NOT NULL,
    `user_email` VARCHAR(50) NOT NULL,
    `user_level` INT(1) NOT NULL,
    PRIMARY KEY (`user_id`),
    UNIQUE (`user_id`)
);

CREATE TABLE `rental` (
    `rental_id` INT(5) NOT NULL,
    `rental_user` VARCAHR(20) NOT NULL,
    `rental_product` INT(5) NOT NULL,
    `rental_status` BOOLEAN NOT NULL,
    `rental_dttm` DATETIME NOT NULL,
    PRIMARY KEY (`rental_id`)
);

CREATE TABLE `product` (
    `product_id` INT(5) NOT NULL,
    `product_name` VARCHAR(50) NOT NULL,
    `product_seq` INT(2) NOT NULL,
    `product_type` INT(1) NOT NULL,
    `product_genre` INT(1) NOT NULL,
    `product_color` INT(1) NOT NULL,
    `product_style` INT(1) NOT NULL,
    `product_img` VARCHAR(100) NOT NULL,
    `product_status` BOOLEAN NOT NULL,
    `product_dttm` DATETIME NOT NULL,
    PRIMARY KEY (`product_id`),
    UNIQUE (`product_id`)
);

CREATE TABLE `user_level` (
    `level_id` INT(1) NOT NULL,
    `level_desc` VARCHAR(20) NOT NULL,
    PRIMARY KEY (`level_id`),
    UNIQUE (`level_id`)
);

CREATE TABLE `board` (
    `board_id` INT(5) NOT NULL,
    `board_category` INT(1) NOT NULL,
    `board_title` VARCHAR(50) NOT NULL,
    `board_content` VARCHAR(200) NOT NULL,
    `board_writer` VARCHAR(20) NOT NULL,
    `board_dttm` DATETIME NOT NULL,
    `board_notice` BOOLEAN NOT NULL,
    PRIMARY KEY (`board_id`)
);

CREATE TABLE `finance` (
    `finance_id` INT(5) NOT NULL,
    `finance_ref` INT(5) NOT NULL,
    `finance_status` BOOLEAN NOT NULL,
    `finance_sum` INT(10) NOT NULL,
    `finance_dttm` DATETIME NOT NULL,
    `finance_payment_dttm` DATETIME NOT NULL,
    PRIMARY KEY (`finance_id`)
);

CREATE TABLE `genre` (
    `genre_id` INT NOT NULL,
    `genre_desc` VARCHAR(20) NOT NULL,
    PRIMARY KEY (`genre_id`)
);

CREATE TABLE `color` (
    `color_id` INT(1) NOT NULL,
    `color_desc` VARCHAR(20) NOT NULL,
    PRIMARY KEY (`color_id`)
);

CREATE TABLE `style` (
    `style_id` INT(1) NOT NULL,
    `style_desc` VARCHAR(20) NOT NULL,
    PRIMARY KEY (`style_id`),
    UNIQUE (`style_id`)
);

CREATE TABLE `board_category` (
    `category_id` INT(1) NOT NULL,
    `category_desc` VARCHAR(20) NOT NULL,
    PRIMARY KEY (`category_id`),
    UNIQUE (`category_id`)
);

CREATE TABLE `reply` (
    `reply_id` INT(5) NOT NULL,
    `reply_writer` VARCHAR(20) NOT NULL,
    `reply_content` VARCHAR(100) NOT NULL,
    `reply_ref_board` INT(5) NOT NULL,
    `reply_dttm` DATETIME NOT NULL,
    PRIMARY KEY (`reply_id`)
);

CREATE TABLE `type` (
    `type_id` INT(1) NOT NULL,
    `type_desc` VARCHAR(20) NOT NULL,
    PRIMARY KEY (`type_id`),
    UNIQUE (`type_id`)
);
