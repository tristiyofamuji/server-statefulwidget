/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 80030
 Source Host           : localhost:3306
 Source Schema         : flutter_db

 Target Server Type    : MySQL
 Target Server Version : 80030
 File Encoding         : 65001

 Date: 05/11/2024 08:47:11
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for mata_kuliah
-- ----------------------------
DROP TABLE IF EXISTS `mata_kuliah`;
CREATE TABLE `mata_kuliah`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mata_kuliah
-- ----------------------------
INSERT INTO `mata_kuliah` VALUES (1, 'Pemrograman Web', 'PHP b');
INSERT INTO `mata_kuliah` VALUES (2, 'Pemrograman Mobile', 'Flutter');
INSERT INTO `mata_kuliah` VALUES (3, 'Basis Data', 'MySQL');
INSERT INTO `mata_kuliah` VALUES (4, 'Pemrograman Berbasis Objek', 'JAVA');

-- ----------------------------
-- Table structure for materi
-- ----------------------------
DROP TABLE IF EXISTS `materi`;
CREATE TABLE `materi`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of materi
-- ----------------------------
INSERT INTO `materi` VALUES (1, 'Kuliah Pemrograman Mobile', 'Flutter');
INSERT INTO `materi` VALUES (2, 'Kuliah Pemrograman Mobile', 'Flutter Sesi 10');
INSERT INTO `materi` VALUES (3, 'Kuliah Pemrograman Mobile', 'Flutter Sesi 10');
INSERT INTO `materi` VALUES (4, 'Belajar Pemrograman Mobile', 'Ini hanya uji coba');
INSERT INTO `materi` VALUES (5, 'Belajar Pemrograman Mobile', 'Ini hanya uji coba');
INSERT INTO `materi` VALUES (6, 'a', 'a');
INSERT INTO `materi` VALUES (7, 'b', 'b');
INSERT INTO `materi` VALUES (8, 'd', 'd');
INSERT INTO `materi` VALUES (9, '', '');

SET FOREIGN_KEY_CHECKS = 1;
