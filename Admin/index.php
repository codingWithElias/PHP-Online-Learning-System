<?php 
session_start();
include "../Utils/Util.php";
if (isset($_SESSION['username']) &&
    isset($_SESSION['admin_id'])) {
    include "../Controller/Admin/Student.php";
    $row_count = getCount();

    $page = 1;
    $row_num = 5;
    $offset = 0;
    $last_page = ceil($row_count / $row_num);
    if(isset($_GET['page'])){
    if($_GET['page'] > $last_page){
        $page = $last_page;
    }else if($_GET['page'] <= 0){
        $page = 1; 
    }else $page = $_GET['page'];
    }
    if($page != 1) $offset = ($page-1) * $row_num;
    $students = getSomeStudent($offset, $row_num);
    # Header
    $title = "EduPulse - Students ";
    include "inc/Header.php";

?>

<div class="container">
  <!-- NavBar -->
  <?php include "inc/NavBar.php"; ?>
  
  <div class="list-table pt-5">
  <?php if ($students) { ?>
  <h4>All Students (<?=$row_count?>)</h4>

  <table class="table table-bordered">
      <tr>
        <th>#Id</th>
        <th>Full name</th>
        <th>Status</th>
        <th>Block/ Unblock</th>
      </tr>
      <?php foreach ($students as $student) {?>
      <tr>
      <td><?=$student["student_id"]?></td>
       <td><a href="Student.php?student_id=<?=$student["student_id"]?>"><?=$student["first_name"]?> <?=$student["last_name"]?></a></td>
       <td class="status"> <?=$student["status"]?></td>
       <td class="action_btn">
        <?php  
        $status = $student["status"];
        $student_id = $student["student_id"];
        $text_temp = $student["status"] == "Active" ? "Block": "Unblock";
        ?>
        <a href="javascript:void()" onclick="ChangeStatus(this, <?=$student_id?>)" class="btn btn-danger"><?=$text_temp?></a>
       </td>
      </tr>
      <?php } ?>
  </table>
  <?php if ($last_page > 1 ) { ?>
  <div class="d-flex justify-content-center mt-3 border">
      <?php
            $prev = 1;
            $next = 1;
            $next_btn = true;
            $prev_btn = true;
            if($page <= 1) $prev_btn = false; 
            if($last_page ==  $page) $next_btn = false; 
            if($page > 1) $prev = $page - 1;
            if($page < $last_page) $next = $page + 1;
            
            if ($prev_btn){
            ?>
            <a href="index.php?page=<?=$prev?>" class="btn btn-secondary m-2">Prev</a>
           <?php }else { ?>
            <a href="#" class="btn btn-secondary m-2 disabled">Prev</a>
            
           <?php 
           }
           $push_mid = $page;
           if ($page >= 2)  $push_mid = $page - 1;
           if ($page > 3)  $push_mid = $page - 3;
          
           for($i = $push_mid; $i < 5 + $page; $i++){
            if($i == $page){ ?>
             <a href="index.php?page=<?=$i?>" class="btn btn-success m-2"><?=$i?></a>
           <?php }else{ ?>
             <a href="index.php?page=<?=$i?>" class="btn btn-secondary m-2"><?=$i?></a>

           <?php } 
           if($last_page <= $i)break;

            } 
            if($next_btn){
            ?>
            <a href="index.php?page=<?=$next?>" class="btn btn-secondary m-2">Next</a>
        <?php }else { ?>
           <a href="#" class="btn btn-secondary m-2 disabled" des>Next</a>
        <?php } ?>
  </div>

  <?php }}else { ?>
    <div class="alert alert-info" role="alert">
      0 students record found in the database
</div>

  <?php } ?>
  </div>



</div>
 <!-- Footer -->
<?php include "inc/Footer.php"; ?>
<script src="../assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
  var valu= "";
  var btext= "";
  function ChangeStatus(current, stud_id){
    var cStatus = $(current).parent().parent().children(".status").text().toString();
   
    if (cStatus == "Active") {
      valu = "Not Active";
      btext = "Unblock";
    }
    else {
      valu= "Active";
      btext = "Block"; 
    }

    $.post("Action/active-student.php",
    {
      student_id: stud_id,
      val: valu
    },
    function(data, status){
      if (status == "success") {
        $(current).parent().parent().children(".status").text(valu);
        $(current).parent().parent().children(".action_btn").children("a").text(btext);
       
      }

    });
  }
</script>
<?php
 }else { 
$em = "First login ";
Util::redirect("../login.php", "error", $em);
} ?>