<?php 
session_start();
include "../../Utils/Util.php";
if (isset($_SESSION['username']) &&
    isset($_SESSION['admin_id'])) {
    include "../../Utils/Validation.php";
    include "../../Database.php";
    include "../../Models/Instructor.php";

   if ($_SERVER['REQUEST_METHOD'] == "POST") {

    

   $username   = Validation::clean($_POST["username"]);
   $first_name = Validation::clean($_POST["fname"]);
   $last_name  = Validation::clean($_POST["lname"]);
   $email      = Validation::clean($_POST["email"]);
   $date_of_birth = Validation::clean($_POST["date_of_birth"]);
   $password      = Validation::clean($_POST["password"]);

   $data = "fname=".$first_name."&uname=".$username."&email=".$email."&bd=".$date_of_birth."&lname=".$last_name;
    
    }else {
        $em = "REQUEST Error";
        Util::redirect("../instructor-add.php", "error", $em);
    }
    if (!Validation::name($first_name)) {
        $em = "Invalid first name";
        Util::redirect("../instructor-add.php", "error", $em, $data);
    }else if (!Validation::name($last_name)) {
        $em = "Invalid last name";
        Util::redirect("../instructor-add.php", "error", $em, $data);
    }else if (!Validation::username($username)) {
        $em = "Invalid user name";
        Util::redirect("../instructor-add.php", "error", $em, $data);
    }else if (!Validation::email($email)) {
        $em = "Invalid email";
        Util::redirect("../instructor-add.php", "error", $em, $data);
    }else if(!Validation::password($password)){
        $em = "Invalid Password";
        Util::redirect("../instructor-add.php", "error", $em, $data);
    }else {

       $db = new Database();
       $conn = $db->connect();
       $user = new Instructor($conn);
       if($user->is_username_unique($username)){
            // password hash
           $password = password_hash($password, PASSWORD_DEFAULT);
           $user_data = [$username, $first_name, $last_name, $email, $date_of_birth, $password ];
           $res = $user->insert($user_data);
           if ($res) {
            $sm = "Successfully registered!";
            Util::redirect("../instructor-add.php", "success", $sm);
           }else {
            $em = "An error occurred";
            Util::redirect("../instructor-add.php", "error", $em, $data);
           }
           $conn = null;
       }else {
        $em = "The username ($username) is already taken";
           Util::redirect("../instructor-add.php", "error", $em, $data);
           $conn = null;

       }
       $conn = null;
    }

}else {
    $em = "First login ";
    Util::redirect("../../login.php", "error", $em);
}