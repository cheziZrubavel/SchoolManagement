<?php
if(!isset($_SESSION)) 
{ session_start();
    $allAdminDetails = $_SESSION['allAdminDetails']; } 
require_once 'header.php';
require_once 'db.php';
$db = new SchoolDB;
$getStd = $db -> getStd(); 
$getAdmin = $db ->getAdmin();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="addEditAdmin.css">
    <title>Document</title>
</head>
<body>
    <form method="GET" action="addEditAdmin.php">
    <button class="save" name="action" value="save">Save</button>
    <button class="delete" name="action" value="delete" onclick="return confirm('are you sure?')">Delete</button><br>
    Name: <input type="text" name="name"><br>
    Phone: <input type="text" name="phone"><br>
    Email: <input type="text" name="email"><br>
    Role: <input type="text" name="role"><br>
    Image: <input type="file" name="img"><br>
    </form>
    
    <?php
if (isset($_GET['action'])) {
    
    if ($_GET['action'] == 'save'){
        isset($_GET['name']) ? $newAdminName = $_GET['name'] : '' ;
        isset($_GET['phone']) ? $newAdminPhone = $_GET['phone'] : '' ;
        isset($_GET['email']) ? $newAdminEmail = $_GET['email'] : '' ;
        isset($_GET['role']) ? $newAdminEmail = $_GET['role'] : '' ;
        isset($_GET['img']) ? $newAdminImg = $_GET['img'] : '' ;
        $newAdmin = $db ->newAdmin($newAdminName, $newAdminPhone, $newAdminEmail, $newAdminImg);
        echo "Admin saved!";
        // echo ($checkedCourses);
    } 

    elseif ($_GET['action'] == 'delete') {
        isset($_GET['name']) ? $newAdminName = $_GET['name'] : '' ;
        isset($_GET['phone']) ? $newAdminPhone = $_GET['phone'] : '' ;
        isset($_GET['email']) ? $newAdminEmail = $_GET['email'] : '' ;
        isset($_GET['role']) ? $newAdminEmail = $_GET['role'] : '' ;
        isset($_GET['img']) ? $newAdminImg = $_GET['img'] : '' ;
        $deleteAdmin = $db ->deleteAdmin($newAdminName, $newAdminPhone, $newAdminEmail, $newAdminImg);
        echo "Admin deleted!";
        // echo ($checkedCourses);
    }
    
}
?>

</body>
</html>