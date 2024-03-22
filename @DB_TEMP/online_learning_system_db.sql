
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `student_password` varchar(1023) NOT NULL,
  `student_full_name` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `user_name`, `student_password`, `student_full_name`, `student_email`) VALUES
(6, 'elias11', '$2y$10$duWMWfZXM0dqyiKGuMHJee3pzlxkxbCzLtnyV9rSZqC/kclhabFq6', 'Elias A', 'elias@example.com'),
(7, 'john23', '$2y$10$Yo4yI.cU4BOy7Fvg73fbG.CaaOUJx95Qj/iXKHaobJ1jxBeekxzmS', 'John Doe', 'john@jo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



INSERT INTO `instructor` (`instructor_id`, `username`, `password`, `first_name`, `last_name`, `email`, `date_of_birth`, `date_of_joined`) VALUES (NULL, 'elias17', '$2y$10$duWMWfZXM0dqyiKGuMHJee3pzlxkxbCzLtnyV9rSZqC/kclhabFq6', 'Elias', 'Yasin', 'eliasyasin@edupulsedb.com', '1998-07-05', '2024-01-15');




INSERT INTO `chapter` (`chapter_id`, `course_id`, `title`, `created_at`) VALUES (NULL, '1', 'Chapter-2', '2024-01-15');
INSERT INTO `chapter` (`chapter_id`, `course_id`, `title`, `created_at`) VALUES (NULL, '1', 'Chapter-3', '2024-01-15');
INSERT INTO `chapter` (`chapter_id`, `course_id`, `title`, `created_at`) VALUES (NULL, '1', 'Chapter-4', '2024-01-15');
INSERT INTO `chapter` (`chapter_id`, `course_id`, `title`, `created_at`) VALUES (NULL, '1', 'Chapter-5', '2024-01-15');
INSERT INTO `chapter` (`chapter_id`, `course_id`, `title`, `created_at`) VALUES (NULL, '1', 'Chapter-6', '2024-01-15');

INSERT INTO `topic` (`topic_id`, `chapter_id`, `course_id`, `title`, `created_at`) 
VALUES (NULL, '1', '1', 'topic-1', '2024-01-15'), 
       (NULL, '2', '1', 'topic-1', '2024-01-15'),
       (NULL, '1', '1', 'topic-3', '2024-01-15'),
       (NULL, '1', '1', 'topic-4', '2024-01-15'),
       (NULL, '2', '1', 'topic-2', '2024-01-15'),
       (NULL, '2', '1', 'topic-3', '2024-01-15');


