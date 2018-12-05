<?php
if(!isset($_SESSION)) 
{ session_start(); } 
include_once 'header.php';
include_once 'db.php';
$db = new SchoolDB;
$getAdmin = $db -> getAdmin(); 
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="mainAdmin.css">
</head>
<br/>
<br/>
<body>

    <div class="allcontainer" >

    <div class="Administrators">
    <h2>Administrators</h2>
    <a id="top" href="mainAdmin.php?action=addAdmin">+</a>
    <hr>
    <ul>
    <?php 
    for ($x=0;$x<count($getAdmin);$x++){ ?>
     <li><a href="mainAdmin.php?action=editAdmin& <?= http_build_query(array('id' => $getAdmin[$x])) ?> ">
      <img src="https://nesea.org/sites/default/files/styles/thumbnail/public/user-icon-default_9614.png?itok=vlQht9Pb" />
      <?= $admin_count = $x+1;?>.<?= $getAdmin[$x]['name'] ?>, <?= $getAdmin[$x]['role'] ?>
      <p> <?= $getAdmin[$x]['phone'] ?></p>
      <p> <?= $getAdmin[$x]['email'] ?></p>
    </a>
    </li>
<?php } ?>

    </ul>
    </div>

    <div class="main">

    <?php echo "<h2>Welcome,<br/><br/> All administrators:".$admin_count."<br/></h2>";
    
    if (!isset($_GET["action"]) || !empty($_GET["mail"])) {}
        
      elseif ($_GET["action"] == 'addAdmin') {
        // $_SESSION['adminPhone']
        //  $currentAdmin = $_GET['id'];
        // echo "<h1>Admin ".($currentAdmin['name'].",</h1>");
        // echo (num_row);
        // echo ("<br>".$currentAdmin['role']);
        
        include 'addEditAdmin.php';
       } 
       elseif ($_GET["action"] == 'editAdmin') {
        include 'addEditAdmin.php';
    } 
       ?><br>
    </div>

    </div>
</body>
</html>