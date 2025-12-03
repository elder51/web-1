<?php
require_once 'db.php';
require_once 'authenticate.php';

$id = $_GET['ID'];

$stmt = $pdo->prepare("DELETE FROM FARM_REMEDIOS WHERE REMD_ID = ?");

$stmt->execute([$id]);

header('Location: index_remedio.php');
?>