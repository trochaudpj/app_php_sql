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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Listage des données de la table store.categorie : ~5 rows (environ)
DELETE FROM `categorie`;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` (`id_categorie`, `name_categorie`) VALUES
	(0, 'textiles'),
	(1, 'legumes'),
	(2, 'outils'),
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Listage des données de la table store.product : ~5 rows (environ)
DELETE FROM `product`;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `name`, `description`, `price`, `img`, `categorie`) VALUES
	(1, 'test01', 'The first parameter to the callback is an accumulator where the result-in-progress is effectively assembled. If you supply an $initial value the accumulator starts out with that value, otherwise it starts out null.\r\nThe second parameter is where each value of the array is passed during each step of the reduction.\r\nThe return value of the callback becomes the new value of the accumulator. When the array is exhausted, array_reduce() returns accumulated value.', 7, 'work.jpg', 3),
	(2, 'test02', 'The first parameter to the callback is an accumulator where the result-in-progress is effectively assembled. If you supply an $initial value the accumulator starts out with that value, otherwise it starts out null.\r\nThe second parameter is where each value of the array is passed during each step of the reduction.\r\nThe return value of the callback becomes the new value of the accumulator. When the array is exhausted, array_reduce() returns accumulated value.', 5, 'dog.png', 0),
	(3, 'test03', 'The first parameter to the callback is an accumulator where the result-in-progress is effectively assembled. If you supply an $initial value the accumulator starts out with that value, otherwise it starts out null.\r\nThe second parameter is where each value of the array is passed during each step of the reduction.\r\nThe return value of the callback becomes the new value of the accumulator. When the array is exhausted, array_reduce() returns accumulated value.', 17, 'default.jpg', 4),
	(4, 'test04', 'e pense qu&#39;il est préférable d&#39;utiliser ce qu&#39;on appel des requêtes préparées. En fait, lorsqu&#39;on passe des variables de l&#39;utilisateur, c&#39;est toujours préférable de valider s&#39;il n&#39;a pas tenter de créer une injection SQL. PDO permet d&#39;ailleurs d&#39;effectuer ce genre de validation, du moins, c&#39;est l&#39;objet qu&#39;il retourne ', 16, 'work.jpg', 4),
	(5, 'test05', 'Alfreds Futterkiste 	Maria Anders 	Germany\r\nBerglunds snabbköp 	Christina Berglund 	Sweden\r\nCentro comercial Moctezuma 	Francisco Chang 	Mexico\r\nErnst Handel 	Roland Mendel 	Austria\r\nIsland Trading 	Helen Bennett 	UK\r\nKöniglich Essen 	Philip Cramer 	Germany\r\nLaughing Bacchus Winecellars 	Yoshi Tannamuri 	Canada\r\nMagazzini Alimentari Riuniti 	Giovanni Rovelli 	Italy\r\nNorth/South 	Simon Crowther 	UK\r\nParis spécialités 	Marie Bertrand 	France', 26, 'work.jpg', 3),
	(6, 'test06', 'The first parameter to the callback is an accumulator where the result-in-progress is effectively assembled. If you supply an $initial value the accumulator starts out with that value, otherwise it starts out null.\r\nThe second parameter is where each value of the array is passed during each step of the reduction.\r\nThe return value of the callback becomes the new value of the accumulator. When the array is exhausted, array_reduce() returns accumulated value.\r\n', 21, 'work.jpg', 1),
	(7, 'test07', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus animi odio vero deserunt error delectus sit consequuntur, totam dolor, commodi perferendis quas veritatis quia debitis. Veniam, explicabo. Quidem, voluptate illo.', 7, 'default.jpg', 2),
	(8, 'test08', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus animi odio vero deserunt error delectus sit consequuntur, totam dolor, commodi perferendis quas veritatis quia debitis. Veniam, explicabo. Quidem, voluptate illo.', 7, 'work2.jpg', 2),
	(9, 'test09', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus animi odio vero deserunt error delectus sit consequuntur, totam dolor, commodi perferendis quas veritatis quia debitis. Veniam, explicabo. Quidem, voluptate illo.', 11, 'work2.jpg', 3),
	(10, 'test10', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus animi odio vero deserunt error delectus sit consequuntur, totam dolor, commodi perferendis quas veritatis quia debitis. Veniam, explicabo. Quidem, voluptate illo.', 16, 'work2.jpg', 0),
	(11, 'test11', 'work2.jpg work2.jpg work2.jpg work2.jpg work2.jpg work2.jpg work2.jpg work2.jpg work2.jpg work2.jpg work2.jpg work2.jpg work2.jpg work2.jpg work2.jpg work2.jpg work2.jpg work2.jpg work2.jpg work2.jpg work2.jpg work2.jpg work2.jpg work2.jpg work2.jpg work2.jpg work2.jpg ', 22, 'dog.png', 0);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
