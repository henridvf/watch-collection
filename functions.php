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
    $path='';
    $imageStartsWith = substr($imagePath, strlen('http'));
    if (!$imageStartsWith) {
        $path = 'https://via.placeholder.com/250/FAFAD2';
    } elseif ($imageStartsWith === 'http') {
        $path = $imagePath;
    } else {
        $path = 'images/' . $imagePath;
    }
    return $path;
}
