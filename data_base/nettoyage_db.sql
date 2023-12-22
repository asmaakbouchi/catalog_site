-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 22 déc. 2023 à 10:08
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `nettoyage_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `bloc_note`
--

CREATE TABLE `bloc_note` (
  `id_bloc_note` int(11) NOT NULL,
  `nom_site` varchar(40) NOT NULL,
  `login` varchar(35) NOT NULL,
  `password` varchar(25) NOT NULL,
  `remarque` varchar(1600) NOT NULL,
  `date_creation` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `bloc_note`
--

INSERT INTO `bloc_note` (`id_bloc_note`, `nom_site`, `login`, `password`, `remarque`, `date_creation`) VALUES
(352, 'Pro service ', 'service@gmail.com', 'pro.service.2023', '            Note : ce site concerne la comptabilité \r\n                                                                                    ', '2023-12-07'),
(362, 'IGCA Expert comptaple 2', 'asmaakbouchi@gmail.com', 'asmaa123', '           une société            ', '2023-12-19');

-- --------------------------------------------------------

--
-- Structure de la table `contactez_nous`
--

CREATE TABLE `contactez_nous` (
  `id_contact` int(11) NOT NULL,
  `nom_prenom` varchar(50) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `tel` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `type_local` varchar(20) NOT NULL,
  `message` varchar(200) NOT NULL,
  `date_contact` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contactez_nous`
--

INSERT INTO `contactez_nous` (`id_contact`, `nom_prenom`, `ville`, `tel`, `email`, `type_local`, `message`, `date_contact`) VALUES
(36, 'allali youssef', 'El Jadida', 2147483647, 'allaliyousef@gmail.com', 'Particulier', 'salam', '2023-11-10 16:03:36'),
(37, 'salma allam', 'Oujda', 766544352, 'salmaallam@gmail.com', 'Particulier', 'bonjour', '2023-11-10 16:22:51'),
(38, 'Asmaa Kbouchi', 'Casablanca', 766609658, 'Asmaakbouchi@gmail.com', 'Particulier', 'ok', '2023-11-10 17:07:28');

-- --------------------------------------------------------

--
-- Structure de la table `demandez_devis`
--

