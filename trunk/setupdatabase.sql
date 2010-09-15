-- phpMyAdmin SQL Dump
-- version 2.11.9.4
-- http://www.phpmyadmin.net
--
-- Generation Time: Sep 15, 2010 at 1:54 AM

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ustalk`
--

-- --------------------------------------------------------

--
-- Table structure for table `bungie`
--

CREATE TABLE `bungie` (
  `id` bigint(20) NOT NULL,
  `on` datetime default NULL,
  `update` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `name` text NOT NULL,
  `userpost` bigint(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bungie`
--

INSERT INTO `bungie` VALUES(1, '2010-08-27 15:49:00', '2010-08-28 11:28:46', 'Achronos', 48038201);
INSERT INTO `bungie` VALUES(104, '2010-08-11 00:22:00', '2010-08-28 11:29:31', 'stosh', 46958948);
INSERT INTO `bungie` VALUES(184, '2008-11-15 14:47:00', '2010-08-28 11:30:26', 'chris547', 27998532);
INSERT INTO `bungie` VALUES(326, '2009-11-17 02:36:00', '2010-08-28 11:30:16', 'goweb', 38989481);
INSERT INTO `bungie` VALUES(928, '2010-08-23 11:43:00', '2010-08-28 11:29:20', 'Sir Fragula', 47921286);
INSERT INTO `bungie` VALUES(1195, '2009-10-30 00:00:00', '2010-08-29 07:05:14', 'Sketch', 43452749);
INSERT INTO `bungie` VALUES(2488, '2009-11-23 18:27:00', '2010-08-28 11:30:11', 'BobBQ', 39138027);
INSERT INTO `bungie` VALUES(3229, '2010-08-27 21:53:00', '2010-08-28 11:28:10', 'Yoozel', 47946916);
INSERT INTO `bungie` VALUES(3876, '2010-08-28 08:08:00', '2010-08-28 11:27:35', 'just another fan', 47994330);
INSERT INTO `bungie` VALUES(6693, '2010-08-24 11:22:00', '2010-08-28 11:29:10', 'Nedus', 46970214);
INSERT INTO `bungie` VALUES(23581, '2009-10-14 00:00:00', '2010-08-29 07:05:23', 'Anton P Nym', 21882864);
INSERT INTO `bungie` VALUES(29832, '2010-08-27 18:29:00', '2010-08-28 11:28:36', 'Captain K Mart', 48036712);
INSERT INTO `bungie` VALUES(37221, '2010-03-16 06:11:00', '2010-08-28 11:30:06', 'GameJunkieJim', 42155212);
INSERT INTO `bungie` VALUES(38444, '2010-08-23 18:07:00', '2010-08-28 11:29:15', 'Nosferatu_Soldie', 43084746);
INSERT INTO `bungie` VALUES(40153, '2010-08-20 11:43:00', '2010-08-28 11:29:26', 'ash55', 47750865);
INSERT INTO `bungie` VALUES(94371, '2010-08-28 00:59:00', '2010-08-28 11:28:00', 'Duardo', 48057220);
INSERT INTO `bungie` VALUES(143388, '2010-08-28 07:32:00', '2010-08-28 11:27:40', 'Gods Prophet', 47752613);
INSERT INTO `bungie` VALUES(350197, '2010-07-24 01:17:00', '2010-08-28 11:29:41', 'THE DON WAN', 43933990);
INSERT INTO `bungie` VALUES(397780, '2010-08-28 02:42:00', '2010-08-28 11:27:55', 'Senor Leche', 47948391);
INSERT INTO `bungie` VALUES(399968, '2010-08-28 08:31:00', '2010-08-28 11:27:29', 'El Roboto', 47570132);
INSERT INTO `bungie` VALUES(424344, '2010-08-26 12:12:00', '2010-08-28 11:28:55', 'odmichael', 48047498);
INSERT INTO `bungie` VALUES(470280, '2010-08-27 18:37:00', '2010-08-28 11:28:31', 'Great_Pretender', 47051906);
INSERT INTO `bungie` VALUES(596146, '2010-08-28 10:04:00', '2010-08-28 11:27:05', 'borrowedchief', 47946894);
INSERT INTO `bungie` VALUES(785739, '2010-08-28 09:36:00', '2010-08-28 11:27:15', 'Qbix89', 48044223);
INSERT INTO `bungie` VALUES(995056, '2010-08-27 09:08:00', '2010-08-28 21:57:02', 'True Underdog', 48043482);
INSERT INTO `bungie` VALUES(1083656, '2010-08-28 08:54:00', '2010-08-28 11:27:25', 'Butane123', 47972804);
INSERT INTO `bungie` VALUES(1219475, '2010-08-28 11:11:00', '2010-08-28 11:28:51', 'x Lord Revan x', 48019207);
INSERT INTO `bungie` VALUES(1659344, '2010-08-27 21:21:00', '2010-08-28 11:28:15', 'The Slayer', 48047093);
INSERT INTO `bungie` VALUES(1667625, '2010-04-29 19:22:00', '2010-08-28 11:30:00', 'Skiptrace', 43429264);
INSERT INTO `bungie` VALUES(1804295, '2010-07-01 02:30:00', '2010-08-28 11:29:56', 'runningturtle', 45634237);
INSERT INTO `bungie` VALUES(1837598, '2010-08-28 05:32:00', '2010-08-28 11:27:46', 'TOM T 117', 48034678);
INSERT INTO `bungie` VALUES(1848159, '2010-08-27 16:00:00', '2010-08-28 11:28:41', 'x Foman123 x', 47976451);
INSERT INTO `bungie` VALUES(2285405, '2010-07-09 15:59:00', '2010-08-28 11:29:47', 'lukems', 45968034);
INSERT INTO `bungie` VALUES(2500705, '2010-07-29 09:13:00', '2010-08-28 11:29:36', 'Pezz', 46203336);
INSERT INTO `bungie` VALUES(2597260, '2010-08-27 20:50:00', '2010-08-28 11:28:20', 'bobcast', 48039348);
INSERT INTO `bungie` VALUES(2789359, '2010-08-27 23:03:00', '2010-08-28 11:28:05', 'dazarobbo', 48027296);
INSERT INTO `bungie` VALUES(2935625, '2010-08-25 04:57:00', '2010-08-28 11:29:05', 'Old Papa Rich', 47979389);
INSERT INTO `bungie` VALUES(3446359, '2010-08-28 09:00:00', '2010-08-28 11:27:20', 'Predator5791', 47921619);
INSERT INTO `bungie` VALUES(5559084, '2010-08-27 20:04:00', '2010-08-28 11:28:26', 'urk', 46793669);
INSERT INTO `bungie` VALUES(8705967, '2010-08-28 09:40:00', '2010-08-28 11:27:10', 'Recon Number 54', 48052773);
INSERT INTO `bungie` VALUES(8714227, '2010-08-25 23:55:00', '2010-08-28 11:29:00', 'Dr Weird', 48516815);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL,
  `pass` text NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`),
  FULLTEXT KEY `pass` (`pass`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

-- uStalk Root Account Defaults:
-- Username: root
-- Password: admin
INSERT INTO `user` VALUES(1, 'root', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `uwatch`
--

CREATE TABLE `uwatch` (
  `id` bigint(20) NOT NULL,
  `bid` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `avatar` text NOT NULL,
  PRIMARY KEY  (`id`,`bid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uwatch`
--

INSERT INTO `uwatch` VALUES(1, 1, 'Achronos', 'http://www.bungie.net/Forums/skins/default/avatars/staffonly_achronos.gif');
INSERT INTO `uwatch` VALUES(1, 104, 'stosh', 'http://www.bungie.net/Stats/emblem.ashx?s=90&0=24&1=2&2=2&3=21&fi=41&bi=1&fl=1&m=3');
INSERT INTO `uwatch` VALUES(1, 184, 'chris547', 'http://www.bungie.net/Forums/skins/default/avatars/moderator_chris547.gif');
INSERT INTO `uwatch` VALUES(1, 326, 'goweb', 'http://www.bungie.net/Forums/skins/default/avatars/moderator_goweb.gif');
INSERT INTO `uwatch` VALUES(1, 928, 'Sir Fragula', 'http://www.bungie.net/Forums/skins/default/avatars/sirfragula_avatar.gif');
INSERT INTO `uwatch` VALUES(1, 1195, 'Sketch', 'http://www.bungie.net/Forums/skins/default/avatars/staffonly_ske7ch.gif');
INSERT INTO `uwatch` VALUES(1, 2488, 'BobBQ', 'http://www.bungie.net/Forums/skins/default/avatars/moderator_BobBQ.gif');
INSERT INTO `uwatch` VALUES(1, 3229, 'Yoozel', 'http://www.bungie.net/Forums/skins/default/avatars/moderator_yoozel.gif');
INSERT INTO `uwatch` VALUES(1, 3876, 'just another fan', 'http://www.bungie.net/Forums/skins/default/avatars/moderator_jaf.gif');
INSERT INTO `uwatch` VALUES(1, 6693, 'Nedus', 'http://www.bungie.net/Forums/skins/default/avatars/moderator_nedus.gif');
INSERT INTO `uwatch` VALUES(1, 23581, 'Anton P Nym', 'http://www.bungie.net/Forums/skins/default/avatars/moderator_apn.gif');
INSERT INTO `uwatch` VALUES(1, 29832, 'Captain K Mart', 'http://www.bungie.net/Forums/skins/default/avatars/moderator_kmart.gif');
INSERT INTO `uwatch` VALUES(1, 37221, 'GameJunkieJim', 'http://www.bungie.net/Forums/skins/default/avatars/moderator_gamejunkiejim.gif');
INSERT INTO `uwatch` VALUES(1, 38444, 'Nosferatu_Soldie', 'http://www.bungie.net/Forums/skins/default/avatars/moderator_nosferatu.gif');
INSERT INTO `uwatch` VALUES(1, 40153, 'ash55', 'http://www.bungie.net/Forums/skins/default/avatars/moderator_ash55.gif');
INSERT INTO `uwatch` VALUES(1, 94371, 'Duardo', 'http://www.bungie.net/Forums/skins/default/avatars/moderator_duardo.gif');
INSERT INTO `uwatch` VALUES(1, 143388, 'Gods Prophet', 'http://www.bungie.net/Forums/skins/default/avatars/moderator_prophet.gif');
INSERT INTO `uwatch` VALUES(1, 350197, 'THE DON WAN', 'http://www.bungie.net/Forums/skins/default/avatars/donwan.gif');
INSERT INTO `uwatch` VALUES(1, 397780, 'Senor Leche', 'http://www.bungie.net/Forums/skins/default/avatars/moderator_leche.gif');
INSERT INTO `uwatch` VALUES(1, 399968, 'El Roboto', 'http://www.bungie.net/Forums/skins/default/avatars/moderator_elroboto.gif');
INSERT INTO `uwatch` VALUES(1, 424344, 'odmichael', 'http://www.bungie.net/Forums/skins/default/avatars/moderator_odmichael.gif');
INSERT INTO `uwatch` VALUES(1, 470280, 'Great_Pretender', 'http://www.bungie.net/Forums/skins/default/avatars/moderator_greatpretender.gif');
INSERT INTO `uwatch` VALUES(1, 596146, 'borrowedchief', 'http://www.bungie.net/Forums/skins/default/avatars/moderator_borrowedchief.jpg');
INSERT INTO `uwatch` VALUES(1, 785739, 'Qbix89', 'http://www.bungie.net/Forums/skins/default/avatars/moderator_qbix89.gif');
INSERT INTO `uwatch` VALUES(1, 995056, 'True Underdog', 'http://www.bungie.net/Forums/skins/default/avatars/moderator_trueunderdog.gif');
INSERT INTO `uwatch` VALUES(1, 1083656, 'Butane123', 'http://www.bungie.net/Stats/halo2emblem.ashx?s=90&0=21&1=9&2=21&3=9&fi=10&bi=38&fl=1&m=1');
INSERT INTO `uwatch` VALUES(1, 1219475, 'x Lord Revan x', 'http://www.bungie.net/Forums/skins/default/avatars/moderator_revan.jpg');
INSERT INTO `uwatch` VALUES(1, 1659344, 'The Slayer', 'http://www.bungie.net/Forums/skins/default/avatars/moderator_theslayer.gif');
INSERT INTO `uwatch` VALUES(1, 1667625, 'Skiptrace', 'http://www.bungie.net/Forums/skins/default/avatars/default_avatar.gif');
INSERT INTO `uwatch` VALUES(1, 1804295, 'runningturtle', 'http://www.bungie.net/Forums/skins/default/avatars/runningturtle.gif');
INSERT INTO `uwatch` VALUES(1, 1837598, 'TOM T 117', 'http://www.bungie.net/Stats/emblem.ashx?s=90&0=15&1=2&2=15&3=2&fi=10&bi=38&fl=1&m=3');
INSERT INTO `uwatch` VALUES(1, 1848159, 'x Foman123 x', 'http://www.bungie.net/Forums/skins/default/avatars/moderator_foman.gif');
INSERT INTO `uwatch` VALUES(1, 2285405, 'lukems', 'http://www.bungie.net/Forums/skins/default/avatars/marathon.gif');
INSERT INTO `uwatch` VALUES(1, 2500705, 'Pezz', 'http://www.bungie.net/Forums/skins/default/avatars/moderator_pezza.gif');
INSERT INTO `uwatch` VALUES(1, 2597260, 'bobcast', 'http://www.bungie.net/Forums/skins/default/avatars/moderator_bobcast.jpg');
INSERT INTO `uwatch` VALUES(1, 2789359, 'dazarobbo', 'http://www.bungie.net/Stats/emblem.ashx?s=90&0=0&1=0&2=10&3=10&fi=47&bi=0&fl=0&m=1');
INSERT INTO `uwatch` VALUES(1, 2935625, 'Old Papa Rich', 'http://www.bungie.net/Forums/skins/default/avatars/moderator_oldpaparich.jpg');
INSERT INTO `uwatch` VALUES(1, 3446359, 'Predator5791', 'http://www.bungie.net/Forums/skins/default/avatars/moderator_predator5791.gif');
INSERT INTO `uwatch` VALUES(1, 5559084, 'urk', 'http://www.bungie.net/Forums/skins/default/avatars/urk.gif');
INSERT INTO `uwatch` VALUES(1, 8705967, 'Recon Number 54', 'http://www.bungie.net/Forums/skins/default/avatars/modertaor_Recon54.gif');
INSERT INTO `uwatch` VALUES(1, 8714227, 'Dr Weird', 'http://www.bungie.net/Stats/emblem.ashx?s=90&0=0&1=10&2=10&3=3&fi=38&bi=2&fl=0&m=1');
