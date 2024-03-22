<?php 


class Student{
   private $table_name;
   private $conn;

   private $student_id;
   private $username;
   private $first_name;
   private $last_name;
   private $email;
   private $date_of_birth;
   private $date_of_joined;
   private $profile_img;
   


   function __construct($db_conn){
     $this->conn = $db_conn;
     $this->table_name = "student";
   }
   
   function insert($data){
       try {
          $sql = 'INSERT INTO '. $this->table_name.'(username, first_name, last_name, email, date_of_birth, password) VALUES(?,?,?,?,?,?)';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute($data);
          return $res;
       }catch(PDOException $e){
       	  return 0;
       }
   }
   function is_username_unique($user_name){
       try {
          $sql = 'SELECT username FROM '. $this->table_name.' WHERE username=?';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute([$user_name]);
          if($stmt->rowCount() > 0) 
          	return 0;
          else return 1;
       }catch(PDOException $e){
       	  return 0;
       }
   }
   function count(){
      try {
          $sql = 'SELECT student_id FROM '. $this->table_name;
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute();

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
   function active($val, $student_id){
      try {
          $sql = 'UPDATE '. $this->table_name.' SET status=? WHERE student_id=?';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute([$val, $student_id]);
           return 1;
       }catch(PDOException $e){
           return 0;
       }
   }
   
   function init($student_id){
       try {
          $sql = 'SELECT * FROM '. $this->table_name.' WHERE student_id=?';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute([$student_id]);
          if($stmt->rowCount() == 1) 
            {
                $stud = $stmt->fetch();

                $this->student_id = $stud['student_id'];
                $this->username   = $stud['username'];
                $this->first_name = $stud['first_name'];
                $this->last_name  = $stud['last_name'];
                $this->email      = $stud['email'];
                $this->date_of_birth  = $stud['date_of_birth'];
                $this->date_of_joined = $stud['date_of_joined'];
                $this->profile_img = $stud['profile_img'];
                return 1;
            }
          else return 0;
       }catch(PDOException $e){
          return 0;
       }
   }

 function getData(){
      $data = array('student_id' => $this->student_id,
                    'username' => $this->username,
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                    'email' => $this->email,
                    'date_of_birth' => $this->date_of_birth,
                    'date_of_joined' => $this->date_of_joined,
                    'profile_img' => $this->profile_img
                   );
      return $data;
   }

   function authenticate($input_username, $input_password){
       try {
          $sql = 'SELECT * FROM '. $this->table_name.' WHERE username=?';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute([$input_username]);
          if($stmt->rowCount() == 1) {
            $student = $stmt->fetch();
            $_username = $student["username"];
            $_password = $student["password"];


            if($_username === $input_username ){
               if (password_verify($input_password, $_password)) {
                  $this->username =  $_username;
                  $this->student_id =  $student["student_id"];
                  $this->email =  $student["email"];
                  $this->first_name =  $student["first_name"];
                  $this->last_name =  $student["last_name"];
                  return 1;
               }else return 0;
            }else return 0;
          }else return 0;
       }catch(PDOException $e){
           return 0;
       }
   }
   function updateProfile($stud_id, $img){
       try {
          $sql = 'UPDATE '. $this->table_name.' SET profile_img=? WHERE student_id=?';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute([$img, $stud_id]);
          if($res ) return 1;
          else return 0;
       }catch(PDOException $e){
          return 0;
       }
   }

   function getProfileImg($student_id){
       try {
          $sql = 'SELECT profile_img, student_id FROM '. $this->table_name.' WHERE student_id=?';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute([$student_id]);
          if($stmt->rowCount() == 1) 
            {
                $stud = $stmt->fetch();
                return $stud['profile_img'];
            }
          else return 0;
       }catch(PDOException $e){
          return 0;
       }
   }
   function changePassword($stud_id, $pass, $new_password){
       try {
          $sql = 'SELECT password, student_id FROM '. $this->table_name.' WHERE student_id=?';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute([$stud_id]);
          if($stmt->rowCount()> 0) 
            {
                $stud = $stmt->fetch();
                $cpassword = $stud['password'];
                if (password_verify($pass, $cpassword)){
                    // password hash
                    $new_password = password_hash($new_password, PASSWORD_DEFAULT);
                    $sql = 'UPDATE '. $this->table_name.' SET password=? WHERE student_id=?';
                    $stmt = $this->conn->prepare($sql);
                   $stmt->execute([$new_password, $stud_id]);
                   return 1;
                } else return 0;
            }
          else return 0;
       }catch(PDOException $e){
          return 0;
       }
   }

   function update($data){
       try {
          $sql = 'UPDATE '. $this->table_name.' SET first_name=?, last_name=?, email=?, date_of_birth=? WHERE student_id=?';
          $stmt = $this->conn->prepare($sql);
          $res = $stmt->execute($data);
          if($res) return 1;
          else return 0;
       }catch(PDOException $e){
          return 0;
       }
   }
   

} // Student class END