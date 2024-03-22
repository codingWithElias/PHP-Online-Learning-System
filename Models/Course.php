<?php 

class Course {
   private $table_name;
   private $conn;

   private $course_id;
   private $title;
   private $description;
   private $instructor_id;
   private $created_at;

   function __construct($db_conn){
     $this->conn = $db_conn;
     $this->table_name = "course";
   }
   function getById($cour_id){
     try {
          $sql = 'SELECT * FROM '. $this->table_name.' WHERE course_id=?';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute([$cour_id]);
          if($stmt->rowCount() > 0) 
            {
                $course = $stmt->fetch();
                return $course;
            }
          else return 0;
       }catch(PDOException $e){
          return 0;
       }
   }
   function insert($data){
       try {
          $sql = 'INSERT INTO '. $this->table_name.'(title, description, instructor_id, cover) VALUES(?,?,?,?)';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute($data);
          return $res;
       }catch(PDOException $e){
          return 0;
       }
   }

   function count(){
      try {
          $sql = 'SELECT course_id FROM '. $this->table_name;
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute();

          return $stmt->rowCount();
       }catch(PDOException $e){
           return 0;
       }
   }
   function getCountByInstructorId($instructor_id){
      try {
          $sql = 'SELECT course_id FROM '. $this->table_name .' WHERE instructor_id=?';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute([$instructor_id]);

          return $stmt->rowCount();
       }catch(PDOException $e){
           return 0;
       }
   }
   function getSome($offset, $num){

      try {
          $sql = 'SELECT * FROM '. $this->table_name .' LIMIT :offset, :l';
          $stmt = $this->conn->prepare($sql);
          $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
          $stmt->bindParam(':l', $num, PDO::PARAM_INT);
           $stmt->execute();

          // $sql = "SELECT * FROM post LIMIT :offset, :l";
          if($stmt->rowCount() > 0) {
               $users = $stmt->fetchAll();

               return $users;
         }else return 0;
       }catch(PDOException $e){
           return 0;
       }
   }


   function getSomeCoursesByInstructorId($offset, $num, $instructor_id){

      try {
          $sql = "SELECT * FROM ". $this->table_name ." WHERE instructor_id = :id LIMIT :offset, :l";
          $stmt = $this->conn->prepare($sql);
          $stmt->bindParam(':id', $instructor_id, PDO::PARAM_INT);
          $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
          $stmt->bindParam(':l', $num, PDO::PARAM_INT);
           $stmt->execute();

          // $sql = "SELECT * FROM post LIMIT :offset, :l";
          if($stmt->rowCount() > 0) {
               $users = $stmt->fetchAll();

               return $users;
         }else return 0;
       }catch(PDOException $e){
           return 0;
       }
   }
   function getCoursesByInstructorId($instructor_id){

      try {
          $sql = "SELECT * FROM ". $this->table_name ." WHERE instructor_id = :id";
          $stmt = $this->conn->prepare($sql);
          $stmt->bindParam(':id', $instructor_id, PDO::PARAM_INT);
          $stmt->execute();

          if($stmt->rowCount() > 0) {
               $users = $stmt->fetchAll();

               return $users;
         }else return 0;
       }catch(PDOException $e){
           return 0;
       }
   }
   function active($val, $cou_id){
      try {
          $sql = 'UPDATE '. $this->table_name.' SET status=? WHERE course_id=?';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute([$val, $cou_id]);
           return 1;
       }catch(PDOException $e){
           return 0;
       }
   }

   function init($cou_id){
       try {
          $sql = 'SELECT * FROM '. $this->table_name.' WHERE course_id=?';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute([$cou_id]);
          if($stmt->rowCount() == 1) 
            {
                $stud = $stmt->fetch();

                $this->course_id = $stud['course_id'];
                $this->title   = $stud['title'];
                $this->description = $stud['description'];
                $this->instructor_id  = $stud['instructor_id'];
                $this->created_at      = $stud['created_at'];
                return 1;
            }
          else return 0;
       }catch(PDOException $e){
          return 0;
       }
   }

