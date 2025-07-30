<?php
    require('../inc/function.php'); 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- bootstrap -->
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
    <title>Document</title>
</head>
<body>
    <main class="container">
        <!-- page getted -->
        <?php $page = $_GET['page']; ?>
        <?php   
            include($page);
            ?>
    </main>
</body>
</html>