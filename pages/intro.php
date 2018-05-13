<?php
require_once '../partials/session_start.php';
require_once '../partials/database.php';
require_once '../partials/expiration.php';

$username = $_SESSION['username'];
$userID = $_SESSION['userID'];

// show all entries from the inlogged user in descending order
$query = "SELECT * FROM entries WHERE userID = '$userID'
ORDER BY createdAt DESC";
$statement = $conn->prepare($query);
$statement->execute(['userID' => $userID]);
$entries = $statement->fetchAll();

include('../partials/header.php');

if ($_SESSION['loggedIn']) { ?>
<div class="container">
    <br>
    <h3 class='text-success text-center' id="top">Welcome back <?php echo $username;?> </h3>
    <br>
    <h4 class="text-dark text-center"> Following is the list of your daily entries</h4>
    <?php
    foreach($entries as $entry) : ?>
        <div class="text-center">
            <br>
            <h3 class='text-dark'><?php echo $entry['title']; ?></h3>
            <small>Created on <?php echo $entry['createdAt']; ?>
            by <?php echo $_SESSION['username']; ?></small>
            <p><?php echo $entry['content']; ?></p>
            <a class="btn btn-warning" href="http://localhost:8888/journal/pages/editpost.php?entryID=
            <?php echo $entry['entryID']; ?>">Edit Post</a>
            <a class="btn btn-danger" href="http://localhost:8888/journal/pages/delete.php?entryID=
            <?php echo $entry['entryID']; ?>">Delete Post</a>
            <br><br>
            <a href="intro.php" class="text-danger">Back to top</a>
        </div>
    <?php endforeach;
      ?>



<?php
// If not logged in - get message
} else { ?>
   </h2> <?php echo 'You must be logged in!'; ?> </h2> <?php
} ?>

<?php require_once '../partials/footer.php'; ?>
