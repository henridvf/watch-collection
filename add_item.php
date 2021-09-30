<?php
require_once 'functions.php';

// define variables and set to empty values
$nameErr = $linkErr = "";
$name = $link = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = check_input($_POST["name"]);
    }

    if (empty($_POST["link"])) {
        $link = "";
    } else {
        $link = check_input($_POST["link"]);
        // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $link)) {
            $linkErr = "Invalid link URL";
        }
    }
}

function check_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<!DOCTYPE html>
<html lang="en-GB">
<head>
    <title>Add Collection Item</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/normalize.css"/>
    <link rel="stylesheet" href="css/form.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
<form method="POST" action="insert_item.php">
    <div class="contentform">
        <h2>Add New Watch</h2>
        <section>

            <label for="name">
                Name <span class="error">* <?php echo $nameErr; ?></span>
            </label>
            <input type="text" id="name" name="watch_name">

            <label for="brand">
                <span>Brand</span>
                <select name="brand">
                    <option value="">Select...</option>
                    <?php
                    $brands = getAllBrands();
                    foreach ($brands as $brand) {
                        echo '<option value="' . $brand['id'] . '">' . $brand['name'] . '</option>';
                    }
                    ?>
                </select>
            </label>

            <div class="price-date">
                <label class="input-left" for="price">Price
                    <input type="number" id="price" name="price" min="0.00" max="10000.00">
                </label>
                <label class="input-right" for="date">Date Purchased
                    <input type="date" name="purchase_date">
                </label>
            </div>

            <label for="link">Link <span class="error"><?php echo $linkErr; ?></span>
                <input type="url" id="link" name="link">
            </label>

            <label for="image">Image</label>
            <input type="text" id="image" name="image">

            <label for="notes">Notes</label>
            <textarea id="notes" name="notes" rows="3" cols="30" placeholder="Type your notes here..."></textarea>

        </section>
        <div>
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
            <a href="index.php" title="Cancel">Cancel</a>
        </div>

    </div>
</form>
</body>
</html>
