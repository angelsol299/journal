
<?php
require_once 'partials/session_start.php';


if (isset($_GET["message"])) {
   echo $_GET["message"];
}

if (!isset($_SESSION["loggedIn"])): ?>
<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="css/form.css" type="text/css">
<div class="module text-center">
  <div class="module">
    <h1 class="text-white">Create an account</h1><br>
    <form class="form" action="partials/register.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <input type="text" placeholder="User Name" name="username" required />
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
    <br>
    <h1 class="text-white">Log in</h1>
    <br>
    <form  class="form" action="partials/signin.php" method="POST">
      <input type="text" name="username">
      <input type="password" name="password">
      <input type="submit" value="Login" class="btn btn-block btn-primary">
    </form>
  </div>
</div>
<?php endif; ?>
  <?php require 'partials/footer.php';?>
