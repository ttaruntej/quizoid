-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2020 at 04:11 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(255) NOT NULL,
  `que` text NOT NULL,
  `option 1` varchar(222) NOT NULL,
  `option 2` varchar(222) NOT NULL,
  `option 3` varchar(222) NOT NULL,
  `option 4` varchar(222) NOT NULL,
  `ans` varchar(222) NOT NULL,
  `userans` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `que`, `option 1`, `option 2`, `option 3`, `option 4`, `ans`, `userans`) VALUES
(1, 'What does PHP stand for?', 'Preprocessed Hypertext Page', 'Hypertext Markup Language', 'Hypertext Preprocessor', 'Hypertext Transfer Protocol', 'Hypertext Preprocessor', 'Hypertext Preprocessor'),
(2, 'What will be the value of $var? ', '0', '1', '2', 'NULL', '0', 'Hypertext Preprocessor'),
(3, ' ____________ function in PHP Returns a list of response headers sent (or ready to send)', 'header', 'headers_list', 'header_sent', 'header_send', 'headers_list', '0'),
(4, 'Which of the following is the Server Side Scripting Language?', 'HTML', 'CSS', 'JS', 'PHP', 'PHP', 'headers_list'),
(5, 'What is the correct way to create a function in PHP?', 'new_function myFunction()', 'create myFunction()', 'function myFunction()', 'None', 'function myFunction()', 'PHP'),
(6, 'Which SQL statement is used to return only different values?', 'SELECT DIFFERENT', 'SELECT DISTINCT', 'SELECT UNIQUE', 'NONE', 'SELECT DISTINCT', 'function myFunction()'),
(7, 'Which superglobal variable holds information about headers, paths, and script locations?', '$_GET', '$_SERVER', '$_GLOBALS', '$_SESSION', '$_SERVER', 'SELECT DISTINCT'),
(8, 'How do you create a cookie in PHP?', 'makecookie()', 'createcookie', 'setcookie()', 'cookie_send', 'setcookie()', '$_SERVER'),
(9, 'Which operator is used to select values within a range?', 'WITHIN;', 'RANGE', 'BETWEEN', 'FROM_TO', 'BETWEEN', 'setcookie()'),
(10, 'Which operator is used to check if two values are equal and of same data type?', '===', '==', '=', 'equalto()', '===', 'BETWEEN'),
(11, 'What does SQL stand for?', 'Structured Query Language', 'Structured Question Language', 'Strong Question Language', 'Strong Query Language', 'Structured Query Language', '==='),
(12, 'Which SQL statement is used to extract data from a database?', 'GET', 'OPEN', 'SELECT', 'EXTRACT', 'SELECT', 'Structured Query Language'),
(13, 'Which SQL statement is used to insert new data in a database?', 'INSERT INTO  ', 'INSERT NEW', 'ADD NEW', 'ADD RECORD', 'INSERT INTO  ', 'SELECT'),
(14, 'Which SQL statement is used to delete data from a database?', 'DROP', 'DELETE', 'REMOVE', 'COLLAPSE', 'DELETE', 'INSERT INTO  '),
(15, 'Which SQL statement is used to update data in a database?', 'UPDATE', 'MODIFY', 'SAVE AS', 'SAVE', 'UPDATE', 'DELETE'),
(16, 'Which operator is used to search for a specified pattern in a column?', 'LIKE ', 'FROM', 'GET', 'ALIKE', 'LIKE ', 'UPDATE'),
(17, 'With SQL, how do you select all the columns from a table named \"Persons\"?', 'SELECT [all] FROM Persons', 'SELECT Persons', 'SELECT * FROM Persons', 'SELECT *.Persons', 'SELECT * FROM Persons', 'LIKE '),
(18, 'Which SQL statement is used to create a table in a database?', 'CREATE DATABASE TABLE', 'CREATE TABLE', 'CREATE DATABASE TAB', 'CREATE DB', 'CREATE TABLE', 'SELECT * FROM Persons'),
(19, 'With SQL, how can you return the number of records in the \"Persons\" table?', 'SELECT LEN(*) FROM Persons ', 'SELECT NO(*) FROM Persons', 'SELECT COUNT(*) FROM Persons', 'SELECT COLUMNS(*) FROM Persons', 'SELECT COUNT(*) FROM Persons', 'CREATE TABLE'),
(20, 'What is the most common type of join?', 'INNER JOIN', 'JOINED TABLE', 'INSIDE JOIN', 'JOINED', 'INNER JOIN', 'SELECT COUNT(*) FROM Persons');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `nama` text NOT NULL,
  `currentindex` int(11) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `result` int(11) NOT NULL,
  `correct` int(11) NOT NULL,
  `incorrect` int(11) NOT NULL,
  `unanswered` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `currentindex`, `username`, `password`, `created_at`, `result`, `correct`, `incorrect`, `unanswered`) VALUES
(1, 'PUSPAUL', 0, '', '', '2020-07-18 19:17:28', 40, 20, 0, 0),
(2, 'ARYAN', 0, '', '', '2020-07-18 19:18:32', 37, 19, 1, 0),
(3, 'MOUNI', 0, '', '', '2020-07-18 19:19:34', 36, 18, 0, 2),
(4, 'TARUN TEJ THADANA', 0, 'taruntejthadana@gmail.com', '$2y$10$juiRozk.HtfZ1g8OL0fqUuV7z/MAOoP6uu5SszOVNII1RgrSNTtBa', '2020-07-18 19:26:23', 11, 10, 9, 1),
(5, 'MANVENDRA', 0, '', '', '2020-07-18 19:23:35', 25, 15, 5, 0),
(6, 'VAIBHAV', 0, '', '', '2020-07-18 19:21:58', 33, 17, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `option 1` (`option 1`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
