<?php

/**
 * Establishes a connection to the database
 * @return PDO
 */
function getDBConnection(): PDO
{
    try {
        $db_connection = new PDO('mysql:host=db; dbname=collectiondb', 'root', 'password');
        $db_connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $db_connection;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
