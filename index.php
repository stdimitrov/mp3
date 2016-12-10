<?php
require_once 'db.php';

$allowed_pages = ['create', 'list', 'show'];
$page = (isset($_GET['page']) &&
        in_array($_GET['page'], $allowed_pages)) ? $_GET['page'] : 'list';

//File name based page var value
switch ($page){
    case 'create' :
        $file_name = 'create.php';
    break;

    case 'list':
        $file_name = 'list.php';
    break;

    case 'show':
        $file_name = 'show.php';
    break;

    default :
        $file_name = 'list.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Exam</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div class="container">
    <div class="row">
        <nav>
            <a href="?page=list" class="btn btn-primary">Messages list</a>
            <a href="?page=create" class="btn btn-primary">Create message</a>
        </nav>
    </div>
    <div class="row">
        <?php
        if(file_exists($file_name)) {
            include $file_name;
        }
        else {
            echo 'Page not found! 404';
            exit;
        }
        ?>
    </div>
</div>
</body>
</html>
