-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2015 年 03 月 31 日 17:29
-- 服务器版本: 5.5.32
-- PHP 版本: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `tylw`
--
CREATE DATABASE IF NOT EXISTS `tylw` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tylw`;

-- --------------------------------------------------------

--
-- 表的结构 `evaluating`
--

CREATE TABLE IF NOT EXISTS `evaluating` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `teacherID` varchar(255) DEFAULT NULL,
  `studentID` varchar(255) NOT NULL,
  `c1` int(11) DEFAULT NULL,
  `c2` int(11) DEFAULT NULL,
  `c3` int(11) DEFAULT NULL,
  `c4` int(11) DEFAULT NULL,
  `c5` int(11) DEFAULT NULL,
  `c6` int(11) DEFAULT NULL,
  `c7` int(11) DEFAULT NULL,
  `c8` int(11) DEFAULT NULL,
  `c9` int(11) DEFAULT NULL,
  `c10` int(11) DEFAULT NULL,
  `c11` int(11) DEFAULT NULL,
  `t1` varchar(255) DEFAULT NULL,
  `t2` varchar(255) DEFAULT NULL,
  `t3` varchar(255) DEFAULT NULL,
  `t4` varchar(255) DEFAULT NULL,
  `t5` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `summary` text,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- 表的结构 `login_history`
--

CREATE TABLE IF NOT EXISTS `login_history` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(256) NOT NULL,
  `login_time` datetime NOT NULL,
  `ip` varchar(256) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- 表的结构 `other`
--

CREATE TABLE IF NOT EXISTS `other` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NowJudgeYear` varchar(255) NOT NULL,
  `lastOutTea` int(11) NOT NULL,
  `lastPaperNum` int(11) NOT NULL,
  `masRepeatRate` double NOT NULL,
  `docRepeatRate` double NOT NULL,
  `lastSecUser` int(11) NOT NULL,
  `lastBackupTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- 表的结构 `record_evaluating`
--

CREATE TABLE IF NOT EXISTS `record_evaluating` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `teacherID` varchar(255) DEFAULT NULL,
  `studentID` varchar(255) NOT NULL,
  `c1` int(11) DEFAULT NULL,
  `c2` int(11) DEFAULT NULL,
  `c3` int(11) DEFAULT NULL,
  `c4` int(11) DEFAULT NULL,
  `c5` int(11) DEFAULT NULL,
  `c6` int(11) DEFAULT NULL,
  `c7` int(11) DEFAULT NULL,
  `c8` int(11) DEFAULT NULL,
  `c9` int(11) DEFAULT NULL,
  `c10` int(11) DEFAULT NULL,
  `c11` int(11) DEFAULT NULL,
  `t1` varchar(255) DEFAULT NULL,
  `t2` varchar(255) DEFAULT NULL,
  `t3` varchar(255) DEFAULT NULL,
  `t4` varchar(255) DEFAULT NULL,
  `t5` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `summary` text,
  `judgeYear` varchar(255) NOT NULL,
  `tName` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`eid`,`judgeYear`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=823 ;

-- --------------------------------------------------------

--
-- 表的结构 `record_student`
--

CREATE TABLE IF NOT EXISTS `record_student` (
  `studentID` varchar(255) NOT NULL,
  `sName` varchar(255) NOT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `major` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `IDcard` varchar(255) DEFAULT NULL,
  `tutor` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `paperAdd` varchar(255) DEFAULT NULL,
  `reportAdd` varchar(255) DEFAULT NULL,
  `paperNum` varchar(255) DEFAULT NULL,
  `paperName` varchar(255) DEFAULT NULL,
  `repeatRate` double DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `judgeYear` varchar(255) NOT NULL,
  PRIMARY KEY (`studentID`,`judgeYear`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `secretary`
--

CREATE TABLE IF NOT EXISTS `secretary` (
  `userID` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `studentID` varchar(255) NOT NULL,
  `sName` varchar(255) NOT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `major` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `IDcard` varchar(255) DEFAULT NULL,
  `tutor` varchar(255) DEFAULT NULL,
  `typeID` varchar(255) DEFAULT NULL,
  `paperAdd` varchar(255) DEFAULT NULL,
  `reportAdd` varchar(255) DEFAULT NULL,
  `paperNum` varchar(255) DEFAULT NULL,
  `paperName` varchar(255) DEFAULT NULL,
  `repeatRate` double DEFAULT NULL,
  `papDeadline` date DEFAULT NULL,
  `repDeadline` date DEFAULT NULL,
  PRIMARY KEY (`studentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `studenttype`
--

CREATE TABLE IF NOT EXISTS `studenttype` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `typeName` varchar(255) NOT NULL,
  `degree` text NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- 表的结构 `teacheronside`
--

CREATE TABLE IF NOT EXISTS `teacheronside` (
  `teacherID` varchar(255) NOT NULL,
  `tName` varchar(255) NOT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `research` varchar(255) DEFAULT NULL,
  `TdeadLine` date DEFAULT NULL,
  PRIMARY KEY (`teacherID`),
  KEY `teacherID` (`teacherID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `teacheroutside`
--

CREATE TABLE IF NOT EXISTS `teacheroutside` (
  `userID` varchar(255) NOT NULL,
  `TdeadLine` date DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `uType` varchar(255) NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 限制导出的表
--

--
-- 限制表 `secretary`
--
ALTER TABLE `secretary`
  ADD CONSTRAINT `FK_SEC` FOREIGN KEY (`userID`) REFERENCES `user` (`user`);

--
-- 限制表 `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `FK_studentID` FOREIGN KEY (`studentID`) REFERENCES `user` (`user`);

--
-- 限制表 `teacheronside`
--
ALTER TABLE `teacheronside`
  ADD CONSTRAINT `FK_onTeacherID` FOREIGN KEY (`teacherID`) REFERENCES `user` (`user`);

--
-- 限制表 `teacheroutside`
--
ALTER TABLE `teacheroutside`
  ADD CONSTRAINT `FK_outTea` FOREIGN KEY (`userID`) REFERENCES `user` (`user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
