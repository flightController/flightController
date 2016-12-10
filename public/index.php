<!DOCTYPE html>
<?php
include_once '../app/config.php';
include_once '../resources/keys.php';
?>
<html>

<head>
    <title>SkyTracker</title>
    <meta name="description" content="SkyTracker Semesterarbeit 5. Semester der ABBTS in Baden">
    <meta name="author" content="Andreas Reimann, Mauro Stehle, Patrick Elsasser und Sven Humbel">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Own Stylesheet -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

</head>
<body>
<?php
$host = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
if($host != 'skytracker.local/login') {
include_once '../app/view/menu/menu.php';
}

?>
<div class="container body-content">

<?php
    require_once '../app/init.php';
?>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script tpye="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>

</html>

