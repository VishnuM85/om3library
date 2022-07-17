-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: sql6.freesqldatabase.com
-- Generation Time: Jul 17, 2022 at 03:24 PM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql6506138`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `bname` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `avail` varchar(10) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `user` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `bname`, `author`, `avail`, `genre`, `user`) VALUES
(31950641, 'Jane Eyre', 'Charlotte Bronte', 'yes', 'rom', 0),
(31950642, 'Anna Karenina', 'Leo Tolstoy', 'yes', 'rom', 0),
(31950643, 'The Thorn Birds', 'Colleen McCullough', 'yes', 'rom', 0),
(31950644, 'Love in the Time of Cholera', 'Gabriel Garcia Márquez', 'yes', 'rom', 0),
(31950645, 'North and South', 'Elizabeth Gaskell', 'yes', 'rom', 0),
(31950646, 'Pride and Prejudice', 'Jane Austen', 'yes', 'rom', 0),
(31950647, 'Emma', 'Jane Austen', 'yes', 'rom', 0),
(31950648, 'Sense and Sensibility', 'Jane Austen', 'yes', 'rom', 0),
(31950649, 'Maurice', 'E.M. Forster', 'yes', 'rom', 0),
(31950650, 'The Princess Bride', 'William Goldman', 'yes', 'rom', 0),
(31950651, 'Tess of the D-Urbervilles', 'Thomas Hardy', 'yes', 'rom', 0),
(31950652, 'Wuthering Heights', 'Emily Brontë', 'yes', 'rom', 0),
(31950653, 'Romeo and Juliet', 'William Shakespeare', 'yes', 'rom', 0),
(31950654, 'Rebecca', 'Daphne du Maurier', 'yes', 'rom', 0),
(31950655, 'Gone with the Wind', 'Margaret Mitchell', 'yes', 'rom', 0),
(31950656, 'A Game of Thrones', 'George R. R. Martin', 'yes', 'fan', 0),
(31950657, 'The Fellowship of the Ring', 'J. R. R. Tolkien', 'yes', 'fan', 0),
(31950658, 'The Lion, the Witch and the Wardrobe', 'C. S. Lewis', 'yes', 'fan', 0),
(31950659, 'The Colour of Magic', 'Terry Pratchett', 'yes', 'fan', 0),
(31950660, 'Assassin’s Apprentice', 'Robin Hobb', 'yes', 'fan', 0),
(31950661, 'The Lies of Locke Lamora', 'Scott Lynch', 'yes', 'fan', 0),
(31950662, 'The Name of the Wind', 'Patrick Rothfuss', 'yes', 'fan', 0),
(31950663, 'Dragonflight', 'Anne McCaffrey', 'yes', 'fan', 0),
(31950664, 'The Eye of the World', 'Robert Jordan', 'yes', 'fan', 0),
(31950665, 'The Blade Itself', 'Joe Abercrombie', 'yes', 'fan', 0),
(31950666, 'The Way of Kings', 'Brandon Sanderson', 'yes', 'fan', 0),
(31950667, 'Gardens of the Moon', 'Steven Erikson', 'yes', 'fan', 0),
(31950668, 'The Gunslinger', 'Stephen King', 'yes', 'fan', 0),
(31950669, 'A Wizard of Earthsea', 'Ursula K. Le Guin', 'yes', 'fan', 0),
(31950670, 'Jonathan Strange and Mr. Norrell', 'Susanna Clarke', 'yes', 'fan', 0),
(31950671, 'Frankenstein', 'Mary Shelley', 'yes', 'scfi', 0),
(31950672, '1984', 'George Orwell', 'yes', 'scfi', 0),
(31950673, 'Dune', 'Frank Herbert', 'yes', 'scfi', 0),
(31950674, 'The Stand', 'Stephen King', 'yes', 'scfi', 0),
(31950675, 'Journey to the Center of the Earth', 'Jules Verne', 'yes', 'scfi', 0),
(31950676, 'The War of the Worlds', 'H. G. Wells', 'yes', 'scfi', 0),
(31950677, 'The Time Machine', 'H. G. Wells', 'yes', 'scfi', 0),
(31950678, 'Fahrenheit 451', 'Ray Bradbury', 'yes', 'scfi', 0),
(31950679, 'The Handmaid’s Tale', 'Margaret Atwood', 'yes', 'scfi', 0),
(31950680, 'Hyperion', 'Dan Simmons', 'yes', 'scfi', 0),
(31950681, 'Ender’s Game', 'Orson Scott Card', 'yes', 'scfi', 0),
(31950682, 'Brave New World', 'Aldous Huxley', 'yes', 'scfi', 0),
(31950683, 'I, Robot', 'Isaac Asimov', 'yes', 'scfi', 0),
(31950684, '2001: A Space Odyssey', 'Arthur C. Clarke', 'yes', 'scfi', 0),
(31950685, 'Jurassic Park', 'Michael Crichton', 'yes', 'scfi', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31950686;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
