-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2015 at 02:31 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `iziweb.vn`
--

-- --------------------------------------------------------

--
-- Table structure for table `izi_category`
--

CREATE TABLE IF NOT EXISTS `izi_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `tag_title` varchar(255) NOT NULL,
  `tag_description` text NOT NULL,
  `tag_keywords` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `izi_category`
--

INSERT INTO `izi_category` (`id`, `name`, `img`, `sort_order`, `tag_title`, `tag_description`, `tag_keywords`) VALUES
(1, 'Nổi bật', '/iziweb.vn/assets/admin/plugin/kcfinder/upload/images/star.png', 0, '', '', ''),
(2, 'Bán hàng', '/iziweb.vn/assets/admin/plugin/kcfinder/upload/images/cart.png', 0, '', '', ''),
(3, 'Giáo dục', '/iziweb.vn/assets/admin/plugin/kcfinder/upload/images/icon-07.png', 0, '', '', ''),
(4, 'Ô tô', '/iziweb.vn/assets/admin/plugin/kcfinder/upload/images/icon-08.png', 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `izi_comment`
--

CREATE TABLE IF NOT EXISTS `izi_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comment_time` datetime NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `content` text,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `object_type` varchar(20) DEFAULT NULL,
  `object_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `izi_config`
--

CREATE TABLE IF NOT EXISTS `izi_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `izi_customer_rate`
--

CREATE TABLE IF NOT EXISTS `izi_customer_rate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `sort_order` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `izi_online`
--

