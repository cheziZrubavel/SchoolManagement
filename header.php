<?php 
if(!isset($_SESSION)) 
{ session_start();
    $allAdminDetails = $_SESSION['allAdminDetails']; } 

// include_once 'mainSchool.php';
?>
    <div class="container">
    <header class="header1" style="float: right";>
    <!-- <?= $allAdminDetails['image'] ?> -->
    <?php if (isset($_SESSION['allAdminDetails'])) {
        $allAdminDetails = $_SESSION['allAdminDetails'];?>
     <?=$allAdminDetails['name'] ?>,<?= $allAdminDetails['role'] ;}?><br>
    <a href="login.php?action=logout">Logout</a>
</header>
<header class="header2">
<?php if (isset($_SESSION['allAdminDetails'])) {
                $allAdminDetails = $_SESSION['allAdminDetails'];} ?>
    <a href="mainSchool.php?action=school">School</a>
    <?php if (($allAdminDetails['role']) != 'sales'){ echo "|<a href='mainAdmin.php?action=admin'>Administrators</a>";}
?>
</header>

</div>
<br>

<hr/>
