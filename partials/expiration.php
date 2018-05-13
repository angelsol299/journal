

<?php
    // Message and a link if not logged in
    if (!isset($_SESSION['loggedIn'])) {
      echo "You are logged out, please"?>
      <a class='btn btn-success' href='../index.php'>Login again</a>
<?php
    } else {
        $start = time(); // Checking the time now when home page starts.

        if ($start > $_SESSION['expire']) {
            session_destroy();
            echo "You session is expired, please"?>
            <link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
            <a class='btn btn-success' href='../index.php'>Login again</a>
  <?php      }
    }
?>
