<?php
include "connect.php";
$sql = "select * from games";
$query = $conn->prepare($sql); 
$query->execute();

$result= $query->fetchAll();

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
	<header>
	<div class=" navbar navbar-dark bg-danger">
		<ul class="nav navbar-nav">
				<span>
				<a class="btn btn-danger float-left" href="index.php">Planning</a>
			</ul>
		</div>
	</header>
<div>
	<table class="table">
	  <thead class="bg-dark text-white">
	    <tr >
	      <th scope="col">#</th> 
	      <th scope="col">Name</th>
	      <th scope="col">Min players</th>
	      <th scope="col">Max players</th>
	      <th></th>
	    </tr>
	  </thead>
	  <tbody>
	   	<?php
	   		foreach ($result as $row ) {
	   			?>	
	   			<tr>
	   				<td><?php echo $row[id]?></td>
	   				<td><a href="details.php?id=<?php echo $row[id]?>"><?php echo $row[name]?></td>
	   				<td><?php echo $row[min_players]?></td>
	   				<td><?php echo $row[max_players]?></td>
	   				<td><a href="plangame.php?id=<?php echo $row['id'] ?>&minplayers=<?php echo $row['min_players'] ?>&max_players=<?php echo $row['max_players'] ?>&name=<?php echo $row['name']?>"><i id="add" class="fas fa-plus-square" color= green></i></a></td>
	   			</tr>
	   		<?php    }?>
	   		
			
	   
	  </tbody>
	</table>
  </div>
</body>
</html>