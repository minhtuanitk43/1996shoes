-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th6 25, 2021 lúc 11:24 AM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `trieuminhtuan_2119110065`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trieuminhtuan_admin`
--

DROP TABLE IF EXISTS `trieuminhtuan_admin`;
CREATE TABLE IF NOT EXISTS `trieuminhtuan_admin` (
  `adminId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `adminName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` char(32) NOT NULL,
  `level` tinyint(1) NOT NULL,
  `trash` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`adminId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `trieuminhtuan_admin`
--

INSERT INTO `trieuminhtuan_admin` (`adminId`, `username`, `adminName`, `email`, `pass`, `level`, `trash`) VALUES
(1, 'minhtuan', 'tuan', 'minhtuan.itk43@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trieuminhtuan_brand`
--

DROP TABLE IF EXISTS `trieuminhtuan_brand`;
CREATE TABLE IF NOT EXISTS `trieuminhtuan_brand` (
  `brandId` int(11) NOT NULL AUTO_INCREMENT,
  `brandName` varchar(100) CHARACTER SET utf8 NOT NULL,
  `alias` varchar(100) CHARACTER SET utf8 NOT NULL,
  `trash` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`brandId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `trieuminhtuan_brand`
--

INSERT INTO `trieuminhtuan_brand` (`brandId`, `brandName`, `alias`, `trash`, `status`) VALUES
(1, 'Giày Nike', 'giay-nike', 0, 1),
(2, 'Giày Adidas', 'giay-adidas', 0, 1),
(3, 'Giày Puma', 'giay-puma', 0, 1),
(4, 'Giày Reebok', 'giay-reebok', 0, 1),
(7, 'thương hiệu 5', 'thuong-hieu-5', 0, 0),
(8, 'thương hiệu 3', 'thuong-hieu-3', 0, 0),
(9, 'thương hiệu 2', 'thuong-hieu-2', 0, 0),
(10, 'thương hiệu 4', 'thuong-hieu-4', 1, 0),
(11, 'thương hiệu 10', 'thuong-hieu-10', 0, 0),
(12, 'Giày Asics', 'giay-asics', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trieuminhtuan_cart`
--

DROP TABLE IF EXISTS `trieuminhtuan_cart`;
CREATE TABLE IF NOT EXISTS `trieuminhtuan_cart` (
  `cartId` int(11) NOT NULL AUTO_INCREMENT,
  `catName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `alias` varchar(255) NOT NULL,
  `parentId` int(11) NOT NULL,
  `trash` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`cartId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trieuminhtuan_category`
--

DROP TABLE IF EXISTS `trieuminhtuan_category`;
CREATE TABLE IF NOT EXISTS `trieuminhtuan_category` (
  `catId` int(11) NOT NULL AUTO_INCREMENT,
  `catName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8 NOT NULL,
  `parentId` int(11) NOT NULL,
  `trash` tinyint(4) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`catId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `trieuminhtuan_category`
--

INSERT INTO `trieuminhtuan_category` (`catId`, `catName`, `alias`, `parentId`, `trash`, `status`) VALUES
(1, 'Giày bóng rổ', 'giay-bong-ro', 1, 0, 1),
(2, 'Giày đá bóng', 'giay-da-bong', 1, 0, 1),
(3, 'Giày chạy', 'giay-chay', 1, 0, 1),
(4, 'Giày tập', 'giay-tap', 1, 0, 1),
(15, 'test 1', 'test-1', 1, 0, 0),
(16, 'test 5', 'test-5', 1, 1, 0),
(17, 'test 2', 'test-2', 1, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trieuminhtuan_contact`
--

DROP TABLE IF EXISTS `trieuminhtuan_contact`;
CREATE TABLE IF NOT EXISTS `trieuminhtuan_contact` (
  `contactId` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `trash` tinyint(1) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`contactId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trieuminhtuan_customer`
--

DROP TABLE IF EXISTS `trieuminhtuan_customer`;
CREATE TABLE IF NOT EXISTS `trieuminhtuan_customer` (
  `customerId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `fullname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `trash` tinyint(1) NOT NULL,
  PRIMARY KEY (`customerId`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `trieuminhtuan_customer`
--

INSERT INTO `trieuminhtuan_customer` (`customerId`, `userId`, `fullname`, `address`, `phone`, `email`, `trash`) VALUES
(45, 0, 'nguyễn minh tân', 'p.Long thủy, tx.phước long, bình phước', '0363662858', 'minhtuangiaitri@gmail.com', 0),
(46, 0, 'trieu thi phuong', 'linh trung, hồ chí minh', '123456789', 'trieuphuong@gmail.com', 0),
(47, 0, 'nguyễn văn A', 'tăng nhơn phú A, Q9', '09123456', 'nguyenvana@gmail.com', 0),
(48, 0, 'nguyễn văn B', 'tân phú, Q9', '0908123456', 'toanvan@gmail.com', 0),
(50, 0, 'trần văn A', 'thủ dầu một, Bình dương', '07576789456', 'tranvana@gmail.com', 0),
(52, 0, 'diễm thương', 'linh đông, thủ đức', '0963662859', 'diemthuong@gmail.com', 0),
(53, 1, 'minh tuan update', 'phuoc long, bình phước', '0123654789', 'trieutuan@gmaail.com', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trieuminhtuan_link`
--

DROP TABLE IF EXISTS `trieuminhtuan_link`;
CREATE TABLE IF NOT EXISTS `trieuminhtuan_link` (
  `linkId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `position` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `orders` tinyint(4) NOT NULL,
  `trash` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`linkId`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `trieuminhtuan_link`
--

INSERT INTO `trieuminhtuan_link` (`linkId`, `title`, `position`, `image`, `link`, `orders`, `trash`, `status`) VALUES
(4, 'Đăng nhập', 'bottommenu2', '', 'http://1996store:8181/auth/adminlogin', 1, 0, 1),
(43, 'instagram', 'bottommenu3', '', 'https://www.instagram.com/nhoc.tmt/', 2, 0, 1),
(6, 'Hỗ trợ', 'bottommenu2', '', 'hotro#', 1, 1, 1),
(42, 'facebook', 'bottommenu3', '', 'https://www.facebook.com/trieuminhtuan2002/', 1, 0, 1),
(7, 'Góc bài viết', 'header', '', '#gocbaiviet', 1, 1, 1),
(47, 'Hướng dẫn thanh toán ', 'bottommenu2', '', 'http://1996store:8181/page/showpage/', 4, 0, 1),
(12, 'test', 'bottommenu1', '', 'test', 1, 1, 1),
(46, 'Hướng dẫn mua hàng', 'bottommenu2', '', 'http://1996store:8181/page/showpage/', 3, 0, 1),
(45, 'Chính sách bảo mật', 'bottommenu1', '', 'http://1996store:8181/page/showpage/', 4, 0, 1),
(44, 'tiktok', 'bottommenu3', '', 'https://www.tiktok.com/@chuotcon_tmt?lang=vi-VN', 3, 0, 1),
(41, 'Hướng dẫn mua hàng', 'bottommenu2', '', 'http://1996store:8181/page/showpage/', 3, 1, 1),
(40, 'Giới thiệu', 'header', '', 'http://1996store:8181/page/showpage/', 2, 0, 1),
(37, 'Chính sách bán hàng', 'bottommenu1', '', 'http://1996store:8181/page/showpage/', 2, 0, 1),
(34, 'Địa chỉ: số 189 Hoàng Diệu 2, P.Linh Trung, TP.Thủ Đức - ĐT: 09 6366 2858 - 076 75 73 083', 'bottommenu2', '', 'https://bitly.com.vn/lbi6sr', 5, 0, 1),
(30, 'Đăng ký tài khoản', 'bottommenu2', '', 'http://1996store:8181/user/userregister', 2, 0, 1),
(35, 'test 123', 'bottommenu2', '', 'http://1996store:8181/page/showpage/', 1, 1, 1),
(38, 'Liên hệ', 'header', '', '#', 1, 0, 1),
(39, 'Chính sách đổi trả', 'bottommenu1', '', 'http://1996store:8181/page/showpage/', 3, 0, 1),
(36, 'Về chúng tôi', 'bottommenu1', '', 'http://1996store:8181/page/showpage/', 1, 0, 1),
(48, 'Địa chỉ & giờ mở cửa', 'bottommenu1', '', 'http://1996store:8181/page/showpage/', 5, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trieuminhtuan_order`
--

DROP TABLE IF EXISTS `trieuminhtuan_order`;
CREATE TABLE IF NOT EXISTS `trieuminhtuan_order` (
  `orderId` int(11) NOT NULL AUTO_INCREMENT,
  `customerId` int(11) NOT NULL,
  `orderDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateDate` datetime DEFAULT NULL,
  `total` float(10,2) NOT NULL,
  `note` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `trash` tinyint(1) NOT NULL,
  PRIMARY KEY (`orderId`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `trieuminhtuan_order`
--

INSERT INTO `trieuminhtuan_order` (`orderId`, `customerId`, `orderDate`, `updateDate`, `total`, `note`, `status`, `trash`) VALUES
(39, 45, '2021-06-21 07:33:13', NULL, 1947.00, 'giao trong giờ hành chính', 0, 1),
(40, 46, '2021-06-21 07:35:16', NULL, 538.00, 'giao buổi sáng', 0, 0),
(41, 47, '2021-06-21 09:50:31', NULL, 1017.00, 'giao buổi trưa', 1, 0),
(42, 48, '2021-06-21 09:51:41', NULL, 850.00, 'giao sau 2h chiều', 1, 0),
(44, 50, '2021-06-21 09:54:47', NULL, 350.00, 'giao buổi sáng các ngày thứ 2,3,4', 1, 0),
(46, 52, '2021-06-21 10:07:17', NULL, 900.00, 'giao sau 4h chiều', 1, 0),
(47, 53, '2021-06-25 08:44:29', NULL, 309.00, 'test', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trieuminhtuan_orderdetail`
--

DROP TABLE IF EXISTS `trieuminhtuan_orderdetail`;
CREATE TABLE IF NOT EXISTS `trieuminhtuan_orderdetail` (
  `orderDetailId` int(11) NOT NULL AUTO_INCREMENT,
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` smallint(6) NOT NULL,
  `trash` tinyint(1) NOT NULL,
  PRIMARY KEY (`orderDetailId`)
) ENGINE=MyISAM AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `trieuminhtuan_orderdetail`
--

INSERT INTO `trieuminhtuan_orderdetail` (`orderDetailId`, `orderId`, `productId`, `price`, `quantity`, `trash`) VALUES
(89, 44, 35, 350.00, 1, 0),
(93, 46, 37, 500.00, 1, 0),
(92, 46, 38, 400.00, 1, 0),
(78, 40, 9, 180.00, 1, 0),
(77, 39, 4, 150.00, 3, 0),
(76, 39, 3, 499.00, 1, 0),
(86, 42, 9, 180.00, 1, 0),
(75, 39, 1, 499.00, 2, 0),
(85, 42, 32, 335.00, 2, 0),
(84, 41, 34, 109.00, 2, 0),
(83, 41, 4, 150.00, 1, 0),
(82, 41, 8, 150.00, 1, 0),
(81, 41, 1, 499.00, 1, 0),
(80, 40, 10, 99.00, 2, 0),
(79, 40, 12, 80.00, 2, 0),
(94, 47, 2, 309.00, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trieuminhtuan_page`
--

DROP TABLE IF EXISTS `trieuminhtuan_page`;
CREATE TABLE IF NOT EXISTS `trieuminhtuan_page` (
  `pageId` int(11) NOT NULL AUTO_INCREMENT,
  `linkId` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `createBy` int(11) NOT NULL,
  `createDate` datetime NOT NULL,
  `updateDate` datetime NOT NULL,
  `trash` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`pageId`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `trieuminhtuan_page`
--

INSERT INTO `trieuminhtuan_page` (`pageId`, `linkId`, `title`, `content`, `createBy`, `createDate`, `updateDate`, `trash`, `status`) VALUES
(17, 45, 'Chính sách bảo mật', 'Tại 1996 Store, chúng tôi coi việc bảo vệ thông tin cá nhân của bạn là ưu tiên hàng đầu. \r\n\r\nChúng tôi hiểu hoàn toàn rằng thông tin cá nhân của bạn là thuộc về bạn, vì vậy chúng tôi nỗ lực hết sức lưu trữ bảo mật và xử lý cẩn thận thông tin mà bạn chia sẻ với chúng tôi.\r\n\r\nChúng tôi coi sự tin cậy của bạn có giá trị cao nhất. Vì vậy chúng tôi thu thập lượng thông tin tối thiểu chỉ khi có sự cho phép của bạn và sử dụng thông tin này chỉ cho các mục đích đã dự định. Chúng tôi không cung cấp thông tin cho các bên thứ ba mà không có sự hiểu biết của bạn.\r\n\r\nTại 1996 Store chúng tôi nỗ lực hết sức nhằm đảm bảo khả năng bảo vệ dữ liệu của bạn, bao gồm bảo mật dữ liệu kỹ thuật và quy trình quản lý nội bộ cũng như các biện pháp bảo vệ dữ liệu vật lý. \r\nChúng tôi phấn đấu cải thiện cuộc sống của bạn bằng cách đưa ra những trải nghiệm số đầy cảm hứng và hấp dẫn. Để thực hiện việc này, sự tin cậy của bạn là điều tối cao và vì vậy chúng tôi sẽ nỗ lực hết sức để bảo vệ thông tin cá nhân của bạn.\r\n\r\nCảm ơn bạn vẫn tiếp tục quan tâm và ủng hộ chúng tôi.', 1, '2021-06-21 10:20:20', '2021-06-23 07:21:31', 0, 1),
(13, 36, 'Về chúng tôi', 'Có nhiều lý do khiến chúng tôi quyết định mở rộng hoạt động kinh doanh, bán củ giống chất lượng cho người dùng hoa mà không thông qua bất cứ trung gian nào khác. Dù bạn muốn tự trồng và chăm sóc một chậu hoa để gần gũi với thiên nhiên hơn, thư giãn đầu óc sau một ngày làm việc. Hoặc bạn muốn có một chậu hoa đẹp vào dịp tết, tránh việc mua phải những bó hoa lạnh, hoa kém chất lượng với giá quá cao. Dù lý do là gì, chúng tôi tự tin mang tới cho bạn những cử giống hoa chất lượng nhất với chi phí hợp lý.\r\n\r\nĐược thành lập từ năm 2014, công ty chúng tôi là đơn vị tiên phong trong lĩnh vực phân phối củ giống hoa Ly và các loại hoa thành phẩm như hoa Ly, hoa hồng ngoại. Sản phẩm củ giống hoa Ly được chúng tôi nhập khẩu trực tiếp từ các nhà cung cấp tới từ châu Âu như Hà Lan, Pháp …đảm bảo chất lượng tốt nhất cho người trồng.\r\n\r\nCác vườn hoa có tổng diện tích 10ha của chúng tôi tại huyện Đan Phượng – Hà Nội cung cấp hoa tươi bán buôn, hoa tươi tết cho không chỉ thị trường Hà Nội mà cả các tỉnh miền Bắc như Nam Định, Hải Phòng, Quảng Ninh, Lạng Sơn …\r\n\r\nKhách hàng chính của chúng tôi là các nhà vườn trồng hoa ly tại miền Bắc ở các vùng chuyên canh trồng hoa như làng hoa Tây Tựu, hoa Mê Linh, hoa Sapa. Sản phẩm chất lượng và việc tư vấn sát sao tới từng người trồng là bí quyết tạo dựng uy tín công ty chúng tôi.', 1, '2021-06-18 11:08:36', '2021-06-18 11:08:36', 0, 1),
(14, 37, 'Chính sách bán hàng', 'Chúng tôi áp dụng phương thức thu tiền khi giao hàng và chuyển khoản ngân hàng với các đơn hàng trên toàn lãnh thổ Việt Nam.\r\n\r\nThông tin tài khoản: \r\n\r\nChủ tài khoản: Triệu Minh Tuấn\r\nSố tài khoản: 0963662858\r\nNgân hàng quân đội MB Bank\r\nCó 3 cách chủ yếu để bạn đặt hàng trên hệ thống của chúng tôi:\r\n\r\nCách 1: Bạn chọn sản phẩm và số lượng mình muốn, rồi đặt hàng trên web (ưu tiên sử dụng)\r\nCách 2: Bạn để lại thông tin số điện thoại trên website hoặc facebook để chúng tôi chủ động liên lạc lại. \r\nCách 3: Bạn gọi điện trực tiếp tới các số điện thoại của 1996 Store trên website hoặc facebook.', 1, '2021-06-18 11:18:17', '2021-06-23 07:23:17', 0, 1),
(15, 39, 'Chính sách đổi trả', 'Nhằm mang lại quyền lợi cho khách hàng tốt nhất chúng tôi áp dụng chính sách đổi trả miễn phí sản trong vòng 3 ngày đầu trong các trường hợp:  giao nhầm mẫu, giao nhầm sai, sản phẩm bị hư hại trong quá trình đóng gói và vận chuyển (quý khách vui lòng quay video mở kiện hàng để làm bằng chứng đối chiếu với bên vận chuyển).\r\nTrong trường hợp quý khách muốn chủ động đổi sản phẩm vì lí do cá nhân, vui lòng gửi sản phẩm cần đổi về cửa hàng, sau khi nhận được cửa hàng sẽ tiến hành gửi hàng cho quy khác, quý khách vui lòng thanh toán phí vận chuyển khi nhân viên giao hàng.\r\nTrân trọng cảm ơn ! ', 1, '2021-06-18 11:59:17', '2021-06-21 10:17:01', 0, 1),
(16, 40, 'Giới thiệu', 'Chào mừng quý khách đến với cửa hàng 1996 Store. Chuyên cung cấp các loại giày thể thao chính hãng từ các thương hiệu nổi tiếng  trên thế giới như Nike, Adidas, Reebok, Puma.... Chúng tôi cam kết tất cả sản phẩm đến tay khách hàng hoàn toàn chính hãng với chất lượng và giá cả tốt nhất thị trường. Được phục vụ quý khách là niềm vinh dự của chúng tôi. Xin trân thành cảm ơn quý khách !\r\n\r\n', 1, '2021-06-18 12:07:28', '2021-06-25 05:22:21', 0, 1),
(20, 48, 'Địa chỉ & giờ mở cửa', '1996 Store tọa lạc tại số 189 Hoàng Diệu 2, Phường Linh Trung, TP.Thủ Đức.\r\nGiờ mở cửa: từ 8g00 đến 21h00 các ngày trong tuần kể cả ngày lễ và chủ nhật (tiếp nhận bảo hành - đổi trả từ 9g00 đến 16g00);\r\nHoạt động tư vấn mua hàng qua số điện thoại và mạng xã hội từ 7g00 đến 22g00.\r\nRất hân hạnh được phục vụ quý khách !\r\n', 1, '2021-06-23 07:49:07', '2021-06-23 07:52:52', 0, 1),
(12, 35, 'test 123', 'test 123', 1, '2021-06-16 05:18:36', '2021-06-16 05:19:07', 1, 1),
(19, 47, 'Hướng dẫn thanh toán ', '* Đối với khách mua hàng trực tiếp tại cửa hàng: Thanh toán bằng tiền mặt và các hình thức chuyển khoản, thẻ ghi nợ, ví điện tử sẽ được hướng dẫn trực tiếp tại quày thanh toán.\r\n* Các hình thức thanh toán mua hàng từ xa:\r\nCách 1: Thanh toán trực tiếp qua các số tài khoản: \r\n- 0963662858 (Ngân hàng quân đội MB Bank);\r\n- 0381 0004 79271 (ngân hàng TMCP Ngoại Thương Việt Nam); - 1048 70607 7972 (ngân hàng thương mại cổ phần Công Thương Việt Nam) kèm nội dung 1996 Store_số điện thoại đặt hàng (Sau khi nhận được thanh toán chúng tôi sẽ gọi điện thông báo xác nhận cho quý khách)\r\nCách 2: Áp dụng phương thức ship COD (nhận hàng và thanh toán tận nhà)\r\nCách 3: Thanh toán qua ví điện tử qua số ĐT:  0963662858 (MOMO,ZALO PAY, VIETTEL PAY) kèm nội dung 1996 Store + số điện thoại đặt hàng (Sau khi nhận được thanh toán chúng tôi sẽ gọi điện thông báo xác nhận cho quý khách).\r\n\r\nMọi khiếu nại và thắc mắc quý khách vui lòng liên hệ số điện thoại 09.6366.2858 - 076.75.73.083\r\nXin trân trọng cảm ơn quý khách đã đồng hành cùng chúng tôi !\r\n', 1, '2021-06-23 07:39:53', '2021-06-23 07:51:12', 0, 1),
(18, 46, 'Hướng dẫn mua hàng', '1. Mua hàng trực tiếp tại đỉa chỉ: 189 Hoàng Diệu 2, phường Linh Trung, TP.Thủ Đức.\r\n2. Mua hàng trực tuyến tại website 1996store.vn: Sau khi chọn được sản phẩm muốn mua, quý khách bấm \"Add to cart\" (có thể chọn nhiều sản phẩm và số lượng) -> bấm vào hình giỏ hàng phía trên đầu website va chọn \"Check Out\" -> điền các thông tin vào form, kiểm tra đơn hàng lại và bấm đặt hàng. Sau khi đặt hàng trong vòng 60 phút sẽ có nhân viên gọi điện xác nhận thông tin và tiến hành đóng gói sản phẩm gửi đi trong ngày. Trân trọng cảm ơn quý khách !', 1, '2021-06-21 12:47:05', '2021-06-23 07:21:41', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trieuminhtuan_poster`
--

DROP TABLE IF EXISTS `trieuminhtuan_poster`;
CREATE TABLE IF NOT EXISTS `trieuminhtuan_poster` (
  `posterId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) NOT NULL,
  `trash` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`posterId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `trieuminhtuan_poster`
--

INSERT INTO `trieuminhtuan_poster` (`posterId`, `title`, `image`, `trash`, `status`) VALUES
(1, 'poster1', 'poster1.png', 0, 1),
(5, 'test ', 'poster1.jpg', 0, 0),
(6, 'test', 'convers-logo.jpg', 0, 0),
(8, 'poster2', 'poster2.png', 0, 1),
(9, 'poster3', 'poster3.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trieuminhtuan_product`
--

DROP TABLE IF EXISTS `trieuminhtuan_product`;
CREATE TABLE IF NOT EXISTS `trieuminhtuan_product` (
  `productId` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(100) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `detail` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `saleprice` float(10,2) DEFAULT '0.00',
  `image` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `trash` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`productId`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `trieuminhtuan_product`
--

INSERT INTO `trieuminhtuan_product` (`productId`, `productName`, `alias`, `catId`, `brandId`, `detail`, `price`, `saleprice`, `image`, `status`, `trash`) VALUES
(1, 'Giày chạy Adidas Yeezy Boost 350 V2 Zebra', 'Giay-chạy-Adidas-Yeezy-Boost-350-V2-Zebra', 3, 2, 'Adidas Yeezy 350 V2 Zebra là \"chiến binh\" tiếp theo mà Kanye West kết hợp với \"ông Vua\" trong làng giày thể thao Adidas cho ra mắt thị trường trong những tháng gần đây. Sản phẩm nhanh chóng được các tín đồ mê giày săn đón bởi thiết kế ĐỈNH CAO, cách phối màu ẤN TƯỢNG mà không kém phần ĐỘC ĐÁO sdfsdfadfsd        ', 599.00, 499.00, 'tuan_shoes1.1.jpg', 1, 0),
(2, 'Giày chạy Nike Air Max 97 Silver Bullet', 'Giay-chạy-Nike-Air-Max-97-Silver-Bullet', 3, 1, 'Nike Air Max 97 Silver Bullet đã được đưa trở lại theo cách phối màu nguyên bản này để kỷ niệm ngày kỷ niệm 20 năm của sneaker. Nike Air Max 97 do Christian Tresser thiết kế mang đến kiểu dáng đẹp mà không ảnh hưởng đến sự thoải mái.\r\n\r\nThiết kế cổ điển nổi bật với tông màu ánh bạc ánh kim và đỏ Varsity trên phần lưới phía trên được củng cố bởi các lớp phủ đặc trưng lấy cảm hứng từ những gợn sóng xung quanh một giọt nước.     ', 359.00, 309.00, 'tuan_shoes2.1.jpg', 1, 0),
(3, 'Giày Nike Air Jordan 1 Bred', 'Giay-Nike-Air-Jordan-1-Bred', 1, 1, 'Đối với các bạn trẻ yêu sneaker thì không thể không biết đến dòng nike air jordan 1 huyền thoại. Một trong những dòng sản phẩm đứng đầu danh sách các đôi giày thể thao yêu thích nhất. Mặc dù dòng sản phẩm này được ra mắt hơn 35 năm nhưng vẩn là một trong những đôi giày bóng rỗ tốt nhất mọi thời đại và là sản phẩm thời trang được giới trẻ yêu thích. Vì vậy dòng sản phẩm này luôn được cho ra rất nhiều các bản phối khác nhau củng như có nhiều sự hợp tác nhằm tạo ra được những giá trị mới làm độc đáo hơn. Nike air Jordan 1 Retro Cao Bred Toe là một trong những bản phối đơn giản nhưng mang đến những giá tri cao trong ngành thời trang. Và hiện nay đây là một trong những bản phối được giới trẻ yêu thích củng như muốn có trong bộ sưu tập sneaker của mình.      ', 599.00, 499.00, 'tuan_shoes3.1.jpg', 1, 0),
(4, 'Giày chạy Adidas Ultraboost 3.0', 'giay-chay-adidas-ultra-boost-3.0', 3, 2, 'Nhân kỷ niệm 60 năm các vận động viên khiếm thị tranh tài tại Thế vận hội Paralympic, đôi giày chạy bộ adidas này có điểm nhấn trên thân giày với chữ \"Run\" tạo bởi các ký tự chữ nổi Braille. Thân giày bằng vải dệt kim thích ứng làm từ sợi Parley Ocean Plastic, chất liệu tái chế hiệu năng cao sử dụng rác thải nhựa tái chế thu gom từ bờ biển và các vùng ven biển. Có ai ngờ rằng khi làm điều đúng đắn lại cho cảm giác hài lòng đến vậy?\r\n\r\n  ', 180.00, 150.00, 'tuan_shoes4.1.jpg', 1, 0),
(5, 'Giày bóng rổ Nike Kobe 7', 'giay-bog-ro-nike-kobe-7', 1, 1, 'Chất liệu cao cấp rất mềm mại và êm ái, tạo cảm giác thoải mái cho từng bước đi. Phần đế làm bằng cao su tổng hợp với phần rãnh chống trơn trượt, đảm bảo sự an toàn cho người mang.\r\nKiểu dáng tinh tế, hợp xu hướng được thiết kế trẻ trung, là một thiết kế dành bạn, giày chú trọng phom dáng với từng đừơng, làm toát lên vẻ trẻ trung, thanh lịch. Đương may tỉ mỉ và đường keo dán chắc chắn và bền bỉ trong thời gian dài.\r\nSự kết hợp hoàn hảo với những bộ trang phục đủ mọi phong cách, Từ đồ dạo phố như jeans, quần lửng tới những bộ trang phục lịch sự như quần kaki và sơ mi thì đôi giày thể thao này đều ‘chiều chuộng’ được hết.\r\n  ', 455.00, 399.00, 'tuan_shoes5.1.jpg', 1, 0),
(6, 'Giày  chạy Puma Classic Black-White', 'giay-chay-Puma-classic', 3, 3, 'Một trong những biểu tượng hàng đầu của Puma - Giày Suede Classic. Được ra đời từ rất lâu, ở những sân bóng rổ những năm 60 hay những sàn hip hop thập niên 90 và bây giờ bạn có thể bắt gặp đôi giày này ở bất cứ đâu. Đôi giày sử dụng chất liệu da lộn mềm mịn và có kiểu dáng thể thao, trẻ trung và dễ phối đồ.\r\n\r\n ', 130.00, NULL, 'tuan_shoes6.1.jpg', 1, 0),
(7, 'Giày đá bóng PUMA FUTURE NETFIT 2.3 ', 'giay-da-bong-puma-future-netfit', 2, 3, 'Puma Future Netfit được thiết kế và trang bị các công nghệ để trở thành mẫu giày tốc độ phù hợp với hầu hết các kiểu bàn chân bởi công nghệ Netfit tuyệt vời của Puma. Phần đế sử dụng công nghệ Pebax phân bổ đinh giày hình nón cũng như sở hữu chất liệu siêu nhẹ và bền do Puma phát triển độc quyền. Puma evoKnit là dòng vải giày đinh chống thấm nước cực nhẹ và siêu bền nhất hiện nay được kết hợp khéo léo với các chi tiết cột dây giày để tối giản và giảm thiểu trọng lượng cho đôi giày.\r\n\r\n     ', 199.00, 150.00, 'tuan_shoes7.1.jpg', 1, 0),
(8, 'Giày đá bóng ADIDAS X 19.3', 'giay-da-bong-adidas-19.3', 2, 2, 'adidas X 19.3 TF Uniforia - Footwear White/Core Black/Shock Pink là mẫu giày chuyên dành cho sân CỎ NHÂN TẠO 5-7 người. Là sản phẩm mới nhất vừa được ADIDAS FOOTBALL giới thiệu tháng 5/2020, X19 là bản update mới của một X18 quá thành công trong năm qua. Vẫn giữ Form truyền thống như người đàn anh X18, là mẫu giày dành cho các cầu thủ chơi tấn công, tốc độ, với thiết kế Upper liền và ôm gọn chân, bề mặt da tổng hợp cực mềm và trọng lượng rất nhẹ.  ', 175.00, 150.00, 'tuan_shoes8.1.jpg', 1, 0),
(9, 'Giày đá bóng NIKE MERCURIAL SUPERFLY VI 360 ELITE', 'giay-da-bong-nike-mervurial-superfly', 2, 1, 'Lựa chọn giày đá bóng đá sân cỏ tự nhiên: Giày da thật, da mềm thường có độ co dãn rất tốt. Các mẫu giày da mềm thường nhanh bai và bạn sẽ thấy thoải mái hơn. Trong quá trình chơi bóng, da sẽ mềm ra rất nhanh và tạo form giày hợp giày bàn chân của bạn. Chọn giày đá bóng da mềm là một giải pháp rất tốt dành cho bàn chân bè các bạn nhé.     ', 200.00, 180.00, 'tuan_shoes9.1.jpg', 1, 0),
(10, 'Giày  chạy REEBOK CLASSIC CLUB C REVENGE V67899', 'giay-chay-reebok-classic-club-revenge', 3, 4, 'Phiên bản giày Classic cực kỳ nổi tiếng của Reebok luôn là một trong những sự lựa chọn tốt nhất dành cho những ai đang cần một đôi giày casual.\r\n\r\nVới thiết kế cổ điển (form dáng Tenis tương tự như Stan Smith của Adidas), Reebok Club C nổi tiếng hơn nhờ vật liệu cao cấp hơn một bậc và độ bền cực cao, ngoài ra form dáng và phối màu cũng vô cùng đẹp và độc đáo.\r\n\r\nHiện Tiệm về phiên bản REEBOK CLASSIC CLUB C REVENGE FV9313 có đủ size, New 100% và Full box để các bạn chọn lựa.   ', 109.00, 99.00, 'sneaker_reebok1.jpg', 1, 0),
(11, 'Giày chạy Reebok Interval', 'giay-chay-reebok-interval', 3, 4, 'Lấy cảm hứng từ phiên bản giày chạy Interval của năm 1996, Reebok Interval 2019 mang nhiều nét cải tiến về thời trang và kiểu dáng hiện đại hơn hẳn người tiền bối của mình. Có thể nói, Reebok Interval là một phiên bản lifestyle xứng đáng có trong bộ sưu tập của bất kỳ tín đồ mê sneakers nào. Đặc biệt là những ai mê kiểu dáng retro hay chunky sneakers.  ', 169.00, NULL, 'sneaker-reebok2.jpg', 1, 0),
(12, 'Giày chạy Reebok RBK-FUSIUM RUN 20 SOCK', 'giay-chay-reebok-rbk-fusium', 3, 4, 'Giầy thể thao đa năng với thân trên Flexweave tiên tiến. Ứng dụng công nghệ số 8 Flexweave tiên tiến, kết cấu thân trên năng động với mục đích hỗ trợ người dùng trong quá trình luyện tập. RBK-FUSIUM RUN 20 hỗ trợ bạn kể cả khi bạn chạy 3-5 dặm, khi tập Gym. Đệm giữa từ hợp chất EVA tạo độ đàn hồi, giúp bước chân nhẹ khi di chuyển. Đế ngoài có độ bền và chống mài mòn khá cao với vật liệu cao su giúp lực kéo của đôi giày  ', 99.00, 80.00, 'sneaker-reebok3.jpg', 1, 0),
(13, 'Giày chạy Reebok HIIT TR', 'giay-chay-reebok-hiit-tr', 3, 4, 'Với thiết kế phá cách nâng đỡ đôi chân bạn trong mọi chuyển động. Lớp đệm giữa giúp nâng đỡ và bảo vệ đôi chân bạn khỏi những lực tác động. Thiết kế mặt bên độc đáo bằng các miếng nhựa mềm TPU nâng đỡ lòng bàn chân. Đế ngoài cao su giúp tăng độ bền, nâng bước chân linh hoạt trong quá trình tập luyện. ', 90.00, 70.00, 'sneaker-reebok4.jpg', 1, 0),
(14, 'Giày chạy Reebok FOREVER FLOATRIDE ENERGY 2', 'giay-chay-reebok-forever-floattride-energy-2', 3, 4, 'Forever Floatride Energy tích hợp công nghệ Foam Floatride, đệm giầy nhẹ và linh hoạt nhất, mép giày làm từ hợp chất EVA giúp thân bằng đôi chân. Đệm lót gót chân 3D bảo vệ đôi chân khỏi các tác động xấu, đế ngoài cao su gợn sóng độ ma sát tốt thuận tiện cho việc đi lại, vận động. Thiết kế phần đế giữa tăng sự ổn định cho lòng bàn chân. Chất liệu cao su chống mài mòn cùng công nghệ Floatride Foam đem tới trọng lượng siêu nhẹ cùng cảm giác chân thực cho đôi chân trong từng bước chạy. ', 90.00, 69.00, 'sneaker-reebok5.jpg', 1, 0),
(15, 'Giày chạy Reebok DRIFTIUM RIDE 2.0', 'giay-chay-reebok-driftium-ride-2.0', 3, 4, 'Tkế với công nghệ đệm mút dầy, xốp tạo đồ đàn hồi không gây đau chân khi mang lâu dài. Kết hợp với phần trên lưới tạo độ thông thoáng không gây hầm bí chân', 79.00, NULL, 'sneaker-reebok6.jpg', 1, 0),
(16, 'Giày chạy Reebok REAGO PULSE 2.0', 'giay-chay-reebok-rrago-pulse-2.0', 4, 4, 'REEBOK REAGO PULSE 2.0 là đôi giày để tập thể dục. Thiết kế vải đan thoáng khí phần thân, giúp thông thoáng mồ hôi. Đệm giữa mềm mại tạo độ êm cho bàn chân. Các rãnh ở đế ngoài giúp bạn linh hoạt, và đế cao su ở gót chân tăng thêm lực kéo.', 89.00, NULL, 'sneaker-reebok7.jpg', 1, 0),
(17, 'Giày chạy Reebok CL LEATHER MARK', 'giay-chay-reebok-cl-leather-mark', 3, 4, 'Thiết kế tối giản với đường sọc nổi bật 2 bên giày. Đế giữa EVA và miếng lót giày dạng bọt cải thiện sự thoải mái. Thiết kế cổ lửng cùng đế ngoài cao su giúp thăng bằng cho cơ thể.', 90.00, NULL, 'sneaker-reebok8.jpg', 1, 0),
(18, 'Giày chạy REEBOK SPEED BREEZE 2.0', 'giay-chay-reebok-speed-breeze-2.0', 3, 4, 'Những đôi giày chạy bộ nam này có phần lưới phía trên mở và thoáng khí ở những khu vực bạn đổ mồ hôi nhiều nhất. Đệm eva nhẹ giúp giảm xóc. Đế ngoài có một miếng cao su ở gót chân để tăng độ bền.', 60.00, NULL, 'sneaker-reebok9.jpg', 1, 0),
(19, 'Giày bóng rổ Nike Kyrie 7 EP', 'giay-bong-ro-nike-kyrie-7-ep', 1, 1, 'Kyrie Irving is a creative force on and off the court. He needs his shoes to keep up with his playmaking, but also sync with his boundary-pushing style and ethos. The Kyrie 7 helps players at all levels take advantage of their quick first step by optimising the shoe\'s fit, court feel and banking ability. This EP version uses an extra-durable outsole that\'s ideal for outdoor courts.', 150.00, NULL, 'basketball-nike1.jpg', 1, 0),
(20, 'Giày bóng rổ Nike LeBron 18', 'giay-bong-ro-nike-LeBron-18', 1, 1, 'An Air of greatness, elevated. The LeBron 18 continues the tradition of raising the standard of basketball performance footwear, uniquely pairing a full-length Zoom Air unit with a Max Air unit in the heel. This game-changing silhouette is designed to respond to the force LeBron generates, optimise his quick first step and bolster his explosive finishes at the rim. It\'s engineered for LeBron James, but made for every athlete looking to elevate their greatness.', 260.00, NULL, 'basketball-nike2.jpg', 1, 0),
(21, 'Giày bóng rổ Nike Air Zoom BB NXT\r\n', 'giay-bong-ro-nike-air-zoom-bb-nxt', 1, 1, 'Keep your focus on the game in the new Air Zoom BB NXT from Nike Basketball. It\'s designed to help players feel light, secure and responsive. You get energy back with every step, helping to turn your force into momentum when it matters most.', 235.00, NULL, 'basketball-nike3.jpg', 1, 0),
(22, 'Giày bóng rổ Nike Air Jordan XXXV\r\n', 'giay-bong-ro-nike-air-Jordan-xxxv', 1, 1, 'The lighter the shoe, the less weight to carry. Evolving last year\'s release, the Air Jordan XXXV features a stabilising Eclipse plate 2.0, visible cushioning and new Flightwire cables. Lightweight and responsive, it\'s designed to help players get the most from their power and athleticism.', 235.00, NULL, 'basketball-nike4.jpg', 1, 0),
(23, 'Giày bóng rổ Nike KD14', 'giay-bong-ro-nike-kd14', 1, 1, 'Kevin Durant lurks on the wing, waiting for the right time to strike before slicing his way through defences. The KD14 is designed to help versatile, relentless players like KD feel fresh all game. Multi-layer mesh and a midfoot strap help reduce your foot\'s movements inside the shoe. Full-length Zoom Air cushioning plus Cushlon foam give back energy for lasting performance.', 190.00, NULL, 'basketball-nike5.jpg', 1, 0),
(24, 'Giày chạy Nike Air Zoom Tempo NEXT', 'giay-chay-nike-air-zoom-tempo-next', 3, 1, 'The Nike Air Zoom Tempo NEXT% mixes durability with a design that helps push you towards your personal best. The result is a shoe built like a racer, but made for your everyday training routine. ', 260.00, NULL, 'running-nike1.jpg', 1, 0),
(25, 'Giày chạy Nike Air Zoom Alphafly  Eliud Kipchoge', 'giay-chay-nike-air-zoom-alphafly-next-Eliud-kipchoge', 3, 1, 'Gear up for your next personal best with the Nike Air Zoom Alphafly NEXT%. Responsive foam is combined with 2 Zoom Air units to push your running game forwards for your next marathon or road race. Graphics and colours nod to Eliud Kipchoge\'s record-breaking run.', 374.00, NULL, 'running-nike2.jpg', 1, 0),
(67, 'Asics Metaride', 'asics-metaride', 4, 12, '- Mục đích: Giúp bạn chạy nhanh hơn, tiết kiệm sức hơn;\r\n\r\n- Loại chân phù hợp: Thông thường;\r\n\r\n- Mức giá tham khảo: 5,8 triệu đồng;\r\n\r\n- Độ lệch gót - mũi: 0 mm;\r\n\r\n- Trọng lượng: 317 g với size 42.5 của Nam;\r\n\r\n- Ưu điểm: Phản hồi lại năng lượng, giảm 19% năng lượng lãng phí ở cổ chân.\r\n\r\n- Nhược điểm: Độ lệch gót mũi 0mm có thể khiến người mới sử dụng chưa quen.', 250.00, 0.00, 'rebook1.png', 1, 0),
(27, 'Giày tập Nike Romaleos 4\r\n', 'giay-tap-nike-romaleos-4', 4, 1, 'Designed for strength and stability, the Nike Romaleos 4 features a supportive midsole and a wide, flat outsole. Adjustable straps at the midfoot secure your foot during your most intense workouts.', 260.00, NULL, 'training-nike1.jpg', 1, 0),
(28, 'Giày tập Nike React Metcon Turbo', 'giay-tap-nike-react-metcon-turbo', 4, 1, 'The Nike React Metcon Turbo puts stability and responsiveness in a lightweight package, to help you hit your next PB. From the cushioning underfoot to the rope wrap at the instep, every detail is pared down to minimise weight while maximising function and durability. Lighter, stronger materials are built for speed and strength. ', 260.00, NULL, 'training-nike2.jpg', 1, 0),
(29, 'Giày tập Nike Air Zoom SuperRep 2', 'giay-tap-nike-air-zoom-superep-2', 4, 1, 'The Nike Air Zoom SuperRep 2 is designed for circuit training, HIIT, sprints and other fast-paced exercise. Layers of support team up with Zoom Air cushioning to keep your foot locked in and comfortable as you lunge, jump and push your way through every rep. A roomier design around the toes lets you get the perfect fit. ', 160.00, NULL, 'training-nike3.jpg', 1, 0),
(30, 'Giày tập Nike Savaleos\r\n\r\n\r\n', 'giay-tap-nike-savaleos', 4, 1, 'The Nike Savaleos straps your foot down to a flat, wide base to keep you feeling stable and secure when you\'re up against serious weight. The rigid midsole has a lift at the heel for peak power transfer from the ground, to help support your most explosive sets.', 160.00, NULL, 'training-nike4.jpg', 1, 0),
(31, 'Giày đá bóng Nike Mercurial Dream Speed Superfly 8 Elite FG', 'giay-da-bong-nike-mercurial-dream-speed-superfly-8elite-fg', 2, 1, 'With a new look inspired by Cristiano Ronaldo, the Nike Mercurial Dream Speed Superfly 8 Elite FG features specialised components that let you play your fastest from start to finish. ', 385.00, NULL, 'football-nike1.jpg', 1, 0),
(32, 'Giày đá bóng Nike Phantom GT Elite 3D AG-Pro\r\n\r\n\r\n', 'giay-da-bong-nike-phantom-gt-elite-3d-ag-pro', 2, 1, 'Phantom players are multifaceted; they\'re calculated, instinctive and have a provocative style of play. The Nike Phantom GT Elite 3D AG-Pro encapsulates these characteristics with a repeating Swoosh design and a 3D-inspired overlay that represents the 3 sides to every Phantom player.', 335.00, NULL, 'football-nike2.jpg', 1, 0),
(33, 'Giày bóng rổ ADIDAS D ROSE 10 STAR WARS', 'giay-bong-ro-adidas-d-rose-10-star-wars', 1, 2, 'Hit the hardwood in Jedi style. Inspired by the speed and agility of lightsabers, these adidas basketball shoes are built for Derrick Rose\'s signature game. A UV midsole mimics the glow of a blue lightsaber, able to handle anything the defense throws your way. Aurebesh print details prove your D Rose loyalty in any galaxy.', 150.00, NULL, 'basketball-adidas1.jpg', 1, 0),
(34, 'Giày tập ADIDAS X LEGO® SPORT SHOES', 'giay-tap-ADIDAS-X-LEGO®-SPORT-SHOES', 4, 2, 'Playtime is powerful. These LEGO® shoes celebrate one of the most beloved toys on the planet. These daily runners keep kids feeling comfortable through gym class or practice. The bumps on the heel tab and outsole are an unmistakable nod to LEGO® bricks.\r\n\r\nThis product is made with Primegreen, a series of high-performance recycled materials. 50% of upper is recycled content. No virgin polyester.\r\n\r\n', 109.00, NULL, 'adidas_x_LEGO(r)_Sport_Shoes_White_FX2867_01_standard.jpg', 1, 0),
(35, 'Giày tập Adidas Y-3 ULTRABOOST 21', 'giay-tap-adidas-Y-3-ULTRABOOST-21', 4, 2, 'ULTRA-COMFORTABLE SHOES BY Y-3.\r\nY-3 lends its uninhibited approach to a running silhouette. The Ultraboost 21 has a clean, uncaged slip-on construction with a flexible adidas Primeknit upper. The Boost midsole offers enhanced cushioning, while the outsole keeps you grounded.\r\n\r\n  ', 350.00, NULL, 'Y-3_Ultraboost_21_Black_H67476_01_standard.jpg', 1, 0),
(36, 'Giày tập Adidas Y-3_Runner_4D_Black', 'giay-tap-adidas-Y-3-Runner-4D-Black', 4, 2, 'Y-3 SNEAKERS WITH BREAKTHROUGH TECHNOLOGY.\r\nAn avant-garde exploration of the latest in sneaker technology, the Y-3 Runner 4D features an innovative 4D printed midsole packed with energy-returning properties. The elegant design is crafted with a smooth neoprene and premium suede upper. Yohji\'s signature details the side.\r\n\r\n\r\n\r\n', 600.00, NULL, 'Y-3_Runner_4D_Black.jpg', 1, 0),
(37, 'Giày tập Adidas Y-3 RUNNER 4D IOW', 'giay-tap-adidas-Y-3-RUNNER-4D-IOW', 4, 2, 'VERSATILE Y-3 SHOES WITH ATTACHABLE DETAILS.\r\nThrough experimentation and expression, Y-3 transforms a running style for the new era. The Runner 4D IOW shoes can be worn with the removable adidas Primeknit sock, or played up with an attachable sockliner and tongue. Revealed through a cutout on the forefoot, the midsole is fueled by an innovative fusion of light, oxygen and liquid resin to deliver precisely-tuned cushioning.\r\n\r\n\r\n\r\n ', 500.00, NULL, 'Y-3_Runner_4D_IOW_Black.jpg', 1, 0),
(38, 'Giày tập Adidas Y-3_Orisan_White', 'giay-tap-adidas-Y-3-Orisan-White', 4, 2, 'RUNNING-INSPIRED Y-3 SHOES WITH TRANSLUCENT DETAILS.\r\nY-3 tests the boundaries of convention, diminishing them in the process. The progressive design of the Orisan shoes creates an expressive look with an exaggerated heel design. The mesh and leather upper completes the experimental silhouette. Energy-charged cushioning offers enhanced comfort.\r\n\r\n\r\n\r\n ', 400.00, NULL, 'Y-3_Orisan_White.jpg', 1, 0),
(39, 'Giày tập Adidas Y-3 FYW S-97 II', 'giay-tap-adidas-Y-3-FYW-S-97-II', 4, 2, 'BASKETBALL-INSPIRED Y-3 TRAINERS WITH ENHANCED CUSHIONING.\r\nThe Y-3 FYW S-97 II reinterprets an archival style and elevates it with modern adidas technologies. The shoes have an innovative, progressive design that clash canvas, suede, mesh, rubber and neoprene together to create a bulky aesthetic. Cutouts on the outsole offer a glimpse of the energy-returning cushioning.\r\n\r\n\r\n\r\n ', 400.00, NULL, 'Y-3_FYW_S-97_II_White.jpg', 1, 0),
(66, 'Giày tập Nike ZoomX Vaporfly NEXT', 'giay-tap-nike-zoomx-vaporfly-next', 3, 1, 'Giày tập Nike ZoomX Vaporfly NEXT    ', 350.00, 309.00, 'running-nike3.jpg', 1, 0),
(58, 'sản phẩm mới', 'san-pham-moi', 15, 9, 'test', 123.00, 0.00, 'test.jpg', 1, 0),
(68, 'Asics Gel-Quantum Infinity 2', 'asics-gel-quantum-infinity-2', 3, 12, '- Mục đích: Giúp bạn chạy bộ hằng ngày với độ êm cao nhất;\r\n\r\n- Loại chân phù hợp: Thông thường;\r\n\r\n- Mức giá tham khảo: 4,2 triệu đồng;\r\n\r\n- Độ lệch gót - mũi: 7 mm;\r\n\r\n- Trọng lượng: 390 g với size 42.5 của Nam;\r\n\r\n- Ưu điểm: Đệm Gel giảm chấn toàn bộ đế giày giúp hấp thụ toàn bộ chấn động trên mỗi bước chạy.\r\n\r\n- Nhược điểm: Trọng lượng giày bị cho là nặng so với những loại giày khác của Asics.', 209.00, 199.00, 'Asics_Gel-Quantum_Infinity_2.jpg', 1, 0),
(69, 'Asics Gel-Kayano 26', 'asics-gel-kayano-26', 4, 12, '- Mục đích: Kiểm soát chuyển động giúp giảm chấn thương, tăng cường đệm ở lòng bàn chân\r\n\r\n- Loại chân phù hợp: Chân lệch trong,\r\n\r\n- Mức giá tham khảo: 3,8 triệu đồng;\r\n\r\n- Độ lệch gót - mũi: 10 mm;\r\n\r\n- Trọng lượng: 315 g với size 42.5 của Nam;\r\n\r\n- Ưu điểm: Đệm Gel gót và mũi, đệm lòng gót giúp giảm chấn thương mắt cá đối với người có chân đáp lệch trong.\r\n\r\n- Nhược điểm: Trọng lượng nặng, chỉ nên sử dụng với người có chân đáp lệch trong ', 180.00, 0.00, 'asics-gel-kayano-26.jpg', 1, 0),
(70, 'Gel-Nimbus 22', 'gel-nimbus-22', 3, 12, '- Mục đích: Hỗ trợ bàn chân tuyệt đối, thích hợp với người chạy hằng ngày, chạy marathon.\r\n\r\n- Loại chân phù hợp: Chân thông thường\r\n\r\n- Mức giá tham khảo: 4,1 triệu đồng;\r\n\r\n- Độ lệch gót - mũi: 10 mm;\r\n\r\n- Trọng lượng: 309 g với size 42.5 của Nam;\r\n\r\n- Ưu điểm: Đệm Gel mũi và gót, đế giày phản hồi năng lượng.\r\n\r\n- Nhược điểm: Thân giày nhỏ và hẹp có thể gây ra không thoải mái với người chân to ngang', 190.00, 0.00, 'asics-gel-nimbus-22.jpg', 1, 0),
(71, 'Asics Gel-DS Trainer 24', 'asics-gel-ds-trainer-24', 3, 12, 'DS-Trainer có một vẻ ngoài không quá hào nhoáng. Phần upper được dùng chất liệu knit với cấu trúc thông gió kì diệu giúp xả hết không khí nóng và ẩm trong giày khi tập, đồng thời phần khung độc quyền cũng giúp giày ôm sát vào chân tránh tình trạng bị tụt giày khi vận động. Asics cũng đã trang bị cho DS-Trainer một lớp đệm ở gót chân giúp tự động điều chỉnh vừa khít với các kích cỡ chân khác nhau mà vẫn đảm bảo được sự thoải mái. Chất liệu đế giữa bằng SOLYTE giúp đệm chân lớn hơn và duy trì đệm tốt và khả năng phục hồi nhanh. Khả năng giảm xóc GEL với vật liệu đệm gummy giúp chống xóc tuyệt vời, bảo vệ đôi chân khỏi các chân thương trong quá trình luyện tập vất vả. Thiết kế gót chân dày làm tăng hiệu quả giảm xóc. Thiết kế đế cao su với cấu trúc 3 lớp và các rãnh ở đế giúp chống trượt tuyệt vời và giúp bàn chân có thể uốn cong dễ dàng. Ngoài ra, phần đế được làm hoàn toàn với công nghệ FlyteFoam Lyte, một phiên bản foam cực nhẹ mới được ra mắt của Asics cũng khiến đôi giày có một trọng lượng nhẹ đáng kinh ngạc. Bên cạnh đó, với mức giá không quá cao và cực kì nhiều phối màu cho bạn lựa chọn. Đây hoàn toàn là một đôi giày basic cực đáng mua đối với các runner.', 150.00, 0.00, 'asics_gel-ds_trainer_og_white_white.jpg', 1, 0),
(72, 'Giày ASICS Gel Lyte V 5 \"White Red\" H831Y-0101', 'giay-asics-gel-lyte-v-5-white-red-h831y-0101', 3, 12, 'Được cung cấp bởi một thị trường giày thể thao hàng đầu đối phó với unworn, đã được bán hết, trong nhu cầu hiếm. Mỗi sản phẩm được kiểm tra nghiêm ngặt bởi các chuyên gia giàu kinh nghiệm đảm bảo tính xác thực. Thoải mái lên! Những đôi giày thể thao Gel Lyte 5 màu đỏ từ Asics chắc chắn sẽ giúp bạn đứng dậy và chạy ngay lập gia đình.‎', 150.00, 0.00, 'asics-gel-lyte-v-5-white.png', 1, 0),
(73, 'ASICS CALCETO WD7 IC – ĐỎ – 1113A011-600', 'asics-calceto-wd7-ic-do-1113a011-600', 2, 12, 'Asics Calceto WD8 IC là mẫu giày đá banh futsal Asics chính hãng. Bên cạnh đó Asics Calceto có thể sử dụng khi chơi các môn thể thao khác trên nền sàn cứng.\r\nAsics Calceto WD8 IC được thiết kế với mục đích kiểm soát mọi tình huống trên sân. Thích hợp với mẫu cầu thủ ưa dribbling và control.\r\n\r\nCầu thủ đại diện:\r\n\r\nĐiểm mặt các công nghệ nổi bật trên mẫu giày này:\r\n\r\nUpper:  Synthetic – da nhân tạo kết hợp vải dệt, rất thoải mái và dễ chịu khi sử dụng.\r\nCONTROL/FIT: công nghệ giúp khóa chặt bàn chân mà vẫn tạo sự thoải mái.\r\nOutsole: đế cao su mềm, cực bám sàn tạo sự tự tin cho người chơi khi di chuyển ở tốc độ cao.', 80.00, 0.00, 'Asics-Calcetto-WD8-IC-1113a011-600.jpg', 1, 0),
(74, 'Giày đá bóng Asics Ds Light ', 'giay-da-bong-asics-ds-light', 2, 12, 'DS Light là một loạt các loại giày đá bóng được thiết kế để cạnh tranh với các loại giày bóng đá tầm trung như Nike Premier 2.0. Và giống như Premier, DS Light cũng có kết cấu chắc chắn và một mức giá phù hợp, đem đến một tùy chọn hấp dẫn dành cho tất cả mọi người chơi yêu thích môn thể thao vua.', 120.00, 0.00, 'giay_da_bong_asics-ds-light-3-wide-5.jpg', 1, 0),
(75, 'giày đá bóng Asics Ultrezza AI Iniesta', 'giay-da-bong-asics-ultrezza-ai-iniesta', 2, 12, 'Andres Iniesta đã ra mắt bản màu hoàn toàn mới của cho mẫu giày đá bóng Asics của mình – Asics Ultrezza AI, trong trận chung kết tranh cúp Hoàng đế ở Nhật Bản. Mẫu giày đá bóng Asics này đã được lên kệ từ ngày 14 tháng 2 năm 2020 trên toàn thế giới. Trước trận chung kết cúp Hoàng gia, Andres Iniesta và nhà cung cấp Asics của anh đã tiết lộ một bản phối màu mới cho giày bóng đá độc quyền của Iniesta, ‘Ultrezza AI’. Lấy cảm hứng từ câu lạc bộ của Andres Iniesta, Vissel Kobe, màu của Asics Ultrezza AI mới năm 2020 có màu đỏ anh đào với màu cam cho phần tên thương hiệu', 109.00, 0.00, 'z1775776306725_441a1a56b9a912b9918efba97296c13f.jpg', 1, 0),
(76, 'giày đá bóng Puma King Pro', 'giay-da-bong-puma-king-pro', 2, 3, 'Từ cảm hứng này, Puma đã tung ra cặp đôi giày đinh King Pro cho người dùng tùy chọn sản phẩm với tông màu của câu lạc bộ mà người dùng yêu thích.\r\n\r\nXanh và đỏ là màu sắc đại diện cho nhiều câu lạc bộ đá bóng lớn.\r\n\r\nPuma King Pro sử dụng thiết kế cổ điển với thân giày làm từ da Kangaroo mềm mại, kết hợp với cổ giày co dãn linh hoạt hiện đại. Điều này giúp tạo ra sự thoải mái nhưng và tiện dụng nhất cho người sử dụng.', 120.00, 0.00, 'puma-king-pro-pack-1.jpg', 1, 0),
(77, 'Giày Thể Thao Puma Releases The Thunder Spectra', 'giay-the-thao-puma-releases-the-thunder-spectra', 3, 3, 'Giày Thể Thao Puma Releases The Thunder Spectra Size 39 được làm từ chất liệu da + vải cao cấp bền đẹp trong suốt quá trình sử dụng.\r\n\r\nForm giày chuẩn đẹp, các đường chỉ khâu vô cùng chắc chắn và tinh tế đảm bảo hài lòng mọi khách hàng. \r\nĐặc điểm Giày Puma Releases The Thunder Spectra Size 41\r\nGiày thể thao Puma mang màu sắc đơn giản dễ dàng kết hợp với nhiều trang phục khác nhau. Giày phù hợp đi trong nhiều hoàn cảnh khác nhau đi học, đi chơi, du lịch, chạy bộ... Đôi giày Puma này là một trong những đôi giày Hot Hit hiện nay được đông đảo các bạn trẻ yêu thích lựa chọn.', 130.00, 0.00, 'giay-the-thao-puma-releases-the-thunder-spectra.jpg', 1, 0),
(78, 'Giày UMA X-RAY 2 SQUARE', 'giay-uma-x-ray-2-square', 3, 3, 'Chất liệu: Vải dệt\r\nKiểu dáng giày sneaker thể thao cổ thấp \r\nĐế giữa IMEVA giúp bước chân êm ái, nhẹ nhàng\r\nPhối dây mảnh đan chéo độc đáo\r\nPhần đệm lót trong thấm hút mồ hôi tốt\r\nĐế giữa có độ đàn hồi tốt, hỗ trợ mọi hoạt động\r\nGam màu hiện đại dễ dàng phối với nhiều trang phục và phụ kiện\r\nXuất xứ thương hiệu: Đức', 109.00, 80.00, '45-hnay-hang-chinh-hang-puma-x-ray-2-square-2021-374121-02.jpeg', 1, 0),
(79, 'Giày Reebok Edition Instapump Fury Black ', 'giay-reebok-edition-instapump-fury-black', 3, 4, '‎Giày thể thao neoprene và vải kỹ thuật màu đen có văn bản, logo và đồ họa in nhiều màu. Chi tiết cut-out trong suốt. Bảng điều khiển da buffed ở đầu tròn. Hệ thống Instapump chữ ký tại vamp. Vòng kéo in logo tại bộ đếm lưỡi và gót chân có đệm. Cổ áo da buffed đệm. Đế giữa cao su có kết cấu tông màu. Đế ngoài bằng cao su giẫm đạp tông màu có hoa văn kiểm tra màu đen và trắng.‎', 875.00, 799.00, 'vetements-black-reebok-edition-instapump-fury-sneakers.jpg', 1, 0),
(80, 'Giày Reebok Edition Instapump Fury Multicolor', 'giay-reebok-edition-instapump-fury-multicolor', 3, 4, '‎Lưới sơn thấp và giày thể thao dệt nhiều màu. Cut-outs trong suốt. Tròn chân. Hệ thống bơm tại vamp. Vòng kéo Grosgrain ở lưỡi đệm và cổ áo gót chân. Đế giữa cao su có kết cấu tông màu. Đế ngoài cao su giẫm đạp tông màu.‎ ', 1546.00, 1499.00, 'vetements-multicolor-reebok-edition-instapump-fury-sneakers.jpg', 1, 0),
(81, 'INSTAPUMP FURY OG NM', 'instapump-fury-og-nm', 3, 4, 'FW7699_Tự tin thể hiện phong cách của bạn với đôi giày thể thao InstaPump Fury. Phối màu nguyên bản với hoa văn ngụy trang trên đế nâng cấp hơn so với phiên bản trước. Tích hợp công nghệ Pumb để điều chỉnh kích cỡ vừa vặn ôm lấy hình dạng tự nhiên của bàn chân của bạn mang lại sự thoải mái an toàn. Phần thân trên với chất liệu da sáng tạo với phong cách cổ điển pha lẫn hiện đại phá cách tạo nên cá tính riêng. Sở hữu lỗ thông khí động lực học cùng 360 độ linh hoạt. Lớp đệm lót tăng cường sự ổn định giảm thiếu lực ép lên chân giúp di chuyển được vững chắc. Công nghệ đế tách Split-Cushion giúp giày có trọng lượng nhẹ và độ đàn hồi tốt.', 180.00, 150.00, 'fw7699_flt_ecom.jpg', 1, 0),
(82, 'Giày Nike Air Jordan 1 Low UNC Pk God Factory', 'giay-nike-air-jordan-1-low-unc-pk-god-factory', 1, 1, 'Air Jordan 1 Low “UNC” chính là phiên bản được rất nhiều người mong chờ. UNC chính là nơi mà huyền thoại bóng rổ Michael Jordan đã theo học, cũng là nơi đã tiếp bước giúp cho ông trở thành huyền thoại như hiện nay. \r\n\r\nSau những phiên bản Retro đầy thành công của mình, Nike đã tiếp tục đẩy mạnh thị trường đầy hứa hẹn này cùng hàng loạt siêu phẩm đã được ra mắt cho đến nay. Trong đó, chắc chắn không thể nào bỏ qua được sự trở lại của Air Jordan 1 Retro Low UNC. Mẫu giày này được thiết kế với nhiều hoài niệm khi đã lựa chọn UNC làm nền tảng cho mình. \r\n\r\nPhiên bản UNC không chỉ đơn thuần là cách phối màu tuyệt vời, nó còn mang giá trị tinh thần sâu sắc về Michael Jordan. Hơn thế nữa, hình ảnh UNC cũng đã xuất hiện trên mẫu giày mới của Nike là Nike SB x Air Jordan 1 Low, là sự hợp tác với vận động viên trượt ván – Eric Koston. Ở phiên bản này, Air Jordan 1 không có gì thay đổi quá nhiều so với thiết kế của bản gốc. Mẫu giày này vẫn sử dụng gam màu chủ đạo là trắng và xanh, tạo điểm nhấn nổi bật và thu hút cho đôi giày. Dù chỉ mới nhìn vào, chúng ta cũng có thể cảm nhận được sự sang trọng và ấn tượng của Jordan 1 Retro Low UNC nhờ vào chất liệu da cao cấp, đem đến sự thoải mái cho người mang. Nhìn chung, theo đánh giá sơ bộ thì Nike Jordan 1 Low “UNC” là một phiên bản rất đáng để sở hữu khi có thiết kế đẹp, màu sắc tươi sáng và mức giá khá hợp lý. ', 180.00, 150.00, 'nike-jordan-1-low-unc-1.jpg', 1, 0),
(83, 'Giày bóng rổ Air Jordan 1 Low - Reverse Bred', 'giay-bong-ro-air-jordan-1-low---reverse-bred', 1, 1, '‎Lấy cảm hứng từ bản gốc ra mắt vào năm 1985, Air Jordan 1 Low mang đến một cái nhìn sạch sẽ, cổ điển quen thuộc nhưng luôn tươi mới. Nó được tạo ra cho chế độ thông thường, với một thiết kế mang tính biểu tượng đi kèm với mọi thứ và không bao giờ lỗi thời. Một thiết bị Air-Sole đóng gói cung cấp đệm nhẹ. Da chính hãng ở phía trên mang lại độ bền và vẻ ngoài cao cấp. Đế ngoài bằng cao su rắn tăng cường lực kéo trên nhiều bề mặt khác nhau.‎', 250.00, 199.00, 'air-jordan-1-low-shoe-6q1tfm_e8ea028e223c4c269fba1b2d7ad03a29_master.jpg', 1, 0),
(84, 'Giày Nike Air Force 1 All White', 'giay-nike-air-force-1-all-white', 1, 1, 'Sản phẩm đầu tiên của Nike Air Force 1 ra mắt với công chúng vào năm 1982, tới nay cũng được gần 39 năm kể từ mẫu giày thể thao được đón nhận nồng nhiệt từ giới trẻ. Có một điều kỳ diệu rằng hầu hết các sản phẩm mới nhất của Nike Air Force 1 vừa mới ra mắt công chúng chỉ sau vài giờ là cửa hàng đã hết hoặc còn vài mẫu giày.\r\n\r\nĐặc biệt, các mẫu giày Air Force của Nike được nhiều dân chơi bóng rỗ từ nghiệp dư đến chuyên nghiệp đều rất ưa chuộng. Như tên gọi Nike Air Force 1, mẫu giày sử dụng công nghệ Air để thiết kế phần đế giày nhằm giúp giảm thiểu các chấn động mạnh khi người tập đang vận động hoặc chơi bóng rổ. \r\n\r\nPhần đế giày mang đến cảm giác êm ái nhưng không kém phần chắc chắn, phù hợp cho dân tập luyện thể thao với các cú bật người “thần sầu”. Chất liệu ở trên sử dụng vải gân có màu trắng ngà, sử dụng các đường may nổi để lại những dấu chấm nhỏ nhằm trang trí trên mẫu giày mang sắc trắng, hình cây kéo nhỏ xíu được in ở bên logo của hãng Nike. Bên hông là logo thương hiệu Nike quen thuộc.\r\n\r\nMẫu giày có thiết kế nhẹ nhàng nhưng không nữ tính phù hợp cho cả nam lẫn nữ. Điểm đặc trưng của các mẫu giày thể thao đều theo hướng năng động, tuy nhiên Nike lại không sở hữu các thiết kế hầm hố khiến người mang có cảm giác nặng chân mà hầu hết các mẫu giày Nike đều mang phong cách năng động, nhẹ nhàng và bắt mắt. \r\n\r\nĐều cùng các mẫu giày Nike màu trắng nhưng lại không gây nhàm chán cho người mua, các mẫu giày Nike đều có những trang trí nổi bật riêng biệt như pha thêm chút bảy sắc cầu vồng lên mũi giày, thêm các khóa cho những mẫu giày cổ cao, hay phong cách đen – trắng, trắng – đỏ được chia làm phần trên và dưới. Tuy cùng là các mẫu giày Nike màu trắng, những hãng lại biết cách thu hút các khách hàng tuổi teen với cách chơi màu đầy chất chơi không kém phần năng động và nổi bật nếu biết cách phối thêm các set đồ khi diện cùng giày Nike Air Force. ', 150.00, 109.00, 'nike-air-force-1-white-1.jpg', 1, 0),
(85, 'Giày G-Dragon x Nike Air Force 1 Low Para-Noise', 'giay-g-dragon-x-nike-air-force-1-low-para-noise', 1, 1, 'Nike Air Force 1 được cho là một trong những đôi sneaker vĩ đại nhất mọi thời đại. Một tác phẩm kinh điển xây dựng trên nguyên mẫu chiếc máy bay đã được thử thách qua năm tháng mà tất cả chúng ta đều biết đến và yêu thích. Air Force 1 chỉ đơn giản là luôn cố gắng để làm mới mình mỗi ngày.\r\n\r\nNhững điều đáng yêu thật bất ngờ thường đi liền với nhau khi mà tông hồng cực kỳ đáng yêu được nhấn nhá bằng logo Swoosh cực kỳ lấp lánh. Tuy không thay đổi nhiều về mặt chất liệu cũng như form dáng nhưng Air Force 1 thì dù có bao nhiêu phối màu đi chăng nữa chúng ta vẫn cảm thấy không đủ!\r\n\r\nG-Dragon x Nike Air Force 1 Low Para-Noise là một siêu phẩm xứng đáng xuất hiện trong tủ giày của bạn trong năm 2020 !', 1099.00, 999.00, 'g-dragon-nike-air-force-1-07-paranoise-aq3692-001-6.jpg', 1, 0),
(86, 'GIÀY BÓNG ĐÁ PREDATOR FREAK.1 FIRM GROUND', 'giay-bong-da-predator-freak1-firm-ground', 2, 2, 'ĐÔI GIÀY BÓNG ĐÁ NÂNG ĐỠ VỚI THIẾT KẾ TRAO QUYỀN KIỂM SOÁT.\r\nBạn chẳng thể thay đổi thế trận trừ khi để cuộc chơi dẫn lối. Mỗi trận đấu là một cơ hội để lớn mạnh hơn. Kiểm soát tốt hơn. Hãy khai phá tối đa sức mạnh của bạn với Predator Freak. Đối với đôi giày bóng đá này, chúng tôi đã sử dụng thêm chất liệu Demonskin 2.0 trên thân giày để tăng cường khả năng kiểm soát bóng. Thiết kế cổ giày hai phần giúp bạn dễ xỏ chân vào thân giày adidas Primeknit ôm chân. Đế ngoài phân tách giúp bạn khống chế đối phương trên mặt cỏ tự nhiên.', 250.00, 199.00, 'Giay_bong_dja_Predator_Freak.1_Firm_Ground_DJen_FW7244_01_standard.jpg', 1, 0),
(87, 'Giày đá bóng chính hãng Adidas Nemeziz Tango 18.3 TF DA9622', 'giay-da-bong-chinh-hang-adidas-nemeziz-tango-183-tf-da9622', 2, 2, 'Điểm đáng chú ý hơn cả và cũng là điều khiến giới cầu thủ đánh giá cao nhất ở đôi giày bóng đá Adidas X Tango 18.3 chính là chất liệu. Đây có lẽ là chi tiết “ăn điểm” nhất của Adidas 18.3. Nếu như ở những mẫu khác, người ta phải mất tới vài trận để break in đôi giày, chỉ bởi phần da tổng hợp có phần hơi cứng và thô thì Adidas 18.3 TURF lại không hề vướng phải rào cản đó. Chỉ cần sờ vào thôi, chúng ta đã thấy đây là một đôi giày dành cho sân phủi, sân cỏ nhân tạo tốt đến thế nào rồi. Với sự trợ giúp của công nghệ cao cấp Adidas Tech Fit, giày bóng đá Adidas 18.3 thực sự có một bộ upper mềm hơn rất nhiều.\r\nVề Form giày: Khi chuyển sang Adidas 18.3 bạn sẽ thấy Form của Adidas 18.3 rất khác so với các phiên bản khác. Nếu như giày đá bóng Adidas nhìn chung có form khá bè ngang hơn so với các dòng khác thì ở 18.3, Adidas đem lại một thiết kế thanh thoát, ôm và nhìn chung là thuôn dài hơn.', 130.00, 0.00, '5cab0da723e40-giay-da-banh-adidas-nemeziz-tango-18.3-tf-da9622-01.jpg', 1, 0),
(88, 'Giày chạy bộ chính hãng Adidas Alphabounce EM (CQ1342)', 'giay-chay-bo-chinh-hang-adidas-alphabounce-em-cq1342', 3, 2, 'Adidas AlphaBounce EM Đúng như cái tên \"Bounce\" (bật, nảy), cảm giác đầu tiên khi trải nghiệm bộ đế này là độ \"nảy\" rồi sau đó mới đến sự êm ái, khá kỳ lạ!\r\nTrong quá trình nghiên cứu để tạo ra AlphaBounce tại phòng nghiên cứu adidas Future Lab, cảm biến Aramis (Aramis Sensor) được bố trí dưới lòng bàn chân của các vận động viên đến từ nhiều môn thể thao khác nhau. Những phần được bố trí mấu tròn chính là những điểm gây ra nhiều áp lực nhất, cần hỗ trợ nhiều nhất.\r\nVới thiết kế rất \"công nghệ\", đế ngoài của AlphaBounce đáp ứng được nhiều bề mặt khác nhau, từ máy chạy cho tới mặt đường gồ ghề\r\nThân giày của AlphaBounce có 2 lớp: Lưới kỹ thuật (Engineered Mesh) bên ngoài, bên trong vẫn là lưới (EM) những kết cấu thưa hơn, may liền với vải nỉ Neoprene co giãn tốt và êm ái.', 150.00, 120.00, '5c07e192ecda9-CQ1342_01_standard.png', 1, 0),
(89, 'Giày Adidas NMD Human Race yellow', 'giay-adidas-nmd-human-race-yellow', 3, 2, '‎x Giày thể thao NMD chủng tộc Pharrell Williams‎\r\n‎Được cung cấp bởi một thị trường giày thể thao hàng đầu đối phó với unworn, đã được bán hết, trong nhu cầu hiếm. Mỗi sản phẩm được kiểm tra nghiêm ngặt bởi các chuyên gia giàu kinh nghiệm đảm bảo tính xác thực. Bản phát hành đầu tiên từ loạt adidas NMD cực kỳ phổ biến của Pharrell, ở đây chúng tôi có đường màu vàng nổi tiếng. Cấu tạo sửa đổi của NMD của Pharrell có phần trên lưới màu vàng rực rỡ với các điểm nhấn màu đen, bao gồm văn bản \"HUMAN RACE\" được thêu xuống mỗi bàn chân.‎', 3048.00, 0.00, 'adidas-human-race-vang-sf.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trieuminhtuan_slide`
--

DROP TABLE IF EXISTS `trieuminhtuan_slide`;
CREATE TABLE IF NOT EXISTS `trieuminhtuan_slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `imageName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `price` float(10,2) DEFAULT NULL,
  `saleprice` float(10,2) DEFAULT '0.00',
  `alias` varchar(255) CHARACTER SET utf8 NOT NULL,
  `position` tinyint(4) NOT NULL,
  `trash` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `trieuminhtuan_slide`
--

INSERT INTO `trieuminhtuan_slide` (`id`, `image`, `imageName`, `price`, `saleprice`, `alias`, `position`, `trash`, `status`) VALUES
(73, 'tuan_shoes5.1.jpg', 'Giày bóng rổ Nike Kobe 7', 455.00, 399.00, 'giay-bog-ro-nike-kobe-7', 1, 0, 1),
(82, 'tuan_shoes9.1.jpg', 'Giày đá bóng NIKE MERCURIAL SUPERFLY VI 360 ELITE', 200.00, 180.00, 'giay-da-bong-nike-mervurial-superfly', 1, 0, 1),
(83, 'tuan_shoes8.1.jpg', 'Giày đá bóng ADIDAS X 19.3', 175.00, 150.00, 'giay-da-bong-adidas-19.3', 1, 0, 1),
(89, 'tuan_shoes4.1.jpg', 'Giày chạy Adidas Ultraboost 3.0', 180.00, 150.00, 'giay-chay-adidas-ultra-boost-3.0', 1, 0, 1),
(90, 'tuan_shoes7.1.jpg', 'Giày đá bóng PUMA FUTURE NETFIT 2.3 ', 199.00, 150.00, 'giay-da-bong-puma-future-netfit', 1, 0, 1),
(93, 'tuan_shoes2.1.jpg', 'Giày chạy Nike Air Max 97 Silver Bullet', 359.00, 0.00, 'Giay-chạy-Nike-Air-Max-97-Silver-Bullet', 1, 0, 1),
(94, 'tuan_shoes3.1.jpg', 'Giày Nike Air Jordan 1 Bred', 599.00, 499.00, 'Giay-Nike-Air-Jordan-1-Bred', 1, 0, 1),
(95, 'tuan_shoes1.1.jpg', 'Giày chạy Adidas Yeezy Boost 350 V2 Zebra', 599.00, 499.00, 'Giay-chạy-Adidas-Yeezy-Boost-350-V2-Zebra', 1, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trieuminhtuan_topic`
--

DROP TABLE IF EXISTS `trieuminhtuan_topic`;
CREATE TABLE IF NOT EXISTS `trieuminhtuan_topic` (
  `topicId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) NOT NULL,
  `createDate` date NOT NULL,
  `trash` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`topicId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `trieuminhtuan_topic`
--

INSERT INTO `trieuminhtuan_topic` (`topicId`, `title`, `content`, `image`, `createDate`, `trash`, `status`) VALUES
(1, 'Cách vệ sinh giày thể thao', 'Không quá khó để giặt giày thể thao nhưng những vết bẩn vẫn sẽ còn lưu lại nếu như bạn không biết vệ sinh giày đúng cách. Dưới đây là một số bước mà chúng tôi sẽ gợi ý những bước cách làm trắng giầy thể thao vừa sạch vết ố đồng thời vẫn giữ được độ bền của đôi giày.\r\n\r\nBước 1: Tháo dây giày và vệ sinh dây giày\r\nĐiều đầu tiên bạn cần làm khi giặt giày thể thao chính là tháo bỏ dây giày. Việc làm này vừa giúp bạn làm sạch được những chỗ khó thấy ở đôi giày, vừa giúp việc làm sạch dây giày dễ dàng và hiệu quả hơn.\r\n\r\nĐể vệ sinh dây giày trước tiên các bạn nên dùng tay hoặc là bàn chải chà nhẹ để loại bỏ hết bùn đất còn dính trên đó. Sau đó, ngâm dây giày trong hỗn hợp thuốc tẩy và nước xà phòng hoặc bột giặt khoảng vài phút rồi giặt như bình thường. Lưu ý, nên đeo găng tay khi sử dụng thuốc tẩy để tránh bị dị ứng.\r\n\r\nBước 2: Vệ sinh giày sơ bộ (rũ bỏ cát, đất, dùng khăn ướt,..)\r\nĐể việc giặt giày trở nên dễ dàng hơn bạn nên vệ sinh sơ qua giày. Với những vết bẩn ở xung quanh giày, bạn nên dùng khăn ướt lau qua bề mặt vết bẩn. Chú ý chọn khăn giấy ướt không cồn để tránh làm hỏng giày, nhất là khi vệ sinh giày da hoặc da lộn.\r\n\r\nVậy là xong phần bên ngoài của đôi giày. Tiếp theo bạn nên làm sạch bên trong và đế giày. Hãy đập nhẹ đôi giày xuống nền đất và đập 2 gót giày vào nhau để cát, bùn đất dính dưới đế giày rơi ra. Sau đó dùng bàn chải khô để chải toàn bộ đôi giày.\r\n\r\nBước 3: Sử dụng dung dịch vệ sinh giày thể thao thông dụng\r\nĐánh sạch giày bằng bàn chải và nước rửa giày\r\n\r\nHiện nay trên thị trường có rất nhiều những sản phẩm vệ sinh giày cho bạn tha hồ lựa chọn. Các sản phẩm này thường ở dạng xà phòng hoặc nước. Nhúng bàn chải vào dung dịch đã chuẩn bị và bắt đầu chà cẩn thận từ bên trong cho đến bên ngoài đôi giày.\r\n\r\nTùy vào từng chất liệu giày khác nhau mà chọn bàn chải cho phù hợp nhất. Ví dụ như giày sneaker da và vải canvas thì dùng bàn chải cứng, còn giày da lộn và vải lưới thì nên dùng bàn chải mềm để tránh làm hỏng giày. Tuyệt đối không ngâm giày trong dung dịch tẩy rửa vì như vậy chỉ khiến giày nhanh chóng bay màu đi mà thôi.\r\n\r\nBước 4: Sử dụng nước để làm sạch giày\r\nXả nước vào giày cho đến khi sạch hoàn toàn xà phòng. Bạn nên dùng nước ấm để làm sạch giày trước rồi sau đó dùng nước lạnh để cho các chất tẩy rửa còn sót lại trôi đi hết. Giặt xong thì các bạn nên nhớ vẩy thật mạnh để loại bỏ hết nước thừa trước khi đem phơi.\r\n\r\nBước 5: Phơi giày đúng cách\r\nĐể giày thể thao ở nơi bóng râm và hong khô tự nhiên. Bạn có thể dùng giẻ khô hoặc khăn giấy sạch nếu muốn giày khô nhanh hơn. Đặc biệt là không được phơi giày ngoài nắng, việc làm này sẽ khiến cho giày nhanh bị bạc màu hơn và nứt form mà thôi.\r\n\r\nSau khi giặt giày trắng thì cách phơi giày tốt nhất là bạn nên đắp một lớp giấy ăn lên bề mặt giày để tránh những vết ố sau khi giày khô. Khi giày đã khô hoàn toàn thì mới được bỏ lớp giấy này.\r\n\r\nBước 6: Cất giữ và bảo quản\r\nCất giữ giày thể thao ở những nơi ít ánh sáng, mát mẻ nhưng không được quá nóng bức hoặc ngột ngạt để tránh giày bị mốc hoặc bạc màu. Tốt nhất là bạn nên cất những đôi giày sneaker trong hộp giày.', 'cach-ve-sinh-giay-the-thao.jpg', '2021-06-21', 0, 1),
(7, 'Cách đo size giày\r\n', 'CÁCH ĐO CỠ CHÂN VÀ XÁC ĐỊNH SIZE GIÀY VIỆT NAM, US, UK CHUẨN XÁC.\r\nCHUẨN BỊ\r\n1 tờ giấy trắng lớn, phải to hơn bàn chân bạn\r\n1 cây bút chì\r\n1 cây thước đo\r\nCÁCH THỰC HIỆN\r\nQuy ước:\r\n\r\nCỡ giày là N\r\nChiều dài bàn chân là L\r\nB1: VẼ KÍCH CỠ CHÂN\r\nBạn đặt tờ giấy xuống sàn nhà, sau đó đặt bàn chân của bạn thật chắc chắn lên tờ giấy.\r\nDùng bút chì để vẽ lại khung bàn chân của mình cho thật chuẩn. Bạn nên giữ bút chì thẳng đứng và vuông góc với tờ giấy để vẽ được chính xác hơn.\r\n**Lưu ý: Bạn phải luôn giữ bàn chân ở vị trí cũ và không được di chuyển bàn chân ngay khi dừng bút chì giữa chừng.\r\n\r\nđo size giày bước 1\r\n\r\nB2: ĐÁNH DẤU CÁC SỐ ĐO CHIỀU DÀI VÀ CHIỀU RỘNG\r\nBạn sử dụng bút chì để vẽ một đường thẳng để chạm vào các điểm trên cùng, dưới cùng và 2 bên của bản phác thảo bàn chân như hình ảnh dưới để chúng ta đo chiều dài chân.\r\n\r\nđo size giày bước 2\r\n\r\nB3: XÁC ĐỊNH CHIỀU DÀI BÀN CHÂN (L)\r\nBạn sử dụng thước kẻ để đo chiều dài từ phía dưới dòng kẻ trên đến dòng kẻ dưới mà bạn đã vẽ. Sau khi đo xong, bạn có thể làm tròn số trong khoảng 0.5cm. Bạn nên làm tròn xuống để trừ hao cho những sai lệch khi vẽ khuôn chân vì các đường kẻ thường chênh lên một chút so với kích thước thật của bàn chân bạn.\r\n\r\n**Lưu ý khi đo: bạn phải đo trên đường thẳng vuông góc với hai đường kẻ trên và dưới.\r\n\r\nđo size giày bước 3\r\n\r\nB4: TÌM VÀ CHỌN SIZE GIÀY PHÙ HỢP\r\nGhi con số mà bạn đo được vào tờ giấy, rồi áp dụng công thức sau để xác định size giày của mình trên thang đo: N = L+1.5 cm = cỡ giày\r\n\r\nVí dụ: Bạn đo được L= 23 cm => N= 23cm + 1.5cm= 24.5 cm. Vậy cỡ giày của bạn là 24.5 cm. Dựa vào bảng đo dưới đây bạn sẽ xác định được cỡ giày Nam là size 39 và cỡ giày Nữ là 42.', 'cach-do-size-giay.png', '2021-06-21', 0, 1),
(9, 'toppic test 1', 'top test 1', 'Y-3_Runner_4D_IOW_Black_5.jpg', '2021-06-21', 1, 1),
(10, 'toppic test 2', 'toppic test 2', 'adidas_x_LEGO(r)_Sport_Shoes_Yellow_FY8439_4.jpg', '2021-06-21', 0, 0),
(11, 'Top những đôi giày trắng không bao giờ lỗi mốt', '1. Nike Air Force 1 Low All White\r\n1-giay-sneaker-trang-elleman\r\n\r\nChắc chắn rồi, làm sao có thể bỏ qua mẫu giày nổi tiếng của Nike này. Với thiết kế đã trở thành kinh điển, mũi giày được đục lỗ thoát khí cùng phần đế dày và cứng cáp, “Không Lực 1” chính là đôi giày bắt buộc phải sở hữu nếu bạn muốn bước chân vào shoes game. Sự tối giản trong cách thiết kế giúp đôi giày trở nên phù hợp với mọi loại trang phục và được rất nhiều người, trong đó có cả những người nổi tiếng như Travis Scott, G-Dragon,… chọn làm “mẫu” để tạo nên các phiên bản custom đình đám.\r\n2. adidas Stan Smith\r\n2-giay-sneaker-trang-elleman\r\n\r\nCó thể nói, nếu như Nike có “Không Lực 1” huyền thoại thì adidas cũng không kém cạnh với đôi Stan Smith, một trong những biểu tượng của xu hướng thời trang tối giản trong nhiều thập kỉ vừa qua. Không có gì nói về kiểu dáng đơn giản, thoải mái cùng thiết kế với biểu tượng ba sọc được đục đục lỗ sành điệu, bạn có thể mang nó với bất kì kiểu outfit tùy thích. Đôi giày có nhiều lựa chọn về màu sắc, phổ biến nhất bao gồm xanh lá, navy và trắng giúp mang lại nhiều sự lựa chọn, từ sự tinh tế với phần gót xanh lá cho đến vẻ tối giản all-white tuyệt đối.\r\n\r\n3. Common Projects Original Achilles\r\n3-giay-sneaker-trang-elleman\r\n\r\nCommon Project là một mẫu giày điển hình cho việc giày sneaker không dùm với mục đích chơi thể thao hay tham gia các hoạt động luyện tập ngoài trời. Đôi giày đơn giản đến mức nó là sự lựa chọn hàng đầu cho các buổi tiệc tùng về đêm bên cạnh những đôi giày tây truyền thống. Thiết kế tối giản trông tuyệt vời, kết hợp với quần jean hoặc quần chinos cùng một chiếc áo len đan hoặc áo khoác da để có thể trông thật phong cách mà vẫn giữ được sự thoải mái cho đôi chân suốt cả ngày dài.\r\n\r\n4. Oliver Cabell Low 1\r\n4-giay-sneaker-trang-elleman\r\n\r\nNếu bạn cảm thấy giá của đôi Common Achilles khá cao so với khả năng mua sắm của bản thân. Hãy thử để mắt đến sự lựa chọn thay thế vừa túi tiền hơn nhưng vẫn cực kì chất lượng với đôi Oliver Cabell Low 1 này. Là một thương hiệu thời trang độc lập, hãng đã cắt giảm một số chi tiết có trên những mẫu cao cấp khác để tạo nên một đôi giày tinh tế và tối giản với giá thành vô cùng dễ chịu.\r\n5. Givenchy Urban Street\r\n5-giay-sneaker-trang-elleman\r\n\r\nKhông có gì nói về sự tinh tế mà hai tông màu đen và trắng đem lại. Và Givenchy đã kết hợp hài hòa hai màu sắc ấy để tạo nên một mẫu giày được thiết kếvới những đường nét đầy tinh xảo. Ngoài ra, chất liệu da cao cấp đến từ thương hiệu nổi tiếng của Pháp chắc chắn không làm bạn nghi ngờ về độ bền của đôi giày này.\r\n6. Paul Smith Basso\r\n6-giay-sneaker-trang-elleman\r\n\r\nMang ngôn ngữ thiết kế tương tự những đôi Givenchy Urban Street, đôi giày này là sự lựa chọn dễ chịu hơn với mức giả rẻ hơn một nửa so với mẫu giày cao cấp trên của Pháp. Tuy nhiên, không phải vì giá rẻ mà đôi giày đánh đổi đi chất lượng sản phẩm, ngược lại Paul Smith Basso còn được đánh giá là có chất “thể thao” nhiều hơn với những đường nét cắt vát mạnh mẽ và táo bạo.\r\n\r\n7. Vans Old Skool All White\r\n7-giay-sneaker-trang-elleman\r\n\r\nCó thể nói, Vans là thương hiệu giày nổi danh của đường phố. Vượt lên trên tất cả những mẫu giày cũng minimalist không kém khác như Authentic hay Era, Vans Authentic được đánh giá cao nhất bởi tính phổ biến của nó. Bên cạnh thiết kế đế cao su họa tiết waffle quen thuộc, những đôi Old Skool của Vans khá dễ mang, cả về nghĩa bóng lẫn nghĩa đen khi nó không chỉ dễ dàng phối hợp với nhiều loại quần áo mà còn thuận tiện trong việc xỏ chân vào nhờ form giày mềm và rộng.\r\nTop 8 thương hiệu giày trượt ván chất lượng nhất 2019\r\nTop 8 thương hiệu giày trượt ván chất lượng nhất 2019\r\nGiày trượt ván là một phần không thể thiếu của bộ môn skateboarding. Cần có một đôi giày có đủ sức nặng và độ bám để có thể đảm bảo sự kết dính...\r\n\r\n8. Chuck Taylor All Star Classic Hi Top/White\r\n222-giay-sneaker-trang-elleman\r\n\r\nBất kể bạn đang theo đuổi phong cách thời trang nào thì tủ giày của bạn cũng cần trang bị ít nhất một đôi giày đến từ Converse. Được biết đến bởi nhiều phiên bản Chuck khác nhau như One Star, 1970s, Chuck II song nếu để nói mẫu giày nổi tiếng nhất của hãng phải kể đến đôi Chuck Taylor All Star Classic huyền thoại. Với phối màu trắng cơ bản, gồm những đường viền đỏ chạy dọc theo thân giày cùng tùy chọn cổ cao duy nhất trong danh sách, đôi giày sẽ là sự nâng cấp hoàn hảo và tinh tế cả về sự thoải mái lẫn tính thời trang cho mọi loại outfit của bạn trong bất kì hoàn cảnh nào.\r\n9. Saint Laurent Andy\r\n9-giay-sneaker-trang-elleman\r\n\r\nCó lẽ không cần giới thiệu nhiều về nhãn hiệu thời trang hàng đầu này của Pháp, Saint Laurent Paris. Và Andy chính là một trong những đôi giày sneaker có thiết kế minimalist nổi tiếng của hãng. Đôi giày mang phong cách cực kì tối giản cùng chất liệu da cao cấp được lót cả mặt ngoài lẫn mặt trong. Ngoài ra, logo Saint Laurent được in dập nổi màu vàng sáng bóng còn làm tăng thêm sự cao cấp cho sản phẩm sneaker của thương hiệu đắt tiền này.\r\n10. Koio Capri Triple White\r\n11-giay-sneaker-trang-elleman\r\n\r\nNếu bạn đang tìm kiếm một đôi giày trắng không chỉ có thiết kế tối giản mà còn thuận tiện trong việc xỏ chân ra vào thì Capri Triple White là một sự lựa chọn không tồi. Bên cạnh kiểu dáng tinh tếvới những chi tiết được may chắc chắn, đôi giày còn đặc biệt ở chỗ nó có phần gót giày được làm thấp vừa đủ và rộng hơn thông thường, giúp cho bạn dễ dàng xỏ chân vào một cách tiện lợi.\r\n\r\n11. adidas Ultra Boost Triple White\r\n10-giay-sneaker-trang-elleman\r\n\r\nĐã có rất nhiều phiên bản và phối màu Ultra Boost khác nhau được adidas tạo ra và Triple White chính là một lựa chọn tuyệt vời nhất cho những chàng trai thể thao, năng động nhưng yêu thích sự đơn giản Với công nghệ đế boost siêu nhẹ, đây là sự bổ sung tuyệt vời cho tủ giày của những người đang tìm kiếm một đôi giày chạy bộ hợp thời trang.\r\n\r\n12. Nike Cortez White\r\n12-giay-sneaker-trang-elleman\r\n\r\nCó thể thấy, danh sách này được tổng hợp và sắp xếp có chủ đích khi 2 ông lớn sneaker đề sở hữu hai đề cử giày sneaker trắng. Nếu như bên trên là đôi runner điển hình cho sự tối giản của adidas thì Nike cũng không kém cạnh với mẫu Cortez huyền thoại trong phân khúc giày chạy bộ. Vừa có chất liệu nhẹ, vừa mang thiết kế mũi tròn đã trở thành kinh điển của thời trang, đây lại là một đôi giày không thể bỏ qua cho những chàng trai đang tìm kiếm sự đơn giản và thoải mái.', '1-giay-sneaker-trang-elleman.jpg', '2021-06-23', 0, 1),
(12, '7 đôi sneakers hot trend nhất dẫn đầu xu hướng giày 2021', 'Giày hot 2021 là những mẫu giày các tín đồ mê giày không thể bỏ qua. Dưới đây là những đôi giày sneaker hot trend nhất được dự đoán sẽ làm mưa làm gió trong xu hướng giày sneakers đầu năm 2021.\r\n\r\ngiay sneaker hot trend 2021\r\n7 đôi giày sneaker hot trend 2021\r\nNhững tháng cuối năm 2020 và đầu 2021 là khoảng thời gian được xem là bận rộn nhất của các hãng thời trang trên thế giới. Khi mà đây là mùa mua sắm nhất trong năm với nhiều lễ hội lớn. Mặc dù năm nay với đại dịch Covid toàn cầu nhưng các thương hiệu thời trang như Balenciaga, Gucci, Dior hay Nike và Adidas đều liên tục cho ra những sản phẩm thời trang mới nhằm đạp ứng được những nhu cầu thời trang thiết yếu của giới trẻ. Và sau đây là Top những đôi giày sneaker hot trend nhất được dự đoán sẽ làm mưa làm gió trong xu hướng giày hot 2021.\r\n\r\n1. Nike Air Jordan 1 Dior\r\nNhắc đến những đôi sneaker dẫn đầu xu hướng giày 2021 mà bỏ qua đôi Nike Air Jordan 1 Dior thì là một thiếu sót vô cùng lớn, Nike Air Jordan 1 Dior là một trong những đôi giày số 1 nửa cuối năm 2021. Và hiện nay đây là một trong những đôi giày được nhiều bạn trẻ ao ước muốn có cho mình. Khi mà số lượng được phát hành chỉ 8500 đôi trên toàn cầu nhưng tỉ lệ người đăng ký lên tới 5 triệu người.\r\n\r\nNike air jordan 1 dior\r\nNike Air Jordan 1 Dior\r\nĐây là đôi giày được hợp tác giữa Nike Jordan và Dior. Một trong những sản phẩm sneaker đặc biệt hợp tác với hãng thời trang xa xỉ bậc nhất thế giới điều mà các tín đồ yêu sneaker chờ đợi nhất trong năm nay. Điều đặc biệt hơn là bản collab này được sản xuất tại ý và hoàn toàn bằng thủ công, tạo nên sự đẳng cấp cho người dùng.\r\n\r\nVideo: Nike Dior được tạo ra như thế nào?\r\n\r\n\r\nĐôi giày hot 2021 này có thiết kế được dựa theo dòng sản phẩm huyền thoại Nike Jordan 1 nhưng có sự phối màu sắc thật tinh tế khi chúng được sử dụng tông màu xám xanh và trắng, làm toát lên sự sang trọng cho người sử dụng. Mức giá của đôi giày này được công bố với bản high được bán 2.200 USD nhưng hiện nay mức giá bán trên thị trường đang được bán giao động từ 15.000 – 35.000 USD.\r\n\r\nVì vậy đây là đôi giày có vị trí số 1 trong Top những đôi giày sneaker được dự đoán sẽ hot trend nhất năm 2021.\r\n\r\nxu huong sneaker 2021\r\nNike Air Jordan 1 Dior\r\n2. Nike SB Dunk Travis Scott\r\nĐây là một trong những sản phẩm giày hot 2021 thuộc bộ sưu tập của Travis Scott, được ra mắt vào ngày 22/2/2020.\r\n\r\nĐây là bản collab đặc biệt giữa nike và Travis Scott nhằm tạo nên những điểm nhấn và thổi hồn cho dòng sản phẩm SB DUNK một trong những đôi giày trượt ván bị lãng quên trong thời gian qua.\r\n\r\nNhờ thiết kế độc đáo cũng như có những nét tinh tế đã tạo nên cho đôi Nike SB Dunk Travi Scott những giá trị về thời trang rất to lớn. Và đón nhận được nhiều sự chào đón của giới đam mê sneaker trên toàn thế giới.\r\n\r\nĐiều đặc biệt của đôi giày này chúng được thiết kế 2 lớp lớp ngoài được sử dụng vải paisley đây là một trong những loại vải được dệt thủ công xuất xứ từ ba tư vào những thế kỷ 18 – 19 với họa tiết hình giọt nước cong.\r\n\r\nPhần phía trong sử dụng bằng chất liệu da lộn. Và đôi giày này được phát hành với 2 phiên bản thường và đặc biệt. Chúng chỉ khác nhau ở cái hộp, và mỗi phiên bản đều có những mức giá bán khác nhau trên thị trường.\r\n\r\nNike SB Dunk Travis Scott\r\nNike SB Dunk Travis Scott\r\nPhiên bản thường có giá giao động trong khoảng 1.700 – 3.200 USD\r\n\r\nPhiên bản đặc biệt có mức giá giao động trong khoảng : 1.850 – 15.000 USD\r\n\r\nVới mức giá khủng trên thị trường thứ cấp chứng tỏ đây là một trong những đôi giày hot trend và thuộc Top những đôi giày sneaker hot trend nhất đầu năm 2021. mà các bạn trẻ không thể bỏ qua.\r\n\r\nXem thêm:\r\n\r\nthuong hieu giay the thao noi tieng the gioi\r\nTop 5 thương hiệu giày thể thao nổi tiếng và được ưa chuộng nhất thế giới\r\nĐâu là thương hiệu giày thể thao nổi tiếng nhất thế giới? Giày thể thao nam hiện nay đã trở thành kiểu giày phổ biến và có khả năng lan tỏa, đồng tình mạnh mẽ...\r\n\r\n3. Giày Alexander Mcqueen\r\nĐây là một trong những hãng thời trang lớn của thế giới, Vào năm 2017 hãng thời trang này đã cho ra mắt đôi sneaker mà được người dùng yêu thích cho đến hiện nay. Được chứng minh qua doanh số bán đôi giày này không ngưng tăng trưởng trong thời gian qua. Đôi giày Alexander Mcqueen được thiết kế theo phong cách chunky một trong những phong cách thời trang mới được giới trẻ yêu thích.\r\n\r\nChúng có phần đế khá cao so với các dòng sneaker khác trên thị trường. Với việc giúp người dùng cao hơn 5 cm khiến cho giới trẻ vô cùng thích thú. Phần upper được sử dụng chất liệu da tạo nên sự sang trọng cho sản phẩm. Và điều đặc biệt là đôi giày này có rất rất nhiều các bản phối khác nhau. Mỗi bản phối đều có những cá tính riêng vì vậy đây là một trong những đôi giày được giới trẻ yêu thích bậc nhất.\r\n\r\ngiay alexander mcqueen sneaker\r\nAlexander Mcqueen\r\nNăm 2020 hãng thời trang này cũng cho ra mắt một sản phẩm mới mang tên giày Alexander Mcqueen Chunky Sole với thiết kế hầm hố và tạo nên những điểm nhấn đáng kể cho sản phẩm vì vậy giày Alexander Mcqueen 2020 cũng hứa hẹn là một trong những điểm sáng trong bộ sưu tập giày sneaker trên thế giới. Vì vậy chúng ta không thể nào không liệt kê đôi giày này vào Top những đôi giày sneaker hot trend nhất đầu năm 2021, đáng mua nhất hiện nay.\r\n\r\n4. Dior X Kaws B23\r\nNhắc đến sneaker Dior thì chúng ta nghĩ ngay đến sự sáng tạo trong thiết kế và cũng như những bản phối, những hoa văn họa tiết mà các sản phẩm của hàng này mang lại. Vì chúng thường được làm hoàn toàn bằng thủ công vì vậy các sản phẩm của hàng này luôn mang đến cho người dùng sự đẳng cấp.\r\n\r\nDior B23 là sản phẩm được ra mắt vào năm 2017 nhưng vẫn là mẫu giày hot 2021 với thiết kế dựa theo đôi Converse vì vậy được giới trẻ thường gọi là Converse Dior. Đây là một sản phẩm đẳng cấp được giới trẻ cực kỳ yêu thích trong thời gian qua. Vì chúng rất sang trọng và cũng như rất dễ dàng kết hợp được với nhiều các sản phẩm thời trang.\r\n\r\nDior X Kaws B23\r\nDior X Kaws B23\r\n2020 hãng Dior tiếp tục cho ra mắt bản slip on B23 Với phong cách giày xỏ ngón tạo nên một trong những điểm nhấn đáng kể cho dòng sản phẩm này. Và hứa hẹn đây có thể là một trong những sneaker hot trend nhất đầu năm 2021.\r\n\r\nXem thêm:\r\n\r\n4 cách phối quần jeans với giày sneaker nam đẹp nhất\r\n4 cách phối quần jeans với giày sneaker nam đẹp nhất\r\nCó nhiều cách phối giày và quần áo cho nam giới đơn giản nhưng cá tính như: quần âu với giày tây; suit với giày tây hoặc giày thể thao; đặc biệt là phối quần...\r\n\r\n5. Nike Air Jordan 1 Travis Scott\r\nNhắc đến bộ sưu tập của Travis Scott thì chúng ta không thể nào không nhắc đến đôi Nike Air Jordan 1 Travis Scott là một trong những sẩn phẩm mà được giới trẻ việt mơ ước. Với bản Collab của Nike Air Jordan 1 và phong cách đường phố của chàng ca sĩ Travis Scott đã tạo nên những giá trị thời trang vô cùng độc đáo cho sản phẩm.\r\n\r\nĐôi giày hot 2021 này được sử dụng tông màu chủ đạo là màu xám đất. Tạo nên nét bụi bặm phù hợp cho những bạn trẻ có phong cách thời trang cá tính và mạnh mẽ.\r\n\r\nNike Air Jordan 1 Travis scott\r\nNike Air Jordan 1 Travis Scott\r\nĐôi giày này có 2 bản low và high để cho các bạn trẻ có thể lựa chọn phù hợp với phong cách của mình. Mỗi phiên bản đều có cá tính riêng giá trị riêng.\r\n\r\nVà đây cũng là một trong những đôi giày sneakers được dự kiến sẽ vô cùng hot trend trong xu hướng giày 2021.\r\n\r\n6. Giày Gucci Rhyton\r\nGucci là một trong những hãng thời trang mà không làm chúng ta thất vọng về những thiết kế của mình cũng như tạo nên những sự trải nghiệm cho khách hãng.\r\n\r\nGucci Rhyton được thiết kế theo phong cách thời trang hiện đại với nhiều bản phối logo khác nhau như Gucci, Mouth, Mickey …. tạo nên những bức tranh màu sắc vô cùng đặc biệt cho dòng sản phẩm này. Đặc biệt là những sản phẩm của Gucci luôn mang đến cho người dùng sự đẳng cấp, thứ mà không phải các sản phẩm thương hiệu khác cũng có được trên thị trường sneaker hiện nay.\r\n\r\nGucci Rhyton\r\nGucci Rhyton\r\n7. Balenciaga Triple S\r\nNhắc đến hãng thời trang hàng đầu thế giới hện nay thì không ngoài ai khác chính là hãng thời trang Balenciaga. Đây là một trong những ít hãng trên thế giới luôn có cho mình những bước đi đầy táo bạo trong thiết kế. Nhờ vậy mà hãng thời trang này luôn đi đầu về xu hướng sneaker. Cuối năm 2017 hãng thời trang này cho ra mắt đôi giày Balenciaga Triple S với thiết kế đi người lại những quy luật về thời trang sneaker từ trước hiện nay. Đôi giày này có hơi hướng hiện đại và phong cách chủ đạo là chunky.\r\n\r\nVà đây cũng là một trong những đôi giày hot và được bán nhiều nhất trên thế giới của hàng Balenciaga. Vì vậy hãng này 2018 đã chuyển nhà may qua china để có thể sản xuất đủ nhu cầu về đôi giày này của các bạn trẻ trên thế giới.\r\n\r\nBalenciaga triple s\r\nBalenciaga Triple S\r\nVào cuối năm 2018 hãng này cho ra bản clear, một trong những công nghệ đế khí để tích hợp với đôi Balenciaga Triple S nhằm giúp cho người dùng có được sự trải nghiệm tốt hơn. Khi mà phiên bản gốc có trọng lượng hơi nặng khiến cho người dùng cảm giác nặng nề khi sử dụng. Và Balenciaga Triple S chắc chắc sẽ là đôi giày hot trend trong một thời gian dài sắp tới.', 'giay-sneaker-hot-trend-2021.jpg', '2021-06-23', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trieuminhtuan_user`
--

DROP TABLE IF EXISTS `trieuminhtuan_user`;
CREATE TABLE IF NOT EXISTS `trieuminhtuan_user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `pass` char(32) CHARACTER SET utf8 NOT NULL,
  `fullname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `trash` tinyint(1) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `trieuminhtuan_user`
--

INSERT INTO `trieuminhtuan_user` (`userId`, `username`, `pass`, `fullname`, `email`, `status`, `trash`) VALUES
(1, 'minhtuanuser', 'd9b1d7db4cd6e70935368a1efb10e377', 'minh tuan', 'trieutuan@gmaail.com', 1, 0),
(6, 'minhtuanuser3', '14e1b600b1fd579f47433b88e8d85291', 'triệu minh tuấn', 'minhtuangiaitri123@gmail.com', 1, 0),
(5, 'minhtuanuser2', 'd9b1d7db4cd6e70935368a1efb10e377', 'triệu minh tuấn', 'minhtuangiaitri@gmail.com', 1, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
