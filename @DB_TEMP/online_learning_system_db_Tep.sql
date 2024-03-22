

--
-- Database: `EduPulseDB`
--

--
-- Table structure for table `admin`
--
CREATE TABLE admin (
    admin_id INT PRIMARY KEY,
    full_name VARCHAR(255),
    email VARCHAR(255),
    username VARCHAR(255),
    password VARCHAR(255)
);









--
-- Table structure for table `student`
-- 

CREATE TABLE student(
  student_id int(11) NOT NULL PRIMARY KEY,
  username varchar(255) NOT NULL,
  password varchar(1023) NOT NULL,
  first_name varchar(255) NOT NULL,
  last_name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  date_of_birth DATE NOT NULL,
  date_of_joined DATE NOT NULL
);

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;




--
-- Table structure for table `instructor`   
--
CREATE TABLE instructor(
  instructor_id int(11) NOT NULL PRIMARY KEY,
  username varchar(255) NOT NULL,
  password varchar(1023) NOT NULL,
  first_name varchar(255) NOT NULL,
  last_name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  date_of_birth DATE NOT NULL,
  date_of_joined DATE NOT NULL
);

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


--
-- Table structure for table `course`   
--
CREATE TABLE course(
  course_id int(11) NOT NULL PRIMARY KEY,
  title varchar(1023) NOT NULL,
  description varchar(1023) NOT NULL,
  instructor_id int(11) NOT NULL,
  created_at DATE NOT NULL,
  FOREIGN KEY  (instructor_id) REFERENCES instructor (instructor_id)
);

-- AUTO_INCREMENT
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


--
-- Table structure for table `certificate`   
--
CREATE TABLE certificate(
  certificate_id int(11) NOT NULL PRIMARY KEY,
  course_id int(11) NOT NULL,
  student_id int(11) NOT NULL,
  issue_date DATE NOT NULL,
  FOREIGN KEY  (course_id) REFERENCES course (course_id),
  FOREIGN KEY  (student_id) REFERENCES student (student_id)
);
-- AUTO_INCREMENT
ALTER TABLE `certificate`
  MODIFY `certificate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


-- 
-- Table structure for table `Chapter `   
--
CREATE TABLE chapter (
  chapter_id int(11) NOT NULL PRIMARY KEY,
  course_id int(11) NOT NULL,
  title varchar(1023) NOT NULL,
  created_at DATE NOT NULL,
  FOREIGN KEY  (course_id) REFERENCES course (course_id)
);

-- AUTO_INCREMENT
ALTER TABLE `chapter`
  MODIFY `chapter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


-- 
-- Table structure for table `Topic `   
--
CREATE TABLE topic (
  topic_id int(11) NOT NULL PRIMARY KEY,
  chapter_id int(11) NOT NULL,
  course_id int(11) NOT NULL,
  title varchar(1023) NOT NULL,
  created_at DATE NOT NULL,
  FOREIGN KEY  (chapter_id) REFERENCES chapter (chapter_id),
  FOREIGN KEY  (course_id) REFERENCES course (course_id)
);

-- AUTO_INCREMENT
ALTER TABLE `topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- 
-- Table structure for table `Content `   
--
CREATE TABLE content (
  content_id int(11) NOT NULL PRIMARY KEY,
  topic_id int(11) NOT NULL,
  chapter_id int(11) NOT NULL,
  course_id int(11) NOT NULL,
  data text NOT NULL,
  created_at DATE NOT NULL,
  FOREIGN KEY  (topic_id) REFERENCES topic (topic_id),
  FOREIGN KEY  (chapter_id) REFERENCES chapter (chapter_id),
  FOREIGN KEY  (course_id) REFERENCES course (course_id)
);

-- AUTO_INCREMENT
ALTER TABLE `content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;  



-- 
-- Table structure for table `enrolled_student `   
--
CREATE TABLE enrolled_student (
  enrolled_id int(11) NOT NULL PRIMARY KEY,
  course_id int(11) NOT NULL,
  student_id int(11) NOT NULL,
  enrolled_at DATE NOT NULL,
  FOREIGN KEY  (course_id) REFERENCES course (course_id),
  FOREIGN KEY  (student_id) REFERENCES student (student_id)
);

-- AUTO_INCREMENT
ALTER TABLE `enrolled_student`
  MODIFY `enrolled_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;  

-- 
-- Table structure for table `student_progress `   
--
CREATE TABLE student_progress (
  progress_id int(11) NOT NULL PRIMARY KEY,
  course_id int(11) NOT NULL,
  student_id int(11) NOT NULL,
  progress int(11) NOT NULL,
  FOREIGN KEY  (course_id) REFERENCES course (course_id),
  FOREIGN KEY  (student_id) REFERENCES student (student_id)
);

-- AUTO_INCREMENT
ALTER TABLE `student_progress`
  MODIFY `progress_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1; 

--
-- Table structure for table `Quiz`   
--
CREATE TABLE quiz (
  quiz_id int(11) NOT NULL PRIMARY KEY,
  course_id int(11) NOT NULL,
  chapter_id int(11) NOT NULL,
  FOREIGN KEY  (course_id) REFERENCES course (course_id),
  FOREIGN KEY  (chapter_id) REFERENCES chapter (chapter_id)
);


-- AUTO_INCREMENT
ALTER TABLE `quiz`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;  


--
-- Table structure for table `Question`  
--
CREATE TABLE question (
  question_id int(11) NOT NULL PRIMARY KEY,
  quiz_id int(11) NOT NULL,
  question_text varchar(1023) NOT NULL,
  options varchar(1023) NOT NULL,
  correct_options varchar(255) NOT NULL,
  FOREIGN KEY  (quiz_id) REFERENCES quiz (quiz_id)
);


-- AUTO_INCREMENT
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Table structure for table `grade` 
--
-- CREATE TABLE grade (
--   grade_id int(11) NOT NULL PRIMARY KEY,
--   quiz_id int(11) NOT NULL,
--   student_id int(11) NOT NULL,
--   student_grade int(11) NOT NULL,
--   course_id int(11) NOT NULL,
--   FOREIGN KEY  (course_id) REFERENCES course (course_id),
--   FOREIGN KEY  (quiz_id) REFERENCES quiz (quiz_id),
--   FOREIGN KEY  (student_id) REFERENCES student (student_id)
-- );


-- -- AUTO_INCREMENT
-- ALTER TABLE `grade`
--   MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;




CREATE TABLE CoursesMaterial(
  material_id int(11) NOT NULL PRIMARY KEY,
  URL varchar(1023) NOT NULL,
  type varchar(127) NOT NULL,
  thumbnail varchar(1023) NOT NULL,
  instructor_id int(11) NOT NULL,
  created_at DATE NOT NULL,
  FOREIGN KEY  (instructor_id) REFERENCES instructor (instructor_id)
);


ALTER TABLE `certificate`
  MODIFY `certificate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42347;