   function getData(){
      $data = array('course_id' => $this->course_id,
                    'title' => $this->title,
                    'description' => $this->description,
                    'instructor_id' => $this->instructor_id,
                    'created_at' => $this->created_at
                   );
      return $data;
   }

   function getChapters($cour_id){
     try {
          $sql = 'SELECT * FROM chapter WHERE course_id=?';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute([$cour_id]);
          if($stmt->rowCount() > 0) 
            {
                $chapters = $stmt->fetchAll();
                return $chapters;
            }
          else return 0;
       }catch(PDOException $e){
          return 0;
       }
   }
   function getTopics($cour_id){
     try {
          $sql = 'SELECT * FROM topic WHERE course_id=?';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute([$cour_id]);
          if($stmt->rowCount() > 0) 
            {
                $topics = $stmt->fetchAll();
                return $topics;
            }
          else return 0;
       }catch(PDOException $e){
          return 0;
       }
   }
   function getTopicsByChapterId($chap_id){
     try {
          $sql = 'SELECT * FROM topic WHERE chapter_id=?';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute([$chap_id]);
          if($stmt->rowCount() > 0) 
            {
                $topics = $stmt->fetchAll();
                return $topics;
            }
          else return 0;
       }catch(PDOException $e){
          return 0;
       }
   }
   function getContent($cour_id, $chapter_id, $topic_id){
     try {
          $sql = 'SELECT * FROM content WHERE course_id=? AND chapter_id=? AND topic_id=?';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute([$cour_id, $chapter_id, $topic_id]);
          if($stmt->rowCount() > 0) 
            {
                $contents = $stmt->fetch();
                return $contents;
            }
          else return 0;
       }catch(PDOException $e){
          return 0;
       }
   }
   function pageExes($cour_id, $chapter_id){
     try {
          $sql = 'SELECT * FROM topic WHERE course_id=? AND chapter_id=?';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute([$cour_id, $chapter_id]);
          if($stmt->rowCount() > 0) 
            {
                return 1;
            }
          else return 0;
       }catch(PDOException $e){
          return 0;
       }
   }
   function isPageExes($cour_id, $chapter_id, $topic_id){
     try {
          $sql = 'SELECT * FROM topic WHERE course_id=? AND chapter_id=? AND topic_id=?';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute([$cour_id, $chapter_id, $topic_id]);
          if($stmt->rowCount() > 0) 
            {
                return 1;
            }
          else return 0;
       }catch(PDOException $e){
          return 0;
       }
   }

   function getByInstructorId($instructor_id){
     try {
          $sql = 'SELECT * FROM '. $this->table_name.' WHERE instructor_id=?';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute([$instructor_id]);
          if($stmt->rowCount() > 0) 
            {
                $courses = $stmt->fetchAll();
                return $courses;
            }
          else return 0;
       }catch(PDOException $e){
          return 0;
       }
   }


