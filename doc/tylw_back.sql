-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2014 年 02 月 24 日 06:06
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=96 ;

--
-- 转存表中的数据 `evaluating`
--

INSERT INTO `evaluating` (`eid`, `teacherID`, `studentID`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `c7`, `c8`, `c9`, `c10`, `c11`, `t1`, `t2`, `t3`, `t4`, `t5`, `time`, `summary`) VALUES
(73, 't100073', '323211', 1, 4, 3, 4, 2, 2, 1, 1, 2, 2, 2, '123', '123', '123', '123', '123', '2014-02-20', ' 123'),
(74, 't100074', '323211', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, '992', '123287', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, '993', '123287', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 't100077', '223232', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 't100078', '223232', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, '993', '1233', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, '992', '1233', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, '993', '223', 3, 4, 4, 4, 4, 2, 4, 4, 2, 2, 2, '123', '123', '123', '123', '123', '2014-02-12', '123123123 '),
(83, '992', '223', 2, 2, 1, 2, 4, 4, 2, 1, 2, 1, 2, '123', '123', '123', '123', '123', '2014-02-19', ' 123'),
(84, 't100084', '322332', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 't100085', '322332', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 't100086', '322332', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 't100087', '123347', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 't100088', '123347', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 't100089', '123347', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 't100090', '2398198', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 't100091', '2398198', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, 't100092', '123287', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 't100093', '123287', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 't100094', '123287', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 't100095', '123287', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `other`
--

CREATE TABLE IF NOT EXISTS `other` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NowJudgeYear` int(11) NOT NULL,
  `lastOutTea` int(11) NOT NULL,
  `lastPaperNum` int(11) NOT NULL,
  `masRepeatRate` double NOT NULL,
  `docRepeatRate` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `other`
--

INSERT INTO `other` (`id`, `NowJudgeYear`, `lastOutTea`, `lastPaperNum`, `masRepeatRate`, `docRepeatRate`) VALUES
(1, 2000, 100095, 100000005, 90, 98);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=96 ;

--
-- 转存表中的数据 `record_evaluating`
--

INSERT INTO `record_evaluating` (`eid`, `teacherID`, `studentID`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `c7`, `c8`, `c9`, `c10`, `c11`, `t1`, `t2`, `t3`, `t4`, `t5`, `time`, `summary`, `judgeYear`, `tName`, `status`) VALUES
(73, 't100073', '323211', 1, 4, 3, 4, 2, 2, 1, 1, 2, 2, 2, '123', '123', '123', '123', '123', '2014-02-20', ' 123', '2000', '', '通过审评'),
(74, 't100074', '323211', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '2000', '', '还未审评'),
(75, '992', '123287', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '2000', '哇塞', '还未审评'),
(76, '993', '123287', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '2000', '陈航', '还未审评'),
(77, 't100077', '223232', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '2000', '', '还未审评'),
(78, 't100078', '223232', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '2000', '', '还未审评'),
(79, '993', '1233', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '2000', '陈航', '还未审评'),
(80, '992', '1233', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '2000', '哇塞', '还未审评'),
(81, '993', '223', 3, 4, 4, 4, 4, 2, 4, 4, 2, 2, 2, '123', '123', '123', '123', '123', '2014-02-12', '123123123 ', '2000', '陈航', '通过审评'),
(83, '992', '223', 2, 2, 1, 2, 4, 4, 2, 1, 2, 1, 2, '123', '123', '123', '123', '123', '2014-02-19', ' 123', '2000', '哇塞', '通过审评'),
(84, 't100084', '322332', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '2000', '', '还未审评'),
(85, 't100085', '322332', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '2000', '', '还未审评'),
(86, 't100086', '322332', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '2000', '', '还未审评'),
(87, 't100087', '123347', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '2000', '', '还未审评'),
(88, 't100088', '123347', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '2000', '', '还未审评'),
(89, 't100089', '123347', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '2000', '', '还未审评'),
(90, 't100090', '2398198', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '2000', '', '还未审评'),
(91, 't100091', '2398198', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '2000', '', '还未审评'),
(92, 't100092', '123287', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '2000', '', '还未审评'),
(93, 't100093', '123287', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '2000', '', '还未审评'),
(94, 't100094', '123287', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '2000', '', '还未审评'),
(95, 't100095', '123287', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '2000', '', '还未审评');

-- --------------------------------------------------------

--
-- 表的结构 `record_student`
--

CREATE TABLE IF NOT EXISTS `record_student` (
  `studentID` varchar(255) NOT NULL,
  `sName` varchar(255) NOT NULL,
  `sex` varchar(255) DEFAULT NULL,
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
  PRIMARY KEY (`studentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `record_student`
--

INSERT INTO `record_student` (`studentID`, `sName`, `sex`, `subject`, `grade`, `IDcard`, `tutor`, `type`, `paperAdd`, `reportAdd`, `paperNum`, `paperName`, `repeatRate`, `status`, `judgeYear`) VALUES
('123287', '郭登高', '男', '方向1', '2011', '32012929291', '郭德纲', '硕士研究生', '', '', NULL, NULL, 0, '未上传论文', '2000'),
('1233', '关云长', '男', '篮球', '2011', '1111111112', '郭德纲', '硕士研究生', '', '', NULL, NULL, 0, '未上传论文', '2000'),
('123347', '赵子龙', '男', '足球', '2011', '1233123123', '郭德纲', '留学生博士', 'upFile/paper/2000/MdT2Ihz0MezWQx33.txt', 'upFile/report/2000/MdT2Ihz0MezWQx33.txt', NULL, NULL, 22, '正在评审', '2000'),
('223', '陈航', '女', '计算机科学', '2011', '232311827', '周润发', '港澳台博士', 'upFile/paper/2000/Mdj2Ihz0.txt', 'upFile/report/2000/Mdj2Ihz0.xlsx', NULL, NULL, 12.22, '通过评审', '2000'),
('223232', '我嘞个去', '女', '城市建设', '2011', '123456789871', '想的么', '硕士研究生', 'upFile/paper/2000/Mdj2Ihz0MejWMxy3.txt', 'upFile/report/2000/Mdj2Ihz0MejWMxy3.txt', NULL, NULL, 23, '正在评审', '2000'),
('2398198', '刘备', '男', '运动学', '2011', '231111', '周润发', '留学生硕士', '', '', NULL, NULL, 22, '未上传论文', '2000'),
('322332', '张飞', '男', '土木工程', '2011', '23231123121', '周润发', '博士研究生', 'upFile/paper/2000/Mdz2Ihy0MezWMxy3.txt', 'upFile/report/2000/Mdz2Ihy0MezWMxy3.docx', NULL, NULL, 23, '正在评审', '2000'),
('323211', '哇塞', '女', '软件工程', '2011', '1231231233', '哇哈', '体育硕士', 'upFile/paper/2000/Mdz2Ihz0MejWExx3.xlsx', 'upFile/report/2000/Mdz2Ihz0MejWExx3.dll', NULL, NULL, 0, '未填写论文重复率', '2000');

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `studentID` varchar(255) NOT NULL,
  `sName` varchar(255) NOT NULL,
  `sex` varchar(255) DEFAULT NULL,
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
  `SdeadLine` date DEFAULT NULL,
  PRIMARY KEY (`studentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`studentID`, `sName`, `sex`, `subject`, `grade`, `IDcard`, `tutor`, `typeID`, `paperAdd`, `reportAdd`, `paperNum`, `paperName`, `repeatRate`, `SdeadLine`) VALUES
('123287', '郭登高', '男', '方向1', '2011', '32012929291', '郭德纲', '1', NULL, NULL, NULL, NULL, NULL, '0000-00-00'),
('1233', '关云长', '男', '篮球', '2011', '1111111112', '郭德纲', '1', NULL, NULL, NULL, NULL, NULL, '0000-00-00'),
('123347', '赵子龙', '男', '足球', '2011', '1233123123', '郭德纲', '7', 'upFile/paper/2000/MdT2Ihz0MezWQx33.txt', 'upFile/report/2000/MdT2Ihz0MezWQx33.txt', '100000005', '123123', 22, '0000-00-00'),
('223', '陈航', '女', '计算机科学', '2011', '232311827', '周润发', '5', 'upFile/paper/2000/Mdj2Ihz0.txt', 'upFile/report/2000/Mdj2Ihz0.xlsx', '100000001', '大论文', 12.22, '0000-00-00'),
('223232', '我嘞个去', '女', '城市建设', '2011', '123456789871', '想的么', '1', 'upFile/paper/2000/Mdj2Ihz0MejWMxy3.txt', 'upFile/report/2000/Mdj2Ihz0MejWMxy3.txt', '100000002', '', 23, '0000-00-00'),
('2398198', '刘备', '男', '运动学', '2011', '231111', '周润发', '6', NULL, NULL, NULL, NULL, 22, '0000-00-00'),
('322332', '张飞', '男', '土木工程', '2011', '23231123121', '周润发', '2', 'upFile/paper/2000/Mdz2Ihy0MezWMxy3.txt', 'upFile/report/2000/Mdz2Ihy0MezWMxy3.docx', '100000004', '123123', 23, '0000-00-00'),
('323211', '哇塞', '女', '软件工程', '2011', '1231231233', '哇哈', '3', 'upFile/paper/2000/Mdz2Ihz0MejWExx3.xlsx', 'upFile/report/2000/Mdz2Ihz0MejWExx3.dll', '100000003', '2322', NULL, '0000-00-00');

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

--
-- 转存表中的数据 `studenttype`
--

INSERT INTO `studenttype` (`sid`, `typeName`, `degree`) VALUES
(1, '硕士研究生', 'mas'),
(2, '博士研究生', 'doc'),
(3, '体育硕士', 'mas'),
(4, '港澳台硕士', 'mas'),
(5, '港澳台博士', 'doc'),
(6, '留学生硕士', 'mas'),
(7, '留学生博士', 'doc');

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

--
-- 转存表中的数据 `teacheronside`
--

INSERT INTO `teacheronside` (`teacherID`, `tName`, `sex`, `subject`, `research`, `TdeadLine`) VALUES
('99123', '郭登高', '男', '方向1', '小方向1', '2014-02-28'),
('992', '哇塞', '女', '软件工程', '小软件工程', '2014-02-28'),
('99231', '张飞', '男', '土木工程', '小土木工程', '2014-02-28'),
('993', '陈航', '女', '计算机科学', '计算机科学', '2014-02-28'),
('994', '刘备', '男', '运动学', '小运动学', '2014-02-28'),
('995', '赵子龙', '男', '足球', '小足球', '2014-02-28'),
('996', '关云长', '男', '篮球', '小篮球', '2014-02-28');

-- --------------------------------------------------------

--
-- 表的结构 `teacheroutside`
--

CREATE TABLE IF NOT EXISTS `teacheroutside` (
  `userID` varchar(255) NOT NULL,
  `TdeadLine` date DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `teacheroutside`
--

INSERT INTO `teacheroutside` (`userID`, `TdeadLine`) VALUES
('t100073', '2014-02-28'),
('t100074', '2014-02-28'),
('t100075', '2014-02-28'),
('t100076', '2014-02-28'),
('t100077', '2014-02-28'),
('t100078', '2014-02-28'),
('t100079', '2014-02-28'),
('t100080', '2014-02-28'),
('t100081', '2014-02-28'),
('t100082', '2014-02-28'),
('t100083', '2014-02-28'),
('t100084', '2014-02-28'),
('t100085', '2014-02-28'),
('t100086', '2014-02-28'),
('t100087', '2014-02-28'),
('t100088', '2014-02-28'),
('t100089', '2014-02-28'),
('t100090', '2014-02-28'),
('t100091', '2014-02-28'),
('t100092', NULL),
('t100093', NULL),
('t100094', NULL),
('t100095', NULL);

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
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user`, `passwd`, `uType`) VALUES
('123287', '21017465', 'stu'),
('1233', '99773629', 'stu'),
('123347', '24057306', 'stu'),
('223', '29922795', 'stu'),
('223232', '58915051', 'stu'),
('2398198', '53306217', 'stu'),
('322332', '76827575', 'stu'),
('323211', '53057962', 'stu'),
('99123', '57248621', 'onTea'),
('992', '32307628', 'onTea'),
('99231', '63559583', 'onTea'),
('993', '30309454', 'onTea'),
('994', '81739264', 'onTea'),
('995', '52384034', 'onTea'),
('996', '10734322', 'onTea'),
('d11', '1', 'web'),
('fg', '1', 'web'),
('sys1', '1234', 'sys'),
('sys2', '12345', 'sys'),
('t100073', '58384364', 'outTea'),
('t100074', '61261187', 'outTea'),
('t100075', '31752954', 'outTea'),
('t100076', '25624563', 'outTea'),
('t100077', '10755672', 'outTea'),
('t100078', '84811067', 'outTea'),
('t100079', '95582418', 'outTea'),
('t100080', '30744690', 'outTea'),
('t100081', '76054372', 'outTea'),
('t100082', '81300342', 'outTea'),
('t100083', '52261466', 'outTea'),
('t100084', '38602112', 'outTea'),
('t100085', '25202567', 'outTea'),
('t100086', '81638000', 'outTea'),
('t100087', '84878697', 'outTea'),
('t100088', '20499017', 'outTea'),
('t100089', '58289946', 'outTea'),
('t100090', '55995152', 'outTea'),
('t100091', '18324313', 'outTea'),
('t100092', '54848588', 'outTea'),
('t100093', '21600444', 'outTea'),
('t100094', '97872740', 'outTea'),
('t100095', '75212629', 'outTea'),
('vdc', '1', 'web');

--
-- 限制导出的表
--

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
