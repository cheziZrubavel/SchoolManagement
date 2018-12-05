<?php

if(isset($_SESSION)) 
{ session_destroy(); } ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <header></header>

<br/>
<br/>
<br/>

<form method="GET" action="mainSchool.php">

<div>
<h3>Email: <input type="text" name="email" required /></h3>
<h3>Password: <input type="text" name="pwd" required /></h3>
<button>Login</button>
</div>
</form>
    <?php if (isset($_GET['error'])) { ?>
        <h3 style="color:red"><?= $_GET['error'] ?></h3>
    <?php }
    // if(isset($_SESSION)) 
    // { session_destroy(); } ?>

</body>
</html> 