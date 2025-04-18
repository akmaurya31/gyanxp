-- Adminer 5.0.6 MySQL 8.4.3 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `answers`;
CREATE TABLE `answers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `quiz_id` int NOT NULL,
  `question_id` int NOT NULL,
  `selected_answer` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `answers` (`id`, `user_id`, `quiz_id`, `question_id`, `selected_answer`, `created_at`, `updated_at`) VALUES
(7,	1,	1,	9,	'C',	'2025-04-14 00:44:19',	'2025-04-15 07:27:20'),
(10,	1,	1,	3,	'C',	'2025-04-14 01:49:45',	'2025-04-14 04:25:15'),
(11,	1,	1,	2,	'C',	'2025-04-14 04:31:25',	'2025-04-14 06:22:54'),
(13,	7,	1,	3,	'B',	'2025-04-17 05:07:12',	'2025-04-18 02:19:25'),
(14,	7,	1,	2,	'D',	'2025-04-17 05:07:37',	'2025-04-18 02:19:23'),
(15,	7,	1,	9,	'A',	'2025-04-17 05:07:51',	'2025-04-18 02:19:29'),
(16,	7,	1,	1,	'',	'2025-04-17 05:29:33',	'2025-04-17 05:30:11'),
(17,	7,	1,	10,	'A',	'2025-04-17 23:58:45',	'2025-04-18 00:15:04'),
(18,	7,	7,	13,	'B',	'2025-04-18 02:40:14',	'2025-04-18 04:42:42'),
(19,	7,	7,	14,	'B',	'2025-04-18 02:40:26',	'2025-04-18 02:40:26');

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `heading` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `image` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `inserted_on` varchar(255) NOT NULL,
  `last_updated_on` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `meta_description` text CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `blogs` (`id`, `heading`, `short_description`, `description`, `status`, `image`, `position`, `inserted_on`, `last_updated_on`, `slug`, `keywords`, `meta_description`) VALUES
(11,	'A work culture of happiness',	'Happiness should not be a luxury or an afterthought—it should be accessible, measurable, and achievable for all.',	'<p>Ghibli AI refers to the use of artificial intelligence, especially tools like OpenAI’s ChatGPT and image generation models (such as GPT-4o), to create beautiful visuals inspired by Studio Ghibli’s famous animation style. Known for its vibrant colors, hand-drawn charm, and magical storytelling (like Spirited Away and My Neighbor Totoro), this art form is being reimagined by AI, gaining massive popularity since <strong>March </strong>2025.</p>\r\n',	'active',	'blog_image/blog_image.jpg',	'0',	'06-04-2025 07:02:19 PM',	'08-04-2025 18:13',	'a-work-culture-of-happiness',	'Is Ghibli AI Dangerous for Humans? Full Review by Boffin Web Technology (2025)',	'Ghibli AI transforms your photos into magical Studio Ghibli-style art. But is it safe for humans? Boffin Web Technology explores its uses, benefits, risks, and ethical concerns in 2025.');

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `enquiry_date` varchar(255) NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `courses`;
CREATE TABLE `courses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `course_name` varchar(255) NOT NULL,
  `course_duration` varchar(100) NOT NULL,
  `course_fees` varchar(255) NOT NULL,
  `course_syllabus` text,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `position` int DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `courses` (`id`, `course_name`, `course_duration`, `course_fees`, `course_syllabus`, `status`, `position`, `image`, `created_at`, `updated_at`) VALUES
