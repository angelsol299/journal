<?php
  require('../partials/db.php');
  require('../partials/config.php');
  require_once '../partials/session_start.php';

 $username = $_SESSION['username'];
    $userID = $_SESSION['userID'];
  //Check for submit

  if(isset($_POST['submit'])){
    //Get form data

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $userID = $userID;

    $query = "INSERT INTO entries(title, content, userID) VALUES('$title', '$content', '$userID')";

    if(mysqli_query($conn, $query)){
      header("Location: intro.php");
    } else {
      echo 'error: '. mysqli_error($conn);
    }
  }

 ?>

<?php include('../partials/header.php');?>
  <div class="container text-center">
    <br>
    <h2 class="text-success text-center">Post something</h2>
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
      <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control">
      </div>
      <div class="form-group">
        <label>Body</label>
        <textarea name="content" class="form-control"></textarea>
      </div>
      <input type="submit" name="submit" value="Submit" class="btn btn-success">
      <a  class="btn btn-warning" href='intro.php'>Back</a>
    </form>
  </div>
<?php include('../partials/footer.php');?>
