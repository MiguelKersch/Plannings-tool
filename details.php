<?php 
include"connect.php";
$id = $_GET[id];

$sql = 'SELECT * from Games where id = :id';
$query = $conn->prepare($sql);
$query->bindParam(":id", $id);
$query->execute();

$result = $query->fetchAll();

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="planning.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title></title>
</head>
<body>
		<header class="fluid-container">
	<div class=" navbar navbar-dark bg-danger">
		<ul class="nav navbar-nav">
				<span>
			<a class="btn btn-danger float-left" href="sqlOpdracht.php">back</a>
		</ul>
	</div>
	</header>
	<div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Naam</th>
      <th scope="col">Photo</th>
      <th scope="col">Uitleg</th>
      <th scope="col">Uitbreidingen</th>
      <th scope="col">Vaardigheden</th>
      <th scope="col">Website</th>
      <th scope="col">Video</th>
      <th scope="col">Minimale spelers</th>
      <th scope="col">Maximale spelers</th>
      <th scope="col">Speeltijd (min)</th>
      <th scope="col">Uitlegtijd (min)</th>

    </tr>
  </thead>
  <tbody>
      <?php
      foreach ($result as $row) { ?>
    <tr>
       <td>
           <?php echo $row['name']; ?>
       </td>
       <td>
           <img src="images/<?php echo $row['image']?>">
       </td>
       <td>
           <?php echo $row['description'];  ?>
       </td>
       <td>
           <?php echo $row['expansions']; ?>
       </td>
       <td>
           <?php echo $row['skills']; ?>
       </td>
       <td>
           <a href="<?php echo $row['url']; ?>">Website</a>
       </td>
       <td>
           <?php echo $row['youtube']; ?>
       </td>
       <td>
           <?php echo $row['min_players']; ?>
       </td>
       <td>
           <?php echo $row['max_players']; ?>
       </td>
       <td>
           <?php echo $row['play_minutes']; ?>
       </td>
       <td>
           <?php echo $row['explain_minutes']; ?>
       </td>
   </tr>
   <?php 
}
?>
</tbody>

</table>
 </div>
</body>
</html>