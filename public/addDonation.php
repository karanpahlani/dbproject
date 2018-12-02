<?php

/**
 * Use an HTML form to create a new entry in the
 * users table.
 *
 */


if (isset($_POST['submit'])) {
    require "../config.php";
    require "../common.php";

    try  {
        $connection = new PDO($dsn, $username, $password, $options);

        $new_donation = array(
            "userId" => $_POST['userId'],
            "itemId" => $_POST['itemId'],
            "itemName"  => $_POST['itemName'],
            "quantity" => $_POST['quantity'],

        );

        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
            "donation",
            implode(", ", array_keys($new_donation)),
            ":" . implode(", :", array_keys($new_donation))
        );

        $statement = $connection->prepare($sql);
        $statement->execute($new_donation);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>

<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) { ?>
    <blockquote><?php echo $_POST['itemName']; ?> successfully added.</blockquote>
<?php } ?>

<h2>Add a Donation</h2>

<form method="post">
    <label for="userId">User Id</label>
    <input type="text" name="userId" id="userId">
    <label for="itemId">Item Id</label>
    <input type="text" name="itemId" id="itemId">

    <label for="itemName">Item Name</label>
    <input type="text" name="itemName" id="itemName">

    <label for="quantity">quantity</label>
    <input type="text" name="quantity" id="quantity">

    <input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>