CREATE TABLE IF NOT EXISTS `izi_online` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `session` varchar(255) DEFAULT NULL,
  `on_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `izi_order`
--

CREATE TABLE IF NOT EXISTS `izi_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_time` datetime NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `order_info` text NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `theme_id` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `izi_order`
--

INSERT INTO `izi_order` (`id`, `order_time`, `full_name`, `email`, `phone`, `address`, `order_info`, `status`, `theme_id`) VALUES
(1, '2015-03-02 06:11:25', 'Nguyễn Duy Nhân', 'nhansay@gmail.com', '0988988988', 'Hà Nội', 'Thông tin thêm về đơn đặt hàng', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `izi_post`
--

CREATE TABLE IF NOT EXISTS `izi_post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` text,
  `post_date` date DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `excerpt` text,
  `content` text,
  `tags` varchar(255) DEFAULT NULL,
  `post_type` varchar(20) DEFAULT NULL,
  `views` int(10) unsigned NOT NULL DEFAULT '1',
  `tag_title` varchar(255) DEFAULT NULL,
  `tag_description` varchar(255) DEFAULT NULL,
  `tag_keywords` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `topic_id` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `izi_post`
--

INSERT INTO `izi_post` (`id`, `title`, `post_date`, `author`, `thumbnail`, `excerpt`, `content`, `tags`, `post_type`, `views`, `tag_title`, `tag_description`, `tag_keywords`, `status`, `topic_id`) VALUES
(1, 'Iziweb tuyển PHP Developer', '2015-03-06', 'Admin', '/iziweb.vn/assets/plugin/kcfinder/upload/images/2.jpg', '<p>Iziweb tuyển PHP Developer. M&ocirc; tả c&ocirc;ng việc: lập tr&igrave;nh c&aacute;c dự &aacute;n website cho c&ocirc;ng ty. Tham gia nghi&ecirc;n cứu v&agrave; ph&aacute;t triển thị trường nước ngo&agrave;i ...</p>\r\n', '<p>Iziweb tuyển PHP Developer. M&ocirc; tả c&ocirc;ng việc: lập tr&igrave;nh c&aacute;c dự &aacute;n website cho c&ocirc;ng ty. Tham gia nghi&ecirc;n cứu v&agrave; ph&aacute;t triển thị trường nước ngo&agrave;i. Y&ecirc;u cầu:</p>\r\n\r\n<p>- Biết lập tr&igrave;nh PHP.</p>\r\n\r\n<p>- Biết sử dụng một trong số&nbsp;framework: CodeIgniter, Laravel, Yii.</p>\r\n\r\n<p>- Ưu ti&ecirc;n ứng vi&ecirc;n biết Wordpress, Open Cart hoặc Magento.</p>\r\n\r\n<p>- Biết html, css, javascript, jQuery.</p>\r\n\r\n<p>- Ưu ti&ecirc;n ứng vi&ecirc;n biết html5, css3.</p>\r\n\r\n<p>- Biết MySQL, ưu ti&ecirc;n ứng vi&ecirc;n c&oacute; khả năng ph&acirc;n t&iacute;ch thiết kế CSDL, ph&acirc;n t&iacute;ch thiết kế hệ thống.</p>\r\n\r\n<p>Thời gian: part time hoặc full time.</p>\r\n', 'tuyển dụng,lập trình,php,developer', 'post', 1, '', NULL, '', 1, 2),
(2, 'Tuyển Tele-Sale', '2015-03-06', 'Admin', '/iziweb.vn/assets/plugin/kcfinder/upload/images/1.jpg', '<p>Tuyển nh&acirc;n sự kinh doanh. Y&ecirc;u cầu: giỏi tele-sale...</p>\r\n', '<p>Tuyển nh&acirc;n sự kinh doanh. Y&ecirc;u cầu: giỏi tele-sale...</p>\r\n', 'tuyển dụng,tele-sale,kinh doanh', 'post', 1, '', NULL, '', 1, 2),
(3, 'tin tức Iziweb', '2015-03-06', 'Admin', '/iziweb.vn/assets/plugin/kcfinder/upload/images/3(1).jpg', 'Nội dung tin tức nội dung tin tức nội nội dung\r\n', '<p>Nội dung tin tức nội dung tin tức nội nội dung</p>\r\n', '', 'post', 1, '', NULL, '', 1, 1),
(4, 'Giới thiệu', '2015-03-06', 'Admin', '/iziweb.vn/assets/plugin/kcfinder/upload/images/1.jpg', '<p>Giới thiệu Iziweb</p>\r\n', '<p>Giới thiệu Iziweb</p>\r\n', 'giới thiệu,iziweb', 'page', 1, '', NULL, '', 1, 0),
(5, 'Giới thiệu', '2015-03-06', 'Admin', '/iziweb.vn/assets/plugin/kcfinder/upload/images/3(1).jpg', 'Nội dung\r\n', '<p>Nội dung</p>\r\n', 'giới thiệu', 'page', 1, '', NULL, '', 1, 0),
(6, 'Liên hệ', '2015-03-06', 'Admin', '/iziweb.vn/assets/admin/plugin/kcfinder/upload/images/star.png', 'Nội dung phần li&ecirc;n hệ&nbsp;Nội dung phần li&ecirc;n hệ&nbsp;Nội dung phần li&ecirc;n hệ&nbsp;Nội dung phần li&ecirc;n hệ&nbsp;Nội dung phần li&ecirc;n', '<p>Nội dung phần li&ecirc;n hệ&nbsp;Nội dung phần li&ecirc;n hệ&nbsp;Nội dung phần li&ecirc;n hệ&nbsp;Nội dung phần li&ecirc;n hệ&nbsp;Nội dung phần li&ecirc;n hệ&nbsp;Nội dung phần li&ecirc;n hệ&nbsp;Nội dung phần li&ecirc;n hệ&nbsp;Nội dung phần li&ecirc;n hệ</p>\r\n', 'liên hệ,nội dung', 'page', 1, '', NULL, '', 1, 0),
(7, 'Phó thủ tướng', '2015-03-06', '', '', ' Ph&oacute; thủ tướng giao 3 bộ nghi&ecirc;n cứu đ&ecirc;̀ xu&acirc;́t tịch thu phương ti&ecirc;̣n Phó thủ tướng Nguy&ecirc;̃n Xu&acirc;n', '<div class="title_news" style="margin: 10px 0px 0px; padding: 0px 0px 10px; width: 480.015625px; float: left; font-family: arial; font-size: 12px; line-height: normal;">\r\n<h1>Ph&oacute; thủ tướng giao 3 bộ nghi&ecirc;n cứu đ&ecirc;̀ xu&acirc;́t tịch thu phương ti&ecirc;̣n</h1>\r\n</div>\r\n\r\n<div class="short_intro txt_666" style="margin: 0px; padding: 0px 0px 10px; color: rgb(68, 68, 68); font-weight: 700; font-stretch: normal; font-size: 14px; line-height: 18px; font-family: arial; width: 480.015625px; float: left; text-rendering: geometricprecision;">Phó thủ tướng Nguy&ecirc;̃n Xu&acirc;n Phúc vừa giao B&ocirc;̣ Giao th&ocirc;ng V&acirc;̣n tải chủ trì, ph&ocirc;́i hợp các B&ocirc;̣ C&ocirc;ng an, Tư pháp nghi&ecirc;n cứu đ&ecirc;̀ xu&acirc;́t vi&ecirc;̣c tịch thu phương ti&ecirc;̣n đ&ocirc;́i với lái xe uống nhiều rượu bia, báo cáo Thủ tướng trước 31/3.</div>\r\n\r\n<div class="relative_new" style="margin: 0px; padding: 0px 0px 5px; width: 480.015625px; float: left; color: rgb(0, 0, 0); font-family: arial; font-size: 12px; line-height: normal;">\r\n<ul style="list-style-type:none">\r\n	<li><a href="http://vnexpress.net/tin-tuc/thoi-su/tranh-cai-ve-de-xuat-thu-xe-cua-nguoi-vi-pham-giao-thong-3153403.html" style="margin: 0px; padding: 0px; color: rgb(102, 102, 102); text-decoration: none; outline: 1px; font-weight: 700; font-stretch: normal; line-height: 16px;" tabindex="1">Tranh c&atilde;i về đề xuất thu xe của người vi phạm giao th&ocirc;ng</a>&nbsp; / &nbsp;<a href="http://vnexpress.net/tin-tuc/thoi-su/giao-thong/de-xuat-tich-thu-phuong-tien-neu-lai-xe-co-nong-do-con-cao-3152970.html" style="margin: 0px; padding: 0px; color: rgb(102, 102, 102); text-decoration: none; outline: 1px; font-weight: 700; font-stretch: normal; line-height: 16px;" tabindex="2">Đề xuất tịch thu phương tiện nếu l&aacute;i xe c&oacute; nồng độ cồn cao</a></li>\r\n</ul>\r\n</div>\r\n\r\n<div id="left_calculator" style="margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: arial; font-size: 12px; line-height: normal;">\r\n<div class="fck_detail width_common" style="margin: 0px; padding: 0px 9.59375px 10px 0px; width: 470.40625px; float: left; overflow: hidden; font-stretch: normal; font-size: 14px; color: rgb(51, 51, 51);">\r\n<p>Ngày 6/3, Ph&oacute; thủ tướng Nguyễn Xu&acirc;n Ph&uacute;c y&ecirc;u cầu c&aacute;c bộ li&ecirc;n quan khẩn trương nghi&ecirc;n cứu đề xuất của Ủy ban An to&agrave;n giao th&ocirc;ng quốc gia về quy định xử phạt với những h&agrave;nh vi trực tiếp g&acirc;y tai nạn giao th&ocirc;ng v&agrave; hư hỏng kết cấu hạ tầng. C&aacute;c bộ phải&nbsp;b&aacute;o c&aacute;o Thủ tướng xem x&eacute;t, quyết định trước ng&agrave;y 31/3.</p>\r\n</div>\r\n</div>\r\n', '', 'post', 1, '', NULL, '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `izi_post_tag`
--

CREATE TABLE IF NOT EXISTS `izi_post_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned DEFAULT NULL,
  `tag_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `izi_post_tag`
--

INSERT INTO `izi_post_tag` (`id`, `post_id`, `tag_id`) VALUES
(14, 6, 10),
(15, 6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `izi_project`
--

CREATE TABLE IF NOT EXISTS `izi_project` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `content` text,
  `link` varchar(255) DEFAULT NULL,
  `show_in_home_page` tinyint(4) NOT NULL DEFAULT '0',
  `sort_order` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `izi_project`
--

INSERT INTO `izi_project` (`id`, `img`, `title`, `sub_title`, `content`, `link`, `show_in_home_page`, `sort_order`) VALUES
(1, '/iziweb.vn/assets/admin/plugin/kcfinder/upload/images/anh-du-an-24.jpg', 'Cửa hàng bơ Đà Lạt Viavo', 'Website, nhận diện thương hiệu', 'Viavo là cửa hàng hoa quả sạch Đà Lạt, nổi tiếng với bơ và các sản phẩm từ bơ. Thành lập năm 2012, chỉ sau 2 năm hoạt động Viavo đã trở thành thương hiệu hoa quả sạch hàng đầu Hà Nội.', 'http://viavo.vn', 1, 0),
(2, '/iziweb.vn/assets/admin/plugin/kcfinder/upload/images/anh-du-an-24.jpg', 'Công ty tư vấn du học Momiji', 'Website, nhận diện thương hiệu', 'Là trung tâm tư vấn du học Nhật Bản hàng đầu tại Hà Nội, Momiji đang ngày càng khẳng định uy tín và thương hiệu của mình.', 'http://duhocmomiji.com', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `izi_tag`
--

CREATE TABLE IF NOT EXISTS `izi_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `count_used` int(10) unsigned DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `izi_tag`
--

