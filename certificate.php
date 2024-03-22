<?php 
 include "Utils/Util.php";
 include "Utils/Validation.php";

 require "Controller/Student/Certificate.php";

 if (!isset($_GET['certificate_id'])) {
    
    Util::redirect("404.php", "error", "404");
 }
 $certificate_id = Validation::clean($_GET['certificate_id']);

  $certificate = getCertificateById($certificate_id);
  if ($certificate == 0) {
    
    Util::redirect("404.php", "error", "404");
 }
 
 $student = getStudent($certificate['student_id']);
 $course = getCourse($certificate['course_id']);
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
     
        
    </style>
    <title>Certificate Design</title>
</head>
<body>

    <div class="certificate" id="certificate">
        <div class="header">Certificate of Achievement </div>
        <div class="content">
        	<img src="assets/img/Logo.png">
            <p>This is to certify that</p>
            <h2><?=$student['first_name']?> <?=$student['last_name']?></h2>
            <p>has successfully completed the course</p>
            <h3><?=$course['title']?></h3>
            <p>on this day, <?=$certificate['issue_date']?></p>
            <p>Certificate ID: #<?=$certificate['certificate_id']?></p>

        </div>
        <div class="signature">
            <p>Signature</p>
            <img src="Assets/img/Signature.jpeg" width="100">
        </div>
    </div>
    <div id="editor"></div>
<!--     <div class="text-center">
    	<button class="btn btn-success" id="downloadBtn">Download Certificate</button> &nbsp;&nbsp; | &nbsp;&nbsp;
        <a href="index.php">Back Home</a>
    </div> -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/jspdf.min.js"></script>
<!--     <script>
        var doc = new jsPDF(); 
        var specialElementHandlers = { 
            '#certificate': function (element, renderer) { return true; } 
        }; 

        $('#downloadBtn').click(function () { 
            doc.fromHTML($('#certificate').html(), 15, 15, { 'width': 1000, 'elementHandlers': specialElementHandlers }); 
            doc.save('Certificate.pdf'); });
    </script> -->
</body>
</html>
