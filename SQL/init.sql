-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 03, 2017 at 10:04 PM
-- Server version: 10.1.23-MariaDB
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Infocourse`
--

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
--

CREATE TABLE `Comments` (
  `ID` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Author` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Time` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Courses`
--

CREATE TABLE `Courses` (
  `Num` bigint(20) UNSIGNED NOT NULL,
  `ID` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Track` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Label` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ExamLink` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Courses`
--

INSERT INTO `Courses` (`Num`, `ID`, `Track`, `Link`, `Label`, `ExamLink`) VALUES
(1, 'PHP Fundamentals', 'PHP', '/courses/PHP1', '', '#'),
(2, 'PHP Advanced', 'PHP', '/courses/PHP2', '', '#'),
(3, 'C++ Fundamentals', 'C++', '/courses/C++1', '', '#'),
(4, 'C++ Advanced', 'C++', '/courses/C++2', '', '#'),
(5, 'Sort&amp;Find', 'Algorithms', '/courses/SortFind', '', '#'),
(6, 'Graphs', 'Algorithms', '/courses/Graphs', '', '#'),
(7, 'Java Fundamentals', 'Java', '/courses/Java1', '', '#');

-- --------------------------------------------------------

--
-- Table structure for table `News`
--

CREATE TABLE `News` (
  `Num` bigint(20) UNSIGNED NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `when` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `News`
--

INSERT INTO `News` (`Num`, `img`, `alt`, `intro`, `info`, `full_info`, `when`) VALUES
(11, '/news/softuni.png', 'Python Basics', 'Заповядайте на безплатен курс...', 'Заповядайте на безплатен курс...', '<p>Курсът \"Python Basics\" дава начални умения по програмиране, които включват писане на програмен код на начално ниво (basic coding skills), работа със среда за разработка (IDE), използване на променливи и данни, оператори и изрази, работа с конзолата (четене на входни данни и печатане на резултати), използване на условниконструкции (if, if-else, if-elif-else) и цикли (for, while).</p>', '<p><i class=\"fa fa-clock-o\" aria-hidden=\"true\"></i><time>10 май 2017 г. (неделя), 10:00ч</time></p> <p><i class=\"fa fa-map-marker\" aria-hidden=\"true\"></i> SoftUni</p> <p><i class=\"fa fa-ticket\" aria-hidden=\"true\"></i> <a href=\"https://softuni.bg/trainings/1655/python-basics-may-2017\">https://softuni.bg/trainings/1655/python-basics-may-2017</a>'),
(12, '/news/bjoi.png', 'eJOI', '<p><a href=\"http://ejoi.org/\">Информация тук</a></p>', '', '<p><a href=\"http://ejoi.org/\">Информация тук</a></p>', '<p><i class=\"fa fa-clock-o\" aria-hidden=\"true\"></i><time> 5-13 септември 2017</time></p>');

-- --------------------------------------------------------

--
-- Table structure for table `Seminars`
--

CREATE TABLE `Seminars` (
  `Num` bigint(20) UNSIGNED NOT NULL,
  `ID` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Source` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Label` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ExamLink` text COLLATE utf8mb4_unicode_ci,
  `Author` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Seminars`
--

INSERT INTO `Seminars` (`Num`, `ID`, `Name`, `Link`, `Source`, `Label`, `ExamLink`, `Author`) VALUES
(1, '0', 'C++17', '/seminars/C++17', 'https://www.youtube.com/embed/ZGxFkMTm27M', 'By Alex Tsvetanov & Dimo Chanev in SoftUni', '#', '');

-- --------------------------------------------------------

--
-- Table structure for table `Tracks`
--

CREATE TABLE `Tracks` (
  `Num` bigint(20) UNSIGNED NOT NULL,
  `ID` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Folder` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ExamLink` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Author` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Tracks`
--

INSERT INTO `Tracks` (`Num`, `ID`, `Name`, `Folder`, `ExamLink`, `Author`) VALUES
(1, '<strong>NEW</strong>', 'PHP', '/tracks/PHP', '#', ''),
(2, '<strong>NEW</strong>', 'Algorithms', '/tracks/Algorithms', '#', ''),
(3, '<strong>NEW</strong>', 'C++', '/tracks/C++', '#', ''),
(4, '<strong>Coming soon...</strong>', 'Python', '/tracks/Python', '#', ''),
(5, '<strong>Coming after 30/05/17...</strong>', 'Java', '/tracks/Java', '#', '');

-- --------------------------------------------------------

--
-- Table structure for table `Trainers`
--

CREATE TABLE `Trainers` (
  `Username` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Permissions` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'JSON'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Trainers`
--

INSERT INTO `Trainers` (`Username`, `Password`, `Permissions`) VALUES
('root', '', '{ \"modifySeminar\": \"allowed\", \"createTrack\": \"allowed\", \"createSeminar\": \"allowed\" }');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `Username` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`Username`, `Name`, `Email`, `Password`, `ID`) VALUES
('alex_ts', 'Alex Tsvetanov', 'alex@techedu.cf', 'a204d95d18da65e6150c2b549aadc3e5', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Videos`
--

CREATE TABLE `Videos` (
  `ID` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Course` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Source` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Label` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ExamLink` text COLLATE utf8mb4_unicode_ci,
  `UniqueID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Videos`
--

INSERT INTO `Videos` (`ID`, `Course`, `Link`, `Source`, `Label`, `ExamLink`, `UniqueID`) VALUES
('Preparing...', 'PHP1', '/courses/PHP/videos/0', 'https://www.youtube.com/embed/heXKR7KDt-c', 'Author: Yasen Georgiev', '#', 1),
('Basics', 'PHP1', '/courses/PHP/videos/1', 'https://www.youtube.com/embed/dztfsg2tQDs', 'Author: Yasen Georgiev', '#', 2),
('Arrays&amp;Conditional Statements - Group A', 'PHP1', '/courses/PHP/videos/2', 'https://www.youtube.com/embed/rKdvAiYdh7I', 'Author: Yasen Georgiev', '#', 3),
('Arrays&amp;Conditional Statements - Group B', 'PHP1', '/courses/PHP/videos/3', 'https://www.youtube.com/embed/OytP2CQWjvY', 'Author: Yasen Georgiev', '#', 4),
('Loops<br>Group A', 'PHP1', '/courses/PHP/videos/4', 'https://www.youtube.com/embed/CTziiSKich8', 'Author: Yasen Georgiev', '#', 5),
('Loops<br>Group B', 'PHP1', '/courses/PHP/videos/5', 'https://www.youtube.com/embed/zWdqNpzOPhw', 'Author: Yasen Georgiev', '#', 6),
('Loops - Group C', 'PHP1', '/courses/PHP/videos/6', 'https://www.youtube.com/embed/2ldFC-senNE', 'Author: Yasen Georgiev', '#', 7),
('Live Solving', 'PHP1', '/courses/PHP/videos/7', 'https://www.youtube.com/embed/_J8sFWQKIS4', 'Author: Yasen Georgiev', '#', 8),
('Hosting. ICN.Bg', 'PHP1', '/courses/PHP/videos/8', 'https://www.youtube.com/embed/ynwybdVp6Nk', 'Author: Yasen Georgiev', '#', 9),
('Forms<br>Group A', 'PHP1', '/courses/PHP/videos/9', 'https://www.youtube.com/embed/9mn_cnvdBVY', 'Author: Yasen Georgiev', '#', 10),
('Forms<br>Group B', 'PHP1', '/courses/PHP/videos/10', 'https://www.youtube.com/embed/DeS7xOxywl4', 'Author: Yasen Georgiev', '#', 11),
('Cookies. Sessions - Group C', 'PHP1', '/courses/PHP/videos/11', 'https://www.youtube.com/embed/9bOBM5Z_Nr0', 'Author: Yasen Georgiev', '#', 12),
('Exercise<br>Part 1', 'PHP1', '/courses/PHP/videos/12', 'https://www.youtube.com/embed/OQoDRBdSiqc', 'Author: Yasen Georgiev', '#', 13),
('Exercise<br>Part 2', 'PHP1', '/courses/PHP/videos/13', 'https://www.youtube.com/embed/AS3CUMmTqmI', 'Author: Yasen Georgiev', '#', 14),
('DataBases<br><br><br>', 'PHP2', '/courses/PHP/videos/14', 'https://www.youtube.com/embed/UCabYNOFUqw', 'Author: Yasen Georgiev', '#', 15),
('MySQL &amp; phpMyAdmin<br><br><br>', 'PHP2', '/courses/PHP/videos/15', 'https://www.youtube.com/embed/raDNElaW6F', 'Author: Yasen Georgiev', '#', 16),
('MySQL @ PHP<br><br><br>', 'PHP2', '/courses/PHP/videos/16', 'https://www.youtube.com/embed/MMPMpQEuDT8', 'Author: Yasen Georgiev', '#', 17),
('Functions. Good Practices<br><br>', 'PHP2', '/courses/PHP/videos/17', 'https://www.youtube.com/embed/2LdLm4oV1Lk', 'Author: Yasen Georgiev', '#', 18),
('Functions<br><br><br>', 'PHP2', '/courses/PHP/videos/18', 'https://www.youtube.com/embed/Ulix9SAcTxU', 'Author: Yasen Georgiev', '#', 19),
('OOP basics<br><br><br>', 'PHP2', '/courses/PHP/videos/19', 'https://www.youtube.com/embed/HHXmedW45ms', 'Author: Yasen Georgiev', '#', 20),
('Inheritance, Magic Methods, Publicity.<br><br>', 'PHP2', '/courses/PHP/videos/20', 'https://www.youtube.com/embed/I4dWkBamRYs', 'Author: Yasen Georgiev', '#', 21),
('Inheritance, Magic Methods, Publicity. - Group B', 'PHP2', '/courses/PHP/videos/21', 'https://www.youtube.com/embed/XUwyfQ7WTnI', 'Author: Yasen Georgiev', '#', 22),
('<span style=\"font-size: 0.75em\">Autoloading, namespaces, parent::, Interfaces - Group A</span>', 'PHP2', '/courses/PHP/videos/22', 'https://www.youtube.com/embed/BHkIIzJFti8', 'Author: Yasen Georgiev', '#', 23),
('<span style=\"font-size: 0.75em\">Autoloading, namespaces, parent::, Interfaces - Group B</span>', 'PHP2', '/courses/PHP/videos/23', 'https://www.youtube.com/embed/_FA0tuK78ik', 'Author: Yasen Georgiev', '#', 24),
('Exceptions<br><br><br>', 'PHP2', '/courses/PHP/videos/24', 'https://www.youtube.com/embed/Av8VNukyj0U', 'Author: Yasen Georgiev', '#', 25),
('MVC. Laravel<br><br><br>', 'PHP2', '/courses/PHP/videos/25', 'https://www.youtube.com/embed/t522p2BwZ_g', 'Author: Yasen Georgiev', '#', 26),
('<span style=\"font-size: 0.69em\">Eloquent ORM. Routing. Middlewares. Views. Blade Templating</span>', 'PHP2', '/courses/PHP/videos/26', 'https://www.youtube.com/embed/fedrAcbCboI', 'Author: Yasen Georgiev', '#', 27),
('Phonebook - Part 1<br><br><br>', 'PHP2', '/courses/PHP/videos/27', 'https://www.youtube.com/embed/ee-dFlCWKj4', 'Author: Yasen Georgiev', '#', 28),
('Phonebook - Part 2<br><br><br>', 'PHP2', '/courses/PHP/videos/28', 'https://www.youtube.com/embed/XP3W5XqTrPM', 'Author: Yasen Georgiev', '#', 29),
('Introduction to C++ (#<span class=\"nvote\" data-return=\"true\">TechEdu Course 1</span>)', 'C++1', '/courses/C++/videos/Introduction+to+C%2b%2b', 'https://www.youtube.com/embed/Ot3Uxh6bZxU', 'Alex Tsvetanov', '#', 30),
('I/O Stream', 'C++1', '/courses/C++/videos/IO%20Stream', 'https://www.youtube.com/embed/phM0lHrmVnE', 'Alex Tsvetanov', 'https://atj.openjudge.tk/contests/1', 31),
('Data Types and Variables', 'C++1', '/courses/C++/videos/DataTypesVariables', 'https://www.youtube.com/embed/QCvTRpruM8E', 'Alex Tsvetanov', '#', 32),
('Overflow, underflow and casting', 'C++1', '/courses/C++/videos/OverUnderCast', 'https://www.youtube.com/embed/zWMbeBmz4EU', 'Alex Tsvetanov', '#', 33),
('Pointers', 'C++1', '/courses/C++/videos/Pointers', 'https://www.youtube.com/embed/M51p8Rs_4ls', 'Alex Tsvetanov', '#', 34),
('if-else', 'C++1', '/courses/C++/videos/if-else', 'https://www.youtube.com/embed/sPV2_eJtgmk', 'Evgeni Vasilev', '#', 35),
('switch-case', 'C++1', '/courses/C++/videos/switch', 'https://www.youtube.com/embed/yBxR6FZKl4E', 'Evgeni Vasilev', '#', 36),
('while loop', 'C++1', '/courses/C++/videos/while', 'https://www.youtube.com/embed/LFENULP3qeg', 'Evgeni Vasilev', '#', 37),
('do-while loop', 'C++1', '/courses/C++/videos/do-while', 'https://www.youtube.com/embed/ji6xvgGmiKc', 'Evgeni Vasilev', '#', 38),
('for loop', 'C++1', '/courses/C++/videos/for', 'https://www.youtube.com/embed/QQtZD08-15g', 'Evgeni Vasilev', '#', 39),
('break, continue', 'C++1', '/courses/C++/videos/break_continue', 'https://www.youtube.com/embed/FaISNM23cW0', 'Evgeni Vasilev', '#', 40),
('Sort function', 'C++2', '/courses/C++/videos/sort_func', 'https://www.youtube.com/embed/okiF-XsrSWY', 'Marin Shalamanov', '#', 41),
('Binary search function', 'C++2', '/courses/C++/videos/binary_search_function', 'https://www.youtube.com/embed/slk-hXnrXF0', 'Marin Shalamanov', '#', 42),
('lower/upper bound', 'C++2', '/courses/C++/videos/bound_functions', 'https://www.youtube.com/embed/NJJ3CEKHySU', 'Marin Shalamanov', '#', 43),
('Cube root function', 'C++2', '/courses/C++/videos/cube_root', 'https://www.youtube.com/embed/BtjdITzbvmk', 'Marin Shalamanov', '#', 44),
('Workshop - sysadmin', 'C++2', '/courses/C++/videos/workshop_sysadmin', 'https://www.youtube.com/embed/vl3cAW2Kq6w', 'Marin Shalamanov', '#', 45),
('Counting sort', 'SortFind', '/courses/Algorithms/videos/counting_sort', 'https://www.youtube.com/embed/wAPHExxXDjo', 'Marin Shalamanov', '#', 46),
('Binary search', 'SortFind', '/courses/Algorithms/videos/binary_search', 'https://www.youtube.com/embed/cwmdfliNj5E', 'Marin Shalamanov', '#', 47),
('Introduction in Graphs', 'Graphs', '/courses/Algorithms/videos/Introduction_to_Graphs', 'https://www.youtube.com/embed/wXv3VEMzEBM', 'Marin Shalamanov', '#', 48),
('List of neighbours', 'Graphs', '/courses/Algorithms/videos/List_of_neighbours', 'https://www.youtube.com/embed/xqRLrrxjM-U', 'Marin Shalamanov', '#', 49),
('BFS', 'Graphs', '/courses/Algorithms/videos/BFS', 'https://www.youtube.com/embed/qax90KL-lMk', 'Marin Shalamanov', '#', 50),
('Min path with BFS', 'Graphs', '/courses/Algorithms/videos/Min_path_in_Graph', 'https://www.youtube.com/embed/igAboBxH4YE', 'Marin Shalamanov', '#', 51),
('Welcome to TechEdu++', 'Java1', '/courses/Java1/videos/welcome', 'https://www.youtube.com/embed/M3Mr20rfr64', 'Hristo Todorov', '#', 53),
('Introduction to programming', 'Java1', '/courses/Java1/videos/intro', 'https://www.youtube.com/embed/MKk3b49f1w8', 'Hristo Todorov', '#', 54),
('DFS', 'Graphs', '/courses/Algorithms/videos/DFS', 'https://www.youtube.com/embed/dSqZZqjoDjA', 'Marin Shalamanov', '#', 52);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Comments`
--
ALTER TABLE `Comments`
  ADD UNIQUE KEY `ID` (`ID`(33));

--
-- Indexes for table `Courses`
--
ALTER TABLE `Courses`
  ADD UNIQUE KEY `Num` (`Num`);

--
-- Indexes for table `News`
--
ALTER TABLE `News`
  ADD UNIQUE KEY `Num` (`Num`);

--
-- Indexes for table `Seminars`
--
ALTER TABLE `Seminars`
  ADD UNIQUE KEY `Num` (`Num`);

--
-- Indexes for table `Tracks`
--
ALTER TABLE `Tracks`
  ADD UNIQUE KEY `Num` (`Num`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Videos`
--
ALTER TABLE `Videos`
  ADD PRIMARY KEY (`UniqueID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Courses`
--
ALTER TABLE `Courses`
  MODIFY `Num` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `News`
--
ALTER TABLE `News`
  MODIFY `Num` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `Seminars`
--
ALTER TABLE `Seminars`
  MODIFY `Num` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Tracks`
--
ALTER TABLE `Tracks`
  MODIFY `Num` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Videos`
--
ALTER TABLE `Videos`
  MODIFY `UniqueID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
