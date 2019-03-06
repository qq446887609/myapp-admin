/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : july

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-02-28 02:15:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for july_articles
-- ----------------------------
DROP TABLE IF EXISTS `july_articles`;
CREATE TABLE `july_articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `cover_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '封面图片url',
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '描述',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '文章url',
  `tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '标签 多个用,号分割',
  PRIMARY KEY (`id`),
  UNIQUE KEY `唯一索引` (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of july_articles
-- ----------------------------

-- ----------------------------
-- Table structure for july_books
-- ----------------------------
DROP TABLE IF EXISTS `july_books`;
CREATE TABLE `july_books` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `total_word_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_section` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cover_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of july_books
-- ----------------------------

-- ----------------------------
-- Table structure for july_book_item
-- ----------------------------
DROP TABLE IF EXISTS `july_book_item`;
CREATE TABLE `july_book_item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `book_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of july_book_item
-- ----------------------------

-- ----------------------------
-- Table structure for july_book_shelf
-- ----------------------------
DROP TABLE IF EXISTS `july_book_shelf`;
CREATE TABLE `july_book_shelf` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of july_book_shelf
-- ----------------------------

-- ----------------------------
-- Table structure for july_happy_video
-- ----------------------------
DROP TABLE IF EXISTS `july_happy_video`;
CREATE TABLE `july_happy_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '标题',
  `cover_url` varchar(255) NOT NULL COMMENT '封面图片',
  `video_src` varchar(255) NOT NULL COMMENT '视频播放地址',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '状态',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `tag` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL COMMENT '文章详情',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of july_happy_video
-- ----------------------------

-- ----------------------------
-- Table structure for july_system
-- ----------------------------
DROP TABLE IF EXISTS `july_system`;
CREATE TABLE `july_system` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '玉水明沙',
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '玉水明沙',
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '玉水明沙',
  `footer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '玉水明沙',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of july_system
-- ----------------------------
INSERT INTO `july_system` VALUES ('1', '玉水明沙2', '玉水明沙2', '玉水明沙2', '玉水明沙2', null, '2019-02-27 17:50:30');
INSERT INTO `july_system` VALUES ('2', '玉水明沙', '玉水明沙', '玉水明沙', '玉水明沙', '2019-02-27 17:45:23', '2019-02-27 17:45:23');
INSERT INTO `july_system` VALUES ('3', '玉水明沙', '玉水明沙', '玉水明沙', '玉水明沙', '2019-02-27 17:51:11', '2019-02-27 17:51:11');

-- ----------------------------
-- Table structure for july_users
-- ----------------------------
DROP TABLE IF EXISTS `july_users`;
CREATE TABLE `july_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`mobile`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of july_users
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2016_01_04_173148_create_admin_tables', '1');
INSERT INTO `migrations` VALUES ('4', '2019_02_27_164821_create_july_system_table', '2');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