(4,	'ADCA (Advanced Diploma in Computer Applications) 1',	'3 Months 1',	'1500 - 25001',	'<ul>\r\n <li>- MS Word1</li>\r\n <li>- MS Excel</li>\r\n <li>- MS PowerPoint1</li>\r\n <li>- MS Outlook</li>\r\n <li>- Internet Basics</li>\r\n</ul>\r\n',	'Active',	11,	'94453caaf49740a50213d4e63d39a706.PNG',	'2025-04-11 18:58:35',	'2025-04-16 16:51:47'),
(5,	'DFA (Diploma in Financial Accounting)',	'6 Months',	'4000-6000',	'<ul>\r\n <li>- Tally ERP 9 with GST</li>\r\n <li>- MS Excel (Advanced)</li>\r\n <li>- Income Tax Basics</li>\r\n <li>- Payroll Management</li>\r\n <li>- Financial Reporting</li>\r\n</ul>\r\n',	'Active',	2,	'34c3ec76c46547c762bb49212c01c450.jpg',	'2025-04-11 20:03:30',	'2025-04-11 20:03:30'),
(6,	'CCC (Course on Computer Concepts)',	'3 months',	'1000-3500',	'<ul>\r\n <li>- Introduction to Computers</li>\r\n <li>- Operating Systems</li>\r\n <li>- MS Office</li>\r\n <li>- Internet, Email</li>\r\n <li>- Digital Financial Tools</li>\r\n</ul>\r\n',	'Active',	3,	'6a1b0c26b3f0a0f4ec4485dd844dd99c.jpg',	'2025-04-11 20:04:36',	'2025-04-11 20:04:36'),
(7,	'Programming Languages (Python, Java, HTML, CSS, C, C++, SQL)',	'3 Months',	'1500-2500',	'<ul>\r\n <li>- Python: Variables, Loops, Functions, File Handling, OOP</li>\r\n <li>- Java: Syntax, OOP, Exception Handling, GUI</li>\r\n <li>- HTML & CSS: Web Page Designing, Styling</li>\r\n <li>- C/C++: Programming Fundamentals, Pointers, Functions</li>\r\n <li>- SQL: Database Queries, Joins, DDL/DML operations</li>\r\n</ul>\r\n',	'Active',	3,	'e9698a4447b58ae9df34a7581c833c0f.jpg',	'2025-04-11 20:05:41',	'2025-04-11 20:05:41');

DROP TABLE IF EXISTS `designations`;
CREATE TABLE `designations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` int NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `designations` (`id`, `name`, `status`, `createdOn`) VALUES
(2,	'IAS (Revenue Dapartment)',	0,	'2024-12-11 11:06:37'),
(3,	'Demo1',	0,	'2024-12-11 11:28:06'),
(4,	'Demo 2',	0,	'2024-12-11 11:28:13');

DROP TABLE IF EXISTS `enquiries`;
CREATE TABLE `enquiries` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `enquiries_type` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `enquiries` (`id`, `name`, `email`, `mobile`, `city`, `pincode`, `enquiries_type`, `message`, `createdOn`) VALUES
(1,	'a',	'',	'9876543211',	'gonda',	'271002',	'Legal',	'test enquery',	'2024-12-11 12:08:27');

DROP TABLE IF EXISTS `expertises`;
CREATE TABLE `expertises` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` int NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `expertises` (`id`, `name`, `status`, `createdOn`) VALUES
(3,	'Former Chief Secretary (Retd.), Govt. of Uttar Pradesh  Chairman, Atmik Happitude Foundation',	0,	'2024-12-11 11:27:49'),
(2,	'Counseling Psychologist & Happiness Coach',	0,	'2024-12-11 11:27:41'),
(4,	'Psychologist & Happiness Coach',	0,	'2024-12-11 11:27:57'),
(5,	'Leadership & Happiness Coach',	0,	'2025-04-07 10:45:26'),
(7,	'Counseling Psychologist & Happiness Coach',	0,	'2025-04-07 10:56:17'),
(8,	'Educationist',	0,	'2025-04-07 10:56:37'),
(9,	'Founding Director, Atmik Happitude Foundation <br>Entrepreneur | Brand Strategist | Human Potential Evangelist',	0,	'2025-04-07 11:15:38'),
(6,	'Former Trainer at Dept. of Happiness, Govt. of Madhya Pradesh',	0,	'2025-04-07 10:55:29');

DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quiz_id` int NOT NULL,
  `question_en` text NOT NULL,
  `question_hi` text NOT NULL,
  `option_a_en` text NOT NULL,
  `option_a_hi` text NOT NULL,
  `option_b_en` text NOT NULL,
  `option_b_hi` text NOT NULL,
  `option_c_en` text NOT NULL,
  `option_c_hi` text NOT NULL,
  `option_d_en` text NOT NULL,
  `option_d_hi` text NOT NULL,
  `correct_option` enum('A','B','C','D') NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `quiz_id` (`quiz_id`),
  CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `questions` (`id`, `quiz_id`, `question_en`, `question_hi`, `option_a_en`, `option_a_hi`, `option_b_en`, `option_b_hi`, `option_c_en`, `option_c_hi`, `option_d_en`, `option_d_hi`, `correct_option`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2,	1,	'<p>asdf</p>\r\n',	'<p>asdfa</p>\r\n',	'asdf',	'asdf',	'asdf',	'asdf',	'asdfa',	'sdfasdf',	'asd',	'fasdfasd',	'A',	'',	'2025-04-11 18:45:37',	'2025-04-11 18:45:37',	NULL),
