<?php
  require('../partials/db.php');
  require('../partials/config.php');

  //Check for submit

  if(isset($_POST['submit'])){
    //Get form data
    $update_entryID = mysqli_real_escape_string($conn, $_POST['update_entryID']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);


    //$query = "INSERT INTO posts(title, author, body) VALUES('$title', '$author', '$body')";

    $query = "UPDATE entries SET
      title= '$title',
      content= '$content'
        WHERE entryID = {$update_entryID}";

    if(mysqli_query($conn, $query)){
      header('Location: intro.php');
    } else {
      echo 'error: '. mysqli_error($conn);
    }
  }

  //get id
  $entryID= mysqli_real_escape_string($conn, $_GET['entryID']);

  $query = 'SELECT * FROM entries WHERE entryID = '.$entryID;

  //Get result
  $result = mysqli_query($conn, $query);

  //Fetch data
  $entries = mysqli_fetch_assoc($result);


  //Free results from memory
  mysqli_free_result($result);

  //Close connection
  mysqli_close($conn);


 ?>

<?php include('../partials/header.php');?>
  <div class="container text-center">
    <h1>Edit your Post</h1>
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
      <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control" value="<?php echo $entries['title']; ?>">
      </div>
      <div class="form-group">
        <label>Content</label>
        <textarea name="content" class="form-control"><?php echo $entries['content']; ?></textarea>
      </div>
      <input type="hidden" name="update_entryID" value="<?php echo $entries['entryID'];?>">
      <input type="submit" name="submit" value="Ready" class="btn btn-info">
      <a  class="btn btn-warning" href='http://localhost:8888/journal/pages/intro.php'>Back</a>
    </form>
  </div>
<?php include('../partials/footer.php');?>
