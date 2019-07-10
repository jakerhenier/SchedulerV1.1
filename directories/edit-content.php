<?php
 include 'connection.php';

 $content_id = $_GET['content_id'];
                         
      //selecting data associated with this particular id
 $result = mysqli_query($conn, "SELECT * FROM content WHERE ID=$content_id");
                         
		while($res = mysqli_fetch_array($result))
		{
			$update_caption = $_POST['caption'];
			$update_image = $_POST['image'];
			$update_groups = $_POST['groups'];
			$update_date_schedule = $_POST['date_schedule'];
			$update_hour = $_POST['hour'];
			$update_minute = $_POST['minute'];
			$update_type_of_day = $_POST['type_of_day'];
		}

 if (isset($_POST['edit'])) {
 	$content_id = $_POST['content_id'];

    $update_caption = $_POST['caption'];
    $update_image = $_POST['image'];
    $update_groups = $_POST['groups'];
    $update_date_schedule = $_POST['date_schedule'];
    $update_hour = $_POST['hour'];
    $update_minute = $_POST['minute'];
    $update_type_of_day = $_POST['type_of_day'];

    $use = mysqli_query($conn, "select * from content where ID= 'content_id'");
    $srow = mysqli_fetch_array($use);

    mysqli_query($conn, "update content set ID=NULL, caption= 'update_caption', image='update_image', groups='update_groups', dateToPost='update_date_schedule', hour='update_hour', minute='update_minute', type='update_type_of_day', dateScheduled=CURRENT_TIMESTAMP where ID='content_id'");
}
?>
<script>
	window.alert('Post updated successfully!');
	window.history.back();
</script>
<?php ?>