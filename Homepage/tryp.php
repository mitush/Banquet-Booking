<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IndexPage</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body >
    <?php
        if (!isset($_SESSION)){
            session_start();
        }
        // session_start();
        $tx = $_SESSION['name'];
        echo "XYZ$tx";
    ?>    
    
</body>

</html>