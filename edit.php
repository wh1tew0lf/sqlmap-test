<?php
if (empty($_GET['id'])) {
	header('location: /');
}
$id = $_GET['id'];
include './Db.php'; 
$db = new Db();
$data = $db->getById($id);
if (!empty($_POST['record']['title']) && !empty($_POST['record']['text'])) {
	if ($db->updateRow($id, $_POST['record']['title'], $_POST['record']['text'])) {
		header('location: /');
	}
}
?><!DOCTYPE>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Crate new item</title>
		<link rel="stylesheet" href="./static/styles.css"/>
	</head>
	<body>		
		<form method="POST">
			<div class="row">
				<label>Title</label>
				<input type="text" name="record[title]" value="<?=htmlspecialchars($data['title']);?>" />
			</div>
			<div class="row">
				<label>Text</label>
				<textarea name="record[text]"><?=htmlspecialchars($data['descr']);?></textarea>
			</div>
			<div class="row">
				<input type="submit" class="button" value="Save" />
				<a href="/" class="button">Back</a>
			</div>
		</form>		
	</body>
</html>
