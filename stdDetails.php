<?php
    if(!isset($_SESSION)) 
    { session_start();} 
// include_once 'header.php';
include_once 'db.php';
$db = new SchoolDB;
$getStd = $db -> getStd(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="stdDetails.css">
</head>
<body>

Student <a class="edit" href="addEditStd.php">Edit</a>

<hr>
</br>

<img src="https://nesea.org/sites/default/files/styles/thumbnail/public/user-icon-default_9614.png?itok=vlQht9Pb" />
<?php $currentStd = $_GET['id'];
echo "<h1>".($currentStd['name']."</h1>");
echo ("<br>".$currentStd['phone']);
echo ("<br>".$currentStd['email']);
// echo (num_row);

$student_Course = $db -> student_Course(); 
// print_r ($student_Course);
for ($x=0;$x<count($student_Course);$x++){ ?>
      <?= $student_Course[$x] ?>
      <p> <?= $student_Course[$x]?></p>
    <?php } ?>
</body>
</html>
