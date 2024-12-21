-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-12-13 14:52:45
-- 伺服器版本： 10.4.28-MariaDB
-- PHP 版本： 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `wpdb`
--

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT '使用者id',
  `username` varchar(30) NOT NULL COMMENT '登⼊帳號',
  `password` varchar(100) NOT NULL COMMENT '使用者密碼',
  `name` varchar(30) NOT NULL COMMENT '名字'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`) VALUES
(4, 'wep', '202cb962ac59075b964b07152d234b70', 'hank'),
(5, 'amy', '7771fbb20af6ef10827c593daa3aff7b', 'amy');

-- --------------------------------------------------------

--
-- 資料表結構 `works`
--

CREATE TABLE `works` (
  `id` int(11) NOT NULL COMMENT '作品 id',
  `title` text NOT NULL COMMENT '標題',
  `intro` text NOT NULL COMMENT '簡介',
  `content` text NOT NULL COMMENT '內文',
  `travel_tips1` text NOT NULL,
  `travel_tips2` text NOT NULL,
  `image_path` text DEFAULT NULL COMMENT '圖⽚路徑',
  `image_path_s1` text DEFAULT NULL COMMENT '小圖一',
  `image_path_s2` text DEFAULT NULL COMMENT '小圖二',
  `publish` tinyint(1) NOT NULL COMMENT '是否發布',
  `upload_date` datetime NOT NULL COMMENT '上傳時間',
  `create_user_id` int(11) NOT NULL COMMENT '誰上傳的(建⽴立者id)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `works`
--

INSERT INTO `works` (`id`, `title`, `intro`, `content`, `travel_tips1`, `travel_tips2`, `image_path`, `image_path_s1`, `image_path_s2`, `publish`, `upload_date`, `create_user_id`) VALUES
(20, 'Chaishan Coastline Sea Cave', 'Gushan, Kaohsiung', 'The Chaishan Coastline Sea Cave, also known as the Mystic Bay, is a limestone cave with rocky shore and coral reefs rocks. On the left side of the cave, there is a small entrance. Upon walking through, you will find a small bay where you can sit, listen to the sea, and enjoy the coastal scenery. Featuring a spectacular sea view, it is one of the must-visit scenic spots for tourists. The limestone cave is a 5-minute walk from the trail in front of the Ocean Corner Café. ', 'Since the cave is facing the west, if you come during the evening, the photo might be in a strong backlight. It is recommended to turn the flash on to balance the lighting or use the HDR function. Taking a silhouette photo during the sunset is also a great option.', 'The limestone cave is a 5-minute walk from the trail in front of the Ocean Corner Café. You have to climb through a fence and down the rocks to get to your destination. Watch your steps. \r\nWarning: Due to possible tidal changes, it is important to pay attention to your safety!', 'files/images/Sizihwan_1.jpg', 'files/images/Sizihwan_2.jpg', 'files/images/Sizihwan_3.jpg', 1, '2023-12-11 09:42:30', 5),
(21, 'Oshino Hakkai', 'Oshino, Japan', 'Oshino Hakkai is a popular scenic area located between the southeast side of Lake Kawaguchi and Lake Yamanaka. Its name originates from eight ponds formed by the melted snow water from Mount Fuji, emerging in the village of Oshino. You will find many restaurants, souvenir shops, and food vendors around the ponds that sell vegetables, sweets, pickles, crafts, and other local products. Some operate small outdoor grills to attract shoppers with the alluring smells of roasted sweet potato and toasted rice crackers.', 'Note that &quot;Bottomless Pond&quot; is located on private property and requires an additional fee.', '&quot;Outlet Pond&quot; is situated on the farthest side, and it takes approximately an extra 15 minutes of walking to reach.', 'files/images/Oshino_1.jpg', 'files/images/Oshino_2.jpg', 'files/images/Oshino_3.jpg', 1, '2023-12-11 09:47:47', 5),
(22, 'Balboa Park', 'San Diego, USA', '&lt;p&gt;In addition to the open space areas, natural vegetation zones, botanical gardens, and walking paths, it contains museums, and several theatres.&lt;/p&gt;&lt;p&gt;There are also various recreational facilities, gift shops, and restaurants within the boundaries of the park.&lt;/p&gt;', '&lt;p&gt;Some spots may require tickets but mostly are free.&lt;/p&gt;', 'There are free tram service within the park that comes every 15 minutes.', 'files/images/balboa_1.jpg', 'files/images/balboa_2.jpg', 'files/images/balboa_3.jpg', 1, '2023-12-11 09:49:57', 5),
(23, 'Wudalianchi Scenic Area', 'Wudalianchi, China', '&lt;p&gt;This area is dotted with multiple volcanic structures, forming a unique and spectacular volcanic landscape. Throughout the scenic area, you can find extensive lava formations in various shapes, such as rope-like, spiral, and log-like.&lt;/p&gt;&lt;p&gt;You can also observe the geological remnants of the eruption tens of thousands of years ago. Walking on the wooden boardwalk, you&#039;ll be surrounded by a dark stone sea, and you may encounter many stone columns formed by volcanic eruptions and earthquakes.&lt;/p&gt;', '&lt;p&gt;Each attraction within the scenic area has separate ticket sales and different opening hours, typically between 7:30 AM and 5:30 PM.&lt;/p&gt;', '&lt;p&gt;The shuttle service to the scenic area has limited departures. It is advisable to inquire and book tickets in advance. (Station phone: 0451-87533411)&lt;/p&gt;', 'files/images/Wudalianchi_1.jpg', 'files/images/Wudalianchi_2.jpg', 'files/images/Wudalianchi_3.jpg', 1, '2023-12-11 09:51:01', 5),
(24, 'Peace Memorial Park', 'Itoman, Japan', '&lt;p&gt;The Peace Memorial Park is located on the hills in the southern part of the main island, facing the sea to the south. On the southeast side, there is a high platform that offers a panoramic view of the rugged and beautiful coastline.&amp;nbsp;&lt;/p&gt;&lt;p&gt;It is a well-laid-out park with both great WWII history, memorials, and the cemetery with a general community park, play area, and good parking.&lt;/p&gt;', '&lt;p&gt;There are free audio services that come in many different languages such as Japanese, English, Chinese, Korean, and Spanish. With the audio guide, tourists can better dive into the history.&lt;/p&gt;', 'Special events are held throughout the year, it is advised to check the official website before you visit. ', 'files/images/Okinawa_1.jpg', 'files/images/Okinawa_2.jpg', 'files/images/Okinawa_3.jpg', 1, '2023-12-11 09:52:39', 5),
(25, 'The Gardens of Versailles', 'Versailles, France', '&lt;p&gt;The gardens of Versailles are landscaped in the classic French formal garden style, characterised by extensive symmetrical designs. It is some of the largest and most spectacular in the world that contains 372 statues, 55 water features, 600 fountains, and over 20 miles of water pipes.&amp;nbsp;&lt;/p&gt;&lt;p&gt;In addition to the meticulously manicured lawns, parterres, and sculptures are the fountains, which are located throughout the garden.&amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;', '&lt;p&gt;Admission is usually free, but during weekends from April to October and on certain special days (details available on the official website), there is a €9.5 entrance fee due to the presence of the Musical Fountains Show in the garden.&lt;/p&gt;', 'The Apollo fountain is one of the must-see in the garden which is a creation from the era of Louis XIV. There is a 1:1 authorised replica at the Chimei Museum in Tainan.', 'files/images/france_1.jpg', 'files/images/france_2.jpg', 'files/images/france_3.jpg', 1, '2023-12-11 09:55:11', 5),
(26, 'River Cam', 'Cambridge, England', 'The River Cam flows through Cambridge and it offers breathtaking scenery for all who decide to float along. The river is steeped in history and indeed is the lifeline of the city of Cambridge. There are lots of bridges along the way and the Mathematical Bridge is definitely one of the most famous. It is constructed with straight timbers which gives it a very unusual strength.', 'Punting is a popular type of boating and the best way to take a look at the surroundings.', 'Some colleges are not open to tourists, do not effect the residents.', 'files/images/cam_1.jpg', 'files/images/cam_2.jpg', 'files/images/cam_3.jpg', 1, '2023-12-11 10:00:59', 5),
(27, 'Kaohsiung Original Botanical Garden', 'Kaohsiung, Taiwan', 'Head over to the eco-lake for a relaxing introduction to the site. Across the spacious landscape sits the freshwater forest and wetland rainforest with a magnificent view offered during the walk. The fresh-felt scent wafting in the warm breezes will remind you of a dream paradise. You can even settle in for a spot for bird watching. The plants, fish, and birds that habituate eco lake add to the charm of the area.', 'Remember to bring water with you when you pay a visit.', 'It is suggested to spend about 1-2 hours for your visit.', 'files/images/pool_1.jpg', 'files/images/pool_2.jpg', 'files/images/pool_3.jpg', 1, '2023-12-11 10:07:18', 5),
(28, 'Yuguang island', 'Tainan, Taiwan ', 'When it comes to sunset, Yuguang Island is the first place that comes to mind for those visiting Tainan. Aside from the beaches, seawater, sunsets, and forests, you will discover a row of windbreak forests with a wooden trail constructed in between. After rain, the forest area will display some beautiful reflections in the water. Visiting in March reveals the blooming orchid blossoms, adding vibrant colours to the island. The pink flowers covering the trees make the island even more picturesque.', 'The only way to get on the island is through the bridge. However there may be motor vehicle control, it is recommended to visit by bus or bike.', 'Remember to bring some extra clothings to enjoy the water. ', 'files/images/IMG_3611.jpg', 'files/images/IMG_3175.jpg', 'files/images/IMG_9952.jpg', 1, '2023-12-11 10:10:53', 5),
(29, 'Kaohsiung Original Botanical Garden', 'Kaohsiung Original Botanical Garden', '&lt;p&gt;Looking for a scenic spot? Head over to the mixed forest area which is surrounded by lush greenery. Stroll amongst towering trees for an awe-inspiring sight. There are natural tree tunnels created by the branches stretching out from both sides. It is best enjoyed in the afternoon since it provides a great escape from the blazing sun. You can also find people having their time taking a picnic in the woods.&lt;/p&gt;', '&lt;p&gt;Recommended travel routes: Coral reef area → Mixed forest area → Ecological pool → Subtropical Zone Area → Forest area&lt;/p&gt;', '&lt;p&gt;Public Transport by Kaohsiung Metro: Ecological District Station Exit 1 and walk for 10 min&lt;/p&gt;', 'files/images/mixedforest_1.jpg', 'files/images/mixedforest_2.jpg', 'files/images/mixedforest_3.jpg', 1, '2023-12-11 11:06:53', 4);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '使用者id', AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `works`
--
ALTER TABLE `works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '作品 id', AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
