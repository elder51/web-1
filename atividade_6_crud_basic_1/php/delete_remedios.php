<?php
require_once 'db.php';

$id = $_GET['ID'];

$stmt = $pdo->prepare("DELETE FROM REMEDIOS WHERE ID = ?");

$stmt->execute([$id]);

header('Location: index_remedio.php');
?>