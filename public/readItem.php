<?php

require "../config.php";


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, $options);

    $sql = 'SELECT itemId,
                    itemName
               FROM item
              ORDER BY itemName';

    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Items</title>

</head>
<body>
<div id="container">
    <h1>All Items</h1>
    <table class="table table-bordered table-condensed">
        <thead>
        <tr>
            <th>ItemID</th>
            <th>Item Name</th>

        </tr>
        </thead>
        <tbody>
        <?php while ($row = $q->fetch()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['itemId']) ?></td>
                <td><?php echo htmlspecialchars($row['itemName']); ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
    <a href="index.php">Back to home</a>
</div>
</body>

</html>
