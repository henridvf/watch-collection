<?php

$name = $_POST['watch_name'];
$price = $_POST['price'];
$brand = $_POST['brand'];
$purchase_date = $_POST['purchase_date'];
$notes = $_POST['notes'];
$link = $_POST['link'];
$image = $_POST['image'];

$my_date = date("Y-m-d", strtotime($purchase_date));


try {
    $db_connection = new PDO('mysql:host=db; dbname=collectiondb', 'root', 'password');
    $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql =  "INSERT INTO `watches` (`name`, `brand`, `purchase_date`, `notes`, `price`, `link`, `image`)
            VALUES ('$name', '$brand', '$purchase_date', '$notes', '$price', '$link', '$image')";

    // use exec() because no results are returned
    $db_connection->exec($sql);

} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$db_connection = null;

header('Location: index.php');


