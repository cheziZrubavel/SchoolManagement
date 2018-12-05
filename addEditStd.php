<?php
if(!isset($_SESSION)) 
{ session_start();
    $allAdminDetails = $_SESSION['allAdminDetails']; } 
// require_once 'header.php';
require_once 'db.php';
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
    <link rel="stylesheet" type="text/css" href="addEditStd.css">
</head>
<body>
    <form id="form" method="GET" action="addEditStd.php">
    <button class="save" name="action" value="save">Save</button>
    <button class="delete" name="action" value="delete" onclick="return confirm('are you sure?')">Delete</button><br>
    Name: <input type="text" name="name"><br>
    Phone: <input type="text" name="phone"><br>
    Email: <input type="text" name="email"><br>
    Image: <input type="file" name="img"><br>
    Courses:
    <br>
    <ul>
    <?php for ($x=0;$x<count($getCourse);$x++){ ?>
    <li><input type="checkbox" name="checkbox[]" value="<?= $getCourse[$x]['name'] ?>"> <?= $getCourse[$x]['name'] ?> </li><br>
    <?php } ?>
    <br>
    </ul>
    </form>

<?php
if (isset($_GET['action'])) {
        if (isset($_GET['checkbox'])) {
        $name = $_GET['checkbox'];
        if (is_array($name) || is_object($name)){
        $checkedCourses = '';
        foreach ($name as $value) {
            $checkedCourses .= $value. "</br>";
        }
        return $checkedCourses;
        }
        }
    
    if ($_GET['action'] == 'save'){
        isset($_GET['name']) ? $newStdName = $_GET['name'] : '' ;
        isset($_GET['phone']) ? $newStdPhone = $_GET['phone'] : '' ;
        isset($_GET['email']) ? $newStdEmail = $_GET['email'] : '' ;
        isset($_GET['img']) ? $newStdImg = $_GET['img'] : '' ;
        $newStd = $db ->newStd($newStdName, $newStdPhone, $newStdEmail, $newStdImg);
        echo "Student saved!";
        // echo ($checkedCourses);
    } 

    elseif ($_GET['action'] == 'delete') {
        isset($_GET['name']) ? $newStdName = $_GET['name'] : '' ;
        isset($_GET['phone']) ? $newStdPhone = $_GET['phone'] : '' ;
        isset($_GET['email']) ? $newStdEmail = $_GET['email'] : '' ;
        isset($_GET['img']) ? $newStdImg = $_GET['img'] : '' ;
        $deleteStd = $db ->deleteStd($newStdName, $newStdPhone, $newStdEmail, $newStdImg);
        echo "Student deleted!";
        // echo ($checkedCourses);
    }
    
    
}
?>
</body>
</html>