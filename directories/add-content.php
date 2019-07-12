<?php
include 'connection.php';    

if (isset($_POST['submit'])) {      
    $caption = $_POST['caption'];
    $image = $_POST['image'];
    $groups = $_POST['groups'];
    $date_schedule = $_POST['date_schedule'];
    $hour = $_POST['hour'];
    $minute = $_POST['minute'];
    $type_of_day = $_POST['type_of_day'];
   
   mysqli_query($conn, "INSERT INTO content (ID, caption, image, groups, dateToPost, hour, minute, daytype, dateScheduled) 
                        VALUES (NULL, '$caption', '$image', '$groups', '$date_schedule', '$hour', '$minute', '$type_of_day', CURRENT_TIMESTAMP)");
      //$res = mysqli_query($conn,$result);
       // echo $res;
   
}
?>
    <script>
        window.alert('Post added successfully!');
        window.history.back();
    </script>
<?php ?>