
<?php
require_once '../partials/database.php';

//getting id of the data from url
$entryID = $_GET['entryID'];

//deleting the post
$query = "DELETE FROM entries WHERE entryID=:entryID";
$statement = $conn->prepare($query);
$statement->execute([':entryID' => $entryID]);

//redirecting to the display page (index.php in our case)
header("Location: intro.php");
?>
