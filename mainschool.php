<?php
if(!isset($_SESSION)) 
{ session_start(); 
    if (isset($_SESSION['allAdminDetails'])) {
    $allAdminDetails = $_SESSION['allAdminDetails'];
} else {
    include_once 'header.php';
}

}
if (isset($_GET["action"]) && ($_GET["action"] == 'school')) {
    include_once 'header.php';
   }
// include_once 'header.php';
require_once 'db.php';
$db = new SchoolDB;
$getStd = $db -> getStd(); 
$getCourse = $db -> getCourse();
$getAdmin = $db->getAdmin();

// if (!isset($_GET['email']) && !isset($_GET['pwd'])) {
//     $_SESSION['allAdminDetails'] = $allAdminDetails;
//     goto end;
// }

if (!empty($_GET['email']) && !empty($_GET['pwd'])) {
$checkEmail = $_GET['email'];
$checkPassword = $_GET['pwd'];


$authorized = $db->checkValidate($checkEmail,$checkPassword);
if ($authorized > 0) {
    // echo "authorized";


$allAdminDetails = $db->getAllAdminDetails($checkEmail);

// echo ($_SESSION['loggedAdmin'][0]);
 foreach ($allAdminDetails as $val) {

    $currentAdminName = $val['name'];
    $currentAdminRole = $val['role']; 
    $currentAdminPhone = $val['phone'];
    $currentAdminEmail = $val['email'];
    $currentAdminPassword = $val['password'];
    // $currentAdminImage = $val['image'];
    
    }
      $allAdminDetails = array();
      $allAdminDetails['name'] = $currentAdminName;
      $allAdminDetails['role'] = $currentAdminRole;
      $allAdminDetails['phone'] = $currentAdminPhone;
      $allAdminDetails['email'] = $currentAdminEmail;
      $allAdminDetails['password'] = $currentAdminPassword;
    //   $allAdminDetails['image'] = $currentAdminImage;
      $_SESSION['allAdminDetails'] = $allAdminDetails;
    //   echo ($_SESSION['allAdminDetails']['role']);
    // end:
      include_once 'header.php';
    } else{
        header("Location: login.php?error=Incorrect%20username%20or%20password");
        die();
    }}
 ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="mainschool.css">
</head>
<br/>
<br/>
<body>

    <div class="allcontainer" > 

    <div class="courses">
    <h2>Courses</h2>
    <a id="top" href="mainschool.php?action=addCourse">+</a>
    <hr>
    <ul>
    <?php 
    for ($x=0;$x<count($getCourse);$x++){ ?>
     <li><a href="mainschool.php?action=courseDetails& <?= http_build_query(array('id' => $getCourse[$x])) ?> ">
      <img src="https://nesea.org/sites/default/files/styles/thumbnail/public/user-icon-default_9614.png?itok=vlQht9Pb" />
      <?= $courses_count = $x+1;?>.<?= $getCourse[$x]['name'] ?>
      <p> <?= $getCourse[$x]['description'] ?></p>
      </a>
    </li>
    <?php } ?>
    </ul>
    </div>

    <div class="students">
    <h2>Students</h2>
    <a id="top" href="mainschool.php?action=addStd">+</a>
    <hr>
    <ul>
    <?php 
    for ($x=0;$x<count($getStd);$x++){ ?>
     <li><a href="mainSchool.php?action=stdDetails& <?= http_build_query(array('id' => $getStd[$x])) ?> " >
      <img src="https://nesea.org/sites/default/files/styles/thumbnail/public/user-icon-default_9614.png?itok=vlQht9Pb" />
      <?= $students_count = $x+1;?>.<?= $getStd[$x]['name'] ?>
      <p> <?= $getStd[$x]['phone'] ?></p>
    </a>
    </li>
<?php } ?>

    </ul>
    </div>

    <div class="main">

    <?php 
    if (!isset($_GET["action"]) || !empty($_GET["mail"])) {
        
        echo "<h2>Welcome,<br/><br/> All Students:".$students_count."<br/></h2>
    <br/><h2> All Courses:".$courses_count."<br/></h2>";
    }
        
        elseif ($_GET["action"] == 'courseDetails') {
                    // $currentCourse = $_GET['id'];
                    // foreach ($currentCourse as $value) { 
                    // echo $value. "</br>";
            include 'courseDetails.php';
            } 

       elseif ($_GET['action'] == 'stdDetails' ){
        // require 'header.php';
        include 'stdDetails.php';
        
       }
        elseif ($_GET["action"] == 'addCourse') {
        include 'addEditCourse.php';
      }
      elseif ($_GET["action"] == 'addStd') {
        include 'addEditStd.php';
       } 
       
    ?><br>
    </div>

    </div>
</body>
</html>