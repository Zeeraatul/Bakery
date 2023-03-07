-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               8.0.19 - MySQL Community Server - GPL
-- Операционная система:         Win64
-- HeidiSQL Версия:              11.0.0.5958
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных mydb
CREATE DATABASE IF NOT EXISTS `mydb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `mydb`;

-- Дамп структуры для таблица mydb.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `Id` int unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(16) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `imgSrc` varchar(128) NOT NULL DEFAULT '/static/img/categories/category.png',
  `imgAlt` varchar(128) DEFAULT NULL,
  `countPosts` int unsigned NOT NULL DEFAULT '0',
  `slug` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `category` (`category`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы mydb.categories: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`Id`, `category`, `description`, `imgSrc`, `imgAlt`, `countPosts`, `slug`) VALUES
	(1, 'Новости', 'Оперативная информация, которая представляет политический, социальный или экономический интерес для аудитории в своей свежести, то есть сообщения о событиях, произошедших недавно или происходящих в данный момент.', '/static/img/categories/newspaper.png', 'Новости', 0, 'news'),
	(2, 'Наши сотрудники', 'Наши повара — очень творческая и интересная для тех профессия, они любит угощать других вкусными блюдами и придумывать новые миксы и вкусы.', '/static/img/categories/cooking.png', 'Повар - Наши сотрудники', 0, 'employees'),
	(3, 'Меню', 'Меню — это не просто инструмент продаж, каталог наших кулинарных идей или способ предложить их клиентам', '/static/img/categories/menu.png', 'Меню', 0, 'menu');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Дамп структуры для таблица mydb.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `Id` int unsigned NOT NULL AUTO_INCREMENT,
  `postId` int unsigned NOT NULL,
  `dateOfCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `comment` varchar(1024) NOT NULL,
  `avatar` varchar(128) NOT NULL DEFAULT '/static/img/avatars/avatar.png',
  `login` varchar(16) NOT NULL,
  `email` varchar(128) NOT NULL,
  `verified` tinyint DEFAULT '0',
  `clientIp` varchar(15) NOT NULL,
  `isReview` tinyint DEFAULT '0',
  `commentId` int unsigned DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `postId` (`postId`),
  KEY `commentId` (`commentId`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`postId`) REFERENCES `posts` (`Id`),
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`commentId`) REFERENCES `comments` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы mydb.comments: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`Id`, `postId`, `dateOfCreated`, `comment`, `avatar`, `login`, `email`, `verified`, `clientIp`, `isReview`, `commentId`) VALUES
	(1, 1, '2023-01-31 20:07:25', 'Толковый специалист. Но со специями перебарщивает', '/static/img/avatars/avatar.png', 'alex', 'alex@gmail.com', 1, '127.0.0.1', 0, NULL),
	(2, 1, '2023-01-31 20:07:25', 'Блюда просто обьеденье', '/static/img/avatars/avatar.png', 'max', 'max@gmail.com', 1, '127.0.0.1', 0, NULL),
	(3, 1, '2023-01-31 20:07:25', 'Можно было б приготовить и лучше.', '/static/img/avatars/avatar.png', 'olga', 'olga@gmail.com', 1, '127.0.0.1', 0, NULL),
	(4, 1, '2023-01-31 20:07:25', 'Не гони чудила. Все ништяк', '/static/img/avatars/avatar.png', 'serg', 'serg@gmail.com', 1, '127.0.0.1', 0, 3),
	(5, 1, '2023-01-31 20:07:25', 'Молчи плебей. Тебе и картошка нечищенная за радость пойдет', '/static/img/avatars/avatar.png', 'olga', 'olga@gmail.com', 1, '127.0.0.1', 0, 4),
	(6, 1, '2023-01-31 20:07:25', 'Ну ты и ольга', '/static/img/avatars/avatar.png', 'pedro', 'pedro@gmail.com', 1, '127.0.0.1', 0, 5);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Дамп структуры для таблица mydb.messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `fio` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `subject` varchar(128) NOT NULL,
  `message` varchar(1024) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы mydb.messages: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` (`id`, `fio`, `email`, `subject`, `message`, `status`) VALUES
	(1, 'Hjvfy', 'enailsd@asdhas.com', 'Тема пииисьма', 'asdfasdas', 0);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;

-- Дамп структуры для таблица mydb.navigate
CREATE TABLE IF NOT EXISTS `navigate` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `href` varchar(128) NOT NULL,
  `order` int unsigned NOT NULL,
  `parent_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  CONSTRAINT `navigate_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `navigate` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы mydb.navigate: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `navigate` DISABLE KEYS */;
INSERT INTO `navigate` (`id`, `title`, `href`, `order`, `parent_id`) VALUES
	(1, 'Главная', '/', 1, NULL),
	(2, 'Меню и Цены', '/blog', 2, NULL),
	(3, 'Повара', '/news', 3, NULL),
	(4, 'О Нас', '/about/index', 4, NULL),
	(5, 'Связаться с нами', '/about/contactus', 1, 4);
/*!40000 ALTER TABLE `navigate` ENABLE KEYS */;

-- Дамп структуры для таблица mydb.options
CREATE TABLE IF NOT EXISTS `options` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `value` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `group` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы mydb.options: ~11 rows (приблизительно)
/*!40000 ALTER TABLE `options` DISABLE KEYS */;
INSERT INTO `options` (`id`, `name`, `value`, `group`) VALUES
	(1, 'lang', 'ru', NULL),
	(2, 'title', 'Булочная', NULL),
	(3, 'description', 'У Нас самые лучшие булочки', NULL),
	(4, 'logo', 'static/img/logo.png', NULL),
	(5, 'facebook', '<a class="btn btn-lg btn-primary btn-lg-square border-inner rounded-0 me-2" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>', 'social_links'),
	(6, 'linkedin', '<a class="btn btn-lg btn-primary btn-lg-square border-inner rounded-0 me-2" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>', 'social_links'),
	(7, 'email', 'cakeZone@gmail.com', 'contact_info'),
	(8, 'phone', '+3 8 (063) 25-25-68', 'contact_info'),
	(9, 'address', 'г. Полтава ул. Октябрьская 58/7', 'contact_info'),
	(10, 'twitter', '<a class="btn btn-lg btn-primary btn-lg-square border-inner rounded-0 me-2" href="#"><i class="fab fa-twitter fw-normal"></i></a>', 'social_links'),
	(11, 'author', 'Roman', NULL);
/*!40000 ALTER TABLE `options` ENABLE KEYS */;

-- Дамп структуры для таблица mydb.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `Id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `slogan` varchar(256) NOT NULL,
  `imgSrc` varchar(128) NOT NULL DEFAULT '/static/img/posts/post.png',
  `imgAlt` varchar(64) DEFAULT NULL,
  `content` text,
  `categoryId` int unsigned NOT NULL,
  `slug` varchar(256) NOT NULL,
  `dateOfCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `dateOfPublished` datetime DEFAULT NULL,
  `countComments` int unsigned NOT NULL DEFAULT '0',
  `state` enum('created','published','archived') DEFAULT 'created',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `categoryId` (`categoryId`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы mydb.posts: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`Id`, `title`, `slogan`, `imgSrc`, `imgAlt`, `content`, `categoryId`, `slug`, `dateOfCreated`, `dateOfPublished`, `countComments`, `state`) VALUES
	(1, 'Евгений Клопотенко', 'Кулинарные рецепты и авторская кухня от Евгения Клопотенко. Блог простых и уникальных рецептов от кулинарного эксперта', '/static/img/posts/team-1.jpg', NULL, '<p>Український ресторатор, кулінарний блогер. Здобув популярність завдяки перемозі у шоу МастерШеф (2015), після чого став ведучим та експертом у Все буде смачно (СТБ), Енеїда (UA: перший). Засновник онлайн-курсу Міркувати, як кухар</p>\r\n<p>Вивчав міжнародні відносини в Київському університеті туризму, економіки і права, фах кулінара вдосконалював у французькій школі Le Cordon Blue. 2011 року заснував Гастромайcтерню Confiture, 2016 – започаткував проект CultFood, що опікується реформою шкільних їдалень. Викладач Коледжу ресторанного бізнесу, співвласник ресторану Сто років тому вперед.</p>\r\n<p>Нові погляди на приготування їжі засвоїв під час поїздок за кордон в юному віці. Студентом працював у McDonald’s в Німеччині, кухарем в США. Цей досвід спонукав його прокласти свій шлях в кулінарному мистецтві.</p>', 2, 'klopotenko', '2023-01-31 20:00:03', '2023-01-29 20:00:03', 5, 'published'),
	(2, 'Эктор Измаэль Хименес-Браво', 'Канадский и украинский шеф-повар колумбийского происхождения, бизнесмен, телеведущий. Судья проекта «МастерШеф Украина»', '/static/img/posts/team-2.jpg', NULL, '<p>Український ресторатор, кулінарний блогер. Здобув популярність завдяки перемозі у шоу МастерШеф (2015), після чого став ведучим та експертом у Все буде смачно (СТБ), Енеїда (UA: перший). Засновник онлайн-курсу Міркувати, як кухар</p>\r\n<p>Вивчав міжнародні відносини в Київському університеті туризму, економіки і права, фах кулінара вдосконалював у французькій школі Le Cordon Blue. 2011 року заснував Гастромайcтерню Confiture, 2016 – започаткував проект CultFood, що опікується реформою шкільних їдалень. Викладач Коледжу ресторанного бізнесу, співвласник ресторану Сто років тому вперед.</p>\r\n<p>Нові погляди на приготування їжі засвоїв під час поїздок за кордон в юному віці. Студентом працював у McDonald’s в Німеччині, кухарем в США. Цей досвід спонукав його прокласти свій шлях в кулінарному мистецтві.</p>', 2, 'IsmaelBravo ', '2023-01-31 20:01:58', '2023-01-30 20:00:03', 0, 'published'),
	(3, 'Александра Шэф', 'Просто отличная тетька и превосходный повар', '/static/img/posts/team-3.jpg', NULL, '<p>Український ресторатор, кулінарний блогер. Здобув популярність завдяки перемозі у шоу МастерШеф (2015), після чого став ведучим та експертом у Все буде смачно (СТБ), Енеїда (UA: перший). Засновник онлайн-курсу Міркувати, як кухар</p>\r\n<p>Вивчав міжнародні відносини в Київському університеті туризму, економіки і права, фах кулінара вдосконалював у французькій школі Le Cordon Blue. 2011 року заснував Гастромайcтерню Confiture, 2016 – започаткував проект CultFood, що опікується реформою шкільних їдалень. Викладач Коледжу ресторанного бізнесу, співвласник ресторану Сто років тому вперед.</p>\r\n<p>Нові погляди на приготування їжі засвоїв під час поїздок за кордон в юному віці. Студентом працював у McDonald’s в Німеччині, кухарем в США. Цей досвід спонукав його прокласти свій шлях в кулінарному мистецтві.</p>', 2, 'alexaSheff', '2023-01-31 20:01:58', '2023-01-31 20:00:03', 0, 'published');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Дамп структуры для таблица mydb.posttags
CREATE TABLE IF NOT EXISTS `posttags` (
  `Id` int unsigned NOT NULL AUTO_INCREMENT,
  `postId` int unsigned NOT NULL,
  `tagId` int unsigned NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `postId` (`postId`),
  KEY `tagId` (`tagId`),
  CONSTRAINT `posttags_ibfk_1` FOREIGN KEY (`postId`) REFERENCES `posts` (`Id`),
  CONSTRAINT `posttags_ibfk_2` FOREIGN KEY (`tagId`) REFERENCES `tags` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы mydb.posttags: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `posttags` DISABLE KEYS */;
INSERT INTO `posttags` (`Id`, `postId`, `tagId`) VALUES
	(1, 1, 1),
	(2, 2, 1),
	(3, 3, 1),
	(4, 1, 2),
	(5, 2, 3),
	(9, 2, 4);
/*!40000 ALTER TABLE `posttags` ENABLE KEYS */;

-- Дамп структуры для таблица mydb.tags
CREATE TABLE IF NOT EXISTS `tags` (
  `Id` int unsigned NOT NULL AUTO_INCREMENT,
  `tag` varchar(16) NOT NULL,
  `countPosts` int unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `tag` (`tag`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы mydb.tags: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` (`Id`, `tag`, `countPosts`) VALUES
	(1, 'Сотрудник', 3),
	(2, 'Кексики', 1),
	(3, 'Тортики', 1),
	(4, 'Пироги', 2);
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;

-- Дамп структуры для таблица mydb.users
CREATE TABLE IF NOT EXISTS `users` (
  `Id` int unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(16) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role` enum('admin','reader','editor') NOT NULL DEFAULT 'reader',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы mydb.users: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`Id`, `login`, `email`, `password`, `role`) VALUES
	(1, 'admin', 'admin@admin.com', '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5', 'admin');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Дамп структуры для триггер mydb.triggerPostTagsAfterInsert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `triggerPostTagsAfterInsert` AFTER INSERT ON `posttags` FOR EACH ROW UPDATE tags SET tags.countPosts = tags.countPosts + 1 WHERE tags.Id = new.tagId//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
