-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th6 26, 2019 lúc 02:08 PM
-- Phiên bản máy phục vụ: 5.7.26-0ubuntu0.18.04.1
-- Phiên bản PHP: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mangxh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment_contents` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `cmt_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `comment_contents`, `user_id`, `post_id`, `cmt_time`) VALUES
(220, 'asdasda\n\n\n', 1, 42, '2019-06-25 07:40:04'),
(221, 'asasd', 1, 42, '2019-06-25 07:40:07'),
(222, 'asdasd', 1, 42, '2019-06-25 07:41:18'),
(223, 'asads', 1, 42, '2019-06-25 07:41:20'),
(224, 'adaas', 1, 42, '2019-06-25 07:41:22'),
(225, 'adasdasd', 1, 42, '2019-06-25 07:42:17'),
(226, 'asdasasd', 1, 42, '2019-06-25 07:42:19'),
(227, 'asdasdasd', 1, 42, '2019-06-25 07:42:20'),
(228, 'asdasd', 1, 42, '2019-06-25 07:42:22'),
(229, 'dasd', 1, 42, '2019-06-25 07:42:43'),
(230, 'asdasd', 1, 42, '2019-06-25 07:42:44'),
(231, 'sdasd', 1, 42, '2019-06-25 07:42:45'),
(232, 'asdasd', 1, 42, '2019-06-25 07:42:46'),
(233, 'asdasd', 1, 42, '2019-06-25 07:42:47'),
(234, 'asdasd', 1, 42, '2019-06-25 07:42:48'),
(235, 'asdasdasdasdasd\nasdasdsad\n', 1, 42, '2019-06-25 07:44:06'),
(244, 'sasdasd', 1, 38, '2019-06-25 11:34:05'),
(245, 'asdasd', 1, 38, '2019-06-25 11:34:06'),
(247, 'asdasd', 1, 46, '2019-06-26 01:49:49'),
(248, 'asasd', 1, 46, '2019-06-26 01:49:52'),
(249, 'asdasd', 1, 46, '2019-06-26 01:51:17'),
(250, 'aads', 1, 46, '2019-06-26 01:51:18'),
(251, 'asdasdasd', 1, 5, '2019-06-26 01:56:08'),
(252, 'asdasdasd', 1, 5, '2019-06-26 01:56:10'),
(253, 'asdasdas', 1, 5, '2019-06-26 01:56:11'),
(256, 'adasd', 1, 2, '2019-06-26 02:19:20'),
(257, 'asdasd', 1, 2, '2019-06-26 02:23:01'),
(260, 'asdasdasd', 1, 57, '2019-06-26 03:06:09'),
(261, 'asasdasdasd', 1, 57, '2019-06-26 03:06:11'),
(262, 'asddasdasd', 1, 57, '2019-06-26 03:06:13'),
(263, 'asdasd', 1, 20, '2019-06-26 03:19:34'),
(264, 'asdasd', 1, 20, '2019-06-26 03:19:35'),
(265, 'asdasd', 1, 37, '2019-06-26 03:58:57'),
(266, 'asddasd', 1, 37, '2019-06-26 03:58:59'),
(267, 'ABC', 1, 57, '2019-06-26 04:44:14'),
(268, 'awedaw', 1, 57, '2019-06-26 04:56:07'),
(269, 'uyfhj\n', 1, 48, '2019-06-26 04:57:56'),
(270, 'jk', 1, 48, '2019-06-26 04:57:59'),
(271, 'ugfgh', 1, 48, '2019-06-26 04:58:11'),
(272, 'uhgk', 1, 48, '2019-06-26 04:58:24'),
(273, 'uyguyh', 1, 48, '2019-06-26 04:58:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`) VALUES
(1269, 1, 42),
(1270, 1, 48),
(1272, 1, 20),
(1290, 1, 38),
(1296, 1, 47),
(1299, 1, 2),
(1301, 1, 57);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `photo_post` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contents` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `count_like` int(11) DEFAULT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `photo_post`, `contents`, `user_id`, `count_like`, `post_time`) VALUES
(2, 'good weather !!', 'weather.jpg', 'Unless you are amongst those of us lucky enough to be living in either California or southern Spain, chances are that the start of spring hasn\'t signalled the return of spring-like weather. Quite the opposite, in fact. Oh yes: the clocks might be going back, but the rain is here to stay. \r\n\r\nNow, rain has its uses. Many, in fact, if my vague memory of secondary school Geography and the water cycle serves me correctly. But it\'s been a long, cold, snowy winter and, frankly, my all-weather boots and I are at the end of our tether. Enough is enough. It\'s time to put away heavy coats and bring out shorts, skirts and summer dresses; to feel the sun on our skin, instead of hunching over, desperately trying to avoid the wind. Delicious winter comfort food is all well and good, but how delightful would it be to enjoy a giant bowl of ice cream without risking hypothermia?! Or a barbeque. In the garden, enjoying the long warm(ish) evenings. Doesn\'t that sound like heaven?\r\n\r\nIf the next week\'s forecast is to be trusted, however, no amount of complaining will keep the storm clouds from looming over my small corner of Germany. So, in an attempt to stave off cabin fever, I will be spending my time spring cleaning: a rather fitting term for having a good old clear out. Sounds boring, and if it weren\'t for the motivating tones of HRH Beyoncé it would undoubtedly be a thankless task. Still, there\'s something very satisfying about organising all the useless stuff that accumulates over the winter hibernation period. Plus, it leaves more room for summer clothes! \r\n\r\nAnd, if that doesn\'t keep me occupied for long, then there might be time to get further on my perpetual to-do list: read those books recommended by my friends, watch that film I missed in the cinema, listen to the new album by James Bay which I haven\'t heard yet. A few plans to make that rainy day into less of a catastrophe.', 1, 1, '2019-06-21 06:36:34'),
(5, 'It\'s sunny in my town', 'sunny.jpg', 'Warm sun from the sunny summer sky beat down on my exposed legs clobbered with sunscreen. Summer was not, my favorite season, but at moments like these. Nothing could be better. Resting on my beach chair I observed the wide expanse of chaos held at the beach. The cloudless day was perfect for this sunny day. The light blue sky was brilliant against the green waves. It felt so picture perfect!\r\n\r\nDashing into the waves I would soak in the cool water. Floating in the current as the waves pushed and pulled me in all directions. Joining in to play beach volleyball with my family I would jump up to hit the ball. The volleyball would go spinning through the air water droplets flying off of it in all directions as it swerved in an arc of white and contacted with my moms arms locked together in a platform. The ball would ricochet off her arm, shooting sky high. The game would go on like that for a while. Eventually my team would win. I would frolic into the water enjoying the day. Splashing water around with my sister. Finally I would walk along the beach, searching for seashells. I would find the perfect seashell a beautiful swirl that isn’t chipped in any places. To make this day even better I might even find a sand dollar. A whole one! That’s a pearly white color.\r\n\r\nThis would qualify to be a perfectly awesome summer day.', 3, 0, '2019-06-21 06:36:23'),
(20, 'addd', '156151916729920.png', '<p>khaiasasasd</p>', 1, 1, '2019-06-21 06:33:17'),
(21, 'e', '156039253777643.png', 'aaaaa', 1, 0, '2019-06-20 09:34:21'),
(23, 'dddd', '156047583430343.png', '\r\ndddddd</p>', 1, 0, '2019-06-21 02:01:34'),
(32, 'asdasdasdasd', '156143353465680.png', '<p>asdasdasdasd</p>', 5, 0, '2019-06-25 03:32:14'),
(33, 'One piece magazine', '156143355277894.png', '<p>asdasdasd</p>', 18, 0, '2019-06-25 03:32:32'),
(34, 'asdasd', '156143360397112.png', '<p>12123123123</p>', 6, 0, '2019-06-25 03:33:23'),
(35, 'Dynamically Populate jQuery DataTable with JSON data on AJAX request', '156144617031088.png', ' <p>test</p>', 6, 0, '2019-06-25 06:32:44'),
(36, 'qweqw', '156144636525904.png', ' <p>qwqw</p>', 4, 0, '2019-06-25 07:03:05'),
(37, 'One piece magazine', '156144619529876.png', '<p>asdasd</p>', 1, 0, '2019-06-25 07:03:15'),
(38, 'One piece magazine', '156144621144022.png', '<p>asdasdasdasdsad</p>', 4, 1, '2019-06-25 07:03:31'),
(42, 'hello weatherasdasdasd !', '156144731462341.png', '<p>asdasdasdasdasdasd</p>', 1, 1, '2019-06-25 07:21:54'),
(45, 'asdasd', '156144872240741.png', '<p>1111111</p>', 17, 0, '2019-06-25 07:45:22'),
(46, 'hello weatherddd !', '156145008979235.png', '<p>asdasdsa</p>', 1, 0, '2019-06-25 08:08:09'),
(47, '2', '156145019616015.png', '<p>asdasdasd</p>', 1, 1, '2019-06-25 08:09:56'),
(48, '1', '156145060372100.png', '<p>asdasdasdasdasd</p>', 1, 1, '2019-06-25 08:16:43'),
(57, 'One piece magazine', '156151666526626.png', '<p>asdasdasd</p>', 3, 1, '2019-06-26 02:37:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `bio` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `hometown` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstname`, `age`, `bio`, `phonenumber`, `gender`, `birthday`, `hometown`, `photo`, `role`) VALUES
(1, 'khai@gmail.com', '123', 'khai123', 19, 'An artist of considerable range, Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. An artist of considerable range.  Show more ', '0332015888', 'male', '1998', 'Da Nang', '156152512686568.png', 0),
(3, 'chin@gmail.com', '123', 'conannnn', 0, ' asdasd', '0934806632', 'male', '2000', '', 'chin.jpg\r\n', 0),
(4, 'kieutrinhpham27@gmail.com', '3333', 'luffydd', 0, '', '01111111', 'male', '1998', 'Da Nang', '156142970474186.png', 0),
(6, 'user@gmail.com', '123', 'iron man', 0, '', '01233211234', 'male', '1998', 'Japan', '156143823466834.png', 0),
(8, 'admin@gmail.com', '123', 'admin', 0, 'admin@gmail.com ', '0111111111', 'male', '2000', 'Japan', '', 1),
(17, 'com@gmail.com', '123', 'khai', 0, '', '01111111', 'male', 'null', 'null', '156151283046139.png', 0),
(18, 'assd', 'aa', 'asdas', 0, ' asdasdasasdasdasdasd', '', '', '', '', '', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;
--
-- AUTO_INCREMENT cho bảng `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1302;
--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
