<?php

require_once 'db.php';

/**
 * Retrieves all the watches from the database
 * @return array
 */
function getAllWatches(): array
{
    $db = getDBConnection();
    $query = $db->prepare(
        "SELECT w.`name`, b.`name` as `brand_name`, w.`image`, w.`purchase_date`, w.`notes`, w.`price`, w.`link` 
            FROM `watches` w
            LEFT JOIN brands b on b.id = w.brand");
    $query->execute();
    return $query->fetchAll();
}

/**
 * Helper function to get and format the image path
 * @param string $imagePath
 * @return string
 */
function getImagePath(string $imagePath): string
{
    $path = '';
    $imageStartsWith = substr($imagePath, 0, strlen('http'));
    if (!$imageStartsWith) {
        $path = 'https://via.placeholder.com/250/FAFAD2';
    } elseif ($imageStartsWith === 'http') {
        $path = $imagePath;
    } else {
        $path = 'images/' . $imagePath;
    }
    return $path;
}

/**
 * Constructs the entire collection into displayable format
 * @return string
 */
function displayCollection(): string
{
    $display = '';
    $watches = getAllWatches();

    foreach ($watches as $watch) {
        // create and add to display collection
        $display .= createCollectionItem($watch);
    }
    return $display;
}

/**
 * Creates the display markup for a single collection item
 * @param $watch
 * @return string
 */
function createCollectionItem($watch): string
{
    $coll_item = '<div class="collection_item">';
    $img_file = is_null($watch["image"]) ? '' : $watch["image"];
    $img = getImagePath($img_file);
    $coll_item .= '<img src="' . $img . '" alt="Picture of a ' . $watch['name'] . '" />';
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

    return $coll_item;
}