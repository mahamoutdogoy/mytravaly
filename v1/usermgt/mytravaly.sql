-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 18 fév. 2019 à 12:42
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
  `timein` time NOT NULL,
  `timeout` time NOT NULL,
  `attdate` date NOT NULL,
  `attstatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `attendance`
--

INSERT INTO `attendance` (`attid`, `attuserid`, `timein`, `timeout`, `attdate`, `attstatus`) VALUES
(4, 10, '06:40:53', '05:00:00', '2019-02-05', 'Present'),
(530, 10, '00:00:00', '05:00:00', '2019-02-11', 'Absent'),
(531, 10, '02:42:00', '05:00:00', '2019-02-11', 'Present'),
(532, 7, '03:42:00', '05:22:00', '2019-02-12', 'present'),
(533, 10, '14:16:00', '03:15:00', '2019-02-12', 'Present'),
(534, 10, '14:26:00', '03:15:00', '2019-02-12', 'Present'),
(535, 10, '15:12:00', '03:15:00', '2019-02-12', 'Present'),
(536, 10, '15:20:00', '00:00:00', '2019-02-12', 'Present'),
(537, 10, '15:27:00', '00:00:00', '2019-02-12', 'Present'),
(538, 10, '15:40:00', '00:00:00', '2019-02-12', 'Present'),
(539, 10, '15:43:00', '05:22:00', '2019-02-12', 'Present'),
(540, 10, '15:51:00', '03:53:00', '2019-02-12', 'Present'),
(541, 10, '11:39:00', '11:43:00', '2019-02-13', 'Present'),
(542, 7, '12:57:00', '13:03:00', '2019-02-13', 'Present'),
(543, 7, '14:16:00', '14:17:00', '2019-02-14', 'Present');

-- --------------------------------------------------------

--
-- Structure de la table `departments`
--

CREATE TABLE `departments` (
  `depid` int(11) NOT NULL,
  `depname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 4),
(2, 10),
(5, 7),
(9, 4);

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
(13, '2019-02-07', 'thisthsi'),
(14, '2019-02-28', 'yesyesyes');

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
(6, 0, 'ertuoteuiteutiret', '2019-02-02', 3, 2),
(7, 10, 'dfghjkhgdfg', '2019-02-06', 3, 2);

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
(4, 'casual', 'this casual leave follows some rules', 25),
(5, 'Monthly', 'sifgufdiogudfigoufdgiufgifdgufidugfdig', 10);

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
(3, 'password', 'This is to inform all users that password policies are very important for your security and they should be follewed accordingly');

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
-- Structure de la table `test`
--

CREATE TABLE `test` (
  `testid` int(11) NOT NULL,
  `testname` text NOT NULL,
  `testtest` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `test`
--

INSERT INTO `test` (`testid`, `testname`, `testtest`) VALUES
(1, '', 'ceci, yesyesy,noo,'),
(2, 'tets', 'ceci,noo,'),
(3, '', 'ceci,noo,'),
(4, 'papa', 'noo,'),
(5, 'MAMALLO', 'noo,'),
(6, 'YIIIOO', 'noo,'),
(7, 'HANI', 'noo,'),
(8, 'refsdfsd', 'noo,'),
(9, 'ffdgdg', 'noo,'),
(10, 'fsdf', 'noo,'),
(11, 'dfdf', 'noo,'),
(12, 'fsd', 'noo,'),
(13, '', 'noo,'),
(14, '', 'noo,'),
(15, '', 'noo,'),
(16, '', 'noo,'),
(17, '', 'noo,'),
(18, '', 'noo,'),
(19, '', 'noo,'),
(20, '', 'noo,'),
(21, '', 'noo,'),
(22, '', ''),
(23, '', ''),
(24, '', ''),
(25, '', ''),
(26, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `property` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`userid`, `fname`, `lname`, `password`, `property`, `email`, `country`, `image`, `role`, `status`) VALUES
(1, 'mahamat', 'abdallah', '12345', 'hotel', 'mahamatabdallah98@gmail.com', 'chad', '34.jpg', 'admin', 1),
(2, 'abib', 'issack', '12345', 'hotel', 'moimememoimeme2@gmail.com', 'chad', '10.jpg', 'user', 1),
(3, 'hamlet', 'roy', '12345', 'ban', 'hamlet@gmail.com', 'india', '20.jpg', 'superadmin', 1),
(4, 'shalini', 'm', '12345', 'ban', 'shalini@gmail.com', 'india', '54.jpg', 'user', 1),
(5, 'monish', 'k', '12345', 'hotel', 'monish@gmail.com', 'india', '38.jpg', 'user', 1),
(6, 'moujahid', 'm', '12345', 'hotel', 'moujahid@gmail.com', 'chad', '30.jpg', 'user', 1),
(7, 'hamid', 'd', '12345', 'ban', 'hamidaye10@gmail.com', 'chad', '30.jpg', 'user', 1),
(8, 'taha', 'm', '12345', 'hotel', 'taha@gmail.com', 'india', '40.jpg', 'user', 1),
(9, 'nish', 'mr', '12345', 'hotel', 'nish@gmail.com', 'chad', '50.jpg', 'user', 1);

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
  `dateofcreation` date NOT NULL,
  `punchin` int(11) DEFAULT '0',
  `privilege` text NOT NULL,
  `hotelid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`userid`, `name`, `email`, `passwd`, `username`, `mobile`, `designation`, `department`, `pict`, `role`, `status`, `dateofcreation`, `punchin`, `privilege`, `hotelid`) VALUES
(2, 'Hassan', 'han@han.com', '123456', 'minigo', '', 0, 0, '', 'admin', 1, '2019-01-29', 0, '', 1),
(5, 'hamlet', 'ahhd@ahh.com', 'dsfsfs', 'roy', '65566565', 0, 0, '', 'admin', 1, '2019-01-29', 0, '6,', 1),
(7, 'mahamat', 'mht@mht.com', '124503', 'dogoy', '01245789', 0, 0, '', 'user', 0, '2019-01-31', 0, '3,1,9,', 1),
(9, 'Hamit', 'ham@ham.com', '120345', 'Hidiba', '84548785548', 4, 1, '', 'user', 1, '2019-01-31', 0, '9,', 1),
(10, 'abdallah', 'admin@email.com', '12034', 'abib', '40012570', 1, 1, '', 'admin', 0, '2019-02-06', 0, '6,', 1);

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
-- Index pour la table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`testid`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

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
  MODIFY `attid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=544;

--
-- AUTO_INCREMENT pour la table `departments`
--
ALTER TABLE `departments`
  MODIFY `depid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `designations`
--
ALTER TABLE `designations`
  MODIFY `desid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `holid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `leave_application`
--
ALTER TABLE `leave_application`
  MODIFY `appid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `leave_category`
--
ALTER TABLE `leave_category`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `notices`
--
ALTER TABLE `notices`
  MODIFY `notid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `preid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `test`
--
ALTER TABLE `test`
  MODIFY `testid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
