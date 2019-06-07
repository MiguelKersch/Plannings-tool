<?php 

include 'connect.php';

$id = $_POST['id'];

echo $id;

$sql = 'SELECT * from activeGames where id = :id';
$query = $conn->prepare($sql);
$query->bindParam(":id", $id);
$query->execute();
$players = implode (", ", $_POST['player']);


$result = $query->fetch();

$sql = 'UPDATE activeGames SET time = :time, tutor = :tutor, players = :players WHERE id = :id ' ;

$query = $conn->prepare($sql);
$query->bindParam(":id", $id);
$query->bindParam(":time", $_POST['time']);
$query->bindParam(":tutor", $_POST['tutor']);
$query->bindParam(":players", $players);


$query->execute();

header("location:index.php");