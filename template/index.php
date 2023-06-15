<?php $title = 'Home'?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="./public/styles.css">

    <title><?php echo($title) ?></title>
</head>
<body>
    <?php include('./includes/header.php'); ?>
    <main class="flex-column justify-around align-center">
        <?php

//        phpinfo();

        require_once './BDD/config.php';

        $getPage = $_GET['page'];
        if (isset($getPage)) {
            if ($getPage == 'home') {
                include('./includes/home.php');
            }
            if ($getPage == 'about') {
                include('./includes/about.php');
            }
            if ($getPage == 'fuel') {
                include('./includes/fuel.php');
            }
        } else {
            include('./includes/home.php');
        }

        ?>
    </main>
    <?php include('./includes/footer.php') ?>
</body>
</html>