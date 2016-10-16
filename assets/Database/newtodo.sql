-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 13, 2016 at 10:02 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `newtodo`
--

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE IF NOT EXISTS `lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `list_name` varchar(255) NOT NULL,
  `list_body` text NOT NULL,
  `list_user_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`id`, `list_name`, `list_body`, `list_user_id`, `create_date`) VALUES
(1, 'Tour With Friends', 'Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum,Lorem Ipsum', 2, '2016-10-11 11:10:42'),
(2, 'Get Raped by 1000 men', 'Liberty to get fucked', 2, '2016-10-11 11:10:42'),
(6, 'Freelancing', 'CrowCrowCrowCrowCrowCrowCrowCrowCrowCrowCrowCrowCrow', 2, '2016-10-11 11:11:59'),
(11, 'Toxy Turby', 'Time to burn and destroy', 2, '2016-10-11 14:24:57'),
(12, 'Suck Dick', 'I can suck dick if properly Lured', 3, '2016-10-13 12:50:59');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_name` varchar(255) NOT NULL,
  `task_body` text NOT NULL,
  `list_id` int(11) NOT NULL,
  `due_date` date NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_complete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task_name`, `task_body`, `list_id`, `due_date`, `create_date`, `is_complete`) VALUES
(5, 'Submission Of Project', 'Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Ipsum', 6, '2016-10-12', '2016-10-12 09:14:08', 1),
(6, 'Client Training', 'Indefinitely postponed', 6, '2016-10-13', '2016-10-12 09:14:08', 0),
(8, 'Burn Myself', 'On the LPG cylinder let gas fill the room, light the match', 11, '2016-10-12', '2016-10-12 09:15:35', 1),
(9, 'Finish CRUD model', 'CRUD model design structure to be finished today..', 6, '2016-10-12', '2016-10-12 10:28:46', 1),
(10, 'UI Changes', 'Need to change UI and fix bugs', 6, '2016-10-13', '2016-10-12 10:35:05', 0),
(12, 'Durga Puja Parikrama', 'Pandel hoping with friends and families', 1, '2016-10-13', '2016-10-13 10:28:14', 1),
(13, 'Darjeeling Tour', 'Pending..', 1, '2016-10-26', '2016-10-13 10:31:34', 0),
(18, 'Design Of Site', 'myTodo design', 6, '2016-10-12', '2016-10-13 12:00:27', 1),
(19, 'Fucking Die', 'Just Fucking Die..', 11, '2016-10-13', '2016-10-13 12:02:16', 0),
(20, 'Take Out', 'Open chain take out cock', 12, '2016-10-14', '2016-10-13 13:00:34', 0),
(21, 'Salivate', 'Jerk and wet with saliva', 12, '2016-10-14', '2016-10-13 13:00:52', 0),
(22, 'DeepThroat', 'Put in mouth and suck till cumm', 12, '2016-10-14', '2016-10-13 13:01:12', 0),
(23, 'Lure Him', 'Lure him to fuck me', 12, '2016-10-14', '2016-10-13 13:01:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `register_date`) VALUES
(1, 'Premangshu', 'Chanda', 'premangshuchanda@gmail.com', 'admin', 'bce6ac956eba5a41f68229ece0e699a5', '2016-10-10 17:44:48'),
(2, 'Priyanka', 'Raha', 'pujabitch@gmail.com', 'pujabitch', 'd8cb34d492ec90b71abaea614f3369a7', '2016-10-11 09:23:18'),
(3, 'Smita', 'Das', 'smitasucksdick@fuckuall.com', 'Smita', 'adfde2e5f92be60e2bba072a0b191238', '2016-10-13 12:50:19');