(3,	1,	'<p>asdf1</p>\r\n',	'<p>asdfa11hin</p>\r\n',	'asdf223',	'asdf223',	'asdf223',	'asdf223',	'asdf223',	'sdfasdf',	'asdasfa4234',	'fasdfasd2342',	'B',	'',	'2025-04-11 18:46:34',	'2025-04-12 12:36:43',	NULL),
(4,	3,	'<p>asdf1dfsdfa</p>\r\n',	'<p>asdfa11</p>\r\n',	'asdf223',	'asdf223',	'asdf4',	'asdf4534',	'asdfafsa453',	'sdfasdf',	'asdasfa4234',	'fasdfasd2342',	'B',	'',	'2025-04-11 18:48:54',	'2025-04-11 18:48:54',	NULL),
(5,	4,	'<p>fsfgsdf</p>\r\n',	'<p>sdfgsdfg</p>\r\n',	'dsfgsd',	'sdfgs',	'dfgs',	'dfgsdf',	'ssdf',	'gsdfg',	'sdf',	'gsdfgs',	'B',	'',	'2025-04-11 20:18:22',	'2025-04-11 20:18:22',	NULL),
(6,	3,	'<p>asdf</p>\r\n',	'<p>asdfas</p>\r\n',	'dasd',	'fasd',	'sdfa',	'sdfasd',	'fasd',	'fasd',	'fasdf',	'asd',	'B',	'',	'2025-04-11 20:33:10',	'2025-04-11 20:33:10',	NULL),
(7,	3,	'<p>asdf</p>\r\n',	'<p>asdfasd</p>\r\n',	'asdf',	'asd',	'adfa',	'dfa',	'fsdfa',	'sdfas',	'fas',	'fasdfa',	'B',	'',	'2025-04-11 20:33:26',	'2025-04-11 20:33:26',	NULL),
(8,	2,	'<p>asdf</p>\r\n',	'<p>asdfa</p>\r\n',	'sasd',	'f',	'e',	'qwerq',	'werq',	'werqw',	'erqw',	'erqwer',	'C',	'',	'2025-04-11 20:33:42',	'2025-04-11 20:33:42',	NULL),
(9,	1,	'<p>asdf1fgdfasdfasdccccq</p>\r\n',	'<p>asdfa11xxxxxx</p>\r\n',	'asdf223ccccq',	'asdf223cccc',	'asdf223ccccq',	'asdf223cccc',	'asdf223ccccq',	'sdfasdf',	'asdasfa4234q',	'fasdfasd2342',	'D',	'',	'2025-04-12 12:13:40',	'2025-04-12 12:33:20',	NULL),
(10,	1,	'<p>czdf</p>\r\n',	'<p>sdfa</p>\r\n',	'asd',	'asdfa',	'sdfa',	'sdfas',	'dfasd',	'fasdf',	'asdf',	'asdf',	'B',	'',	'2025-04-12 12:36:56',	'2025-04-12 12:36:56',	NULL),
(11,	9,	'<p>asdfxxx1</p>\r\n',	'<p>asdf1</p>\r\n',	'asd',	'asd',	'asd',	'asd',	'asd',	'qwerqwe',	'rqwer',	'rqwerq',	'B',	'',	'2025-04-12 13:36:44',	'2025-04-14 10:45:33',	NULL),
(12,	1,	'<p>czdf11</p>\r\n',	'<p>sdfa</p>\r\n',	'asd',	'asdfa',	'sdfa',	'sdfas',	'dfasd',	'fasdf',	'asdf',	'asdf',	'B',	'',	'2025-04-12 12:36:56',	'2025-04-12 12:36:56',	NULL),
(13,	7,	'<blockquote>\r\n<p>asdfas</p>\r\n</blockquote>\r\n',	'<p>dfadsfadf</p>\r\n',	'asdas',	'd',	'r',	'rqe',	'qwe',	'rqe',	'qe',	'rqwer',	'B',	'',	'2025-04-18 13:39:23',	'2025-04-18 13:39:23',	NULL),
(14,	7,	'<p>asd</p>\r\n',	'<p>fasdfa</p>\r\n',	'as',	'sdfa',	'asdf',	'asdfa',	'asd',	'asd',	'fadsf',	'asdf',	'D',	'',	'2025-04-18 13:39:41',	'2025-04-18 13:39:41',	NULL),
(15,	7,	'<p>asdf</p>\r\n',	'<p>asdfasdf</p>\r\n',	'sfa',	'dfas',	'sdfa',	'sdfas',	'dsfa',	'sdfa',	'asd',	'asdfa',	'C',	'',	'2025-04-18 13:41:00',	'2025-04-18 13:41:00',	NULL);

