<?php
include "connect.php";
$id = $_GET[id];
$sql= "select * from games where id = :id";
$query = $conn->prepare($sql); 
$query->bindParam(":id",$id);
$query->execute();

$result= $query->fetch();


$sql= "DELETE FROM activeGames WHERE id = $id";


$query = $conn->prepare($sql); 
$query->bindParam(":id",$result[id]);
$query->bindParam(":name",$result[name]);
$query->bindParam(":play_minutes",$result[play_minutes]);
$query->bindParam(":explain_minutes",$result[explain_minutes]);
$query->execute();
header("location:index.php");
?>