<?php
if (empty($_GET['id'])) {
	header('location: /');
}
$id = $_GET['id'];
include './Db.php'; 
$db = new Db();
$data = $db->deleteRow($id);
header('location: /');
die();
