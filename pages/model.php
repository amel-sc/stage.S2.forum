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
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <title>Forum</title>
</head>
<body>
    <?php
        $page = $_GET['page'];
        // condition for login and sign in page
        if ($page != "login.php" && $page != "sign.php")
        {
            include('../inc/header.php'); 
        }
    ?>
    <main class="container-fluid">
        <!-- page getted -->
        <?php   
            include($page);
            ?>
    </main>
</body>
</html>