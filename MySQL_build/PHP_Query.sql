CREATE DATABASE `customer_info`;
USE `customer_info`
CREATE TABLE member (
    `idx` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `id` VARCHAR(100) DEFAULT '',
    `name` VARCHAR(100) DEFAULT '',
    `email` VARCHAR(100) DEFAULT '',
    `password` VARCHAR(100) DEFAULT '',
    `zipcode` CHAR(5) DEFAULT '',
    `addr` VARCHAR(255) DEFAULT '',
    `addr_detail` VARCHAR(100) DEFAULT '',
    `photo` VARCHAR(100) DEFAULT '',
    `create_at` DATETIME,
    `ip` VARCHAR(20) DEFAULT '',
    PRIMARY KEY(`idx`),
    UNIQUE INDEX `id` (`id`) USING BTREE
);

INSERT INTO `member` (`id`, `name`, `email`) VALUES ('gildong', '홍길동', 'hong@gil.dong');