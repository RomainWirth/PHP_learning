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

        $getPage = $_GET['page'];
        if (isset($getPage)) {
            if ($getPage == '' || $getPage == 'home') {
                include('./includes/home.php');
            }
            if ($getPage == 'about') {
                include('./includes/about.php');
            }
        } else {
            echo '404 page not found';
        }


        require_once './BDD/config.php';
        phpinfo();
        ?>
    </main>
    <?php include('./includes/footer.php') ?>
</body>
</html>