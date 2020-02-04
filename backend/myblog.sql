-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2019 at 12:45 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Technology'),
(2, 'Web Development'),
(3, 'Mobile App Development'),
(4, 'Tech Trends'),
(5, 'Software Development'),
(6, 'Internet of Things'),
(7, 'My Technologies'),
(8, 'Latest Technologies'),
(9, 'Trending'),
(10, 'General');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `title`, `body`, `author`, `created_at`) VALUES
(1, 2, 'Post One', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut interdum est nec lorem mattis interdum. Cras augue est, interdum eu consectetur et, faucibus vel turpis. Etiam pulvinar, enim quis elementum iaculis, tortor sapien eleifend eros, vitae rutrum augue quam sed leo. Vivamus fringilla, diam sit amet vestibulum vulputate, urna risus hendrerit arcu, vitae fringilla odio justo vulputate neque. Nulla a massa sed est vehicula rhoncus sit amet quis libero. Integer euismod est quis turpis hendrerit, in feugiat mauris laoreet. Vivamus nec laoreet neque. Cras condimentum aliquam nunc nec maximus. Cras facilisis eros quis leo euismod pharetra sed cursus orci.', 'Sam Smith', '2019-06-05 01:27:00'),
(2, 5, 'Post Two', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut interdum est nec lorem mattis interdum. Cras augue est, interdum eu consectetur et, faucibus vel turpis. Etiam pulvinar, enim quis elementum iaculis, tortor sapien eleifend eros, vitae rutrum augue quam sed leo. Vivamus fringilla, diam sit amet vestibulum vulputate, urna risus hendrerit arcu, vitae fringilla odio justo vulputate neque. Nulla a massa sed est vehicula rhoncus sit amet quis libero. Integer euismod est quis turpis hendrerit, in feugiat mauris laoreet. Vivamus nec laoreet neque. Cras condimentum aliquam nunc nec maximus. Cras facilisis eros quis leo euismod pharetra sed cursus orci.', 'Mary Jackson', '2019-06-05 01:27:05'),
(3, 3, 'Post Three', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut interdum est nec lorem mattis interdum. Cras augue est, interdum eu consectetur et, faucibus vel turpis. Etiam pulvinar, enim quis elementum iaculis, tortor sapien eleifend eros, vitae rutrum augue quam sed leo. Vivamus fringilla, diam sit amet vestibulum vulputate, urna risus hendrerit arcu, vitae fringilla odio justo vulputate neque. Nulla a massa sed est vehicula rhoncus sit amet quis libero. Integer euismod est quis turpis hendrerit, in feugiat mauris laoreet. Vivamus nec laoreet neque. Cras condimentum aliquam nunc nec maximus. Cras facilisis eros quis leo euismod pharetra sed cursus orci.', 'Mary Jackson', '2019-06-05 01:27:10'),
(4, 7, 'Post Four', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Exercitationem nisi quidem eaque beatae ipsa cum doloribus saepe quam iure nostrum. Cumque consectetur recusandae ipsum non id pariatur molestiae sed omnis natus amet tempore officia, iste cupiditate consequuntur dolorem sapiente, aperiam quibusdam eaque similique impedit adipisci provident quasi laboriosam voluptatibus! A, explicabo. Deserunt, hic blanditiis veritatis quo excepturi sapiente fuga magni autem suscipit placeat. Numquam inventore nemo quasi quidem recusandae quas. Eius consectetur similique atque, soluta qui omnis, quae adipisci ad deserunt debitis enim voluptate iusto voluptatem eum accusamus aperiam vel quasi quam voluptates dignissimos nam in nostrum assumenda fugit! Aut commodi aliquid aperiam quasi, exercitationem id atque, ipsa iure debitis vel modi! Illo corrupti excepturi voluptatibus consectetur facere reiciendis ipsum nulla voluptas praesentium quis minus fuga voluptatum, alias sunt? Magnam vero facere culpa vitae nesciunt ratione consectetur possimus quidem vel cupiditate doloremque facilis labore fugiat quis eius, praesentium molestiae amet!', 'Odinaka Joy', '2019-09-08 11:44:15'), 
(5, 1, 'Post Five', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Exercitationem nisi quidem eaque beatae ipsa cum doloribus saepe quam iure nostrum. Cumque consectetur recusandae ipsum non id pariatur molestiae sed omnis natus amet tempore officia, iste cupiditate consequuntur dolorem sapiente, aperiam quibusdam eaque similique impedit adipisci provident quasi laboriosam voluptatibus! A, explicabo. Deserunt, hic blanditiis veritatis quo excepturi sapiente fuga magni autem suscipit placeat. Numquam inventore nemo quasi quidem recusandae quas. Eius consectetur similique atque, soluta qui omnis, quae adipisci ad deserunt debitis enim voluptate iusto voluptatem eum accusamus aperiam vel quasi quam voluptates dignissimos nam in nostrum assumenda fugit! Aut commodi aliquid aperiam quasi, exercitationem id atque, ipsa iure debitis vel modi! Illo corrupti excepturi voluptatibus consectetur facere reiciendis ipsum nulla voluptas praesentium quis minus fuga voluptatum, alias sunt? Magnam vero facere culpa vitae nesciunt ratione consectetur possimus quidem vel cupiditate doloremque facilis labore fugiat quis eius, praesentium molestiae amet!', 'Odinaka Joy', '2019-09-08 11:44:20'), 
(6, 4, 'Post Six', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Exercitationem nisi quidem eaque beatae ipsa cum doloribus saepe quam iure nostrum. Cumque consectetur recusandae ipsum non id pariatur molestiae sed omnis natus amet tempore officia, iste cupiditate consequuntur dolorem sapiente, aperiam quibusdam eaque similique impedit adipisci provident quasi laboriosam voluptatibus! A, explicabo. Deserunt, hic blanditiis veritatis quo excepturi sapiente fuga magni autem suscipit placeat. Numquam inventore nemo quasi quidem recusandae quas. Eius consectetur similique atque, soluta qui omnis, quae adipisci ad deserunt debitis enim voluptate iusto voluptatem eum accusamus aperiam vel quasi quam voluptates dignissimos nam in nostrum assumenda fugit! Aut commodi aliquid aperiam quasi, exercitationem id atque, ipsa iure debitis vel modi! Illo corrupti excepturi voluptatibus consectetur facere reiciendis ipsum nulla voluptas praesentium quis minus fuga voluptatum, alias sunt? Magnam vero facere culpa vitae nesciunt ratione consectetur possimus quidem vel cupiditate doloremque facilis labore fugiat quis eius, praesentium molestiae amet!', 'Odinaka Joy', '2019-09-08 11:44:25'), 
(7, 10, 'Post Seven', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Exercitationem nisi quidem eaque beatae ipsa cum doloribus saepe quam iure nostrum. Cumque consectetur recusandae ipsum non id pariatur molestiae sed omnis natus amet tempore officia, iste cupiditate consequuntur dolorem sapiente, aperiam quibusdam eaque similique impedit adipisci provident quasi laboriosam voluptatibus! A, explicabo. Deserunt, hic blanditiis veritatis quo excepturi sapiente fuga magni autem suscipit placeat. Numquam inventore nemo quasi quidem recusandae quas. Eius consectetur similique atque, soluta qui omnis, quae adipisci ad deserunt debitis enim voluptate iusto voluptatem eum accusamus aperiam vel quasi quam voluptates dignissimos nam in nostrum assumenda fugit! Aut commodi aliquid aperiam quasi, exercitationem id atque, ipsa iure debitis vel modi! Illo corrupti excepturi voluptatibus consectetur facere reiciendis ipsum nulla voluptas praesentium quis minus fuga voluptatum, alias sunt? Magnam vero facere culpa vitae nesciunt ratione consectetur possimus quidem vel cupiditate doloremque facilis labore fugiat quis eius, praesentium molestiae amet!', 'Odinaka Joy', '2019-09-08 11:44:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
