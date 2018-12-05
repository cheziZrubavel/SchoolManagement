<?php
    if(!isset($_SESSION)) 
    { session_start(); } 
// require_once 'header.php';
require_once 'db.php';
$db = new SchoolDB;
$getCourse = $db -> getCourse(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="courseDetails.css">
</head>
<body>
</br>
Course X <a class="edit" href="addEditCourse.php">Edit</a>
<hr>
<img src="https://nesea.org/sites/default/files/styles/thumbnail/public/user-icon-default_9614.png?itok=vlQht9Pb" />
<?php $currentCourse = $_GET['id'];
echo "<h1>Course ".($currentCourse['courseName'].",</h1>");
// echo (num_row);
echo ("<br>".$currentCourse['description']);
$Course_Id = $currentCourse['courseId'];                   
 //echo $Course_Id;                               
     $course_Studentsdd = $db->course_Students($Course_Id);
   
   // print_r($course_Studentsdd);
    

 while ($rowIsStudent = $course_Studentsdd->fetch_assoc()) {
     echo $rowIsStudent['studentName'];}
   ?>  
</body>
</html>
