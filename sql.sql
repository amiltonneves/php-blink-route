-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.35 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.10.0.7000
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando estrutura para tabela teste_servidor.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela teste_servidor.usuarios: ~7 rows (aproximadamente)
INSERT INTO `usuarios` (`id`, `nome`, `email`, `password`) VALUES
	(1, 'Amilton Neves Junior', 'amilton.neves@gmail.com', '$2y$10$QKwSR6zxqOluEX1WIgN9puLVS5HrhvcQzb5xpufGe9ff/Pu3ywjRO'),
	(2, 'Andreia Neves', 'amiltonneves@email.com', '$2y$10$QKwSR6zxqOluEX1WIgN9puLVS5HrhvcQzb5xpufGe9ff/Pu3ywjRO'),
	(3, 'Adernando Baron', 'adernandobaron@email.com', '$2y$10$QKwSR6zxqOluEX1WIgN9puLVS5HrhvcQzb5xpufGe9ff/Pu3ywjRO'),
	(4, 'Margarete Neves', 'margareteneves@email.com', '$2y$10$QKwSR6zxqOluEX1WIgN9puLVS5HrhvcQzb5xpufGe9ff/Pu3ywjRO'),
	(5, 'Lenoir Mattei', 'lenoirmatteis@email.com', '$2y$10$QKwSR6zxqOluEX1WIgN9puLVS5HrhvcQzb5xpufGe9ff/Pu3ywjRO'),
	(22, 'Arthur Conan Doyle', 'arthur@gmail.com', '$2y$10$hknsZ.5TKqqNG9jOEDbmS.rkv0n/D/h4BfmvfNQrdFgsRpgzkBYWG'),
	(23, 'Lisa Thompson', 'thompson@gmail.com', '$2y$10$.fHy.Xf5hfW2lzMWAyxoQu.X/yf0jmTHThkrhYlRTIX2tMrd7aGku');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