   function getCourseDetails($cour_id){
     try {

          $sql = 'SELECT * FROM '. $this->table_name.' WHERE course_id=?';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute([$cour_id]);
          if($stmt->rowCount() > 0) 
            {
               $course_res = $stmt->fetch();
               $course = array("course_id"=> $course_res['course_id'],
                               "title"=> $course_res['title'],
                               "description"=> $course_res['description'],
                               "created_at"=> $course_res['created_at'],
                               "cover"=> $course_res['cover']
                               );
                $instr_id = $course_res['instructor_id'];
                // Get instructor
                $sql = 'SELECT * FROM instructor WHERE instructor_id=?';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$instr_id]);
                $instructor = $stmt->fetch();

                $course["instructor_name"] = $instructor["first_name"]." ".$instructor["last_name"];

                // get all chapters
                $sql = 'SELECT * FROM chapter WHERE course_id=?';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$cour_id]);
                $chapter_nums = $stmt->rowCount();
                $course["chapter_nums"] = $chapter_nums;
 
                // get all topics
                $sql = 'SELECT * FROM topic WHERE course_id=?';
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$cour_id]);
                $topic_nums = $stmt->rowCount();
                $course["topic_nums"] = $chapter_nums;


                return $course;
            }
          else return 0;
       }catch(PDOException $e){
          return 0;
       }
   }
   

   function getStudentProgress($cour_id, $stud_id){
     try {

          $sql = 'SELECT * FROM student_progress WHERE course_id=? AND student_id=?';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute([$cour_id, $stud_id]);
          if($stmt->rowCount() > 0) 
            {
               $progress = $stmt->fetch();
               
               return $progress['progress'];
            }
          else return 0;
       }catch(PDOException $e){
          return 0;
       }
   }

   function updateStudentProgress($cour_id, $stud_id, $val){
     try {
          $sql = 'UPDATE student_progress SET progress=? WHERE course_id=? AND student_id=?';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute([$val, $cour_id, $stud_id]);
          if($res) return 1;
          else return 0;
       }catch(PDOException $e){
          return 0;
       }
   }

   function createStudentProgress($cour_id, $stud_id, $val){
     try {
          $sql = 'INSERT INTO student_progress (course_id, student_id, progress) VALUES (?,?,?)';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute([$cour_id, $stud_id, $val]);
          if($res) return 1;
          else return 0;
       }catch(PDOException $e){
          return 0;
       }
   }
   
   function getSomeEnrolled($stud_id){

      try {

          $sql = 'SELECT course_id FROM enrolled_student WHERE student_id=?';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute([$stud_id]);
          if ($res) {
            $enrolled_students = $stmt->fetchAll();
            $data = array(array('data'=> 0));
            // print_r($enrolled_students);
            $countNum = count($enrolled_students);

            for($i=0; $i < $countNum; $i++) { 
                $courses_id = $enrolled_students[$i]['course_id'];

                $sql1 = 'SELECT * FROM course WHERE courses_id=?';
                $stmt1 = $this->conn->prepare($sql1);
                $stmt1->execute([$courses_id]);
                $course = $stmt1->fetch();
                $data[$i] = $course;

            }
           return $data; 
          }else return 0;
       }catch(PDOException $e){
           return 0;
       }
   }

    function insert_chapter($data){
       try {
          $sql = 'INSERT INTO chapter (course_id, title) VALUES(?,?)';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute($data);
          return $res;
       }catch(PDOException $e){
        // echo $e->getMessage();
          return 0;
       }
   }
    function insert_topic($data){
       try {
          $sql = 'INSERT INTO topic ( chapter_id, course_id, title) VALUES(?,?,?)';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute($data);
          return $res;
       }catch(PDOException $e){
        echo $e->getMessage();
          return 0;
       }
   }

    function check_content($data){
       try {
          $sql = 'SELECT  * FROM content WHERE  course_id=? AND chapter_id=? AND topic_id = ? ';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute($data);
          if($stmt->rowCount() > 0) 
            {
               $content = $stmt->fetch();
               
               return $content;
            }else return 0;
       }catch(PDOException $e){
        echo $e->getMessage();
          return 0;
       }
   }
    
    function insert_content($datax){
       try {
          $sql = 'INSERT INTO content ( course_id, chapter_id, topic_id, data) VALUES(?,?,?,?)';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute($datax);
          return $res;
       }catch(PDOException $e){
        echo $e->getMessage();
          return 0;
       }
   }

   function update_content($data){
       try {
          $sql = 'UPDATE content SET data = ? WHERE  course_id=? AND chapter_id=? AND topic_id = ? ';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute($data);
          return $res;
       }catch(PDOException $e){
        echo $e->getMessage();
          return 0;
       }
   }
} // class END