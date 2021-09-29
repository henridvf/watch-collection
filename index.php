<?php
    require_once 'functions.php';
?>

<!DOCTYPE html>
<html lang="en-GB">
<head>
    <title>Watches Collection</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/styles.css" />
</head>
<body>
    <section class="main_container heading"><h2>Watches Collection</h2></section>

    <section class="main_container collection">
        <?php echo displayCollection(); ?>
    </section>

    <section class="main_container footer">
        <p>&copy; Copyright</p>
    </section>

</body>
</html>