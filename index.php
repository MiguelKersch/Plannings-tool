<?php
include "connect.php";
 $sql= "select * from activeGames";
$query = $conn->prepare($sql); 
$query->execute();
$result= $query->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title></title>
</head>
<body>
	<script type="text/javascript">
		function isValid(){
	if (!confirm( 'weet u zeker dat u dit wilt verwijderen?')){
			return false;
	}
	return true;
}

	</script>
	<style type="text/css">
		<?php
		include"planning.css"
		?>
	</style>
	<header>
	<div class=" navbar navbar-dark bg-danger">
		<ul class="nav navbar-nav">
				<span>
				<a class="btn btn-danger float-left" href="sqlOpdracht.php">add</a>
			</ul>
		</div>
	</header>
<div>
<table class="table">
  <thead class="bg-dark text-white">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">play minutes</th>
      <th scope="col">explain minutes</th>
      <th scope="col">min players</th>
      <th scope="col">max players</th>
      <th scope="col">Time</th>
      <th scope="col">players</th>
      <th scope="col">uitleger</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
   	<?php
   		foreach ($result as $row ) {
   			?>	
   			<tr>
   				<td><?php echo $row[id]?></td>
   				<td><?php echo $row[name]?></a></td>
   				<td><?php echo $row[play_minutes]?></td>
   				<td><?php echo $row[explain_minutes]?></td>
   				<td><?php echo $row[min_players]?></td>
   				<td><?php echo $row[max_players]?></td>
   				<td><?php echo $row[time]?></td>
   				<td><?php echo $row[players]?></td>
   				<td><?php echo $row[tutor]?></td>
   				<td><a href="editgame.php?id=<?php echo $row['id'] ?>&minplayers=<?php echo $row['min_players'] ?>&max_players=<?php echo $row['max_players'] ?>&name=<?php echo $row['name']?>"<i id="edit" class="fas fa-edit"></i></a></td>
   				<td><a onclick="return isValid()" href="delete.php?id=<?php echo $row[id]?>"><i id="trash" class="fas fa-trash-alt"></i></a></td>
   			</tr>
   		<?php    }?>
  </tbody>
</table>
</div>
</body>
</html>