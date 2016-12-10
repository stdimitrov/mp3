<?php
//Get the message by id GET param
if(!empty($_GET['id']) && is_numeric($_GET['id'])) {
	$query = "SELECT * FROM `messages` WHERE `id`='".$_GET['id']."'";
	$result = $conn->query($query);
	$message = mysqli_fetch_assoc($result);
}

//If message was found
if(!empty($message) && is_array($message)) {

	//if message was not read before
	if(isset($message['is_read']) && $message['is_read'] == 0) {
		$query = "UPDATE `messages` SET `is_read`='1' WHERE `id`='".$message['id']."'";
		$conn->query($query);
	}
?>
<div class="table-responsive">
	<table class="table table-bordered">
		<caption>
			View message
		</caption>
		<tbody>
			<tr>
				<td>
					<strong>
						Send from: <?php echo $message['name'];?>, on <?php echo $message['date'] !== NULL ? date('d.m.Y H:i:s', $message['date']) : 'N/A'; ?>
					</strong>
				</td>
			</tr>
			<tr>
				<td>
					<strong>
						About: <?php echo $message['about']; ?>
					</strong>
				</td>
			</tr>
			<tr>
				<td>
					<?php echo $message['message'];?>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<?php } else {
	echo '<h2 class="text-center">Message was not found</h2>';
}
?>