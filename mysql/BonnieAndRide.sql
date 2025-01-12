-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 12 jan. 2025 à 15:44
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bonnieandride`
--

-- --------------------------------------------------------

--
-- Structure de la table `ads`
--

DROP TABLE IF EXISTS `ads`;
CREATE TABLE IF NOT EXISTS `ads` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `id_customer` int NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `ads`
--

INSERT INTO `ads` (`id`, `title`, `description`, `price`, `id_customer`, `creation_date`) VALUES
(1, 'Compacte économique', 'Voiture compacte très économique, idéale pour la ville', '10000.00', 1, '2023-12-31 23:00:00'),
(2, 'SUV familial', 'Grand SUV confortable, parfait pour les familles nombreuses', '20000.00', 2, '2024-01-01 23:00:00'),
(3, 'Berline de luxe', 'Confort et élégance, une berline haut de gamme pour les connaisseurs', '30000.00', 3, '2024-01-02 23:00:00'),
(4, 'Coupé sportif', 'Performances et style, pour les amateurs de sensations fortes', '40000.00', 4, '2024-01-03 23:00:00'),
(5, 'Voiture électrique', 'Respectueuse de l\'environnement, technologie de pointe', '25000.00', 5, '2024-01-04 23:00:00'),
(6, 'Pick-up robuste', 'Idéal pour le travail ou les loisirs en plein air', '15000.00', 6, '2024-01-05 23:00:00'),
(7, 'Monospace pratique', 'Espace et confort, le compagnon de voyage familial par excellence', '18000.00', 7, '2024-01-06 23:00:00'),
(8, 'Cabriolet élégant', 'Profitez du soleil avec style et élégance', '22000.00', 8, '2024-01-07 23:00:00'),
(9, 'Hybride économique', 'Le meilleur des deux mondes, économies et performances', '20000.00', 9, '2024-01-08 23:00:00'),
(10, 'Utilitaire fiable', 'La solution parfaite pour tous vos besoins professionnels', '16000.00', 10, '2024-01-09 23:00:00'),
(11, 'Compacte économique', 'Voiture compacte très économique, idéale pour la ville', '10000.00', 1, '2023-12-31 23:00:00'),
(12, 'SUV familial', 'Grand SUV confortable, parfait pour les familles nombreuses', '20000.00', 2, '2024-01-01 23:00:00'),
(13, 'Berline de luxe', 'Confort et élégance, une berline haut de gamme pour les connaisseurs', '30000.00', 3, '2024-01-02 23:00:00'),
(14, 'Coupé sportif', 'Performances et style, pour les amateurs de sensations fortes', '40000.00', 4, '2024-01-03 23:00:00'),
(15, 'Voiture électrique', 'Respectueuse de l\'environnement, technologie de pointe', '25000.00', 5, '2024-01-04 23:00:00'),
(16, 'Pick-up robuste', 'Idéal pour le travail ou les loisirs en plein air', '15000.00', 6, '2024-01-05 23:00:00'),
(17, 'Monospace pratique', 'Espace et confort, le compagnon de voyage familial par excellence', '18000.00', 7, '2024-01-06 23:00:00'),
(18, 'Cabriolet élégant', 'Profitez du soleil avec style et élégance', '22000.00', 8, '2024-01-07 23:00:00'),
(19, 'Hybride économique', 'Le meilleur des deux mondes, économies et performances', '20000.00', 9, '2024-01-08 23:00:00'),
(20, 'Utilitaire fiable', 'La solution parfaite pour tous vos besoins professionnels', '16000.00', 10, '2024-01-09 23:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` longtext,
  `publication_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `image`, `publication_date`) VALUES
(1, 'Tendances automobiles 2024', 'Les nouvelles tendances du marché automobile en 2024.', '', '2024-01-01 10:00:00'),
(2, 'Voitures électriques vs Hybrides', 'Comparaison entre voitures électriques et hybrides : avantages et inconvénients.', '', '2024-01-02 10:30:00'),
(3, 'Entretien véhicule', 'Les meilleurs conseils pour l\'entretien de votre véhicule.', '', '2024-01-03 11:00:00'),
(4, 'Sécurité automobile', 'Les dernières innovations en matière de sécurité automobile.', '', '2024-01-04 11:30:00'),
(5, 'Le futur de la conduite autonome', 'Où en sommes-nous avec la technologie de conduite autonome ?', '', '2024-01-05 12:00:00'),
(6, 'Économiser sur l\'assurance auto', 'Conseils pour économiser sur votre assurance auto.', '', '2024-01-06 12:30:00'),
(7, 'Les meilleurs GPS pour voiture', 'Guide d\'achat des meilleurs GPS pour voiture en 2024.', '', '2024-01-07 13:00:00'),
(8, 'Améliorer la performance de votre voiture', 'Conseils pour améliorer les performances de votre voiture.', '', '2024-01-08 13:30:00'),
(9, 'Voitures pour nouveaux conducteurs', 'Les meilleures voitures pour les nouveaux conducteurs.', 'article2.jpg', '2024-01-09 14:00:00'),
(10, 'Voyager avec des animaux', 'Conseils pour voyager en voiture avec des animaux de compagnie.', 'article4.png', '2024-01-10 14:30:00'),
(11, 'Tendances automobiles 2024', 'Les nouvelles tendances du marché automobile en 2024.', '', '2024-01-01 10:00:00'),
(12, 'Voitures électriques vs Hybrides', 'Comparaison entre voitures électriques et hybrides : avantages et inconvénients.', '', '2024-01-02 10:30:00'),
(13, 'Entretien véhicule', 'Les meilleurs conseils pour l\'entretien de votre véhicule.', '', '2024-01-03 11:00:00'),
(14, 'Sécurité automobile', 'Les dernières innovations en matière de sécurité automobile.', '', '2024-01-04 11:30:00'),
(15, 'Le futur de la conduite autonome', 'Où en sommes-nous avec la technologie de conduite autonome ?', '', '2024-01-05 12:00:00'),
(16, 'Économiser sur l\'assurance auto', 'Conseils pour économiser sur votre assurance auto.', '', '2024-01-06 12:30:00'),
(17, 'Les meilleurs GPS pour voiture', 'Guide d\'achat des meilleurs GPS pour voiture en 2024.', '', '2024-01-07 13:00:00'),
(18, 'Améliorer la performance de votre voiture', 'Conseils pour améliorer les performances de votre voiture.', '', '2024-01-08 13:30:00'),
(19, 'Voitures pour nouveaux conducteurs', 'Les meilleures voitures pour les nouveaux conducteurs.', 'article3.png', '2024-01-09 14:00:00'),
(20, 'Voyager avec des animaux', 'Conseils pour voyager en voiture avec des animaux de compagnie.', 'article1.jpg', '2024-01-10 14:30:00');

-- --------------------------------------------------------

--
-- Structure de la table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
CREATE TABLE IF NOT EXISTS `favorites` (
  `id_user` int NOT NULL,
  `id_ad` int NOT NULL,
  PRIMARY KEY (`id_user`,`id_ad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `rating` tinyint NOT NULL,
  `description` text NOT NULL,
  `addition_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `testimonials`
--

INSERT INTO `testimonials` (`id`, `user_id`, `rating`, `description`, `addition_date`) VALUES
(1, 1, 5, 'Expérience d\'achat incroyable, service client au top.', '2024-01-01 10:00:00'),
(2, 2, 4, 'Très satisfait de mon achat, recommande fortement.', '2024-01-02 10:30:00'),
(3, 3, 3, 'Bon service, mais la livraison a pris du retard.', '2024-01-03 11:00:00'),
(4, 4, 5, 'Service après-vente excellent, très professionnel.', '2024-01-04 11:30:00'),
(5, 5, 4, 'Large choix de véhicules à des prix compétitifs.', '2024-01-05 12:00:00'),
(6, 6, 2, 'Expérience mitigée, des améliorations nécessaires.', '2024-01-06 12:30:00'),
(7, 7, 5, 'Achat facile et rapide, très satisfait.', '2024-01-07 13:00:00'),
(8, 8, 3, 'Service correct, mais rien d\'exceptionnel.', '2024-01-08 13:30:00'),
(9, 9, 4, 'Conseils utiles et personnel aimable.', '2024-01-09 14:00:00'),
(10, 10, 5, 'Meilleure expérience d\'achat de voiture de ma vie.', '2024-01-10 14:30:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `age` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `last_name`, `first_name`, `age`, `email`, `password`, `creation_date`, `phone`) VALUES
(1, 'Dupont', 'Jean', 35, 'jean.dupont@example.com', 'hashed_password1', '2023-12-31 23:00:00', '0123456789'),
(2, 'Martin', 'Alice', 30, 'alice.martin@example.com', 'hashed_password2', '2024-01-01 23:00:00', '9876543210'),
(3, 'Bernard', 'Claude', 28, 'claude.bernard@example.com', 'hashed_password3', '2024-01-02 23:00:00', '1234567890'),
(4, 'Thomas', 'Sophie', 32, 'sophie.thomas@example.com', 'hashed_password4', '2024-01-03 23:00:00', '0987654321'),
(5, 'Petit', 'Lucas', 29, 'lucas.petit@example.com', 'hashed_password5', '2024-01-04 23:00:00', '2345678901'),
(6, 'Robert', 'Emilie', 34, 'emilie.robert@example.com', 'hashed_password6', '2024-01-05 23:00:00', '3456789012'),
(7, 'Richard', 'David', 27, 'david.richard@example.com', 'hashed_password7', '2024-01-06 23:00:00', '4567890123'),
(8, 'Durand', 'Julie', 31, 'julie.durand@example.com', 'hashed_password8', '2024-01-07 23:00:00', '5678901234'),
(9, 'Leroy', 'Marie', 33, 'marie.leroy@example.com', 'hashed_password9', '2024-01-08 23:00:00', '6789012345'),
(10, 'Moreau', 'Pierre', 36, 'pierre.moreau@example.com', 'hashed_password10', '2024-01-09 23:00:00', '7890123456'),
(11, 'testtesttest', 'test', 25, 't@t', '$2y$10$uwNrYnpnbBogC3dcUwCnDOFSYsOWDQpfzAvDGaJaEUtJqYiUQbUZO', '2024-02-16 10:25:03', '01234567891'),
(12, 'quentin', 'lourenco', 0, 'quentin.lourenco@livecampus.tech', '$2y$10$c2XXfxoBHXuws1uwAv6P2.coCRXFY0KMN8wXUq2ZsOH8gY7q8X8tq', '2024-02-16 11:09:07', '0123456789'),
(13, 'a', 'a', 0, 'a@a', '$2y$10$N1bYiVKKGC.MS5f8/ChA7OiyMOgF1YZ8xAn7CakIyqCa4UeW6O0cm', '2024-02-16 11:15:53', '0123456789'),
(14, 'b', 'b', 0, 'b@b', '$2y$10$kzbQhzjxYYQkijypPsal7O6oo0ume/7hFWE2n1WKHeckmRU2IaEMO', '2024-02-16 11:17:59', '0123456789');

-- --------------------------------------------------------

--
-- Structure de la table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` enum('moto','scooter','quad','electrique') NOT NULL,
  `brand` varchar(255) NOT NULL,
  `brand_url` varchar(32) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` year DEFAULT NULL,
  `mileage` int DEFAULT NULL,
  `ad_id` int NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `first_hand` tinyint(1) DEFAULT '0',
  `history` tinyint(1) DEFAULT '0',
  `engine_size` int DEFAULT NULL,
  `location` varchar(5) NOT NULL,
  `picture_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `vehicles`
