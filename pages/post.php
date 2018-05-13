<?php
  require('../partials/db.php');
  require('../partials/config.php');

  if(isset($_POST['delete'])){
    //Get form data
    $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

    //$query = "INSERT INTO posts(title, author, body) VALUES('$title', '$author', '$body')";

    $query = "DELETE FROM posts WHERE id = {$delete_id}";

    if(mysqli_query($conn, $query)){
      header('Location: '.ROOT_URL.'');
    } else {
      echo 'error: '. mysqli_error($conn);
    }
  }

  //get id
  $id= mysqli_real_escape_string($conn, $_GET['id']);

  $query = 'SELECT * FROM posts WHERE id = '.$id;

  //Get result
  $result = mysqli_query($conn, $query);

  //Fetch data
  $post = mysqli_fetch_assoc($result);


  //Free results from memory
  mysqli_free_result($result);

  //Close connection
  mysqli_close($conn)
 ?>

<?php include('../partials/header.php');?>
  <div class="container">
    <a href="<?php echo ROOT_URL;?>" class="btn btn-default">Back</a>
    <h1><?php echo $post['title'];?></h1>
    <small>Created on <?php echo $post ['created_at']; ?>
    <?php echo $post['author']; ?></small>
    <p><?php echo $post['body']; ?></p>
    <hr>
    <form class="pull-right" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <input type="hidden" name="delete_id" value="<?php echo $post['id']; ?>">
      <input type="submit" name="delete" value="Delete" class="btn btn-danger">
    </form>
    <a href="<?php echo ROOT_URL; ?>pages/editpost.php?id=<?php echo $post['id'];?>" class="btn btn-default">Edit</a>
  </div>
<?php include('../partials/footer.php');?>
