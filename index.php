<!-- <?php 
    session_start();
    require('headerModel.php');
        require('headerView.php');
        require('headercontroller.php');
        $model = new HeaderModel();
        $ctrl = new HeaderController($model);
        $view = new HeaderView($model);
        
        
        if (isset($_GET['action'])) {
            $ctrl->{$_GET['action']}();
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    
    .container {
            width: 100%;            
            display: flex;
        }

        .header1 {
            width: 100%;
            text-align: left;
            box-sizing: border-box;
            height: 60px;
            line-height: 30px;
            border-bottom: 2px solid black;
            padding-left: 30px;
            flex: 1;
        }
        .header2 {
            width: 100%;
            text-align: right;
            box-sizing: border-box;
            height: 60px;
            line-height: 30px;
            border-bottom: 2px solid black;
            padding-left: 30px;
            flex: 1;
        }
    </style>
</head>
<body>
    <?php 
        $view->renderView();
    ?>

</body>
</html> -->
