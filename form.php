<?php
include "connect.php";
$id = $_GET[id];
$max_players = $_GET[max];
$query = $conn->prepare($sql); 
$query->bindParam(":max_players",$max_players); 
$query->bindParam(":id",$id); 
$sql= "select * from games where id = :id"; 

$result= $query->fetch();
$query = $conn->prepare($sql); 

$query->bindParam(":id",$result[id]);
$query->bindParam(":name",$result[name]);
$query->bindParam(":play_minutes",$result[play_minutes]);
$query->bindParam(":explain_minutes",$result[explain_minutes]); 
$sql= "insert into activeGames(id,name,play_minutes,explain_minutes) values(:id,:name,:play_minutes, :explain_minutes)";

?>
<!DOCTYPE html>
<html>
<?php include'header.php'?>
<body>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<h2>play minutes</h2>
		<input type="text" name="">
		<br>
		<h2>explain minutes</h2>
		<input type="text" name="">
		<br>
		<h2>players</h2>
		<div>
		<?php
		for ($i=1; $i <= $max_players ; $i++) {
		 echo "$i";
			echo "<input type=text name=$players><br><br>";
		}
		?>	
		<button type="submit"></button>
		</div>
	</form>
</body>
</html>