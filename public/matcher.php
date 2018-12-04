<?php


if (isset($_POST['submit'])) {
    try  {

        require "../config.php";
        require "../common.php";

        $connection = new PDO($dsn, $username, $password, $options);

        $sql = 'SELECT userId,
                      itemId,
                    itemName,
                    quantity
               FROM donation
              WHERE itemId = :itemId';

        $itemId = $_POST['itemId'];

        $statement = $connection->prepare($sql);
        $statement->bindParam(':itemId', $itemId, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>
<?php require "templates/header.php"; ?>

<?php
if (isset($_POST['submit'])) {
    if ($result && $statement->rowCount() > 0) { ?>
        <h2>Results</h2>

        <table>
            <thead>
            <tr>
                <th>UserId</th>
                <th>ItemId</th>
                <th>Item Name</th>
                <th>Quantity</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($result as $row) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['userId']) ?></td>
                    <td><?php echo htmlspecialchars($row['itemId']) ?></td>
                    <td><?php echo htmlspecialchars($row['itemName']); ?></td>
                    <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <blockquote>No results found for <?php echo escape($_POST['itemId']); ?>.</blockquote>
    <?php }
} ?>

<h2>Find user based on location</h2>

<form method="post">
    <label for="itemId">Item ID</label>
    <input type="text" id="itemId" name="itemId">
    <input type="submit" name="submit" value="View Results">
</form>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>
