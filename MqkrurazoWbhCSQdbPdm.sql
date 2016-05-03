-- phpMyAdmin SQL Dump
-- http://www.phpmyadmin.net
--
-- 生成日期: 2016 年 05 月 03 日 22:56

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `MqkrurazoWbhCSQdbPdm`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('666666', '666666');

-- --------------------------------------------------------

--
-- 表的结构 `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `bookname` varchar(50) NOT NULL,
  `author` varchar(50) DEFAULT NULL,
  `booknumber` varchar(50) NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`booknumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `book`
--

INSERT INTO `book` (`bookname`, `author`, `booknumber`, `type`, `status`) VALUES
('开荒恐惧', '很看好', '55555', 2, 0),
('20几岁要懂得的人生经验大全集', '东云', '6006008401980', 3, 1),
('流行吉他', '黑杭林', '7884822083', 4, 1),
('全国计算机等级考试二级教程——Visual Basic语言程序设计', '刘炳文', '9787040229448', 0, 1),
('全国计算机等级考试二级教程MS Office高级应用(2013年版)', '于双元', '9787040372298', 1, 1),
('全国计算机等级考试二级教程——公共基础知识', '徐士良', '9787040372328', 0, 1),
('如何阅读一本书', '查尔斯·范多伦', '9787100040945', 3, 1),
('管理信息系统(原书第11版)', '肯尼斯C劳顿', '9787111341512', 1, 1),
('全国计算机等级考试一本通二级Visual Basic', '闫怀平', '9787115297068', 0, 1),
('每个人都会死，但我总以为自己不会', 'Thomas Cathcart Daniel Klein', '9787115324924', 4, 1),
('全国计算机等级考试上机考试题库二级Access', '赵树刚', '9787121096051', 0, 1),
('如何发表公共演讲', '谢丽尔汉密尔顿', '9787301174067', 3, 1),
('武汉人', '方方', '9787305097461', 4, 1),
('星火英语4级真题试卷（2014）', '马德高', '9787313086723', 0, 1),
('读懂情人的50种方法', '托德莱昂', '9787508602790', 3, 1),
('乞力马扎罗的雪', '欧内斯顿·海明威', '9787510041006', 4, 1),
('消失的地平线', '詹姆斯·希尔顿', '9787510046018', 4, 1),
('我本红尘惆怅空-纳兰的词与人生', '孟琳', '9787511329578', 4, 1),
('自控力', '凯利·麦格尼格尔', '9787514205039', 3, 1),
('梦的解析', '弗洛伊德', '9787542626134', 3, 1),
('嫌疑人x的献身', '东野圭吾', '9787544245555', 4, 1),
('一桩事先张扬的凶杀案', '加西亚·马尔克斯', '9787544266123', 4, 1),
('小王子', '安托万圣埃克苏佩里', '9787544704571', 4, 1),
('风云人物采访记Ⅰ', '奥里亚娜法拉奇', '9787544723916', 3, 1),
('了不起的盖茨比', 'F.S.菲茨杰拉德', '9787544726436', 4, 1),
('拆掉思维里的墙', '古典', '9787806638866', 3, 1),
('大学与人生导论', '蒙雅森', '9787811356496', 3, 1),
('《统计学原理》学习指导及Excel数据统计分析(第二版)', '韩兆洲', '9787811357585', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `booknumber` varchar(50) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`id`, `booknumber`, `comment`, `time`) VALUES
(1, '5465798', '<h2>lkjkljiouiou</h2><h4>jlkjouoiuo</h4><p><br></p><p style="text-align: center;">g<i>rwktiouuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu</i></p>', '2016-04-09 03:09:12'),
(4, '5465798', '        <p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p>lkjglkjgoiruotiu</p>', '2016-04-09 03:48:49'),
(6, '5465798', '<br><br><br><br><br><br><br><br><p>@jghfd</p><br><br><br><br><br>vjifddj<br>', '2016-04-09 04:25:02'),
(10, '5465798', '<p>jklgjilwauetoqweutoi,&gt;?&lt;&gt;&lt;</p><br><br><br>,&lt;&gt;?&lt;&lt;:"L:"L:"L)*)(*%$', '2016-04-09 09:31:15'),
(29, '55555', '评价一下这本书吧&nbsp;~', '2016-04-10 12:53:31');

-- --------------------------------------------------------

--
-- 表的结构 `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `contact`
--

INSERT INTO `contact` (`id`, `username`, `email`, `comment`, `time`) VALUES
(7, 'fadgojior', 'galj@qq.com', '<p>I want ot say ~</p>', '2016-04-09 10:56:04');

-- --------------------------------------------------------

--
-- 表的结构 `people`
--

CREATE TABLE IF NOT EXISTS `people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentname` varchar(10) NOT NULL,
  `studentnumber` varchar(10) NOT NULL,
  `roomnumber` varchar(4) NOT NULL,
  `phonenumber` varchar(11) NOT NULL,
  `booknumber` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `people`
--

INSERT INTO `people` (`id`, `studentname`, `studentnumber`, `roomnumber`, `phonenumber`, `booknumber`, `status`, `time`) VALUES
(1, '建立', '8566699', '1245', '125457878', '55555', 0, '2016-04-08 10:54:08'),
(2, '监控链接', '46798798', '455', '8798798789', '786798', 1, '2016-04-09 15:22:46'),
(3, '接口连接', '56465', '2454', '465798797', '123456', 0, '2016-04-10 01:57:29'),
(4, 'gsdg', 'fsdg', 'fdg', 'fgd', 'dsfg', 0, '2016-04-10 06:27:23');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
