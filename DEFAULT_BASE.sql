-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour store
CREATE DATABASE IF NOT EXISTS `store` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `store`;

-- Listage de la structure de la table store. categorie
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `name_categorie` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Listage des données de la table store.categorie : ~5 rows (environ)
DELETE FROM `categorie`;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` (`id_categorie`, `name_categorie`) VALUES
	(0, 'textiles'),
	(1, 'legumes'),
	(2, 'voitures'),
	(3, 'highTech'),
	(4, 'alimentaire');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;

-- Listage de la structure de la table store. product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` text,
  `price` float DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  `categorie` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categorie` (`categorie`),
  CONSTRAINT `FK_product_categorie` FOREIGN KEY (`categorie`) REFERENCES `categorie` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Listage des données de la table store.product : ~11 rows (environ)
DELETE FROM `product`;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `name`, `description`, `price`, `img`, `categorie`) VALUES
	(1, 'test01', 'The first parameter to the callback is an accumulator where the result-in-progress is effectively assembled. If you supply an $initial value the accumulator starts out with that value, otherwise it starts out null.\r\nThe second parameter is where each value of the array is passed during each step of the reduction.\r\nThe return value of the callback becomes the new value of the accumulator. When the array is exhausted, array_reduce() returns accumulated value.', 7, 'work.jpg', 3),
	(5, 'test05', 'Alfreds Futterkiste 	Maria Anders 	Germany\r\nBerglunds snabbköp 	Christina Berglund 	Sweden\r\nCentro comercial Moctezuma 	Francisco Chang 	Mexico\r\nErnst Handel 	Roland Mendel 	Austria\r\nIsland Trading 	Helen Bennett 	UK\r\nKöniglich Essen 	Philip Cramer 	Germany\r\nLaughing Bacchus Winecellars 	Yoshi Tannamuri 	Canada\r\nMagazzini Alimentari Riuniti 	Giovanni Rovelli 	Italy\r\nNorth/South 	Simon Crowther 	UK\r\nParis spécialités 	Marie Bertrand 	France', 26, 'work.jpg', 3),
	(6, 'test06', 'The first parameter to the callback is an accumulator where the result-in-progress is effectively assembled. If you supply an $initial value the accumulator starts out with that value, otherwise it starts out null.\r\nThe second parameter is where each value of the array is passed during each step of the reduction.\r\nThe return value of the callback becomes the new value of the accumulator. When the array is exhausted, array_reduce() returns accumulated value.\r\n', 32, 'work.jpg', 1),
	(7, 'test07', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus animi odio vero deserunt error delectus sit consequuntur, totam dolor, commodi perferendis quas veritatis quia debitis. Veniam, explicabo. Quidem, voluptate illo.', 7, 'default.jpg', 2),
	(8, 'test08', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus animi odio vero deserunt error delectus sit consequuntur, totam dolor, commodi perferendis quas veritatis quia debitis. Veniam, explicabo. Quidem, voluptate illo.', 7, 'work2.jpg', 2),
	(9, 'test09', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus animi odio vero deserunt error delectus sit consequuntur, totam dolor, commodi perferendis quas veritatis quia debitis. Veniam, explicabo. Quidem, voluptate illo.', 11, 'work2.jpg', 3),
	(12, 'test02', 'Depuis sa sortie en bêta privée en juillet 2020, l’algorithme GPT-3 fait régulièrement la une de la presse, qu&#39;elle soit spécialisée ou non. De nombreux articles l&#39;évoquent, et certains ont même été écrits par le modèle GPT-3 lui-même ! Comment un simple programme peut-il réussir à écrire des articles, et à quoi peut-il servir ? Pourquoi un tel engouement ? Faisons le point sur cette nouvelle “intelligence artificielle”.', 4, 'work.jpg', 4),
	(13, 'test03', 'Depuis sa sortie en bêta privée en juillet 2020, l’algorithme GPT-3 fait régulièrement la une de la presse, qu&#39;elle soit spécialisée ou non. De nombreux articles l&#39;évoquent, et certains ont même été écrits par le modèle GPT-3 lui-même ! Comment un simple programme peut-il réussir à écrire des articles, et à quoi peut-il servir ? Pourquoi un tel engouement ? Faisons le point sur cette nouvelle “intelligence artificielle”.', 22, 'default.jpg', 0),
	(14, 'test10', 'Depuis sa sortie en bêta privée en juillet 2020, l’algorithme GPT-3 fait régulièrement la une de la presse, qu&#39;elle soit spécialisée ou non. De nombreux articles l&#39;évoquent, et certains ont même été écrits par le modèle GPT-3 lui-même ! Comment un simple programme peut-il réussir à écrire des articles, et à quoi peut-il servir ? Pourquoi un tel engouement ? Faisons le point sur cette nouvelle “intelligence artificielle”.\r\n', 6, 'default.jpg', 0),
	(17, 'test04', 'Depuis sa sortie en bêta privée en juillet 2020, l’algorithme GPT-3 fait régulièrement la une de la presse, qu&#39;elle soit spécialisée ou non. De nombreux articles l&#39;évoquent, et certains ont même été écrits par le modèle GPT-3 lui-même ! Comment un simple programme peut-il réussir à écrire des articles, et à quoi peut-il servir ? Pourquoi un tel engouement ? Faisons le point sur cette nouvelle “intelligence artificielle”.', 10, 'work.jpg', 2),
	(18, 'test11', 'Depuis sa sortie en bêta privée en juillet 2020, l’algorithme GPT-3 fait régulièrement la une de la presse, qu&#39;elle soit spécialisée ou non. De nombreux articles l&#39;évoquent, et certains ont même été écrits par le modèle GPT-3 lui-même ! Comment un simple programme peut-il réussir à', 11, 'work2.jpg', 3),
	(19, 'test12', 'Depuis sa sortie en bêta privée en juillet 2020, l’algorithme GPT-3 fait régulièrement la une de la presse, qu&#39;elle soit spécialisée ou non. De nombreux articles l&#39;évoquent, et certains ont même été écrits par le modèle GPT-3 lui-même ! Comment un simple programme peut-il réussir à', 15, 'dog.png', 2);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Listage de la structure de la table store. user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Listage des données de la table store.user : ~1 rows (environ)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `email`, `username`, `password`, `created_at`) VALUES
	(1, 'ramain@ramain.com', 'Password123', '$argon2id$v=19$m=65536,t=4,p=1$NENPQkpSbTZVclF2bXU5Qg$7rZxr/CuzZVGdIwYbzCmWzlWRKQIhzSxJVvKXx2t9OU', '2021-11-24 18:59:58');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
