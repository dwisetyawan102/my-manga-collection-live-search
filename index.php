<?php 
  session_start();

  if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
  }

  require "functions.php";
  $mangas = query("SELECT * FROM tbmanga ORDER BY id DESC");

  if( isset($_POST["search"]) ) {
    $mangas = search($_POST["keyword"]);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Manga Collection</title>
  <script src="js/jquery-3.7.1.min.js"></script>
  <script src="js/script.js"></script>
</head>
<body>
  
  <a href="logout.php">Logout</a>

  <h1>MyManga-Collection</h1>

  <a href="add.php">[+] Add new manga</a> <br><br>

  <form action="" method="post">
    <input type="text" name="keyword" size="50" autocomplete="off" autofocus placeholder="search by title / mangaka / year..." id="keyword">
    <!-- <button type="submit" name="search" id="search-button">Search</button> -->
  </form>
  <br>

  <div id="container">
    <table border="1" cellspacing="0" cellpadding="5">
      <tr>
        <th>No.</th>
        <th>Cover</th>
        <th>Title</th>
        <th>Mangaka</th>
        <th>Release Year</th>
        <th>Action</th>
      </tr>
      <?php $i = 1 ?>
      <?php foreach( $mangas as $manga ) { ?>
      <tr>
        <td><?php echo $i++ ?></td>
        <td><img src="cover/<?php echo $manga["cover"] ?>" alt=""></td>
        <td><?php echo $manga["title"] ?><a href="detail.php?id=<?php echo $manga["id"] ?>">Detail</a></td>
        <td><?php echo $manga["mangaka"] ?></td>
        <td><?php echo $manga["releaseyear"] ?></td>
        <td>
          <a href="update.php?id=<?php echo $manga["id"] ?>">Update</a> |
          <a href="delete.php?id=<?php echo $manga["id"] ?>" onclick="return confirm('Delete this manga?');">Delete</a>
        </td>
      </tr>
      <?php } ?>
    </table>
  </div>

</body>
</html>