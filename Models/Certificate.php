<?php 

class Certificate {
   private $table_name;
   private $conn;

   private $certificate_id;
   private $course_id;
   private $student_id;
   private $issue_date;

   function __construct($db_conn){
     $this->conn = $db_conn;
     $this->table_name = "certificate";
   }

   function getById($certif_id){
     try {
          $sql = 'SELECT * FROM '. $this->table_name.' WHERE certificate_id=?';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute([$certif_id]);
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

   function init($certificate_id){
       try {
          $sql = 'SELECT * FROM '. $this->table_name.' WHERE certificate_id=?';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute([$certificate_id]);
          if($stmt->rowCount() > 0) 
            {
                $certit = $stmt->fetch();

                $this->certificate_id = $certit['certificate_id'];
                $this->course_id   = $certit['course_id'];
                $this->student_id = $certit['student_id'];
                $this->issue_date  = $certit['issue_date'];
                return 1;

            }
          else return 0;
       }catch(PDOException $e){
          return 0;
       }
   }
   function getAllByStudentId($stud_id){
     try {
          $sql = 'SELECT * FROM '. $this->table_name.' WHERE student_id=?';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute([$stud_id]);
          if($stmt->rowCount() > 0) 
            {
                $certificates = $stmt->fetchAll();
                return $certificates;
            }
          else return 0;
       }catch(PDOException $e){
          return 0;
       }
   }
   function getData(){
      $data = array('certificate_id' => $this->certificate_id,
                    'course_id' => $this->course_id,
                    'student_id' => $this->student_id,
                    'issue_date' => $this->issue_date
                   );
      return $data;
   }

   function getCertificateByIds($data){
     try {
          $sql = 'SELECT certificate_id FROM '. $this->table_name.' WHERE course_id=? AND student_id=?';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute($data);
          if($stmt->rowCount() > 0){
            $certif =  $stmt->fetch();
            $certif_id = $certif['certificate_id'];
            return $certif_id;
          }else return 0;
       }catch(PDOException $e){
          return 0;
       }
   }
   function insert($data){
       try {
          $sql = 'INSERT INTO '. $this->table_name.'(course_id, student_id) VALUES(?,?)';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute($data);
          return $res;
       }catch(PDOException $e){
          return 0;
       }
   }

   
}