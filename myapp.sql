-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-04-02 19:02:28
-- サーバのバージョン： 10.4.27-MariaDB
-- PHP のバージョン: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `myapp`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `datetimes`
--

CREATE TABLE `datetimes` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `category_name` varchar(10) DEFAULT NULL,
  `hall_name` varchar(255) NOT NULL,
  `place_name` varchar(10) DEFAULT NULL,
  `img_name` varchar(100) DEFAULT NULL,
  `img_path` varchar(100) DEFAULT NULL,
  `location_details` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `info` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `events`
--

INSERT INTO `events` (`id`, `category_name`, `hall_name`, `place_name`, `img_name`, `img_path`, `location_details`, `name`, `price`, `datetime`, `info`, `created_at`, `updated_at`) VALUES
(42, 'ライブ', '吹雪通り', '北海道', '20230323030904ライブを動画撮影.jpg', 'storage/images/20230323030904ライブを動画撮影.jpg', '小樽３丁目2--5', 'King of Live', 20000, '2023-04-11 14:28:00', '白熱しせしゴールデン劇場。', '2023-03-21 04:37:17', '2023-04-02 05:28:33'),
(43, 'ライブ', '神崎シティホール', '千葉県', '20230322103238紙吹雪.jpg', 'storage/images/20230322103238紙吹雪.jpg', '千葉市美浜区中瀬 2-1', '絢爛！桜吹雪フェス！！', 1580, '2023-04-02 13:24:58', '今年もこのフェスが熱い！！豪華アーティストが送る豪華絢爛な音楽フェスティバル！！', '2023-03-21 05:19:47', '2023-03-31 04:30:21'),
(45, 'ライブ', '吹雪通り', '北海道', '20230322103623牛狩りカーニバル.jpg', 'storage/images/20230322103623牛狩りカーニバル.jpg', '小樽３丁目2--5', '牛王', 19800, '2023-04-02 13:24:58', 'われらが牛王の誕生なりし', '2023-03-22 10:36:23', '2023-03-31 04:30:37'),
(47, 'ライブ', '神崎シティホール', '神奈川県', '20230324061816ピンクのお婆ちゃん.jpg', 'storage/images/20230324061816ピンクのお婆ちゃん.jpg', '川崎市高津区久本3丁目1-5 ミュージション溝の口B1F', 'ピンクディ', 15000, '2023-04-02 13:24:58', '何でもかんでもピンク尽くし', '2023-03-24 06:18:16', '2023-03-30 11:00:45'),
(48, 'ライブ', 'コトブキシティ', '神奈川県', '20230330105328カラフルアニメ.jpg', 'storage/images/20230330105328カラフルアニメ.jpg', '千葉市美浜区中瀬 2-1', 'ぽーるハットン展覧会', 1000, '2023-04-02 13:24:58', 'イラストレーターぽーるハットンのイラスト傑作集をこの春', '2023-03-30 10:53:28', '2023-03-31 04:09:13'),
(50, 'アニメ', 'キッサキシティ', '東京都', '20230331091458熊カフェ.jpg', 'storage/images/20230331091458熊カフェ.jpg', '渋谷区神宮前4-25-28 2F', '熊カフェ', 2300, '2023-04-02 13:24:58', '大人気アニメ「くまくまっと」のコラボカフェ登場。', '2023-03-31 09:14:58', '2023-03-31 09:14:58'),
(51, '展示', 'ベルサール新宿グランド', '東京都', '20230331102007漫画困った顔の男性.jpg', 'storage/images/20230331102007漫画困った顔の男性.jpg', '東京都新宿区西新宿8-17-3 住友不動産新宿グランドタワー1F', '緒方信一郎原画展', 3000, '2023-04-02 13:24:58', '表情の魔術師：緒方信一郎の世界へようこそ', '2023-03-31 10:20:07', '2023-03-31 10:20:07'),
(52, 'ライブ', '後楽園ホール', '東京都', '20230402043302イエローライブ.jpg', 'storage/images/20230402043302イエローライブ.jpg', '文京区後楽1-3-61', 'イエローライブ', 18000, '2023-04-08 13:30:00', '爽快感で売りの沖縄出身のロックバンド「yellOWL」のコンサートツアーついに初後楽園ライブ開幕！！', '2023-04-02 04:33:02', '2023-04-02 04:33:02');

-- --------------------------------------------------------

--
-- テーブルの構造 `event_category`
--

CREATE TABLE `event_category` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `event_category`
--

INSERT INTO `event_category` (`id`, `name`) VALUES
(1, 'ライブ'),
(2, 'マンガ'),
(3, 'アニメ'),
(4, '演劇'),
(5, '展示');

-- --------------------------------------------------------

--
-- テーブルの構造 `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2019_05_03_000001_create_customer_columns', 2),
(6, '2019_05_03_000002_create_subscriptions_table', 2),
(7, '2019_05_03_000003_create_subscription_items_table', 2);

-- --------------------------------------------------------

--
-- テーブルの構造 `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `place`
--

CREATE TABLE `place` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `kana` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `place`
--

