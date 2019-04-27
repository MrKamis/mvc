<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>template</title>
    <base href="\">
    <link href="/public/stylesheets/bootstrap.min.css" rel="stylesheet">
    <link href="/public/stylesheets/main.css" rel="stylesheet">
</head>
<body>
    <?php
        require_once __DIR__ . '/app/helpers/router.php';
        Router::route($_GET);
    ?>
    <script src="/public/javascripts/jquery.min.js"></script>
    <script src="/public/javascripts/popper.min.js"></script>
    <script src="/public/javascripts/bootstrap.min.js"></script>
    <script src="/public/javascripts/main.js"></script>
</body>
</html>