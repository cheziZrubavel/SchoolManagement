<?php
if(!isset($_SESSION)) 
{ session_start();
    $allAdminDetails = $_SESSION['allAdminDetails']; } 
// require_once 'header.php';
include_once 'db.php';
$db = new SchoolDB;
$getStd = $db -> getStd(); 
$getCourse = $db ->getCourse();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="addEditCourse.css">
</head>
<body>

<br>
<br>
<br>

    <form method="GET" action="addEditCourse.php">
    <button class="save" name="action" value="save">Save</button>
    <button class="delete" name="action" value="delete" onclick="return confirm('are you sure?')">Delete</button>
    <br>
    Name: <input type="text" name="name"><br>
    Description: <textarea type="text" name="description"></textarea><br>
    Image: <input type="file" name="img"><br>
    
    <br>
    Total X students taking this course
    <br>
    </form>
    
<?php
if (isset($_GET['action'])) {

    if ($_GET['action'] == "save"){
        isset($_GET['name']) ? $newCourseName = $_GET['name'] : '' ;
        isset($_GET['description']) ? $newCourseDesc = $_GET['description'] : '' ;
        isset($_GET['img']) ? $newCourseImg = $_GET['img'] : '' ;
        $newCourse = $db->newCourse($newCourseName, $newCourseDesc, $newCourseImg);
        echo "Course saved!";
        header("location:courseDetails.php");
    } 
    elseif ($_GET['action'] == 'delete') {
        isset($_GET['name']) ? $newCourseName = $_GET['name'] : '' ;
        isset($_GET['description']) ? $newCourseDesc = $_GET['description'] : '' ;
        isset($_GET['img']) ? $newCourseImg = $_GET['img'] : '' ;
        $deleteCourse = $db->deleteCourse($newCourseName, $newCourseDesc, $newCourseImg);
        echo "Course deleted!";
        // header("location:mainSchool.php");
    }
}
?>
</body>
</html>