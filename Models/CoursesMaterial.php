<?php 

class CoursesMaterial {
   private $table_name;
   private $conn;

   private $material_id;
   private $URL;
   private $type;
   private $instructor_id;
   private $created_at;

   function __construct($db_conn){
     $this->conn = $db_conn;
     $this->table_name = "coursesmaterial";
   }

   function insert($instr_id, $uRL, $Type){
       try {
          $sql = 'INSERT INTO '. $this->table_name.'(URL, type, instructor_id) VALUES(?,?,?)';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute([$uRL, $Type, $instr_id]);
          return $res;
       }catch(PDOException $e){
          return 0;
       }
   }
   function getCountByInstructorId($instructor_id){
      try {
          $sql = 'SELECT material_id FROM '. $this->table_name .' WHERE instructor_id=?';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute([$instructor_id]);

          return $stmt->rowCount();
       }catch(PDOException $e){
           return 0;
       }
   }

   function getSomeCoursesMaterialsByInstructorId($offset, $num, $instructor_id){

      try {
          $sql = "SELECT * FROM ". $this->table_name ." WHERE instructor_id = :id ORDER BY material_id desc LIMIT :offset, :l";
          $stmt = $this->conn->prepare($sql);
          $stmt->bindParam(':id', $instructor_id, PDO::PARAM_INT);
          $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
          $stmt->bindParam(':l', $num, PDO::PARAM_INT);
           $stmt->execute();

          // $sql = "SELECT * FROM post LIMIT :offset, :l";
          if($stmt->rowCount() > 0) {
               $materials = $stmt->fetchAll();

               return $materials;
         }else return 0;
       }catch(PDOException $e){
           return 0;
       }
   }
   
    
} // class END