DROP TABLE IF EXISTS `quizzes`;
CREATE TABLE `quizzes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `duration_minutes` int DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `quizzes` (`id`, `title`, `subtitle`, `duration_minutes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'AAadafsd',	'BBasdfas',	190,	'2025-04-11 18:43:04',	'2025-04-12 13:36:14',	NULL),
(2,	'sdfasd',	'asdfa',	90,	'2025-04-11 18:43:08',	'2025-04-11 18:43:08',	NULL),
(3,	'Adamda',	'sfasdf',	90,	'2025-04-11 18:45:27',	'2025-04-11 18:45:27',	NULL),
(4,	'newq',	'qwe',	90,	'2025-04-11 20:18:07',	'2025-04-11 20:18:07',	NULL),
(5,	'sdfasdzz',	'asdfazz',	91,	'2025-04-12 13:28:25',	'2025-04-12 13:28:25',	NULL),
(6,	'ss',	'fff',	90,	'2025-04-12 13:32:06',	'2025-04-12 13:32:06',	NULL),
(7,	'Mathff',	'Thefffff',	90,	'2025-04-12 13:32:12',	'2025-04-18 13:28:50',	NULL),
(8,	'sdfasd12',	'asdfa',	90,	'2025-04-12 13:34:23',	'2025-04-12 13:36:00',	NULL),
(9,	'bbb',	'ccc',	90,	'2025-04-12 13:36:24',	'2025-04-12 13:36:24',	NULL);

DROP TABLE IF EXISTS `quizzes1`;
CREATE TABLE `quizzes1` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `slider`;
CREATE TABLE `slider` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `button` varchar(255) NOT NULL,
  `button_url` varchar(255) NOT NULL,
  `button_2` varchar(255) NOT NULL,
  `button_url_2` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('active','block') NOT NULL,
  `position` varchar(255) NOT NULL,
  `inserted_date` varchar(255) NOT NULL,
  `last_updated` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `slider` (`id`, `title`, `description`, `button`, `button_url`, `button_2`, `button_url_2`, `image`, `status`, `position`, `inserted_date`, `last_updated`) VALUES
(1,	'Enjoy smooth learning',	'Learn From Best Online Training',	'Contact us',	'',	'Our courses',	'',	'slide1.jpg',	'active',	'1',	'2025-04-07 17:31:52',	'2025-04-11 14:05:16'),
(2,	'Enjoy smooth learning',	'Best Education Template Ever!',	'Learn More',	'',	'Our courses',	'',	'slide2.jpg',	'active',	'1',	'2025-04-07 17:45:29',	'2025-04-11 14:05:36'),
(4,	'Enjoy smooth learning',	'More than 50+ Online Courses',	'Learn More',	'',	'Our courses',	'',	'slide3.jpg',	'active',	'3',	'2025-04-11 14:25:41',	'2025-04-11 14:25:41');

DROP TABLE IF EXISTS `student_registration`;
CREATE TABLE `student_registration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `student_registration` (`id`, `name`, `email`, `mobile`, `password`, `created_at`, `deleted_at`) VALUES
(1,	'',	'boffinwebs@gmail.com',	NULL,	'$2y$10$HcgpzPo2KMI8C0j2JC2HeOdHFPparEe81RirMshutXSuIBHnFLJti',	'2025-04-15 13:16:45',	NULL),
(3,	'',	'boffinwebs1@gmail.com',	NULL,	'',	'2025-04-15 13:17:27',	NULL),
(5,	'Avinash Maurya',	'boffinwebs2@gmail.com',	NULL,	'123456',	'2025-04-15 13:18:07',	NULL),
(7,	'Avinash Maurya',	'boffinwebs33@gmail.com',	'08800388752',	'123456',	'2025-04-15 13:18:54',	NULL);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','branch','employee') NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `hash_key` varchar(255) DEFAULT NULL,
  `hash_expiry` varchar(255) DEFAULT NULL,
  `status` enum('active','block') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `thumbnail`, `user_id`, `ip_address`, `token`, `hash_key`, `hash_expiry`, `status`) VALUES
(14,	'Mr. Aditya',	'boffinwebs@gmail.com',	'e10adc3949ba59abbe56e057f20f883e',	'admin',	'profiles/team-01.jpg',	'',	'',	'',	NULL,	NULL,	'active');

-- 2025-04-18 11:21:33 UTC
