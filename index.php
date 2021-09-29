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
        <?php
            $watches = getAllWatches();

            foreach($watches as $watch) {
                $coll_item = '<div class="collection_item">';
                $img_file = is_null($watch["image"]) ? '' : $watch["image"];
                $img = getImagePath($img_file);
                $coll_item .= '<img src="'. $img .'" alt="Picture of a '. $watch['name'] .'" />';
                $coll_item .= '<h5>' . $watch["brand_name"] . '</h5>';
                $coll_item .= '<p>' . $watch["name"] . '</p>';
                $coll_item .= '<hr>';
                $coll_item .= '<div class="split"><span><strong>Price</strong></span><span>£ ' . $watch["price"] .
                    '</span></div>';
                $coll_item .= '<div class="split"><span><strong>Purchased</strong></span><span>' .
                    $watch["purchase_date"] . '</span></div>';
                $coll_item .= '<hr>';
                $coll_item .= '<p>' . $watch["notes"] . '</p>';
                $coll_item .= '</div>';
                echo $coll_item;
            }; ?>
    </section>

    <section class="main_container footer">
        <p>&copy; Copyright</p>
    </section>

</body>
</html>