<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <title><?= $title ?></title>
</head>

<body>
    <!-- load header -->
    <?php require VIEWS . '/partials/header.php'; ?>
    <!-- end header -->
    <div class="container">
        <!-- load view contents  -->
        <?php require VIEWS_CONTENTS . $view . '.php'; ?>
        <!-- end view contents -->
    </div>
    <!-- load footer -->
    <?php require VIEWS . '/partials/footer.php'; ?>
    <!-- end footer -->
</body>

</html>