INSERT INTO `place` (`id`, `name`, `kana`) VALUES
(1, '北海道', 'ホッカイドウ'),
(2, '青森県', 'アオモリケン'),
(3, '岩手県', 'イワテケン'),
(4, '宮城県', 'ミヤギケン'),
(5, '秋田県', 'アキタケン'),
(6, '山形県', 'ヤマガタケン'),
(7, '福島県', 'フクシマケン'),
(8, '茨城県', 'イバラキケン'),
(9, '栃木県', 'トチギケン'),
(10, '群馬県', 'グンマケン'),
(11, '埼玉県', 'サイタマケン'),
(12, '千葉県', 'チバケン'),
(13, '東京都', 'トウキョウト'),
(14, '神奈川県', 'カナガワケン'),
(15, '新潟県', 'ニイガタケン'),
(16, '富山県', 'トヤマケン'),
(17, '石川県', 'イシカワケン'),
(18, '福井県', 'フクイケン'),
(19, '山梨県', 'ヤマナシケン'),
(20, '長野県', 'ナガノケン'),
(21, '岐阜県', 'ギフケン'),
(22, '静岡県', 'シズオカケン'),
(23, '愛知県', 'アイチケン'),
(24, '三重県', 'ミエケン'),
(25, '滋賀県', 'シガケン'),
(26, '京都府', 'キョウトフ'),
(27, '大阪府', 'オオサカフ'),
(28, '兵庫県', 'ヒョウゴケン'),
(29, '奈良県', 'ナラケン'),
(30, '和歌山県', 'ワカヤマケン'),
(31, '鳥取県', 'トットリケン'),
(32, '島根県', 'シマネケン'),
(33, '岡山県', 'オカヤマケン'),
(34, '広島県', 'ヒロシマケン'),
(35, '山口県', 'ヤマグチケン'),
(36, '徳島県', 'トクシマケン'),
(37, '香川県', 'カガワケン'),
(38, '愛媛県', 'エヒメケン'),
(39, '高知県', 'コウチケン'),
(40, '福岡県', 'フクオカケン'),
(41, '佐賀県', 'サガケン'),
(42, '長崎県', 'ナガサキケン'),
(43, '熊本県', 'クマモトケン'),
(44, '大分県', 'オオイタケン'),
(45, '宮崎県', 'ミヤザキケン'),
(46, '鹿児島県', 'カゴシマケン'),
(47, '沖縄県', 'オキナワケン');

-- --------------------------------------------------------

--
-- テーブルの構造 `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `event_id`, `created_at`, `updated_at`) VALUES
(11, 1, 42, '2023-03-26 05:36:35', '2023-03-26 05:36:35'),
(14, 1, 43, '2023-03-26 09:14:11', '2023-03-26 09:14:11'),
(27, 1, 48, '2023-03-30 11:23:59', '2023-03-30 11:23:59'),
(28, 1, 48, '2023-03-31 04:50:25', '2023-03-31 04:50:25'),
(31, 2, 42, '2023-04-02 09:23:12', '2023-04-02 09:23:12');

-- --------------------------------------------------------

--
-- テーブルの構造 `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `stripe_id` varchar(255) NOT NULL,
  `stripe_status` varchar(255) NOT NULL,
  `stripe_price` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(255) NOT NULL,
  `stripe_product` varchar(255) NOT NULL,
  `stripe_price` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `stripe_id` varchar(255) DEFAULT NULL,
  `pm_type` varchar(255) DEFAULT NULL,
  `pm_last_four` varchar(4) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`, `stripe_id`, `pm_type`, `pm_last_four`, `trial_ends_at`) VALUES
(1, '管理人', 'alcade@gmail.com', NULL, '$2y$10$aYw5aiL49wSG0rd9EXDU5u7p2H5KzpUJrop7uxEuROxTA7FNFSATq', NULL, 1, '2023-03-13 20:51:22', '2023-04-02 01:01:28', NULL, NULL, NULL, NULL),
(2, '一般ユーザー', 'test@gmail.com', NULL, '$2y$10$2xXLJd1BD3BkjN9qYFtUfuEaiWH8Dfr8hUYscyqa/DDwOYGfqQ5kO', NULL, 0, '2023-03-25 22:43:51', '2023-03-25 22:43:51', NULL, NULL, NULL, NULL);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `datetimes`
--
ALTER TABLE `datetimes`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `event_category`
--
ALTER TABLE `event_category`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- テーブルのインデックス `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- テーブルのインデックス `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- テーブルのインデックス `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_stripe_id_unique` (`stripe_id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- テーブルのインデックス `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_subscription_id_stripe_price_unique` (`subscription_id`,`stripe_price`),
  ADD UNIQUE KEY `subscription_items_stripe_id_unique` (`stripe_id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `datetimes`
--
ALTER TABLE `datetimes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- テーブルの AUTO_INCREMENT `event_category`
--
ALTER TABLE `event_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- テーブルの AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- テーブルの AUTO_INCREMENT `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `place`
--
ALTER TABLE `place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- テーブルの AUTO_INCREMENT `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- テーブルの AUTO_INCREMENT `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
