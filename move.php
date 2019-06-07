<?php 

include 'connect.php';

$id = $_POST['id'];

echo $id;

$sql = 'SELECT * from Games where id = :id';
$query = $conn->prepare($sql);
$query->bindParam(":id", $id);
$query->execute();
$players = implode (", ", $_POST['player']);


$result = $query->fetch();

$sql = 'INSERT into activeGames ( name, image, skills, min_players, max_players, play_minutes, explain_minutes, time, tutor, players) VALUES ( :name, :image, :skills, :min_players, :max_players, :play_minutes, :explain_minutes, :time, :tutor, :players)';

$query = $conn->prepare($sql);

$query->bindParam(":name", $result['name']);
$query->bindParam(":image", $result['image']);
$query->bindParam(":skills", $result['skills']);
$query->bindParam(":min_players", $result['min_players']);
$query->bindParam(":max_players", $result['max_players']);
$query->bindParam(":play_minutes", $result['play_minutes']);
$query->bindParam(":explain_minutes", $result['explain_minutes']);
$query->bindParam(":time", $_POST['time']);
$query->bindParam(":tutor", $_POST['tutor']);
$query->bindParam(":players", $players);


$query->execute();

header("location:index.php");