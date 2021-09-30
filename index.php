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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <section class="main_container heading">
        <div><h2>Watches Collection</h2></div>
        <div><a href="add_item.php" title="Add Collection Item">Add Collection Item</a></div>
    </section>

    <section class="main_container collection">
        <?php echo displayCollection(); ?>
    </section>

    <section class="main_container footer">
        <p>&copy; Copyright</p>
    </section>

</body>
</html>