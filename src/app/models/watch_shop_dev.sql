-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 07, 2023 lúc 04:07 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `watch_shop_dev`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `fullname` varchar(64) NOT NULL,
  `roles` varchar(16) NOT NULL,
  `status` varchar(16) NOT NULL,
  `loginAt` datetime NOT NULL,
  `logoutAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `email`, `password`, `fullname`, `roles`, `status`, `loginAt`, `logoutAt`) VALUES
(1, 'admin1', 'admin1', 'admin1', 'admin', 'no-active', '2023-09-07 08:41:25', '2023-09-07 08:47:03'),
(7, 'user1', 'b3daa77b4c04a9551b8781d03191fe098f325e67', 'user1', 'user', 'no-active', '2023-09-07 08:37:55', '2023-09-07 08:38:10'),
(8, 'user2', '123456789', 'user2', 'user', 'no-active', '2023-09-07 08:40:43', '2023-09-07 08:41:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `slug` varchar(32) NOT NULL,
  `type` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `type`) VALUES
(1, 'Đồng hồ nam', 'dong-ho-nam', 'Gender'),
(2, 'Đồng hồ nữ', 'dong-ho-nu', 'Gender'),
(3, 'Rolex', 'rolex', 'Brands'),
(4, 'Patek Philippe', 'patek-philippe', 'Brands'),
(5, 'Breitling', 'breitling', 'Brands'),
(6, 'Cartier', 'cartier', 'Brands'),
(7, 'IWC', 'iwc', 'Brands'),
(8, 'Jaeger-LeCoultre', 'jaeger-lecoultre', 'Brands'),
(9, 'Hublot', 'hublot', 'Brands'),
(10, 'Vacheron Constantin', 'vacheron-constantin', 'Brands'),
(11, 'A. Lange & Söhne', 'a-lange-and-soehne', 'Brands'),
(12, 'Breguet', 'breguet', 'Brands'),
(13, 'Hamilton', 'hamilton', 'Brands'),
(14, 'Oris', 'oris', 'Brands'),
(15, 'Omega', 'omega', 'Brands'),
(16, 'Audemars Piguet', 'audemars-piguet', 'Brands'),
(17, 'Tudor', 'tudor', 'Brands'),
(18, 'Panerai', 'panerai', 'Brands'),
(19, 'Seiko', 'seiko', 'Brands'),
(20, 'Zenith', 'zenith', 'Brands'),
(21, 'Longines', 'longines', 'Brands'),
(22, 'Richard Mille', 'richard-mille', 'Brands'),
(23, 'Ulysse Nardin', 'ulysse-nardin', 'Brands'),
(24, 'NOMOS', 'nomos', 'Brands'),
(25, 'Sinn', 'sinn', 'Brands'),
(26, 'TAG Heuer', 'tag-heuer', 'Brands');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `fullname` varchar(64) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(16) NOT NULL,
  `date_of_birth` datetime NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `email`, `phone`, `fullname`, `address`, `gender`, `date_of_birth`, `account_id`) VALUES
(5, 'user1', '', 'user1', '', '', '0000-00-00 00:00:00', 7),
(6, 'admin1', '0123456789', 'admin1', 'Viet Nam', 'Nữ', '0000-00-00 00:00:00', 1),
(7, 'user2', '', 'user2', '', '', '0000-00-00 00:00:00', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_number` varchar(10) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_city` varchar(32) NOT NULL,
  `customer_district` varchar(32) NOT NULL,
  `customer_ward` varchar(32) NOT NULL,
  `delivery_price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `customer_number`, `customer_address`, `customer_city`, `customer_district`, `customer_ward`, `delivery_price`, `total_price`, `createdAt`, `updatedAt`) VALUES
