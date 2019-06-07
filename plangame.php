<?php 
include 'connect.php';

$id = $_GET[id];
$name = $_GET[name];
$minplayers = $_GET[min_players];
$maxplayers = $_GET[max_players];

$sql = 'SELECT * from Games where id = :id';
$query = $conn->prepare($sql);
$query->bindParam(":id", $id);
$query->execute();

$result = $query->fetchAll();?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>Planningtool - Plan Game</title>
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	  <script type="text/javascript">
    function add() {
      if(!confirm('Weet u zeker dat u dit spel wilt toevoegen?')){
        return false;
      }
      alert("U heeft de game toegevoegd.")
      return true;
    }
  </script>
 </head>




<div class="container">
	<p>Geselecteerd spel: <?php echo $name; ?> </p>
<form method="POST" action="/SQL/move.php">
	<input pattern="[a-zA-Z ]{1,}" type="hidden" name="id" value="<?php echo $id?>">
  <div class="form-group">
    <label for="time">Hoe laat</label>
    <input  type="time" name = "time" class="form-control" id="time">
  </div>
  <div class="form-group">
    <label for="explain">Uitlegger:</label>
    <input pattern="[a-zA-Z ]{1,}" type="text" name = "tutor" class="form-control" id="explain">
  </div>
<?php for ($i = 1; $i <= $maxplayers; $i++){?>
	<div class="form-group"></div>
	<label for="player">Speler:</label>
		<input pattern="[a-zA-Z ]{1,}" type="text" name = "player[]" class name="form-control" id="player">
	<?php }?>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>