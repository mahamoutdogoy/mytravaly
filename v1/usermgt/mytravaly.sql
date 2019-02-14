-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 04 fév. 2019 à 13:17
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mytravaly`
--

-- --------------------------------------------------------

--
-- Structure de la table `attendance`
--

CREATE TABLE `attendance` (
  `attid` int(11) NOT NULL,
  `attuserid` int(11) NOT NULL,
  `timein` datetime NOT NULL,
  `timeout` datetime NOT NULL,
  `attdate` date NOT NULL,
  `attstatus` int(11) NOT NULL,
  `workhour` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `departments`
--

CREATE TABLE `departments` (
  `depid` int(11) NOT NULL,
  `depname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `departments`
--

INSERT INTO `departments` (`depid`, `depname`) VALUES
(1, 'Marketing');

-- --------------------------------------------------------

--
-- Structure de la table `designations`
--

CREATE TABLE `designations` (
  `desid` int(11) NOT NULL,
  `desname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `designations`
--

INSERT INTO `designations` (`desid`, `desname`) VALUES
(1, 'developer'),
(2, 'manager'),
(4, 'technician'),
(5, 'adviser'),
(6, 'manager');

-- --------------------------------------------------------

--
-- Structure de la table `have_previleges`
--

CREATE TABLE `have_previleges` (
  `puserid` int(11) NOT NULL,
  `ppreid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `have_previleges`
--

INSERT INTO `have_previleges` (`puserid`, `ppreid`) VALUES
(2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `holidays`
--

CREATE TABLE `holidays` (
  `holid` int(11) NOT NULL,
  `holdate` date NOT NULL,
  `holtitle` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `holidays`
--

INSERT INTO `holidays` (`holid`, `holdate`, `holtitle`) VALUES
(9, '2019-01-16', 'Divali'),
(11, '2019-01-17', 'Chrismas'),
(12, '2019-01-31', 'Atha'),
(13, '2019-01-27', 'republic day');

-- --------------------------------------------------------

--
-- Structure de la table `leave_application`
--

CREATE TABLE `leave_application` (
  `appid` int(11) NOT NULL,
  `appuserid` int(11) NOT NULL,
  `appdesc` text NOT NULL,
  `appdate` date NOT NULL,
  `appcatid` int(11) NOT NULL,
  `appstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `leave_application`
--

INSERT INTO `leave_application` (`appid`, `appuserid`, `appdesc`, `appdate`, `appcatid`, `appstatus`) VALUES
(1, 0, 'hdsjfsdghfjsdgfsd', '2019-01-31', 3, 2),
(2, 0, 'because of because', '2019-01-26', 4, 1),
(4, 0, 'Monthly review 1 at college', '2019-02-03', 4, 1),
(5, 0, 'blablablabla', '2019-02-01', 2, 1),
(6, 0, 'ertuoteuiteutiret', '2019-02-02', 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `leave_category`
--

CREATE TABLE `leave_category` (
  `catid` int(11) NOT NULL,
  `catname` text NOT NULL,
  `catpolicy` text NOT NULL,
  `catdays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `leave_category`
--

INSERT INTO `leave_category` (`catid`, `catname`, `catpolicy`, `catdays`) VALUES
(2, 'Weekly', '', 2),
(3, 'Monthly', '', 8),
(4, 'casual', 'this casual leave follows some rules', 25);

-- --------------------------------------------------------

--
-- Structure de la table `notices`
--

CREATE TABLE `notices` (
  `notid` int(11) NOT NULL,
  `notname` text NOT NULL,
  `notcontent` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notices`
--

INSERT INTO `notices` (`notid`, `notname`, `notcontent`) VALUES
(1, 'Some infos', 'some important information go here.... and more and more  and more..........'),
(3, 'password', 'This is to inform all users that password policies are very important for your security and they should be follewed accordingly'),
(4, 'yes', 'yesyeyeysyeyye eyeyeseyyeeyey eyeyesyye yeyesyeyeey syeyysey seyey eyey');

-- --------------------------------------------------------

--
-- Structure de la table `privileges`
--

CREATE TABLE `privileges` (
  `preid` int(11) NOT NULL,
  `prename` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `privileges`
--

INSERT INTO `privileges` (`preid`, `prename`) VALUES
(1, 'ResMail'),
(2, 'CRM'),
(3, 'Property'),
(4, 'PMS'),
(5, 'Accounts'),
(6, 'Social Media'),
(7, 'Reports'),
(8, 'Market Place'),
(9, 'User Management'),
(10, 'Profit Maker');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `userid` int(10) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `passwd` text NOT NULL,
  `username` text NOT NULL,
  `mobile` text NOT NULL,
  `designation` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `pict` text NOT NULL,
  `role` text NOT NULL,
  `status` int(11) NOT NULL,
  `dateofcreation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`userid`, `name`, `email`, `passwd`, `username`, `mobile`, `designation`, `department`, `pict`, `role`, `status`, `dateofcreation`) VALUES
(2, 'Hassan', 'han@han.com', '123456', 'minigo', '', 0, 0, '', 'Admin', 0, '2019-01-29'),
(5, 'hamlet', 'ahhd@ahh.com', 'dsfsfs', 'roy', '65566565', 0, 0, '', 'Admin', 0, '2019-01-29'),
(7, 'mahamat', 'mht@mht.com', '124503', 'dogoy', '01245789', 0, 0, '', 'User', 1, '2019-01-31'),
(9, 'Hamit', 'ham@ham.com', '120345', 'Hidiba', '84548785548', 4, 1, '', 'User', 1, '2019-01-31');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attid`);

--
-- Index pour la table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`depid`);

--
-- Index pour la table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`desid`);

--
-- Index pour la table `have_previleges`
--
ALTER TABLE `have_previleges`
  ADD PRIMARY KEY (`puserid`,`ppreid`);

--
-- Index pour la table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`holid`);

--
-- Index pour la table `leave_application`
--
ALTER TABLE `leave_application`
  ADD PRIMARY KEY (`appid`);

--
-- Index pour la table `leave_category`
--
ALTER TABLE `leave_category`
  ADD PRIMARY KEY (`catid`);

--
-- Index pour la table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`notid`);

--
-- Index pour la table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`preid`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `departments`
--
ALTER TABLE `departments`
  MODIFY `depid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `designations`
--
ALTER TABLE `designations`
  MODIFY `desid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `holid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `leave_application`
--
ALTER TABLE `leave_application`
  MODIFY `appid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `leave_category`
--
ALTER TABLE `leave_category`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `notices`
--
ALTER TABLE `notices`
  MODIFY `notid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `preid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
