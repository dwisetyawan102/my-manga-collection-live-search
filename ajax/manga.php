<?php 
  require '../functions.php';

  $keyword = $_GET["keyword"];
  
  $query = "SELECT * FROM tbmanga WHERE title LIKE '%$keyword%' OR mangaka LIKE '%$keyword%' OR releaseyear LIKE '%$keyword%'";
  $mangas = query($query);

?>

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