INSERT INTO `izi_tag` (`id`, `name`, `slug`, `count_used`) VALUES
(10, 'liên hệ', 'lien-he', 2);

-- --------------------------------------------------------

--
-- Table structure for table `izi_theme`
--

CREATE TABLE IF NOT EXISTS `izi_theme` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `price` decimal(15,0) unsigned NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `img` text NOT NULL,
  `description` text NOT NULL,
  `link_demo` varchar(255) DEFAULT NULL,
  `basic_feature` text,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `tag_title` varchar(255) NOT NULL,
  `tag_description` text NOT NULL,
  `tag_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `izi_theme`
--

INSERT INTO `izi_theme` (`id`, `title`, `price`, `thumbnail`, `img`, `description`, `link_demo`, `basic_feature`, `sort_order`, `tag_title`, `tag_description`, `tag_keywords`, `category_id`) VALUES
(24, 'Giao diện web bán hàng', '2000000', '/iziweb.vn/assets/plugin/kcfinder/upload/images/1.jpg', '/iziweb.vn/assets/plugin/kcfinder/upload/images/1.jpg', '<p>M&ocirc; tả giao diện</p>\r\n', '', '<p>M&ocirc; tả giao diện</p>\r\n', 0, '', '', '', 1),
(25, 'Giao dien web ban hang', '3000000', '/iziweb.vn/assets/plugin/kcfinder/upload/images/1.jpg', '/iziweb.vn/assets/plugin/kcfinder/upload/images/2.jpg', '', 'abc', '                                                    ', 0, 'test meta', '', '', 1),
(26, 'Siêu thị hàng tiêu dùng', '12000000', '/iziweb.vn/assets/plugin/kcfinder/upload/images/24723_0_vostro_5470.jpg', '/iziweb.vn/assets/plugin/kcfinder/upload/images/3.jpg', '<p>M&ocirc; tả giao diện m&ocirc; tả</p>\r\n', 'abc', '<p>T&iacute;nh năng cơ bản:</p>\r\n\r\n<p>1. Thanh to&aacute;n online.</p>\r\n\r\n<p>2. Kh&aacute;ch VIP.</p>\r\n\r\n<p>3. M&atilde; khuyến mại.</p>\r\n', 0, '', '', '', 1),
(27, 'Giao diện web ô tô', '2000000', '/iziweb.vn/assets/plugin/kcfinder/upload/images/3(1).jpg', '/iziweb.vn/assets/plugin/kcfinder/upload/images/3(1).jpg', '<p>M&ocirc; tả giao diện</p>\r\n', 'oto', '<p>T&iacute;nh năng cơ bản</p>\r\n', 0, '', '', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `izi_theme_tag`
--

CREATE TABLE IF NOT EXISTS `izi_theme_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `theme_id` int(10) unsigned DEFAULT NULL,
  `tag_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `izi_topic`
--

CREATE TABLE IF NOT EXISTS `izi_topic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `parent_id` int(10) unsigned DEFAULT '0',
  `tag_title` varchar(255) DEFAULT NULL,
  `tag_description` varchar(255) DEFAULT NULL,
  `tag_keywords` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `izi_topic`
--

INSERT INTO `izi_topic` (`id`, `name`, `slug`, `parent_id`, `tag_title`, `tag_description`, `tag_keywords`, `status`) VALUES
(1, 'Tin tức - Tuyển dụng', 'tin-tuc-tuyen-dung', 0, '', NULL, 'Tin tức', 1),
(2, 'Blog', 'blog', 0, '', NULL, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `izi_user`
--

CREATE TABLE IF NOT EXISTS `izi_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `izi_user`
--

INSERT INTO `izi_user` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'c6f057b86584942e415435ffb1fa93d4', 'admin@gmail.com'),
(6, 'nhansayabc', 'c6f057b86584942e415435ffb1fa93d4', 'nhansay@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
