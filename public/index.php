<?php include "templates/header.php"; ?>
    <link rel="stylesheet" href="css/style.css">
<h1>DASHBOARD</h1>
    <h2>USERS</h2>
<ul>

	<li><a href="create.php"><strong>Add New User</strong></a></li>
	<li><a href="read.php"><strong>Find a User</strong></a></li>
</ul>


    <h2>Items</h2>
<ul>
    <li><a href="addItem.php"><strong>Add a Item Type</strong></a></li>
    <li><a href="readItem.php"><strong>List of Items</strong></a></li>
</ul>

<h2>Requests</h2>
<li><a href="matcher.php"><strong>Request for Aid</strong></a></li>

    <h2>Donations</h2>
<ul>
    <li><a href="addDonation.php"><strong>Add a Donation</strong></a></li>
   <li> <a href="readDonations.php">View Donations</a> </li>
</ul>
<?php include "templates/footer.php"; ?>