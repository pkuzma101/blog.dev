<?php

// define ('DB_NAME', 'todo_list_db');

require '../inc/config.todo.php';

if(isset($_GET['list-item'])) {
	$itemToRemove = intval($_GET['list-item']);
}

if(isset($_GET['page'])) {
	$pageNumber = $_GET['page'];
} else {
	$pageNumber = 1;
}

$offsetNumber = ($pageNumber - 1) * 4;

if($_POST) {
	if($_POST['add'] > 75) {
		echo "<div class='alert alert-info' role='alert'> Item too long, break into multiple items </div>";
	} elseif(empty($_POST['add'])) {
		echo "<div class='alert alert-info' role='alert'> Can't add a blank item </div>";
	} else {
		$query = $dbc->prepare("INSERT INTO items(content, priority) VALUES(:content, :priority)");
		$query->bindValue(':content', $_POST['add'], PDO::PARAM_STR);
		$query->bindValue(':priority', $_POST['priority'], PDO:: PARAM_STR);
		$query->execute();
	}
}

if(isset($itemToRemove)) {
	$deletion = $dbc->prepare("DELETE FROM items WHERE id = :itemToRemove");
	$deletion->bindValue(':itemToRemove', $itemToRemove, PDO::PARAM_INT);
	$deletion->execute();
}

$stmt = $dbc->prepare("SELECT content, id, priority FROM items LIMIT 4 OFFSET :offsetNumber");
$stmt->bindValue(':offsetNumber', $offsetNumber, PDO::PARAM_INT);
$stmt->execute();

$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

$numberOfItems = $dbc->query('SELECT count(*) FROM items')->fetchColumn();

?>

<html>
	<head>
		<title>TODO List</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">	
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Josefin+Sans:400,400italic' rel='stylesheet' type='text/css'>
		<link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="css/sql_todo_list.css">
	</head>
	<body>
		<a href="/portfolio" class="btn btn-default" id="back">Back</a>
		<h1>TODO List</h1>
		<div class="container" id="list">
			<!-- List items appear here -->
			<div id="list-items" class="container">
				<ul>
					<? foreach($items as $value):  ?>
						<li><?= htmlspecialchars(strip_tags($value['content'])); ?> - <?= $value['priority']; ?> | <a href="?list-item=<?php echo $value['id']; ?>"> done </a></li>
					<? endforeach ?>
				</ul>
			</div> <!-- List Items end -->
			<div id="pagination"> <!-- Pagination code goes here -->
				<? if($pageNumber > 1): ?>
					<a href="?page=<?= $pageNumber - 1 ?>" class='btn btn-info' id="previous"> &lt; Previous </a>
				<? endif ?>
				<? if(round($numberOfItems / 4) > $pageNumber): ?>
					<a href="?page=<?= $pageNumber + 1 ?>" class='btn btn-danger' id="next">Next &gt;</a>
				<? endif ?>
			</div> <!-- Pagination code ends here -->
		
			<div>
				<h3>Add Item to the List</h3>
				<form method="POST" class="addItem" action="/sql_todo_list.php" role="form">
					<p>
						<input id="add" name="add" type="text" placeholder="Task to Add">
					</p>
					<p>
						<select name="priority" id="priority">
							<option value="Low">Low</option>
							<option value="Medium">Medium</option>
							<option value="High">High</option>
						</select>
					</p>
					<p>
						<button type="submit" class="btn btn-default">Add Item</button>
					</p>
				</form>	
			</div>
		</div>  <!-- list container -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="js/todoList.js"></script>
	</body>
</html>
