<?php

//If have POST - delete messages
if(!empty($_POST['for_delete']) && is_array($_POST['for_delete'])) {
	$ids = implode(',', $_POST['for_delete']);

	$query = "DELETE FROM `messages` WHERE id IN (".$ids.")";
	$conn->query($query);
}

//Get messages list
$query = 'SELECT * FROM `messages` ORDER BY `id` DESC';
$result = $conn->query($query);

while($row = mysqli_fetch_assoc($result)) {
	switch($row['receiver']) {
		case 'sales':
			$row['receiver'] = 'Sales';
		break;
		case 'tech':
			$row['receiver'] = 'Technical Support';
		break;
		case 'support':
			$row['receiver'] = 'Support';
		break;
		case 'hr':
			$row['receiver'] = 'HR';
		break;
		default:
			$row['receiver'] = 'N/A';
	}
	$messages[] = $row;
}

if(!empty($messages) && is_array($messages)) {
?>
<form method="POST">
	<div class="table-responsive">
		<table id="messages-list" class="table table-bordered">
			<caption>
				Messages list
			</caption>
			<thead>
				<tr>
					<th>
						<button type="submit" id="delete">Delete</button>
					</th>
					<th>
						Name
					</th>
					<th>
						About
					</th>
					<th>
						Receiver
					</th>
					<th>
						Date
					</th>
					<th>
						Read
					</th>
					<th>
						View
					</th>
				</tr>
			</thead>
			<tbody>
			<?php
				foreach($messages as $message) {
					?>
				<tr class="<?php echo $message['is_read'] == 0 ? 'text-bold': ''; ?>">
					<td>
						<input type="checkbox" name="for_delete[]" value="<?php echo $message['id'];?>" />
					</td>
					<td>
						<?php echo $message['name']; ?>
					</td>
					<td>
						<?php echo $message['about']; ?>
					</td>
					<td>
						<?php echo $message['receiver']; ?>
					</td>
					<td>
						<?php echo $message['date'] !== NULL ? date('d.m.Y H:i:s', $message['date']) : 'N/A'; ?>
					</td>
					<td>
						<?php echo $message['is_read'] == 1 ? 'Yes': 'No'; ?>
					</td>
					<td>
						<a href="?page=show&id=<?php echo $message['id'];?>" class="btn btn-success btn-sm">View</a>
					</td>
				</tr>
			<?php
				}
			?>
			</tbody>
		</table>
	</div>
</form>
<?php } else {
	echo '<h2 class="text-center">No messages to show</h2>';
}
?>