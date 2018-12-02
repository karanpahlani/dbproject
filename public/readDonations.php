<?php

    require "../config.php";


    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, $options);

        $sql = 'SELECT itemId,
                    itemName,
                    quantity
               FROM donation
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
    <title>Donations</title>

</head>
<body>
<div id="container">
    <h1>All Donations</h1>
    <table class="table table-bordered table-condensed">
        <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Job Title</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $q->fetch()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['itemId']) ?></td>
                <td><?php echo htmlspecialchars($row['itemName']); ?></td>
                <td><?php echo htmlspecialchars($row['quantity']); ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
    <a href="index.php">Back to home</a>
</body>
</div>
</html>
