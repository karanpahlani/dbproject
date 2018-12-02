<?php

if (isset($_POST['submit'])) {
    require "../config.php";
    require "../common.php";

    try  {
        $connection = new PDO($dsn, $username, $password, $options);

        $new_item = array(
            "itemId" => $_POST['itemId'],
            "itemName"  => $_POST['itemName'],
        );

        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
            "item",
            implode(", ", array_keys($new_item)),
            ":" . implode(", :", array_keys($new_item))
        );

        $statement = $connection->prepare($sql);
        $statement->execute($new_item);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>

<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) { ?>
    <blockquote><?php echo $_POST['itemName']; ?> added as a new item type in Items Table.</blockquote>
<?php } ?>

<h2>Add a New Item Type</h2>

<form method="post">
    <label for="itemId">Item Id</label>
    <input type="text" name="itemId" id="itemId">
    <label for="itemName">Item Name</label>
    <input type="text" name="itemName" id="itemName">

    <input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to home</a>
<a href="addDonation.php">Donate</a>

<?php require "templates/footer.php"; ?>
