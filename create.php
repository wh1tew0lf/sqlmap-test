<?php
if (!empty($_POST['record']['title']) && !empty($_POST['record']['text'])) {
	include './Db.php'; 
	$db = new Db();
	if ($db->createRow($_POST['record']['title'], $_POST['record']['text'])) {
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
				<input type="text" name="record[title]" />
			</div>
			<div class="row">
				<label>Text</label>
				<textarea name="record[text]"></textarea>
			</div>
			<div class="row">
				<input type="submit" class="button" value="Save" />
				<a href="/" class="button">Back</a>
			</div>
		</form>		
	</body>
</html>
