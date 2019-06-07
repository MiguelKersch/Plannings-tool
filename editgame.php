<?php 
include 'connect.php';

$id = $_GET[id];

$sql = 'SELECT * from activeGames where id = :id';
$query = $conn->prepare($sql);
$query->bindParam(":id", $id);
$query->execute();

$result = $query->fetch();
$players = explode(", ", $result['players']);
?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>Planningtool - Edit Game</title>
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script type="text/javascript">
    function edit() {
      if(!confirm('Weet u zeker dat u dit wilt aanpassen?')){
        return false;
      }
      alert("U heeft de afspraak aangepast.")
      return true;
    }
  </script>
 </head>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<div class="container">
	<p>Geselecteerd spel: <?php echo $result['name']?> </p>
<form method="POST" action="/SQL/edit.php">
	<input type="hidden" name="id" value="<?php echo $id?>">
  <div class="form-group">
    <label for="time">Hoe laat</label>
    <input type="time" name = "time" class="form-control" id="time" value="<?php echo $result['time']?>" placeholder = 'time'>
  </div>
  <div class="form-group">
    <label for="explain">Uitlegger:</label>
    <input type="text" name = "tutor" class="form-control" id="explain" value="<?php echo $result['tutor']?>" placeholder ="<?php echo $tutor?>">
  </div>
<?php for ($i = 0; $i < $result['max_players']; $i++){?>
	<div class="form-group"></div>
	<label for="player">Speler:</label>
		<input type="text" name = "player[]" class name="form-control" id="player" value="<?php echo isset($players[$i]) ? $players[$i]:'' ;?>">
	<?php }?>
  <button type="submit" class="btn btn-primary" onclick="edit();">Submit</button>
</form>
</div>
</body>
</html>