(23, 'admin1', 'admin1', 'admin1', 'Thành phố Hà Nội', 'Huyện Thanh Trì', 'Xã Tứ Hiệp', 50000, 44825000, '2023-09-07 08:19:16', '2023-09-07 08:20:05'),
(24, 'user2', 'user2', 'user2', 'Thành phố Đà Nẵng', 'Quận Cẩm Lệ', 'Phường Hòa Phát', 50000, 44825000, '2023-09-07 08:38:45', '2023-09-07 08:40:05'),
(25, 'Nguyen Thi Linh', 'Nguyen Thi', 'Nguyen Thi Linh', 'Thành phố Hải Phòng', 'Huyện Thuỷ Nguyên', 'Xã Đông Sơn', 50000, 44825000, '2023-09-07 08:44:34', '2023-09-07 08:44:46'),
(26, 'Nguyen Van Duc', 'Nguyen Van', 'Nguyen Van Duc', 'Tỉnh Bình Dương', 'Huyện Phú Giáo', 'Xã Phước Hoà', 50000, 44825000, '2023-09-07 08:45:15', '2023-09-07 08:45:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `watch_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `watch_id`, `account_id`, `quantity`, `product_price`, `status`) VALUES
(26, 23, 106, 1, 5, 44775000, 'done'),
(27, 24, 106, 8, 5, 44775000, 'done'),
(28, 25, 106, 1, 5, 44775000, 'approved'),
(29, 26, 106, 1, 5, 44775000, 'not-approved');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `watch`
--

CREATE TABLE `watch` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `old_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `current_price` int(11) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `origin` varchar(32) NOT NULL,
  `category_slug` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `watch`
--

INSERT INTO `watch` (`id`, `name`, `description`, `avatar`, `image`, `old_price`, `discount`, `current_price`, `stock_quantity`, `origin`, `category_slug`) VALUES
(105, 'Rolex Daytona - 116509ZEA', 'Rolex Daytona - 116509ZEA là một chiếc đồng hồ sang trọng và đẳng cấp với vỏ làm từ vàng trắng 18K, mặt số màu xanh lá cây nổi bật và tích hợp chức năng chronograph chính xác, là biểu tượng của sự tinh tế và hiệu suất của thương hiệu Rolex.', 'https://cdn2.chrono24.com/images/uhren/25767182-68f1737fq3oxduakpfhjbonf-Square360.jpg', 'https://cdn2.chrono24.com/images/uhren/25767182-68f1737fq3oxduakpfhjbonf-ExtraLarge.jpg', 55955000, 8, 51479000, 20, 'Macao', 'rolex, dong-ho-nam'),
(106, 'Rolex Explorer II - 40mm Polar White Dial Stainless Steel Automatic Watch 16570', 'Rolex Explorer II - 40mm Polar White Dial Stainless Steel Automatic Watch 16570: Đồng hồ tự động 40mm của Rolex với mặt số trắng tinh khôi và vỏ thép không gỉ, mang tính biểu tượng và độ chính xác cao.', 'https://cdn2.chrono24.com/images/uhren/29263973-ytamornb0axu9vwc1hglthoi-Square360.jpg', 'https://cdn2.chrono24.com/images/uhren/29263973-ytamornb0axu9vwc1hglthoi-ExtraLarge.jpg', 9950000, 10, 8955000, 990, 'America', 'dong-ho-nam, rolex'),
(107, 'Rolex Lady-Datejust - 18K. Gold mit 472 Diamanten', ' Rolex Lady-Datejust - 18K Gold mit 472 Diamanten: Đồng hồ sang trọng với vỏ vàng 18K và 472 viên kim cương, thể hiện sự quý phái và lấp lánh đỉnh cao.', 'https://cdn2.chrono24.com/images/uhren/29269931-5qg7mzk37hpsmzb7v06smvxm-Square390.jpg', 'https://cdn2.chrono24.com/images/uhren/29269931-5qg7mzk37hpsmzb7v06smvxm-ExtraLarge.jpg', 25298000, 5, 24034000, 50, 'Germany', 'dong-ho-nu, rolex'),
(108, 'Rolex Lady-Datejust - Stahl/Gold Gold-Crystals Zifferblat mit 10 Diamanten', 'Đồng hồ Lady-Datejust với vỏ bằng thép và vàng, mặt số với 10 viên kim cương, tạo điểm nhấn quý phái và lộng lẫy.', 'https://cdn2.chrono24.com/images/uhren/29251093-c5s1s3llx4zqkafk1u3qwo00-Square390.jpg', 'https://cdn2.chrono24.com/images/uhren/29251093-c5s1s3llx4zqkafk1u3qwo00-ExtraLarge.jpg', 11549000, 15, 9817000, 200, 'Germany', 'dong-ho-nu, rolex'),
(109, 'Rolex Yacht-Master II - 116680 White Dial NEW 2023', 'Với mặt số màu trắng và tính năng độc đáo, nó thể hiện sự hoàn thiện và sáng tạo của Rolex. Ra mắt vào năm 2023, đây là một bản vá mới mang tính biểu tượng trong thế giới đồng hồ sang trọng.', 'https://cdn2.chrono24.com/images/uhren/30218360-n8t6n962myilwb84ig8fbzs6-Square390.jpg', 'https://cdn2.chrono24.com/images/uhren/30218360-n8t6n962myilwb84ig8fbzs6-ExtraLarge.jpg', 20000000, 10, 18000000, 95, 'America', 'dong-ho-nam, rolex'),
(110, 'Rolex Air King - NEW 2023 Air King 126900', 'Với thiết kế hiện đại và tính năng đáng tin cậy, nó mang đến sự độc đáo và tinh tế trong thế giới đồng hồ. Ra mắt vào năm 2023, đồng hồ này thể hiện sự sáng tạo và đẳng cấp của Rolex trong việc sản xuất đồng hồ thời trang.', 'https://cdn2.chrono24.com/images/uhren/29679951-a9wid2quqo96qflk4fgb6601-Square390.jpg', 'https://cdn2.chrono24.com/images/uhren/29679951-a9wid2quqo96qflk4fgb6601-ExtraLarge.jpg', 9750000, 18, 7995000, 100, 'America', 'dong-ho-nam, rolex'),
(111, 'Rolex Day-Date 40 - mm 18K Yellow Gold Yellow Diamond Baget Dial 228238 Complete Set', 'Là một chiếc đồng hồ danh tiếng được biết đến với vẻ đẹp và xa hoa. Được làm từ vàng 18K và có mặt số lấp lánh bằng kim cương vàng màu, chiếc đồng hồ này toát lên sự sang trọng và tinh tế.', 'https://cdn2.chrono24.com/images/uhren/24537354-92d3dlz2hjtg7bfk638vepxv-Square390.jpg', 'https://cdn2.chrono24.com/images/uhren/24537354-92d3dlz2hjtg7bfk638vepxv-ExtraLarge.jpg', 47500000, 5, 45125000, 50, 'America', 'dong-ho-nam, rolex'),
(112, 'Rolex Day-Date 40 BLACK DIAMOND DIAL - NEW - AVAILABLE NOW - 228238', 'Với mặt số màu đen được trang trí bằng kim cương, đồng hồ này thể hiện sự độc đáo và sang trọng. Hiện đã có sẵn và sẵn sàng cho việc mua sắm, đây là một tác phẩm nghệ thuật độc đáo trong thế giới đồng hồ cao cấp.', 'https://cdn2.chrono24.com/images/uhren/25318330-e39u2dk3beoq5956ov6vfqmc-Square390.jpg', 'https://cdn2.chrono24.com/images/uhren/25318330-e39u2dk3beoq5956ov6vfqmc-ExtraLarge.jpg', 51488000, 5, 48914000, 20, 'America', 'dong-ho-nam, rolex'),
(113, 'Rolex Day-Date 40 NEW 2023 Day-Date 40 PAVE DIAL FACTORY DIAMOND BEZEL 228348RBR', 'Với mặt số đặc biệt được trang trí bằng việc đính kim cương theo công nghệ Pave và vòng ngoại vi bằng kim cương của nhà sản xuất, chiếc đồng hồ này thể hiện sự sang trọng và đẳng cấp. Được giới thiệu vào năm 2023, đây là một tác phẩm nghệ thuật mới trong thế giới đồng hồ cao cấp.', 'https://cdn2.chrono24.com/images/uhren/30232785-xc57ktnqn9of3ogrrjtcaqfn-Square390.jpg', 'https://cdn2.chrono24.com/images/uhren/30232785-xc57ktnqn9of3ogrrjtcaqfn-ExtraLarge.jpg', 79500000, 3, 77115000, 10, 'America', 'dong-ho-nu, rolex'),
(114, 'Rolex Lady-Datejust 28mm Yellow Gold 279138RBR Pave Black Roman President', 'Với vỏ vàng màu và mặt số được trang trí bằng kim cương theo kiểu Pave và chỉ số La Mã màu đen, chiếc đồng hồ này kết hợp giữa thiết kế tinh tế và sự lấp lánh. Nó là một biểu tượng của sự quý phái và độ chính xác của thương hiệu Rolex trong thế giới đồng hồ đẳng cấp.', 'https://cdn2.chrono24.com/images/uhren/25471089-nrz26d67afkg564vmr9ttvvh-Square390.jpg', 'https://cdn2.chrono24.com/images/uhren/25471089-nrz26d67afkg564vmr9ttvvh-ExtraLarge.jpg', 85885000, 20, 68708000, 50, 'America', 'dong-ho-nu, rolex'),
(115, 'Patek Philippe Perpetual Calendar (2023 Full Set) Grand Complications Rose Gold', 'Được làm từ vàng hồng, nó tích hợp tính năng lịch vĩnh viễn, có nghĩa là nó có khả năng tự động tính toán cho các năm nhuận, tháng và ngày, giúp nó đạt độ chính xác cao.', 'https://cdn2.chrono24.com/images/uhren/25275321-v1t3zxo7g6eld47uy31j5hwl-Square390.jpg', 'https://cdn2.chrono24.com/images/uhren/25275321-v1t3zxo7g6eld47uy31j5hwl-ExtraLarge.jpg', 88900000, 20, 71120000, 50, 'Hong Kong', 'dong-ho-nam, patek-philippe'),
(116, 'Patek Philippe Celestial Grand 6102P Blue Dial 2020 New', 'Một chiếc đồng hồ Patek Philippe cao cấp với thiết kế độc đáo, mặt số màu xanh đá và độ phức tạp trong việc hiển thị các yếu tố thiên văn, đại diện cho sự hoàn thiện và tinh xảo trong thế giới đồng hồ.', 'https://cdn2.chrono24.com/images/uhren/21772541-olci3x1hi0ox0rxxta2kdvvv-Square390.jpg', 'https://cdn2.chrono24.com/images/uhren/21772541-olci3x1hi0ox0rxxta2kdvvv-ExtraLarge.jpg', 477675000, 2, 468122000, 5, 'America', 'dong-ho-nam, patek-philippe'),
(117, 'Breitling Chronomat New 2023 Super Chronomat Rose Gold Chocolate Dial', 'Một chiếc đồng hồ thượng hạng mang vẻ đẹp tinh tế và hiệu suất mạnh mẽ, với vỏ làm từ vàng hồng và mặt số đẹp mắt màu sô-cô-la. Được giới thiệu vào năm 2023, đây là một biểu tượng cho cam kết của Breitling trong việc kết hợp sự mạnh mẽ và xa hoa trong thế giới đồng hồ.', 'https://cdn2.chrono24.com/images/uhren/28285923-4scmzgt9vrcv8r2xg89ks9mv-Square390.jpg', 'https://cdn2.chrono24.com/images/uhren/28285923-4scmzgt9vrcv8r2xg89ks9mv-ExtraLarge.jpg', 18198000, 10, 16379000, 300, 'America', 'breitling, dong-ho-nam'),
(118, 'Breguet Reine de Naples 8918BR/58/864/D00D', 'Chiếc đồng hồ này được thiết kế dành riêng cho phụ nữ, với vỏ làm từ vàng hồng và mặt số lộng lẫy với các viên kim cương. Điều này tạo nên một sự kết hợp tuyệt vời giữa nghệ thuật và thời trang, thể hiện sự tinh tế và sự tôn vinh cho vẻ đẹp nữ tính.', 'https://cdn2.chrono24.com/images/uhren/18358944-88zq464lf9xysobjm3zk0vnn-Square390.jpg', 'https://cdn2.chrono24.com/images/uhren/18358944-88zq464lf9xysobjm3zk0vnn-ExtraLarge.jpg', 26500000, 5, 25175000, 100, 'America', 'breguet, dong-ho-nu'),
(119, 'Bulgari Lucea NEW UNWORN Lvcea Rose Gold & Diamonds Mosaic Dial', 'Với vỏ làm từ vàng hồng và mặt số được trang trí bằng kim cương theo kiểu mosaic, chiếc đồng hồ này thể hiện sự tinh tế và xa hoa. Mới và chưa sử dụng, nó đại diện cho sự sáng tạo và đẳng cấp của Bulgari trong thế giới đồng hồ và trang sức.', 'https://cdn2.chrono24.com/images/uhren/24710343-lw9ch8n6gcmub5ukkscuwoph-Square390.jpg', 'https://cdn2.chrono24.com/images/uhren/24710343-lw9ch8n6gcmub5ukkscuwoph-ExtraLarge.jpg', 27000000, 8, 24840000, 60, 'America', 'dong-ho-nu, sinn'),
(120, 'Cartier Ballon Bleu 42mm Ref. W6900651', 'Chiếc đồng hồ này thường có mặt số trắng sáng và đặc trưng bởi việc có hình dáng độc đáo và dây đeo vòng quanh mặt số, tạo nên vẻ đẹp tinh tế và phong cách hiện đại.', 'https://cdn2.chrono24.com/images/uhren/28034439-2fhbbhrhnpd383h2mnf5el8r-Square360.jpg', 'https://cdn2.chrono24.com/images/uhren/28034439-2fhbbhrhnpd383h2mnf5el8r-ExtraLarge.jpg', 14698000, 10, 13228000, 100, 'America', 'cartier, dong-ho-nu'),
(121, 'Jaeger-LeCoultre Rendez-Vous Celestial', 'Chiếc đồng hồ này có mặt số tinh xảo, thể hiện hình ảnh bầu trời đêm với các chi tiết như mặt trăng và các ngôi sao. Điều này tạo ra một vẻ đẹp thần tiên và lãng mạn.', 'https://cdn2.chrono24.com/images/uhren/28965421-2ohvrwpy3u565246r2ju481j-Square390.jpg', 'https://cdn2.chrono24.com/images/uhren/28965421-2ohvrwpy3u565246r2ju481j-ExtraLarge.jpg', 45000000, 10, 40500000, 35, 'America', 'dong-ho-nu, jaeger-lecoultre'),
(122, 'Audemars Piguet Royal Oak Lady 67654OR.ZZ.1264OR.01 Rose Gold Royal Oak Lady NEW', 'Với vỏ làm từ vàng hồng, chiếc đồng hồ này mang đến sự quý phái và sang trọng. Được thiết kế dành riêng cho nữ giới, nó có mặt số độc đáo và thể hiện sự tinh tế trong từng chi tiết.', 'https://cdn2.chrono24.com/images/uhren/18753267-5e69f9zcmr7jvjviegmbo0is-Square390.jpg', 'https://cdn2.chrono24.com/images/uhren/18753267-5e69f9zcmr7jvjviegmbo0is-ExtraLarge.jpg', 17680000, 5, 16796000, 20, 'America', 'audemars-piguet, dong-ho-nu'),
(123, 'Hublot Big Bang Unico Red Magic Ceramic 45mm 411.CF.8513.RX', 'Là một chiếc đồng hồ cá tính và đầy màu sắc từ thương hiệu Hublot. Với vỏ làm từ chất liệu gốm chất lượng cao có màu đỏ sặc sỡ, chiếc đồng hồ này nổi bật với sự độc đáo và phong cách riêng biệt.', 'https://cdn2.chrono24.com/images/uhren/17769626-1g8j744n3nmkbnoyty5ni61b-Square390.jpg', 'https://cdn2.chrono24.com/images/uhren/17769626-1g8j744n3nmkbnoyty5ni61b-ExtraLarge.jpg', 19688000, 7, 18310000, 100, 'America', 'hublot, dong-ho-nam'),
(124, 'TAG Heuer Carrera Lady Caliber 9 Automatic 29mm wbn2414.ba0621', 'Chiếc đồng hồ này sử dụng Caliber 9 Automatic, một loại máy cơ tự động đáng tin cậy và chính xác, giúp đồng hồ hoạt động mượt mà và không cần thay pin. Với vỏ và dây đeo bằng thép không gỉ, nó kết hợp giữa sự thanh lịch và sức mạnh.', 'https://cdn2.chrono24.com/images/uhren/27563072-xad72fe6s5lw0xpy85jtwd7d-Square360.jpg', 'https://cdn2.chrono24.com/images/uhren/27563072-xad72fe6s5lw0xpy85jtwd7d-ExtraLarge.jpg', 4874000, 12, 4290000, 200, 'America', 'tag-heuer, dong-ho-nu'),
(125, 'Ulysse Nardin Maxi Marine Diver White Gold LE xx/500 Discontinued 260-32 RARE', 'Với vỏ làm từ vàng trắng và được sản xuất với số lượng giới hạn, nó mang đến sự quý phái và độc đáo cho người đeo.', 'https://cdn2.chrono24.com/images/uhren/27365030-l29342esv7cbrpgcoicaj7al-Square360.jpg', 'https://cdn2.chrono24.com/images/uhren/27365030-l29342esv7cbrpgcoicaj7al-ExtraLarge.jpg', 13999000, 10, 12600000, 100, 'America', 'ulysse-nardin, dong-ho-nam'),
(126, 'Jaeger-LeCoultre Triple Calendar Moonphase 150th Anniversary Edn SERVICED by JLC', 'Được sản xuất để kỷ niệm 150 năm của thương hiệu. Đây là một phiên bản giới hạn, có chức năng lịch tam vị và mặt trăng, thể hiện sự phức tạp và sự tinh tế trong thiết kế và chế tạo đồng hồ.', 'https://cdn2.chrono24.com/images/uhren/28162462-ab4gx5rur24iq00cfur6g80u-Square390.jpg', 'https://cdn2.chrono24.com/images/uhren/28162462-ab4gx5rur24iq00cfur6g80u-ExtraLarge.jpg', 11999000, 10, 10800000, 50, 'America', 'jaeger-lecoultre, dong-ho-nu'),
(127, 'Richard Mille RM 011 Felipe Massa Rm011', 'Phiên bản này được tạo ra để tưởng nhớ tay đua nổi tiếng Felipe Massa. Đồng hồ này thường được sản xuất với các vật liệu cao cấp như titan, carbón, hoặc đá sapphire, để đảm bảo sự bền bỉ và nhẹ nhàng.', 'https://cdn2.chrono24.com/images/uhren/30089945-zp50r2mp8zjxamxftowhk8dc-Square390.jpg', 'https://cdn2.chrono24.com/images/uhren/30089945-zp50r2mp8zjxamxftowhk8dc-ExtraLarge.jpg', 39999000, 10, 36000000, 65, 'America', 'richard-mille, dong-ho-nam'),
(128, 'Seiko GS 55th Anniversary Orbit Edition + Bracelet', 'Chú trọng đến chất lượng sản phẩm và chế tác thủ công. Đồng hồ Grand Seiko nổi tiếng với việc sử dụng chất liệu và công nghệ cao cấp.', 'https://cdn2.chrono24.com/images/uhren/24629620-o11qvxipuseprbpk8sadzq1t-Square360.jpg', 'https://cdn2.chrono24.com/images/uhren/24629620-o11qvxipuseprbpk8sadzq1t-ExtraLarge.jpg', 8750000, 5, 8313000, 100, 'America', 'seiko, dong-ho-nam'),
(129, 'NOMOS Tangente Neomatik 180', 'Đồng hồ NOMOS Tangente Neomatik 180 là một sự kết hợp hoàn hảo giữa thiết kế tinh tế và công nghệ hiện đại.', 'https://cdn2.chrono24.com/images/uhren/30048598-yx4hrtgivf4jwoc61497vwuo-Square390.jpg', 'https://cdn2.chrono24.com/images/uhren/30048598-yx4hrtgivf4jwoc61497vwuo-ExtraLarge.jpg', 4000000, 5, 3800000, 500, 'America', 'nomos, dong-ho-nam'),
(130, 'Longines Vintage Big Eye Skin Diver 7981-3 30CH Chronograph', 'Đây là một chiếc đồng hồ cổ điển độc đáo, với thiết kế ghi chú thời gian mắt lớn ấn tượng và bộ máy chronograph chất lượng cao, tạo nên một sự kết hợp tinh tế giữa thể thao và lịch lãm.', 'https://cdn2.chrono24.com/images/uhren/20014842-1k6azo5yqz24pmdtcwldgplv-Square390.jpg', 'https://cdn2.chrono24.com/images/uhren/20014842-1k6azo5yqz24pmdtcwldgplv-ExtraLarge.jpg', 9750000, 8, 8970000, 200, 'America', 'longines, dong-ho-nam'),
(131, 'TAG Heuer Carrera Lady War1353.bd0779 Mop Dial Diamond Bezel 18k Rose Gold Steel', 'Mặt đồng hồ nền MOP (Mother of Pearl) tinh tế, viền kim cương sang trọng và kết hợp giữa thép không gỉ và vàng hồng 18k, tạo nên sự kết hợp độc đáo giữa vẻ đẹp và tính chất chất lượng của thương hiệu TAG Heuer.', 'https://cdn2.chrono24.com/images/uhren/30096793-1w7qceygz6rzoxef3ia6bcjq-Square390.jpg', 'https://cdn2.chrono24.com/images/uhren/30096793-1w7qceygz6rzoxef3ia6bcjq-ExtraLarge.jpg', 4795000, 8, 4412000, 100, 'America', 'tag-heuer, dong-ho-nu'),
(132, 'Vacheron Constantin Skeletonized', 'Được thiết kế với mặt đồng hồ trong suốt để lộ ra bộ máy phức tạp bên trong. Thiết kế \"skeletonized\" (hoặc \"skeleton\") cho phép bạn thấy rõ các bộ phận của đồng hồ, tạo nên một tác phẩm nghệ thuật cơ khí tinh xảo và là biểu tượng của sự tài năng và đẳng cấp trong thế giới đồng hồ cao cấp.', 'https://cdn2.chrono24.com/images/uhren/28052446-52uw4lcgkei0ynn0uy846j9u-Square390.jpg', 'https://cdn2.chrono24.com/images/uhren/28052446-52uw4lcgkei0ynn0uy846j9u-ExtraLarge.jpg', 20835000, 12, 18335000, 80, 'America', 'vacheron-constantin, dong-ho-nam'),
(133, 'Vacheron Constantin 1980’s Vacheron Constantin 222 Ref. 60001 18k Gold Ladies watch.', 'Là một chiếc đồng hồ nữ thanh lịch và tinh tế được làm bằng vàng 18k. Đó là một chiếc đồng hồ biểu tượng kết hợp giữa sự khéo léo trong công nghệ sản xuất của Vacheron Constantin với một thiết kế sang trọng phù hợp với thời đại đó.', 'https://cdn2.chrono24.com/images/uhren/27170926-trm5gjjs4nirjv8g6klstfpb-Square390.jpg', 'https://cdn2.chrono24.com/images/uhren/27170926-trm5gjjs4nirjv8g6klstfpb-ExtraLarge.jpg', 18000000, 5, 17100000, 90, 'America', 'vacheron-constantin, dong-ho-nu'),
(134, 'Ulysse Nardin El Toro / Black Toro Black Toro GMT Perpetual Calendar $57,400 retail ref 326-03', 'Được thiết kế với tính năng giờ địa phương kép (GMT) và lịch vĩnh viễn (Perpetual Calendar), chiếc đồng hồ này kết hợp sự tinh tế về thiết kế và chức năng cao cấp, đồng thời có một vẻ ngoại hình thời trang và sang trọng.', 'https://cdn2.chrono24.com/images/uhren/29812533-enluv46aiqk0da2yqlew0d83-Square390.jpg', 'https://cdn2.chrono24.com/images/uhren/29812533-enluv46aiqk0da2yqlew0d83-ExtraLarge.jpg', 23350000, 12, 20548000, 100, 'America', 'ulysse-nardin, dong-ho-nam'),
(135, 'Ulysse Nardin San Marco Classico Manara LIMITED', 'Chiếc đồng hồ này có thể có các đặc điểm thiết kế và chức năng độc đáo, được tạo ra để kỷ niệm hoặc tôn vinh một sự kiện cụ thể hoặc để tạo ra sự hiếm có và giá trị cao đối với người sưu tập đồng hồ.', 'https://cdn2.chrono24.com/images/uhren/29174726-dyn23u2zz7aweq0y7grs37oa-Square390.jpg', 'https://cdn2.chrono24.com/images/uhren/29174726-dyn23u2zz7aweq0y7grs37oa-ExtraLarge.jpg', 20000000, 10, 18000000, 100, 'America', 'ulysse-nardin, dong-ho-nu'),
(136, 'Ulysse Nardin Freak Blue Phantom White Gold Carousel Tourbillon', 'Đặc điểm nổi bật của chiếc đồng hồ này là sử dụng vật liệu và công nghệ tiên tiến, với vỏ làm từ vàng trắng (White Gold) và một bộ máy tourbillon (Carousel Tourbillon) đẳng cấp. Thiết kế Blue Phantom thường đi kèm với mặt đồng hồ màu xanh đậm và có một thiết kế hiện đại, độc đáo mà Ulysse Nardin nổi tiếng với dòng Freak của mình.', 'https://cdn2.chrono24.com/images/uhren/30314777-yi99ekswtv1rz8xtfhogb7jo-Square390.jpg', 'https://cdn2.chrono24.com/images/uhren/30314777-yi99ekswtv1rz8xtfhogb7jo-ExtraLarge.jpg', 47795000, 18, 39192000, 200, 'America', 'ulysse-nardin, dong-ho-nu'),
(137, 'IWC Big Pilot NEW 2023 Big Pilot Perpetual Calendar', '100% BRAND NEW and complete with valid 8-year IWC warranty dated 2/2023. Comes with all boxes, papers, warranty card, folio, etc.', 'https://cdn2.chrono24.com/images/uhren/23878562-xz5z9f5mtwojd7tyn681lbpd-Square360.jpg', 'https://cdn2.chrono24.com/images/uhren/23878562-xz5z9f5mtwojd7tyn681lbpd-ExtraLarge.jpg', 25900000, 16, 21756000, 200, 'America', 'iwc, dong-ho-nam'),
(138, 'Rolex Lady-Datejust 28mm Star diamond dial NE/UNWORN Jubilee bracelet', 'Rolex Lady-Datejust 28mm Star diamond dial NE/UNWORN Jubilee bracelet', 'https://cdn2.chrono24.com/images/uhren/27956950-h09x5hizns8cnrc4db53gb93-Square360.jpg', 'https://cdn2.chrono24.com/images/uhren/27956950-h09x5hizns8cnrc4db53gb93-ExtraLarge.jpg', 100000000, 10, 90000000, 100, 'America', 'dong-ho-nam, rolex');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `watch_id` (`watch_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Chỉ mục cho bảng `watch`
--
ALTER TABLE `watch`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `watch`
--
ALTER TABLE `watch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`watch_id`) REFERENCES `watch` (`id`),
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