--

INSERT INTO `vehicles` (`id`, `type`, `brand`, `brand_url`, `model`, `year`, `mileage`, `ad_id`, `price`, `first_hand`, `history`, `engine_size`, `location`, `picture_url`) VALUES
(1, 'moto', 'Yamaha', 'logo_yamaha.png', 'YZF-R1', 2020, 5000, 1, '15000.00', 1, 1, 1000, '75000', 'yamaha_r1.jpg'),
(2, 'scooter', 'Piaggio', 'logo_piaggio.png', 'Vespa', 2019, 1000, 2, '3500.00', 1, 0, 150, '75001', 'vespa.jpg'),
(3, 'quad', 'Polaris', 'logo_polaris.png', 'RZR XP 1000', 2021, 2000, 3, '18000.00', 1, 1, 1000, '69000', 'polaris_rzr.jpg'),
(4, 'electrique', 'Tesla', 'logo_tesla.png', 'Model S', 2022, 100, 4, '80000.00', 1, 0, 0, '13000', 'tesla_model_s.jpg'),
(5, 'moto', 'Honda', 'logo_honda.png', 'CBR1000RR', 2018, 7500, 5, '12000.00', 1, 1, 1000, '31000', 'honda_cbr.jpg'),
(6, 'scooter', 'Yamaha', 'logo_yamaha.png', 'TMAX', 2020, 2000, 6, '11000.00', 1, 0, 530, '33000', 'yamaha_tmax.jpg'),
(7, 'quad', 'Can-Am', 'logo_can-am.png', 'Outlander', 2021, 500, 7, '9500.00', 1, 1, 650, '75002', 'canam_outlander.jpg'),
(8, 'electrique', 'Nissan', 'logo_nissan.png', 'Leaf', 2022, 100, 8, '25000.00', 1, 0, 0, '64000', 'nissan_leaf.jpg'),
(9, 'moto', 'Ducati', 'logo_ducati.png', 'Panigale V4', 2020, 3000, 9, '22000.00', 1, 1, 1100, '21000', 'ducati_panigale.jpg'),
(10, 'scooter', 'BMW', 'logo_bmw.png', 'C 400 X', 2019, 1500, 10, '8000.00', 1, 0, 350, '44000', 'bmw_c400x.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