CREATE TABLE `demandez_devis` (
  `id_devis` int(11) NOT NULL,
  `nom_prenom` varchar(25) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `tel` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `type_local` varchar(20) NOT NULL,
  `message` varchar(200) NOT NULL,
  `date_devis` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `demandez_devis`
--

INSERT INTO `demandez_devis` (`id_devis`, `nom_prenom`, `ville`, `tel`, `email`, `type_local`, `message`, `date_devis`) VALUES
(2, 'Asmaa Kbouchi', 'Casablanca', 766609658, 'Asmaakbouchi@gmail.com', 'Particulier', 'Hello', '2023-11-10 16:57:17');

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` char(15) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `tel` varchar(18) NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT current_timestamp(),
  `roll` int(11) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`id_login`, `email`, `password`, `nom`, `prenom`, `tel`, `date_inscription`, `roll`) VALUES
(1, 'asmaa1.dev@gmail.com', 'admin123', 'kbouchi', 'asmaa', '522334457', '2023-11-03 11:09:36', 1),
(14, 'Alamisara@gmail.com', 'saraAlami123', 'Alami', 'Sara', '687755434', '2023-11-20 11:56:29', 3),
(25, 'akasmaa87@gmail.com', 'ASMAA1234', 'Kbouchi', 'Asmaa', '611223388', '2023-11-24 12:26:59', 2),
(27, 'ahlam123@gmail.com', 'ahlam1234', 'halimi', 'ahlam', '766355422', '2023-11-24 13:21:35', 3),
(34, 'safaa@gmail.com', 'safaa1234', 'safaa', 'safaa', '655887755', '2023-12-06 10:31:02', 3);

-- --------------------------------------------------------

--
-- Structure de la table `site_web`
--

CREATE TABLE `site_web` (
  `id_site` int(11) NOT NULL,
  `nom_site` varchar(30) NOT NULL,
  `lien` varchar(100) NOT NULL,
  `date_creation` date NOT NULL DEFAULT current_timestamp(),
  `logo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `site_web`
--

INSERT INTO `site_web` (`id_site`, `nom_site`, `lien`, `date_creation`, `logo`) VALUES
(48, 'Pro service ', 'https://societe-travaux-electricite-maroc.energy/', '2023-11-16', '6556412806d14pro_service.jpg'),
(49, 'Win Best Nettoyage', 'https://www.nettoyage-casablanca-maroc.com/', '2023-11-16', '655641fabf4fewin_best.webp'),
(50, 'Pns Nettoyage', 'https://societe-nettoyage-casablanca.com/', '2023-11-16', '65564263dd37fpns_nettoyage.png'),
(51, 'Ara Nesttoyage', 'https://nettoyage-casablanca.net/', '2023-11-16', '655642ba5bef4ara_nettoyage.png'),
(52, 'Hvnet Nettoyage', 'https://www.nettoyage-casablanca-maroc.net/', '2023-11-16', '65564368bcb24HVNET-NETTOYAGE-LOGO.png'),
(53, 'Enet Nettoyage', 'https://nettoyage-casablancamaroc.com/', '2023-11-16', '655643ee418ebenet.webp'),
(54, 'Nova Nettoyage', 'https://www.societedenettoyagecasablanca.com/', '2023-11-16', '65564440a2c07nova_nettoyage.webp'),
(55, 'Adn Nettoyage', 'https://www.societe-nettoyagecasablanca.com/', '2023-11-16', '65564472de9e0adn_nettoyage.webp'),
(56, 'Master Pro Nettoyage', 'https://www.societe-nettoyage-casablanca.net/', '2023-11-16', '655644e69763bmasterpro-nettoyage.png'),
(57, 'Nss Nettoyage', 'https://nettoyagecasablanca.net/', '2023-11-16', '6556456512600NSS-NETTOYAGE-LOGO.webp'),
(58, 'Chronomenage', 'https://www.chronomenage.com/', '2023-11-16', '6556461a6049dchronomenage.png'),
(59, 'Als Nettoyage', 'https://societenettoyage-casablanca.com/', '2023-11-16', '655646e1df42dals_nettoyage.webp'),
(60, 'Enet Antinuisible', 'https://www.desinsectisation-deratisation-casablanca.com/', '2023-11-16', '655647578af50LOGO-ENET-ANTINUISIBLE.webp'),
(61, 'Kpm Nettoyage', 'https://kpmnettoyage.com/', '2023-11-16', '655647aca7a20kpm_nettoyage.png'),
(62, 'Proskin ', 'https://www.proskin-maroc.ma/index.php', '2023-11-16', 'web.png'),
(63, 'Bh Clean Company', 'https://www.bhclean.ma/', '2023-11-16', '655648ec11e62bh_clean.webp.crdownload'),
(64, 'Kam service', 'https://kam-service.ma/', '2023-11-16', '655649a4899a2kamservice$.jpg'),
(65, 'Yasse Services et conseil', 'https://societe-deratisation-casa.com/', '2023-11-16', '655649e20df5blogo_deratisation-casa-maroc-2.png'),
(66, 'Hk propre', 'https://hk-propre.com/', '2023-11-16', '65564a286f204hkpropre.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bloc_note`
--
ALTER TABLE `bloc_note`
  ADD PRIMARY KEY (`id_bloc_note`);

--
-- Index pour la table `contactez_nous`
--
ALTER TABLE `contactez_nous`
  ADD PRIMARY KEY (`id_contact`);

--
-- Index pour la table `demandez_devis`
--
ALTER TABLE `demandez_devis`
  ADD PRIMARY KEY (`id_devis`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Index pour la table `site_web`
--
ALTER TABLE `site_web`
  ADD PRIMARY KEY (`id_site`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bloc_note`
--
ALTER TABLE `bloc_note`
  MODIFY `id_bloc_note` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=364;

--
-- AUTO_INCREMENT pour la table `contactez_nous`
--
ALTER TABLE `contactez_nous`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `demandez_devis`
--
ALTER TABLE `demandez_devis`
  MODIFY `id_devis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `site_web`
--
ALTER TABLE `site_web`
  MODIFY `id_site` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
