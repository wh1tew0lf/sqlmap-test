<!DOCTYPE>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>List of items</title>
		<link rel="stylesheet" href="./static/styles.css"/>
	</head>
	<body>
		<?php 
			include './Db.php'; 
			$db = new Db();
			$data = $db->getAll();
		?>
		<a class="button" href="create.php">Add new</a>
		<div class="items">
			<?php foreach($data as $row): ?>
				<div class="item">
					<div class="item__title"><?=$row['title'];?></div>
					<div class="item__text"><?=$row['descr'];?></div>
					<div class="item__actions">
						<a class="button" href="edit.php?id=<?=$row['id'];?>">Edit</a>
						<a class="button" href="delete.php?id=<?=$row['id'];?>">Delete</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</body>
</html>
